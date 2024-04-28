<?php

function modifier ($image, $nom, $prix, $desc, $id)
{
    if(require("connexion.php"))  // Si la connexion est réussie
    {
        $req = $access->prepare("UPDATE produits SET `image`=?, nom=?, prix=?, `description`=? WHERE _id_produits=?"); // Prépare la requête SQL
        
        $req->execute(array($image, $nom, $prix, $desc, $id)); // Exécute la requête

        $req->closeCursor(); // Ferme le curseur de la requête
    
    }
}

function getProduit ($_id_produits) {
    if(require("connexion.php"))  // Si la connexion est réussie
    {
        $req = $access->prepare("SELECT * FROM produits WHERE _id_produits =?"); // Prépare la requête SQL
        
        $req->execute(array($_id_produits)); // Exécute la requête avec les paramètres d'id

        if($req->rowCount() == 1) { // Si une ligne est retournée

            $data = $req->fetchAll(PDO::FETCH_OBJ); // Récupère la première ligne de résultat sous forme de tableau associatif

            return $data; // Retourne les données de l'administrateur
        } else {
            return false; // Retourne false si aucun résultat n'est retourné
        }

        $req->closeCursor(); // Ferme le curseur de la requête
    }
}

function getAdmin ($email, $password) {
    if(require("connexion.php"))  // Si la connexion est réussie
    {
        $req = $access->prepare("SELECT * FROM ADMIN WHERE email =? AND password =?"); // Prépare la requête SQL
        
        $req->execute(array($email, $password)); // Exécute la requête avec les paramètres email et password

        if($req->rowCount() == 1) { // Si une ligne est retournée

            $data = $req->fetch(); // Récupère la première ligne de résultat sous forme de tableau associatif

            return $data; // Retourne les données de l'administrateur
        } else {
            return false; // Retourne false si aucun résultat n'est retourné
        }

        $req->closeCursor(); // Ferme le curseur de la requête
    }
}


function ajouter ($image, $nom, $prix, $desc)
{
    if(require("connexion.php"))  // Si la connexion est réussie
    {
        $req = $access->prepare("INSERT INTO produits (image, nom, prix, description) VALUES ('$image', '$nom', $prix, '$desc')"); // Prépare la requête SQL
        
        $req->execute(); // Exécute la requête

        $req->closeCursor(); // Ferme le curseur de la requête
    
    }
}

function afficher()
{
    if(require("connexion.php"))  // Si la connexion est réussie
    {
        $req = $access->prepare("SELECT * FROM produits ORDER BY _id_produits DESC"); // Prépare la requête SQL

        $req->execute(); // Exécute la requête

        $data = $req->fetchAll(PDO::FETCH_OBJ); // Récupère tous les résultats sous forme d'objets

        return $data; // Retourne les données
        
    }
    $req->closeCursor(); // Ferme le curseur de la requête
}

function supprimer($id)
{
    if(require("connexion.php"))  // Si la connexion est réussie
    {
        $req=$access->prepare("DELETE FROM produits WHERE _id_produits=?"); // Prépare la requête SQL

        $req->execute(array($id)); // Exécute la requête avec l'id à supprimer
    }
}

?>
