import 'package:flutter/cupertino.dart';
import 'package:flutter/material.dart';
import 'package:projeto1/funcoes.dart';
import 'package:projeto1/widgets/barra_titulo.dart';
import 'package:projeto1/widgets/imagem.dart';
import 'package:share/share.dart';

class DetalhesPage extends StatelessWidget {
  final Map dadosCarro;

  DetalhesPage(this.dadosCarro);

  @override
  Widget build(BuildContext context) {

    //var dadosMarca = Funcoes.getJson(dadosCarro["marca"]);

    return Scaffold(
      appBar: BarraTitulo.criar(dadosCarro["modelo"], icone: Icons.directions_car_rounded, iconeAcao: Icons.share, eventoAcao: _compartilhar),
      backgroundColor: Colors.white,
      body: Column(
        crossAxisAlignment: CrossAxisAlignment.center,
        children: <Widget>[
          Container(
              margin: EdgeInsets.only(top: 5, bottom: 5, left: 5, right: 5),
            child: Column(
                children: <Widget>[
                  Imagem.criarImagemWeb(
            Funcoes.linkImagem(dadosCarro["fotoDestaque"].toString()),
              h: 200, w: 350,

            )]
            ),
          ),

          SizedBox(
            height: 350,
            child: Stack(
              children: <Widget>[
                Container(
                  margin: EdgeInsets.only(top: 20,left: 10,right: 10),
                  height: 500,
                  decoration: BoxDecoration(
                    color: Colors.grey[300],
                    borderRadius: BorderRadius.only(
                      topLeft: Radius.circular(24),
                      topRight: Radius.circular(24),
                      bottomLeft: Radius.circular(24),
                      bottomRight: Radius.circular(24),
                    )
                  ),
                ),
                Padding(
                    padding: const EdgeInsets.symmetric(horizontal: 30, vertical: 30),
                    child: Column(
                      children: <Widget>[
                        Text("\n"),
                        Text("Detalhes",style: Theme.of(context).textTheme.headline4.copyWith(
                          color: Colors.green[900], fontWeight: FontWeight.w900),
                        ),

                        Row(
                          children: <Widget>[
                          RichText(
                            text: TextSpan(
                              children: [
                                TextSpan(text: "\n"),
                                TextSpan(text: "\n"),
                                TextSpan(text: "\n"),
                                TextSpan(text: "Valor: R\$ " + dadosCarro["valor"].toString(),
                                    style:  TextStyle(fontStyle: FontStyle.italic, color: Colors.grey[800], fontWeight: FontWeight.w700,fontSize: 24)
                                ),
                                TextSpan(text: "\n"),
                                TextSpan(text: "Ano: " + dadosCarro["anomodelo"].toString(),
                                  style:  TextStyle(fontStyle: FontStyle.italic, color: Colors.grey[800], fontWeight: FontWeight.w700,fontSize: 24)
                                ),
                                TextSpan(text: "\n"),
                                TextSpan(text: "Veículo: " + dadosCarro["tipo"].toString(),
                                    style:  TextStyle(fontStyle: FontStyle.italic, color: Colors.grey[800], fontWeight: FontWeight.w700,fontSize: 24)
                                ),
                                TextSpan(text: "\n"),
                                TextSpan(text: "Marca: " + dadosCarro["marca"]["descricao"].toString(),
                                    style:  TextStyle(fontStyle: FontStyle.italic, color: Colors.grey[800], fontWeight: FontWeight.w700,fontSize: 24)
                                ),
                                TextSpan(text: "\n"),
                                TextSpan(text: "Cor: " + dadosCarro["cor"]["descricao"].toString(),
                                    style:  TextStyle(fontStyle: FontStyle.italic, color: Colors.grey[800], fontWeight: FontWeight.w700,fontSize: 24)
                                ),
                          ],
                          ),
                          ),
                          ],
                       ),
                      ],
                    ),
                )
              ],
            ),
          )
        ],
      ),
    );
  }

  void _compartilhar() {
    Share.share("Nome: " + dadosCarro["modelo"].toString());
  }

}