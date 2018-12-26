<!DOCTYPE HTML> 
<html>
<head>
<script src="//ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
<script>
/*this will show/hide panels*/
$(document).ready(function () {
  $('#nav > li > a').click(function(){
    if ($(this).attr('class') != 'active'){
      $('#nav li ul').slideUp();
      $(this).next().slideToggle();
      $('#nav li a').removeClass('active');
      $(this).addClass('active');
    }
  });
});
</script>
<style>
#nav {
    float: left;
    max-width: 100%;
    border-top: 1px solid #999;
    border-right: 1px solid #999;
    border-left: 1px solid #999;
}
#nav li a {
    display: block;
    padding: 10px 15px;
    background: #ccc;
    border-top: 1px solid #eee;
    border-bottom: 1px solid #999;
    text-decoration: none;
    color: #000;
}
#nav li a:hover, #nav li a.active {
    background: #999;
    color: #fff;
}
#nav li ul {
    display: none; // used to hide sub-menus
}
#nav li ul li a {
    padding: 10px 5px;
    background: #ececec;
    border-bottom: 1px dotted #ccc;
}
#nav{
	list-style-type: none;
	padding-left: 0;}
</style>
</head>
<body> 

<?php
// define variables and set to empty values
$videotitle = $ytvidurl = $targeturl = $calltoacttype =$autoplay  = $showytcontrols = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
	$videotitle = test_input($_POST["videotitle"]);
}

function test_input($data) {
   $data = trim($data);
   $data = stripslashes($data);
   $data = htmlspecialchars($data);
   return $data;
}
?>

<ul id="nav">
  <li><a href="#1">Put www. site version for each site</a>
 <ul>
<form method="post" action="#"> 
   <br>
  <h2>Enter links:</h2> <textarea name="inputlinks" cols="70" rows="10"><?php echo $comment;?></textarea>
     <br><br>

   <input type="submit" name="submit" value="Submit"> 
</form>
<h2>Copy the links below and paste it majestic bulk checker</h2>
<textarea class='majesticlinksoutput' name="body" cols="70" rows="10" align="left">
<?php
$inputlinks  = $_POST["inputlinks"];
$pieces = explode("\n", $inputlinks);
$totallistitems = count($pieces);
$i=0; $j=0;
while ($i!=$totallistitems)
{echo "http://".$pieces[$i];
echo "http://www.".$pieces[$j];
$i++; $j++;}
?>

<?php /*echo $_POST["inputlinks"];*/?>

</textarea>
<p></p>
<?php echo (count($pieces)*2); echo " total site variations"?>

</ul>
   </li>

  <li><a href="#2">Sort siteurls to put www. version under non-www. version</a>
<ul>
 <form method="post" action="#"> 
   <br>
  <h2>Enter links:</h2> <textarea name="inputlinks" cols="70" rows="10"><?php echo $comment;?></textarea>
     <br><br>

   <input type="submit" name="submit" value="Submit"> 
</form>
<h2>Copy the links below and paste it in the spreadsheet</h2>
<textarea class='majesticlinksoutput' name="body" cols="70" rows="10" align="left">
<?php
$inputlinks  = $_POST["inputlinks"];
$pieces = explode("\n", $inputlinks);
/*
function handleArticles($str) {
    list($first,$rest) = explode(" ",$str." ",2);
       // the extra space is to prevent "undefined offset" notices
       // on single-word titles
    $validarticles = array("www.");
    if( in_array(strtolower($first),$validarticles)) return $rest.", ".$first;
    return $str;
}
usort($books,function($a,$b) {
    return strnatcasecmp(handleArticles($a),handleArticles($b));
});
handleArticles($inputlinks);*/




usort($pieces, function($a, $b) {
    $a = preg_replace('@www.@', '', $a);
    $b = preg_replace('@www.@', '', $b);

    return strnatcmp($a, $b);
});

$totallistitems = count($pieces);
$i=0; $j=0;
while ($i!=$totallistitems)
{echo $pieces[$i];
//echo "www.".$pieces[$j];
$i++; $j++;}





/*
$pieces = explode("\n", $inputlinks);
sort($pieces);
$totallistitems = count($pieces);
$i=0; $j=0;
while ($i!=$totallistitems)
{echo $pieces[$i];
//echo "www.".$pieces[$j];
$i++; $j++;}*/
?>



</textarea>
<p></p>
<?php echo count($pieces); echo " total sites"?>

</ul>
  </li>
   <li><a href="#3">Filter dead domains from xenu</a>
<ul>
   <form method="post" action="#"> 
   <br>
  <h2>Enter links to filter:</h2> <textarea name="inputlinks" cols="70" rows="10"><?php echo $comment;?></textarea>
     <br><br>
 
   <input type="submit" name="submit" value="Submit"> 
</form>
<h2>Copy the filtered list below</h2>
<textarea class='majesticlinksoutput' name="body" cols="70" rows="10" align="left">
<?php
$inputlinks  = $_POST["inputlinks"];
$pieces = explode("\n", $inputlinks);




usort($pieces, function($a, $b) {
    $a = preg_replace('@www.@', '', $a);
    $b = preg_replace('@www.@', '', $b);

    return strnatcmp($a, $b);
});

//$totallistitems = count($pieces);
/*$i=0; $j=0;
while ($i!=$totallistitems)
{echo $pieces[$i];
//echo "www.".$pieces[$j];
$i++; $j++;}*/

////////////////////////////////////////////////////////////////////////////////////////////////

$word = 'ok';

for ($i=0;$i<count($pieces);++$i)
{
    if (stripos($pieces[$i],$word)!==false)
    {
        array_splice($pieces,$i,1);
        $i--;
    }
}
$totallistitems = count($pieces);
$j=3;
while ($j<$totallistitems)
{$pieces[$j] = substr($pieces[$j], 0, strpos($pieces[$j], "\t"));

echo $pieces[$j];

echo"\n";
//echo "www.".$pieces[$j];
$j++;}
//print_r($pieces);

///////////////////////////////////////////////////////////////////////////////////////////////

?>
</textarea>
<p></p>
<?php echo count($pieces); echo " total sites"?>
</ul>
   </li>
</ul>


</body>
</html>