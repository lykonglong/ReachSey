<?php
/* Database connection start */
include '../../_config_inc.php';

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "reachsey";

$conn = mysqli_connect($servername, $username, $password, $dbname) or die("Connection failed: " . mysqli_connect_error());

// storing  request (ie, get/post) global array to a variable
$requestData= $_REQUEST;


$columns = array(
// datatable column index  => database column name
	0=> 'post_id',
	1=> 'post_title',
	2=> 'sub_cat_id',
	3=> 'post_view',
	4=> 'post_image',
	5=> 'action',
	6=> 'suggest'
);

// getting total number records without any search
$sql = "SELECT *";
	$sql.=" FROM posts where post_status = 1";
$query=mysqli_query($conn, $sql) or die("fetch_all_movies.php: get movie");
$totalData = mysqli_num_rows($query);
$totalFiltered = $totalData;  // when there is no search parameter then total number rows = total number filtered rows.


$sql = "SELECT * ";
$sql.=" FROM posts where post_status = 1";
if( !empty($requestData['search']['value']) ) {   // if there is a search parameter, $requestData['search']['value'] contains search parameter
	$sql.=" AND ( post_id LIKE '".$requestData['search']['value']."%' ";
	$sql.=" OR sub_cat_id LIKE '".$requestData['search']['value']."%' ";
	$sql.=" OR post_title LIKE '".$requestData['search']['value']."%' ";
	$sql.=" OR post_view LIKE '".$requestData['search']['value']."%' ";
	$sql.=" OR post_image LIKE '".$requestData['search']['value']."%' ";
	$sql.=" OR post_tage LIKE '".$requestData['search']['value']."%' )";
}
$query=mysqli_query($conn, $sql) or die("fetch_all_movies.php: get movies");
$totalFiltered = mysqli_num_rows($query); // when there is a search parameter then we have to modify total number filtered rows as per search result.
$sql.=" ORDER BY ". $columns[$requestData['order'][0]['column']]."   ".$requestData['order'][0]['dir']."  LIMIT ".$requestData['start']." ,".$requestData['length']."   ";
/* $requestData['order'][0]['column'] contains colmun index, $requestData['order'][0]['dir'] contains order such as asc/desc  */
$query=mysqli_query($conn, $sql) or die("fetch_all_movies.php: get movie");

$data = array();
while( $row=mysqli_fetch_array($query) ) {  // preparing an array

if($row["post_suggestion"]==0) {
	$suggest=" ";
}else {
	$suggest="disabled";
}

if($row["post_suggestion"]==0) {
	$suggestion="disabled";
}else {
	$suggestion="";
}

	$nestedData=array();

	$nestedData[] = $row["post_id"];
	$nestedData[] = $row["post_title"];
    $cate_query="select * from sub_categories where sub_cat_id=".$row['sub_cat_id'];
    $select_category=mysqli_query($conn,$cate_query);
    while($row1=mysqli_fetch_assoc($select_category)){
        $nestedData[] =$row1['sub_cat_name'];
    }

	$nestedData[] = $row["post_view"];
	$nestedData[] = '<img src="'.BASE_URL.'../../img/'.$row["post_image"].'" class="img-responsive" alt="'.$row["post_image"].'" style="height: 30px;">';
	$nestedData[]= '<a href="posts.php?action=view_posts&view='.$row["post_id"].'" class="btn btn-info btn-flat btn-sm"><i class="fa fa-eye"></i> View</a>&nbsp;&nbsp;&nbsp;&nbsp;
                    <a href="posts.php?action=edit_post&edit='.$row["post_id"].'" class="btn btn-success btn-flat btn-sm"><i class="fa fa-edit"></i> Edit</a>&nbsp;&nbsp;&nbsp;&nbsp;
                    <a href="posts.php?trash='.$row["post_id"].'" onclick="return confirm(\'Are your sure?\')"  class="btn btn-danger btn-flat btn-sm"><i class="fa fa-trash-o"></i> Trash</a>';
	$nestedData[]='<a href="posts.php?suggestion='.$row["post_id"].'" onclick="return confirm(\'Are your sure?\')"  class="btn btn-warning btn-flat btn-sm"'.$suggest.' ><i class="fa fa-font-awesome"></i> ON</a>&nbsp;&nbsp;&nbsp;&nbsp;
	<a href="posts.php?desuggestion='.$row["post_id"].'" onclick="return confirm(\'Are your sure?\')"  class="btn btn-warning btn-flat btn-sm"'.$suggestion.' ><i class="fa fa-font-awesome"></i> Off</a>';


	$data[] = $nestedData;
}

$json_data = array(
			"draw"            => intval( $requestData['draw'] ),   // for every request/draw by clientside , they send a number as a parameter, when they recieve a response/data they first check the draw number, so we are sending same number in draw.
			"recordsTotal"    => intval( $totalData ),  // total number of records
			"recordsFiltered" => intval( $totalFiltered ), // total number of records after searching, if there is no searching then totalFiltered = totalData
			"data"            => $data   // total data array
			);

echo json_encode($json_data);  // send data as json format

?>
