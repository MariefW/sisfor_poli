<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="favicon.ico">
    <title>JAMINAN PEMBAYARAN</title>
    <!-- Bootstrap core CSS -->
    <link href="dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
    <link href="assets/css/ie10-viewport-bug-workaround.css" rel="stylesheet">
    <!-- Custom styles for this template -->
    <link href="dashboard.css" rel="stylesheet">
    <!-- Just for debugging purposes. Don't actually copy these 2 lines! -->
    <!--[if lt IE 9]><script src="../../assets/js/ie8-responsive-file-warning.js"></script><![endif]-->
    <script src="assets/js/ie-emulation-modes-warning.js"></script>
    <link rel="stylesheet" type="text/css" href="dashboard.css">
    <link rel="stylesheet" type="text/css" href="style.css">
      <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
  </head>
  <body>
    <nav class="navbar navbar-inverse navbar-fixed-top">
      <div class="container-fluid">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="navbar-brand" href="index.php">Poliklinik NADYA</a>
        </div>
      </div>
    </nav>
    <div class="container-fluid">
      <div class="row">
        <div class="col-sm-3 col-md-2 sidebar">
          <ul class="nav nav-sidebar">
            <li><a href="index.php">Home</a></li>
            <li><a href="pasien.php">Pasien</a></li>
            <li><a href="poli.php">Poliklinik</a></li>
            <li class="active"><a href="jaminan_pembayaran.php">Jaminan Pembayaran<span class="sr-only">(current)</span></a></li>
            <li><a href="pendaftaran_pasien.php">Pendaftaran Pasien</a></li>
          </ul>
        </div>
        <div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
          <h1 class="page-header">Daftar Jaminan Pembayaran</h1>

          <div class="table-responsive">
           <?php include("koneksi.php"); ?>
  <nav>
    <a href="tambah_jaminan.php">[+] Tambah Data Baru</a>
  </nav>
  <br>
  <table class="table table-striped">
  <thead>
    <tr>
      <th>No</th>
      <th>Jaminan Pembayaran</th>
      <th>Tindakan</th>
    </tr>
  </thead>
  <tbody>
    <?php
    $sql = "SELECT * FROM pembayaran";
    $query = mysqli_query($db, $sql);
    $no=1;
    while($pembayaran = mysqli_fetch_array($query)){
      echo "<tr>";
      echo "<td></td>";
      echo "<td>".$pembayaran['jaminan_pembayaran']."</td>";
      echo "<td><a href='edit_jaminan.php?id=".$pembayaran['id']."'class='btn btn-success'>Edit</button></a> | ";
      echo "<a href='hapus_jaminan.php?id=".$pembayaran['id']."'class='btn btn-danger'>Hapus</a></td>";
      echo "</td>";
      $no++;
    }
    ?>
  </tbody>
  <p>Total Data: <?php echo mysqli_num_rows($query) ?></p>
          </div>
        </div>
      </div>
    </div>
    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <script>window.jQuery || document.write('<script src="assets/js/vendor/jquery.min.js"><\/script>')</script>
    <script src="dist/js/bootstrap.min.js"></script>
    <!-- Just to make our placeholder images work. Don't actually copy the next line! -->
    <script src="assets/js/vendor/holder.min.js"></script>
    <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
    <script src="assets/js/ie10-viewport-bug-workaround.js"></script>
    <footer>
     <p>Nadya Mutiara Millenia - 183112706450173</p>
    </footer>
  </body>
</html>
