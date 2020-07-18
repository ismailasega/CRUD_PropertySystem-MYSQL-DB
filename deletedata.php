<?php

$conn = mysqli_connect("localhost","Admin","");
$db = mysqli_select_db($conn,'aismailapp');

if(isset($_POST['deletedata']))
{
    $id = $_POST['id_delete'];
    
    $query = "DELETE FROM data WHERE id='$id'"; 
    $query_run = mysqli_query($conn, $query);

    if($query_run)
    {
        echo '<script> alert("Deleted Succesfully"); </script>';
        header('location: asegadb.php');
    }
    else{ 
        echo '<script> alert("Delete Failed"); </script>';
        
    }
    
}

?>