
<?php
include 'inc/header.php';
//include 'inc/slider.php';
 ?>
 <?php
//if(isset($_GET['cartid'])){
 
 //   $cartid= $_GET['cartid'];
  //  $delcart = $ct->del_product_cart($cartid);
//}

 //if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['submit'])) {
  // $cartId = $_POST['cartId'];
//$quantity = $_POST['quantity'];
   // $update_quantity_Cart = $ct->update_quantity_cart($quantity,$cartId);
    # code...
 //}
 

 ?>
 <?php
  $login_check= Session::get('customer_login');
  if($login_check==false){
  	header('Location:login.php');
  }
   $ct = new cart();
  if(isset($_GET['confirmid']) ) {
$id = $_GET['confirmid'];
$time = $_GET['time'];
$price = $_GET['price'];
$shifted_confirm = $ct->shifted_confirm($id,$time,$price);

}

?>

 <div class="main">
    <div class="content">
    	<div class="cartoption">
			<div class="cartpage">
			    	<h2>Chi tiết đã đặt </h2>
			  
						<table class="tblone">
							<tr>
								<th width="10%"> ID</th>
								<th width="20%">Tên sản phẩm</th>
								<th width="10%">Ảnh</th>
								<th width="15%">Giá</th>
								<th width="15%">Số lượng</th>
								<th width="10%">Ngày đặt</th>
								<th width="10%">Tình trạng</th>
								<th width="10%">Xóa</th>
							</tr>
	<?php
	 $customer_id= Session::get('customer_id');
	$get_cart_ordered = $ct->get_cart_ordered($customer_id);
	if($get_cart_ordered){
		$i = 0;
$qty = 0;
while($result = $get_cart_ordered->fetch_assoc()){
$i++;
			?>
							<tr>
							<td><?php echo $i; ?></td>
<td><?php echo $result['productName'] ?></td>
	<td><img src="admin/uploads/<?php echo $result['image'] ?>" alt=""/></td>
								<td><?php echo $fm->format_currency($result['price'])." "."đ" ?></td>
								<td>

	<?php echo $result['quantity'] ?>

								</td>
<td><?php echo $fm->formatDate($result['date_order'])  ?>  </td>
<td>
	<?php 
	if($result['status']=='0'){
		echo'Đang chờ xử lí';

	}elseif($result['status']=='1'){
		?>
	<span>Đang vận chuyển </span>
		
<?php

	}else{
	echo'Đã nhận được hàng';
	}
	?>



</td>

<?php 
if($result['status']=='0'){
?>
<td><?php echo 'N/A'; ?></td>
<?php 

}elseif($result['status']=='1'){
?>
<td><a href="?confirmid=<?php echo $customer_id ?>&price=<?php echo $result['price']  ?>&time=<?php echo $result['date_order'] ?>">Đã xác nhận</a></td>
<?php
}else{
 ?>

<td><?php echo 'Đã nhận được hàng';?></a>
<?php 
}
?>

</td>
							</tr>

<?php

				}
				}
?>
						</table>
		
						
	
					</div>
					<div class="shopping">
						<div class="shopleft">
							<a href="index.php"> <img src="images/shop.png" alt="" /></a>
						</div>
						<div class="shopright">
							<a href="payment.php"> <img src="images/check.png" alt="" /></a>
						</div>
					</div>
    	</div>
       <div class="clear"></div>
    </div>
 </div>
<?php
include 'inc/footer.php';
 ?>

