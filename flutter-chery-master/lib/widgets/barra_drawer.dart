import 'dart:ui';
import 'package:flutter/material.dart';
import 'package:projeto1/widgets/imagem.dart';
import '../funcoes.dart';

class BarraDrawer {

  static Widget create(BuildContext context,String titulo,Color bgColor,Color corTexto, List<Map> itensList, { IconData iconeTitulo, String path, double w, double h}){
    return Drawer(
        child: Container(
          color: bgColor,
          child: ListView(
            children: [
              _createBarTitle( titulo, bgColor, path, w, h, iconeTitulo),
              _createListItens(context, itensList),
            ],
          ),
        )
    );
  }

  static Widget _createBarTitle(String titulo, Color bgColor, String path, double w, double h , IconData iconeTitulo) {
    return DrawerHeader(
      decoration: BoxDecoration(
        color: bgColor,
      ),
      child: Column(
        children: [
          Funcoes.criarIcone(iconeTitulo, cor: Colors.black, tamanho: 62),
          Text(titulo , style: TextStyle(fontSize: 32, color: Colors.green[900]),),
        ],
      ),
    );
  }

  static Widget _createListItens(BuildContext context, List<Map> itensList) {
    var list = List<Widget>();
    for (var item in itensList) {
      list.add(_criarItem(context, item["text"],  item["event"]));
    }
    return Column(children: list,);
  }

  static Widget _criarItem(BuildContext context, String text, Function event){
    return ListTile(
        title: Row(
          children: [
            Text(text, style: TextStyle(fontSize: 20, color: Colors.green[900])),
          ],
        ),
        onTap: () {
          Navigator.pop(context);
          event();
        }
    );
  }
}