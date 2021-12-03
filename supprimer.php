<?php 
    include "conn.php";
    if(isset($_GET['id'])){
        $id = $_GET['id'];
        $sql = "DELETE FROM `etudiant` WHERE `etudiant`.`id` = '$id';";
        $result = mysqli_query($conn, $sql);
        if($result){
            header("Location: etudiant.php?dsucces");
            exit;
        }else{
            header("Location: etudiant.php?derror");
            exit;
        }
    }