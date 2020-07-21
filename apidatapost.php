<?php

$conn = mysqli_connect("localhost","Admin","");
$db = mysqli_select_db($conn,'aismailapp');

$string = file_get_contents("http://trialapi.craig.mtcdevserver.com/");
        $json = json_decode($string, true);


        foreach($json['rates'] as $date =>$conversion){
            $sql = "INSERT INTO Mytable (id, date, conversion)
                    VALUES ( '$date', ".$conversion['EUR'].")";

            if ($conn->query($sql) === TRUE) {
                echo "New record created successfully"."<br>";
            } else {
                echo "Error: " . $sql . "<br>" . $conn->error."<br>";
            }

        }

if(isset($_POST['apidata-add']))
{
    $County = $_POST['County'];
    $Country = $_POST['Country'];
    $Town = $_POST['Town'];
    $Description = $_POST['Description'];
    $FullDetailsURL = $_POST['FullDetails'];
    $DisplayableAddress = $_POST['DisplayableAddress'];
    $ImageURL= $_POST['ImageURL'];
    $ThumbnailURL = $_POST['ThumbnailURL'];
    $Latitude = $_POST['Latitude'];
    $Longitude = $_POST['Longitude'];
    $Numberofbedrooms = $_POST['Noofbedrooms'];
    $Numberofbathrooms = $_POST['Noofbathrooms'];
    $Price = $_POST['Price'];
    $PropertyType = $_POST['PropertyType'];
    $ForSale_ForRent = $_POST['gridRadios'];
    
    $query = "INSERT INTO data ('County','Country','Town','Postcode','Description','FullDetails',DisplayableAddress','ImageURL','ThumbnailURL','Latitude','Longitude','Numberofbedrooms','Numberofbathrooms','Price','PropertyType','ForSale_ForRent') 
    VALUES ('$County','$Country','$Town','$Postcode','$Description','$FullDetailsURL','$DisplayableAddress','$ImageURL','$ThumbnailURL','$Latitude','$Longitude','$Numberofbedrooms','$Numberofbathrooms','$Price','$PropertyType','$ForSale_ForRent')";
    $query_run = mysqli_query($conn, $query);

    if($query_run)
    {
        echo '<script> alert("Data Fetched and Added Succesfully"); </script>';
        header('location: asegadb.php');
    }
    else{ 
        echo '<script> alert("Data Fetch Faild"); </script>';
        
    }
    
}

?>