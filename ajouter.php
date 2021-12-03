<?php
    include "conn.php";

    if(isset($_POST['ajouter'])){
        $id = $_POST['id'];
        $nom = $_POST['nom'];
        $prenom = $_POST['prenom'];
        $username = $_POST['username'];
        $pass = $_POST['pass'];

        $sql = "INSERT INTO `etudiant` (`id`, `nom`, `prenom`, `user`, `password`) VALUES ('$id', '$nom', '$prenom', '$username', '$pass');";
    
        $result = mysqli_query($conn, $sql);
        if($result){
            header("Location: ajouter.php?succes&nom=$nom&prenom=$prenom");
            exit;
        }else{
            header("Location: ajouter.php?error");
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
    <title>Ajouter | HW2</title>

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
    <?php
        if(isset($_GET['succes'])){
            $nom = $_GET['nom'] . " " . $_GET['prenom'];
            echo "<h6 style='color: green;'>L'etudiant(e) ". $nom ." a été ajouter au base de donnée.</h6>";
        }elseif (isset($_GET['error'])) {
            echo "<h6 style='color: red;'>Réessayer</h6>";
        }
    ?>
    <form action="ajouter.php" method="post">
        <input placeholder="id..." type="text" name="id">
        <input placeholder="Nom..." type="text" name="nom">
        <input placeholder="Prénom..." type="text" name="prenom">
        <input placeholder="Utulisateur..." type="text" name="username">
        <input placeholder="Mot de pass..." type="password" name="pass">
        <input type="submit" name="ajouter" value="Enregistrer">
    </form>
    <h6><a href="etudiant.php">Retourner &#10140;</a></h6>
</body>
</html>