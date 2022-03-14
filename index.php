<?php
include "functions.php";
$objone = new CrudApp();

if (isset($_POST['submit'])){
    $objone->add_data($_POST);
    }

$read_student_data = $objone->display_data();

if(isset($_GET['status'])){
    if($_GET['status'] = 'delete'){
        $delid = $_GET['id'];
        $objone->delete_data($delid);
    }
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
<h1 class="text-center my-4"> Enter Student Details</h1>

<div class="container my-4 p-4 shadow">
    <form action="" method="post" enctype="multipart/form-data" class="form">

            <?php
                if (isset($_GET['message'])){
                if ($_GET['message'] = 'insertsuccess'){
                    echo ' <div class="container my-4 p-4 shadow text-center fw-bold"> Data Inserted Successfully </div>';
                }
            }

            if (isset($_GET['output'])){
                if ($_GET['output'] = 'updatesuccess'){
                    echo ' <div class="container my-4 p-4 shadow text-center fw-bold"> Data Updated Successfully </div>';
                }
            }

            if (isset($_GET['result'])){
            if ($_GET['result'] = 'deletesuccess'){
                    echo ' <div class="container my-4 p-4 shadow text-center fw-bold"> Data Deleted Successfully </div>';
                }
            }
        ?>

        <div class="mb-3">
            <label for="stdName">Enter Your Name</label>
            <input type="text" name="stdName" id="stdName" class="form-control">
        </div>
        <div class="mb-3">
            <label for="stdId">Enter Your Id</label>
            <input type="text" name="stdId" id="stdId" class="form-control">
        </div>
        <div class="mb-3">
            <label for="stdEmail">Enter Your Email</label>
            <input type="email" name="stdEmail" id="stdEmail" class="form-control">
        </div>
        <div class="mb-3">
            <label for="stdImage">Upload Your Image</label>
            <input type="file" name="stdImage" id="stdImage" class="form-control">
        </div>

        <input type="submit" value="Add Information" name="submit" class="btn btn-success">
    </form>
</div>

<div class="container my-4 p-4 shadow">
<table class="table table-responsive">
    <thead>
    <tr>
        <th>Serial</th>
        <th>Name</th>
        <th>ID</th>
        <th>Email</th>
        <th>Image</th>
        <th>Action</th>
    </tr>
    </thead>
    <tbody>
    <?php
    while ($student = mysqli_fetch_assoc($read_student_data)){
    ?>
        <tr>
            <td> <?php echo $student['id']; ?> </td>
            <td> <?php echo $student['stdName']; ?> </td>
            <td> <?php echo $student['stdId']; ?> </td>
            <td> <?php echo $student['stdEmail']; ?> </td>
            <td><img src="uploads/<?php echo $student['stdImage']; ?>" alt='Student Image' width='100px' height='100px'></td>
            <td>
                <a href="update.php?status=update&&id=<?php echo $student['id']; ?>" class="btn btn-primary">Edit</a>
                <a href="?status=delete&&id=<?php echo $student['id']; ?>" class="btn btn-danger">Delete</a>
            </td>
        </tr>
    <?php
    }
    ?>
    </tbody>
</table>
</div>



<!-- Option 1: Bootstrap Bundle with Popper -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</body>
</html>

