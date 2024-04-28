<?php 

require("config/commandes.php");

$Produits = afficher();

?>


<!doctype html>
<html lang="en" data-bs-theme="auto">
  <head><script src="/docs/5.3/assets/js/color-modes.js"></script>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors">
    <meta name="generator" content="Hugo 0.122.0">
    <title>HoopsThreads</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@docsearch/css@3">

    <link href="/docs/5.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">

  </head>
  <body>
    <header data-bs-theme="dark">
      <div class="collapse text-bg-dark" id="navbarHeader">
        <div class="container">
          <div class="row">
            <div class="col-sm-8 col-md-7 py-4">
              <h4>About</h4>
              <p class="text-body-secondary">Add some information about the album below, the author, or any other background context. Make it a few sentences long so folks can pick up some informative tidbits. Then, link them off to some social networking sites or contact information.</p>
            </div>
            <div class="col-sm-4 offset-md-1 py-4">
              <h4>Sign in</h4>
              <ul class="list-unstyled">
                <li><a href="login.php" class="text-white">Se connecter</a></li>
              </ul>
            </div>
          </div>
        </div>
      </div>
      <div class="navbar navbar-dark bg-dark shadow-sm">
        <div class="container">
          <a href="#" class="navbar-brand d-flex align-items-center">
            <strong>HoopsThreads</strong>
          </a>
          <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarHeader" aria-controls="navbarHeader" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>
        </div>
      </div>
    </header>

    <main>

    <div class="album py-5 bg-body-tertiary">
        <div class="container">

        <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 g-3">

        <?php foreach($Produits as $produit): ?> <!-- Début de la boucle foreach -->
          <div class="col"> <!-- Début de la colonne Bootstrap -->
              <div class="card shadow-sm"> <!-- Début de la carte Bootstrap avec ombre -->
                  <h4 class="text-center mt-3 mb-5"><?= $produit->nom?></h4> <!-- Titre de la carte, probablement une erreur (voir explication plus bas) -->
                  <img src="<?= $produit->image?>"> <!-- Image du produit -->
                  <div class="card-body"> <!-- Corps de la carte -->
                      <p class="card-text"><?= substr($produit->description, 0, 200) ?></p> <!-- Description du produit, limitée à 200 caractères -->
                      <div class="d-flex justify-content-between align-items-center"> <!-- Conteneur flex pour aligner les éléments -->
                          <div class="btn-group"> <!-- Groupe de boutons -->
                              <button type="button" class="btn btn-sm btn-outline-secondary">Acheter</button> <!-- Bouton "Acheter" -->
                          </div>
                          <small class="text-body-secondary fw-bold fs-5"><?= $produit->prix?>€</small> <!-- Prix du produit -->
                      </div> <!-- Fin du conteneur flex -->
                  </div> <!-- Fin du corps de la carte -->
              </div> <!-- Fin de la carte -->
          </div> <!-- Fin de la colonne Bootstrap -->
        <?php endforeach; ?> <!-- Fin de la boucle foreach -->

            </div>
        </div>
    </div>

    </main>


    </body>
</html>
