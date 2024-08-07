const Siswas = require('../models/siswasModels');

exports.createSiswa = async (req, res) => {
  try {
    const siswa = await Siswas.create(req.body);
    res.status(201).json(siswa);
  } catch (err) {
    res.status(500).json({ error: err.message });
  }
};

exports.getAllSiswas = async (req, res) => {
  try {
    const siswas = await Siswas.findAll();
    res.json(siswas);
  } catch (err) {
    res.status(500).json({ error: err.message });
  }
};

exports.getSiswaById = async (req, res) => {
    const id = req.params.id

    if (!id) {
        return res.status(404).json({ error: 'Siswa tidak ditemukan' })
    }

    try {
        const siswa = await Siswas.findByPk(id)
        res.json(siswa)
    } catch {
        res.status(500).json({ error: 'Error fetchind data siswa with ID' + id })
    }
}

exports.updateSiswa = async (req, res) => {
  try {
    const siswa = await Siswas.findByPk(req.params.id);
    if (!siswa) {
      return res.status(404).json({ error: 'Siswa not found' });
    }
    await siswa.update(req.body);
    res.json(siswa);
  } catch (err) {
    res.status(500).json({ error: err.message });
  }
};

exports.deleteSiswa = async (req, res) => {
  try {
    const siswa = await Siswas.findByPk(req.params.id);
    if (!siswa) {
      return res.status(404).json({ error: 'Siswa not found' });
    }
    await siswa.destroy();
    res.status(204).end();
  } catch (err) {
    res.status(500).json({ error: err.message });
  }
};
