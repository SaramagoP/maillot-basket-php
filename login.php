<?php 

session_start();

include "config/commandes.php";

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>

    <title>Login</title>
</head>
<body>
<br>
<br>
<br>
<br>

<div class="container-fluid">
    <div class="row">
        <div class="col-md-3"></div>
        <div class="col-md-6">

            <form method="post">
                <div class="mb-3">
                    <label for="emai" class="form-label">Email</label>
                    <input type="email" class="form-control" name="email" style="width: 80%">
                </div>
                <div class="mb-3">
                    <label for="password" class="form-label">Password</label>
                    <input type="password" class="form-control" name="password" style="width: 80%">
                </div>
                <input type="submit" class="btn btn-danger" name="envoyer" value="Se connecter" style="width: 80%">
            </form>

        </div>
        <div class="col-md-3"></div>
    </div>
</div>

<?php 

if(isset($_POST["envoyer"])) { // Vérifie si le formulaire a été soumis en cherchant la présence de la clé "envoyer" dans $_POST
    if(!empty($_POST['email']) AND !empty($_POST['password'])) { // Vérifie si les champs email et password ne sont pas vides
        $email = htmlspecialchars($_POST['email']); // Assainit et récupère la valeur du champ email
        $password = htmlspecialchars($_POST['password']); // Assainit et récupère la valeur du champ password

        $admin = getAdmin($email, $password); // Appelle la fonction getAdmin pour vérifier les informations d'identification de l'administrateur

        if($admin) { // Si les informations d'identification sont valides
            
            $_SESSION['zWukTTh65fg4h6'] = $admin; // Stocke les informations de l'administrateur dans la session

            header("Location: admin/index.php"); // Redirige vers la page d'administration
    
        } else {
            echo 'Problème de connexion !'; // Affiche un message d'erreur si les informations d'identification sont incorrectes
        }
    }
}

?>

</body>
</html>