<?php

include 'config.php';

$employee_id = $_GET['id'];


$sql = "SELECT * FROM employees WHERE id=$employee_id";
$result = $conn->query($sql);

$row = $result->fetch_assoc();

?>
<html>
<style>
    table,
    th,
    td {
        border: 1px solid black;
        border-collapse: collapse;
        text-align: center;
    }

    .add {
        margin-left: 1500px;
        margin-bottom: 20px;
        color: #04AA6D;
    }

    #customers {
        font-family: Arial, Helvetica, sans-serif;
        border-collapse: collapse;
        width: 100%;
    }

    #customers td,
    #customers th {
        border: 1px solid #ddd;
        padding: 8px;
    }

    #customers tr:nth-child(even) {
        background-color: #f2f2f2;
    }

    #customers tr:hover {
        background-color: #ddd;
    }

    #customers th {
        padding-top: 12px;
        padding-bottom: 12px;
        text-align: center;
        background-color: #04AA6D;
        color: white;
    }
</style>
<table id="customers" style="width:100%">
    <tr>
        <th>employee image </th>
        <th>employee name</th>
        <th> Address</th>
        <th> Salary</th>
        <th>position</th>

    </tr>
    <br>

    <tr>
        <td><img style="width: 100px; height :100px " src=" imgs/<?php echo $row["employee_image"] ?>" alt=""></td>
        <td><?php echo $row["employee_name"]   ?></td>
        <td><?php echo $row["Address"]   ?></td>
        <td><?php echo $row["Salary"]   ?></td>
        <td><?php echo $row["position"]   ?></td>


    </tr>

    <button> <a style="color: #04AA6D  ; " href=" index.php"> <b> Back </b> </a> </button>

</html>