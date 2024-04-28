<?php 

    session_start(); // Démarre une nouvelle session ou restaure la session existante

    if(isset($_SESSION['zWukTTh65fg4h6'])) { // Vérifie si la clé 'zWukTTh65fg4h6' existe dans la session
        $_SESSION['zWukTTh65fg4h6'] = array(); // Réinitialise la valeur de la clé 'zWukTTh65fg4h6' à un tableau vide

        session_destroy(); // Détruit complètement la session
        
        header('Location: ../index.php'); // Redirige l'utilisateur vers la page d'accueil
    } else {
        header('Location: ../login.php'); // Redirige l'utilisateur vers la page de connexion
    }

?>
