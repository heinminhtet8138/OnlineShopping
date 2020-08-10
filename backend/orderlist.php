<?php 
  session_start();
  if (isset($_SESSION['loginuser']) && $_SESSION['loginuser']['role_id']==2) {
  
  include 'include/backend_header.php'; 
  include 'include/backend_sidebar.php';

  include 'dbconnect.php';

  $num=1;

  $sql="SELECT orders.*,users.name as user_name FROM orders INNER JOIN users ON orders.user_id=users.id WHERE orders.status=:num";
  $stmt=$pdo->prepare($sql);
  $stmt->bindParam(':num',$num);
  $stmt->execute();
  $orders=$stmt->fetchAll();

?>

<!-- Begin Page Content -->
<div class="container-fluid">

	<!-- Page Heading -->
	<div class="d-sm-flex align-items-center justify-content-between mb-4">
		<h1 class="h3 mb-0 text-gray-800">Order List</h1>
		<a href="index.php" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i class="fas fa-backward fa-sm text-white-50"></i> Dashboard</a>
	</div>

  <div class="container-fluid">

    <!-- DataTales Example -->
    <div class="card shadow mb-4">
      <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">Order List</h6>
      </div>
      <div class="card-body">
        <div class="table-responsive">
          <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
            <thead>
              <tr>
                <th>Voucher No</th>
                <th>Name</th>
                <th>Total</th>
                <th>Order Date</th>
                <th>Notes</th>
                <th>Action</th>
              </tr>
            </thead>
            <tfoot>
              <tr>
                <th>Voucher No</th>
                <th>Name</th>
                <th>Total</th>
                <th>Order Date</th>
                <th>Notes</th>
                <th>Action</th>
              </tr>
            </tfoot>
            <tbody>
              <?php 
                foreach ($orders as $order) {
              ?>

                <tr>
                  <td><?= $order['voucherno'] ?></td>
                  <td><?= $order['user_name'] ?></td>
                  <td><?= $order['total'] ?></td>
                  <td><?= $order['orderdate'] ?></td>
                  <td><?= $order['note'] ?></td>
                  <td>
                    <a href="confirm.php?id=<?= $order['id'] ?>" class="btn btn-primary btn-sm">Confirm</a>
                    <a href="orderdetail.php?voucherno=<?= $order['voucherno'] ?>" class="btn btn-info btn-sm">Detail</a>
                  </td>
                </tr>



              <?php
                }
              ?>
            </tbody>
          </table>
        </div>
      </div>
    </div>

  </div>


</div>


<?php 
  include 'include/backend_footer.php'; 
  }else{
    header("location:../index.php");
  }
?>