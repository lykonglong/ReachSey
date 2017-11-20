<?php
if(isset($_GET['user_id'])){
    $the_user_id=$_GET['user_id'];
    $query="select * from users where user_id=$the_user_id";
    $select_user=mysqli_query($connection,$query);
    while($row = mysqli_fetch_assoc($select_user)){
        $user_id= $row['user_id'];
        $user_name= $row['user_name'];
        $name= $row['name'];
        $user_password= $row['user_password'];
        $user_role_db= $row['user_role'];
    }
}

if(isset($_POST['btnupdate'])){
    $new_user_name=mysqli_real_escape_string($connection,$_POST['user_name']);
    $new_name=mysqli_real_escape_string($connection,$_POST['name']);
    $new_user_role=mysqli_real_escape_string($connection,$_POST['user_role']);


    $update_query="UPDATE users SET user_name='$new_user_name',name='$new_name',user_role='$new_user_role' WHERE user_id=$the_user_id";
    $update_user=mysqli_query($connection,$update_query);
    if ($update_user){
        echo "<script language=\"javascript\">window.location.href ='users.php'</script>";
    }
}
?>

<!-- Main content -->
<section class="content">
    <p style="text-align: center;font-size: 36px;">Edit user form​</p>
    <div class="row">
        <div class="col-xs-6 col-xs-offset-3" style="text-align: center;">
             <div class="box">
                <div class="box-body">
                    <form class="form-horizontal" method="post" action="" enctype="multipart/form-data">
                        <div class="box-body">
                            <!-- form start -->
                            <div class="col-sm-12">
                                <div class="form-group">
                                    <label for="username" class="col-sm-3 control-label" style="font-size: 16px;">Username</label>

                                    <div class="col-sm-9">
                                        <input type="text" class="form-control" value="<?php echo $user_name;?>" id="username" name="user_name" placeholder="Username" required>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="name" class="col-sm-3 control-label" style="font-size: 16px;">Full Name</label>

                                    <div class="col-sm-9">
                                        <input type="text" class="form-control" value="<?php echo $name ;?>" id="name" name="name" placeholder="Full name" required>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="user_role" class="col-sm-3 control-label" style="font-size: 16px;">User Role</label>
                                    <div class="col-sm-9">
                                        <select class="form-control" id="user_role" name="user_role" style="width: 100%;" required>
                                            <option selected="selected" value="<?php echo $user_role_db;?>"><?php echo $user_role_db;?></option>
                                            <?php
                                            if ($user_role_db == 'Subscriber'){
                                                echo "<option value='Admin'>Admin</option>";
                                            }else{
                                                echo "<option value='Subscriber'>Subscriber</option>";
                                            }
                                            ?>
                                        </select>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- /.box-body -->
                        <div class="box-footer">
                            <a href="users.php"> <button type="button" class="btn btn-danger"><i class="fa fa-close">&nbsp;</i>Cancel</button></a>
                            <button type="submit" name="btnupdate" class="btn btn-success"><i class="fa fa-check-circle">&nbsp;</i>Update</button>
                        </div>
                        <!-- /.box-footer -->
                    </form>
                </div>
                <!-- /.box-body -->
            </div>
            <!-- /.box -->
        </div>
        <!-- /.col -->
    </div>
    <!-- /.row -->
</section>
<!-- /.content -->
