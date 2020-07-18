<?php

session_start();

if (!isset($_SESSION['loggedin'])) {
	header('Location: login.php');
    exit;
}

?>
<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<title>Property System</title>
		<link href="style.css" rel="stylesheet" type="text/css">
        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.1/css/all.css">
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
        <link rel="stylesheet" href="https://cdn.datatables.net/1.10.21/css/dataTables.bootstrap4.min.css">
    </head>
	<body class="loggedin">
		<nav class="navtop">
			<div>
				<h1> CRUD interface</h1>
				<a href="logout.php"><i class="fas fa-sign-out-alt"></i>Logout</a>
			</div>
		</nav>
		<div class="content">
			<h2>Property System </h2>
            <p>Welcome | Role : <?=$_SESSION['name']?>!</p>
          
            <div class="card">
                <div class=card-body>
                    <button type="button" class="btn btn-secondary" data-toggle="modal" data-target="#getData">
                        Fetch API Data
                    </button>

                    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#propertyData">
                        Add Data
                    </button>         
                </div>
                       
                <?php
                    $conn = mysqli_connect("localhost","Admin","");
                    $db = mysqli_select_db($conn,'aismailapp');

                    $query = "SELECT * FROM data";
                    $query_run = mysqli_query($conn, $query);
                ?>
                <div class="table-responsive">
                <table class="table">
                <table id= "dbdatatable" class="table table-bordered">
                        <thead class="thead-dark">
                            <tr>
                                <th scope="col">Id</th>
                                <th scope="col">County</th>
                                <th scope="col">Country</th>
                                <th scope="col">Town</th>
                                <th scope="col">Postcode</th>
                                <th scope="col">Description</th>
                                <th scope="col">FullDetailsURL</th>
                                <th scope="col">DisplayableAddress</th>
                                <th scope="col">Image</th>
                                <th scope="col">ImageURL</th>
                                <th scope="col">ThumbnailURL</th>
                                <th scope="col">Latitude</th>
                                <th scope="col">Longitude</th>
                                <th scope="col">Numberofbedrooms</th>
                                <th scope="col">Numberofbathrooms</th>
                                <th scope="col">Price</th>
                                <th scope="col">PropertyType</th>
                                <th scope="col">ForSale_ForRent</th>
                                <th scope="col">Edit</th>
                                <th scope="col">Delete</th>
                            </tr>
                        </thead>
                <?php
                if($query_run)
                {
                    foreach($query_run as $row)
                    {
                ?>
                        <tbody>
                            <tr>
                                <td><?php echo $row['Id']; ?></td>
                                <td><?php echo $row['County']; ?></td>
                                <td><?php echo $row['Country']; ?></td>
                                <td><?php echo $row['Town']; ?></td>
                                <td><?php echo $row['Postcode']; ?></td>
                                <td><?php echo $row['Description']; ?></td>
                                <td><?php echo $row['FullDetailsURL']; ?></td>
                                <td><?php echo $row['DisplayableAddress']; ?></td>
                                <td><?php echo '<img src="data:image/jpeg;base64,'.base64_encode($row['Image']).' "height="50" width="50"/>'; ?></td>
                                <td><?php echo $row['ImageURL']; ?></td>
                                <td><?php echo $row['ThumbnailURL']; ?></td>
                                <td><?php echo $row['Latitude']; ?></td>
                                <td><?php echo $row['Longitude']; ?></td>
                                <td><?php echo $row['Numberofbedrooms']; ?></td>
                                <td><?php echo $row['Numberofbathrooms']; ?></td>
                                <td><?php echo $row['Price']; ?></td>
                                <td><?php echo $row['PropertyType']; ?></td>
                                <td><?php echo $row['ForSale_ForRent']; ?></td>
                                <td>
                                    <button type="button" class="btn btn-success editbtn">Edit</button>
                                </td>
                                <td>
                                    <button type="button" class="btn btn-danger delbtn">Delete</button>
                                </td>
                            </tr>
                        </tbody>
                <?php
                    }
                }
                else{
                    echo "No Record Found";
                }
                ?>
                    </table>

            </div> 

        
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js" integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous"></script>
<script src="https://cdn.datatables.net/1.10.21/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.10.21/js/dataTables.bootstrap4.min.js"></script>

