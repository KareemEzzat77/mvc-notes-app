<?php

use Main\core\Session; ?>

<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <div class="container">

        <!-- Brand -->
        <a class="navbar-brand fw-bold" href="<?= BASE_URL ?>">
            Notes
        </a>

        <!-- Mobile toggle -->
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarContent">
            <span class="navbar-toggler-icon"></span>
        </button>

        <!-- Links -->
        <div class="collapse navbar-collapse" id="navbarContent">
            <ul class="navbar-nav ms-auto align-items-center">

                <?php if (Session::has('user_id')): ?>
                    <li class="nav-item">
                        <form method="POST" action="<?= BASE_URL ?>auth/logout">
                            <button class="btn btn-outline-light btn-sm">
                                Logout
                            </button>
                        </form>
                    </li>
                <?php else: ?>
                    <li class="nav-item me-2">
                        <a class="btn btn-outline-light btn-sm" href="<?= BASE_URL ?>auth/login">
                            Login
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="btn btn-warning btn-sm" href="<?= BASE_URL ?>auth/register">
                            Register
                        </a>
                    </li>
                <?php endif; ?>

            </ul>
        </div>

    </div>
</nav>