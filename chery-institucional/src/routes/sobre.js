const express = require("express");
const router = express.Router();
const { index } = require("../controllers/sobre-controller");

router.get("/", index);

module.exports = router;
