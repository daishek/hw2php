<?php 
    include "conn.php";
    if(isset($_GET['id'])){
        $id = $_GET['id'];
        $sql = "SELECT * FROM `scolarite`.`etudiant` WHERE `etudiant`.`id` = '$id';";
        $result = mysqli_query($conn, $sql);
        if(mysqli_num_rows($result) > 0){
            $row = mysqli_fetch_assoc($result);
        }
    }
    if(isset($_POST['modifier'])){
        $id = $_POST['id'];
        $nom = $_POST['nom'];
        $prenom = $_POST['prenom'];
        $username = $_POST['username'];
        $pass = $_POST['pass'];
        $usql = "UPDATE `etudiant` SET `nom` = '$nom', `prenom` = '$prenom', `user` = '$username', `password` = '$pass' WHERE `etudiant`.`id` = '$id' ;";
    
        $uresult = mysqli_query($conn, $usql);
        if($uresult){
            header("Location: etudiant.php?usucces&nom=$nom&prenom=$prenom&id=$id&uid=$updateid");
            exit;
        }else{
            header("Location: etudiant.php?error");
            exit;
        }
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Modifier...</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat&display=swap" rel="stylesheet">
    <style>
        *{
            font-family: 'Montserrat', sans-serif;
        }
        body{        
            background: #ececec;
            display: flex;
            justify-content: center;
            flex-direction: column;
            align-items: center;
            height: 100vh;
        }
        form{
            background: #fff;
            border-radius: 15px;
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
            padding: 1rem 5rem;
        }
        input{
            margin: 10px;
            border-radius: 15px;
            padding: 5px;
        }
    </style>
</head>
<body>
    <form action="modifier.php" method="POST">
        <?php echo $id ?>
        <input value="<?php echo $row['id'] ?>" placeholder="id..." type="text" name="id">
        <input value="<?php echo $row['nom'] ?>" placeholder="Nom..." type="text" name="nom">
        <input value="<?php echo $row['prenom'] ?>" placeholder="Prénom..." type="text" name="prenom">
        <input value="<?php echo $row['user'] ?>" placeholder="Utulisateur..." type="text" name="username">
        <input value="<?php echo $row['password'] ?>" placeholder="Mot de pass..." type="password" name="pass">
        <input type="submit" name="modifier" value="Enregistrer">
    </form>
    <h6><a href="etudiant.php">Retourner &#10140;</a></h6>
</body>
</html>