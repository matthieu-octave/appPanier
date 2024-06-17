<?php
require 'required.php';

if (isset($_GET['product'])) {
    $product = findOneById($_GET['product']);
}

$cart = cartDisplay();
$qtty = cartQty();
$totalQty = $qtty['totalQty'];
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.1/font/bootstrap-icons.css">
    <title><?= $product['name'] ?? null // équivalent à $product['name'] ? $product['name'] : null 
            ?></title>
</head>

<body>
    <?php include 'nav.php' ?>
    <div class="container">
        <a href="index.php">Retour</a>
        <h1 class="text-center"><?= $product['name'] ?></h1>
        <div class="row mt-5">
            <div class="col-12">
                <div class="card">
                    <div class="row">
                        <div class="col-6 offset-3">
                            <img src="<?= $product['image_path'] ?>" class="card-img-top" alt="<?= $product['name'] ?>">
                        </div>
                    </div>
                
                    <div class="card-body">
                        <h5 class="card-title display-2"><?= $product['name'] ?></h5>
                        <p class="card-text"><?= $product['description'] ?></p>
                        <p class="card-text h2 text-danger"><?= number_format($product['price'], 2, ",", "&nbsp;") . "&nbsp;€" ?></p>
                    </div>
                    <div class="card-footer text-center">
                        <a href="actions.php?action=addCart&id=<?= $product['id'] ?>" type="button" class="btn btn-outline-dark">Ajouter au panier</a>
                    </div>
                </div>
            </div>
        </div>
    </div>



    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous">
    </script>
    <script src="cart.js"></script>
</body>

</html>