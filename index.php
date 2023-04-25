<?php
require 'required.php';
$cartId = time();
$_SESSION['cartId'] = $cartId;

$products=findAll();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.1/font/bootstrap-icons.css">
        <title>Accueil</title>
</head>

<body>
<?php include 'nav.php' ?>
    <div class="container">
        <h1 class="text-center">Accueil</h1>
        <h3 class="text-center text-info">
            <?php if(empty($_GET)){
                    echo "";
                } else {
                  echo  $_SESSION['msg'];
                }
            ?>
        </h3>
        <div class="row row-cols-1 row-cols-md-2 g-4 mt-5">
            <?php foreach($products as $res){?>
                <div class="col">
                <div class="card">
                    <div class="card-body">
                        <a href="product.php?product=<?=$res['id']?>"><h5 class="card-title"><?=$res['name']?></h5></a>
                        <p class="card-text">
                            <?=mb_strimwidth($res['description'], 0, 50, "...");?></p>
                        <p class="card-text fw-bold"><?=number_format($res['price'], 2, ",", "&nbsp;")."&nbsp;€"?></p>
                    </div>
                    <div class="card-footer text-center">
                        <a href="actions.php?action=addCart&id=<?=$res['id']?>" type="button" class="btn btn-outline-dark">Ajouter au panier</a>
                    </div>
                </div>
            </div>
            <?php } ?>
        </div>



        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"
            integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous">
        </script>
        
</body>

</html>