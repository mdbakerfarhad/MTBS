<style>
    .navigation-header {
        width: 100%;
        z-index: 1000;
    }
</style>
<header>
    <nav class="navbar navbar-expand-lg bg-dark navigation-header">
        <div class="container-fluid">
            <a class="navbar-brand text-warning" href="index">MTBS</a>
            <button class="navbar-toggler bg-light text-light" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <?php
                    if (isset($_SESSION['logged_in']) && $_SESSION['logged_in'] == true) {
                    ?>
                        <li class="nav-item">
                            <a class="nav-link text-light" aria-current="page" href="index">Welcome&nbsp;<span class=text-warning><?php echo $_SESSION['user_fullname']; ?></span></a>
                        </li>

                    <?php
                    } else {
                    ?>
                        <li class="nav-item">
                            <a class="nav-link text-light" aria-current="page" href="index">Home</a>
                        </li>
                    <?php
                    }
                    ?>
                    <li class="nav-item">
                        <a class="nav-link text-light" href="about">About</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-light" href="pricing">Pricing</a>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle text-light" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            Movies
                        </a>
                        <ul class="dropdown-menu bg-dark">
                            <li><a class="dropdown-item text-light bg-dark" href="index#now-showing">Now Showing</a></li>
                            <li><a class="dropdown-item text-light bg-dark" href="index#upcoming-shows">Upcoming</a></li>
                        </ul>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-light" href="cineplex">Cineplex</a>
                    </li>
                    <?php
                    if (isset($_SESSION['logged_in']) && $_SESSION['logged_in'] == true) {
                    ?>
                        <li class="nav-item">
                            <a class="nav-link text-light" href="account?email=<?php
                                                                                    echo $_SESSION['user_email'];
                                                                                    ?>&id=<?php echo $_SESSION['user_id']; ?>">My Account</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link text-light" href="cart">Cart</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link text-light" href="logout">Logout</a>
                        </li>
                    <?php
                    } else {
                    ?>
                        <li class="nav-item">
                            <a class="nav-link text-light" href="login">Login</a>
                        </li>
                    <?php
                    }
                    ?>
                </ul>
                <form class="d-flex flex-column search-page" role="search" action="search_result" method="GET" autocomplete="off">
                    <div class="d-flex">
                        <input type="text" id="search" name="search" required value="<?php if (isset($_GET['search'])) {
                                                                                echo $_GET['search'];
                                                                            } ?>" class="form-control" placeholder="Search data">
                        <button class="btn btn-outline-warning text-light" type="submit">Search</button>
                    </div>
                    <div class="bg-light" id="display"></div>
                </form>
            </div>
        </div>
    </nav>
</header>

<script>
    const navigationBar = document.querySelector(".navigation-header");
    // windows scroll function 
    window.onscroll = () => {
        if (document.body.scrollTop > 100 || document.documentElement.scrollTop > 100) {
            navigationBar.style.position = "fixed";
        } else {
            navigationBar.style.position = "relative";
        }
    };
</script>