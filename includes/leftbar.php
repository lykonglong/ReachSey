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
                      <li class="item"><a href="page.php?action=detail&id=<?= $post_id; ?>"><img src="/img/<?= $post_image; ?>" alt="<?= $post_image; ?>"/><?= $post_title?></a></li>
                      <?php
                  }
                  ?>
              </ul>

              <h2 class="title">Tags</h2>
              <div class="d_tags">
                  <a  href="tags8f8b.html?/%D7%DB%BA%CF%BD%CC%B3%CC/"> 3D Animation (127) </a>
                  <a  href="tags8f8b.html?/%D7%DB%BA%CF%BD%CC%B3%CC/"> Photoshop (44) </a>
                  <a  href="tags8f8b.html?/%D7%DB%BA%CF%BD%CC%B3%CC/"> Windows (13) </a>
                  <a  href="tags8f8b.html?/%D7%DB%BA%CF%BD%CC%B3%CC/"> Udemy (20) </a>
                  <a  href="tags8f8b.html?/%D7%DB%BA%CF%BD%CC%B3%CC/"> Lynda (50) </a>
                  <a  href="tags8f8b.html?/%D7%DB%BA%CF%BD%CC%B3%CC/"> Plural Sight (200) </a>
                  <a  href="tags8f8b.html?/%D7%DB%BA%CF%BD%CC%B3%CC/"> Tutorials (1500) </a>
                  <a  href="tags8f8b.html?/%D7%DB%BA%CF%BD%CC%B3%CC/"> Design (200) </a>
              </div>
        </div>



    </div>
</div><!--/span-->
