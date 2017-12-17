<?php

function encryptIt( $q ) {
    $cryptKey  = 'qJB0rGtIn5UB1xG03efyCp';
    $qEncoded      = base64_encode( mcrypt_encrypt( MCRYPT_RIJNDAEL_256, md5( $cryptKey ), $q, MCRYPT_MODE_CBC, md5( md5( $cryptKey ) ) ) );
    return( $qEncoded );
}

function decryptIt( $q ) {
    $cryptKey  = 'qJB0rGtIn5UB1xG03efyCp';
    $qDecoded      = rtrim( mcrypt_decrypt( MCRYPT_RIJNDAEL_256, md5( $cryptKey ), base64_decode( $q ), MCRYPT_MODE_CBC, md5( md5( $cryptKey ) ) ), "\0");
    return( $qDecoded );
}

function getSub_Category(){
    global $connection;
    $select_sub_category="SELECT * FROM sub_categories";
    $run_select_category = mysqli_query($connection,$select_sub_category);
    while($row_member = mysqli_fetch_assoc($run_select_category)) {
        $sub_cat_id = $row_member['sub_cat_id'];
        $sub_cat_name = $row_member['sub_cat_name'];
        echo "<option value=\"$sub_cat_id\">$sub_cat_name</option>";
    }
}
function getCategory(){
    global $connection;
    $select_category="SELECT * FROM categories";
    $run_select_category = mysqli_query($connection,$select_category);
    while($row_member = mysqli_fetch_assoc($run_select_category)) {
        $cat_id = $row_member['cat_id'];
        $cat_name = $row_member['cat_name'];
        echo "<option value=\"$cat_id\">$cat_name</option>";
    }
}

function countCategory(){
    global $connection;
    $select_category="SELECT * FROM categories";
    $run_select_category = mysqli_query($connection,$select_category);
    return $rowCount = mysqli_num_rows($run_select_category);
}
function countSubCategory(){
    global $connection;
    $select_category="SELECT * FROM sub_categories";
    $run_select_category = mysqli_query($connection,$select_category);
    return $rowCount = mysqli_num_rows($run_select_category);
}
function countPost(){
    global $connection;
    $select_post="SELECT * FROM posts WHERE post_status=1";
    $run_select_post = mysqli_query($connection,$select_post);
    return $rowCount = mysqli_num_rows($run_select_post);
}

function countPostTrash(){
    global $connection;
    $select_post="SELECT * FROM posts WHERE post_status=0";
    $run_select_post = mysqli_query($connection,$select_post);
    return $rowCount = mysqli_num_rows($run_select_post);
}
function countSlide(){
    global $connection;
    $select_slide="SELECT * FROM slider";
    $run_select_slide = mysqli_query($connection,$select_slide);
    return $rowCount = mysqli_num_rows($run_select_slide);
}

?>

