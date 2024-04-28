<?php 

session_start(); // Démarre une nouvelle session ou restaure la session existante

// Vérifie si la clé 'zWukTTh65fg4h6' n'est pas présente dans la session
if(!isset($_SESSION['zWukTTh65fg4h6'])) { 
    // Redirige l'utilisateur vers la page de connexion
    header("Location: ../login.php"); 
}

// Vérifie si la valeur de la clé 'zWukTTh65fg4h6' dans la session est vide
if(empty($_SESSION['zWukTTh65fg4h6'])) { 
    // Redirige l'utilisateur vers la page de connexion
    header("Location: ../login.php"); 
}

// Vérifie si la variable 'pdt' n'est pas définie dans la requête GET.
if(!isset($_GET['pdt'])) {
    // Redirige vers la page 'afficher.php' si la variable 'pdt' n'est pas définie.
    header("Location: afficher.php");
}

// Vérifie si la variable 'pdt' est vide ou non numérique.
if(empty($_GET['pdt']) AND !is_numeric($_GET['pdt'])) {
    // Redirige vers la page 'afficher.php' si la variable 'pdt' est vide ou non numérique.
    header("Location: afficher.php");
}

$id = $_GET["pdt"];

require("../config/commandes.php"); // Inclut le fichier commandes.php situé dans le répertoire config
$Produits = getProduit($id);

foreach($Produits as $Produit) {

    $nom = $Produit->nom;
    $idPdt = $Produit->_id_produits;
    $image = $Produit->image;
    $prix = $Produit->prix;
    $description = $Produit->description;
} 

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

    <nav class="navbar navbar-expand-lg bg-secondary ">
        <div class="container-fluid">
            <a class="navbar-brand" href="# ">HoopsThreads</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a class="nav-link" aria-current="page" href="../admin/" >Nouveau</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="supprimer.php">Suppression</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="afficher.php">Produits</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link active" href="#" style="font-weight: bold; color: green">Modification du Produit</a>
                    </li>
                </ul>
                <div style="display: flex; justify-content: flex-end">
                    <a href="deconnexion.php" class="btn btn-danger">Se deconnecter</a>
                </div>
            </div>
        </div>
    </nav>
    
    <h1 class="d-flex justify-content-center m-5">Ajouter un nouveau produit</h1>

    <div class="album py-5 bg-body-light">
        <div class="container">
            <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 g-3">
                <form method="post" class="d-flex flex-column justify-content-center mx-auto">
                    <div class="mb-3">
                        <label for="exampleInputEmail1" class="form-label">Url de l'image</label>
                        <input type="name" class="form-control" name="image" value="<?= $image ?>" required>
                    </div>
                    <div class="mb-3">
                        <label for="exampleInputPassword1" class="form-label">Nom du produit</label>
                        <input type="text" class="form-control" name="nom" value="<?= $nom ?>" required>
                    </div>
                    <div class="mb-3">
                        <label for="exampleInputPassword1" class="form-label">Prix</label>
                        <input type="number" class="form-control" name="prix" value="<?= $prix ?>" required>
                    </div>
                    <div class="mb-3">
                        <label for="exampleInputPassword1" class="form-label">Description</label>
                        <textarea class="form-control" name="desc" required><?= $description ?></textarea>
                    </div>
                    <button type="submit" name="valider" class="btn btn-success w-50 mx-auto">Enregistrer</button>
                </form>
            </div>
        </div>
    </div>
    

</body>
</html>

<?php 

if(isset($_POST["valider"])) // Vérifie si le formulaire a été soumis en cherchant la présence de la clé "valider" dans $_POST
{
    if(isset($_POST["image"]) AND isset($_POST["nom"]) AND isset($_POST["prix"]) AND isset($_POST["desc"])) // Vérifie si les champs image, nom, prix et desc sont tous présents dans $_POST
    {
    if(!empty($_POST["image"]) AND !empty($_POST["nom"]) AND !empty($_POST["prix"]) AND !empty($_POST["desc"])) // Vérifie si les champs image, nom, prix et desc ne sont pas vides
        {
        $image = htmlspecialchars(strip_tags($_POST["image"])); // Assainit et récupère la valeur du champ image
        $nom = htmlspecialchars(strip_tags($_POST["nom"])); // Assainit et récupère la valeur du champ nom
        $prix = htmlspecialchars(strip_tags($_POST["prix"])); // Assainit et récupère la valeur du champ prix
        $desc = htmlspecialchars(strip_tags($_POST["desc"])); // Assainit et récupère la valeur du champ desc

        modifier ($image, $nom, $prix, $desc, $id); // Appelle la fonction "ajouter" avec les valeurs récupérées
        header("Location: afficher.php");
            
        }
    }
}

?>
