import 'package:projeto1/funcoes.dart';
import 'package:projeto1/widgets/botao.dart';
import 'package:flutter/material.dart';

class BarraTitulo {

  static Widget criar(String titulo, {IconData icone, IconData iconeAcao, Function eventoAcao, Color corFundo, bool tituloCentralizado = true}) {
    return AppBar(
      backgroundColor: Colors.green[500],
      title: Row(
        children: [
          Funcoes.criarIcone(icone),
          Text(titulo, style: TextStyle( fontSize: 24, fontStyle: FontStyle.italic),),
        ],
      ),
      centerTitle: tituloCentralizado,
      actions: [ _criarBotaoAcao(iconeAcao, eventoAcao), ],
    );
  }

  static Widget _criarBotaoAcao(IconData iconeAcao, Function eventoAcao) {
    return iconeAcao != null ? Botao.criarBotaoBarra(iconeAcao, eventoAcao) : Container();
  }

}