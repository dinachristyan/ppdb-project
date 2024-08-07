const express = require('express');
const router = express.Router();
const pendaftaranController = require('../controllers/pendaftaranController');

// GET: /pendaftaran/null-status
router.get('/null-status', pendaftaranController.getPendaftaranWithNullStatus);

// PUT: /pendaftaran/:id/status
router.put('/:id/status', pendaftaranController.updatePendaftaranStatus);

module.exports = router;
