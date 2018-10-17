<?php

require('db.php');


/*************************** Display ****************************************/

if(isset($_POST['id'])){
    
    $id = mysqli_real_escape_string($conn , $_POST['id']);
    
    $query = "SELECT * FROM cars where id =" . $id;

    $query_result = mysqli_query($conn, $query);

    if(!$query_result){
    
        die('Query Faild : ' . mysqli_error($conn));
    }
    
    while($row = mysqli_fetch_array($query_result)){

        ?>
            <p id="feedback" class="bg-success"></p>
            <input type="text"  rel="<?=$row['id']?>" class="from-control title-input" value="<?=$row['title']?>" />
            <input type="button" class="btn btn-success update" value="Update"  />
            <input type="button" class="btn btn-danger delete" value="Delete" />
            <input type="button" class="btn btn-close" value="Close" />

         <?php

    }
}

/*************************** Updata after click in button ****************************************/

if(isset($_POST['updatethis'])){

    $id = $_POST['id'];
    $title = $_POST['title'];

    $query = "UPDATE cars SET title = '$title' WHERE id=".$id;

    $result_set = mysqli_query($conn, $query);

    if(!$result_set){
    
        die('Query Faild : ' . mysqli_error($conn));
    
    }else{
        
        echo 'Sucsees Update';
        
    }
    
    
}

/*************************** Delete after click in button ****************************************/

if(isset($_POST['deletethis'])){

//    echo 'hello'
    
    $id = $_POST['id'];
    
    echo $id;
    
    $querys = "DELETE FROM cars WHERE id=$id";

    $result_set = mysqli_query($conn, $querys);

    if(!$result_set){
    
        die('Query Faild : ' . mysqli_error($conn));
    
    }
}


?>

<script>

    $(document).ready(function() {
        
        var id;
        var title;
        var updatethis = 'update' ;
        var deletethis = 'delete' ;
        
        // get id and title
        $('.title-input').on('input' , function(){
            
            id = $(this).attr('rel');
            
            title = $(this).val();
            
        });
        
        // updata functionalty
        $('.update').on('click' , function(){

            $.post('process.php' , { id:id , title:title , updatethis:updatethis } , function(data){
               
                $('#feedback').text('Record Updated Successfully');
                
            });
        });
        
        
        // Delete functionalty
        $('.delete').on('click' , function(){

            if(confirm('Are you sure you want delete Car?')){
                id = $('.title-input').attr('rel');

                $.post('process.php' , {id:id ,deletethis:deletethis} , function(data){

                   $('#action-container').hide();

                });
            }
        });
        
        // Close functionalty
        $('.btn-close').on('click' , function(){
       
           $('#action-container').hide();
         
        });
        
        
    });


</script>












