<?php

$user_id = $_SESSION['user_id'];
$user_name = $_SESSION['user_name'];
$user_role = $_SESSION['user_role'];
        if(isset($_POST['btninsert'])){
            $post_title=mysqli_real_escape_string($connection,$_POST['post_title']);
            $sub_cat_id=mysqli_real_escape_string($connection,$_POST['sub_cat_id']);

            $post_date=mysqli_real_escape_string($connection,$_POST['post_date']);
            $datesort= str_replace('/', '-',"$post_date");
            $date_insert= date('Y-m-d', strtotime($datesort));

            $post_tage=mysqli_real_escape_string($connection,$_POST['post_tage']);
            $post_desc=mysqli_real_escape_string($connection,mb_convert_encoding($_POST['dsc'],"UTF-8","auto") );


            $post_image=$_FILES['post_image']['name'];
            $post_image_temp=$_FILES['post_image']['tmp_name'];



            /*move_uploaded_file($movie_trailer_temp,"../dist/movie/trailer/".$movie_trailer);
            move_uploaded_file($movie_full_temp,"../dist/movie/full/".$movie_full);*/

            $insert_posts = "Insert into posts(user_id,sub_cat_id, post_title, post_image, post_desc, post_date, post_tage,post_view)VALUE ('$user_id','$sub_cat_id','$post_title','$post_image','$post_desc','$date_insert','$post_tage',0)";

           $run_insert_posts=mysqli_query($connection,$insert_posts);
            if($run_insert_posts){
                move_uploaded_file($post_image_temp, "../../img/".$post_image);
                echo "<script language=\"javascript\">window.location.href = \"posts.php\"</script>";
            }else
            {
                echo "Inserting failed!";
                echo $insert_posts;
            }
        }
        ?>

<script>

    function ValidateInputImage(oInput) {
        var _validFileExtensions = [".jpg", ".jpeg", ".png"];
        if (oInput.type == "file") {
            var sFileName = oInput.value;
            if (sFileName.length > 0) {
                var blnValid = false;
                for (var j = 0; j < _validFileExtensions.length; j++) {
                    var sCurExtension = _validFileExtensions[j];
                    if (sFileName.substr(sFileName.length - sCurExtension.length, sCurExtension.length).toLowerCase() == sCurExtension.toLowerCase()) {
                        blnValid = true;
                        break;
                    }
                }

                if (!blnValid) {
                    alert("Sorry, " + sFileName + " is invalid, allowed extensions are: " + _validFileExtensions.join(", "));
                    oInput.value = "";
                    return false;
                }
            }
        }
        return true;
    }
    function ValidateInputvideo(oInput) {
        var _validFileExtensions = [".avi", ".flv", ".wmv", ".mov", ".mp4"];
        if (oInput.type == "file") {
            var sFileName = oInput.value;
            if (sFileName.length > 0) {
                var blnValid = false;
                for (var j = 0; j < _validFileExtensions.length; j++) {
                    var sCurExtension = _validFileExtensions[j];
                    if (sFileName.substr(sFileName.length - sCurExtension.length, sCurExtension.length).toLowerCase() == sCurExtension.toLowerCase()) {
                        blnValid = true;
                        break;
                    }
                }

                if (!blnValid) {
                    alert("Sorry, " + sFileName + " is invalid, allowed extensions are: " + _validFileExtensions.join(", "));
                    oInput.value = "";
                    return false;
                }
            }
        }
        return true;
    }
</script>


    <!-- Main content -->
    <section class="content">
        <p style="text-align: center;font-size: 36px;">Form add new Posts</p>
        <div class="row">
            <div class="col-xs-12">
                <div class="box">

                    <!--<div class="box-header">
                      <h3 class="box-title">Hover Data Table</h3>
                    </div>-->
                    <!-- /.box-header -->
                    <div class="box-body">
                        <form class="form-horizontal" method="post" action="" enctype="multipart/form-data" id="addPostsForm">
                            <div class="box-body">
                                <!-- form start -->
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label for="post_title" class="col-sm-3 control-label" style="font-size: 16px;">Post Title</label>

                                        <div class="col-sm-9">

                                            <div class="input-group">
                                                <div class="input-group-addon">
                                                    <i class="fa fa-file-video-o"></i>
                                                </div>
                                                <input type="text" class="form-control" value="" id="Post_title" name="post_title" placeholder="Post Title" required>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label for="sub_cat_id" class="col-sm-3 control-label" style="font-size: 16px;">Sub-Cate</label>
                                        <div class="col-sm-9">
                                            <div class="input-group">
                                                <div class="input-group-addon">
                                                    <i class="fa fa-briefcase"></i>
                                                </div>
                                                <select class="form-control" id="sub_cat_id" name="sub_cat_id" style="width: 100%;" required>

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
                                                    <i class="fa fa-calendar"></i>
                                                </div>
                                                <input type="text" class="form-control" value="" id="datemask" name="post_date" placeholder="Release Date" required>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="post_tage" class="col-sm-3 control-label" style="font-size: 16px;">Post Tage</label>
                                        <div class="col-sm-9">
                                            <div class="input-group">
                                                <div class="input-group-addon">
                                                    <i class="fa fa-tags"></i>
                                                </div>
                                                <input type="text" class="form-control" value="" id="post_tage" name="post_tage" placeholder="Post Tage" required>
                                            </div>
                                        </div>
                                    </div>



                                </div>
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label for="post_image" class="col-sm-3 control-label" style="font-size: 16px;">Post Image</label>
                                        <div class="col-sm-4">
                                            <input type="file" id="post_image" name="post_image" onchange="document.getElementById('cover').src = window.URL.createObjectURL(this.files[0]),ValidateInputImage(this);">

                                        </div>
                                        <div class="col-sm-5">
                                            <p class="help-block col-sm-offset-2" align="right"> <span style="color: red;font-size: 16px;" >Cover</span></p>
                                        </div>
                                        <div class="col-sm-4 col-sm-offset-5">
                                            <img id="cover" alt="Preview" width="150" height="200" align="center" />
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-12">


                                    <div class="form-group">
                                        <label for="dsc" class="col-sm-3 control-label" style="font-size: 16px;">Description</label>

                                        <div class="col-sm-12">
                                            <textarea class="ckeditor"  rows="4" id="dsc" name="dsc" placeholder="Description"></textarea>
                                        </div>
                                    </div>

                                </div>
                            </div>
                            <!-- /.box-body -->
                            <div class="box-footer" style="text-align: center;">
                                <a href="posts.php"> <button type="button" class="btn btn-danger"><i class="fa fa-close">&nbsp;</i>Cancel</button></a>
                                <button type="submit" name="btninsert" class="btn btn-success"><i class="fa fa-check-circle">&nbsp;</i>Insert</button>
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
