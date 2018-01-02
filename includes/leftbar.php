<div class="col-6 col-md-3 sidebar-offcanvas" id="sidebar">
    <div class="list-group">

        <div class="leftbar">

              <h2 class="title">Poppulars</h2>
              <ul>
                  <?php
                  $select_query = "SELECT * FROM posts ORDER BY post_view DESC limit 6";
                  $select_post=mysqli_query($connection,$select_query);
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
                      <li class="item"><a href="/page/<?= $post_id; ?>"><img src="/img/<?= $post_image; ?>" alt="<?= $post_image; ?>"/><?= $post_title?></a></li>
                      <?php
                  }
                  ?>
              </ul>

              <h2 class="title">Tags</h2>
              <div class="d_tags">
              <?php
              $query = " SELECT * FROM sub_categories ";
              $select_all_sub_category = mysqli_query($connection,$query);

              while ($row = mysqli_fetch_assoc($select_all_sub_category)){
                  $sub_cat_id = $row['sub_cat_id'];
                  $sub_cat_name = $row['sub_cat_name'];
                  ?>
                  <a  href="/category/<?php echo $sub_cat_id;?>/<?php echo $sub_cat_name ?>"><?php echo $sub_cat_name ?></a>

                <?php } ?>


            
              </div>
        </div>



    </div>
</div><!--/span-->
