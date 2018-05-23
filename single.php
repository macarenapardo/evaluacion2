<?php include('header.php');?>
<style type="text/css"> <?php $css= file_get_contents('style.css');
echo $css; ?> </style> 
<main role="main" class="container">
<?php
$csv = array_map('str_getcsv', file('https://raw.githubusercontent.com/macarenapardo/spndata/master/spn.csv'));
      array_walk($csv, function(&$a) use ($csv) {
      $a = array_combine($csv[0], $a);
      });
      array_shift($csv);

$aqui = $_GET['url'];

?>
<h1><?php print ($csv[$aqui]['season'])?></h1>
<div class="container border-top py-3">
</div>
<br>
<div class="row">
 <div class="col-sm-12 col-md-4 pb-2 mb-6">
 <img src="
	<?php if ($csv[$aqui]['img'] == NULL){
		print ("img/gris.png");
	} else {
		print ($csv[$aqui]['img']);
	};?>"

class="img-fluid">
<br>
<br>
<h2><?php print ($csv[$aqui]['date'])?></h2>
</div>
<div class="col-sm-12 col-md-8 pb-2 mb-2">
<p><?php print ($csv[$aqui]['plot'])?></p>
<br>
<p><b>Episodes: </b><?php print ($csv[$aqui]['episodes'])?></p>
<p><b>First Aired: </b><?php print ($csv[$aqui]['aired'])?></p>
<p><b>Last Aired: </b><?php print ($csv[$aqui]['end'])?></p>
<br>

<p><a href=<?php print ($csv[$aqui]['url'])?> <i class="fas fa-file-pdf"></i> MORE ABOUT THIS SEASON</a></p>

</div>
<div class="container border-bottom py-3">
</div>
</div>
<br>

<div class="row">
    <div class="col">
               <h3>MAIN CHARACTERS</h3>
                <p>The next visualization shows in how many episodes these six characters appear through the season.</p>
               <div id="here" class="my-4"></div>
    </div>
</div>
<div class="row">
<div class="col-lg-2 col-md-4 col-xs-6 thumb">
<figure>
	<figcaption>Dean Winchester</figcaption>
	<img src="img/dean.jpg" alt="Alternativa para cuando no se vea la imagen">
		<svg width="250" height="50">
  <rect width="160" height="30" style="fill: #fff296" />
</svg>
</figure>
</div>
<div class="col-lg-2 col-md-4 col-xs-6 thumb">
<figure>
	<figcaption>Sam Winchester</figcaption>
	<img src="img/sam.jpg" alt="Alternativa para cuando no se vea la imagen">
	<svg width="250" height="50">
  <rect width="160" height="30" style="fill: #ffd800" />
</svg>
	</figure>
</div>
<div class="col-lg-2 col-md-4 col-xs-6 thumb">
<figure>
	<figcaption>Bobby Singer</figcaption>
	<img src="img/bobby.jpg" alt="Alternativa para cuando no se vea la imagen">
		<svg width="250" height="50">
  <rect width="160" height="30" style="fill: #ff9d00" />
</svg>
	</figure>
</div>
<div class="col-lg-2 col-md-4 col-xs-6 thumb">
<figure>
	<figcaption>Castiel</figcaption>
	<img src="img/castiel.jpg" alt="Alternativa para cuando no se vea la imagen">
		<svg width="250" height="50">
  <rect width="160" height="30" style="fill: #ff2600" />
</svg>
	</figure>
</div>
<div class="col-lg-2 col-md-4 col-xs-6 thumb">
<figure>
	<figcaption>Crowley</figcaption>
	<img src="img/crowley.jpg" alt="Alternativa para cuando no se vea la imagen">
		<svg width="250" height="50">
  <rect width="160" height="30" style="fill: #ff0000" />
</svg>
	</figure>
</div>
<div class="col-lg-2 col-md-4 col-xs-6 thumb">
<figure>
	<figcaption>Lucifer</figcaption>
	<img src="img/lucifer.jpg" alt="Alternativa para cuando no se vea la imagen">
		<svg width="250" height="50">
  <rect width="160" height="30" style="fill: #8c0000" />
</svg>
	</figure>
</div>
</div>

<div class="row">
   <div class="col">
    <script src="https://d3js.org/d3.v5.min.js"></script>
    <script>

    //variables globales
    var w = 1100, h = 300, f = 0.4;
    //datos

    var data = [
      {name: 'Dean Winchester', eps: '<?php print ($csv[$aqui]['dean'])?>', bg: "#fff296"},
      {name: 'Sam Winchester', eps: '<?php print ($csv[$aqui]['sam'])?>', bg: "#ffd800"},
      {name: 'Bobby Singer', eps: '<?php print ($csv[$aqui]['bobby'])?>', bg: "#ff9d00"},
      {name: 'Castiel', eps: '<?php print ($csv[$aqui]['castiel'])?>', bg: "#ff2600"},
      {name: 'Crowley', eps: '<?php print ($csv[$aqui]['crowley'])?>', bg: "#ff0000"},
      {name: 'Lucifer', eps: '<?php print ($csv[$aqui]['lucifer'])?>', bg: "#8c0000"},
    ]    
    console.log(data);
    //crea el svg dentro del elemento de identidad "here"
    var svg = d3.select("#here")
    .append("svg")
      .attr("width", w)
      .attr("height", h)
      .style("background","#141414");
    //selecciona el grupo
    var g = svg.selectAll("g")
      .data(data)
      .enter()
      .append("g")  
    //dentro del grupo, crea círculos para la data
    g.append("circle")
      .attr("cx", function(d, i) { return (i+1) * w/(data.length+1); })
      .attr("cy", function(d) { return h/2; })
      .attr("r", function(d) { return d.eps/f; })
      .attr("fill",function(d) { return d.bg; })
    //dentro del mismo grupo, agregar texto para la data
    g.append("text")
      .attr("x", function(d, i) { return (i+1) * w/(data.length+1); })
      .attr("y", function(d, i) { return (h/1.75)+d.eps/f; })
      .attr("fill","white")
      .attr("font-family","Open Sans Condensed")
      .attr('text-anchor','middle')
      .text(function(d) { return d.name; })
      .style("font-size","14px")
    //dentro del mismo grupo, agrega otro texto para la data
    g.append("text")
      .attr("x", function(d, i) { return (i+1) * w/(data.length+1); })
      .attr("y", function(d, i) { return (h/1.6)+d.eps/f; })
      .attr("fill","#ff9d00")
      .attr("font-family","Marcellus SC")
      .attr('text-anchor','middle')      
      .text(function(d) { return "("+d.eps+")"; })
      .style("font-size","15px")
    </script>
</div>
</div>

</main>
<p style="text-align:center;"><a href="index.php">GO BACK</a></p>
<?php include('footer.php');?>