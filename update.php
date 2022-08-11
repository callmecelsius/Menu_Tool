<?php
	if(ISSET($_POST['edit'])){
		$members = simplexml_load_file('MenuEdits.xml');
		foreach($members->item as $member){
			if($member->idNum == $_POST['id']){
				$member->Name = $_POST['name'];
				$member->Price_1 = $_POST['price1'];
				$member->Price_2 = $_POST['price2'];
				break;
			}
		}
		file_put_contents('MenuEdits.xml', $members->asXML());
		header("location: index.php");
	}
?>