<?php 
 
 $filepath = realpath(dirname(__FILE__));
 include_once ($filepath.'/../lib/database.php');
 include_once ($filepath.'/../helpers/format.php');
  ?>
<?php 
/**
 * 
 */
class product 
{
	private $db;
	private $fm;


	public function __construct()
	{
		$this->db = new Database();
		$this->fm = new Format();
	}
	public function insert_product($data, $files){

		$productName= mysqli_real_escape_string($this->db->link, $data['productName']);
		$brand= mysqli_real_escape_string($this->db->link, $data['brand']);
		$category= mysqli_real_escape_string($this->db->link, $data['category']);
		$product_desc= mysqli_real_escape_string($this->db->link, $data['product_desc']);
		$price= mysqli_real_escape_string($this->db->link, $data['price']);
		$type= mysqli_real_escape_string($this->db->link, $data['type']);
        //kiem tra hinh anh
		$permited  = array('jpg','jpeg','png','gif');
		$file_name = $_FILES['image']['name'];	
		$file_size = $_FILES['image']['size'];
		$file_temp = $_FILES['image']['tmp_name'];

		$div = explode('.', $file_name);
		$file_ext = strtolower(end($div));
		$unique_image = substr(md5(time()),0,10).'.'.$file_ext;
		$uploaded_image = "uploads/".$unique_image;


		if($productName =="" ||$brand =="" ||$category =="" ||$product_desc =="" ||$price =="" ||$type =="" || $file_name ==""){
	     $alert = "<span class='error'>Fields must be not empty </span>";
	     return $alert;
}else{
	move_uploaded_file($file_temp,$uploaded_image);
	$query = "INSERT INTO tbl_product(productName,brandId,catId,product_desc,price,type,image) VALUES('$productName','$brand','$category','$product_desc','$price','$type','$unique_image')";
	$result = $this->db->insert($query);
	if ($result ) {
		$alert = " <span class='success'> Thêm  sản phẩm thành công</span> ";
		return $alert;


		# code...
	}else{
		$alert = " <span class='error'> Thêm sản phẩm không thành công</span> ";
		return $alert;
	}

	
}

	}

