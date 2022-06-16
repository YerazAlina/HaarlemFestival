<nav class="navbar navbar-expand-lg navbar-light bg-light" style="height:100px;">
    <div class="container">
        <a class="navbar-brand me-2">
            <h3>Haarlem Festival</h3>
        </a>
        <button class="navbar-toggler" type="button" data-mdb-toggle="collapse" data-mdb-target="#navbarButtonsExample" aria-controls="navbarButtonsExample" aria-expanded="false" aria-label="Toggle navigation">
            <i class="fas fa-bars"></i>
        </button>

        <?php if (isset($_SESSION['logged_in'])  && $_SESSION['logged_in'] === true) : ?>
            <div class="collapse navbar-collapse" id="navbarButtonsExample">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a class="nav-link" href="home">Home CMS</a>
                    </li>
                </ul>
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a class="nav-link" href="manageUsers">Manage Users</a>
                    </li>
                </ul>
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a class="nav-link" href="locationcms">Manage Locations</a>
                    </li>
                </ul>
            </div> 
        <?php endif; ?>
    </div>


    <?php if (isset($_SESSION['logged_in'])  && $_SESSION['logged_in'] === true) : ?>
        <div class="d-flex align-items-center">
            <a href="profile">
                <button type="button" class="btn-link btn me-2"> Welcome, 
                <?php echo $_SESSION['email'] ?>
                </button>
            </a>
            <a href="logoutUser">
                <button type="button" class="btn btn-dark me-3">
                    logout
                </button>
            </a>
        </div>

    <?php else : ?>

        <div class="d-flex align-items-center">
            <a href="login">
                <button type="button" class="btn btn-link px-3 me-2">
                    Login
                </button>
            </a>
            <a href="register">
                <button type="button" class="btn btn-primary me-3">
                    Sign up
                </button>
            </a>
        </div>

    <?php endif; ?>
</nav>