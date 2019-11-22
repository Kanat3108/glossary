<?php
	include_once 'model/glossary.php';
?>

<h3><a href="<?php $_SERVER['PHP_SELF'] ?>?page=glossary">Glossary</a></h3>
<?php
if(isset($_POST["submit"])) {
        $uploadOk = 1;
        
        // Check file size
        if ($_FILES["fileToUpload"]["size"] > 500000) {
            echo "Sorry, your file is too large.";
            $uploadOk = 0;
        }
        
        // Check if $uploadOk is set to 0 by an error
        if ($uploadOk == 0) {
            echo "Sorry, your file was not uploaded.";
            // if everything is ok, try to upload file
        } 
        else 
        {
       		glossary_add($_FILES["fileToUpload"]["tmp_name"]);
				
        }

    } else{

    ?>

	<form action="#" method="post" enctype="multipart/form-data">
		<span>Select Glossary to upload:</span>
		<input type="file" name="fileToUpload" id="fileToUpload">
		<input type="submit" value="Upload Glossary" name="submit">
	</form>
	<?php } 
?>