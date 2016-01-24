const fs = require('fs');
const data_store = JSON.parse(fs.readFileSync("./data-store/config.json"));
module.exports = data_store;
