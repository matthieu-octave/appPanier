<nav class="navbar navbar-expand-md navbar-dark bg-dark py-3">
        <div class="container-fluid">
            <a class="navbar-brand" href="index.php">Panier AJAX</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false"
                aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav me-auto">
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="index.php">Accueil</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="cart.php">Panier</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="admin.php">Gestion des produits</a>
                    </li>
                </ul>
                <ul class="navbar-nav ms-auto me-3">
                    <li class="nav-item">

                        <a type="button" class="btn btn-light position-relative" href="cart.php">
                            <i class="bi bi-cart-fill"></i>
                            <span
                                class="position-absolute top-0 start-100 translate-middle badge rounded-pill bg-secondary" id="badge">
                                <?php
                                if($carts) {
                                    echo $totalQty;
                                } else {
                                    echo '0';
                                }
                                ?>
                                
                            </span><span class="visually-hidden">Articles dans le panier</span>
                        </a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
    <script src="cart.js"></script>