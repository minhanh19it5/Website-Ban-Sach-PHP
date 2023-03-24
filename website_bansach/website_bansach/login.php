
<?php
include 'inc/header.php';
//include 'inc/slider.php';
 ?>
 <?php 
$login_check =  Session::get('customer_login');
if($login_check){
header('Location:order.php');
}
 ?>

 <?php

 if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['submit'])) {


    $insertCustomers = $cs->insert_customers($_POST);

 }
  ?>
  <?php

 if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['login'])) {


    $login_Customers = $cs->login_customers($_POST);

 }
  ?>

 <div class="main">
    <div class="content">
    	 <div class="login_panel">
        	<h3>Khách hàng hiện tại</h3>
        	<p>Đăng nhập bằng biểu mẫu bên dưới</p>
<?php
if(isset($login_Customers)){
	echo $login_Customers;
}

  ?>



        	<form action="" method="POST" >
 <input  type="text" name="email" class="field" placeholder="Email">
                    <input  type="password"  name="password" class="field" placeholder="Mật khẩu">
                 
                 <p class="note"><!-- If you forgot your passoword just enter your email and click -->Nếu bạn quên mật khẩu chỉ cần nhập email và nhấp vào <a href="#">đây</a></p>
                    <div class="buttons"><div><input type="submit" name="login" class="grey" value="Đăng nhập"></div></div>
                    </div>
                    </form>
<?php  

?>


    	<div class="register_account">
    		<h3>Đăng kí tài khoản mới</h3>

    <?php  
if(isset($insertCustomers)){
	echo $insertCustomers;
}

     ?>
    		<form action="" method="POST">
		   			 <table>
		   				<tbody>
						<tr>
						<td>
							<div>
							<input type="text"  name="name" placeholder="Tên" >
							</div>
							
							<div>
							   <input type="text" name="city" placeholder="Thành phố" >
							</div>
							
							<div>
								<input type="text" name="zipcode" placeholder="Zipcode" >
							</div>
							<div>
								<input type="text" name="email"placeholder="E-Mail">
							</div>
		    			 </td>
		    			<td>
						<div>
							<input type="text" name="address" placeholder="Địa chỉ">
						</div>
		    		<div>
						<select id="country" name="country" onchange="change_country(this.value)" class="frm-field required">
							<option value="null">Chọn thành phố</option>         
							
							<option value="AL">Đà Nẵng</option>
							
		         </select>
				 </div>		        
	
		           <div>
		          <input type="text" name="phone" placeholder="Số điện thoại">
		          </div>
				  
				  <div>
					<input type="text" name="password" placeholder=" Mật khẩu">
				</div>
		    	</td>
		    </tr> 
		    </tbody></table> 
		   <div class="search"><div><input type="submit" name="submit" class="grey" value="Tạo tài khoản"></div></div>
		    <p class="terms"><!-- By clicking 'Create Account' you agree to the --> Bằng cách nhập vào "Tạo tài khoản" bạn đồng ý với <a href="#">Terms &amp; Conditions</a>.</p>
		    <div class="clear"></div>
		    </form>
    	</div>  	
       <div class="clear"></div>
    </div>
 </div>
<?php
include 'inc/footer.php';
 ?>