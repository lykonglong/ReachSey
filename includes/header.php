<?php include "includes/db.php";?>
<?php include "includes/function.php" ?>

<!doctype html>
<html lang="en">
<head>
  <script async src="//pagead2.googlesyndication.com/pagead/js/adsbygoogle.js"></script>
  <script>
    (adsbygoogle = window.adsbygoogle || []).push({
      google_ad_client: "ca-pub-6399196011494333",
      enable_page_level_ads: true
    });
  </script>
    <script src="https://use.fontawesome.com/41cd343be6.js"></script>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">


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
          }
          if(isset($_GET['name'])){
            $post_catname=mysqli_real_escape_string($connection,$_GET['name']);
            echo "<meta name='n' content='' />";
            echo "<meta name='keywords' content='' />";
            echo "<title>$post_catname</title>";
          }  else{
            echo "<meta name='n' content='' />";
            echo "<meta name='keywords' content='' />";
            echo "<title>$post_title</title>";
          }
      }else {
        echo "<meta name='description' content='Reachsey,Download下载 Cracked 已付费 破解注册 安装,免费' />";
        echo "<meta name='keywords' content='pro/e,UG,CAD,CAM,CAE,EDA,MacOSX,Android,games,movies,music,音乐,电影,游戏,破解版,注册版,已付费,KeyGen,Crack,Siemens,NX,SolidWorks,AutoCAD,CATIA,Solid Edge,Cimatron,PowerMILL,MasterCAM,ANSYS,TopSolid,MSC' />";

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
