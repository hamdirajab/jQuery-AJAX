<?php

require('db.php');


$query = "SELECT * FROM cars";

$query_result = mysqli_query($conn, $query);

if(!$query_result){
    die('Query Faild : ' . mysqli_error($conn));
}
while($row = mysqli_fetch_array($query_result)){
    
    ?>
    <tr>
        <td><?=$row['id']?></td>
        <td><a class="title-link" rel="<?=$row['id']?>" href="javascript:void(0)"><?=$row['title']?></a></td>
    </tr>
    <?php
        
}

?>
<script>
    
    $(document).ready(function() {

        $('#action-container').hide();

        $('.title-link').on('click', function(){

            $('#action-container').show();

            var id = $(this).attr('rel'); 

            $.post("process.php" , {id: id} , function(data){

                $('#action-container').html(data);


            });

        });
    });
    
</script>






























