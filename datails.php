<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <link rel="stylesheet" href="style.css">
    <title>Document</title>
</head>
<body>

<?php
                    require_once 'conexion.php';
                    if($connexion->connect_error) {
                        die('Connection failed: '. $connexion->connect_error);
                        }
                             $sql = "SELECT * FROM annonce";
                                            $result = $connexion->query($sql);
                                            while ($row = $result->fetch_assoc()) {
                                            echo " <div class='card col-md-3'>
                                                    <img class='card-img-top' src='images/" .$row['url_image_principal']. "' alt='Card image cap'>
                                                    <div class='card-body'>
                                                        <h5 class='card-title'>" . $row["titre"] . "</h5>
                                                        <p class='card-text'>" . $row["categorie"] . "</p>
                                                    </div>
                                                    <ul class='list-group list-group-flush'>
                                                        <li class='list-group-item'>" . $row["type_annonce"] . "</li>
                                                        <li class='list-group-item'>" . $row["supérficie"] . "</li>
                                                        <li class='list-group-item'>" . $row["adresse"] . "</li>
                                                        <li class='list-group-item'>" . $row["prix"] . "</li>
                                                    </ul>
                                                    <div class='card-body'>
                                                        <form action='index.php' method='post'>
                                                            <input type='hidden' name='id_annonce' value=".$row['id_annonce'].">
                                                        </form>
                                                    </div>
                                                </div>";
                                            }
                                           
    ?>                              
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>          
    <script src="script.js"></script>
    </body>
    </html>