<?php 
include_once('model/glossary.php');
include_once( ABSPATH . WPINC . '/feed.php' );
$glossary = glossary_current($name_glossary);
//var_dump($glossary);
?>

<div id="pineal-glossary">
	<div class="pg-letter"></div>
	<div class="pg-content">
	<?php 
	$count = 0;
	
	foreach ($glossary as $key => $gloss) {
		foreach ($gloss as $key => $glos) {
			echo '<div class="' . (++$count%2 ? "odd" : "even") . '">' . $glos . '</div>';
		}
	}

	//var_dump($glossary);
	?>
	</div>
</div>