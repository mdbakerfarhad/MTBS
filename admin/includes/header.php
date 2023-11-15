<style>
    .navigation-header {
        width: 100%;
        z-index: 1000;
    }
</style>
<header>
    <nav class="navbar navbar-expand-lg bg-dark navigation-header">
        <div class="container-fluid">
            <?php
            if (isset($_SESSION['admin_logged_in']) && $_SESSION['admin_logged_in'] == true) {
            ?>
                <a class="navbar-brand text-warning" href="admin_dashboard?email=<?php
                                                                                    echo $_SESSION['email'];
                                                                                    ?>&id=<?php echo $_SESSION['id']; ?>">MTBS</a>
            <?php
            } else {
            ?>
                <a class="navbar-brand text-warning" href="../index">MTBS</a>
            <?php
            }
            ?>
            <button class="navbar-toggler bg-light text-light" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <?php
                    if (isset($_SESSION['admin_logged_in']) && $_SESSION['admin_logged_in'] == true) {
                    ?>
                        <li class="nav-item">
                            <a class="nav-link text-light" aria-current="page" href="admin_dashboard?email=<?php
                                                                                                            echo $_SESSION['email'];
                                                                                                            ?>&id=<?php echo $_SESSION['id']; ?>">Welcome&nbsp;<span class=text-warning><?php echo $_SESSION['email']; ?></span></a>
                        </li>
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle text-light" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                Movie Details
                            </a>
                            <ul class="dropdown-menu bg-dark">
                                <li> <a class="dropdown-item text-light bg-dark" href="movie_info">Movie Info</a></li>
                                <li> <a class="dropdown-item text-light bg-dark" href="movie_info_add">Add Movie Info</a></li>
                            </ul>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link text-light" aria-current="page" href="cineplex_info">Cineplex</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link text-light" aria-current="page" href="user_info">User</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link text-light" aria-current="page" href="review_info">Review</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link text-light" aria-current="page" href="order_info">Ticket Purchase</a>
                        </li>
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle text-light" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                Account Info
                            </a>
                            <ul class="dropdown-menu bg-dark">
                                <li> <a class="dropdown-item text-light bg-dark" href="admin_dashboard?email=<?php
                                                                                                                echo $_SESSION['email'];
                                                                                                                ?>&id=<?php echo $_SESSION['id']; ?>">Change Password</a></li>
                                <li> <a class="dropdown-item text-light bg-dark" href="logout">Log out</a></li>
                            </ul>
                        </li>
                    <?php
                    }
                    ?>
                </ul>
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