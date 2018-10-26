

<?php include ("init.php"); ?>




<?php

if (empty($_GET['id'])){

    $gourl="2_view_photo.php";
    echo '<META HTTP-EQUIV="Refresh" Content="0; URL='.$gourl.'">';
    exit;/**/

}



$photo=Photo::find_by_id($_GET['id']);
if ($photo){

    $photo->delete_photo();
    $gourl="2_view_photo.php";
    echo '<META HTTP-EQUIV="Refresh" Content="0; URL='.$gourl.'">';
    exit;/**/

}else{
    $gourl="2_view_photo.php";
    echo '<META HTTP-EQUIV="Refresh" Content="0; URL='.$gourl.'">';
    exit;/**/
}









?>