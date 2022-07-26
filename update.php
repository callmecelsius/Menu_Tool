<?php
	if(ISSET($_POST['edit'])){
		$members = simplexml_load_file('Pandan_Edits.xml');
		foreach($members->item as $member){
			if($member->idNum == $_POST['id']){
				$member->Name = $_POST['firstname'];
				$member->Price_1 = $_POST['lastname'];
				$member->Price_2 = $_POST['address'];
				break;
			}
		}
		file_put_contents('Pandan_Edits.xml', $members->asXML());
		header("location: index.php");
	}
?>