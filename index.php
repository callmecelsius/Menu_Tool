<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="utf-8" name="viewport" content="width=device-width, initial-scale=1"/>
		<link rel="stylesheet" type="text/css" href="css/bootstrap.css">
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
	<style>
		td{white-space: pre-line;}
	</style>
	</head>
<body>
	<div class="col-md-3"></div>
	<div class="col-md-6 well">
		<h3 class="text-primary">Pandan Leaf Full Menu</h3>
		<hr style="border-top:1px dotted #ccc;"/>

		<table class="table table-bordered table-striped" style="margin-top:20px;">
		<form method="post">

		<input type="submit" name="all" value="All"/>

        <input type="submit" name="banh" value="Banh Mi"/>
          
        <input type="submit" name="snacks" value="Snacks"/>

        <input type="submit" name="rolls" value="Slim Rolls"/>
          
        <input type="submit" name="entree" value="Entrees"/>

        <input type="submit" name="desserts" value="Desserts"/>
          
        <input type="submit" name="dessert_drink" value="Dessert Drinks"/>

        <input type="submit" name="frozen" value="Blended Ice"/>
          
        <input type="submit" name="milk_tea" value="Milk Tea"/>

		<input type="submit" name="4seasons" value="4 Seasons Tea"/>

		<input type="submit" name="coffee" value="Coffee"/>

		<input type="submit" name="toppings" value="Toppings"/>
				
    	</form>
                <thead class="alert-info">
					<th>Category</th>
                    <th>Name</th>
                    <th>Current Price 1</th>
					<th>New Price 1</th>
                    <th>Current Price 2</th>
                    <th>New Price 2</th>
                    <th>Action</th>
                </thead>
                <tbody>
                    <?php

                    $file = simplexml_load_file('Pandan_Edits.xml');
					$file2 = simplexml_load_file('Pandan_Current.xml');
                    foreach($file->item as $row){
						if (strpos($row->Category, $text) !== false){
						?>
                        <tr>
							<td><?php echo $row->Category; ?></td>
                            <td><?php echo $row->Name; ?></td>
							<td bgcolor= #B5E8C4><?php echo $file2->item[$i]->Price_1; ?></td>
                            <td><?php echo $row->Price_1; ?></td>
                            <td bgcolor= #B5E8C4><?php echo $file2->item[$i]->Price_2; ?></td>
                            <td><?php echo $row->Price_2; ?></td>
                            <td><a href="#edit_<?php echo $row->idNum; ?>" data-toggle="modal" class="btn btn-warning"><span class="glyphicon glyphicon-edit"></span> Edit</a></td>
						
                            <div class="modal fade" id="edit_<?php echo $row->idNum; ?>" aria-hidden="true">
								<div class="modal-dialog">
									<div class="modal-content">
										<form method="POST" action="update.php">
											<div class="modal-header">
												<center><h4 class="modal-title" id="myModalLabel">Edit Member</h4></center>
											</div>
											<div class="modal-body">
												<div class="col-md-2"></div>
												<div class="col-md-8">
													<div class="form-group">
														<label >Num</label>
														<input type="text" class="form-control" name="id" value="<?php echo $row->idNum; ?>" readonly="readonly" />
													</div>
													<div class="form-group">
														<label >Name</label>
														<input type="text" class="form-control" name="firstname" value="<?php echo $row->Name; ?>" <?php if ($row->idNum == 37||36||45||46||47||64||68){  ?> readonly="readonly" <?php } ?>   >
													</div>
													<div class="form-group">
														<label >Current Price</label>
														<input type="text" class="form-control" name="address" value="<?php echo $file2->item[$i]->Price_1; ?>" readonly="readonly" />
													</div>
													<div class="form-group">
														<label>Price 1</label>
														<input type="text" class="form-control" name="lastname" value="<?php echo $row->Price_1; ?>">
													</div>
													<div class="form-group">
														<label>Price 2</label>
														<input type="text" class="form-control" name="address" value="<?php echo $row->Price_2; ?>">
													</div>
												</div>
											</div>
											<br style="clear:both;"/>
											<div class="modal-footer">
												<button type="button" class="btn btn-danger" data-dismiss="modal"><span class="glyphicon glyphicon-remove"></span> Close</button>
												<button name="edit" class="btn btn-warning"><span class="glyphicon glyphicon-save"></span> Update</a>
											</div>
										</form>
									</div>
								</div>
							</div>
                        </tr>
                        <?php
						$i++;
				}}
			
                    ?>
                </tbody>
            </table>
			<br><br>
	</div>
<script src="js/jquery-3.2.1.min.js"></script>
<script src="js/bootstrap.min.js"></script>
</body>
</html>