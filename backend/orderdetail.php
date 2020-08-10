<?php 
  session_start();
  if (isset($_SESSION['loginuser']) && $_SESSION['loginuser']['role_id']==2) {
  
  include 'include/backend_header.php'; 
  include 'include/backend_sidebar.php';
  include 'dbconnect.php';

  $voucherno=$_GET['voucherno'];

  $sql="SELECT orderdetails.*,items.name as item_name FROM orderdetails INNER JOIN items ON orderdetails.item_id=items.id WHERE orderdetails.voucherno=:voucherno";
  $stmt=$pdo->prepare($sql);
  $stmt->bindParam(':voucherno',$voucherno);
  $stmt->execute();
  $orderdetails = $stmt->fetchAll();
  print_r($orderdetails);die();


?>

<!-- Begin Page Content -->
<div class="container-fluid">

	<!-- Page Heading -->
	<div class="d-sm-flex align-items-center justify-content-between mb-4">
		<h1 class="h3 mb-0 text-gray-800">Order List</h1>
		<a href="index.php" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i class="fas fa-backward fa-sm text-white-50"></i> Dashboard</a>
	</div>
</div>


<?php 
  include 'include/backend_footer.php'; 
  }else{
    header("location:../index.php");
  }
?>