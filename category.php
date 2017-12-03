
<?php include "includes/header.php" ?>
<style>
  .no-break-out {
    overflow:hidden;
    white-space:nowrap;
    text-overflow: ellipsis;
  }
</style>
  <body>

  <?php include "includes/navigation.php" ?>

    <main role="main" class="container">

      <div class=" row row-offcanvas row-offcanvas-right">

        <div class="col-12 col-md-9">
            <h2 class="title">Listing all from
                <?php
                    echo $_GET['name'];
                ?>
            </h2>
          <?php
          $id = $_GET['id'];
          $prepare_statement = $connection->prepare("SELECT * FROM posts WHERE sub_cat_id = ? ORDER BY post_id DESC");
          $prepare_statement->bind_param("s",$id);
          $prepare_statement->execute();
          $select_post = $prepare_statement->get_result();
          while($row_post = mysqli_fetch_array($select_post)) {
            $post_id = $row_post['0'];
            $sub_cat_id = $row_post['1'];
            $user_id = $row_post['2'];
            $post_title = $row_post['3'];
            $post_image = $row_post['4'];
            $post_date = $row_post['5'];
            $post_view = $row_post['6'];
            $post_desc = $row_post['7'];
            $post_tage = $row_post['8'];
            $post_link = $row_post['9'];

            ?>
            <article class="excerpt">
              <div class="focus"><a href="#" class="thumbnail">
                  <img src="img/<?= $post_image; ?>" alt="<?= $post_title; ?>"/></a></div>
              <header>
                <a class="label label-important" href="#">
                  <?php
                  $query_sub_cat = "SELECT * FROM sub_categories WHERE sub_cat_id=$sub_cat_id";
                  $select_sub_cat=mysqli_query($connection,$query_sub_cat);
                  while($row_sub_cat = mysqli_fetch_array($select_sub_cat)) {
                    echo $sub_cat_name = $row_sub_cat['sub_cat_name'];
                  }
                  ?>
                  <i class="label-arrow"></i>
                </a>
                <h2><a href="#" title="<?= $post_title; ?>"><?= $post_title; ?></a></h2>
              </header>
              <p>
                <span class="muted"><i class="fa fa-user icon12"></i>
                  <a href="#">
                    <?php
                      $query_user = "SELECT * FROM users WHERE user_id=$user_id";
                      $select_user=mysqli_query($connection,$query_user);
                      while($row_user = mysqli_fetch_array($select_user)) {
                        echo $name = $row_user['name'];
                      }
                    ?>
                  </a>
                </span>

                <span class="muted"><i class="fa fa-clock-o icon12"></i>
                  <?php
                  $now = date('Y-m-d');
                  if(date_create($post_date)==date_create($now)){
                    echo "Today";
                  }else{
                    $diff=date_diff(date_create($post_date),date_create($now));
                    echo $diff->format("%a days ago");
                  }

                  ?>
                </span>

                <span class="muted"><i class="fa fa-comment icon12"></i>
                  <a href="#"><?= $post_view; ?>&nbsp;Views</a>
                </span>
              </p>
              <p class="note no-break-out">
                <?php
                  if(strlen($post_desc)<=200){
                    echo $post_desc;
                  }else{
                    $shorten= substr($post_desc,0,200). '... ';
                    echo $shorten;
                  }
              ?></p>
            </article>
            <?php
          }
          ?>

        </div><!--/span-->



<?php include "includes/leftbar.php" ?>


      </div><!--/row-->

      <hr>

    </main><!--/.container-->

    <?php include "includes/footer.php" ?>
  </body>

</html>
