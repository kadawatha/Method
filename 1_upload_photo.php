<?php include ("init.php"); ?>





<?php




$message="";

if (isset($_POST['submit'])){

    $photo=new Photo();
    $photo->title=$_POST['title'];
    $photo->set_file($_FILES['file_upload']);


    if ($photo->save()){
        $message="uploaded success fully";
    }else{
        $message=join("<br>",$photo->errors);
    }



}




?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Title</title>
    <link rel="stylesheet" href="bootstrap.css" type="text/css">
</head>
<body>



<nav class="navbar navbar-default">
    <div class="container-fluid">
        <!-- Brand and toggle get grouped for better mobile display -->
        <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="#">Brand</a>
        </div>

        <!-- Collect the nav links, forms, and other content for toggling -->
        <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
            <ul class="nav navbar-nav navbar-right">
                <li><a href="2_view_photo.php">View</a></li>
                <li><a href="1_upload_photo.php">Upload</a></li>
            </ul>
        </div><!-- /.navbar-collapse -->
    </div><!-- /.container-fluid -->
</nav>











<div id="page-wrapper">



    <div class="container-fluid">

        <!-- Page Heading -->
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">
                    Upload
                    <small>Subheading</small>
                </h1>





                <div class="col-md-6">
                    <form action="" method="post" enctype="multipart/form-data">


                        <div class="form-group">
                            <input type="text" name="title" class="form-control">
                        </div>

                        <div class="form-group">
                            <input type="file" name="file_upload">
                        </div>


                        <input  type="submit" class="btn btn-warning" name="submit">


                    </form>
                </div>






            </div>
        </div>
        <!-- /.row -->

    </div>
    <!-- /.container-fluid -->


</div>



</body>
</html>







































