<?php
    $text = ' ';
		$i_index_php = 0;
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
    $cents_array = array(65,66,67,68,69);

		if(isset($_POST['all'])) {
			$text = ' ';
			$i_index_php = $banh;

		}
		if(isset($_POST['banh'])) {
			$text = 'Banh';
			$i_index_php = $banh;

		}
		if(isset($_POST['snacks'])) {
			$text = 'Snack';
			$i_index_php = $snacks;

		}
		if(isset($_POST['rolls'])) {
			$text = 'Roll';
			$i_index_php = $slim;

		}
		if(isset($_POST['entree'])) {
			$text = 'Entree';
			$i_index_php = $entree;

		}
		if(isset($_POST['desserts'])) {
			$text = 'Desserts';
			$i_index_php = $dessert;

		}
		if(isset($_POST['dessert_drink'])) {
			$text = 'Dessert Drinks';
			$i_index_php = $dessert_drink;
		}
		if(isset($_POST['frozen'])) {
			$text = 'Blended';
			$i_index_php = $frozen;
		}
		if(isset($_POST['milk_tea'])) {
			$text = 'Milk';
			$i_index_php = $milk;
		}
		if(isset($_POST['fusion_tea'])) {
			$text = 'Fusion';
			$i_index_php = $fusion;
		}
		if(isset($_POST['4seasons'])) {
			$text = 'Four';
			$i_index_php = $four;
		}
		if(isset($_POST['coffee'])) {
			$text = 'Coffee';
			$i_index_php = $coffee;
		}
		if(isset($_POST['toppings'])) {
			$text = 'Topping';
			$i_index_php = $topping;
		}
  ?>