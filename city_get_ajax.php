 <?php
include("./model/dboperation.php");
 
function get_city($mysqli , $term){ 
 $query = "SELECT * FROM city WHERE city_name  LIKE '%".$term."%' ORDER BY city_name ASC";
 $result = mysqli_query($mysqli, $query); 
 $data = mysqli_fetch_all($result,MYSQLI_ASSOC);
 return $data; 
}
 
if (isset($_GET['term'])) {
 $getCity = get_city($mysqli, $_GET['term']);
 $cityList = array();
 foreach($getCity as $city){
 $cityList[] = $city['city_name'];
 
 }
 echo json_encode($cityList);
}
?>