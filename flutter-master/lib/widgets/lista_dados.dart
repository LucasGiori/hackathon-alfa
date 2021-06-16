import 'package:flutter/material.dart';
import 'package:projeto1/funcoes.dart';
import 'package:projeto1/widgets/lista_dados_carros.dart';

class ListaDados {
  static Widget criar(BuildContext context, AsyncSnapshot snapshot, int tipo) {
    return ListView.builder(
      padding: EdgeInsets.all(8),
      scrollDirection: Axis.vertical,
      itemCount: snapshot.data.length,
      itemBuilder: (context, index) {
        return GestureDetector(
          onTap: () {
            if (tipo == Funcoes.ListaCarro)
            ListaDadosCarros.cliqueItem(context, snapshot.data[index]);
          },
          child: Card(
            color: Colors.white,
            child: Padding(
              padding: EdgeInsets.all(10),
              child: _retornaLista(tipo, snapshot.data[index]),
            ),
          ),
        );
      },
    );
  }

  static Widget _retornaLista(int tipo, Map dados) {
    switch (tipo) {
      case Funcoes.ListaCarro:
        return ListaDadosCarros.criarItem(dados);
      case Funcoes.ListaCarro:
        return Container();
      default:
        return Container();
    }
  }

}