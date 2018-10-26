<?php include ("init.php"); ?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Title</title>
    <link rel="stylesheet" href="bootstrap.css" type="text/css">
</head>
<body>



<?php

$photos=Photo::find_all();

?>


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

                <div class="col-md-12">

                    <table class="table table-hover">
                        <thead>
                        <tr>
                            <th>Photos</th>
                            <th>Id</th>
                            <th>File Name</th>
                            <th>Title</th>
                            <th>Size</th>
                        </tr>
                        </thead>

                        <tbody>

                        <?php foreach ($photos as $photo):   ?>

                            <tr>
                                <td><img src="upload/<?php echo $photo->filename;   ?>" width="162px" alt="php oop blog">
                                    <div class="pictures_link">
                                        <a class="btn-danger" href="delete_photo.php?id=<?php echo $photo->id;  ?>">Delete</a>
                                        <a class="btn-warning" href="3_edit_photo.php?id=<?php echo $photo->id;  ?>">Edit</a>
                                        <a class="btn-success" href="#">View</a>
                                    </div>
                                </td>


                                <td><?php  echo $photo->id; ?></td>
                                <td> <?php  echo $photo->filename;  ?> </td>
                                <td><?php  echo $photo->title;   ?></td>
                                <td><?php  echo $photo->size;   ?></td>
                            </tr>

                        <?php endforeach;   ?>


                        </tbody>
                    </table>




                </div>

            </div>
        </div>
        <!-- /.row -->

    </div>
    <!-- /.container-fluid -->


</div>

</body>
</html>

