import 'package:flutter/material.dart';
import 'dart:convert';
import 'package:http/http.dart' as http;
import 'models/image_models.dart';
import 'widgets/images_widget.dart';
class App extends StatefulWidget {
  @override
  State<StatefulWidget> createState() {
    return AppState();
  }
}

class AppState extends State<App> {
  int counter = 1;
  List<ImageModel> url_and_title = [];

  getContent() async {
    var responce = await http.get(Uri.parse("https://jsonplaceholder.typicode.com/photos/$counter"),);

    url_and_title.add( ImageModel.fromJson( json.decode(responce.body) ) );

    print("-------------------------------");
    for (int i = 0; i < url_and_title.length; i++) {
      print(url_and_title[i]);
    }
    print("-------------------------------");
    

    setState(() {
      counter++;
    });
  }

  Widget build(BuildContext context) {
    return MaterialApp(
      home: Scaffold(
        appBar: AppBar(
          title: Text("FARMATO"),
        ),
        body: ImageWidget( url_and_title ),
        floatingActionButton: FloatingActionButton(
          onPressed: getContent,
          child: Icon(Icons.add),
        ),
      ),
    );
  }
}

