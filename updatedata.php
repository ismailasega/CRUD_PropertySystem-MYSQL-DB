<?php

$conn = mysqli_connect("localhost","Admin","");
$db = mysqli_select_db($conn,'aismailapp');

if(isset($_POST['updatedata']))
{
    $id = $_POST['id_update'];

    $County = $_POST['County'];
    $Country = $_POST['Country'];
    $Town = $_POST['Town'];
    $Postcode = $_POST['Postcode'];
    $Description = $_POST['Description'];
    $DisplayableAddress = $_POST['DisplayableAddress'];
    $Image= $_POST['Image'];
    $Numberofbedrooms = $_POST['Numberofbedrooms'];
    $Numberofbathrooms = $_POST['Numberofbathrooms'];
    $Price = $_POST['Price'];
    $PropertyType = $_POST['PropertyType'];
    $ForSale_ForRent = $_POST['gridRadios'];
    
    $query = "UPDATE data SET County='$County',Country='$Country',Town='$Town',Postcode='$Postcode',Description='$Description',DisplayableAddress='$DisplayableAddress',Image='$Image',Numberofbedrooms='$Numberofbedrooms',Numberofbathrooms='$Numberofbathrooms',Price='$Price',PropertyType='$PropertyType',ForSale_ForRent='$ForSale_ForRent' WHERE id='$id'";
    $query_run = mysqli_query($conn, $query);

    if($query_run)
    {
        echo '<script> alert("Updated Succesfully"); </script>';
        header('location: asegadb.php');
    }
    else{ 
        #echo $query;
        echo '<script> alert("Update Failed"); </script>';
        
    }
    
}

?>