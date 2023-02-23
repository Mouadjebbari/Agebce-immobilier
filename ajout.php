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
    <section class="u-align-center u-clearfix u-gradient u-section-3" id="carousel_babd">
        <div class="u-clearfix u-sheet u-sheet-1">
        <section id="bg" class="h-100 h-custom fw-bold">
                <div class="container py-5 h-100" id="agency">
                    <div class="row d-flex justify-content-center align-items-center h-100">
                        <div class="card-body p-4 p-md-5">
                            <h2 class="mb-4 pb-2 pb-md-0 mb-md-5 px-md-2">Deposer votre annonce :</h2>
                            <hr>
                            <form class="px-md-2" method="POST">
                                <div class="form-outline mb-4">
                                    <label class="form-label" for="form3Example1q">Titre</label>
                                    <input type="text" id="form3Example1q" class="form-control" name="titre" />
                                </div>
                                <div class="form-outline mb-4">
                                    <label class="form-label" for="form3Example1q">Image principale</label>
                                    <input type="file" id="form3Example1q" class="form-control" name="url_image_principal" />
                                </div>
                                <div class="form-outline mb-4">
                                    <label class="form-label" for="form3Example1q">Image 2</label>
                                    <input type="file" id="form3Example1q" class="form-control" name="url_image1" />
                                </div>
                                <div class="form-outline mb-4">
                                    <label class="form-label" for="form3Example1q">Superficie</label>
                                    <input type="text" id="form3Example1q" class="form-control" name="supérficie" />
                                </div>
                                <div class="form-outline mb-4">
                                    <label class="form-label" for="form3Example1q">Adresse</label>
                                    <input type="text" id="form3Example1q" class="form-control" name="adresse" />
                                </div>
                                <div class="form-outline mb-4">
                                    <label class="form-label" for="form3Example1q">Prix</label>
                                    <input type="text" id="form3Example1q" class="form-control" name="prix" />
                                </div>
                                <div>
                                <select class="form-select" name="type_annonce">
                                    <option selected>Type annonce</option>
                                    <option value="appartement">appartement</option>
                                    <option value="maison">maison</option>
                                    <option value="villa">villa</option>
                                    <option value="bureau">bureau</option>
                                    <option value="terrain">terrain</option>
                                </select>
                                </div>
                                <div class="form-outline mb-4">
                                    <label class="form-label" for="form3Example1q">Date de publication</label>
                                    <input type="date" id="form3Example1q" class="form-control" name="date_publication" />
                                </div>
                                <div class="form-outline mb-4">
                                    <label class="form-label" for="form3Example1q">Date de modification</label>
                                    <input type="date" id="form3Example1q" class="form-control" name="date_modification" />
                                </div>
                                <select class="form-select" name="ville">
                                    <option selected>Ville</option>
                                    <option value="appartement">Tanger</option>
                                    <option value="maison">Al Hoceima</option>
                                    <option value="villa">L'Arache</option>
                                    <option value="bureau">Asilah</option>
                                    <option value="terrain">Tetouan</option>
                                </select>
                                <Br></Br>
                                <select class="form-select" name="categorie">
                                    <option selected>Categorie</option>
                                    <option value="Location">Location</option>
                                    <option value="Vente">Vente</option>
                                </select>
                                <Br></Br>
                                <button type="submit" name="insert" class="btn btn-outline-success bg-light fw-bold">Submit</button>
                            </form>
                        </div>
                    </div>
                </div>
            </section>
        </div>
    </section>
    <?php
    session_start();
    require_once 'conexion.php';

    if (isset($_POST['insert'])) {
        $id_client = $_SESSION["id_client"];
        $Titre = $_POST['titre'];
        $Image = $_FILES['url_image_principal'];
        $Image2 = $_FILES['url_image1'];
        $Superficie = $_POST['supérficie'];
        $Adresse = $_POST['adresse'];
        $Prix = $_POST['prix'];
        $Type_an = $_POST['type_annonce'];
        $Date_publication = $_POST['date_publication'];
        $Date_modification = $_POST['date_modification'];
        $Ville = $_POST['ville'];
        $Categorie = $_POST['categorie'];

        
        $sql = "INSERT INTO annonce (titre, prix, date_publication, date_modification,  adresse,  ville,  categorie, type_annonce, url_image_principal, url_image ) VALUES ('$Titre','$Prix','$Date_publication' ,'$Date_modification' ,'$Adresse' ,'$Ville' ,'$Categorie', '$Type_an', '$Image', ' $Image2' )";
        if ($conn->query($sql) != FALSE ) {
            $id_annonce = $conn->lastInsertId();
        if($result){
            header("location:client.php");
        }else {
            echo "insertion echeo";
        }
    }
    ?>
</body>
</html>