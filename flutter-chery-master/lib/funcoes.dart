import 'package:flutter/material.dart';
import 'dart:convert';
import 'package:http/http.dart' as http;
import 'package:intl/intl.dart';

class Funcoes {
  static const ListaCarro = 1;
  static const listNovo = 2;
  static const listUsado = 3;
  static Widget _criarIconeEspacado(IconData icone, Color cor, double tamanho) {
    return Padding(
      padding: EdgeInsets.all(4),
      child: Icon(icone, color: cor, size: tamanho,),
    );
  }

  static Widget criarIcone(IconData icone, {Color cor, double tamanho}) {
    return icone != null ? _criarIconeEspacado(icone, cor, tamanho) : Container();
  }

  void mostrarMensagem(BuildContext context, String tituloMensagem, String corpoMensagem) {
    showDialog(
        context: context,
        builder: (context) {
          return AlertDialog(
            title: Text(tituloMensagem),
            content: Text(corpoMensagem),
            actions: [
              TextButton(
                child: Text("OK"),
                onPressed: () { _fecharTelaAtual(context); },
              ),
            ],
          );
        }
    );
  }

  void _fecharTelaAtual(BuildContext context) {
    Navigator.pop(context);
  }

  static String linkImagem(String link) {
    return link.replaceAll("~/", "https://run.mocky.io/v3/666ff28b-e6f2-45a1-b3ba-abf0fe996b46");
   //
  }

  static Future<List<dynamic>> getListaJson(String link) async {
    Uri uri = Uri.parse(link);
    http.Response response = await http.get(uri);
    return json.decode(response.body);
  }

  static String getCurrency(value) {
    NumberFormat formatter = NumberFormat.simpleCurrency(locale: 'pt_BR');
    return formatter.format(value);
  }



//dadosMarca = json.decode(dadosCarro["marca"]);
//dadosMarca["descricao"]
}