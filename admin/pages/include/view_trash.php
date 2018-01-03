<?php

if(isset($_GET['view'])){
    $post_id=$_GET['view'];
    $query="select * from posts WHERE post_id = $post_id";
    $select_post=mysqli_query($connection,$query);
    while($row = mysqli_fetch_assoc($select_post)) {
        $post_id = $row['post_id'];
        $user_id = $row['user_id'];
        $sub_cat_id = $row['sub_cat_id'];
        $post_title = $row['post_title'];
        $post_image = $row['post_image'];
        $post_desc = $row['post_desc'];
        $post_date = $row['post_date'];
        $post_date = date("d-m-Y", strtotime($post_date));

        $post_tag = $row['post_tage'];
        $down_link = $row['down_link'];


        $cate_query = "select * from sub_categories where sub_cat_id=$sub_cat_id";
        $select_category = mysqli_query($connection, $cate_query);
        while ($row = mysqli_fetch_assoc($select_category)) {
            $sub_cat_name = $row['sub_cat_name'];
        }
    }
}

?>
<!-- Main content -->
<section class="content">
    <p style="text-align: center;font-size: 36px;">Form detail of post</p>
    <div class="row">
        <div class="col-xs-12">
            <div class="box">

                <!--<div class="box-header">
                  <h3 class="box-title">Hover Data Table</h3>
                </div>-->
                <!-- /.box-header -->
                <div class="box-body">
                    <form class="form-horizontal" method="post" action="" enctype="multipart/form-data" id="addMovieForm">
                        <div class="box-body">
                            <!-- form start -->
                            <div class="col-sm-8">
                                <div class="form-group">
                                    <label for="movie_title" class="col-sm-3 control-label" style="font-size: 16px;">Post Title</label>

                                    <div class="col-sm-9">

                                        <div class="input-group">
                                            <div class="input-group-addon">
                                                <i class="fa fa-file-video-o"></i>
                                            </div>
                                            <input type="text" class="form-control" value="<?php echo $post_title ;?>" id="movie_title" name="post_title" placeholder="Movie Title" readonly>
                                        </div>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label for="movie_cate_id" class="col-sm-3 control-label" style="font-size: 16px;">Sub Category</label>
                                    <div class="col-sm-9">
                                        <div class="input-group">
                                            <div class="input-group-addon">
                                                <i class="fa fa-briefcase"></i>
                                            </div>
                                            <input type="text" class="form-control" value="<?php echo $sub_cat_name ;?>" id="post_title" name="post_title" placeholder="Post Title" readonly>
                                        </div>

                                    </div>

                                </div>
                                <div class="form-group">
                                    <label for="movie_date" class="col-sm-3 control-label" style="font-size: 16px;">Release Date</label>

                                    <div class="col-sm-9">
                                        <div class="input-group">
                                            <div class="input-group-addon">
                                                <i class="fa fa-calendar"></i>
                                            </div>
                                            <input type="text" class="form-control" value="<?php echo $post_date;?>" id="datemask" name="post_date" placeholder="Release Date" readonly>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="post_tags" class="col-sm-3 control-label" style="font-size: 16px;">post Tags</label>
                                    <div class="col-sm-9">
                                        <div class="input-group">
                                            <div class="input-group-addon">
                                                <i class="fa fa-tags"></i>
                                            </div>
                                            <input type="text" class="form-control" value="<?php echo $post_tag;?>" id="movie_tags" name="post_tags" placeholder="post Tags" readonly>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="down_link" class="col-sm-3 control-label" style="font-size: 16px;">Download Link</label>
                                    <div class="col-sm-9">
                                        <div class="input-group">
                                            <div class="input-group-addon">
                                                <i class="fa fa-tags"></i>
                                            </div>
                                            <input type="text" class="form-control" value="<?php echo $down_link;?>" id="" name="down_link" placeholder="Download Link" readonly>
                                        </div>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label for="dsc" class="col-sm-3 control-label" style="font-size: 16px;">Description</label>

                                    <div class="col-sm-9">
                                        <textarea class="form-control" rows="4" id="dsc" name="dsc" placeholder="Description" readonly><?php echo $post_desc; ?></textarea>
                                    </div>
                                </div>

                            </div>
                            <div class="col-sm-4">
                                <div class="form-group">
                                    <div class="col-sm-12">
                                        <img width=300 src="<?php echo BASE_URL; ?>../../img/<?php echo $post_image; ?>"/>
                                    </div>
                                </div>
                            </div>

                        </div>
                        <!-- /.box-body -->
                        <div class="box-footer" style="text-align: center;">
                            <a href="trash.php"> <button type="button" class="btn btn-danger"><i class="fa fa-close">&nbsp;</i>Back</button></a>
                            <a href="trash.php?action=edit_trash&edit=<?php echo $post_id; ?>"> <button type="button" class="btn btn-success"><i class="fa fa-edit">&nbsp;</i>Edit</button></a>
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
