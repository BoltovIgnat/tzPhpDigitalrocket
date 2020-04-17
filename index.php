<!doctype html>
<html lang="ru">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <title>Тестовое задание</title>

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/css/bootstrap.min.css" integrity="sha384-PsH8R72JQ3SOdhVi3uxftmaW6Vc51MKb0q5P2rRUpPvrszuE4W1povHYgTpBfshb" crossorigin="anonymous">
    <link rel="stylesheet" href="/css/style.css">
</head>
<body>
<header class="header">
    <nav class="navbar navbar-expand-md navbar-dark fixed-top bg-dark" role="navigation">
        <a class="navbar-brand" href="#" role="banner">Тестовое задание</a>

        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarsDefault" aria-controls="navbarsDefault" aria-expanded="false" aria-label="Переключить навигацию">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarsDefault">
            <ul class="navbar-nav mr-auto">
                <li class="nav-item active">
                    <a class="nav-link" href="#">Главная <span class="sr-only">(current)</span></a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">О сайте</a>
                </li>
            </ul>

            <form class="form-inline my-2 my-lg-0" role="search">
                <input class="form-control mr-sm-2 ibc-check-input" type="text" placeholder="Проверить" aria-label="Поиск">
                <button class="btn btn-outline-success my-2 my-sm-0 ibc-check" type="submit">Проверить</button>
            </form>
        </div>
    </nav>
</header>
<?include_once ("testmysql.php");?>
<main role="main">
    <div class="container">
        <div class="row">
            <?foreach ($cars as $key => $value) {
            ?>
                <div class="ibc-cars col-md-3 col-sm-6">
                    <h2 class="ibc-title"><?=$key;?></h2>
                    <ul class="main">
                        <?foreach ($value as $keymodel => $valuemodel) {
                            ?>
                            <li><?=$keymodel;?>
                                <ul class="sup">
                                    <?
                                    foreach ($valuemodel as $keytype => $valuetype) {
                                        ?>
                                        <li><?=$keytype;?>
                                            <?
                                            if (!array_key_exists('none', $valuetype)) {
                                                ?>
                                                <ul class="sup">
                                                    <?
                                                    foreach ($valuetype as $keymod => $valuemod) {
                                                        ?>
                                                    <li><?=$keymod;?>
                                                    </li>
                                                    <?}?>
                                                </ul>
                                            <?}?>
                                        </li>
                                    <?}?>
                                </ul>
                            </li>
                            <?
                        }
                        ?>
                    </ul>

                </div>
                <?
            }
            ?>
        </div>

    </div>
</main>
<footer role="contentinfo" class="footer">
    <div class="container">
    </div>
</footer>
</body>

<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.3/umd/popper.min.js" integrity="sha384-vFJXuSJphROIrBnz7yo7oB41mKfc8JzQZiCq4NCceLEaO4IHwicKwpJf9c9IpFgh" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/js/bootstrap.min.js" integrity="sha384-alpBpkh1PFOepccYVYDB4do5UnbKysX5WZXm3XxPqe5iKTfUKjNkCk9SaVuEZflJ" crossorigin="anonymous"></script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/hammer.js/2.0.8/hammer.js"></script>
<script src="/js/script.js" ></script>
</html>