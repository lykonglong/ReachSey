<!DOCTYPE html>
<html>
<title>Wellcome to control panel</title>
<?php
session_start();
//error_reporting(0);
require_once "../includes/db.php";
include 'include/function.php';
include '../_config_inc.php';

if($_SESSION['user_id'])
{
    $user_id = $_SESSION['user_id'];
    $user_name = $_SESSION['user_name'];
    $user_role = $_SESSION['user_role'];

    $s_user = "SELECT * FROM users WHERE user_id=$user_id";
    $run_s_user = mysqli_query($connection,$s_user);
    while($row = mysqli_fetch_assoc($run_s_user)) {
        $user_name=$row['user_name'];
        $name = $row['name'];

        $user_password = $row['user_password'];
    }

    ?>
    <!--This is header include-->
    <?php include "include/header.php"; ?>
    <body class="hold-transition skin-blue sidebar-mini">
    <div class="wrapper">

        <!--This is header include-->

        <?php include "include/navigation.php"; ?>
        <!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper">
            <!-- Content Header (Page header) -->
            <section class="content-header">
                <h1>
                    Dashboard
                    <small>Control panel</small>
                </h1>
                <ol class="breadcrumb">
                    <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
                    <li class="active">Dashboard</li>
                </ol>
            </section>

            <!-- Main content -->
            <section class="content">
                <!-- Small boxes (Stat box) -->
                <div class="row">
                    <div class="col-lg-3 col-xs-6">
                        <!-- small box -->
                        <div class="small-box bg-aqua">
                            <div class="inner">
                                <h3><?php echo countPost(); ?> </h3>

                                <p>All Posts</p>
                            </div>
                            <div class="icon">
                                <i class="ion ion-videocamera"></i>
                            </div>
                            <a href="posts.php" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
                        </div>
                    </div>
                    <!-- ./col -->
                    <div class="col-lg-3 col-xs-6">
                        <!-- small box -->
                        <div class="small-box bg-green">
                            <div class="inner">
                                <h3><?php echo countCategory(); ?> </h3>

                                <p>Categories</p>
                            </div>
                            <div class="icon">
                                <i class="ion ion-briefcase"></i>
                            </div>
                            <a href="category.php" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
                        </div>
                    </div>
                    <!-- ./col -->
                    <div class="col-lg-3 col-xs-6">
                        <!-- small box -->
                        <div class="small-box bg-yellow">
                            <div class="inner">
                                <h3><?php echo countSubCategory(); ?>  </h3>

                                <p>Sub Categories</p>
                            </div>
                            <div class="icon">
                                <i class="ion ion-images"></i>
                            </div>
                            <a href="slide.php" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
                        </div>
                    </div>
                    <!-- ./col -->
                    <div class="col-lg-3 col-xs-6">
                        <!-- small box -->
                        <div class="small-box bg-red">
                            <div class="inner">
                                <h3> <?php echo countPostTrash(); ?></h3>

                                <p>Posts in trash</p>
                            </div>
                            <div class="icon">
                                <i class="ion ion-trash-a"></i>
                            </div>
                            <a href="trash.php" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
                        </div>
                    </div>
                    <!-- ./col -->
                </div>
                <!-- /.row -->

            </section>
            <!-- /.content -->
        </div>
        <!-- /.content-wrapper -->
        <!--This is footer include-->
        <?php include "include/footer.php"; ?>

    </div>
    <!-- ./wrapper -->

    <!-- jQuery 2.2.3 -->
    <script src="../plugins/jQuery/jquery-2.2.3.min.js"></script>
    <!-- Bootstrap 3.3.6 -->
    <script src="../bootstrap/js/bootstrap.min.js"></script>
    <!-- DataTables -->
    <script src="../plugins/datatables/jquery.dataTables.min.js"></script>
    <script src="../plugins/datatables/dataTables.bootstrap.min.js"></script>
    <!-- Slimscroll -->
    <script src="../plugins/slimScroll/jquery.slimscroll.min.js"></script>
    <!-- FastClick -->
    <script src="../plugins/fastclick/fastclick.js"></script>
    <!-- AdminLTE App -->
    <script src="../dist/js/app.min.js"></script>
    <!-- AdminLTE for demo purposes -->
    <script src="../dist/js/demo.js"></script>
    <!-- InputMask -->
    <script src="../plugins/input-mask/jquery.inputmask.js"></script>
    <script src="../plugins/input-mask/jquery.inputmask.date.extensions.js"></script>
    <script src="../plugins/input-mask/jquery.inputmask.extensions.js"></script>
    <script>
        $(function () {
            $("#example1").DataTable({
                "order": [[ 0, "desc" ]]
            });
            $('#example2').DataTable({
                "paging": true,
                "lengthChange": false,
                "searching": false,
                "ordering": true,
                "info": true,
                "autoWidth": false
            });
            //Datemask dd/mm/yyyy
            $("#datemask").inputmask("dd/mm/yyyy", {"placeholder": "dd/mm/yyyy"});
        });

    </script>
    </body>
    <?php
}
else
{
    echo "<script language=\"javascript\">window.location.href = \"../\"</script>";
}
?>
</html>
