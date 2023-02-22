<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://kit.fontawesome.com/972f63b1c4.js" crossorigin="anonymous"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <link rel="stylesheet" href="style.css">
    <title>Agence immobilière</title>
</head>
<body>
<section class="p-2">
        <header class="d-flex justify-content-between p-4">
            <div>
                <ul class="d-flex flex-row justify-content-between text-light">
                    <li class="fw-bold">HOME</li>
                    <li>BUY</li>
                    <li>RENT</li>
                    <li>SELL</li>
                    <li>HELP</li>
                </ul>
            </div>
            <form>
                <!-- <button id="deposeButton" class="p-2 rounded-4 fw-bold" formaction="ajout.php">Deposer votre annonce</button> -->
                <button id="deposeButton" class="p-2 rounded-4 fw-bold" formaction="inscrii.php">INSECRIPTION</button>
            </form>
        </header>
        <div class="text text-center text-light p-5">
            <h1>THE PERFECT BASE FOR YOU</h1>
            <p>Find your dream home with us</p>
        </div>
        <form action="" method="POST">
            <div class="d-flex justify-content-around text-light">
                <div>
                    <select class="form-select" name="categorie">
                        <option selected>categorie</option>
                        <option value="Location">Location</option>
                        <option value="Vente">Vente</option>
                    </select>
                </div>
                <div>
                    <select class="form-select" name="type_annonce">
                        <option selected>type</option>
                        <option value="appartement">appartement</option>
                        <option value="maison">maison</option>
                        <option value="villa">villa</option>
                        <option value="bureau">bureau</option>
                        <option value="terrain">terrain</option>
                    </select>
                </div>
                <div>
                    <select class="form-select" name="ville">
                        <option selected>Ville</option>
                        <option value="Tanger">Tanger</option>
                        <option value="Tétouan">Tétouan</option>
                        <option value="Hoceïma">Hoceïma</option>
                        <option value="Assilah">Assilah</option>
                        <option value="Chefchaouen">Chefchaouen</option>
                    </select>
                </div>
                <div class="d-flex">
                    <h3 class="m-2">Prix :</h3>
                    <p class="m-2">Min</p>
                    <input class="m-1" type="number" name="min" >
                    <p class="m-2">Max</p>
                    <input class="m-1" type="number" name="max">
                    <input type="submit" name="Search" value="search" id="button">
                </div>
            </div>
        </form>
    </section>
    <main class="d-flex flex-row justify-content-center flex-wrap" >
                <div class="row" ></div>
                <?php
                    require_once 'conexion.php';
                              
                                if(isset($_POST["Search"]))
                                {
                                    $Min = $_POST["min"];
                                    $Max = $_POST["max"];
                                    $categorie = $_POST["categorie"];
                                    $Search = "SELECT * FROM annonce WHERE prix BETWEEN '$Min' AND '$Max' AND categorie = '$categorie'";
                                    $response = $connexion->query($Search);
                                    // VILLE
                                    $ville = $_POST["ville"];
                                    $Search = "SELECT * FROM annonce WHERE ville = '$ville'";
                                    // MIN AND MAX
                                    $Min = $_POST["min"];
                                    $Max = $_POST["max"];
                                    $Search = "SELECT * FROM annonce WHERE prix BETWEEN '$Min' AND '$Max'";
                                    // TYPE
                                    $Type = $_POST["type_annonce"];
                                    $Search = "SELECT * FROM annonce WHERE type_annonce = '$Type'";
                                    // CATEGORIE
                                    $categorie = $_POST["categorie"];
                                    $Search = "SELECT * FROM annonce WHERE categorie = '$categorie'";

                                    while ($champ = $response->fetch_assoc()) {

                                    echo " <div class='card col-md-3'>
                                    <img class='card-img-top' src='" .$champ['url_image_principal']. "' alt='Card image cap'>
                                    <div class='card-body'>
                                        <h5 class='card-title'>" . $champ["titre"] . "</h5>
                                        <p class='card-text'>" . $champ["categorie"] . "</p>
                                    </div>
                                    <ul class='list-group list-group-flush'>
                                        <li class='list-group-item'>" . $champ["type_annonce"] . "</li>
                                        <li class='list-group-item'>" . $champ["supérficie"] . "</li>
                                        <li class='list-group-item'>" . $champ["adresse"] . "</li>
                                        <li class='list-group-item'>" . $champ["prix"] . "</li>
                                    </ul>
                                    <div class='card-body'>
                                    <form action='datails.php' method='post'>
                                    <input type='hidden' name='id_annonce' value=".$champ['id_annonce'].">
                                    <button class='card-link btn btn-outline-success fw-bold' name='datails' type='submit'>Datails</button>
                                </form>
                                        </div>
                                        </div>";
                                        }      
                                } 
                                else {
                                    $sql = "SELECT * FROM annonce";
                                    $result = $connexion->query($sql);
                                    while ($row = $result->fetch_assoc()) {
                                    echo " <div class='card col-md-3'>
                                            <img class='card-img-top' src='" .$row['url_image_principal']. "' alt='Card image cap'>
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
                                            <form action='datails.php' method='post'>
                                            <input type='hidden' name='id_annonce' value=".$row['id_annonce'].">
                                            <button class='card-link btn btn-outline-success fw-bold' name='datails' type='submit'>Datails</button>
                                        </form>
                                            </div>
                                        </div>";
                                    }
                                }
                                if (isset($_POST["Search"]))
                                {
                                    $ville = $_POST["ville"];
                                    $Search = "SELECT * FROM annonce WHERE ville = '$ville'";
                                $response = $connexion->query($Search);
                                while ($city = $response->fetch_assoc()) {
                                echo " <div class='card col-md-3'>
                                <img class='card-img-top' src='" .$city['url_image_principal']. "' alt='Card image cap'>
                                
                                <div class='card-body'>
                                    <h5 class='card-title'>" . $city["titre"] . "</h5>
                                    <p class='card-text'>" . $city["categorie"] . "</p>
                                </div>
                                <ul class='list-group list-group-flush'>
                                    <li class='list-group-item'>" . $city["type_annonce"] . "</li>
                                    <li class='list-group-item'>" . $city["supérficie"] . "</li>
                                    <li class='list-group-item'>" . $city["adresse"] . "</li>
                                    <li class='list-group-item'>" . $city["prix"] . "</li>
                                </ul>
                                <div class='card-body'>
                                <form action='datails.php' method='post'>
                                <input type='hidden' name='id_annonce' value=".$city['id_annonce'].">
                                <button class='card-link btn btn-outline-success fw-bold' name='datails' type='submit'>Datails</button>
                            </form>
                                </div>
                            </div>";
                            }
                        }
                        else {
                            $sql = "SELECT * FROM annonce";
                            $result = $connexion->query($sql);
                            while ($row = $result->fetch_assoc()) {
                            echo " <div class='card col-md-3'>
                                    <img class='card-img-top' src='" .$row['url_image_principal']. "' alt='Card image cap'>
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
                                    <form action='datails.php' method='post'>
                                    <input type='hidden' name='id_annonce' value=".$row['id_annonce'].">
                                    <button class='card-link btn btn-outline-success fw-bold' name='datails' type='submit'>Datails</button>
                                </form>
                                    </div>
                                </div>";
                            }
                        }

                        if(isset($_POST["Search"]))
                        {
                            $Min = $_POST["min"];
                            $Max = $_POST["max"];
                        $Search = "SELECT * FROM annonce WHERE prix BETWEEN '$Min' AND '$Max'";
                        $response = $connexion->query($Search);
                        while ($champss = $response->fetch_assoc()) {
                        echo " <div class='card col-md-3'>
                        <img class='card-img-top' src='" .$champss['url_image_principal']. "' alt='Card image cap'>
                        <div class='card-body'>
                            <h5 class='card-title'>" . $champss["titre"] . "</h5>
                            <p class='card-text'>" . $champss["categorie"] . "</p>
                        </div>
                        <ul class='list-group list-group-flush'>
                            <li class='list-group-item'>" . $champss["type_annonce"] . "</li>
                            <li class='list-group-item'>" . $champss["supérficie"] . "</li>
                            <li class='list-group-item'>" . $champss["adresse"] . "</li>
                            <li class='list-group-item'>" . $champss["prix"] . "</li>
                        </ul>
                        <div class='card-body'>
                        <form action='datails.php' method='post'>
                        <input type='hidden' name='id_annonce' value=".$champ['id_annonce'].">
                        <button class='card-link btn btn-outline-success fw-bold' name='datails' type='submit'>Datails</button>
                    </form>
                        </div>
                    </div>";
                    }
                }
                else {
                    $sql = "SELECT * FROM annonce";
                    $result = $connexion->query($sql);
                    while ($row = $result->fetch_assoc()) {
                    echo " <div class='card col-md-3'>
                            <img class='card-img-top' src='" .$row['url_image_principal']. "' alt='Card image cap'>
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
                            <form action='datails.php' method='post'>
                            <input type='hidden' name='id_annonce' value=".$row['id_annonce'].">
                            <button class='card-link btn btn-outline-success fw-bold' name='datails' type='submit'>Datails</button>
                        </form>
                            </div>
                        </div>";
                    }
                }
                if(isset($_POST["Search"]))
                {
                    $Type = $_POST["type_annonce"];
                    $Search = "SELECT * FROM annonce WHERE type_annonce = '$Type'";
                    $response = $connexion->query($Search);
                    while ($champe = $response->fetch_assoc()) {
                    echo " <div class='card col-md-3'>
                    <img class='card-img-top' src='" .$champe['url_image_principal']. "' alt='Card image cap'>
                    <div class='card-body'>
                        <h5 class='card-title'>" . $champe["titre"] . "</h5>
                        <p class='card-text'>" . $champe["categorie"] . "</p>
                    </div>
                    <ul class='list-group list-group-flush'>
                        <li class='list-group-item'>" . $champe["type_annonce"] . "</li>
                        <li class='list-group-item'>" . $champe["supérficie"] . "</li>
                        <li class='list-group-item'>" . $champe["adresse"] . "</li>
                        <li class='list-group-item'>" . $champe["prix"] . "</li>
                    </ul>
                    <div class='card-body'>
                    <form action='datails.php' method='post'>
                    <input type='hidden' name='id_annonce' value=".$champe['id_annonce'].">
                    <button class='card-link btn btn-outline-success fw-bold' name='datails' type='submit'>Datails</button>
                </form>
                        </div>
                        </div>";
                        }      
                }
                else {
                    $sql = "SELECT * FROM annonce";
                    $result = $connexion->query($sql);
                    while ($row = $result->fetch_assoc()) {
                    echo " <div class='card col-md-3'>
                            <img class='card-img-top' src='" .$row['url_image_principal']. "' alt='Card image cap'>
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
                                <form action='datails.php' method='post'>
                                    <input type='hidden' name='id_annonce' value=".$row['id_annonce'].">
                                    <button class='card-link btn btn-outline-success fw-bold' name='datails' type='submit'>Datails</button>
                                </form>
                            </div>
                        </div>";
                    }
                }
                if (isset($_POST["Search"]))
                                {
                                    $categorie = $_POST["categorie"];
                                    $Search = "SELECT * FROM annonce WHERE categorie = '$categorie'";
                                $response = $connexion->query($Search);
                                while ($champs = $response->fetch_assoc()) {
                                echo " <div class='card col-md-3'>
                                <img class='card-img-top' src='" .$champs['url_image_principal']. "' alt='Card image cap'>
                                
                                <div class='card-body'>
                                    <h5 class='card-title'>" . $champs["titre"] . "</h5>
                                    <p class='card-text'>" . $champs["categorie"] . "</p>
                                </div>
                                <ul class='list-group list-group-flush'>
                                    <li class='list-group-item'>" . $champs["type_annonce"] . "</li>
                                    <li class='list-group-item'>" . $champs["supérficie"] . "</li>
                                    <li class='list-group-item'>" . $champs["adresse"] . "</li>
                                    <li class='list-group-item'>" . $champs["prix"] . "</li>
                                </ul>
                                <div class='card-body'>
                                <form action='datails.php' method='post'>
                                <input type='hidden' name='id_annonce' value=".$champs['id_annonce'].">
                                <button class='card-link btn btn-outline-success fw-bold' name='datails' type='submit'>Datails</button>
                            </form>
                                </div>
                            </div>";
                            }
                        }
                        else {
                            $sql = "SELECT * FROM annonce";
                            $result = $connexion->query($sql);
                            while ($row = $result->fetch_assoc()) {
                            echo " <div class='card col-md-3'>
                                    <img class='card-img-top' src='" .$row['url_image_principal']. "' alt='Card image cap'>
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
                                    <form action='datails.php' method='post'>
                                    <input type='hidden' name='id_annonce' value=".$row['id_annonce'].">
                                    <button class='card-link btn btn-outline-success fw-bold' name='datails' type='submit'>Datails</button>
                                </form>
                                    </div>
                                </div>";
                            }
                        }
                ?>
            </div>
            
    </main>
    <!-- SCRIPTS -->
    <script src="script.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
</body>
</html>