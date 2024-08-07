const { Model, DataTypes } = require('sequelize');
const sequelize = require('../config/database');

class Pendaftaran extends Model {}

Pendaftaran.init({
  id: {
    type: DataTypes.INTEGER,
    primaryKey: true,
    autoIncrement: true
  },
  nama_lengkap: DataTypes.STRING,
  tempat_lahir: DataTypes.STRING,
  tanggal_lahir: DataTypes.DATE,
  jenis_kelamin: DataTypes.STRING,
  agama: DataTypes.STRING,
  alamat: DataTypes.STRING,
  nomor_telepon: DataTypes.STRING,
  email: DataTypes.STRING,
  nama_ayah: DataTypes.STRING,
  pekerjaan_ayah: DataTypes.STRING,
  nama_ibu: DataTypes.STRING,
  pekerjaan_ibu: DataTypes.STRING,
  nama_wali: DataTypes.STRING,
  pekerjaan_wali: DataTypes.STRING,
  nama_sekolah_asal: DataTypes.STRING,
  alamat_sekolah_asal: DataTypes.STRING,
  nisn: DataTypes.STRING,
  tahun_lulus: DataTypes.STRING,
  nilai_rata_rata: DataTypes.STRING,
  jalur_masuk_id: DataTypes.INTEGER,
  sekolah_pilihan: DataTypes.STRING,
  status: DataTypes.STRING
}, {
  sequelize,
  modelName: 'Pendaftaran',
  tableName: 'pendaftaran',
  timestamps: false
});

module.exports = Pendaftaran;
