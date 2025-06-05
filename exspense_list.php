<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <div class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1 class="m-0 text-dark"><!-- Dashboard v2 --></h1>
        </div><!-- /.col -->
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="#">Home</a></li>
            <li class="breadcrumb-item active">Expense Category</li>
          </ol>
        </div><!-- /.col -->
      </div><!-- /.row -->
    </div><!-- /.container-fluid -->
  </div>
  <!-- /.content-header -->

  <!-- Main content -->
  <section class="content">
    <div class="container-fluid">

      <div class="row">
        <div class="col-12 col-sm-6 col-md-4">
          <div class="info-box bg-success">
            <div class="info-box-content">
              <span class="info-box-text">Total Expense</span>
              <span class="info-box-number">
                <?php 
                  $stmt = $pdo->prepare("SELECT SUM(`amount`) FROM `expense`");
                  $stmt->execute();
                  $res = $stmt->fetch(PDO::FETCH_NUM);
                  // Format total with commas and 2 decimals
                  echo number_format($res[0], 2);
                ?>
              </span>
            </div>
            <span class="info-box-icon"><i class="material-symbols-outlined">local_atm</i></span>
            <!-- /.info-box-content -->
          </div>
          <!-- /.info-box -->
        </div>
      </div>
      <!-- /.row -->

      <div class="card">
        <div class="card-header">
          <h3 class="card-title"><b>All Expense Category</b></h3>
          <a href="index.php?page=add_expense" class="btn btn-primary btn-sm float-right rounded-0">Add Expense</a>
        </div>
        <!-- /.card-header -->
        <div class="card-body">
          <div class="table-responsive">
            <table id="expenseList" class="display dataTable text-center" style="width:100%">
              <thead>
                <tr>
                  <th>SI</th>
                  <th>Expense Date</th>
                  <th>Expense For</th>
                  <th>Expense Amount</th>
                  <th>Expense Category</th>
                  <th>Expense Description</th>
                  <th>Action</th>
                </tr>
              </thead>
            </table>
          </div>
        </div>
      </div>
      <!-- /.card -->

    </div><!-- /.container-fluid -->
  </section>
  <!-- /.content -->
</div>
<!-- /.content-wrapper -->

<!-- DataTables script (Make sure jQuery and DataTables JS/CSS are included in your page) -->
<script>
  $(document).ready(function() {
    $('#expenseList').DataTable({
      "processing": true,
      "serverSide": true,
      "ajax": {
        "url": "expense_data.php", // your updated PHP script for data fetching
        "type": "POST"
      },
      "columns": [
        { 
          "data": null,
          "render": function (data, type, row, meta) {
            return meta.row + meta.settings._iDisplayStart + 1; // Serial number
          }
        },
        { "data": "ex_date" },
        { "data": "expense_for" },
        { 
          "data": "amount",
          "render": function(data, type, row) {
            return data; // Already formatted in PHP as comma separated
          }
        },
        { "data": "expense_cat" },
        { "data": "ex_description" },
        { "data": "action", "orderable": false, "searchable": false }
      ],
      "order": [[1, "desc"]]
    });
  });
</script>
