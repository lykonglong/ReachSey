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
<script>
 $(document).ready(function(){
      $(document).on('click', '#btn_more', function(){
           var postid = $(this).data("pid");

           $('#btn_more').html("Loading...");
           $.ajax({
                url:"includes/load_data.php",
                method:"POST",
                data:{postid:postid},
                dataType:"text",
                success:function(data)
                {
                     if(data != '')
                     {
                          $('#remove_row').remove();
                          $('#load_data').append(data);
                     }
                     else
                     {
                          $('#btn_more').html("No Data");
                     }
                }
           });
      });
 });
 </script>
