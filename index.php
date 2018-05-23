<?php include('header.php');?>
<style type="text/css"> <?php $css= file_get_contents('style.css');
echo $css; ?> </style> 

<?php
$csv = array_map('str_getcsv', file('https://raw.githubusercontent.com/macarenapardo/spndata/master/spn.csv'));
      array_walk($csv, function(&$a) use ($csv) {
      $a = array_combine($csv[0], $a);
      });
      array_shift($csv);
?>

<main role="main" class="container">
<h1 class="mb-4">A SUPERNATURAL GUIDE OF ALL SEASONS</h1>
<div class="row">

<div class="col-12">
    <p class="lead-3"><b>Supernatural</b> is a haunting series that follows the thrilling yet terrifying journeys of Sam and Dean Winchester, two brothers who face an increasingly sinister landscape as they hunt monsters. After losing their mother to a supernatural force, the brothers were raised by their father as soldiers who track mysterious and demonic creatures. Violent memories and relationship-threatening secrets add additional burdens on Sam and Dean as they investigate all things that go bump in the night. As old tricks and tools are rendered useless and friends betray them, the brothers must rely on each other as they encounter new enemies. <br>
    <a href="https://www.rottentomatoes.com/tv/supernatural">SEE SUPERNATURAL'S RATING IN ROTTEN TOMATOES</a></p>
</div>

<?php for($t = 0; $t < count($csv); $t++){?>
    <div class="col-sm-4 col-md-3 py-3">
    <h2 class="border-top pt-3"><?php print($csv[$t]['date'])?></h2>
    <a href="single.php?url=<?php print $t?>">    
    <figure style="height:330px; overflow:hidden;">
    <img src="
    <?php if ($csv[$t]['img'] == NULL){
        print ("img/gris.png");
    } else {
        print ($csv[$t]['img']);
    };?>" 

    class="img-fluid">
    </figure>
    
    <h4><?php print($csv[$t]['season'])?></h4>
    </a>
    <p><b>Recap: </b><?php print($csv[$t]['short'])?></p>

    </div>
<?php };?>
</div>

</main>
<?php include('footer.php');?>