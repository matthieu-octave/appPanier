<?php
require 'required.php';

$cartId = $_SESSION['cartId'];
$productId = $_GET['productId'];
$currentQty = $_GET['currentQty'];
$action = $_GET['action'];


$productPrice = 0;

// Prix unitaire du produit
$unitPriceStmt = dbConnect()->prepare("SELECT price FROM products WHERE id=:id");
$unitPriceStmt->bindValue(":id", $productId, PDO::PARAM_INT);
$unitPriceStmt->execute();
$productPrice = $unitPriceStmt->fetch();
$productPrice = $productPrice['price'];


if($action == 'minus'){
    $newQty = $currentQty - 1;
}else{
    $newQty = $currentQty + 1;
}

$row_total = $productPrice * $newQty;

// Mettre les qté et row-total en BDD
$updQtyStmt = dbConnect()->prepare("UPDATE carts SET quantity = :quantity, row_total = :row_total WHERE product_id =:product_id");

$updQtyStmt->bindValue(":quantity", $newQty, PDO::PARAM_INT);
$updQtyStmt->bindValue(":row_total", $row_total, PDO::PARAM_STR);
$updQtyStmt->bindValue(":product_id", $productId, PDO::PARAM_INT);
$updQtyStmt->execute();

$grandTotalStmt = dbConnect()->prepare("SELECT * FROM carts");
$grandTotalStmt->execute();


$grandTotal = 0;
while ($res = $grandTotalStmt->fetch()) {
    $grandTotal += $res['row_total'];
}



// Si plusieurs choses à retourner à ajax
$response = [];
$response['grandTotal'] = $grandTotal;
$response['rowTotal'] = $row_total;

echo json_encode($response);

