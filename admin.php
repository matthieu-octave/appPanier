<?php
require 'required.php';
    $totalQty= $qtty['totalQty'];
    if(isset($_SESSION['msg'])) {
        echo "";
    }
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.1/font/bootstrap-icons.css">
    <link rel="stylesheet" href="style.css">
    <title>Ajout produit</title>
</head>

<body>
<?php include 'nav.php' ?>
    <div class="container">
        <h1 class="text-center">Ajout produit</h1>
        <form action="actions.php" method="post" class="text-center mt-5">
            <p>
                <label class="form-label">Nom du produit :
                    <input type="text" class="form-control" name="name">
                </label>
            </p>
            <p>
                <label class="form-label">Prix du produit :
                    <input type="number" class="form-control" step="any" name="price">
                </label>
            </p>
            <p>
                <label class="form-label">Description :
                    <textarea class="form-control" name="descr" rows="3"></textarea>
                </label>
            </p>
            <p>
                <input type="submit" class="btn btn-outline-dark" name="submit" value="Ajouter le produit">
            </p>
        </form>
    </div>
    </div>
    <?php
        if($msg = afficherMsg()){
            ?>
            <div class="modal" id="myModal" tabindex="-1">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title">Yop !</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <p><?= $msg ?></p>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Ok</button>
                        </div>
                    </div>
                </div>
            </div>
            <script>
                window.addEventListener('load', ()=>{
                    myModal.show();
                }) 
            </script>
            <?php
        }
    ?>
    
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous">
    </script>
    <script>
        var myModal = new bootstrap.Modal(document.getElementById('myModal'))
    </script>
    <script src="cart.js"></script>
</body>

</html>