<?php
Class CrudApp
{
    private $conn;

    public function __construct()
    {
        $dbhost = 'localhost';
        $dbuser = 'root';
        $dbpass = "";
        $dbname = 'crudapp';

        $this->conn = mysqli_connect($dbhost, $dbuser, $dbpass, $dbname);

        if (!$this->conn) {
            die("Database Initialisation error");
        }
    }

    public function add_data($data)
    {
        $stdName = $data['stdName'];
        $stdId = $data['stdId'];
        $stdEmail = $data['stdEmail'];
        $stdImage = $_FILES['stdImage']['name'];
        $tmpName = $_FILES['stdImage']['tmp_name'];

        $query = "INSERT INTO studentinfo (stdName,stdId,stdEmail,stdImage) VALUE ('$stdName','$stdId','$stdEmail','$stdImage')";

        if (mysqli_query($this->conn, $query)) {
            move_uploaded_file($tmpName, "uploads/$stdImage");
            header("Location:index.php?message=insertsuccess");
            exit();
        }
    }

    public function display_data()
    {
        $query = "SELECT * FROM studentinfo";
        if (mysqli_query($this->conn, $query)) {
            $display_data = mysqli_query($this->conn, $query);
            return $display_data;
        }
    }

    public function display_data_by_id($id)
    {
        $query = "SELECT * FROM studentinfo WHERE id = $id";
        if (mysqli_query($this->conn, $query)) {
            $display_data_by_id = mysqli_query($this->conn, $query);
            $studentdata = mysqli_fetch_assoc($display_data_by_id);
            return $studentdata;
        }
    }

    public function update_data($data)
    {
        $id = $data['uniqueId'];
        $stdName = $data['ustdName'];
        $stdId = $data['ustdId'];
        $stdEmail = $data['ustdEmail'];
        $stdImage = $_FILES['ustdImage']['name'];
        $tmpName = $_FILES['ustdImage']['tmp_name'];

        $query = "UPDATE studentinfo SET stdName = '$stdName' , stdId = '$stdId' , stdEmail = '$stdEmail' , stdImage = '$stdImage' WHERE id = $id";

        if (mysqli_query($this->conn, $query)) {
            move_uploaded_file($tmpName, "uploads/$stdImage");
            header("Location:index.php?output=updatesuccess");
            exit();
        }
    }

    public function delete_data($id)
    {
        $catch_img = "SELECT * FROM studentinfo WHERE id=$id";
        $catchImage = mysqli_query($this->conn, $catch_img);
        $imageData = mysqli_fetch_assoc($catchImage);
        $delImage = $imageData['stdImage'];
        $query = "DELETE FROM studentinfo WHERE id=$id";
        if (mysqli_query($this->conn, $query)) {
            unlink("uploads/$delImage");
            header("Location:index.php?result=deletesuccess");
            exit();
        }
    }
}