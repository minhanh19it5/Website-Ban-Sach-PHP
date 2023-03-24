<?php
include 'inc/header.php';
//include 'inc/slider.php';
 ?>
<?php
 if(!isset($_GET['proid']) || $_GET['proid']==NULL) {
    echo "<script>window.location ='404.php'</script>";
}else{

    $id= $_GET['proid'];
}
$customer_id =Session::get('customer_id');
if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['compare'])) {

$productid = $_POST['productid'];
    $insertCompare = $product->insertCompare($productid,$customer_id);
    # code...
 }
?>
 <div class="main">
    <div class="content">
    	<div class="section group">
<?php
$get_product_details = $product->get_details($id);
if($get_product_details){
	while($result_details =$get_product_details->fetch_assoc()){

?>
				<div class="cont-desc span_1_of_2">
					<div class="grid images_3_of_2">
						<img src="admin/uploads/<?php echo $result_details['image'] ?>" alt="" />
					</div>
				<div class="desc span_3_of_2">
					<h2><?php echo $result_details['productName'] ?> </h2>
					<p><?php echo $fm->textShorten($result_details['product_desc'],200) ?></p>
					<div class="price">
						<p>Giá: <span><?php echo $result_details['price']." "."đ" ?></span></p>
						<p>Thể loại: <span><?php echo $result_details['catName'] ?></span></p>
						<p>Tác giả:<span><?php echo $result_details['brandName'] ?></span></p>
					</div>
				<div class="add-cart">
					<form action="" method="post">
						<input type="number" class="buyfield" name="quantity" value="1" min="1"/>
						<input type="submit" class="buysubmit" name="submit" value="Mua ngay"/>
		<?php
		if(isset($AddtoCart)){
		echo '<span style="color:red; font_size:18px;"">Sản phẩm đã được thêm vào</span>';
		}
?>
					</form>
				</div>
<div class="add-cart">
	<from action="" method="POST">
<!--<a href="?wlist=<?php echo $result_details['productId']?>" class="buysubmit">Lưu vào danh sách yêu thích</a>-->
<!--<a href="?compare=<?php echo $result_details['productId']?>" class="buysubmit">So sánh sản phẩm</a>-->
<input type="hidden"  name="productid" value="<?php echo $result_details['productId'] ?>"/>
<input type="submit" class="buysubmit" name="compare" value="So sánh sản phẩm"/>
<?php 
if(isset($insertCompare)){
	echo $insertCompare;
}

?>
</from>
				</div>
			</div>
			<div class="product-desc">
			<h2>THÔNG TIN CHI TIẾT SẢN PHẨM</h2>
			<p>Người lẩn trốn trong bóng tối, một cô gái phát cuồng màu đen, thậm chí còn định nhuộm đen làn da mình, có thói quen ẩn náu trong bóng tối. Tuổi thơ bị hắt hủi liệu có thật sự ảnh hưởng tới cả cuộc đời một con người?

Vườn hoa của cô ấy, một cô gái xinh đẹp, sở hữu trí tuệ, ngoại hình và cả khối tài sản khiến người ngưỡng mộ, nhưng luôn mơ thấy ngoài cửa sổ có một con mắt to đang rình trộm mình. Dưới áp lực nặng nề, nếu con người ta không thể tự giải thoát bản thân, hậu quả sẽ ra sao?

Quan Âm nghìn tay, một sư thầy mơ thấy bị Quan Âm nghìn tay đuổi giết vô số lần, dáng vẻ Quan Âm như ma quỷ dưới địa ngục. Liệu đằng sau dáng vẻ thành tâm tu hành có đang chôn giấu bí mật đen tối nào?

Vụ mưu sát hoàn mỹ, một người đàn ông yêu thương gia đình nhưng luôn mơ thấy mình tự tay giết vợ. Hai mươi năm trước, anh ta đã tận mắt chứng kiến bố mình sát hại mẹ mình. Chẳng lẽ đó là số phận của huyết thống?</p>
	    </div>

	</div>
	<?php
}
}
	?>
				<div class="rightsidebar span_3_of_1">
					<h2>THỂ LOẠI</h2>
					<ul>
		<?php   
$getall_category = $cat->show_category_fontend();
if($getall_category){
while($result_allcat = $getall_category->fetch_assoc()){

		?>
				      <li><a href="productbycat.php?catid=<?php echo $result_allcat['catId'] ?> "><?php echo $result_allcat['catName'] ?></a></li>
	<?php  
}
}
	 ?>

    				</ul>

 				</div>
 		</div>
 	</div>
	<?php
include 'inc/footer.php';
 ?>