<?php

?>

<?php

include 'config.php';


// for edit 
$userEdit = $_GET["id"];

$sql = "SELECT * FROM employees WHERE id=$userEdit";

$conn->query($sql);

$result = $conn->query($sql);

if ($result->num_rows > 0) {

    $row = $result->fetch_assoc();
}

if (isset($_POST["submit"])) {


    if (isset($_FILES['image']["name"]) && !empty($_FILES['image']["name"])) {

        $target_dir = "imgs/";
        $target_file = $target_dir . basename($_FILES["image"]["name"]);
        $uploadOk = 1;
        $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));
        // Check if image file is a actual image or fake image


        if (move_uploaded_file($_FILES['image']['tmp_name'], $target_file)) {
            $file = $_FILES["image"]["name"];
        }
    } else {
        $file = $row['employee_image'];
    }

    $sql = "UPDATE employees SET employee_name= '" . $_POST['employee_name'] . "' ,
     Address ='" . $_POST['Address'] . "' , Salary='" . $_POST['Salary'] .
        "' , position = '" . $_POST['position'] .
        "', employee_image='" . $file . "' WHERE id=$userEdit";


    $conn->query($sql);

    header('Location: index.php');
}

?>

<head>

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
    <script src="https://kit.fontawesome.com/5576d2ced3.js"></script>
    <div class="container" id="container">
</head>
<style>
    input[type=text],
    select {
        width: 100%;
        margin: 8px 0;
        display: inline-block;
        border: 1px solid #ccc;
        border-radius: 4px;
        box-sizing: border-box;
    }

    input[type=submit] {
        width: 100%;
        background-color: #4CAF50;
        color: white;
        border: none;
        border-radius: 4px;
        cursor: pointer;
    }

    input[type=submit]:hover {
        background-color: #45a049;
    }

    div {
        border-radius: 5px;
        background-color: #f2f2f2;
    }
</style>
<div class="head">
    <h1>Edit Form </h1>
</div>
<div class="form">
    <form action="" method="post" enctype="multipart/form-data">
        <div class=" col-12">
            <label for="employee_name" class="form-label">employee name :</label>
            <input type="text" class="form-control" id="employee_name" name="employee_name" require value="<?php echo $row["employee_name"]; ?>">

        </div>
        <div class=" col-12">
            <label for="Address" class="form-label">Address :</label>
            <input type="ext" class="form-control" id="Address" name="Address" value="<?php echo $row["Address"]; ?>" require>

        </div>
        <div class="name">
            <div class=" col-12">
                <label for="Salary" class="form-label">Salary :</label>
                <input type="text" class="form-control" id="Salary" name="Salary" value="<?php echo $row["Salary"];  ?>" require>

            </div>

        </div>
        <div style="padding-left: 10px;" class="">
            <label for="position" class="form-label">position :</label>
            <input type="text" class="form-control" id="position" name="position" value="<?php echo $row["position"];  ?>" require>

        </div>

        <div style="padding-left: 10px; " class="">
            <label for=" image" class="form-label">image</label>
            <input type="file" class="form-control" id="image" name="image">

        </div>
        <div class="buttons">
            <a href=""><button style="margin-top: 20px;margin-left: 10px;" type="submit" name="submit" class="btn btn-primary">Update</button></a>
        </div>

    </form>

    <a href="index.php" style="padding-top: 10px;padding-left: 10px ;"><button class="btn btn-primary">Back</button></a>
</div>


</div>
<div>