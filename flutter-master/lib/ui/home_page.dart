import 'package:flutter/material.dart';
import 'package:projeto1/funcoes.dart';
import 'package:projeto1/widgets/barra_titulo.dart';
import 'package:projeto1/widgets/circulo_aguarde.dart';
import 'package:projeto1/widgets/lista_dados.dart';


class HomePage extends StatefulWidget {
  @override
  _HomePageState createState() => _HomePageState();
}

class _HomePageState extends State<HomePage> {

  @override
  Widget build(BuildContext context) {
    return Scaffold(
      appBar: BarraTitulo.criar("Caoa Chery", icone: Icons.directions_car_rounded, tituloCentralizado: true),
      backgroundColor: Colors.grey[300],
      body: Column(
        children: <Widget>[
          Expanded(
            child: FutureBuilder(
              future: Funcoes.getListaJson("https://run.mocky.io/v3/8a4586eb-bc98-403f-ad2d-4e9bf765bdc4"),
              builder: (context, snapshot){
                switch (snapshot.connectionState) {
                  case ConnectionState.waiting:
                  case ConnectionState.none:
                    return CirculoAguarde.criar();
                  default:
                    if (snapshot.hasError)
                      return Text("Houve um Erro!!" + snapshot.error.toString());
                    else
                      return ListaDados.criar(
                          context, snapshot, Funcoes.ListaCarro
                      );
                }
              },
            ),
          ),
        ],
      ),
    );
  }
}