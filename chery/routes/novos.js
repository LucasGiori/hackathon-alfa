const express = require('express');
const router = express.Router();

router.get('/', (req,res)=>{
    res.render('pages/novos');
});

module.exports=router;