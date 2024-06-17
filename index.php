<?php
require 'required.php';
$cartId = time();
$_SESSION['cartId'] = $cartId;

$products = findAll();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.1/font/bootstrap-icons.css">
    <title>Accueil</title>
</head>

<body>
    <?php include 'nav.php' ?>
    <div class="container">
        <h1 class="text-center">Accueil</h1>
        <h3 class="text-center text-info">
            <?php if (empty($_GET)) {
                echo "";
            } else {
                echo  $_SESSION['msg'];
            }
            ?>
        </h3>
        <?php
        $row_cols = '<div class="row row-cols-1 row-cols-md-3 p-3">';
        $counter = 0;
        ?>
        <?php foreach ($products as $res) {
            $break = false;
            //print("Le compteur vaut $counter");   

            if ($counter % 3 == 0) {
                $break = true;
                 if ($counter == 0) {
                     echo "";
                 } else {
                     echo $break ? "</div>" : "";
                 }
                echo $break ? $row_cols : "";
            }
        ?>
            <div class="col">
                <div class="card h-100 border-primary-subtle bg-transparent pt-3" data-bs-theme="dark">
                    <img src="<?= $res['image_path'] ?>" class="card-img-top mx-auto" alt="<?= $res['name'] ?>" style="height: 12vw; width: auto">
                    <div class="card-body border-primary-subtle"  >
                        <a href="product.php?product=<?= $res['id'] ?>">
                            <h5 class="card-title text-capitalize text-secondary" style="text-decoration: underline; text-decoration-color: white;"><?= strtolower($res['name']) ?></h5>
                        </a>
                        <p class="card-text text-dark"><?= mb_strimwidth($res['description'], 0, 50, "..."); ?></p>
                        </p>
                    </div>
                    <div class="card-footer text-center text-light border-primary-subtle bg-primary-subtle" data-bs-theme="dark">
                    <p class="card-text fw-bold text-end h1 pb-3"><?= number_format($res['price'], 2, ",", "&nbsp;") . "&nbsp;€" ?></p>
                        <a href="actions.php?action=addCart&id=<?= $res['id'] ?>" type="button" class="btn btn-outline-light">Ajouter au panier</a>
                    </div>
                </div>
            </div>
        <?php
            $counter++;
        } ?>
        </div>
    </div>



    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>

</body>

</html>