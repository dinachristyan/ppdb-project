const { Sequelize } = require('sequelize');

const sequelize = new Sequelize('ppdb', 'root', '', {
  host: 'localhost',
  dialect: 'mysql',
  logging: false // Optional, untuk menonaktifkan logging SQL
});

module.exports = sequelize;
