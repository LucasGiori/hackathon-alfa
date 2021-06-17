import 'package:flutter/material.dart';
import 'package:projeto1/funcoes.dart';
import 'package:projeto1/widgets/barra_titulo.dart';
import 'package:projeto1/widgets/circulo_aguarde.dart';
import 'package:projeto1/widgets/lista_dados.dart';

class NewPage extends StatefulWidget {
  @override
  _NewPageState createState() => _NewPageState();
}

class _NewPageState extends State<NewPage> {

  final URL_API = "http://localhost:8083/veiculo/findnew";
  @override
  Widget build(BuildContext context) {

    return Scaffold(
      appBar:  BarraTitulo.criar("Carros Novos", icone: Icons.directions_car_rounded, tituloCentralizado: true),
      body: Column(
        children: <Widget>[
          Expanded(
            child: FutureBuilder(
              future: Funcoes.getListaJson(URL_API),
              // http://localhost:8083/veiculo/findnew
              builder: (context, snapshot) {
                switch (snapshot.connectionState) {
                  case ConnectionState.waiting:
                  case ConnectionState.none:
                  return CirculoAguarde.criar();
                  default:
                    if (snapshot.hasError)
                      return Text("Houve um Erro!!" + snapshot.error.toString());
                    else
                      return ListaDados.criar(context, snapshot, Funcoes.listNovo);
                }
              },
            ),
          ),
        ],
      ),
    );
  }
}
