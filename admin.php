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
        <form action="actions.php" method="post" class="text-center mt-5 border-primary-subtle" data-bs-theme="dark">
            <p>
                <label class="form-label w-100">Nom du produit :
                    <input type="text" class="form-control bg-transparent text-dark" name="name">
                </label>
            </p>

            <p>
                <label class="form-label w-100">Nom de l'image :
                    <input type="text" class="form-control bg-transparent text-dark" name="image_name">
                </label>
            </p>

            <p>
            <label for="formFile" class="form-label w-100">Choisissez une image (jpg, png)
                <input class="form-control bg-light text-dark" type="file" id="formFile" name="image_path">
            </label>
            </p>
            
            <p>
                <label class="form-label w-100">Prix du produit :
                    <input type="number" class="form-control bg-transparent text-dark" step="any" name="price">
                </label>
            </p>

            <p>
                <label class="form-label w-100">Description :
                    <textarea class="form-control bg-transparent text-dark" name="descr" rows="3"></textarea>
                </label>
            </p>
            <p>
                <input type="submit" class="btn bg-primary-subtle text-light" name="submit" value="Ajouter le produit" data-bs-theme="dark">
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
                            <h5 class="modal-title">Message</h5>
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