<?php
      	$text = ' ';
		$i = 0;
		$banh = 0;
		$snacks = 7;
		$slim = 19;
		$entree = 23;
		$dessert = 26;
		$dessert_drink = 30;
		$frozen = 36;
		$fusion = 45;
		$milk = 47;
		$four = 52;
		$coffee = 61;
		$topping = 64;
        $readOnlyArray = array(37,36,45,46,47,64,68);

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