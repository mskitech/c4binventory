<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <div class="content-header">
    <div class="container-fluid mt-5">
      <div class="row">
        <div class="col-md-6">
          <h1 class="m-0 text-dark">Purchase List</h1>
        </div>
        <div class="col-md-6 mt-3">
          <ol class="breadcrumb float-right">
            <li class="breadcrumb-item"><a href="index.php?page=dashboard">Home</a></li>
            <li class="breadcrumb-item active">Purchase List</li>
          </ol>
        </div>
      </div>
    </div>
  </div>

  <!-- Main content -->
  <section class="content">
    <div class="container-fluid">

      <!-- Info Boxes -->
      <div class="card">
        <div class="card-body">
          <div class="row">

            <div class="col-12 col-sm-6 col-md-4">
              <div class="info-box bg-success mb-3">
                <div class="info-box-content">
                  <span class="info-box-text">Total Purchase Amount</span>
                  <span class="info-box-number">
                    <?php
                      $stmt = $pdo->prepare("SELECT SUM(`purchase_subtotal`) FROM `purchase_products`");
                      $stmt->execute();
                      $res = $stmt->fetch(PDO::FETCH_NUM);
                      echo number_format($res[0] ?? 0);
                    ?>
                  </span>
                </div>
                <span class="info-box-icon"><i class="material-symbols-outlined">sell</i></span>
              </div>
            </div>

            <div class="col-12 col-sm-6 col-md-4">
              <div class="info-box bg-danger mb-3">
                <div class="info-box-content">
                  <span class="info-box-text">Total Paid Amount</span>
                  <span class="info-box-number">
                    <?php
                      $stmt = $pdo->prepare("SELECT SUM(`paid_amount`) FROM `invoice`");
                      $stmt->execute();
                      $res = $stmt->fetch(PDO::FETCH_NUM);
                      echo number_format($res[0] ?? 0);
                    ?>
                  </span>
                </div>
                <span class="info-box-icon"><i class="material-symbols-outlined">paid</i></span>
              </div>
            </div>

            <div class="col-12 col-sm-6 col-md-4">
              <div class="info-box bg-info mb-3">
                <div class="info-box-content">
                  <span class="info-box-text">Total Due Amount</span>
                  <span class="info-box-number">
                    <?php
                      $stmt = $pdo->prepare("SELECT SUM(`due_amount`) FROM `invoice`");
                      $stmt->execute();
                      $res = $stmt->fetch(PDO::FETCH_NUM);
                      echo number_format($res[0] ?? 0);
                    ?>
                  </span>
                </div>
                <span class="info-box-icon"><i class="material-symbols-outlined">money</i></span>
              </div>
            </div>

          </div>
        </div>
      </div>

      <!-- Purchase Table -->
      <div class="card">
        <div class="card-header">
          <h3 class="card-title"><b>Total Product List</b></h3>
          <a href="index.php?page=add_product" target="_blank" class="btn btn-primary btn-sm float-right rounded-0">
            <i class="fas fa-plus"></i> New Product
          </a>
        </div>
        <div class="card-body">
          <div class="table-responsive">
            <table id="purchaseTable" class="display dataTable text-center" style="width:100%">
              <thead>
                <tr>
                  <th>Id</th>
                  <th>Product Name</th>
                  <th>Purchase Date</th>
                  <th>Quantity</th>
                  <th>Purchase Price</th>
                  <th>Sell Price</th>
                  <th>Purchase Total</th>
                  <th>Due Bill</th>
                  <th>Return Status</th>
                  <th>Action</th>
                </tr>
              </thead>
              <!-- DataTables server-side loading -->
            </table>
          </div>
        </div>
      </div>

    </div>
  </section>
</div>
