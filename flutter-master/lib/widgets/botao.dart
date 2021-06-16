import 'package:flutter/material.dart';
import 'package:projeto1/funcoes.dart';

class Botao {

  static Widget criar(String texto, Function clique, {IconData icone, double tamanhoBotao = 150}) {
    return ElevatedButton(
      child: Container(
      width: tamanhoBotao,
      child: Row(
        mainAxisAlignment: MainAxisAlignment.center,
        children: [
          Funcoes.criarIcone(icone),
          Text(texto, style: TextStyle(color: Colors.white, fontSize: 25),),
        ],
      ),
    ),
    onPressed: clique,
    );
  }

  static Widget criarBotaoBarra(IconData icone, Function evento) {
    return IconButton(
      icon: Funcoes.criarIcone(icone),
      onPressed: evento,
    );
  }

  static Widget criarBotaoFlutuante(IconData icone, Function evento) {
    return FloatingActionButton(
      backgroundColor: Colors.green[900],
      child: Funcoes.criarIcone(icone),
      onPressed: evento,
    );
  }
}