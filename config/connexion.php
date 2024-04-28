<?php

try {
    $access= new pdo("mysql:host=localhost;dbname=monoshop;charset=utf8", "root", ""); // Établit une connexion à la base de données MySQL avec les paramètres fournis
    
    $access->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_WARNING); // Définit le mode de gestion des erreurs sur "ERRMODE_WARNING", ce qui signifie que PDO émettra des avertissements en cas d'erreur

    } catch (Exception $e) { // Capture une éventuelle exception de type Exception
        $e->getMessage(); // Récupère le message de l'exception
    }

?>
