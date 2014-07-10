<?php


include_once ('database_connection.php');

if(isset($_GET['keyword'])){
    $keyword = 	trim($_GET['keyword']) ;
$keyword = mysqli_real_escape_string($dbc, $keyword);



$query = "select per_FirstName,per_LastName from topics where per_FirstName like '%$keyword%' or per_LastName like '%$keyword%'";


$result = mysqli_query($dbc,$query);
echo $result;
if($result){
    if(mysqli_affected_rows($dbc)!=0){
          while($row = mysqli_fetch_array($result,MYSQLI_ASSOC)){
     echo '<p> <b>'.$row['per_FirstName'].'</b> '.$row['per_LastName'].'</p>'   ;
    }
    }else {
        echo 'No Results for :"'.$_GET['keyword'].'"';
    }
  
}
}else {
    echo 'Parameter Missing';
}




?>