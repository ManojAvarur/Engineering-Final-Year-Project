import 'package:flutter/material.dart';
import 'dart:convert';
import 'package:http/http.dart' as http;

class App extends StatefulWidget {
  @override
  State<StatefulWidget> createState() {
    return AppState();
  }
}

class AppState extends State<App> {
  Widget build(BuildContext context)  {
    return MaterialApp(
      home: Scaffold(
        floatingActionButton: FloatingActionButton(
          onPressed: () async {
            var responce =  await http.get( Uri.parse("https://jsonplaceholder.typicode.com/photos/1"));
            print( jsonDecode( responce.body ) );
          },
          child: Icon(Icons.add),
        ),
        appBar: AppBar(
          title: Text("FARMATO"),
        ),
      ),
    );
  }
}

// class App extends StatelessWidget{

//   Widget build(BuildContext context) {
//     return MaterialApp(
//       home: Scaffold(
//         appBar: AppBar(
//           title: Text("FARMATO"),
//         ),
//       ),
//     );
//   }

// }
