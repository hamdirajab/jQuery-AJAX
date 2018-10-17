<?php

require('db.php');

if(!empty($_POST)){
    

    $search = $_POST['search'];
    
    // $search = $conn->real_escape_string($search);    // the solve

    $query =  "SELECT * FROM cars WHERE title LIKE '$search%' ";
    $search_query = mysqli_query($conn , $query);
    
    $count = mysqli_num_rows($search_query);
    
    if(!$search_query){
        die('Query Faild : ' . mysqli_error($conn));
    }

    if($count <= 0){
        
        echo "Sorry we don't hava that car available";
        
    }else{
        while($row = mysqli_fetch_array($search_query)){
            $cars =  $row['title'];

            ?>
            <ul class="list-unstyled">
                <li><?=$cars?> in stock</li>
            </ul>
            <?php

        }
    }
    
}
?>