<?php

?>

<!DOCTYPE html>
<html lang="en">
<head>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
<meta charset="UTF-8">
<title>Country State City in PHP MySQL using Ajax</title>
<!-- Fonts -->

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
</head>
<body>
<div class="container mt-5">
<div class="row">
<div class="card">
<div class="card-header">
</div>
<div class="card-body">
<form>
<div class="form-group">
<label for="country">Country</label>
<select class="form-control" id="country-dropdown" class="form-select">
<option value="">Select Country</option>
<?php
class xyz{
  public $db_conn;
  function __construct() {
      $servername='localhost';
      $username='root';
      $password='12345';
      $dbname = "country_city_statedetails";
      $this->db_conn=mysqli_connect($servername,$username,$password,"$dbname");
        if($this->db_conn){
            echo "connected";
          }
      }
    function get_city() {
        $arr = array();
       // print_r($row);
        $result = mysqli_query($this->db_conn,"SELECT * FROM `countries`");
               while($row = mysqli_fetch_array($result)) {
                    array_push($arr, $row);
                 print_r($arr);
      }
      return $result;
     }
  }
  $obj = new xyz();
  $data = $obj->get_city();
    foreach($data as $row) {
?>
<option value="<?php echo $row['id'];?>"><?php echo $row['name'];?></option>
<?php
  }
?>
?>
</select>
</div>
<div class="form-group">
<label for="state">State</label>
<select class="form-control" id="state-dropdown" class="form-select">
</select>
</div>                        
<div class="form-group">
<label for="city">City</label>
<select class="form-control" id="city-dropdown" class="form-select">
</select>
</div>
</div>
</div>
</div>
</div> 
</div>
<script>
$(document).ready(function() {
$('#country-dropdown').on('change', function() {
var country_id = this.value;
$.ajax({
url: "states-by-country.php",
type: "POST",
data: {
country_id: country_id
},
cache: false,
success: function(result){
$("#state-dropdown").html(result);
$('#city-dropdown').html('<option value="">Select State First</option>'); 
}
});
});    
$('#state-dropdown').on('change', function() {
var state_id = this.value;
$.ajax({
url: "cities-by-state.php",
type: "POST",
data: {
state_id: state_id
},
cache: false,
success: function(result){
$("#city-dropdown").html(result);
}
});
});
});
</script>
</body>
</html>