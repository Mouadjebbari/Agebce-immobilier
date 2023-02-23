<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    
    <title>Document</title>
</head>
<body>

<!-- <input type="tel" id="phone" name="phone" placeholder="Enter phone number">
<button onclick="enterPhoneNumber()">Enter Number</button>

<script>
function enterPhoneNumber() {
  var phone = document.getElementById("phone").value;
  alert("Phone number entered: " + phone);
  // You can replace the alert with your own code to process the entered phone number
}
</script> -->

 <section class="datails_section"> 

<?php

          // Define the URLs for the images
                    require_once 'conexion.php';        
                        if (isset($_POST['datails'])) {
                          $id = $_POST['id_annonce'];
                          $datail = "SELECT * FROM annonce WHERE id_annonce = $id";
                        $result_datails = $connexion->query($datail);
                                    
                                    while($row = $result_datails->fetch_assoc()) {
                                      $imageUrls = array(
                                        $row['url_image_principal'],
                                        $row['url_image1'],
                                        $row['url_image2'],
                                        $row['url_image3'],
                                        
                                      );
                                      echo " <div class='card col-md-3'>
                                      
                                      
                                      <div class='card-body'>
                                      <div class='card col-md-3'>
                                      <img class='card-img-top' src='" .$row['url_image_principal']. "' alt='Card image cap'>
                                      <img class='card-img-top' src='" .$row['url_image1']. "' alt='Card image cap'>
                                      <img class='card-img-top' src='" .$row['url_image2']. "' alt='Card image cap'>
                                      <img class='card-img-top' src='" .$row['url_image3']. "' alt='Card image cap'>
                                      
                                      <div class='card-body'>
                                        <ul>
                                          <li class='list-group-item'>" . $row["titre"] . "</li>
                                          <li class='list-group-item'>" . $row["categorie"] . "</li>

                                      </div>
                                      </ul>
                                      <div>
                                      
                                      <ul >
                                          <li class='list-group-item'>" . $row["type_annonce"] . "</li>
                                          <li class='list-group-item'>" . $row["supérficie"] . "</li>
                                          <li class='list-group-item'>" . $row["adresse"] . "</li>
                                          <li class='list-group-item'>" . $row["date_publication"] . "</li>
                                          <li class='list-group-item'>" . $row["date_modification"] . "</li>
                                          <li class='list-group-item'>" . $row["ville"] . "</li>
                                          <li class='list-group-item'>" . $row["supérficie"] . "</li>
                                          <li class='list-group-item'>" . $row["prix"] . "</li>
                                          
                                      </ul>
                                      
                                      <div class='card-body'>
                                      <form action='details.php' method='post'>
                                      <input type='hidden' name='id_annonce' value=".$row['id_annonce'].">
                                        </form>
                                      </div>
                                  </div>";
                                  }
                                  }       
                                  
                            ?>

    
<style>
    
    .list-group,
.list-group-item {
  font-family: 'Roboto', sans-serif;
  color: wheat;
}

ul {
    display: flex;
    flex-direction: column;
    align-items: center;
    padding: 0;
  }
  
  li {
    
    width: 100%;
    max-width: 400px;
    margin-bottom: 10px;
    text-align: center;
   color: white;
  }
  
.datails_section{
    background-image: url(images/bg.jpg);
}

    .card {
  display: flow-root;
  flex-direction: column;
  align-items: center;
}

.card-img-top {
  width: 100%;
  height: auto;
}

.card-body {
  text-align: center;
  border-radius: 5rem;
}


@media only screen and (min-width: 768px) {
  .card-img-container {
    max-width: 768px;
    margin: 0 auto;
  }
  .card-img-top {
    width: 50%;
  }
}

@media only screen and (min-width: 1200px) {
  .card-img-container {
    max-width: 1200px;
  }
  .card-img-top {
    width: 25%;
  }
}
.card-img-top {
  object-fit: cover;
  height: 200px;
}

.card-img-top:hover {
  transform: scale(1.05);
  box-shadow: 0px 0px 20px rgba(0, 0, 0, 0.2);
}

.card-img-top {
  object-fit: cover;
  height: 200px;
  border-radius: 5px;
}

.card-img-top:hover {
  transform: scale(1.05);
  box-shadow: 0px 0px 20px rgba(0, 0, 0, 0.2);
  border: 2px solid #ccc;
  border-radius: 10px;
}

</style>
    <script src="script.js"></script>
    </section>  
    </body>