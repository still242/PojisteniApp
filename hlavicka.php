<!DOCTYPE html>
<html lang="en">
<head>
    <title><?= $titulek ?></title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">

    <link rel="stylesheet" href="styl.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.3/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
</head>
<body>

<nav class="navbar navbar-inverse">
    <div class="container-fluid">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="#">PojisteniApp</a>
        </div>
        <div class="collapse navbar-collapse" id="myNavbar">
            <ul class="nav navbar-nav">
                <li><a href="index.php">Domů</a></li>
                <li><a href="projekt.php">O projektu</a></li>
                <li><a href="pojistenci_vypis.php">Pojištěnci</a></li>
                <li><a href="pojisteni_vypis.php">Pojištění</a></li>
            </ul>
            <ul class="nav navbar-nav navbar-right">
            <?php
            if(isset($_SESSION["uzivatelske_jmeno"]))
            {?>
            <li><a href="profil.php"><?php echo $_SESSION["uzivatelske_jmeno"]; ?></a></li>
            <li><a href="logout.php">Log Out</a></li>
            <?php
            }
            else
            {
            ?>
                <li><a href="registrace.php">Registrace</a></li>
                <li><a href="prihlaseni.php"><span class="glyphicon glyphicon-log-in"></span> Login</a></li>
            <?php
            }
            ?>
            </ul>
        </div>
    </div>
</nav>

<div class="container-fluid text-center">
    <div class="row content">
        <div class="col-sm-2">
        </div>
        <div class="col-sm-8 text-left">