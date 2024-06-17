<?php

function dbConnect() {
    $options = [
        \PDO::ATTR_ERRMODE            => \PDO::ERRMODE_EXCEPTION,
        \PDO::ATTR_DEFAULT_FETCH_MODE => \PDO::FETCH_ASSOC,
        \PDO::MYSQL_ATTR_INIT_COMMAND   => 'SET NAMES utf8',
    ];

    try {
        $bdd = new PDO ('mysql:host=localhost; dbname=store; charset=utf8', 'root', '', $options);
        return $bdd;
    } catch (PDOException $e) {
        throw new PDOException($e->getMessage(), (int)$e->getCode());
    }  
}

function findAll() {  
    $response = dbConnect()->query("SELECT * FROM products");
	return $response -> fetchAll();
}

function findOneById($id) {
    $response = dbConnect()->prepare("SELECT * FROM products WHERE id=:id");
    $response->bindParam(":id", $id, PDO::PARAM_INT);
    $response->execute();
	return $response -> fetch(PDO::FETCH_ASSOC);
}

function insertProduct($name, $descr, $image, $price) {
    if(!isset($image) || empty($image)) {
        $image = "img/placeholder.png";
    }

    $conn = dbConnect();
    $stmt= $conn-> prepare("INSERT INTO products 
                                        (name, description, image, price) 
                                        VALUES 
                                        (:name, :descr, :image, :price)");
                
    $stmt->bindParam(':name', $name, PDO::PARAM_STR);
    $stmt->bindParam(':descr', $descr, PDO::PARAM_STR);
    $stmt->bindParam(':image', $image, PDO::PARAM_STR);
    $stmt->bindParam(':price', $price, PDO::PARAM_STR);
    
    $stmt->execute();
    
    return $conn->lastInsertId();
}

function cartDisplay() {
    $stmt = dbConnect()->prepare("SELECT * FROM carts");
    $stmt->execute();
	return $stmt -> fetchAll();
}

function cartQty() {
    $stmt = dbConnect()->prepare("SELECT sum(quantity) as totalQty FROM carts");
    $stmt->execute();
	return $stmt -> fetch();
}

function addToCart($id) {
    $product = findOneById($id);
    $product_name = $product['name'];
    $price = $product['price'];
    $image = $product['image_path'];
    $quantity = 1;
    $row_total = $price * $quantity;

    $stmt= dbConnect()-> prepare("INSERT INTO carts 
                                        (cart_id, product_id, product_name, image_path, price, quantity, row_total) 
                                        VALUES 
                                        (:cart_id, :product_id, :product_name, :image_path, :price, :quantity, :row_total)");
    $stmt->bindParam(":cart_id", $_SESSION['cartId'], PDO::PARAM_INT);
    $stmt->bindParam(":product_id", $id, PDO::PARAM_INT);
    $stmt->bindParam(':product_name', $product_name, PDO::PARAM_STR);
    $stmt->bindParam(':image_path', $image, PDO::PARAM_STR);
    $stmt->bindParam(':price', $price, PDO::PARAM_STR);
    $stmt->bindParam(':quantity', $quantity, PDO::PARAM_INT);
    $stmt->bindParam(':row_total', $row_total, PDO::PARAM_STR);
    
    $stmt->execute();
    return $stmt;
}

function delOneOfCart($id) {
    $stmt = dbConnect()->prepare("DELETE FROM carts WHERE id=:id");
    $stmt->bindParam(":id", $id, PDO::PARAM_INT);
    $stmt->execute();
	return true;
}

function clearCart() {
    $stmt = dbConnect()->prepare("DELETE FROM carts");
    $stmt->execute();
	return true;
}
