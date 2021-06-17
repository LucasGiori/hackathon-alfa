const express = require("express");
const router = express.Router();
const { home, getVeiculoById, getVeiculoUsados, getVeiculosNovos } = require("../controllers/VeiculoController");

router.get(
    "/", 
    home
);
router.get(
    "/novos", 
    getVeiculosNovos
);
router.get(
    "/usados", 
    getVeiculoUsados
);
router.get(
    "/:id", 
    getVeiculoById
);

module.exports = router;