<script>
$(document).ready(function (){
    $('.delbtn').on('click', function(){
        $('#deleteproperty').modal('show');

        $tr =$(this).closest('tr');
        var data = $tr.children("td").map(function() {
            return $(this).text()
        }).get();

        console.log(data);

        $('#id_delete').val(data[0]);

    });
});

</script>
<script>
$(document).ready(function (){
    $('.editbtn').on('click', function(){
        $('#editproperty').modal('show');

        $tr = $(this).closest('tr');

        var data = $tr.children("td").map(function() {
            return $(this).text()
        }).get();

        console.log(data);

        $('#id_update').val(data[0]);
        $('#County').val(data[1]);
        $('#Country').val(data[2]);
        $('#Town').val(data[3]);
        $('#Postcode').val(data[4]);
        $('#Description').val(data[5]);
        $('#DisplayableAddress').val(data[7]);
        $('#Image').val(data[8]);
        $('#Numberofbedrooms').val(data[13]);
        $('#Numberofbathrooms').val(data[14]);
        $('#Price').val(data[15]);
        $('#PropertyType').val(data[16]);
        $('#gridRadios1').val(data[17]);
        

    });
});

</script>
<script>
$(document).ready(function() {
    $('#dbdatatable').DataTable();
} );
</script>
<!--Add Property pop-up -->
<div class="modal fade" id="propertyData" tabindex="-1" role="dialog" aria-labelledby="propertyDataLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="propertyDataLabel">Add Property</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
            <form action="adddata.php" method="POST">
        <div class="form-row">
            <div class="form-group col-md-6">
            <label for="inputCounty">County</label>
            <input type="text" name="County"class="form-control" id="inputCounty" required>
            </div>
            <div class="form-group col-md-6">
            <label for="inputCountry">Country</label>
            <input type="text" name="Country" class="form-control" id="inputCountry" required>
            </div>
        </div>
        <div class="form-row">
            <div class="form-group col-md-6">
            <label for="inputTown">Town</label>
            <input type="text" name="Town"class="form-control" id="inputTown" required>
            </div>
            <div class="form-group col-md-6">
            <label for="inputPostcode">Postcode</label>
            <input type="text" name="Postcode" class="form-control" id="inputPostcode" required>
            </div>
        </div>
        <div class="form-group">
            <label for="DescriptionTextarea">Description</label>
            <textarea class="form-control" name="Description" id="DescriptionTextarea" rows="3"></textarea>
        </div>
        <div class="form-group">
            <label for="inputAddress">Displayable Address</label>
            <input type="text" name="DisplayableAddress" class="form-control" id="inputAddress" required>
        </div>
        <div class="form-group">
            <label for="UploadImage">Image</label>
            <input type="file" name="Image" class="form-control-file" id="UploadImage">
        </div>
        <div class="form-row">
            <div class="form-group col-md-4">
            <label for="SelectNoofBedrooms">No. of bedrooms</label>
            <select id="SelectNoofBedrooms" name="Noofbedrooms" type="text" class="form-control" required>
                <option selected>Select...</option>
                <option>1</option>
                <option>2</option>
                <option>3</option>
                <option>4</option>
                <option>5</option>
            </select>
            </div>
            <div class="form-group col-md-4">
            <label for="SelectNoofBathrooms">No. of bathrooms</label>
            <select id="SelectNoofBathrooms" name="Noofbathrooms" class="form-control" required>
                <option selected>Select...</option>
                <option>1</option>
                <option>2</option>
                <option>3</option>
            </select>
            </div>
            <div class="form-group col-md-4">
            <label for="inputPrice">Price</label>
            <input type="text" name="Price" class="form-control" id="inputPrice" required>
            </div>
        </div>
        <div class="form-group">
            <label for="SelectPropertyType">Property Type</label>
            <select class="form-control" name="PropertyType" id="SelectPropertyType" required>
            <option>Bungalow</option>
            <option>Flat</option>
            </select>
        </div>
        <div class="form-group">
            <div class="row">
                <legend class="col-form-label col-sm-2 pt-0">For</legend>
                <div class="col-sm-10">
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="gridRadios" id="gridRadios1" value="Rent" checked>
                        <label class="form-check-label"  for="gridRadios1">
                            Rent
                        </label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="gridRadios" id="gridRadios1" value="Sale">
                        <label class="form-check-label"  for="gridRadios1">
                            Sale
                        </label>
                    </div>
                </div>
            </div>
        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            <button type="subimit" name="adddata" class="btn btn-primary">Add</button>
        </div>
        </form>
      </div>
    </div>
  </div>
