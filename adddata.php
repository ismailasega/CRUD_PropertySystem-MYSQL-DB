<?php

$conn = mysqli_connect("localhost","Admin","");
$db = mysqli_select_db($conn,'aismailapp');

if(isset($_POST['adddata']))
{
    $County = $_POST['County'];
    $Country = $_POST['Country'];
    $Town = $_POST['Town'];
    $Postcode = $_POST['Postcode'];
    $Description = $_POST['Description'];
    $DisplayableAddress = $_POST['DisplayableAddress'];
    $Image= $_POST['Image'];
    $Numberofbedrooms = $_POST['Noofbedrooms'];
    $Numberofbathrooms = $_POST['Noofbathrooms'];
    $Price = $_POST['Price'];
    $PropertyType = $_POST['PropertyType'];
    $ForSale_ForRent = $_POST['gridRadios'];
    
    $query = "INSERT INTO data (County,Country,Town,Postcode,Description,DisplayableAddress,Image,Numberofbedrooms,Numberofbathrooms,Price,PropertyType,ForSale_ForRent) 
                        VALUES ('$County','$Country','$Town','$Postcode','$Description','$DisplayableAddress','$Image','$Numberofbedrooms','$Numberofbathrooms','$Price','$PropertyType','$ForSale_ForRent')";
    $query_run = mysqli_query($conn, $query);

    if($query_run)
    {
        echo '<script> alert("Data Added"); </script>';
        header('location: asegadb.php');
    }
    else{ 
        echo '<script> alert("Data Not Added"); </script>';
        
    }
    
}

?>