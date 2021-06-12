const express = require('express');
const router = express.Router();

/* GET home page. */
router.get('/', (req, res)=> {
  res.render('layouts/index');
});

module.exports = router;
