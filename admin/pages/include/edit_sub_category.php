<?php
    if(isset($_GET['sub_cat_id'])){
        $the_sub_cat_id=$_GET['sub_cat_id'];
        $query="select * from sub_categories where sub_cat_id='$the_sub_cat_id'";
        $select_sub_category=mysqli_query($connection,$query);
        while($row = mysqli_fetch_assoc($select_sub_category)){
            
            $cat_id= $row['sub_cat_id'];
            $sub_cat_name= $row['sub_cat_name'];
            
        }
    }

    if(isset($_POST['btnupdate'])){
        $new_sub_cat_name=mysqli_real_escape_string($connection,$_POST['sub_cat_name']);
        $update_query="UPDATE sub_categories SET sub_cat_name='$new_sub_cat_name' WHERE sub_cat_id='$the_sub_cat_id'";
        $update_sub_category=mysqli_query($connection,$update_query);
        if($update_sub_category){
            echo "<script language=\"javascript\">window.location.href = \"sub_category.php\"</script>";
        }else{
            echo "failed";
        }
    }
    ?>

    <!-- Main content -->
    <section class="content">
        <p style="text-align: center;font-size: 36px;">Edit Sub category form​</p>
        <div class="row">
            <div class="col-xs-6 col-xs-offset-3" style="text-align: center;">
                <div class="box">
                    <div class="box-body">
                        <form class="form-horizontal" method="post" action="" enctype="multipart/form-data">
                            <div class="box-body">
                                <!-- form start -->
                                    <div class="form-group">
                                        <label for="sub_cat_name" class="col-sm-4 control-label" style="font-size: 16px;">Sub Category Name</label>
                                        <div class="col-sm-8">
                                            <input type="text" class="form-control" value="<?php echo $sub_cat_name; ?>" name="sub_cat_name" id="sub_cat_name"  placeholder="Sub Category Name" required>
                                        </div>
                                    </div>

                            </div>
                            <!-- /.box-body -->
                            <div class="box-footer">
                                <a href="sub_category.php"> <button type="button" class="btn btn-danger"><i class="fa fa-close">&nbsp;</i>Cancel</button></a>
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
    
