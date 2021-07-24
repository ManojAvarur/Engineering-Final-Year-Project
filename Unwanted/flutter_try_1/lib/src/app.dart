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
  int counter = 1;
  List<GetURLAndTitle> url_and_title = [];

  getContent() async {
    var responce = await http
        .get(Uri.parse("https://jsonplaceholder.typicode.com/photos/$counter"));

    url_and_title.add(GetURLAndTitle(
        url: jsonDecode(responce.body)["url"],
        title: jsonDecode(responce.body)["title"]));
    print("-------------------------------");
    for (int i = 0; i < url_and_title.length; i++) {
      print(url_and_title[i]);
    }
    print("-------------------------------");
    counter++;
  }

  Widget build(BuildContext context) {
    return MaterialApp(
      home: Scaffold(
        
        floatingActionButton: FloatingActionButton(
          onPressed: getContent,
          child: Icon(Icons.add),
        ),
        appBar: AppBar(
          title: Text("FARMATO"),
        ),
      ),
    );
  }
}

class GetURLAndTitle {
  String url;
  String title;
  GetURLAndTitle({required this.url, required this.title});

  String toString() {
    return "$url = $title";
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
