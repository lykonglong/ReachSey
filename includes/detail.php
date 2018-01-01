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
            $user_id=$row['user_id'];
            $sub_cat_id=$row['sub_cat_id'];
            $post_title=$row['post_title'];
            $post_image = $row['post_image'];
            $post_date = $row['post_date'];
            $post_view = $row['post_view'];
            $post_desc = $row['post_desc'];
            $post_tage=$row['post_tage'];
            $down_link=$row['down_link'];

              $query_sub_cat = "SELECT * FROM sub_categories WHERE sub_cat_id=$sub_cat_id";
              $select_sub_cat=mysqli_query($connection,$query_sub_cat);
              while($row_sub_cat = mysqli_fetch_array($select_sub_cat)) {
                   $sub_cat_name = $row_sub_cat['sub_cat_name'];
                   $cat_id= $row_sub_cat['cat_id'];
              }

              $query_cat = "SELECT * FROM categories WHERE cat_id=$cat_id";
              $select_cat=mysqli_query($connection,$query_cat);
              while($row_cat = mysqli_fetch_array($select_cat)) {
                   $cat_name = $row_cat['cat_name'];

              }


              $query_user = "SELECT * FROM users WHERE user_id=$user_id";
              $select_user=mysqli_query($connection,$query_user);
              while($row_user = mysqli_fetch_array($select_user)) {
                   $name = $row_user['name'];
              }
//UPDATE `posts` SET `post_view`='1' WHERE (`post_id`='10') LIMIT 1


          }
          $add_view = $post_view + 1;
          $query_update_view = "update posts set post_view = $add_view where post_id=$post_id";
          $view_update=mysqli_query($connection,$query_update_view);


      }

  ?>


    <body>
    <main role="main" class="container">

      <div class=" row row-offcanvas row-offcanvas-right">

        <div class="col-12 col-md-9">
              <div class="breadcrumbs"><a href="/index"><i class="fa fa-home" aria-hidden="true" ></a></i>&nbsp;<small>&gt;</small> <a href="/category/<?php echo $cat_name ."/". $cat_id;?>"<span class="muted"><?php echo $cat_name;?></span> </a><small>&gt;</small><a href="/category/<?php echo $sub_cat_id ."/". $sub_cat_name;?>"><span class="muted"><?php echo $sub_cat_name;?></span></a><small>&gt;</small> <span class="muted"><?php echo $post_title;?> </span></div>
            <!-- <h2 class="title">Detail Page</h2> -->
            <header class="article-header">
                <h1 class="article-title"><a href="#"><?php echo $post_title;?></a></h1>
                <div class="meta">
                    <span class="muted"><a href="/category/<?= $sub_cat_id ?>/<?= $sub_cat_name ?>"><i class="fa fa-list icon12"></i> &nbsp;<?php echo $sub_cat_name; ?></a></span>
                    <span class="muted"><i class="fa fa-user icon12"></i> <a href="#"><?php echo $name;?></a></span>
                    <time class="muted"><i class="fa fa-clock-o icon12"></i>&nbsp;<?php echo $post_date; ?></time>
                    <span class="muted"><i class="fa fa-eye icon12"></i> <?php echo $post_view;?></span> </div>
            </header>
            <article class="article-content">
              <p><img class="aligncenter" src="/img/<?= $post_image ?>" alt="<?= $post_title ?>"></p>

              <div class="text-center"><b><?= $post_title ?></b></div>
                <?php echo $post_desc;?>
                <hr>
                  <p>Download Link<br>
                    <a href="<?php echo $down_link ?>" rel="nofollow" class="external" target="_blank" data-original-title="" title="">Download</a></p>

                                <nav class="article-nav">

                                </nav>

                                <div class="relates">

                                <h3>Related Posts</h3>
            </article>
        </div>
          <!--/span-->
