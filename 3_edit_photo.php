<?php include ("init.php"); ?>





<?php


if (empty($_GET['id'])){

    redirect("photos.php");

}else{

    $photo=Photo::find_by_id($_GET['id']);

    if (isset($_POST['update'])){

        if ($photo){

            $photo->title=$_POST['title'];
            $photo->caption=$_POST['caption'];
            $photo->alternate_text=$_POST['alternate_text'];
            $photo->description=$_POST['description'];

            $photo->save();

        }


    }


}



//$photos=Photo::find_all();

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
                    Photos
                    <small>Subheading</small>
                </h1>


                <form action="" method="post">


                    <div class="col-md-8">

                        <div class="form-group">
                            <input type="text" class="form-control" value="<?php echo $photo->title;?>" name="title">
                        </div>


                        <div class="form-group">

                            <a class="thumbnail" href=""><img src="upload/<?php echo $photo->filename; ?>" class="img-responsive" width="300px" alt=""></a>

                        </div>


                        <div class="form-group">
                            <label for="caption">Caption</label>
                            <input type="text" name="caption" value="<?php echo $photo->caption; ?>" class="form-control">
                        </div>


                        <div class="form-group">
                            <label for="caption">Alternate Texts</label>
                            <input type="text" name="alternate_text" value="<?php echo $photo->alternate_text;  ?>" class="form-control">
                        </div>


                        <div class="form-group">
                            <label for="caption">Description</label>
                            <textarea class="form-control" name="description" id="" cols="30" rows="10"><?php echo $photo->description; ?>
                    </textarea>

                        </div>
                    </div>




                    <div class="col-md-4">
                        <div class="photo-info-box">
                            <div class="info-box-header">
                                <h4>save <span id="toggle" class="glypicon"></span></h4>
                            </div>


                            <div class="inside">



                                <div class="info-box-footer clearfix">

                                    <div class="info-box-delete pull-left">
                                        <a href="delete_photo.php?id=<?php echo $photo->id; ?>" class="btn btn-danger btn-lg">Delete</a>
                                    </div>

                                    <div class="info-box-update pull-right">
                                        <input type="submit" name="update" value="update" class="btn btn-warning btn-lg">
                                    </div>


                                </div>
                            </div>
                        </div>
                    </div>

                </form>

            </div>






        </div>




    </div>
    <!-- /.row -->




</div>


















</body>
</html>

