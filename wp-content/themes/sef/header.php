<!doctype html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="author" content="Marvin Pagnoul">
    <meta name="description" content="Le site de l'ASBL SEF Huy">
    <meta name="keywords" content="ASBL, SEF, asbl, sef, huy">
    <link rel="stylesheet" href="<?= dw_asset('css/reset.css') ?>">
    <link rel="stylesheet" href="<?= dw_asset('css/main.css') ?>">
    <script type="module" src="<?= dw_asset('js/main.js') ?>"></script>
    <title>ASBL SEF &ndash; <?= get_the_title() ?></title>
</head>
<body itemscope itemtype="https://schema.org/Organization">
<header>

    <div class="main_nav_container">

        <h1 class="hidden"><?= get_the_title() ?></h1>

        <nav class="main_nav flex_container">

            <h2 class="hidden">Navigation principale</h2>

            <a class="home_link logo_link" href="<?= home_url() ?>" title="Aller vers la page d'accueil">Aller vers la page d&rsquo;accueil</a>

            <input id="burger_menu" type="checkbox">
            <label for="burger_menu">
                <span class="line"></span>
            </label>

            <ul class="flex_container">

                <?php foreach (dw_get_navigation_links('main') as $link): ?>
                    <li class="main_nav_item">
                        <a class="main_nav_item_link normal_link" href="<?= $link->url ?>"
                           title="Aller vers la page <?= $link->label ?>"><?= $link->label ?></a>
                    </li>
                <?php endforeach; ?>

            </ul>

        </nav>

    </div>

</header>