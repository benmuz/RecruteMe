<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <script src="bootstrap.min.js"></script>
    <script src="jquery3.1.1.js"></script>
    <script src="cropper.min.js"></script>
    <link href="bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container">
        <div class="card">
            <div class="card-body">
                <input type="file" name="upload_image" id="upload_image"/>
                <br>
                <div id="uploaded_image">

                </div>
            </div>
        </div>

        <div class="modal fade" role="dialog" id="uploadingimageModal">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <button class="close" type="button" data-dismiss="modal">&times;</button>
                        <h4 class="modal-title">Upload and Crop IMage</h4>
                    </div>
                    <div class="modal-body">
                        <div class="row">
                            <div class="col-md-8 text-center">
                                <div id="image_demo" style="width:350px;margin-top: 30px"></div>
                            </div>
                            <div class="col-md-4" style="padding-top: 30px">
                                <br>
                                <br>
                                <br>
                                <button class="btn btn-default crop_image">crop and upload</button>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button class="btn btn-danger" data-dismiss="modal">close</button>
                    </div>
                </div>
            </div>
        </div>
    </div>


<script>
    $(document).ready(function () {
        $image_crop=$('#image_demo').cropped({
            enableExif:true,
            viewport:{
                width:200,
                height:200,
                type:'circle'
            },
            boundary:{
                width:300,
                height:300
            }
        });

        $('#upload_image').change(function () {
            var reader=new FileReader();
            reader.onload=function (event) {
                $image_crop.cropped('bind',{
                    url:event.target.result
                }).then(function () {
                    console.log("oui oui oui");
                });
            }
            reader.readAsDataURL(this.files[0]);
            $('#uploadingimageModal').modal('show');
        });

        $('.crop_image').click(function (event) {
           $image_crop.croppie
        });
    });
</script>
</body>
</html>
