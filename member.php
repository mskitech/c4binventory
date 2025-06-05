<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <div class="content-header">
    <div class="container-fluid mt-5">
      <div class="row">
        <div class="col-md-6">
          <h1 class="m-0 text-dark">Customer</h1>
        </div>
        <div class="col-md-6 mt-3">
          <ol class="breadcrumb float-right">
            <li class="breadcrumb-item"><a href="index.php?page=dashboard">Home</a></li>
            <li class="breadcrumb-item active">Customer</li>
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
                  <span class="info-box-text">Total transaction</span>
                  <span class="info-box-number">
                    <?php 
                      $stmt = $pdo->prepare("SELECT SUM(`total_buy`) FROM `member`");
                      $stmt->execute();
                      $res = $stmt->fetch(PDO::FETCH_NUM);
                      echo number_format($res[0]);
                    ?>
                  </span>
                </div>
                <span class="info-box-icon"><i class="material-symbols-outlined">stacked_line_chart</i></span>
              </div>
            </div>

            <div class="col-12 col-sm-6 col-md-4">
              <div class="info-box bg-success mb-3">
                <div class="info-box-content">
                  <span class="info-box-text">Total paid</span>
                  <span class="info-box-number">
                    <?php 
                      $stmt = $pdo->prepare("SELECT SUM(`total_paid`) FROM `member`");
                      $stmt->execute();
                      $res = $stmt->fetch(PDO::FETCH_NUM);
                      echo number_format($res[0]);
                    ?>
                  </span>
                </div>
                <span class="info-box-icon"><i class="material-symbols-outlined">paid</i></span>
              </div>
            </div>

            <div class="col-12 col-sm-6 col-md-4">
              <div class="info-box bg-info mb-3">
                <div class="info-box-content">
                  <span class="info-box-text">Total due</span>
                  <span class="info-box-number">
                    <?php 
                      $stmt = $pdo->prepare("SELECT SUM(`total_due`) FROM `member`");
                      $stmt->execute();
                      $res = $stmt->fetch(PDO::FETCH_NUM);
                      echo number_format($res[0]);
                    ?>
                  </span>
                </div>
                <span class="info-box-icon"><i class="material-symbols-outlined">assignment_add</i></span>
              </div>
            </div>

          </div>
        </div>
      </div>

      <!-- Customer Table -->
      <div class="card">
        <div class="card-header">
          <h3 class="card-title"><b>All Customer info</b></h3>
          <button type="button" class="btn btn-primary btn-sm float-right rounded-0" data-toggle="modal" data-target=".myModal"><i class="fas fa-plus"></i> Add new</button>
        </div>

        <div class="card-body">
          <div class="table-responsive">
            <table id="empTable" class="display dataTable text-center">
              <thead>
                <tr>
                  <th>ID</th>
                  <th>Customer Name</th>
                  <th>Business Name</th>
                  <th>Address</th>
                  <th>Contact</th>
                  <th>Total buy</th>
                  <th>Total paid</th>
                  <th>Total due</th>
                  <th>Action</th>
                </tr>
              </thead>
            </table>
          </div>
        </div>
      </div>

    </div>
  </section>
</div>

<!-- JavaScript DataTable Initialization -->
<script>
$(document).ready(function () {
  $('#empTable').DataTable({
    "processing": true,
    "serverSide": true,
    "ajax": "app/ajax/member_data.php", // your server-side script
    "columnDefs": [
      {
        "targets": [5, 6, 7], // Columns: Total buy, Total paid, Total due
        "render": function (data, type, row) {
          if (type === 'display' && !isNaN(data)) {
            return new Intl.NumberFormat().format(data);
          }
          return data;
        }
      }
    ]
  });
});
</script>
