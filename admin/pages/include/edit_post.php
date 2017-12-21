<?php

if(isset($_GET['edit'])){
    $post_edit_id=$_GET['edit'];
    $query="select * from posts WHERE post_id = $post_edit_id";
    $select_post=mysqli_query($connection,$query);
    while($row = mysqli_fetch_assoc($select_post)) {
        $post_id = $row['post_id'];
        $user_id_db = $row['user_id'];
        $sub_cat_id = $row['sub_cat_id'];
        $post_title = $row['post_title'];
        $post_image = $row['post_image'];
        $post_desc = $row['post_desc'];
        $post_date_db = $row['post_date'];
        $post_date = date("d-m-Y", strtotime($post_date_db));

        $post_tage = $row['post_tage'];
        $down_link = $row['down_link'];

        $cate_query = "select * from sub_categories where sub_cat_id=$sub_cat_id";
        $select_category = mysqli_query($connection, $cate_query);
        while ($row = mysqli_fetch_assoc($select_category)) {
            $sub_cat_name = $row['sub_cat_name'];
        }
    }
}

if(isset($_POST['btnupdate'])){
    $new_sub_cat_id=mysqli_real_escape_string($connection,$_POST['sub_cat_id']);
    $new_post_title=mysqli_real_escape_string($connection,$_POST['post_title']);

    $new_post_image=$_FILES['post_image']['name'];
    $new_post_image_temp=$_FILES['post_image']['tmp_name'];
    move_uploaded_file($new_post_image_temp,"../../img/".$new_post_image);
    if($new_post_image==""){
        $new_post_image = $post_image;
    }

    $new_post_desc=mysqli_real_escape_string($connection,mb_convert_encoding($_POST['post_desc'],"UTF-8","auto") );

    $new_post_date=mysqli_real_escape_string($connection,$_POST['post_date']);
    $datesort= str_replace('/', '-', "$new_post_date");
    $new_post_date_insert= date('Y-m-d',strtotime($datesort));

    $new_post_tage=mysqli_real_escape_string($connection,$_POST['post_tage']);
    $new_down_link=mysqli_real_escape_string($connection,$_POST['down_link']);

    $update_query="UPDATE posts SET sub_cat_id='$new_sub_cat_id', post_title='$new_post_title', post_image='$new_post_image',post_desc='$new_post_desc',post_date='$new_post_date_insert',post_tage='$new_post_tage',down_link='$new_down_link' WHERE post_id='$post_edit_id'";
    $update_movie=mysqli_query($connection,$update_query);
    if($update_movie){
        echo "<script language=\"javascript\">window.location.href = 'posts.php'</script>";
    }else{
        echo "failed";
    }
}
?>

    <!-- Main content -->
    <section class="content">
        <div class="row">
            <div class="col-xs-12">
                <div class="box">

                    <div class="box-body">
                        <form class="form-horizontal" method="post" action="" enctype="multipart/form-data">
                            <div class="box-body">
                                <!-- form start -->
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label for="post_title" class="col-sm-3 control-label" style="font-size: 16px;">Posts Title</label>

                                        <div class="col-sm-9">

                                            <div class="input-group">
                                                <div class="input-group-addon">
                                                    <i class="fa fa-users"></i>
                                                </div>
                                                <input type="text" class="form-control" value="<?php echo $post_title ;?>" id="post_title" name="post_title" placeholder="Movie Title" required>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label for="sub_cat_id" class="col-sm-3 control-label" style="font-size: 16px;">Category</label>
                                        <div class="col-sm-9">
                                            <div class="input-group">
                                                <div class="input-group-addon">
                                                    <i class="fa fa-users"></i>
                                                </div>
                                                <select class="form-control" id="sub_cat_id" name="sub_cat_id" style="width: 100%;" required>
                                                    <option selected="selected" value="<?php echo $sub_cat_id;?>"><?php echo $sub_cat_name;?></option>
                                                    <?php
                                                    getSub_Category();
                                                    ?>
                                                </select>
                                            </div>

                                        </div>

                                    </div>
                                    <div class="form-group">
                                        <label for="post_date" class="col-sm-3 control-label" style="font-size: 16px;">Release Date</label>

                                        <div class="col-sm-9">
                                            <div class="input-group">
                                                <div class="input-group-addon">
                                                    <i class="fa fa-users"></i>
                                                </div>
                                                <input type="text" class="form-control" value="<?php echo $post_date;?>" id="datemask" name="post_date" placeholder="Release Date" required>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="movie_tags" class="col-sm-3 control-label" style="font-size: 16px;">Post Tags</label>
                                        <div class="col-sm-9">
                                            <div class="input-group">
                                                <div class="input-group-addon">
                                                    <i class="fa fa-users"></i>
                                                </div>
                                                <input type="text" class="form-control" value="<?php echo $post_tage;?>" id="movie_tags" name="post_tage" placeholder="Movie Tags" required>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="down_link" class="col-sm-3 control-label" style="font-size: 16px;">Download Link</label>
                                        <div class="col-sm-9">
                                            <div class="input-group">
                                                <div class="input-group-addon">
                                                    <i class="fa fa-users"></i>
                                                </div>
                                                <input type="text" class="form-control" value="<?php echo $down_link;?>" id="down_link" name="down_link" placeholder="Download Link">
                                            </div>
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label for="dsc" class="col-sm-3 control-label" style="font-size: 16px;">Description</label>

                                        <div class="col-sm-9">
                                            <textarea class="form-control" rows="4" id="dsc" name="post_desc" placeholder="Description"><?php echo $post_desc; ?></textarea>
                                        </div>
                                    </div>

                                </div>
                                <div class="col-sm-6">
