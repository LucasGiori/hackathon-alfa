import 'package:flutter/material.dart';
import 'package:transparent_image/transparent_image.dart';

class Imagem {
  static Widget criarImagemWeb(String link, {double w, double h, Decoration decoration}) {
    return  FadeInImage.memoryNetwork(
      placeholder: kTransparentImage,
      image: link,
      height: h,
      width: w,
    );
  }

  static Widget criar(String path, {double w, double h}){
    return Image(
      image: AssetImage(path),
      fit: BoxFit.cover,
      width: w,
      height: h,
    );
  }
}