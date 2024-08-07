const Pendaftaran = require('../models/pendaftaranModels');

exports.getPendaftaranWithNullStatus = async (req, res) => {
  try {
    const pendaftarans = await Pendaftaran.findAll({
      where: { status: null },
      attributes: ['id', 'nama_lengkap', 'jalur_masuk_id', 'sekolah_pilihan', 'status']
    });
    res.json(pendaftarans);
  } catch (err) {
    res.status(500).json({ error: err.message });
  }
};


exports.updatePendaftaranStatus = async (req, res) => {
    try {
      const siswa = await Pendaftaran.findByPk(req.params.id);
      if (!siswa) {
        return res.status(404).json({ error: 'Siswa not found' });
      }
      await siswa.update(req.body);
      res.json(siswa);
    } catch (err) {
      res.status(500).json({ error: err.message });
    }
  };
