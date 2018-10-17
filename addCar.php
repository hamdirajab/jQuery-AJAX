<?php

require('db.php');


if(!empty($_POST['car_name'])){

    
    $car_name = $_POST['car_name'];
    $qy = "INSERT INTO cars(title) VALUES('$car_name')";
    $res =  mysqli_query($conn,$qy);
    
    if(!$res){
        die('Query Faild : ' . mysqli_error($conn));
    }else{
        echo 'succsess';
    }

}

?>