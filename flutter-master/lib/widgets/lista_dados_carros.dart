import 'package:flutter/cupertino.dart';
import 'package:flutter/material.dart';
import 'package:projeto1/funcoes.dart';
import 'package:projeto1/ui/detalhes_page.dart';
import 'package:projeto1/widgets/imagem.dart';

class ListaDadosCarros {
  static void cliqueItem(BuildContext context, Map dados) {
    Navigator.push(context, MaterialPageRoute(
        builder: (context) => DetalhesPage(dados)
    ));
  }

  static Widget criarItem(Map dados) {

    return


    Row(
      children: [
        Imagem.criarImagemWeb( Funcoes.linkImagem(dados["fotoDestaque"].toString()),
            h: 150, w: 150,
        ),
      Padding(
      padding: const EdgeInsets.symmetric(horizontal: 10),
      ),
        Row(
          children: <Widget>[
            RichText(
              text: TextSpan(
                children: [
                  TextSpan(text: "\n"),
                  TextSpan(text: dados["modelo"].toString(),
                      style:  TextStyle(fontStyle: FontStyle.italic, color: Colors.grey[800], fontWeight: FontWeight.w400,fontSize: 24)
                  ),
                  TextSpan(text: "\n"),
                  TextSpan(text: dados["anomodelo"].toString(),
                      style:  TextStyle(fontStyle: FontStyle.italic, color: Colors.grey[800], fontWeight: FontWeight.w400,fontSize: 24)
                  ),
                ],
              ),
            ),
          ],
        ),
      ],
    );
  }

}