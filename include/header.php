    <link rel="stylesheet" href="https://cdn.jsdelivr.net/gh/duyplus/fontawesome-pro/css/all.min.css">

    <!-- Navbar  -->

    <nav class="navbar navbar-expand-lg bg-light">
        <div class="container-fluid">
            <a class="navbar-brand" href="home.php">Panneaux Alum</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            Dropdown
                        </a>
                        <ul class="dropdown-menu">
                            <?php
                            foreach ($categories as $cat) {
                                echo '<li><a class="dropdown-item" href="#">' .  $cat['1'] . '</a></li>';
                                echo '<li><hr class="dropdown-divider"></li>';
                            }
                            ?>
                        </ul>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="index.php">Poduits</a>
                    </li>
                    <?php
                    if (isset($_SESSION['nom'])) {
                        print '
                            <li class="nav-item">
                                <a class="nav-link" href="profile.php">Profile</a></li>';
                        print '<li class="nav-item">
                                <a class="nav-link danger " style=" color:#000;" href="panier.php"> <i class=" fa-regular fa-bag-shopping"></i> <span class="text-danger">(';
                        //pour afficher 0 quaud il n'y a pas de  panier
                        // we can use isset or is_array
                        if (isset($_SESSION['panier'][3])) {
                            print count($_SESSION['panier'][3]);
                        } else echo 0;
                        print ') 
                                </a>
                            </li>';
                    } else {
                        print '
                        <li class="nav-item">
                            <a class="nav-link" href="connexion.php">connexion</a></li>
                        <li class="nav-item">
                            <a class="nav-link" href="registre.php">registre</a>
                        </li>
                        ';
                    } ?>
                </ul>
                <form class="d-flex" action="/E-COMMERCE/index.php" method="POST">
                    <input class="form-control me-2" type="search" name="search" placeholder="Search" aria-label="Search">
                    <button class="btn btn-outline-success" type="submit"> <i class="fa-solid fa-magnifying-glass"></i> Search</button>
                </form>
                <?php
                if (isset($_SESSION['nom'])) {
                    print '
                            <a class="btn btn-primary m-lg-2" href="deconnexion.php">Deconnexion</a>';
                }
                ?>


            </div>
        </div>
    </nav>