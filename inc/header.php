<header>
    <nav class="navbar navbar-expand-lg bg-body-tertiary">
        <div class="container-fluid">
            <a class="navbar-brand" href="#"><img src="https://api.dicebear.com/5.x/identicon/svg?seed=microservices-v2" alt="" height="20">Microservices</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="#">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Link</a>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            Dropdown
                        </a>
                        <ul class="dropdown-menu">
                            <li><a class="dropdown-item" href="#">Action</a></li>
                            <li><a class="dropdown-item" href="#">Another action</a></li>
                            <li>
                                <hr class="dropdown-divider">
                            </li>
                            <li><a class="dropdown-item" href="#">Something else here</a></li>
                        </ul>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link disabled">Disabled</a>
                    </li>
                </ul>
                <div class="d-flex">
                    <?php
                    if (isset($_SESSION['loggedin']) AND $_SESSION['loggedin']==true) {
                        echo '
                        <div class="dropdown">
                            <button class="btn btn-secondary dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                                <i class="bi bi-person-circle"></i>
                                ' . $_SESSION['user-firstname'] . ' ' . $_SESSION['user-lastname'] . '
                            </button>
                                <ul class="dropdown-menu">
                                    <li><a class="dropdown-item" href="dashboard.php">Admin</a></li>
                                    <li><a class="dropdown-item" href="#" disabled>Settings</a></li>
                                    <li>
                                    <hr class="dropdown-divider">
                                    </li>
                                    <li><a class="dropdown-item" href="logout.php">Déconnexion</a></li>
                                </ul>
                        </div>';
                    } else {
                        echo '<div class="d-flex gap-3">
                                    <a href="register-form.php" class="btn btn-secondary">S\'inscrire</a>
                                    <a href="login-form.php" class="btn btn-secondary">Se connecter</a>
                              </div>';
                    }
                    ?>

</div>
            </div>
        </div>
    </nav>