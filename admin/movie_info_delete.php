<?php
require_once '../config.php';
include '../dbConnect.php';
session_start();
if (isset($_GET['id'])) {
        $id = $_GET['id'];
        $sql = "DELETE from `all_movie_info` where id=$id";
        $result = mysqli_query($con, $sql);
        if($result){
        echo "
            <script>
            alert('Data deleted');
            window.location.href='movie_info';
            </script>
            ";
        }else{
            echo "
            <script>
            alert('Data not deleted');
            window.location.href='movie_info';
            </script>
            ";
        }

}
?>