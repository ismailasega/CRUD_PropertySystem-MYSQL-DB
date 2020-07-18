<?php
session_start();

include 'config.php';

$dbconnect = mysqli_connect(db_server, db_username, db_password,db_name) or die("Connect failed: %s\n". $dbconnect -> error);

if ( !isset($_POST['username'], $_POST['password']) ) {
	exit('Please fill both the username and password fields!');
}
if ($sqlstmt = $dbconnect->prepare('SELECT id, password FROM users WHERE username = ?')) {
	$sqlstmt->bind_param('s', $_POST['username']);
	$sqlstmt->execute();
    $sqlstmt->store_result();
    if ($sqlstmt->num_rows > 0) {
        $sqlstmt->bind_result($id, $password);
        $sqlstmt->fetch();
        if ($_POST['password'] === $password){
            session_regenerate_id();
            $_SESSION['loggedin'] = TRUE;
            $_SESSION['name'] = $_POST['username'];
            $_SESSION['id'] = $id;
            header('Location: asegadb.php');
        } else {
            echo 'Incorrect password!';
        }
    } else {
        echo 'Incorrect username!';
    }


	$sqlstmt->close();
}
  

?>