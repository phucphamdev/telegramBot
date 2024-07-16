const mysql = require('mysql');
const config = require('../configs/config');

const con = mysql.createConnection({
    host: config.db_host,
    user: config.db_user,
    password: config.db_password,
    database: config.db_database,
    multipleStatements: true,
});

con.connect((err) => {
    if (err) throw err;
    console.log('MySQL Connected!');
});

module.exports = con;