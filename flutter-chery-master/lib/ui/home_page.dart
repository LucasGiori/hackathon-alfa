import 'package:flutter/material.dart';
import 'package:projeto1/funcoes.dart';
import 'package:projeto1/ui/usado_page.dart';
import 'package:projeto1/widgets/barra_drawer.dart';
import 'package:projeto1/widgets/barra_titulo.dart';
import 'package:projeto1/widgets/circulo_aguarde.dart';
import 'package:projeto1/widgets/lista_dados.dart';

import 'novo_usado.dart';

class HomePage extends StatefulWidget {
  @override
  _HomePageState createState() => _HomePageState();
}

class _HomePageState extends State<HomePage> {

  @override
  Widget build(BuildContext context) {

    final URL_API = "http://localhost:8083/veiculo/all";

    List<Map> itensList = [
      {"text" : "Carros Novos", "icone" : Icons.directions_car_rounded, "event" : _listNovo},
      {"text" : "Carros Usados", "icone" : Icons.directions_car_rounded, "event" : _listUsado},
    ];

    return Scaffold(
      appBar: BarraTitulo.criar("Caoa Chery", icone: Icons.directions_car_rounded, tituloCentralizado: true),
      backgroundColor: Colors.grey[300],
      drawer: BarraDrawer.create(
       context, "Chery Veículos",Colors.grey[300], Colors.white, itensList, iconeTitulo:  Icons.add_business_sharp
      ),
      body: Column(
        children: <Widget>[
          Expanded(
            child: FutureBuilder(
              future: Funcoes.getListaJson(URL_API),
              // http://localhost:8083/veiculo/all
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

  void _listNovo(){
    Navigator.push(context, MaterialPageRoute(
        builder: (context) => NewPage()
    ));
  }
  void _listUsado(){
    Navigator.push(context, MaterialPageRoute(
        builder: (context) => UsedPage()
    ));
  }
}