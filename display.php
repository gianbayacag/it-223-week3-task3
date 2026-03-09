<?php
$host = "localhost";
$user = "root";
$password = "";
$dbname = "hr";

$conn = new mysqli($host, $user, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$sql = "SELECT * FROM `view_hr_management`";
$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html>
<head>
<title>Employee List</title>

<!-- Bootstrap -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">

<style>
body{
    background:#f5f7fb;
}

.header{
    background:black;
    color:white;
    padding:20px;
    border-radius:8px;
    margin-bottom:20px;
}

.card{
    border:none;
    border-radius:10px;
    box-shadow:0 4px 10px rgba(0,0,0,0.1);
}

table{
    font-size:14px;
}
</style>

</head>

<body>

<div class="container mt-5">

<div class="header text-center">
<h2>HR Employee Management</h2>
<p>Employee List</p>
</div>

<div class="card">
<div class="card-body">

<table class="table table-striped table-hover">

<thead class="table-dark">
<tr>
<th>Employee ID</th>
<th>Name</th>
<th>Job Title</th>
<th>Employment Date</th>
<th>Manager Name</th>
<th>Department Name</th>
<th>Location</th>
</tr>
</thead>

<tbody>

<?php
if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {

        echo "<tr>";
        echo "<td>".$row['Employee ID']."</td>";
        echo "<td>".$row['Full_name']."</td>";
        echo "<td>".$row['Job Title']."</td>";
        echo "<td>".$row['Employee Date']."</td>";
        echo "<td>".$row['Manager Name']."</td>";
        echo "<td>".$row['Department Name']."</td>";
        echo "<td>".$row['Location']."</td>";
        echo "</tr>";

    }
} else {
    echo "<tr><td colspan='6' class='text-center'>No employees found</td></tr>";
}
?>

</tbody>

</table>

</div>
</div>

</div>

</body>
</html>