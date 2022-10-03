<?php

include 'config.php';

$employee_id = $_GET['id'];


$sql = "DELETE FROM employees WHERE id=$employee_id";
$result = $conn->query($sql);

header('Location: index.php');


?>