<?php
    include "conn.php";

    $sql = "SELECT * FROM `etudiant`";
    $result = mysqli_query($conn, $sql);
    


?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat&display=swap" rel="stylesheet">
    <title>Etudiant | HW2</title>
    <style>
        *{
            font-family: 'Montserrat', sans-serif;
        }
        table{
            background: #fff;
        }
        table, th, td {
            border:1px solid black;
        }
        body{
            background: #ececec;
        }
        a{
            text-decoration: none;
        }
    </style>
</head>
<body>
    <table style="width:100%">
        <tr>
            <th>Id</th>
            <th>Nom</th>
            <th>Prénome</th>
            <th>Supprimer</th>
            <th>Modifier</th>
        </tr>
        <?php 
            if(mysqli_num_rows($result) > 0){
                while ($row = mysqli_fetch_assoc($result)){
                    echo "<tr>";
                    echo "<td>". $row['id'] ."</td>";
                    echo "<td>". $row['nom'] ."</td>";
                    echo "<td>". $row['prenom'] ."</td>";
                    echo "<td><a href='supprimer.php?id=". $row['id'] ."'><button>&#10008;</button></a></td>";
                    echo "<td><a href='modifier.php?id=". $row['id'] ."'><button>&#9998;</button></a></td>";
                    echo "</tr>";
                }
            }
        ?>
    </table>
    <a href="ajouter.php"> &#10009; Ajouter etudiant</a>
    <?php
        if(isset($_GET['dsucces'])){
            echo "<h6 style='color: green'>L'etudiant(e) a été supprimé.</h6>";
        }
        if(isset($_GET['usucces'])){
            $nom = $_GET['nom'] . " " . $_GET['prenom'];
            echo "<h6 style='color: green'>". $nom . " updated.</h6>";
        }
    ?>
    
</body>
</html>