<!doctype html>
<html lang="es">
  <head>
    <meta charset="utf-8">
    <link rel="icon" href="https://78.media.tumblr.com/676424bd3b28ffa0f72e6b341210150e/tumblr_inline_p93su7whiJ1qeytqx_540.png" type="image/png" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <?php $title ="SUPERNATURAL por Macarena Pardo"?>
    <title><?php print $title?></title>
    <!-- Bootstrap core CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/css/bootstrap.min.css" integrity="sha384-9gVQ4dYFwwWSjIDZnLEWnxCjeSWFphJiwGPXr1jddIhOegiu1FwO5qRGvFXOdJZ4" crossorigin="anonymous">
    <!-- Custom styles for this template -->
    <link href="style.css" rel="stylesheet">
  </head>
  <body>
    <header>
      <nav class="navbar navbar-expand-md navbar-light fixed-top" style="background-color: #ff9d00;">
        <div class="container">
        <a class="navbar-brand" href="index.php">SUPERNATURAL SERIES</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarCollapse">
          <ul class="navbar-nav ml-auto">
            <?php if((basename($_SERVER['PHP_SELF']))=='index.php'){?> 
            <li class="nav-item active">
            <?php } else { ?>
            <li class="nav-item">
            <?php };?>
              <a class="nav-link" href="index.php">HOME</a>
            </li>
          </ul>
        </div>
      </div>
      </nav>
    </header>