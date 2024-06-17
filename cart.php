<?php
    require 'required.php';
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.1/font/bootstrap-icons.css">
    <link rel="stylesheet" href="style.css">
    <title>Récapitulatif des produits</title>
</head>
<body>
<?php include 'nav.php' ?>
    <div class="container">
        <div class="row text-center">
            <h1>Panier</h1>
            <h3 class="text-info">
                <?php if(empty($_GET)){
                    echo "";
                } else {
                  echo  $_SESSION['msg'];
                }
                ?>
            </h3>
        </div>
        <div class="row mt-5">

    <?php 
        if(count($carts) == 0) {
            echo "<p class'h3'>Votre panier est vide</p>";
        } else {
            echo "<table class='table table-striped text-center'>",            
                    "<thead>",
                        "<tr>",
                            "<th>#</th>",
                            "<th>Nom</th>",
                            "<th>Prix</th>",
                            '<th>Quantité</th>',
                            "<th class='text-end'>Total</th>",
                            '<th>Supprimer</th>',
                    "</tr>",
                "</thead>",
                "<tbody>";
            $grandTotal = 0; 
            $itemNb = 1;
            foreach($carts as $cart) {

                echo "<tr>",
                        "<td>".$itemNb."</td>",
                        "<td>".$cart['product_name']."</td>",
                        "<td>".number_format($cart['price'], 2, ",", "&nbsp;")."&nbsp;€</td>";
?>
                        <td><button type='button' onclick='updateQuantity("minus", <?=$cart["product_id"]?>, <?=$cart["id"]?>)' class='btn bg-primary-subtle text-light me-2' data-bs-theme="dark">-</button>
<?php
                        echo '<input type="text" id="cartRow'.$cart['id'].'" value="'.$cart['quantity'].'" class="priceInput" readonly>';
                        ?>
                        <button type='button' onclick='updateQuantity("plus", <?=$cart["product_id"]?>, <?=$cart["id"]?>)' class='btn bg-primary-subtle text-light ms-2' data-bs-theme="dark">+</button></td>
<?php echo
                        "<td class='text-end' id='rowTotal".$cart['id']."'>".number_format($cart['row_total'], 2, ",", "&nbsp;")."&nbsp;€</td>",
                        '<td><a type="button" href="actions.php?action=del&id='.$cart['id'].'" class="btn btn-danger"><i class="bi bi-trash-fill"></i></a></td>',
                        "</tr>";
            $grandTotal += $cart['row_total'];
            $itemNb++;
            }

            echo "<tr>",
                        "<td class='fw-bold text-start' colspan=4>Total général : </td>",
                        "<td class='text-end' id='grandTotal'><strong>".number_format($grandTotal, 2, ",", "&nbsp;")."&nbsp;€</strong></td>",
                        "<td></td>",
                        "</tr>",
                "</tbody>",
            "</table>";
        }
    ?>


        </div>
                <div class="row mt-5 text-center">
                    <div class="col">
                        <a type="button" href="actions.php?action=clear" class="btn bg-primary-subtle text-light w-100" data-bs-theme="dark">Vider le panier</a>
                    </div>
                    <div class="col">
                        <a type="button" href="actions.php?action=clear" class="btn btn-success w-100" data-bs-theme="dark">Payer</a>
                    </div>
                    
                </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/jquery-3.6.3.min.js" integrity="sha256-pvPw+upLPUjgMXY0G+8O0xUf+/Im1MZjXxxgOcBQBXU=" crossorigin="anonymous"></script>
<script src="cart.js"></script>
</body>
</html>