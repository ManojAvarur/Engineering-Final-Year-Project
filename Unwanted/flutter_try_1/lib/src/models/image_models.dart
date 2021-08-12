class ImageModel {
  late String url;
  late String title;
  late int id;

  ImageModel({required this.id, required this.url, required this.title});

  ImageModel.fromJson(Map<String, dynamic> parseJson) {
    id = parseJson["id"];
    url = parseJson["url"];
    title = parseJson["title"];
  }

  // --------- ( OR ) -----------------

  // ImageModel.fromJson_using_online_constructor(Map<String, dynamic> parseJson)
  //     : id = parseJson["id"],
  //       url = parseJson["url"],
  //       title = parseJson["title"];
}
