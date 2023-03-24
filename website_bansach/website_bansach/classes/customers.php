<?php
 $filepath = realpath(dirname(__FILE__));
include_once ($filepath.'/../lib/database.php');
include_once ($filepath.'/../helpers/format.php');
 ?>
<?php
/**
 *
 */
class customer
{
	private $db;
	private $fm;
	
	public function __construct()
	{
		$this->db = new Database();
		$this->fm = new Format();
		
	}
	public function insert_customers($data){
$name= mysqli_real_escape_string($this->db->link, $data['ten']);
$city= mysqli_real_escape_string($this->db->link, $data['city']);
$zipcode= mysqli_real_escape_string($this->db->link, $data['zipcode']);
$email= mysqli_real_escape_string($this->db->link, $data['email']);
$address= mysqli_real_escape_string($this->db->link, $data['address']);
$country= mysqli_real_escape_string($this->db->link, $data['country']);
$phone= mysqli_real_escape_string($this->db->link, $data['phone']);
$password= mysqli_real_escape_string($this->db->link, $data['password']);
if($name=="" ||$city=="" ||$zipcode=="" ||$email=="" ||$address=="" ||$country=="" ||$phone==""||$password=="" ){
	     $alert = "<span class='error'>Các trường không được để trống </span>";
	     return $alert;
	 }else{
	 	$check_email = "SELECT * FROM tbl_customer WHERE email= '$email' LIMIT 1";
	 	$result_check = $this->db->select($check_email);
	 	if($result_check){
	$alert = "<span class='error'>Email đã tồn tại </span>";
	     return $alert; 		
	 }else{
$query = "INSERT INTO tbl_customer(name,city,zipcode,email,address,country,phone,password) VALUES('$name','$city','$zipcode','$email','$address','$country',$phone','$password')";
	$result = $this->db->insert($query);
	if ($result ) {
		$alert = " <span class='success'> Khách hàng đã tạo thành công</span> ";
		return $alert;


		# code...
	}else{
		$alert = " <span class='error'> Khách hàng đã tạo không thành công</span> ";
		return $alert;
	}

	 }
	 }
	}
	}
	?>