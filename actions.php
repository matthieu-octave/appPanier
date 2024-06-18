<?php

require 'required.php';

if(isset($_POST['submit'])) {
    $name = filter_input(INPUT_POST, "name", FILTER_SANITIZE_FULL_SPECIAL_CHARS);
    $price = filter_input(INPUT_POST, "price", FILTER_VALIDATE_FLOAT, FILTER_FLAG_ALLOW_FRACTION);
    $descr = filter_input(INPUT_POST, "descr", FILTER_DEFAULT);
    $image_name = filter_input(INPUT_POST, "image_name", FILTER_DEFAULT);
    //$_SESSION['msg'] = var_dump($_FILES);

    if(isset($_FILES['image_path']) && $_FILES['image_path'] != NULL  && $_POST['name'] != NULL) {
        //$file= $_FILES['image_path'];
        $path = "uploads"; 
        $extensions_valides = array('jpg', 'JPG', 'png', 'PNG'); 
        $extension_upload = substr(strrchr($_FILES['image_path']['name'],'.'),1);
        
        if(in_array($extension_upload, $extensions_valides)) {  // l'extension est ok 
            $image_name = $image_name.'.'.$extension_upload;
            $path = $path."/".$image_name;       
            $resultat = move_uploaded_file($_FILES['image_path']['tmp_name'], $path);  // on envoie le fichier

            if($name && $price && $descr && $path && $image_name) {
                $lastId = insertProduct($name, $descr, $path, $image_name, $price);
                echo $lastId;
                //var_dump($file);
                $_SESSION['msg'] = "Produit ajouté";
                header("Location:admin.php");
                die;
            } else {
                $_SESSION['msg'] = "Formulaire mal rempli !";
            }
        } else {
            $_SESSION['msg'] = "Extension non valide !";
        }
    } else {
        $_SESSION['msg'] = "Un probleme s'est produit.";
    }
    header("Location:admin.php");
} 

else if (isset($_GET['action'])){
    switch ($_GET['action']) {
      
        case "del":
            if (isset($_GET['id'])) { 
                $id = intval($_GET['id']);
                delOneOfCart($id);
                $_SESSION['msg'] = "Produit supprimé du panier";
            }
            header("Location:cart.php?showMsg");
            die;
        break;
        
        case "clear":
            $_SESSION['msg'] = "Tous les produits ont été supprimés du panier";
            clearCart();
            header("Location:index.php?showMsg");
            die;
        break;

        case "addCart":
            if (isset($_GET['id'])) { 

                $id = intval($_GET['id']);
                addToCart($id);
                $_SESSION['msg'] = "Produit ajouté !";
            }
            else $_SESSION['msg'] = "Formulaire mal rempli !";
            header("Location:cart.php?showMsg");
            die;
        break;
    }
}
else $_SESSION['msg'] = "Casse-toi, sale pirate du dimanche !";



header("Location:admin.php");
