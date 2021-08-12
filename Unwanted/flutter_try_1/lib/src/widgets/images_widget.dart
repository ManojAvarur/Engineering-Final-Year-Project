import 'package:flutter/material.dart';
import '../models/image_models.dart';

class ImageWidget extends StatelessWidget {
  final List<ImageModel> images;
  ImageWidget(this.images);

  @override
  Widget build(BuildContext context) {
    return ListView.builder(
      itemCount: images.length,
      itemBuilder: (context, int index) {
        return buildImage(images[index]);
      },
    );
  }

  Widget buildImage(ImageModel image) {
    return Container(
      padding: EdgeInsets.all(20.0),
      margin: EdgeInsets.all(20.0),
      decoration: BoxDecoration(
        border: Border.all(
          width: 3.0,
          color: Colors.grey,
        ),
      ),
      child: Column(
        children: <Widget>[
          Padding(
            child: Image.network(image.url),
            padding: EdgeInsets.only( bottom: 8.0 ),
          ),
          Center( 
            child: Text(image.title),
          ),
        ],
      )
    );
  }
}
