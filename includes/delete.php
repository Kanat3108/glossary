<?php
	include 'model/glossary.php';
?>

<h3><a href="<?php $_SERVER['PHP_SELF'] ?>?page=glossary">Glossary</a></h3>
<?php
	if(isset($_POST["submit"])) {
		glossary_delete();
	} else{
?>
<h1>Are you sure?</h1>
<form action="#" method="post">
	<input type="submit" name="submit" value="Yes, delete">
</form>
<?php } ?>