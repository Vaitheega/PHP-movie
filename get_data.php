<?php

$servername = "localhost";
$username = "root";
$password = "root";
$dbname = "movies";

$link = mysqli_connect($servername, $username, $password, $dbname);

if (!$link) {
    die("Connection failed: " . mysqli_connect_error());
}

$search = $_GET['search'] ?? '';

$sql = "SELECT movies.mid, movies.mname, movies.myear, genres.mgenre, movies.mrating
        FROM movies
        JOIN genres ON movies.mgenreid = genres.gid
        WHERE movies.mname LIKE ?";

$stmt = $link->prepare($sql);

$searchTerm = "%" . $search . "%";

$stmt->bind_param("s", $searchTerm);

$stmt->execute();

$result = $stmt->get_result();

?>

<!DOCTYPE html>
<html>
<head>
    <title>All Movies</title>
</head>

<body>

<h1>All Movies</h1>

<form method="GET" action="get_data.php">
    <input type="text" name="search" placeholder="Search movie name">
    <input type="submit" value="Search">
</form>

<br>

<table border="1">

    <tr>
        <th>ID</th>
        <th>Movie Name</th>
        <th>Year</th>
        <th>Genre</th>
        <th>Rating</th>
    </tr>

    <?php

    while ($row = $result->fetch_assoc()) {

        echo "<tr>";
        echo "<td>" . $row['mid'] . "</td>";
        echo "<td>" . $row['mname'] . "</td>";
        echo "<td>" . $row['myear'] . "</td>";
        echo "<td>" . $row['mgenre'] . "</td>";
        echo "<td>" . $row['mrating'] . "</td>";
        echo "</tr>";

    }

    ?>

</table>

<br>

<a href="insert_data.html">Add another movie</a>

</body>
</html>

<?php

$stmt->close();
$link->close();

?>