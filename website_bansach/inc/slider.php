	<div class="header_bottom">
		<div class="header_bottom_left">
			<div class="section group">
	<?php  
$getLastestkinhte = $product->getLastestkinhte();
if($getLastestkinhte){
	while ($resultkinhte = $getLastestkinhte->fetch_assoc()){

	  ?>
				<div class="listview_1_of_2 images_1_of_2">
					<div class="listimg listimg_2_of_1">
						 <a href="preview.html"> <img src="admin/uploads/<?php echo $resultkinhte['image'] ?>"  alt="" /></a>
					</div>
				    <div class="text list_2_of_1">
						<h2><center>Cho Đất Nước Đi Lên</center></h2>
						<p><?php echo $resultkinhte['productName'] ?></p>
						<div class="button"><span><a href="details.php?proid=<?php echo $resultkinhte['productId'] ?>">Đặt hàng</a></span></div>
				   </div>
			   </div>
	<?php    
}
}
	?>

	<?php  
$getLastestgiaokhoa = $product->getLastestgiaokhoa();
if($getLastestgiaokhoa){
	while ($resultgiaokhoa = $getLastestgiaokhoa->fetch_assoc()){

	  ?>
				<div class="listview_1_of_2 images_1_of_2">
					<div class="listimg listimg_2_of_1">
						  <a href="preview.html"><img src="admin/uploads/<?php echo $resultgiaokhoa['image'] ?>" alt="" / ></a>
					</div>
					<div class="text list_2_of_1">
						  <h2><center>Chúng Ta Sống Có Vui Không</center></h2>
						  <p><?php echo $resultgiaokhoa['productName'] ?></p>
						  <div class="button"><span><a href="details.php?proid=<?php echo $resultgiaokhoa['productId'] ?>">Đặt hàng</a></span></div>
					</div>
				</div>
			</div>
				<?php    
}
}
	?>
			<div class="section group">
				<?php  
$getLastesttruyentranh = $product->getLastesttruyentranh();
if($getLastesttruyentranh){
	while ($resulttruyentranh = $getLastesttruyentranh->fetch_assoc()){

	  ?>
				<div class="listview_1_of_2 images_1_of_2">
					<div class="listimg listimg_2_of_1">
						 <a href="preview.html"> <img src="admin/uploads/<?php echo $resulttruyentranh['image'] ?>" alt="" /></a>
					</div>
				    <div class="text list_2_of_1">
						<h2><center>Lẽ Nào Em Không Biết</center></h2>
						<p><?php echo $resulttruyentranh['productName'] ?></p>
						<div class="button"><span><a href="details.php?proid=<?php echo $resulttruyentranh['productId'] ?>">Đặt hàng</a></span></div>
				   </div>
			   </div>	
			   				<?php    
}
}
	?>		
	<?php  
$getLastestngontinh = $product->getLastestngontinh();
if($getLastestngontinh){
	while ($resultngontinh= $getLastestngontinh->fetch_assoc()){

	  ?>
				<div class="listview_1_of_2 images_1_of_2">
					<div class="listimg listimg_2_of_1">
						  <a href="preview.html"><img src="admin/uploads/<?php echo $resultngontinh['image'] ?>" alt="" /></a>
					</div>
					<div class="text list_2_of_1">
						  <h2><center>Mắt Biếc</center></h2>
						  <p><?php echo $resultngontinh['productName'] ?></p> 
						  <div class="button"><span><a href="details.php?proid=<?php echo $resultngontinh['productId'] ?>">Đặt hàng</a></span></div>
					</div>
				</div>
			</div>
						<?php    
}
}
	?>
		  <div class="clear"></div>
		</div>
			 <div class="header_bottom_right_images">
		   <!-- FlexSlider -->
             
			<section class="slider">
				  <div class="flexslider">
					<ul class="slides">
						<li><img src="images/b17.jpg" alt=""/></li>
						<li><img src="images/b14.jpg" alt=""/></li>
						<li><img src="images/b15.jpg" alt=""/></li>
						<li><img src="images/b13.jpg" alt=""/></li>
				    </ul>
				  </div>
	      </section>
<!-- FlexSlider -->
	    </div>
	  <div class="clear"></div>
  </div>