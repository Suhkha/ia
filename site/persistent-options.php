<meta charset="utf-8">
<?php
function styles($path) {

    $styles = <<< AAA
    <link rel="stylesheet" href="{$path}styles/normalize.css">
    <link rel="stylesheet" href="{$path}styles/bootstrap.min.css">
    <link rel="stylesheet" href="{$path}styles/bootstrap-fileupload.min.css">
    <link rel="stylesheet" href="{$path}styles/main.css">
    <link rel="stylesheet" href="http://code.jquery.com/ui/1.10.3/themes/smoothness/jquery-ui.css">
AAA;

    echo $styles . "\n";
}

if(!isset($status) OR $status != 1 OR $status == "") {
function menu($path) {

    $menu = <<< AAA
    <header class="container">
        <nav class="navbar navbar-default">
          <div class="container-fluid">
            <div class="navbar-header">
              <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
              </button>
              <a class="navbar-brand" href="#">IA Interactive</a>
            </div>

            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
              <ul class="nav navbar-nav">
                <li><a href="{$path}index.php">Ingresar</a></li>
                <li><a href="{$path}users/register.php">Registrarse</a></li>
              </ul>
            </div>
          </div>
        </nav>
    </header>
AAA;

    echo $menu . "\n";
}
}

if($status == 1){
    function menu_in($path) {

    $menu = <<< AAA
    <header class="container">
        <nav class="navbar navbar-default">
          <div class="container-fluid">
            <div class="navbar-header">
              <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
              </button>
              <a class="navbar-brand" href="#">IA Interactive</a>
            </div>

            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
              <ul class="nav navbar-nav ">
                <li><a href="{$path}users/">Inicio</a></li>
                <li><a href="{$path}logout.php">Salir</a></li>
              </ul>
            </div>
          </div>
        </nav>
    </header>
AAA;
echo $menu . "\n";
}
}
function script($path) {

    $script = <<< AAA
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
    <script>window.jQuery || document.write('<script src="{$path}scripts/vendor/jquery-1.11.3.min.js"><\/script>')</script>
    <script src="{$path}scripts/bootstrap.min.js"></script>
    <script src="http://code.jquery.com/ui/1.10.3/jquery-ui.js"></script>
    <script src="{$path}scripts/plugins.js"></script>
    <script src="http://jqueryvalidation.org/files/dist/additional-methods.min.js"></script>
    <script type="text/javascript" src="{$path}scripts/bootstrap-fileupload.min.js"></script>
    <script src="{$path}scripts/main.js"></script>
AAA;

    echo $script . "\n";
}
?>