<!--                                    <div class="form-group">-->
<!--                                        <label for="movie_trailer" class="col-sm-3 control-label" style="font-size: 16px;">Movie Trailer</label>-->
<!--                                        <div class="col-sm-9">-->
<!--                                            <div class="input-group">-->
<!--                                                <div class="input-group-addon">-->
<!--                                                    <i class="fa fa-users"></i>-->
<!--                                                </div>-->
<!--                                                <input type="text" class="form-control" value="--><?php //echo $movie_trailer; ?><!--" id="movie_trailer" name="movie_trailer" placeholder="Movie Trailer">-->
<!--                                            </div>-->
<!--                                        </div>-->
<!--                                    </div>-->
<!--                                    <div class="form-group">-->
<!--                                        <label for="movie_full" class="col-sm-3 control-label" style="font-size: 16px;">Movie Full</label>-->
<!--                                        <div class="col-sm-9">-->
<!--                                            <div class="input-group">-->
<!--                                                <div class="input-group-addon">-->
<!--                                                    <i class="fa fa-users"></i>-->
<!--                                                </div>-->
<!--                                                <input type="text" class="form-control" value="--><?php //echo $movie_full; ?><!--" id="movie_full" name="movie_full" placeholder="Movie Full">-->
<!--                                            </div>-->
<!--                                        </div>-->
<!--                                    </div>-->
                                    <div class="form-group">
                                        <label for="old_cover" class="col-sm-3 control-label" style="font-size: 16px;">Old Cover</label>
                                        <div class="col-sm-4 ">
                                            <img width=250 src="<?php echo BASE_URL.'../../img/'; ?><?php echo $post_image; ?>"/>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="post_image" class="col-sm-3 control-label" style="font-size: 16px;">New Post Cover</label>
                                        <div class="col-sm-4">
                                            <input type="file" id="post_image" name="post_image" onchange="document.getElementById('cover').src = window.URL.createObjectURL(this.files[0]),ValidateInputImage(this);">

                                        </div>
                                        <div class="col-sm-5">
                                            <p class="help-block col-sm-offset-2" align="right"> <span style="color: red;font-size: 16px;" >Cover</span></p>
                                        </div>
                                        <div class="col-sm-4">
                                            <img id="cover" alt="Preview" width="250" height="" align="center" />
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- /.box-body -->
                            <div class="box-footer" style="text-align: center;">
                                <a href="posts.php"> <button type="button" class="btn btn-danger"><i class="fa fa-close">&nbsp;</i>Cancel</button></a>
                                <button type="submit" name="btnupdate" class="btn btn-success"><i class="fa fa-check-circle">&nbsp;</i>Save</button>
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
