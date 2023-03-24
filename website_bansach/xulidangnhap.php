<?php 
session_start();
	$tendn = $_POST['tendn'];
	$mk = $_POST['mk'];
	$conn = mysqli_connect("localhost","root","","website_bansach");
	$sql = "SELECT *FROM user WHERE	username='$tendn' AND password ='$mk'";
	$ketqua = mysqli_query($conn,$sql);
	$soluong = mysqli_num_rows($ketqua);
	if($soluong>0){
		$row = mysqli_fetch_assoc($ketqua);
		$_SESSION['username'] = $row['username'];
		$_SESSION['id'] = $row['id'];
		header("location:index.php");
		//echo "Bạn đã đăng nhập thành công";
	}
	else
		echo "Bạn đã nhập sai tên hoặc mật khẩu";
	?>