const express = require('express');
const router = express.Router();
const siswasController = require('../controllers/siswasController');

// CREATE: /siswas
router.post('/post', siswasController.createSiswa);

// READ: /siswas
router.get('/get', siswasController.getAllSiswas);

// READ: /siswas/:id
router.get('/get/:id', siswasController.getSiswaById);

// UPDATE: /siswas/:id
router.put('/put/:id', siswasController.updateSiswa);

// DELETE: /siswas/:id
router.delete('/delete/:id', siswasController.deleteSiswa);

module.exports = router;
