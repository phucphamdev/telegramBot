const path = require('path');
const express = require('express');
const router = express.Router();
const jwt = require('jsonwebtoken');
const config = require(path.normalize(__dirname + '/../configs/config'));
const moment = require('moment');
const jsv = require('json-validator');
const db = require(path.normalize(__dirname + '/../payments/database'));
const ACB = require(path.normalize(__dirname + '/../payments/api.acb'));

router.get('/', (req, res) => {
  res.status(200).json({
    success: true,
    message: 'Server OK'
  });
});

router.post('/getBalance', async (req, res) => {
  try {
    const { accountNumber, username, password } = req.body;
    const myacb = new ACB({
      username,
      password,
      accountNumber: accountNumber || ''
    });

    myacb.Stream.on('log', data => console.log('log:', data));

    await myacb.prepare();

    const balances = await myacb.getBalance();

    res.status(200).json({
      success: true,
      message: `Success`,
      data: balances
    });

  } catch (e) {
    res.status(200).json({
      success: false,
      message: `Error: ${e.message}`
    });
  }
});

router.post('/transactions', async (req, res) => {
  try {
    const { accountNumber, username, password, begin, end } = req.body;
    const myacb = new ACB({
      username,
      password,
      accountNumber: accountNumber || ''
    });

    myacb.Stream.on('log', data => console.log('log:', data));

    await myacb.prepare();

    const saoke = await myacb.laysaoke(begin, end);

    res.status(200).json({
      success: true,
      message: `Success`,
      ...saoke
    });

  } catch (e) {
    res.status(200).json({
      success: false,
      message: `Error: ${e.message}`
    });
  }
});

router.post('/tranfer_local', async (req, res) => {
  try {
    const { accountNumber, username, password, tranfer_to, amount, message, otp_type } = req.body;

    const myacb = new ACB({
      username,
      password,
      accountNumber: accountNumber || ''
    });

    myacb.Stream.on('log', data => console.log('log:', data));

    await myacb.prepare();

    const tranferResult = await myacb.make_tranfer_local({ tranfer_to, amount, message, otp_type });

    res.status(200).json({
      success: true,
      message: `Success`,
      tranfer_type: "local",
      ...tranferResult
    });

  } catch (e) {
    res.status(200).json({
      success: false,
      message: `Error: ${e.message}`
    });
  }

});

router.post('/tranfer_247', async (req, res) => {
  try {
    const { accountNumber, username, password, tranfer_to, amount, message, otp_type, napasBankCode } = req.body;

    const myacb = new ACB({
      username,
      password,
      accountNumber: accountNumber || ''
    });

    myacb.Stream.on('log', data => console.log('log:', data));

    await myacb.prepare();

    const tranferResult = await myacb.make_tranfer_247({ napasBankCode, tranfer_to, amount, message, otp_type });

    res.status(200).json({
      success: true,
      message: `Success`,
      tranfer_type: "247",
      ...tranferResult
    });

  } catch (e) {
    res.status(200).json({
      success: false,
      message: `Error: ${e.message}`
    });
  }

});

router.post('/confirm_tranfer', async (req, res) => {
  try {
    const { accountNumber, username, password, uuid, code, otp_type } = req.body;

    const myacb = new ACB({
      username,
      password,
      accountNumber: accountNumber || ''
    });

    myacb.Stream.on('log', data => console.log('log:', data));

    await myacb.prepare();

    const confirmData = await myacb.confirm_tranfer({
      uuid: uuid || '',
      code: code || '123456',
      otp_type
    });

    res.status(200).json({
      success: true,
      message: `Success`,
      tranfer_type: "local",
      ...confirmData
    });

  } catch (e) {
    res.status(200).json({
      success: false,
      message: `Error: ${e.message}`
    });
  }
  
});

router.post('/getBankCode', async (req, res) => {
  try {
    const { username, password } = req.body;
    const myacb = new ACB({
      username,
      password,
      accountNumber: ''
    });

    myacb.Stream.on('log', data => console.log('log:', data));

    await myacb.prepare();

    const bankLists = await myacb.getTranferBanks();

    res.status(200).json({
      success: true,
      message: `Success`,
      data: bankLists
    });

  } catch (e) {
    res.status(200).json({
      success: false,
      message: `Error: ${e.message}`
    });
  }
});

module.exports = router
