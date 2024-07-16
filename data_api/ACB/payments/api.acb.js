const request = require('request');
const stream = require('stream');
const { v4: uuidv4 } = require('uuid');
const path = require('path');
const imageToBase64 = require('image-to-base64');
const BPromise = require('bluebird');
const cheerio = require('cheerio');
const moment = require('moment-timezone');
moment.tz.setDefault("Asia/Ho_Chi_Minh");
const chalk = require('chalk');
const fs = require('fs');
const db = require(path.normalize(__dirname + '/./database'));
const bankCodes = require('./bankCodes');

class ACB {
    constructor(extra_options = {}) {
        let { accountNumber, username, password } = extra_options;
        this.Stream = new stream.Stream();
        this.db = db;
        this.username = username || "";
        this.password = password || "";
        this.accountNumber = accountNumber || "";
        this.cookies = [];
        this.currentUser = {};
        this.lastinfo = '';
    }
    addAccount2db() {
        return new Promise((resolve, reject) => {
            this.Stream.emit('log', `${this.username} | Add account to db`);
            let query = 'INSERT INTO banks(accountNumber, username, password, shortName) VALUES(?, ?, ?, ?)';
            let queryData = ['', this.username, '', 'ACB'];
            this.db.query(query, queryData, (err, insertResults) => {
              if (err) {
                reject(err);
              } else {
                if (insertResults.affectedRows == 1) {
                  resolve();
                } else {
                  reject(new Error('Can not insert account'));
                }
              }
            });
        });
    }
    updateCookies2DB() {
        return new Promise((resolve, reject) => {
            this.Stream.emit('log', `${this.username} | ${chalk.blue(`Updaing cookies`)}`);
            let query = 'UPDATE banks SET update_at = CURRENT_TIMESTAMP, cookies = ? WHERE username = ?';
            let now_logged_data = {
                cookies: this.cookies,
                currentUser: this.currentUser
            }
            let queryData = [JSON.stringify(now_logged_data), this.username];
            this.db.query(query, queryData, (err, results) => {
                if (err) {
                    reject(err);
                } else {
                    if (results.affectedRows == 1) {
                        // this.Stream.emit('log', `${this.username} | Cookies has been updated`);
                        this.Stream.emit('log', `${this.username} | ${chalk.blue(`Cookies has been updated`)}`);
                        resolve(true);
                    } else {
                        reject(new Error(`Upate cookies faild: username: ${this.username} | accountNumber: ${this.accountNumber}`));
                    }
                }
            });
        });
    }
    init() {
        return new Promise((resolve, reject) => {
            this.Stream.emit('log', `${this.username} | Dang khoi tao`);
            if (this.username.length == 0 || this.password.length == 0) {
                reject(new Error('Mat khau hoac ten dang nhap khong de trong'));
            } else {
                this.db.query('SELECT cookies FROM banks WHERE username = ?', [this.username], async (err, banks) => {
                    if (err) {
                        reject(err);
                    } else {
                        if (banks == undefined || (banks || []).length == 0) {
                            // reject(new Error('Can not find bank in database'));
                            try {
                                await this.addAccount2db();
                            } catch (e) {
                                reject(e);
                            }
                        } else {
                            // Load json from Cookies mysql field
                            this.lastinfo = banks[0].cookies;
                        }

                        let need2_init_new = false;
                        try {
                            if (this.lastinfo.length > 1) {

                                const last_data = JSON.parse(this.lastinfo);
                                this.cookies = last_data.cookies;
                                this.currentUser = last_data.currentUser;

                                this.Stream.emit('log', `${this.username} | Loaded last data`);
                            } else {
                                need2_init_new = true;
                            }
                        } catch (e) {
                            need2_init_new = true;
                        } finally {
                            
                            if (need2_init_new) {
                                this.Stream.emit('log', `${this.username} | ACB inited successful`);
                                resolve();
                            } else {
                                this.Stream.emit('log', `${this.username} | ACB inited successful`);
                                resolve();
                            }
                        }
                    }
                });   
            }
        });
    }
    cookiez () {
        // console.log((this.cookies || []).join('; '));
        return (this.cookies || []).join('; ');
    }
    close_all() {
        return new Promise(async (resolve, reject) => {
            try {
                this.db.destroy();
            } catch (e) {
                
            } finally {
                resolve();
            }
        });
    }
    Authorization() {
        return `bearer ${this.currentUser.accessToken}`;
    }
    getListAccountPayments() {
        return new Promise((resolve, reject) => {
            try {
                let headers = {
                    'Host': 'apiapp.acb.com.vn',
                    'Accept': 'application/json, text/plain, */*',
                    'Connection': 'keep-alive',
                    'User-Agent': 'ACB-MBA/3 CFNetwork/1128.0.1 Darwin/19.6.0',
                    'Accept-Language': 'vi',
                    'Authorization': this.Authorization(),
                    
                };
    
                let options = {
                    url: 'https://apiapp.acb.com.vn/mb/legacy/ss/cs/bankservice/transfers/list/account-payment',
                    headers: headers,
                    json: true
                };
    
                request(options, (error, response, body) => {
                    if (!error && response.statusCode == 200) {
                        if (body.codeStatus === 200) {
                            this.listAccount = body.data || [];
                            // [{
                            //     accountNumber: '1287037',
                            //     accountDescription: 'TG PAYROLL KHTN (CN) VND',
                            //     owner: 'NGUYEN TIN ANH THU', currency: 'VND',
                            //     balance: 9550, totalBalance: 9550, cardToken: null,
                            //     status: 1, amountDue: null, dueDate: null
                            // }]
                            resolve(body);
                        } else {
                            reject(new Error(`Request getListAccountPayments failed: ${JSON.stringify(body)}`));
                        }
                    } else {
                        reject(new Error(`Can not get getListAccountPayments: ${error} | ${response.statusCode} | ${body}`));
                    }
                });
            } catch (err) {
                reject(err);
            }
        });
    }
    getUserDetails() {
        return new Promise((resolve, reject) => {
            try {
                let headers = {
                    'Host': 'apiapp.acb.com.vn',
                    'Accept': 'application/json, text/plain, */*',
                    'Connection': 'keep-alive',
                    'User-Agent': 'ACB-MBA/3 CFNetwork/1128.0.1 Darwin/19.6.0',
                    'Accept-Language': 'vi',
                    'Authorization': this.Authorization(),
                    
                };
    
                let options = {
                    url: 'https://apiapp.acb.com.vn/mb/legacy/ss/cs/bankservice/user/details',
                    headers: headers,
                    json: true
                };
    
                request(options, (error, response, body) => {
                    if (!error && response.statusCode == 200) {
                        if (body.codeStatus === 200) {
                            this.userDetails = body.data || [];
                            // userInfomation: {
                            //     person: number, firstName: string, lastName: string, middleName: null, taxId: string,
                            //     issueDate: string, personTaxId: [], primaryAddress: string, businessAddress: null,
                            //     cellPhone: stirng, businessPhone: null, birthDate: string, email: string,
                            //     residentialTaxCountry: 'VN', residentialTaxCountryName: 'VIET NAM', country: 'VN',
                            //     orgname: 'ACB - PGD BIEN HOA', orgnbr: number, provinceCd: 'VDNA', matinh: null
                            // }
                            resolve(this.userDetails);
                        } else {
                            reject(new Error(`Request getUserDetails failed: ${JSON.stringify(body)}`));
                        }
                    } else {
                        reject(new Error(`Can not get getUserDetails: ${error} | ${(response || {}).statusCode} | ${body}`));
                    }
                });
            } catch (err) {
                reject(err);
            }
        });
    }
    checkLogin () {
        return new Promise(async (resolve, reject) => {
            this.Stream.emit('log', `${this.username} | Check login`);
            try {
                const listAccount = await this.getListAccountPayments();
                resolve(true);
            } catch (err) {
                this.Stream.emit('log', `${this.username} | Check login, ${err.message}`);
                resolve(false);
            }

        });
    }
    refreshToken(refreshToken) {
        return new Promise((resolve, reject) => {
            try {
                const headers = {
                    'Host': 'apiapp.acb.com.vn',
                    'Accept': 'application/json, text/plain, */*',
                    'Connection': 'keep-alive',
                    'User-Agent': 'ACB-MBA/3 CFNetwork/1128.0.1 Darwin/19.6.0',
                    'Accept-Language': 'vi',
                    'Authorization': `Bearer ${refreshToken || this.currentUser.refreshToken}`,
                    'Accept-Encoding': 'gzip, deflate, br',
                    'Cookie': ''
                };

                const options = {
                    url: 'https://apiapp.acb.com.vn/mb/auth/refresh',
                    method: 'POST',
                    headers: headers
                };

                request(options, (error, response, body) => {
                    if (!error && response.statusCode == 200) {
                        if (body.accessToken != undefined) {
                            this.currentUser.accessToken = body.accessToken;
                            this.currentUser.expiresIn = body.expiresIn;
                            resolve();
                        } else {
                            reject(new Error(`Can not refresh token some error: ${body}`));
                        }
                    } else {
                        reject(new Error(`Can not refresh token`));
                    }
                });

            } catch (err) {
                reject(err);
            }
        });
    }
    login () {
        return new Promise((resolve, reject) => {
            const headers = {
                'Host': 'apiapp.acb.com.vn',
                'Accept': 'application/json, text/plain, */*',
                'Content-Type': 'application/json',
                'Connection': 'keep-alive',
                'Accept-Language': 'vi',
                'Accept-Encoding': 'gzip, deflate, br',
                'User-Agent': 'ACB-MBA/3 CFNetwork/1128.0.1 Darwin/19.6.0',
                'Cookie': ''
            };
            
            const options = {
                url: 'https://apiapp.acb.com.vn/mb/auth/tokens',
                method: 'POST',
                headers: headers,
                json: {
                    username: this.username,
                    password: this.password,
                    "clientId":"iuSuHYVufIUuNIREV0FB9EoLn9kHsDbm"
                }
            };
            
            request(options, (error, response, body) => {
                if (!error && response.statusCode == 200) {
                    this.currentUser = body;
                    resolve(body);
                } else if (!error && response.statusCode == 400) {
                    if (body.errorCode === 401 && body.message === 'Invalid Credentials') {
                        reject(new Error(`Login fail: Tên đăng nhập hoặc mật khẩu không chính xác. Tài khoản sẽ bị khóa sau 5 lần thử không thành công`));
                    } else {
                        reject(new Error(`Login fail1: ${error}|${response.statusCode}|${body}`));    
                    }
                } else {
                    reject(new Error(`Login fail2: ${error}|${response.statusCode}|${body}`));
                }
            });
        });
    }
    run_login () {
        return new Promise(async (resolve, reject) => {
            try {
                this.Stream.emit('log', `${this.username} | Run login`);
                this.cookies = [];
                this.currentUser = {};
                this.lastinfo = '';
                await this.login();
                this.Stream.emit('log', `${this.username} | Logged in. Login test is in progress`);
                const isLogin = await this.checkLogin();
                if (isLogin) {
                    await this.updateCookies2DB();
                }
                resolve(isLogin);
            } catch (err) {
                reject(err);
            }
        });
    }
    prepare () {
        return new Promise(async (resolve, reject) => {
            try {
                await this.init();
                const islogined = await this.checkLogin();
                if (!islogined) await this.run_login();
                this.Stream.emit('log', `${this.username} | ACB has finished preparing`);
                resolve();
            } catch (e) {
                reject(e);
            }
        });
    }
    choiceBankCode(napasBankCode = "970416") {
        return new Promise((resolve, reject) => {
            const bankCode = bankCodes.find(item => item.napasBankCode === napasBankCode);
            if (bankCode) {
                resolve(bankCode);
            } else {
                reject(new Error('Can not find bank code'));
            }
        });
    }
    choiceAccount() {
        return new Promise((resolve, reject) => {
            if (this.accountNumber) {
                const account = this.listAccount.find(item => item.accountNumber === this.accountNumber);
                if (account) {
                    this.account = account;
                    resolve(this.account);
                } else {
                    reject(new Error('Can not find account number'));
                }
            } else {
                if (this.listAccount && (this.listAccount || []).length > 0) {
                    this.account = this.listAccount[0];
                    resolve(this.account);
                } else {
                    reject(new Error('Can not find account number'));
                }
            }
        });
    }
    todayUnix() {
        return moment.tz().valueOf();
    }
    date2Unix(date_time = 'DD/MM/YYYY HH:mm:ss') {
        try {
            // HH	00 01 ... 22 23
            // mm	00 01 ... 58 59
            // ss	00 01 ... 58 59
            // Vì setDefault rồi nên không cần dùng moment.tz()
            return moment(date_time, 'DD/MM/YYYY HH:mm:ss').valueOf();
        } catch (err) {
            throw err;
        }
    }
    getBalance() {
        return new Promise(async (resolve, reject) => {
            try {
                const listAccount = await this.getListAccountPayments();
                if (listAccount.codeStatus === 200) {
                    if ((this.accountNumber || "").length === 0) {
                        resolve(listAccount.data);
                    } else {
                        const accountChoiced = await this.choiceAccount();
                        resolve(accountChoiced)
                    }
                } else {
                    reject(new Error(`getBalance failed: ${listAccount}`));
                }
            } catch (err) {
                reject(err);
            }
        });
    }
    laysaoke(from_date = '01/10/2020 00:00:00', to_date = '29/10/2020 00:00:00', page = 1, size = 100) {
        return new Promise(async (resolve, reject) => {
            try {
                await this.choiceAccount();

                const headers = {
                    'Host': 'apiapp.acb.com.vn',
                    'Accept': 'application/json, text/plain, */*',
                    'Connection': 'keep-alive',
                    'User-Agent': 'ACB-MBA/3 CFNetwork/1128.0.1 Darwin/19.6.0',
                    'Accept-Language': 'vi',
                    'Authorization': this.Authorization(),
                    'Accept-Encoding': 'gzip, deflate, br',
                    'Cookie': ''
                };

                // let begin = moment(from_date, 'DD/MM/YYYY HH:mm:ss').utc().format('DD/MM/YYYY HH:mm:ss');
                // let end = moment(to_date, 'DD/MM/YYYY HH:mm:ss').utc().format('DD/MM/YYYY HH:mm:ss');

                let begin = moment(from_date, 'DD/MM/YYYY HH:mm:ss').add(1, 'days').format('DD/MM/YYYY HH:mm:ss');
                let end = moment(to_date, 'DD/MM/YYYY HH:mm:ss').add(1, 'days').format('DD/MM/YYYY HH:mm:ss');

                // let end_final = to_date;
                // const todayDate = moment.tz('Asia/Ho_Chi_Minh').format('DD/MM/YYYY');
                // const inputDateMoment = moment.tz(end_final, 'DD/MM/YYYY', "Asia/Ho_Chi_Minh");
                // const inputDate = inputDateMoment.format('DD/MM/YYYY');
                // if (todayDate === inputDate) {
                //     // input is hom nay
                //     end_final = inputDateMoment.add(1, 'days');
                //     end_final = end_final.format('DD/MM/YYYY HH:mm:ss')
                // }

                const options = {
                    url: `https://apiapp.acb.com.vn/mb/legacy/ss/cs/bankservice/saving/${this.account.accountNumber}/tx-history`,
                    headers: headers,
                    qs: {
                        account: this.account.accountNumber,
                        transactionType: 'ALL',
                        from: String(this.date2Unix(begin)),
                        to: String(this.date2Unix(end)),
                        min: 0,
                        max: 9007199254740991,
                        page,
                        size
                    },
                    json: true
                };

                request(options, (error, response, body) => {
                    if (!error && response.statusCode == 200) {
                        body = body || {};
                        if (body.codeStatus === 200) {
                            resolve({
                                took: body.took,
                                transactions: body.data,
                                total: body.data.length,
                                page,
                                size
                            });
                        } else {
                            reject(new Error(`get transaction failed: ${body}`));
                        }
                    } else {
                        console.log('getTransactions:', error, response.statusCode, body);
                        reject(new Error(`Can not get transaction`));
                    }
                });

            } catch (err) {
                reject(err);
            }
        });
    }
    checkReceiveAccount(receivedAccountNumber = '', napasBankCode = '970416') {
        return new Promise(async (resolve, reject) => {
            try {
                const bankCode = (napasBankCode === '970416')?"307":napasBankCode;
                const headers = {
                    'Host': 'apiapp.acb.com.vn',
                    'Accept': 'application/json, text/plain, */*',
                    'Connection': 'keep-alive',
                    'User-Agent': 'ACB-MBA/3 CFNetwork/1128.0.1 Darwin/19.6.0',
                    'Accept-Language': 'vi',
                    'Authorization': this.Authorization(),
                    'Accept-Encoding': 'gzip, deflate, br',
                    'Cookie': ''
                };
    
                const options = {
                    url: `https://apiapp.acb.com.vn/mb/legacy/ss/cs/bankservice/transfers/accounts/${receivedAccountNumber}`,
                    headers: headers,
                    qs: {
                        bankCode: bankCode,
                        accountNumber: this.account.accountNumber
                    },
                    json: true
                };
    
                request(options, (error, response, body) => {
                    if (!error && response.statusCode == 200) {
                        // {"time":"2020-10-29T14:32:59.557+07:00","codeStatus":200,"messageStatus":"success","description":"","took":59,"data":{"account":"1287037","major":"CK","minor":"G081","majorCategory":"DEP","majorDescription":"Checking","minorDescription":"TG PAYROLL KHTN (CN) VND","currency":"VND","accountStatus":1,"owner":7651064,"ownerName":"NGUYEN TIN ANH THU","ownerType":"PERS","contractDate":1532278800000,"startDate":1532278800000,"maturityDate":null,"accountBranch":927,"accountBranchName":"ACB - CN TAN PHU","accountDescription":null,"accruedInterestAtMaturityDate":0.0,"currentAccruedInterest":null,"interestRate":0.0,"openingBalance":null,"currentBalance":null,"availableBalance":0.0,"manageHoldAmount":null,"creditLimit":null,"availableCreditLimit":null,"amountDue":null,"dueDate":null,"nextPaymentDueDate":null,"nextRateChangeDate":1603956554000,"lateDueDay":null,"currentTerm":null,"majorAccountType":"CK","minorAccountType":"G081","majorAccountTypeCategory":"DEP","productClass":null,"checkingInterestRate":0.0,"accountType":1,"additionalDepositYN":"N","additionalDepositGraceDays":null,"principalDisbursementAmount":0,"graceDays":0,"accountRolePerson":[{"role":"OEMP","person":566130},{"role":"PFCE","person":3911972}],"renewalType":0,"accountName":null,"debitAccount":null,"balanceSixMonth":[],"addOnAccount":false}}
                        body = body || {};
                        if (body.codeStatus === 200) {
                            this.receiveAccount = body.data;
                            resolve(body.data);
                        } else {
                            reject(new Error(`checkReceiveAccount failed: ${body}`));
                        }
                    } else {
                        reject(new Error(`Can not get checkReceiveAccount`));
                    }
                });
            } catch (err) {
                reject(err);
            }
        });
    }
    getTransactionLimits(receivedAccountNumber = '', transferType = "local", napasBankCode = "970416") {
        return new Promise(async (resolve, reject) => {
            try {
                transferType = (transferType === 'local')?1:3;
                const bankCode = await this.choiceBankCode(napasBankCode);
                const headers = {
                    'Host': 'apiapp.acb.com.vn',
                    'Content-Type': 'application/json',
                    'Accept': 'application/json, text/plain, */*',
                    'User-Agent': 'ACB-MBA/3 CFNetwork/1128.0.1 Darwin/19.6.0',
                    'Connection': 'keep-alive',
                    'Accept-Language': 'vi',
                    'Authorization': this.Authorization(),
                    'Accept-Encoding': 'gzip, deflate, br',
                    'Cookie': ''
                };

                const options = {
                    url: 'https://apiapp.acb.com.vn/mb/legacy/ss/cs/bankservice/transfers/transaction-limits',
                    method: 'POST',
                    headers: headers,
                    json: {
                        "accountNumber": this.account.accountNumber,
                        "transferType": transferType,
                        "receivedBank": bankCode.bank,
                        "napasBankCode": napasBankCode,
                        "receivedAccountNumber": receivedAccountNumber,
                        "transferTime": {
                            "type": 1,
                            "period": 0,
                            "startDate": 0,
                            "endDate": 0
                        },
                        "receivedCardNumber": "",
                        "receivedIdCardNumber": "",
                        "receivedPassportNumber": ""
                    }
                };

                request(options, (error, response, body) => {
                    if (!error && response.statusCode == 200) {
                        body = body || {};
                        if (body.codeStatus === 200) {
                            this.mbTransactionLimitInfo = body.data;
                            resolve(body.data);
                        } else {
                            reject(new Error(`getTransactionLimits failed: ${body}`));
                        }
                    } else {
                        reject(new Error(`Can not getTransactionLimits`));
                    }
                });

            } catch (err) {
                reject(err);
            }
        });
    }
    checkTranferFee(amount, transferType = "local", napasBankCode = "970416") {
        return new Promise(async (resolve, reject) => {
            try {
                transferType = (transferType === 'local')?1:3;
                const bankCode = await this.choiceBankCode(napasBankCode);
                const headers = {
                    'Host': 'apiapp.acb.com.vn',
                    'Content-Type': 'application/json',
                    'Accept': 'application/json, text/plain, */*',
                    'User-Agent': 'ACB-MBA/3 CFNetwork/1128.0.1 Darwin/19.6.0',
                    'Connection': 'keep-alive',
                    'Accept-Language': 'vi',
                    'Authorization': this.Authorization(),
                    'Accept-Encoding': 'gzip, deflate, br',
                    'Cookie': ''
                };

                const options = {
                    url: 'https://apiapp.acb.com.vn/mb/legacy/ss/cs/bankservice/transfers/transaction-fee',
                    method: 'POST',
                    headers: headers,
                    json: {
                        "transferType": transferType,
                        "receiveBank": bankCode.bank,
                        "napasBankCode": napasBankCode,
                        "checkingAccount": this.account.accountNumber,
                        "accountNumber": this.receiveAccount.account,
                        "amount": amount,
                        "bankcheckId": 0,
                        "transferTime": {
                            "type": 1,
                            "period": 0,
                            "startDate": 0,
                            "endDate": 0
                        },
                        "cardNumber": "",
                        "idCardNumber": "",
                        "passportNumber": ""
                    }
                };

                request(options, (error, response, body) => {
                    if (!error && response.statusCode == 200) {
                        body = body || {};
                        if (body.codeStatus === 200) {
                            this.tranferFee = body.data;
                            resolve(body.data);
                        } else {
                            reject(new Error(`checkTranferFee failed: ${body}`));
                        }
                    } else {
                        reject(new Error(`Can not checkTranferFee`));
                    }
                });

            } catch (err) {
                reject(err);
            }
        });
    }
    submitTranfer(amount = 10000, message = "", otp_type = 'SMS', transferType = "local", napasBankCode = "970416", referenceNumber = '') {
        return new Promise(async (resolve, reject) => {
            try {
                transferType = (transferType === 'local')?1:3;
                const bankCode = await this.choiceBankCode(napasBankCode);
                const menuCode = (transferType === 'local')?"14":"34";
                const headers = {
                    'Host': 'apiapp.acb.com.vn',
                    'Content-Type': 'application/json',
                    'Accept': 'application/json, text/plain, */*',
                    'User-Agent': 'ACB-MBA/3 CFNetwork/1128.0.1 Darwin/19.6.0',
                    'Connection': 'keep-alive',
                    'Accept-Language': 'vi',
                    'Authorization': this.Authorization(),
                    'Accept-Encoding': 'gzip, deflate, br',
                    'Cookie': ''
                };

                // OTPS: ACB SafeKey

                this.tranfer_local_data = {
                    "type": transferType,
                    "authMethod": otp_type, //SMS, OTPS
                    "menu": menuCode,
                    "amount": amount,
                    "currency": "VND",
                    "fromAccount": this.account.accountNumber,
                    "transactionAmount": amount,
                    "receiverName": this.receiveAccount.ownerName,
                    "bankName": bankCode.bankName,
                    "comment": message,
                    "transferTime": {
                        "type": 1, "period": 0,
                        "startDate": 0, "endDate": 0
                    },
                    "fee": this.tranferFee.fee, "feeTo": 0,
                    "resultToEmails": [],
                    "accountInfo": {
                        "accountNumber": this.receiveAccount.account,
                        "bankCode": bankCode.bank,
                        "bankName": bankCode.bankName,
                        "napasBankCode": napasBankCode,
                        "bankcheckId": 0
                    },
                    "bankCode": bankCode.bank,
                    "napasBankCode": napasBankCode,
                    "referenceNumber": referenceNumber,
                    "province": "",
                    "mbTransactionLimitInfo": {
                        "byAdvSafeKey": null,
                        ...this.mbTransactionLimitInfo
                    }
                };

                const options = {
                    url: 'https://apiapp.acb.com.vn/mb/legacy/ss/cs/bankservice/transfers/submit',
                    method: 'POST',
                    headers: headers,
                    json: this.tranfer_local_data
                };

                request(options, (error, response, body) => {
                    if (!error && response.statusCode == 200) {
                        body = body || {};
                        resolve(body);
                    } else {
                        reject(new Error(`Can not submit tranfer local`));
                    }
                });

            } catch (err) {
                reject(err);
            }
        });
    }
    make_tranfer_local(fnOptions = {}) {
        return new Promise(async (resolve, reject) => {
            try {
                let { bankCode, tranfer_to, amount, message, otp_type } = fnOptions;
                message = (message || '').toUpperCase();
                otp_type = (['SMS', 'OTPS'].includes(otp_type) === true)?otp_type:'SMS';

                // this.account
                await this.choiceAccount();

                // this.receiveAccount
                await this.checkReceiveAccount(tranfer_to);

                // this.mbTransactionLimitInfo
                await this.getTransactionLimits(tranfer_to);

                // this.tranferFee
                await this.checkTranferFee(amount);

                const submitResult = await this.submitTranfer(amount, message, otp_type);

                resolve(submitResult);

            } catch (err) {
                reject(err);
            }
        });
    }
    confirm_tranfer(fnOptions = {}) {
        return new Promise((resolve, reject) => {
            try {
                let { uuid, code, otp_type } = fnOptions;
                otp_type = (['SMS', 'OTPS'].includes(otp_type) === true)?otp_type:'SMS';
                const headers = {
                    'Host': 'apiapp.acb.com.vn',
                    'Content-Type': 'application/json',
                    'Accept': 'application/json, text/plain, */*',
                    'User-Agent': 'ACB-MBA/3 CFNetwork/1128.0.1 Darwin/19.6.0',
                    'Connection': 'keep-alive',
                    'Accept-Language': 'vi',
                    'Authorization': this.Authorization(),
                    'Accept-Encoding': 'gzip, deflate, br',
                    'Cookie': ''
                };

                const options = {
                    url: 'https://apiapp.acb.com.vn/mb/legacy/ss/cs/bankservice/transfers/verify',
                    method: 'POST',
                    headers: headers,
                    json: {
                        "uuid": uuid,
                        "code": code,
                        "authMethod": otp_type //OTPS, SMS
                    }
                };

                request(options, (error, response, body) => {
                    if (!error && response.statusCode == 200) {
                        body = body || {};
                        if (body.codeStatus === 200) {
                            resolve(body.data);
                        } else {
                            reject(new Error(`Confirm failed: ${body.codeStatus} | ${body.description}`));
                        }
                    } else {
                        reject(new Error(`Can not make confirm OTP for tranfer`));
                    }
                });

            } catch (err) {
                reject(err);
            }
        });
    }
    getTranferBanks() {
        return new Promise((resolve, reject) => {
            const headers = {
                'Host': 'apiapp.acb.com.vn',
                'Accept': 'application/json, text/plain, */*',
                'Connection': 'keep-alive',
                'User-Agent': 'ACB-MBA/1 CFNetwork/1128.0.1 Darwin/19.6.0',
                'Accept-Language': 'vi',
                'Authorization': this.Authorization(),
                'Accept-Encoding': 'gzip, deflate, br',
                'Cookie': ''
            };

            const options = {
                url: 'https://apiapp.acb.com.vn/mb/legacy/ss/cs/bankservice/transfers/banks',
                headers: headers,
                json: true
            };

            request(options, (error, response, body) => {
                if (!error && response.statusCode == 200) {
                    body = body || {};
                    if (body.codeStatus === 200) {
                        this.bankLists = body.data;
                        resolve(body.data);
                    } else {
                        reject(new Error(`getTranferBanks failed: ${body}`));
                    }
                } else {
                    reject(new Error(`Can not getTranferBanks`));
                }
            });

        });
    }
    make_tranfer_247(fnOptions = {}) {
        return new Promise(async (resolve, reject) => {
            try {
                let { napasBankCode, tranfer_to, amount, message, otp_type } = fnOptions;
                message = (message || '').toUpperCase();
                otp_type = (['SMS', 'OTPS'].includes(otp_type) === true)?otp_type:'SMS';

                // this.account
                await this.choiceAccount();

                // this.receiveAccount
                await this.checkReceiveAccount(tranfer_to, napasBankCode);

                // this.mbTransactionLimitInfo
                await this.getTransactionLimits(tranfer_to, "247", napasBankCode);

                // this.tranferFee
                await this.checkTranferFee(amount, "247", napasBankCode);

                const submitResult = await this.submitTranfer(amount, message, otp_type, "247", napasBankCode);

                resolve(submitResult);

            } catch (err) {
                reject(err);
            }
        });
    }
}
 


module.exports = ACB;