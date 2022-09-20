<!DOCTYPE html>
<html lang="" class="">
<head>
    <title><?= $this->title ?></title>
    <?php
    $this->addCss('/web/bootstrap/bootstrap.min.css', 1);
    $this->addCss('/web/css/mvc/main.css', 2);
    $this->getCss();
    ?>
</head>
<body>
<header>
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <a class="navbar-brand" href="#">Navbar</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
                aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav mr-auto">
                <li class="nav-item active">
                    <a class="nav-link" href="#">Home <span class="sr-only">(current)</span></a>
                </li>

                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button"
                       data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        Joomla
                    </a>
                    <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                        <a class="dropdown-item" href="/joomla/18">Использование параметров в модуле</a>
                        <a class="dropdown-item" href="/joomla/19">Наложение стилей в модулях</a>
                        <a class="dropdown-item" href="/joomla/20">Используем базу данных в модуле</a>
                    </div>
                </li>

                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button"
                       data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        Jquery
                    </a>
                    <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                        <a class="dropdown-item" href="/jquery/21">jQuery для начинающих</a>
                    </div>
                </li>

                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button"
                       data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        php
                    </a>
                    <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                        <a class="dropdown-item" href="/php/61">Простая mvc система на php 5</a>
                    </div>
                </li>
            </ul>


            <form class="form-inline my-2 my-lg-0">
                <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search">
                <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
            </form>
        </div>
    </nav>
</header>


<main role="main" class="flex-shrink-0">
    <div class="container">
        <?= $content; ?>
    </div>
</main>

<?php $this->addJs('/web/jquery/jquery-3.6.1.min.js', 1); ?>
<?php $this->addJs('/web/bootstrap/bootstrap.bundle.min.js', 2); ?>
<?= $this->getJs(); ?>
</body>
</html>