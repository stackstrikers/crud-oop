<?php

include "functions.php";
$objone = new CrudApp();

$read_student_data = $objone->display_data();

if(isset($_GET['status'])){
    if($_GET['status'] = 'update'){
        $id = $_GET['id'];
       $returndata = $objone->display_data_by_id($id);
    }
    }
if(isset($_POST['update_submit']))
{
    $objone->update_data($_POST);
}


?>

<!doctype html>
<html lang="en">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <title>CRUD</title>
</head>
<body>
<h1 class="text-center my-4"> Update Student Details</h1>
<div class="container my-4 p-4 shadow">
    <form action="" method="post" enctype="multipart/form-data" class="form">
        <div class="mb-3">
            <label for="ustdName">Enter Your Name</label>
            <input type="text" name="ustdName" id="ustdName" class="form-control" value="<?php echo $returndata['stdName']; ?>"
        </div>
        <div class="mb-3">
            <label for="ustdId">Enter Your Id</label>
            <input type="text" name="ustdId" id="ustdId" class="form-control" value="<?php echo $returndata['stdId']; ?>">
        </div>
        <div class="mb-3">
            <label for="ustdEmail">Enter Your Email</label>
            <input type="email" name="ustdEmail" id="ustdEmail" class="form-control" value="<?php echo $returndata['stdEmail']; ?>">
        </div>
        <input type="hidden" name="uniqueId" value="<?php echo $returndata['id']; ?>">
        <div class="mb-3">
            <label for="ustdImage">Upload Your Image</label>
            <input type="file" name="ustdImage" id="ustdImage" class="form-control">
        </div>

        <input type="submit" value="Edit Information" name="update_submit" class="btn btn-success">
    </form>
</div>



<!-- Option 1: Bootstrap Bundle with Popper -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</body>
</html>

