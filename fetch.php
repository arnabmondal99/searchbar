<?php
//fetch.php
$connect = mysqli_connect("localhost", "root", "", "testing");
$output = '';
if(isset($_POST["query"]))
{
 $search = mysqli_real_escape_string($connect, $_POST["query"]);
 $query = "
  SELECT * FROM customer
  WHERE name LIKE '%".$search."%'
  OR address LIKE '%".$search."%' 
  OR city LIKE '%".$search."%' 
  OR postalcode LIKE '%".$search."%' 
  OR country LIKE '%".$search."%'
 ";
}
else
{
 $query = "
  SELECT * FROM customer ORDER BY id
 ";
}
$result = mysqli_query($connect,$query);
if($result){
if(mysqli_num_rows($result) > 0)
{
 $output .= '
  <div class="table-responsive">
   <table class="table table bordered">
    <tr>
     <th>Customer Name</th>
     <th>Address</th>
     <th>City</th>
     <th>Postal Code</th>
     <th>Country</th>
    </tr>
 ';
 while($row = mysqli_fetch_array($result))
 {
  $output .= '
   <tr>
    <td>'.$row["name"].'</td>
    <td>'.$row["address"].'</td>
    <td>'.$row["city"].'</td>
    <td>'.$row["postalcode"].'</td>
    <td>'.$row["country"].'</td>
   </tr>
  ';
 }
 echo $output;
}
else
{
 echo 'Data Not Found';
}
}

else{
    echo "query does not execute";
}

?>