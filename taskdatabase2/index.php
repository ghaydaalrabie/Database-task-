<?php


include 'config.php';


$sql = "SELECT * FROM employees ";

$result = $conn->query($sql);

?>


<!DOCTYPE html>
<html>

<head>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
    <script src="https://kit.fontawesome.com/5576d2ced3.js"></script>

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
</head>

<body>

    <br> <br>

    <button class="add"> <a style="color: #04AA6D;" href="create.php"> + Add New Employee</a></button> <br>

    <table id="customers" style="width:100%">
        <tr>
            <th>employee image </th>
            <th>employee name</th>
            <th> Address</th>
            <th> Salary</th>
            <th>position</th>
            <th>Action </th>




        </tr>
        <?php
        if ($result->num_rows > 0) {
            // output data of each row
            // mysqli_fetch_assoc() function fetches a result row as an associative array.
            while ($row = $result->fetch_assoc()) {
        ?>


                <tr>
                    <td><img style="width: 100px; height :100px ; border-radius: 50%; " src="imgs/<?php echo $row["employee_image"] ?> " alt=""></td>
                    <td><?php echo $row["employee_name"]   ?></td>
                    <td><?php echo $row["Address"]   ?></td>
                    <td><?php echo $row["Salary"]   ?></td>
                    <td><?php echo $row["position"]   ?></td>
                    <td><a onclick="return confirm('Are you sure you want to delete?');" href="delete.php?id=<?php echo $row["id"] ?>"> <i class="fas fa-trash"></i></a>
                        <a href="read.php?id=<?php echo $row["id"] ?>"><i class="fas fa-eye"></i></a>
                        <a href="update.php?id=<?php echo $row["id"] ?>"> <i class="fas fa-user-edit"></i></a>
                    </td>


                </tr>
        <?php


            }
        } else {
            echo "0 results";
        }
        $conn->close();
        ?>





    </table>


</body>

</html>


<?php


echo "<br>";
echo "<br>";
