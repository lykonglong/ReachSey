

<style>

</style>
  <body>





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

          }
      }

  ?>

    <main role="main" class="container">

      <div class=" row row-offcanvas row-offcanvas-right">

        <div class="col-12 col-md-9">
              <div class="breadcrumbs"><a href="index.php"><i class="fa fa-home" aria-hidden="true" ></a></i>&nbsp;<small>&gt;</small> <span class="muted"><?php echo $cat_name;?></span> <small>&gt;</small><span class="muted"><?php echo $sub_cat_name;?></span><small>&gt;</small> <span class="muted"><?php echo $post_title;?> </span></div>
            <!-- <h2 class="title">Detail Page</h2> -->
            <header class="article-header">
                <h1 class="article-title"><a href="#"><?php echo $post_title;?></a></h1>
                <div class="meta">
                    <span class="muted"><a href="category.php?id=<?= $sub_cat_id ?>&name=<?= $sub_cat_name ?>"><i class="fa fa-list icon12"></i> &nbsp;<?php echo $sub_cat_name; ?></a></span>
                    <span class="muted"><i class="fa fa-user icon12"></i> <a href="#"><?php echo $name;?></a></span>
                    <time class="muted"><i class="fa fa-clock-o icon12"></i>&nbsp;<?php echo $post_date; ?></time>
                    <span class="muted"><i class="fa fa-eye icon12"></i> <a href="#"><?php echo $post_view;?></a></span> </div>
            </header>
            <article class="article-content">
              <p><img class="aligncenter" src="../img/<?= $post_image ?>" alt="<?= $post_title ?>"></p>

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

















            <!--<article class="article-content">
                <p><b>Human Solutions Ramsis 3.8 | 247.0 mb</b></p>
                <p>Human Solutions GmbH, a world market leader for bodyscanning , has presented version 3.8 of Ramsis in Catia, is a highly accurate simulation software program for a wide range of design and construction analyses.</p>
                <p>Changes such as re-designs and new space-saving concepts cost time and money. With RAMSIS, you can make your development more cost-effective, considerably faster and much better too. It’s no wonder either, because RAMSIS technology is constantly being further developed in close cooperation with leading automotive industry companies.</p>
                <p>RAMSIS addresses demands on ergonomics, comfort and safety as early as the planning stage. You have a virtually infinite number of attempts to find the optimal solution ― and you’ll need considerably fewer physical test benches, because RAMSIS is based on the world’s largest representative body dimension database and a sophisticated ergonomic simulation environment. This allows studies to be repeated as many times as you wish ― and always with exactly the same conditions. So you can design your vehicles in such a way that they comply exactly with DIN specifications, enabling any size of person to drive comfortably in every single one.</p>
                <div class="image"><a href="http://www.0daydown.com/wp-content/uploads/2015/12/0039c680.jpeg"><img class="alignnone" src="http://www.0daydown.com/wp-content/uploads/2015/12/0039c680.jpeg" alt="Human Solutions Ramsis 3.8" width="938" height="804" /></a></div>
                <p>The 3D CAD manikin RAMSIS is a highly accurate simulation software program for a wide range of design and construction analyses. RAMSIS is available as a stand-alone application for Windows or as a seamless integration with CATIA 5. Here designers can directly access all RAMSIS functions within their accustomed work environments. The most time-consuming import or export of geometries can be dispensed with, because users no longer have to familiarize themselves with a new CAD program to be able to carry out efficient ergonomic analyses.</p>
                <p>With RAMSIS in CATIA V5 users can benefit from fast creation of realistic human figures (manikins) based on international databases, high quality manikin display and automatic calculation of realistic driver postures in CATIA models based on extensive research on real drivers.</p>
                <div class="image"><img src="http://www.0daydown.com/wp-content/uploads/2015/12/0039c67e.jpeg" alt="Human Solutions Ramsis 3.8" /></div>
                <p><i>About Human Solutions GmbH</i></p>
                <p>The world market leader for bodyscanning offers body dimension data and ergonomics simulation in CAD for size &amp; fit optimization in the apparel industry. The company has the world’s largest representative database for body dimension data. Flagship products are iSize for size &amp; fit optimization and avatar generation, 3D bodyscanners for the contact-free and lightning-fast taking of measurements, Anthroscan for performing serial measurements and Intailor for computer-supported customized clothing.</p>
                <p><b>Name: </b>Human Solutions Ramsis 3.8<br />
                    <b>Version: </b>(64bit) 3.8.36-1.21.0<br />
                    <b>Home:</b> <a href="http://www.human-solutions.com/" rel="nofollow" class="external" target="_blank">http://www.human-solutions.com</a><br />
                    <b>Interface: </b>english<br />
                    <b>OS:</b> Windows XP / Vista / 7even<br />
                    <b>System Requirements:</b> DSS CATIA V5R19 64bit<br />
                    <b>Size: </b>247.0 mb</p>
                <hr />
                <p>Download uploaded<br />
                    <a href="https://uploaded.net/file/3yd4v1an/anHSoRC38.rar" rel="nofollow" class="external" target="_blank">http://uploaded.net/file/3yd4v1an/anHSoRC38.rar</a></p>
                <p>DDownload nitroflare<br />
                    <a href="https://www.nitroflare.com/view/0AD32162BED345A/anHSoRC38.rar" rel="nofollow" class="external" target="_blank">http://www.nitroflare.com/view/0AD32162BED345A/anHSoRC38.rar</a></p>
                <p>Download 城通网盘<br />
                    <a href="http://page88.ctfile.com/file/135834170" rel="nofollow" class="external" target="_blank">http://page88.ctfile.com/file/135834170</a></p>
                <p>Download 百度云<br />
                    <a href="https://pan.baidu.com/s/1jGGsAzW" rel="nofollow" class="external" target="_blank">http://pan.baidu.com/s/1jGGsAzW</a></p>
            </article>-->

        </div>
          <!--/span-->


</html>
