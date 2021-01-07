<?php session_start();?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Picerija</title>
    <!-- CSS only -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">
        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.1/css/all.css" integrity="sha384-vp86vTRFVJgpjF9jiIGPEEqYqlDwgyBgEF109VFjmqGmIY/Y4HV4d3Gp2irVfcrp" crossorigin="anonymous">
</head>

<body>
	<div class="container">



<nav class="navbar navbar-expand-lg navbar-light">
  <a class="navbar-brand" href="narocila.php">Picerija po domač</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse" id="navbarNav">
    <ul class="navbar-nav" style="margin-left: auto">
		<?php if (isset($_SESSION['id'])) {?>
      <li class="nav-item active">
        <a class="nav-link" href="narocila.php">Naročila</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="naroci.php">Novo naročilo</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="odjava.php">Odjava</a>
      </li>
        	<?php } else {?>

      <li class="nav-item">
        <a class="nav-link" href="login.php">Prijava</a>
      </li>
            <li class="nav-item">
        <a class="nav-link" href="registracija.php">Registracija</a>
      </li>
        <?php }?>
    </ul>
  </div>
</nav>
		</div>

    
