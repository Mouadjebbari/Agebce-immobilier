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
                <button id="deposeButton" class="p-2 rounded-4 fw-bold" formaction="ajout.php">Deposer votre annonce</button>
                
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
                    
                    session_start();       
                    if (isset($_SESSION['id_client'])) {
                        $id_client = $_SESSION['id_client'];
                        $conn = mysqli_connect('localhost', 'root', '', 'db_annonce');
                        if ($conn->connect_error) {
                            die("Connection failed: " . $conn->connect_error);
                        }
                        $sql = "SELECT * FROM annonce WHERE id_client = '$id_client'";
                        $result = mysqli_query($conn, $sql);     
                        while ($row = mysqli_fetch_assoc($result)) {                               
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
                                        <input type='hidden' name='id_client' value=".$row['id_client'].">
                                        <button class='card-link btn btn-outline-success fw-bold' onclick='update.php' name='edit' value=".$row['id_client'].">Update</button>
                                        <button class='card-link btn btn-outline-danger fw-bold' type='submit' name='delete'>Delete</button>
                                        <button class='card-link btn btn-outline-success fw-bold' name='datails' type='submit'>Datails</button>
                                    </form>
                                        </div>
                                    </div>";
                        }
                        
                        $conn->close();
                    }
                        ?>
            </div>
            
    </main>
    <!-- SCRIPTS -->
    <script src="script.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
</body>
</html>