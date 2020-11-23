<?php
error_reporting(0);

//เชื่อต่อ Database
$con = mysqli_connect("localhost","root","","ch_elect");


$con->set_charset("utf8");
date_default_timezone_set("Asia/Bangkok");

function checkLogin($username,$password){
	$data = array();
	global $con;
	$sql = "select * from users where username = '".$username."' AND password='".$password."'";
	$res = mysqli_query($con,$sql);
	
	while($row = mysqli_fetch_array($res)) {
		$data['id'] = $row['id'];
		$data['status'] = $row['status'];

	}
	if (!empty($data)) {
		
		session_start();
		$id = $data['id'];
		$_SESSION['id'] = $data['id'];
		$_SESSION['status'] = $data['status'];
		echo ("<script language='JavaScript'>
			window.location.href='index.php';
			</script>");
		
	}else{
		echo "<script type='text/javascript'>alert('ไม่สามารถเข้าสู่ระบบได้ ');</script>";
	}
	
	mysqli_close($con);

}


function logout(){
	session_start();
	session_unset();
	session_destroy();
	echo ("<script language='JavaScript'>
		window.location.href='index.php';
		</script>");
	exit();
}

function getUser($id){

	global $con;

	$res = mysqli_query($con,"SELECT * FROM users WHERE id = '".$id."'");
	$result=mysqli_fetch_array($res,MYSQLI_ASSOC);
	return $result;

	mysqli_close($con);

}

function formatDateFull($date){
	if($date=="0000-00-00"){
		return "";
	}
	if($date=="")
		return $date;
	$raw_date = explode("-", $date);
	return  $raw_date[2] . "/" . $raw_date[1] . "/" . $raw_date[0];
}

function saveRegister($username,$password,$firstname,$lastname,$address,$phone,$email){
	
	
	global $con;


	$sql = "INSERT INTO users (username, password, firstname, lastname, address, phone, email, status) VALUES('".$username."','".$password."','".$firstname."','".$lastname."','".$address."','".$phone."','".$email."','1')";

	mysqli_query($con,$sql);

	

	mysqli_close($con);
	echo ("<script language='JavaScript'>
		alert('สมัครสมาชิกเรียบร้อย');
		window.location.href='index.php';
		</script>"); 
	
}

function editProfile($id,$username,$password,$firstname,$lastname,$address,$phone,$email){

	global $con;

	$sql="UPDATE users SET username='".$username."',password='".$password."',firstname='".$firstname."',lastname='".$lastname."',address='".$address."',phone='".$phone."',email='".$email."' WHERE id = '".$id."'";

	mysqli_query($con,$sql);

	mysqli_close($con);

	echo ("<script language='JavaScript'>
		alert('แก้ไขข้อมูลเรียบร้อย');
		window.location.href='profile.php';
		</script>"); 
	
}

function getCurrentUser($id){

	global $con;

	$res = mysqli_query($con,"SELECT * FROM users WHERE id = '".$id."'");
	$result=mysqli_fetch_array($res,MYSQLI_ASSOC);
	return $result;

	mysqli_close($con);

}


function saveCategory($cate_name){
	global $con;

	$sql = "INSERT INTO categories (cate_name)VALUES('".$cate_name."')";
	mysqli_query($con,$sql);
		
	mysqli_close($con);
	echo ("<script language='JavaScript'>
		alert('เพิ่มข้อมูลเรียบร้อย');
		window.location.href='manage_category.php';
		</script>"); 
}

function editCategory($id,$cate_name){

	global $con;

	mysqli_query($con,"UPDATE categories SET cate_name='".$cate_name."' WHERE id = '".$id."'");

	mysqli_close($con);

	
	echo ("<script language='JavaScript'>
		alert('แก้ไขข้อมูลเรียบร้อย');
		window.location.href='manage_category.php';
		</script>"); 
	
}

function deleteCategory($id){
	global $con;

	mysqli_query($con,"DELETE FROM categories WHERE id='".$id."'");
	mysqli_close($con);
	echo ("<script language='JavaScript'>
		alert('ลบข้อมูลเรียบร้อย');
		window.location.href='manage_category.php';
		</script>"); 

}

function getAllCategory(){
	global $con;

	$res = mysqli_query($con,"SELECT * FROM categories ORDER BY id DESC");

	$data = array();
	while($row = mysqli_fetch_assoc($res)) {
		$namesArray[] = array(
			'id' => $row['id'],
			'cate_name' => $row['cate_name']);
	}

	$data = $namesArray;

	return $data;
	mysqli_close($con);

}

function getCurrentCategory($id){

	global $con;

	$res = mysqli_query($con,"SELECT * FROM categories WHERE id = '".$id."'");
	$result=mysqli_fetch_array($res,MYSQLI_ASSOC);
	return $result;

	mysqli_close($con);

}

function saveGroups($categories_id,$group_name){
	global $con;

	$sql = "INSERT INTO groups (categories_id,group_name)VALUES('".$categories_id."','".$group_name."')";
	mysqli_query($con,$sql);
		
	mysqli_close($con);
	echo ("<script language='JavaScript'>
		alert('เพิ่มข้อมูลเรียบร้อย');
		window.location.href='manage_groups.php';
		</script>"); 
}

function editGroups($id,$categories_id,$group_name){

	global $con;

	mysqli_query($con,"UPDATE groups SET categories_id='".$categories_id."',group_name='".$group_name."' WHERE id = '".$id."'");

	mysqli_close($con);

	
	echo ("<script language='JavaScript'>
		alert('แก้ไขข้อมูลเรียบร้อย');
		window.location.href='manage_groups.php';
		</script>"); 
	
}

function deleteGroups($id){
	global $con;

	mysqli_query($con,"DELETE FROM groups WHERE id='".$id."'");
	mysqli_close($con);
	echo ("<script language='JavaScript'>
		alert('ลบข้อมูลเรียบร้อย');
		window.location.href='manage_groups.php';
		</script>"); 

}

function getAllGroups(){
	global $con;

	$res = mysqli_query($con,"SELECT *,g.id as gid FROM groups g LEFT JOIN categories c ON g.categories_id = c.id ORDER BY g.id DESC");

	$data = array();
	while($row = mysqli_fetch_assoc($res)) {
		$namesArray[] = array(
			'id' => $row['gid'],
			'cate_name' => $row['cate_name'],
			'group_name' => $row['group_name']);
	}

	$data = $namesArray;

	return $data;
	mysqli_close($con);

}

function getAllGroupsInCategory($categories_id){
	global $con;

	$res = mysqli_query($con,"SELECT *,g.id as gid FROM groups g LEFT JOIN categories c ON g.categories_id = c.id WHERE g.categories_id = '".$categories_id."' ORDER BY g.id DESC");

	$data = array();
	while($row = mysqli_fetch_assoc($res)) {
		$namesArray[] = array(
			'id' => $row['gid'],
			'cate_name' => $row['cate_name'],
			'group_name' => $row['group_name']);
	}

	$data = $namesArray;

	return $data;
	mysqli_close($con);

}

function getCurrentGroups($id){

	global $con;

	$res = mysqli_query($con,"SELECT * FROM groups WHERE id = '".$id."'");
	$result=mysqli_fetch_array($res,MYSQLI_ASSOC);
	return $result;

	mysqli_close($con);

}


function saveProduct($categories_id,$groups_id,$pro_number,$pro_name,$pro_detail,$pro_size,$pro_weight,$qunatity,$price,$status,$product_img){
	global $con;

	if($product_img != null){
		if(move_uploaded_file($_FILES["product_img"]["tmp_name"],"images/product/".$_FILES["product_img"]["name"]))
		{

			$sql = "INSERT INTO products (categories_id, groups_id, pro_number, pro_name, pro_detail, pro_size, pro_weight, qunatity, price, status, product_img) VALUES('".$categories_id."','".$groups_id."','".$pro_number."','".$pro_name."','".$pro_detail."','".$pro_size."','".$pro_weight."','".$qunatity."','".$price."','".$status."','".$_FILES["product_img"]["name"]."')";
			mysqli_query($con,$sql);
		}
	}else{

		$sql = "INSERT INTO products (categories_id, groups_id, pro_number, pro_name, pro_detail, pro_size, pro_weight, qunatity, price, status) VALUES('".$categories_id."','".$groups_id."','".$pro_number."','".$pro_name."','".$pro_detail."','".$pro_size."','".$pro_weight."','".$qunatity."','".$price."','".$status."')";
		mysqli_query($con,$sql);
		
	}
	mysqli_close($con);
	echo ("<script language='JavaScript'>
		alert('เพิ่มข้อมูลเรียบร้อย');
		window.location.href='manage_product.php';
		</script>"); 
}

function editProduct($id,$categories_id,$groups_id,$pro_number,$pro_name,$pro_detail,$pro_size,$pro_weight,$qunatity,$price,$status,$product_img){

	global $con;
	if($product_img != null){
		if(move_uploaded_file($_FILES["product_img"]["tmp_name"],"images/product/".$_FILES["product_img"]["name"]))
		{
			mysqli_query($con,"UPDATE products SET categories_id='".$categories_id."',groups_id='".$groups_id."',pro_number='".$pro_number."',pro_name='".$pro_name."',pro_detail='".$pro_detail."',pro_size='".$pro_size."',pro_weight='".$pro_weight."',qunatity='".$qunatity."',price='".$price."',status='".$status."',product_img='".$_FILES["product_img"]["name"]."' WHERE id = '".$id."'");
		}
	}else{

		mysqli_query($con,"UPDATE products SET categories_id='".$categories_id."',groups_id='".$groups_id."',pro_number='".$pro_number."',pro_name='".$pro_name."',pro_detail='".$pro_detail."',pro_size='".$pro_size."',pro_weight='".$pro_weight."',qunatity='".$qunatity."',price='".$price."',status='".$status."' WHERE id = '".$id."'");
		
	}

	
	mysqli_close($con);

	
	echo ("<script language='JavaScript'>
		alert('แก้ไขข้อมูลเรียบร้อยแล้ว');
		window.location.href='manage_product.php';
		</script>"); 
	
}

function deleteProduct($id){
	global $con;

	mysqli_query($con,"DELETE FROM products WHERE id='".$id."'");
	mysqli_close($con);
	echo ("<script language='JavaScript'>
		alert('ลบข้อมูลเรียบร้อยแล้ว');
		window.location.href='manage_product.php';
		</script>"); 

}

function getAllProduct(){
	global $con;

	$sql = "SELECT *,p.id as pid
	FROM products p 
	LEFT JOIN categories c ON p.categories_id = c.id 
	LEFT JOIN groups g ON p.groups_id = g.id 
	ORDER BY p.id DESC";
	$res = mysqli_query($con,$sql);

	$data = array();
	while($row = mysqli_fetch_assoc($res)) {
		$namesArray[] = array(
			'id' => $row['pid'],
			'cate_name' => $row['cate_name'],
			'group_name' => $row['group_name'],
			'pro_number' => $row['pro_number'],
			'pro_name' => $row['pro_name'],
			'pro_detail' => $row['pro_detail'],
			'pro_size' => $row['pro_size'],
			'pro_weight' => $row['pro_weight'],
			'qunatity' => $row['qunatity'],
			'price' => $row['price'],
			'status' => $row['status'],
			'product_img' => $row['product_img']);
	}

	$data = $namesArray;

	return $data;
	mysqli_close($con);

}

function getCurrentProduct($id){

	global $con;

	$res = mysqli_query($con,"SELECT * FROM products WHERE id = '".$id."'");
	$result=mysqli_fetch_array($res,MYSQLI_ASSOC);
	return $result;

	mysqli_close($con);

}

function getAllProductInGroupAndCategory($categories_id,$groups_id){
	global $con;

	$sql = "SELECT *,p.id as pid
	FROM products p 
	LEFT JOIN categories c ON p.categories_id = c.id 
	LEFT JOIN groups g ON p.groups_id = g.id
	WHERE p.categories_id = '".$categories_id."' AND p.groups_id = '".$groups_id."'
	ORDER BY p.id DESC";
	$res = mysqli_query($con,$sql);

	$data = array();
	while($row = mysqli_fetch_assoc($res)) {
		$namesArray[] = array(
			'id' => $row['pid'],
			'cate_name' => $row['cate_name'],
			'group_name' => $row['group_name'],
			'pro_number' => $row['pro_number'],
			'pro_name' => $row['pro_name'],
			'pro_detail' => $row['pro_detail'],
			'pro_size' => $row['pro_size'],
			'pro_weight' => $row['pro_weight'],
			'qunatity' => $row['qunatity'],
			'price' => $row['price'],
			'status' => $row['status'],
			'product_img' => $row['product_img']);
	}

	$data = $namesArray;

	return $data;
	mysqli_close($con);

}

function saveOrders($users_id,$receive_firstname,$receive_lastname,$receive_address,$receive_email,$receive_phone,$total_price,$products_id,$amount,$unit_price,$sum_price){
	global $con;
	unset($_SESSION["shopping_cart"]);
	$dateNow = date("d/m/Y");
	$arrDateNow = explode("/", $dateNow);
	$arrDateNow[2] = $arrDateNow[2] + 543;
	$convert_dateNow = $arrDateNow[2].'-'.$arrDateNow[1].'-'.$arrDateNow[0];
	$timeNow = date("H:i");

	$sql = "INSERT INTO orders (users_id, receive_firstname, receive_lastname, receive_email, receive_phone, receive_address, total_price, date_order, time_order, status) VALUES('".$users_id."','".$receive_firstname."','".$receive_lastname."','".$receive_email."','".$receive_phone."','".$receive_address."','".$total_price."','".$convert_dateNow."','".$timeNow."','1')";

	mysqli_query($con,$sql);

	$last_id = $con->insert_id;
	
	foreach( $products_id as $key => $pi ) {
		if ($pi != "") {
			$am = $amount[$key];
			$up = $unit_price[$key];
			$sp = $sum_price[$key];
			$sql_detail = "INSERT INTO orders_detail (orders_id, products_id, amount, price, sum_price) VALUES ('".$last_id."','".$pi."','".$am."','".$up."','".$sp."')";
			mysqli_query($con,$sql_detail);
		}
	}

	echo ("<script language='JavaScript'>
		alert('สั่งซื้อเรียบร้อยแล้ว');
		window.location.href='index.php';
		</script>"); 
	
}

function getAllHistoryBuy($users_id){
	global $con;

	$sql = "SELECT *,o.id as ooid,o.status as ostatus
	FROM orders o
	LEFT JOIN users u ON o.users_id = u.id 
	WHERE o.users_id = '".$users_id."'
	ORDER BY o.id DESC";
	$res = mysqli_query($con,$sql);

	$data = array();
	while($row = mysqli_fetch_assoc($res)) {
		$namesArray[] = array(
			'id' => $row['ooid'],
			'receive_firstname' => $row['receive_firstname'],
			'receive_lastname' => $row['receive_lastname'],
			'receive_email' => $row['receive_email'],
			'receive_phone' => $row['receive_phone'],
			'receive_address' => $row['receive_address'],
			'total_price' => $row['total_price'],
			'date_order' => $row['date_order'],
			'time_order' => $row['time_order'],
			'status' => $row['ostatus']);
	}

	$data = $namesArray;

	return $data;
	mysqli_close($con);

}

?>