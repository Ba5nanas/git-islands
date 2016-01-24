const config = require("./server-config");
var mysql      = require('mysql');
var connection = mysql.createConnection({
  host     : config.mysql.host,
  user     : config.mysql.user,
  password : config.mysql.pass,
  database : config.mysql.db
});

module.exports = connection;
