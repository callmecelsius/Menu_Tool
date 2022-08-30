<?php
    $text = ' ';
		$i = 0;
		$banh = 0;
		$snacks = 7;
		$slim = 19;
		$entree = 23;
		$dessert = 27;
		$dessert_drink = 31;
		$frozen = 37;
		$fusion = 46;
		$milk = 48;
		$four = 53;
		$coffee = 62;
		$topping = 65;
    $readOnlyArray = array(38,37,46,47,48,65,69);

		if(isset($_POST['all'])) {
			$text = ' ';
			$i = $banh;

		}
		if(isset($_POST['banh'])) {
			$text = 'Banh';
			$i = $banh;

		}
		if(isset($_POST['snacks'])) {
			$text = 'Snack';
			$i = $snacks;

		}
		if(isset($_POST['rolls'])) {
			$text = 'Roll';
			$i = $slim;

		}
		if(isset($_POST['entree'])) {
			$text = 'Entree';
			$i = $entree;

		}
		if(isset($_POST['desserts'])) {
			$text = 'Desserts';
			$i = $dessert;

		}
		if(isset($_POST['dessert_drink'])) {
			$text = 'Dessert Drinks';
			$i = $dessert_drink;
		}
		if(isset($_POST['frozen'])) {
			$text = 'Blended';
			$i = $frozen;
		}
		if(isset($_POST['milk_tea'])) {
			$text = 'Milk';
			$i = $milk;
		}
		if(isset($_POST['fusion_tea'])) {
			$text = 'Fusion';
			$i = $fusion;
		}
		if(isset($_POST['4seasons'])) {
			$text = 'Four';
			$i = $four;
		}
		if(isset($_POST['coffee'])) {
			$text = 'Coffee';
			$i = $coffee;
		}
		if(isset($_POST['toppings'])) {
			$text = 'Topping';
			$i = $topping;
		}
  ?>