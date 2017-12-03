<style>
    th{
        text-align: center;

    }
    td,th{
        max-width: 130px;
        overflow:hidden;
        white-space: nowrap;
        text-overflow: ellipsis;
    }

</style>
<?php
$user_id = $_SESSION['user_id'];
$user_name = $_SESSION['user_name'];
$user_role = $_SESSION['user_role'];

?>

<section class="content-header">
    <h1>
        Page User<button type="button" class="btn btn-link" data-toggle="modal" data-target="#myModal"><i style="font-size: large;" class="fa fa-plus">&nbsp;New User</i></button>
        <!--<small>Preview page</small>-->
        <?php
        if(isset($_POST['btninsert'])){
             $user_name=mysqli_real_escape_string($connection,$_POST['user_name']);
             $name=mysqli_real_escape_string($connection,$_POST['name']);
             $user_email=mysqli_real_escape_string($connection,$_POST['user_email']);
             $user_role=mysqli_real_escape_string($connection,$_POST['user_role']);
             $user_password=mysqli_real_escape_string($connection,$_POST['user_password']);

//            $encrypted = encryptIt( $password );
            

            $insert_user ="Insert into users(user_name,name,user_email,user_role,user_password) VALUES ('$user_name','$name','$user_email','$user_role','$user_password')";
            $create_user=mysqli_query($connection,$insert_user);
        }
        ?>
        <!-- Modal -->
        <div id="myModal" class="modal fade" role="dialog">
            <div class="modal-dialog">
                <!-- Modal content-->
                <form class="form-horizontal" method="post" enctype="multipart/form-data">
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                            <h4 class="modal-title">Form add new user</h4>
                        </div>
                        <div class="modal-body">
                            <form class="form-horizontal" method="post" action="">
                                <div class="box-body">
                                    <!-- form start -->
                                    <form class="form-horizontal">
                                        <div class="box-body">
                                            <div class="form-group">
                                                <label for="user_name" class="col-sm-3 control-label" style="font-size: 16px;">Username</label>

                                                <div class="col-sm-9">
                                                    <input type="text" class="form-control" id="user_name" name="user_name" placeholder="Username" required>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label for="name" class="col-sm-3 control-label" style="font-size: 16px;">Full Name</label>

                                                <div class="col-sm-9">
                                                    <input type="text" class="form-control" id="name" name="name" placeholder="Full Name" required>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label for="user_password" class="col-sm-3 control-label" style="font-size: 16px;">Password</label>
                                                <div class="col-sm-9">
                                                    <input type="password" class="form-control" id="user_password" name="user_password" placeholder="Password" required>
                                                </div>
                                            </div>

                                            <div class="form-group">
                                                <label for="user_email" class="col-sm-3 control-label" style="font-size: 16px;">Email</label>

                                                <div class="col-sm-9">
                                                    <input type="text" class="form-control" id="user_email" name="user_email" placeholder="Email" required>
                                                </div>
                                            </div>

                                            <div class="form-group">
                                                <label for="user_role" class="col-sm-3 control-label" style="font-size: 16px;">User Role</label>
                                                <div class="col-sm-9">
                                                    <select class="form-control" id="user_role" name="user_role" style="width: 100%;" required>
                                                        <option selected="selected" value="Subscriber">Subscriber</option>
                                                        <option value="Admin">Admin</option>
                                                    </select>
                                                </div>
                                            </div>

                                        </div>
                                    </form>
                                </div>
                            </form>
                        </div>
                        <div class="modal-footer" style="text-align: center;">
                            <button type="button" class="btn btn-danger" data-dismiss="modal"><i class="fa fa-close">&nbsp;</i>Cancel</button>
                            <button type="submit" name="btninsert" class="btn btn-success"><i class="fa fa-check-circle">&nbsp;</i>Insert</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
        <!-- /End of Modal -->

    </h1>
    <ol class="breadcrumb">
        <li><a href="../dashboard.php"><i class="fa fa-dashboard"></i> Dashboard</a></li>
        <li class="active">Users</li>
    </ol>
</section>

<!-- Main content -->
<section class="content">
    <div class="row">
        <div class="col-xs-12">
            <div class="box">

                <!--<div class="box-header">
                  <h3 class="box-title">Hover Data Table</h3>
                </div>-->
                <!-- /.box-header -->
                <div class="box-body">
                    <table id="example1" class="table table-bordered table-hover">
                        <thead>
                        <tr>
                            <td hidden>ID</td>
                            <th>No</th>
                            <th>Username</th>
                            <th>Name</th>
                            <th>Role</th>
                            <th>Email</th>
                            <th>Action</th>
                        </tr>
                        </thead>
                        <tbody>
                        <?php

                        $query="select * from users";
                        $select_user=mysqli_query($connection,$query);
                        $n = mysqli_num_rows($select_user);
                        //$n=1;
                        while($row = mysqli_fetch_assoc($select_user)){
                            $user_id= $row['user_id'];
                            $user_name= $row['user_name'];
                            $name= $row['name'];
                            $user_password= $row['user_password'];
                            $user_role= $row['user_role'];
                            $user_email= $row['user_email'];
                            ?>
                            <tr>
                                <td hidden style="line-height: 30px;font-size:;"><?php echo $user_id;?></td>
                                <td style="line-height: 30px;font-size:;"><?php echo $n;?></td>
                                <td style="line-height: 30px;font-size:;"><?php echo $user_name;?></td>
                                <td style="line-height: 30px;font-size:;"><?php echo $name;?></td>
                                <td style="line-height: 30px;font-size:;"><?php echo $user_role;?></td>
                                <td style="line-height: 30px;font-size:;"><?php echo $user_email;?></td>
                                <td align="center" style="line-height: 30px;font-size:;" ><a href="users.php?action=edit_user&user_id=<?php echo $user_id; ?>" class="btn btn-success btn-flat btn-sm"><i class="fa fa-edit"></i> Edit</a>&nbsp;&nbsp;&nbsp;&nbsp;<a href="users.php?delete=<?php echo $user_id;?>" onclick="return confirm('Are your sure?')" class="btn btn-danger btn-flat btn-sm"><i class="fa fa-trash-o"></i> Delete</a></td>
                            </tr>
                            <?php
                            $n--;
                        }
                        ?>
                        </tbody>
                        <tfoot>
                        <tr>
                            <td hidden>ID</td>
                            <th>No</th>
                            <th>Username</th>
                            <th>Name</th>
                            <th>Role</th>
                            <th>Email</th>
                            <th>Action</th>
                        </tr>
                        </tfoot>
                    </table>
                    <!--delete video from table video_post by id-->
                    <?php
                    if(isset($_GET['delete'])){
                        $this_posts_id=$_GET['delete'];
                        $query="delete from users where user_id = $this_posts_id";
                        $delete_query=mysqli_query($connection,$query);
                        echo "<script language=\"javascript\">window.location.href = \"users.php\"</script>";
                    }
                    ?>
                </div>
                <!-- /.box-body -->
            </div>
            <!-- /.box -->
        </div>
        <!-- /.col -->
    </div>
    <!-- /.row -->
</section>