<?php

$servername = "localhost";
$username = "root";
$password = "root";
$dbname = "movies";

$link = mysqli_connect($servername, $username, $password, $dbname);

if (!$link) {
    die("Connection failed: " . mysqli_connect_error());
}

$mname = $_POST['mname'];    //take the movie name from the form and store it in $mname.
$myear = $_POST['myear'];
$mgenreid = $_POST['mgenreid'];
$mrating = $_POST['mrating'];

$sql = "INSERT INTO movies (mname, myear, mgenreid, mrating)
        VALUES (?, ?, ?, ?)";            //This is an SQL INSERT query.
        // We use it when we want to add a new movie to the database. 
        // placeholders. When the user enters a new details will be put into these places later.

$stmt = mysqli_prepare($link, $sql);

mysqli_stmt_bind_param($stmt, "ssii", $mname, $myear, $mgenreid, $mrating);

mysqli_stmt_execute($stmt);

echo "Movie added successfully.";

mysqli_stmt_close($stmt);
mysqli_close($link);        // finished working , dont need connection anymore

?>