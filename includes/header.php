<?php include "includes/db.php";?>
<?php include "includes/function.php" ?>

<!doctype html>
<html lang="en">
<head>
    <script src="https://use.fontawesome.com/41cd343be6.js"></script>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <?php
    if(isset($_GET['id'])){
        $post_id=mysqli_real_escape_string($connection,$_GET['id']);
        //echo $video_id;
       // $query="select * from video_posts where video_id=$video_id";
        //$select_video=mysqli_query($connection,$query);
        $stms=$connection->prepare("SELECT * FROM posts where post_id = ?");
        $stms->bind_param("s",$post_id);
        $stms->execute();
        $select_post=$stms->get_result();
        //$row=$select_video->num_rows;
         while($row= $select_post->fetch_assoc()){
            //$the_video_id=$row['video_id'];

            $post_title=$row['post_title'];
          }echo "<title>$post_title</title>";
      }else {
        echo "<title>Reachsey</title>";
      }
?>


    <!-- Bootstrap core CSS -->
    <link href="/css/bootstrap.min.css" rel="stylesheet">
    <link href="/css/style.css" rel="stylesheet" type="text/css">
    <link href="/css/menu.css" rel="stylesheet" type="text/css">
    <link href="/css/detail.css" rel="stylesheet" type="text/css">

    <!-- Custom styles for this template -->
    <link href="/css/offcanvas.css" rel="stylesheet">
</head>