	public function show_product(){
		$query = "
		SELECT tbl_product.*, tbl_category.catName, tbl_brand.brandName
		FROM tbl_product INNER JOIN tbl_category ON tbl_product.catId = tbl_category.catId
		                 INNER JOIN tbl_brand ON tbl_product.brandId = tbl_brand.brandId
		order by tbl_product.productId desc";
		// $query = "SELECT * FROM tbl_product order by productId desc";
	$result = $this->db->select($query);
	return $result;
	}
 	public function update_product($data,$files,$id){
		
		$productName= mysqli_real_escape_string($this->db->link, $data['productName']);
		$brand= mysqli_real_escape_string($this->db->link, $data['brand']);
		$category= mysqli_real_escape_string($this->db->link, $data['category']);
		$product_desc= mysqli_real_escape_string($this->db->link, $data['product_desc']);
		$price= mysqli_real_escape_string($this->db->link, $data['price']);
		$type= mysqli_real_escape_string($this->db->link, $data['type']);
        //kiem tra hinh anh
		$permited  = array('jpg','jpeg','png','gif');
		$file_name = $_FILES['image']['name'];	
		$file_size = $_FILES['image']['size'];
		$file_temp = $_FILES['image']['tmp_name'];

		$div = explode('.', $file_name);
		$file_ext = strtolower(end($div));
		$unique_image = substr(md5(time()), 0, 10).'.'.$file_ext;
		$uploaded_image = "uploads/".$unique_image;

	
	if($productName=="" ||$brand=="" ||$category=="" ||$product_desc=="" ||$price=="" ||$type=="" ){
	     $alert = "<span class='error'>Fields must be not empty </span>";
	     return $alert;
	     }else{
	     	if(!empty($file_name)){
	     	if($file_size > 20480)  {

$alert = " <span class='success'> Image size should be less then 2MB!</span> ";
		return $alert;
	     	}
	     	elseif (in_array($file_ext, $permited) === false) 
	     	{
	 // echo "<span class= 'error'>You can upload only:-".implode(',', $permited)."</span>";  
	  $alert = " <span class='success'> You can upload only:-".implode(',', $permited)."</span> ";
		return $alert;		
	     	
}
$query = "UPDATE tbl_product SET 
productName = '$productName',
brandId = '$brand',
catId = '$category',
type = '$type',
price = '$price',
image = '$unique_image',
product_desc = '$product_desc'
 WHERE productId = '$id'";
}else{
	$query = "UPDATE tbl_product SET 
productName = '$productName',
brandId = '$brand',
catId = '$category',
type = '$type',
price = '$price',
product_desc = '$product_desc'
 WHERE productId = '$id'";

}


	
	$result = $this->db->update($query);
 	if ($result ) {
 			$alert = " <span class='success'> Cập nhật danh mục sản phẩm thành công</span> ";
 		return $alert;


	# code...
 	}else{
 		$alert = "<span class='error'> Cập nhật danh mục sản phẩm không thành công</span> ";
 		return $alert;
 	}

	
 }

 }
 public function del_product($id){
 	$query = "DELETE  FROM tbl_product where productId= '$id' ";
 	$result = $this->db->delete($query);
 	if ($result ) {
 		$alert = " <span class='success'> Xóa danh mục sản phẩm thành công</span> ";
 		return $alert;


 		# code...
 	}else{
 		$alert = " <span class='error'> Xóa danh mục sản phẩm không thành công</span> ";
 		return $alert;
 	}

	
 }
	public function getproductbyId($id){
		$query = "SELECT * FROM tbl_product where productId= '$id' ";
	$result = $this->db->select($query);
	return $result;

	}
public function getproduct_feathered(){
	$query = "SELECT * FROM tbl_product where type= '0'";
	$result = $this->db->select($query);
	return $result;
}

public function getproduct_new(){
	$query = "SELECT * FROM tbl_product order by productId desc LIMIT 4";
	$result = $this->db->select($query);
	return $result;
 }
 public function get_details($id){
 	$query = "
		SELECT tbl_product.*, tbl_category.catName, tbl_brand.brandName
		FROM tbl_product INNER JOIN tbl_category ON tbl_product.catId = tbl_category.catId
		                 INNER JOIN tbl_brand ON tbl_product.brandId = tbl_brand.brandId where tbl_product.productId= '$id'
		";
		// $query = "SELECT * FROM tbl_product order by productId desc";
	$result = $this->db->select($query);
	return $result;
 }
 public function getLastestkinhte(){

$query = "SELECT * FROM tbl_product where brandId='13' order by productId desc LIMIT 1";
	$result = $this->db->select($query);
	return $result;

 }
 public function getLastestgiaokhoa(){

$query = "SELECT * FROM tbl_product where brandId='12' order by productId desc LIMIT 1";
	$result = $this->db->select($query);
	return $result;

 }
 public function getLastesttruyentranh(){

$query = "SELECT * FROM tbl_product where brandId='11' order by productId desc LIMIT 1";
	$result = $this->db->select($query);
	return $result;

 }
 public function getLastestngontinh(){

$query = "SELECT * FROM tbl_product where brandId='10' order by productId desc LIMIT 1";
	$result = $this->db->select($query);
	return $result;

 }
 public function getLastestkhoahoc(){

$query = "SELECT * FROM tbl_product where brandId='9' order by productId desc LIMIT 1";
	$result = $this->db->select($query);
	return $result;

 }
 public function getLastesttamly(){

$query = "SELECT * FROM tbl_product where brandId='8' order by productId desc LIMIT 1";
	$result = $this->db->select($query);
	return $result;

 }
 public function insertCompare($productid,$customer_id){
 	$productid= mysqli_real_escape_string($this->db->link, $productid);
		$customer_id= mysqli_real_escape_string($this->db->link, $customer_id);
		
   $query = "SELECT * FROM tbl_product where productId ='$productid'";
   $result = $this->db->select($query)->fetch_assoc();
   $productName = $result["productName"];
   $price = $result["price"];
   $image = $result["image"];

   $query_insert = "INSERT INTO tbl_compare(productId,price,image,customer_id,productName
) VALUES('$productid','$price','$image','$customer_id','$productName')";
	$insert_compare = $this->db->insert($query_insert);
	if ($insert_compare) {
 			$alert = " <span class='success'> Đã thêm so sánh thành công</span> ";
 		return $alert;



 	}else{
 		$alert = "<span class='error'> Đã thêm so sánh không thành công</span> ";
 		return $alert;
 	}
 }
 }


 ?>