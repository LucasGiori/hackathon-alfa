import 'package:flutter/material.dart';

class TitleBar {
  static Widget create(String title, {IconData icon, centerTitle = true, Color color}){
    return AppBar(
      title: Container(
        child: Row(
          children: [
            Text(title),
          ],
        ),
      ),
      centerTitle: centerTitle,
    );
  }

}