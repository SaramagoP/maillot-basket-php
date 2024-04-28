<?php 

session_start();

if(!isset($_SESSION['zWukTTh65fg4h6'])) {
    header("Location: ../login.php");
}

if(empty($_SESSION['zWukTTh65fg4h6'])) {
    header("Location: ../login.php");
}

require("../config/commandes.php");

$Produits = afficher();

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>

    <title>Formulaire</title>
</head>
<body>

<nav class="navbar navbar-expand-lg bg-secondary">
  <div class="container-fluid">
    <a class="navbar-brand" href="#">HoopsThreads</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav me-auto mb-2 mb-lg-0">
            <li class="nav-item">
                <a class="nav-link" aria-current="page" href="../admin/">Nouveau</a>
            </li>
            <li class="nav-item">
                <a class="nav-link active" href="supprimer.php" style="font-weight: bold; color: red">Suppression</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="afficher.php">Produits</a>
            </li>
        </ul>
        <div style="display: flex; justify-content: flex-end">
            <a href="deconnexion.php" class="btn btn-danger">Se deconnecter</a>
        </div>
    </div>
  </div>
</nav>
    
    <div class="album py-5 bg-body-light">
        <div class="container">
            <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 g-3">
                <form class="d-flex flex-column justify-content-center mx-auto" method="post">
                    <div class="mb-3">
                        <label for="exampleInputPassword1" class="form-label d-flex justify-content-center"><strong>Identifiant du produit</strong></label>
                        <input type="number" class="form-control" name="idproduit" required>
                    </div>
                    <button type="submit" name="valider" class="btn btn-warning mb-5">Supprimer un produit</button>
                </form>
            </div>
            <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 g-3">
                <?php foreach($Produits as $produit): ?>
                    <div class="col">
                        <div class="card shadow-sm">
                            <img src="<?= $produit->image?>" alt="">
                            <h3><?= $produit->_id_produits?></h2>
                        </div>
                    </div>
                <?php endforeach; ?>
            </div>
        </div>
    </div>
    

</body>
</html>

<?php 

if(isset($_POST["valider"])) // Vérifie si le formulaire a été soumis en cherchant la présence de la clé "valider" dans $_POST
{
    if(isset($_POST["idproduit"])) // Vérifie si le champ idproduit est présent dans $_POST
    {
        if(!empty($_POST["idproduit"]) && is_numeric($_POST["idproduit"])); // Vérifie si le champ idproduit n'est pas vide et est un nombre
        
            $idproduit = htmlspecialchars(strip_tags($_POST["idproduit"])); // Assainit et récupère la valeur du champ idproduit
         
            try {
                supprimer ($idproduit); // Appelle la fonction "supprimer" avec l'idproduit récupéré
            } catch (Exception $e) { // Capture une éventuelle exception
                $e->getMessage(); // Affiche le message de l'exception
            }
        }
    }

?>
