const express = require("express");
const router = express.Router();
const { home } = require("../controllers/SobreController");

router.get(
    "/", 
    home
);

module.exports = router;
