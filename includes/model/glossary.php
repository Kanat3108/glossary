<?php
	function glossary_all(){
		global $wpdb;
		$table = $wpdb->prefix.'glossary';
		$query = "SELECT * FROM $table  ORDER BY id_glossary ASC";
		return $wpdb->get_results($query, ARRAY_A);
	}

	function glossary_add($file){
		include(dirname(__FILE__).'/PHPExcel/IOFactory.php');
		$object = PHPExcel_IOFactory::load($file);
		global $wpdb;
			
		foreach($object->getWorksheetIterator() as $worksheet)
		{
			$maxCell = $worksheet->getHighestRowAndColumn();
	        $data = $worksheet->rangeToArray('A1:' . $maxCell['column'] . $maxCell['row']);
	        $data = array_map('array_filter', $data);
	        $data = array_filter($data);
	        $highestRow3 = sizeof($data);

			for($row=2; $row<=$highestRow3; $row++)
			{
				$english = $worksheet-> getCellByColumnAndRow(0, $row)->getValue();
				$arabic = $worksheet-> getCellByColumnAndRow(1, $row)->getValue();
				$czech = $worksheet-> getCellByColumnAndRow(2, $row)->getValue();
				$italian = $worksheet-> getCellByColumnAndRow(3, $row)->getValue();
				$polish = $worksheet-> getCellByColumnAndRow(4, $row)->getValue();
				$portuguese = $worksheet-> getCellByColumnAndRow(5, $row)->getValue();
				$russian = $worksheet-> getCellByColumnAndRow(6, $row)->getValue();
				$slovak = $worksheet-> getCellByColumnAndRow(7, $row)->getValue();
				$spanish = $worksheet-> getCellByColumnAndRow(8, $row)->getValue();
				$ukranian = $worksheet-> getCellByColumnAndRow(9, $row)->getValue();
				$vietnamese = $worksheet-> getCellByColumnAndRow(10, $row)->getValue();
				$t = "INSERT INTO wp_glossary (english, arabic, czech, italian, polish, portuguese, russian, slovak, spanish, ukranian, vietnamese) VALUES ('%s','%s','%s','%s','%s','%s','%s','%s','%s','%s','%s');";
				$sql = $wpdb->prepare($t, $english, $arabic, $czech, $italian, $polish, $portuguese, $russian, $slovak, $spanish, $ukranian, $vietnamese );
				$wpdb->query($sql);
			}
		}
		echo "The file has been  uploaded.";
	}



	function glossary_edit($id_glossary){
		
		global $wpdb;
		$table = $wpdb->prefix.'glossary';
		$query = "SELECT * FROM $table WHERE id_glossary='$id_glossary';";
		return $wpdb->get_results($query, ARRAY_A);

	}

	function glossary_delete(){
		global $wpdb;
		$table = $wpdb->prefix.'glossary';
        $wpdb->query("DELETE FROM $table");
        echo "File deleted";

	}

	function glossary_remove_row($id_row){
		global $wpdb;
		$table = $wpdb->prefix.'glossary';
        $wpdb->query("DELETE FROM $table WHERE id_glossary='$id_row';");
        echo "Row deleted";
	}

	function glossary_save_row($id_row, $english, $arabic, $czech, $italian, $polish, $portuguese, $russian, $slovak, $spanish, $ukranian, $vietnamese){
		global $wpdb;
		$table = $wpdb->prefix.'glossary';
		$wpdb->query("UPDATE $table SET english = '$english', arabic = '$arabic', czech = '$czech', italian = '$italian', polish = '$polish', portuguese = '$portuguese', russian = '$russian', slovak = '$slovak', spanish = '$spanish', ukranian = '$ukranian', vietnamese = '$vietnamese' WHERE id_glossary='$id_row';");
        echo "Row Updated";
	}

	function glossary_current($name_glossary){
		global $wpdb;
		$table = $wpdb->prefix.'glossary';
		$reset = reset($name_glossary);
		$query = "SELECT $reset FROM $table";
		return $wpdb->get_results($query, ARRAY_A);
	}