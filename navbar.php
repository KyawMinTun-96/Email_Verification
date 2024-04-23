

<nav class="navbar navbar-expand-lg bgColor3">
    <div class="container">
        <a class="navbar-brand ftColor2 bs-navbar-brand" href="home.php">Home</a>

        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <i class="fas fa-bars"></i>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                <!-- <li class="nav-item bs-nav-item">
                    <a class="nav-link ftColor2 bs-nav-link" href="#">Polatic</a>
                </li>
                <li class="nav-item bs-nav-item">
                    <a class="nav-link ftColor2 bs-nav-link" href="#">IT News</a>
                </li>
                <li class="nav-item bs-nav-item">
                    <a class="nav-link ftColor2 bs-nav-link" href="#">World News</a>
                </li>
                <li class="nav-item dropdown account bs-nav-item">
                    <a class="nav-link dropdown-toggle ftColor2 bs-nav-link bs-dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">Social News</a>
                    <ul class="dropdown-menu bs-dropdown-menu" aria-labelledby="navbarDropdown">
                    <li><a class="dropdown-item" href="#">Create</a></li>
                    <li><a class="dropdown-item" href="#">View All Products</a></li>
                    <li><hr class="dropdown-divider"></li>
                    <li><a class="dropdown-item" href="#">Delete</a></li>
                    </ul>
                </li> -->
            </ul>

            <ul class="navbar-nav">
                <li class="nav-item dropdown account bs-nav-item">
                    <a class="nav-link dropdown-toggle ftColor2 bs-nav-link" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                        <?php 

                            if(checkSession("name")) {

                                echo getSession("name");

                            }
                        
                        ?>                    
                    </a>
                    <ul class="dropdown-menu bs-dropdown-menu" aria-labelledby="navbarDropdown">
                    <li><hr class="dropdown-divider"></li>
                    <li><a class="dropdown-item" href="logout.php">Logout</a></li>
                    </ul>
                </li>
            </ul>
        </div>
    </div>
</nav>

