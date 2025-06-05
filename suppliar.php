<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <div class="content-header">
    <div class="container-fluid mt-5">
      <div class="row">
        <div class="col-md-6">
          <h1 class="m-0 text-dark">Supplier</h1>
        </div>
        <div class="col-md-6 mt-3">
          <ol class="breadcrumb float-right">
            <li class="breadcrumb-item"><a href="index.php?page=dashboard">Home</a></li>
            <li class="breadcrumb-item active">Supplier</li>
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
              <div class="info-box bg-danger mb-3">
                <div class="info-box-content">
                  <span class="info-box-text">Total Transaction</span>
                  <span class="info-box-number">
                    <?php
                      $stmt = $pdo->prepare("SELECT SUM(`total_buy`) FROM `suppliar`");
                      $stmt->execute();
                      $res = $stmt->fetch(PDO::FETCH_NUM);
                      echo number_format($res[0] ?? 0);
                    ?>
                  </span>
                </div>
                <span class="info-box-icon"><i class="material-symbols-outlined">stacked_line_chart</i></span>
              </div>
            </div>

            <div class="col-12 col-sm-6 col-md-4">
              <div class="info-box bg-success mb-3">
                <div class="info-box-content">
                  <span class="info-box-text">Total Paid</span>
                  <span class="info-box-number">
                    <?php
                      $stmt = $pdo->prepare("SELECT SUM(`total_paid`) FROM `suppliar`");
                      $stmt->execute();
                      $res = $stmt->fetch(PDO::FETCH_NUM);
                      echo number_format($res[0] ?? 0);
                    ?>
                  </span>
                </div>
                <span class="info-box-icon"><i class="fas fa-money-bill-wave"></i></span>
              </div>
            </div>

            <div class="col-12 col-sm-6 col-md-4">
              <div class="info-box bg-info mb-3">
                <div class="info-box-content">
                  <span class="info-box-text">Total Due</span>
                  <span class="info-box-number">
                    <?php
                      $stmt = $pdo->prepare("SELECT SUM(`total_due`) FROM `suppliar`");
                      $stmt->execute();
                      $res = $stmt->fetch(PDO::FETCH_NUM);
                      echo number_format($res[0] ?? 0);
                    ?>
                  </span>
                </div>
                <span class="info-box-icon"><i class="material-symbols-outlined">paid</i></span>
              </div>
            </div>

          </div>
        </div>
      </div>

      <!-- Supplier Table -->
      <div class="card">
        <div class="card-header">
          <h3 class="card-title"><b>All Supplier Info</b></h3>
          <button type="button" class="btn btn-primary btn-sm float-right rounded-0" data-toggle="modal" data-target=".suppliarModal">
            <i class="fas fa-plus"></i> Add new
          </button>
        </div>
        <div class="card-body">
          <div class="table-responsive">
            <table id="suppliarTable" class="display dataTable text-center" style="width:100%">
              <thead>
                <tr>
                  <th>ID</th>
                  <th>Driver's Name</th>
                  <th>Company</th>
                  <th>Truck No. Plate</th>
                  <th>Contact</th>
                  <th>Total Buy</th>
                  <th>Total Paid</th>
                  <th>Total Due</th>
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