</div>   

        <!--Edit Property pop-up -->
<div class="modal fade" id="editproperty" tabindex="-1" role="dialog" aria-labelledby="propertyDataLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="propertyDataLabel">Edit Property</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
            <form action="updatedata.php" method="POST">
                <input type="hidden" name="id_update" id="id_update">
        <div class="form-row">
            <div class="form-group col-md-6">
            <label for="inputCounty">County</label>
            <input type="text" name="County"class="form-control" id="County">
            </div>
            <div class="form-group col-md-6">
            <label for="inputCountry">Country</label>
            <input type="text" name="Country" class="form-control" id="Country">
            </div>
        </div>
        <div class="form-row">
            <div class="form-group col-md-6">
            <label for="inputTown">Town</label>
            <input type="text" name="Town"class="form-control" id="Town">
            </div>
            <div class="form-group col-md-6">
            <label for="inputPostcode">Postcode</label>
            <input type="text" name="Postcode" class="form-control" id="Postcode">
            </div>
        </div>
        <div class="form-group">
            <label for="DescriptionTextarea1">Description</label>
            <textarea class="form-control" name="Description" id="Description" rows="3"></textarea>
        </div>
        <div class="form-group">
            <label for="inputAddress">Displayable Address</label>
            <input type="text" name="DisplayableAddress" class="form-control" id="DisplayableAddress">
        </div>
        <div class="form-group">
            <label for="UploadImage">Image</label>
            <input type="file" name="Image" class="form-control-file" id="Image">
        </div>
        <div class="form-row">
            <div class="form-group col-md-4">
            <label for="SelectNo.ofBedrooms">No. of bedrooms</label>
            <select class="form-control" name="Noofofbedrooms" id="Numberofbedrooms">
                <option>1</option>
                <option>2</option>
                <option>3</option>
                <option>4</option>
                <option>5</option>
            </select>
            </div>
            <div class="form-group col-md-4">
                <label for="SelectNo.ofBathrooms">No. of bathrooms</label>
                <select name="Noofbathrooms" class="form-control" id="Numberofbathrooms">
                <option>1</option>
                <option>2</option>
                <option>3</option>
            </select>
            </div>
            <div class="form-group col-md-4">
            <label for="inputPrice">Price</label>
            <input type="text" name="Price" class="form-control" id="Price">
            </div>
        </div>
        <div class="form-group">
            <label for="SelectPropertyType">Property Type</label>
            <select class="form-control" name="PropertyType" id="PropertyType">
            <option>Bungalow</option>
            <option>Flat</option>
            </select>
        </div>
        <div class="form-group">
            <div class="row">
                <legend class="col-form-label col-sm-2 pt-0">For</legend>
                <div class="col-sm-10">
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="gridRadios" id="gridRadios1" value="Rent" checked>
                        <label class="form-check-label"  for="gridRadios1">
                            Rent
                        </label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="gridRadios" id="gridRadios1" value="Sale">
                        <label class="form-check-label"  for="gridRadios2">
                            Sale
                        </label>
                    </div>
                </div>
            </div>
        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-danger" data-dismiss="modal">Cancel</button>
            <button type="subimit" name="updatedata" class="btn btn-success">Update</button>
        </div>
        </form>
      </div>
    </div>
  </div>
</div>
        <!--Delete Property pop-up -->
        <div class="modal fade" id="deleteproperty" tabindex="-1" role="dialog" aria-labelledby="propertyDataLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="propertyDataLabel">Confirm Deletion</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
            <form action="deletedata.php" method="POST">
                <input type="hidden" name="id_delete" id="id_delete">

                <h4> Do you wish to DELETE this Property?</h4>
 
        <div class="modal-footer">
            <button type="button" class="btn btn-danger" data-dismiss="modal">Cancel</button>
            <button type="subimit" name="deletedata" class="btn btn-success">Proceed</button>
        </div>
        </form>
      </div>
    </div>
  </div>
</div>
    </body>
</html>