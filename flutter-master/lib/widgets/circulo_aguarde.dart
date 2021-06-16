import 'package:flutter/material.dart';

class CirculoAguarde {
  static Widget criar({Color cor = Colors.green}) {
    return Center(
      child: CircularProgressIndicator(
        valueColor: AlwaysStoppedAnimation<Color>(cor),
        strokeWidth: 5,
      ),
    );
  }
}