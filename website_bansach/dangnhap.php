<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Đăng Nhập</title>
	<link rel="stylesheet" href="css/dangnhap.css">
	<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Nunito:400,600,700,800&display=swap">
</head>
<body>
	<div class="cont">
		<div class="form sign-in">
			<h2>Đăng Nhập</h2>
			<form action="xulidangnhap.php" method="POST">
			<label>
				<span>Tên đăng nhập</span>
				<input type="text" name="tendn">
			</label>
			<label>
				<span>Mật Khẩu</span>
				<input type="password" name="mk">
			</label>
			<input type="submit" value="Đăng Nhập" class="submit">
			<!-- <button class="submit" type="button">Đăng Nhập</button> -->
			<p class="forgot-pass">Quên Mật Khẩu?</p>
			</form>

			<div class="social-media">
				<ul>
					<a href="https://www.facebook.com/"><li><img src="../Images/facebook.png"></li></a>
					<a href="https://twitter.com/?lang=vi"><li><img src="../Images/twitter.png"></li></a>
					<a href="https://www.linkedin.com/"><li><img src="../Images/linkedin.png"></li></a>
					<a href="https://www.instagram.com/?hl=vi"><li><img src="../Images/instagram.png"></li></a>
				</ul>
			</div>
		</div>
		<div class="sub-cont">
			<div class="img">
				<div class="img-text m-up">
					<h2>Xin Chào Bạn!!</h2>
					<p>Đăng kí và khám phá nhiều cơ hội mới!</p>
				</div>
				<div class="img-text m-in">
					<h2>Một trong số chúng tôi?</h2>
					<p>Nếu bạn đã có tài khoản, chỉ cần đăng nhập. Chúng tôi rất nhớ bạn!</p>
				</div>
				<div class="img-btn">
					<span class="m-up">Đăng Kí</span>
					<span class="m-in">Đăng Nhập</span>
				</div>
			</div>


			<div class="form sign-up">
				<form action="xulidangki.php" method="POST">

				<h2>Đăng Ký</h2>
				<label>
					<span>Họ và tên</span>
					<input type="text" name="username">
				</label>
				<label>
					<span>Email</span>
					<input type="text" name="email">
				</label>
				<label>
					<span>Phone</span>
					<input type="text" name="phone">
				</label>
				<label>
					<span>Mật Khẩu</span>
					<input type="password" name="password">
				</label>
				<label>
					<span>Xác Nhận Mật Khẩu</span>
					<input type="password" name="repassword">
				</label>
				<input type="submit" value="Đăng Kí" class="submit" name="submit">
				<!--<button type="button" class="submit">Đăng Kí Ngay</button>-->
			</form>
			</div>
		</div>
	</div>
<script type="text/javascript" src="../Jquery/dangnhap_script.js"></script>
</body>
</html>