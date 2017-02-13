# test_x3dom
![license](https://img.shields.io/badge/license-apache-blue.svg)
![WebGL:x3dom](https://img.shields.io/badge/WebGL-x3dom-green.svg)

testing visualization of neurons and brain by using x3dom

## Examples
- [CNSPF](https://cns.neuroinf.jp) : https://cns.neuroinf.jp/modules/pico/index.php?content_id=11
- https://cns.neuroinf.jp/x3d/

## Screenshot

![Screenshot](https://github.com/DaisukeMiyamoto/test_x3dom/blob/master/docs/screenshot.png?raw=true)


## to make volume rendering image
1. open 3d stacked tif image by Fiji/ImageJ
1. adjust image size about **128 px x 128 px x 128 slice**
1. save as sequential tif image
1. stitch sequential images by Grid/Collection Stitching Plugin in Fiji/ImageJ

![Screenshot](https://github.com/DaisukeMiyamoto/test_x3dom/blob/master/x3d/volume_data/1089_050622_4f4a_sn_stitch.png?raw=true)


## Related work
- swc2vtk: https://github.com/DaisukeMiyamoto/swc2vtk

## Reference
- https://www.x3dom.org/
- https://doc.x3dom.org/author/index.html
- https://x3dom.org/docs-old/tutorial/aopt.html : tool for optimizing and generating binary geometry for x3d
