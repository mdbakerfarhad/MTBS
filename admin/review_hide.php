<?php
require_once '../config.php';
include '../dbConnect.php';
session_start();
if (isset($_GET['id'])) {
        $id = $_GET['id'];
        $sql = "UPDATE `reviews` SET `verified`='0' where id=$id";
        $result = mysqli_query($con, $sql);
        if($result){
        echo "
            <script>
            alert('Data updated');
            window.location.href='review_info_view?id=$id';
            </script>
            ";
        }else{
            echo "
            <script>
            alert('Data not updated');
            window.location.href='review_info_view?id=$id';
            </script>
            ";
        }

}
?>