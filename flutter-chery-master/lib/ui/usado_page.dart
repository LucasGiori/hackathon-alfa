import 'package:flutter/material.dart';
import 'package:projeto1/funcoes.dart';
import 'package:projeto1/widgets/barra_titulo.dart';
import 'package:projeto1/widgets/circulo_aguarde.dart';
import 'package:projeto1/widgets/lista_dados.dart';

class UsedPage extends StatefulWidget {
  @override
  _UsedPageState createState() => _UsedPageState();
}

class _UsedPageState extends State<UsedPage> {

  final URL_API = "http://localhost:8083/veiculo/findused";
  @override
  Widget build(BuildContext context) {

    return Scaffold(
      appBar:  BarraTitulo.criar("Carros Usados", icone: Icons.directions_car_rounded, tituloCentralizado: true),
      body: Column(
        children: <Widget>[
          Expanded(
            child: FutureBuilder(
              future: Funcoes.getListaJson(URL_API),
              // http://localhost:8083/veiculo/findused
              builder: (context, snapshot) {
                switch (snapshot.connectionState) {
                  case ConnectionState.waiting:
                  case ConnectionState.none:
                    return CirculoAguarde.criar();
                  default:
                    if (snapshot.hasError)
                      return Text(
                          "Houve um Erro!!" + snapshot.error.toString());
                    else
                      return ListaDados.criar(
                          context, snapshot, Funcoes.listNovo);
                }
              }
            ),
          ),
        ],
      ),
    );
  }
}
