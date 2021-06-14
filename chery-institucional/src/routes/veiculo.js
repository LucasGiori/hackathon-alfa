const express = require("express");
const router = express.Router();
const { index, show, findNews, findUseds } = require("../controllers/veiculo-controller");

router.get("/", index);
router.get("/new", findNews);
router.get("/used", findUseds);
router.get("/id/:id", show);

module.exports = router;
