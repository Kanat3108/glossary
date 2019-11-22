<?php
	include_once 'model/glossary.php';
?>

<h3><a href="<?php $_SERVER['PHP_SELF'] ?>?page=glossary">Glossary</a></h3>
<?php
	$row = glossary_edit($_GET['id']);

	if(isset($_POST["delete"]))
	{
		glossary_remove_row($_GET['id']);
	}
	elseif(isset($_POST["save"]))
	{
		glossary_save_row($_GET['id'], $_POST['english'], $_POST['arabic'], $_POST['czech'], $_POST['italian'], $_POST['polish'], $_POST['portuguese'], $_POST['russian'], $_POST['slovak'], $_POST['spanish'], $_POST['ukranian'], $_POST['vietnamese'] );
	}
	else
	{
	?>
	

<form method="post" action="#">
	
<?php foreach ((array) $row as $glos) : ?>
	<div>

					<span>English</span>
					
					<input type="text" size="150" name="english"  value="<?=$glos['english'] ?>"/>
				</div>
				<div>
					<span>Arabic</span>
					<input type="text"  size="150" name="arabic" value="<?=$glos['arabic'] ?>" />
				</div>
				<div>
					<span>Czech</span>
					<input type="text" size="150" name="czech" value="<?=$glos['czech'] ?>" />
				</div>
				<div>
					<span>Italian</span>
					<input type="text" size="150" name="italian"  value="<?=$glos['italian'] ?>" />
				</div>
				<div>
					<span>Polish</span>
					<input type="text" size="150" name="polish" value="<?=$glos['polish'] ?>" />
				</div>
				<div>
					<span>Portuguese</span>
					<input type="text" size="150" name="portuguese"  value="<?=$glos['portuguese'] ?>" />
				</div>
				<div>
					<span>Russian</span>
					<input type="text" size="150" name="russian"  value="<?=$glos['russian'] ?>" />
				</div>
				<div>
					<span>Slovak</span>
					<input type="text" size="150" name="slovak" value="<?=$glos['slovak'] ?>" />
				</div>
				<div>
					<span>Spanish</span>
					<input type="text" size="150" name="spanish"  value="<?=$glos['spanish'] ?>" />
				</div>
				<div>
					<span>Ukranian</span>
					<input type="text" size="150" name="ukranian"  value="<?=$glos['ukranian'] ?>" />
				</div>
				<div>
					<span>Vietnamese</span>
					<input type="text" size="150" name="vietnamese"  value="<?=$glos['vietnamese'] ?>" />
				</div>
				<input type="submit" name="save" value="Save">
				<input type="submit" name="delete" value="Delete">
				<?php endforeach;?>
</form>
	<?php
	}
	?>



