const { Model, DataTypes } = require('sequelize');
const sequelize = require('../config/database');

class Siswas extends Model {}

Siswas.init({
  id: {
    type: DataTypes.INTEGER,
    primaryKey: true,
    autoIncrement: true
  },

//   nama: DataTypes.STRING,
//   jalur_masuk_id: DataTypes.INTEGER,
//   sekolah_pilihan: DataTypes.STRING,
//   status: DataTypes.STRING
nama_lengkap: DataTypes.STRING,
alamat: DataTypes.STRING,
jalur_masuk_id: DataTypes.STRING,
sekolah_pilihan: DataTypes.STRING,
status: DataTypes.STRING
}, {
  sequelize,
  modelName: 'Siswas',
  tableName: 'pendaftaran',
  timestamps: false
});

module.exports = Siswas;
