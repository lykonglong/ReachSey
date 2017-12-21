<?php include "includes/header.php" ?>
<style>
    .no-break-out {
        overflow:hidden;
        white-space:nowrap;
        text-overflow: ellipsis;
    }
</style>
</head>
  <body>

  <?php include "includes/navigation.php" ?>


  <?php
  if(isset($_GET['action'])){
      $source = $_GET['action'];
  }else{
      $source='';
  }
  switch($source){
      case 'detail';
          include "includes/detail.php";
          break;
      default:
          include "includes/content.php";
  }
  ?>



          <?php include "includes/leftbar.php" ?>


      </div><!--/row-->

      <hr>

  </main><!--/.container-->
    <?php include "includes/footer.php" ?>
  </body>

</html>
