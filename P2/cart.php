<?php
/**
 * Created by PhpStorm.
 * User: njbartel
 * Date: 12/6/2018
 * Time: 6:43 PM
 * displays all items in a users cart and facilitates the actual ordering of the items (hopefully)
 */

	if (isset($_POST['cart'])){	
		if ($_POST['cart'] == 'remove'){
			$query = $pdo->prepare("DELETE FROM Cart WHERE cartID = :cid;");
			$key = array(":cid" => $_POST['item']);
			$query->execute($key);
		}
		elseif ($_POST['cart'] == 'orderAll'){
			try{
				// Get all the cart items and store them in a variable
				$query = $pdo->prepare("SELECT cid, pid FROM Cart WHERE cid = :cid");
				$key = array(":cid" => $_SESSION['cid']);
				$query->execute($key);
				$items = $query->fetchAll();
				// move the cart items into the orders table
				foreach ($items as $item){
					$query = $pdo->prepare("INSERT INTO Orders values(NULL, " . $item['cid'] . ", " . $item['pid'] . " , :date, NULL);");
					$key = array(':date' => date("Y/M/D"));
					$query->execute($key);
				}
				
				// remove the cart items that were moved
				$query = $pdo->prepare("DELETE FROM Cart WHERE cid = :cid");
				$key = array(':cid' => $_SESSION['cid']);
				$query->execute($key);
				echo "<h1> Order Successful! </h1>";
				echo "<h3> We'll get those out to you as soon as we can!</h3>";
			}
			catch (exception $e){
				echo "<h1>UNEXPECTED FAILURE PLEASE TELL SOMEONE HOW YOU BROKE THIS </h1>";
			}
		} 
	}
	if(isset($_SESSION['name'])){
		$query = $pdo->prepare("select * FROM Cart JOIN Product on Cart.pid = Product.pid where cid = :cid");
		$key = array(":cid" => $_SESSION['cid']);
		$query->execute($key);

		$cart = $query->fetchAll();
    
		foreach ($cart as $item) {
			echo "<table class=\"catalog\">";
			echo "<tr> <th>Product Name:  </th> <td>" . $item['name'] . "</td></tr>";
			echo "<tr><td>Product ID: </td><td>" . $item['pid'] . "</td></tr>";
			echo "<tr><td>Product Description: </td><td>" . $item['description'] . "</td></tr>";
			echo "<tr><td>Price: </td><td>" . $item['price'] . "</td></tr>";
			echo "<tr>
					<td>
						<form method='post'>
							<input type='submit' value='remove from cart'>
							<input type='hidden' name='cart' value='remove'>
							<input type='hidden' name='item' value='" . $item['cartID'] . "'>
						</form>
					</td>
				</tr>";
			echo "</table>";
		}

		echo "
			<form method='post'>
				<input type='hidden' name='cart' value='orderAll'>
				<input type='submit' value='Order All'>
			</form>    
		";
	}
	else 
		echo "<h1> Please Log in to order items</h1>";
?>