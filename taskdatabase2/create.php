<?php


include 'config.php';

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Create Record</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.css">
    <style type="text/css">
        .wrapper {
            width: 500px;
            margin: 0 auto;
        }
    </style>
</head>

<?php


$employee_name = $address = $Salary = $position = "";
$username_err = $email_err = $password_err = "";

if (isset($_POST["submit"])) {
    
    if (isset($_FILES['image']["name"]) && !empty ($_FILES['image']["name"])) {

        $target_dir = "imgs/";
        $target_file = $target_dir . basename($_FILES["image"]["name"]);
        $uploadOk = 1;
        $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));
        // Check if image file is a actual image or fake image

        
        if (move_uploaded_file($_FILES['image']['tmp_name'], $target_file)) {
            $file= $_FILES["image"]["name"] ;
           
        }

    }else{

        $file= 'default.png' ;
    }

    $sql = "INSERT INTO employees (employee_name, Address, Salary ,position , employee_image )
VALUES ('" . $_POST['employee_name'] . "', '" . $_POST['Address'] . "', '" . $_POST['Salary'] . "',
'" . $_POST['position'] . "', '$file' )";

    $conn->query($sql);

    header('Location: index.php');
}

?>

<body>
    <div class="wrapper">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="page-header">
                        <h2>Create Record</h2>
                    </div>
                    <p>Please fill this form and submit to add employee record to the database.</p>
                    <div class="form">
                        <form action="" method="post" enctype="multipart/form-data">
                            <div class=" col-12">
                                <label for="employee_name" class="form-label">employee_name</label>
                                <input type="text" class="form-control" id="employee_name" name="employee_name" require value="<?php echo $employee_name; ?>">

                            </div>
                            <div class=" col-12">
                                <label for="Address" class="form-label">Address</label>
                                <input type="ext" class="form-control" id="Address" name="Address" value="<?php echo $address; ?>" require>

                            </div>
                            <div class="name">
                                <div class=" col-12">
                                    <label for="Salary" class="form-label">Salary</label>
                                    <input type="text" class="form-control" id="Salary" name="Salary" value="<?php echo $Salary;  ?>" require>

                                </div>

                            </div>
                            <div class="">
                                <label for="position" class="form-label">position</label>
                                <input type="text" class="form-control" id="position" name="position" value="<?php echo $position;  ?>" require>

                            </div>

                            <div class="">
                                <label for="image" class="form-label">image</label>
                                <input type="file" class="form-control" id="image" name="image">

                            </div>

                            <div style="padding-top: 20px;" class="buttons">
                                <a href=""><button type="submit" name="submit" class="btn btn-primary"> Create</button></a>
                            </div>

                        </form>
                        <br>
                        <a href="index.php" style="padding-top: 10px;"><button class="btn btn-primary">Back</button></a>
                    </div>


                </div>
            </div>
        </div>
    </div>
    </div>
</body>

</html>