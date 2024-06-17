<?php

require 'required.php';

if(isset($_POST['submit'])) {
    $name = filter_input(INPUT_POST, "name", FILTER_SANITIZE_FULL_SPECIAL_CHARS);
    $price = filter_input(INPUT_POST, "price", FILTER_VALIDATE_FLOAT, FILTER_FLAG_ALLOW_FRACTION);
    $descr = filter_input(INPUT_POST, "descr", FILTER_DEFAULT);

    if($name && $price && $descr) {
        $lastId = insertProduct($name, $descr, $price);
        echo $lastId;
        $_SESSION['msg'] = "Produit ajouté !";
        header("Location:admin.php");
        die;
    } else {
        $_SESSION['msg'] = "Formulaire mal rempli !";
    }

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



header("Location:index.php");
