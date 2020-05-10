<?php
include("koneksi.php");

$sql1 = "SELECT * FROM poliklinik";
$query1 = mysqli_query($db, $sql1);
$sql2 = "SELECT * FROM pembayaran";
$query2 = mysqli_query($db, $sql2);

// kalau tidak ada id di query string
if( !isset($_GET['id']) ){
  echo "<script> location.href='pendaftaran_pasien.php'; </script>";
  exit;
}
//ambil id dari query string
$id = $_GET['id'];
// buat query untuk ambil data dari database
$sql = "SELECT * FROM pasien WHERE id=$id";
$query = mysqli_query($db, $sql);
$pasien = mysqli_fetch_assoc($query);
// jika data yang di-edit tidak ditemukan
if( mysqli_num_rows($query) < 1 ){
    die("data tidak ditemukan...");
}
?>
<!DOCTYPE html>
<html>
<head>
    <title>Edit Data Pasien</title>

    <style type="text/css">
                    input, textarea {
                        padding: 0; margin: 0;
                    }
                    h2{
                        color:#50626C;
                        text-align: center;
                        font-family: arial;
                        text-transform: uppercase;
                        border: 3px solid #f1f1f1;
                        padding: 5px;
                        width: 490px;
                        margin: auto;
                        margin-bottom: 10px;
                        margin-top: 20px;
                    }
                    form {
                        border: 3px solid #f1f1f1;
                        font-family: arial;
                        width: 500px;
                        margin: auto;
                    }

                    input[type=text], input[type=password] {
                        width: 100%;
                        padding: 12px 20px;
                        margin: 8px 0;
                        display: inline-block;
                        border: 1px solid #ccc;
                        box-sizing: border-box;
                    }
                    label{
                        color:#50626C;
                        text-transform: uppercase;
                    }
                    button {
                        background-color: #049372;
                        color: white;
                        padding: 14px 20px;
                        margin: 8px 0;
                        border: none;
                        cursor: pointer;
                        width: 100%;
                    }

                    button:hover {
                        opacity: 0.8;
                    }

                    .cancelbtn {
                        width: auto;
                        padding: 10px 18px;
                        background-color: #f03434;
                    }

                    .imgcontainer {
                        text-align: center;
                        margin: 24px 0 12px 0;
                    }

                    img.avatar {
                        width: 40%;
                        border-radius: 50%;
                    }

                    .container {
                        padding: 16px;
                    }

                    span.psw {
                        float: right;
                        padding-top: 16px;

                    }
                    span{
                        color:#50626C;
                    }
                    /* Change styles for span and cancel button on extra small screens */
                    @media screen and (max-width: 300px) {
                        span.psw {
                           display: block;
                           float: none;
                        }
                        .cancelbtn {
                           width: 100%;
                        }
                    }
            </style>


</head>
<body>
    <header>
        <h3 style="text-align:center">Edit Data Poliklinik</h3>
    </header>
    <form action="" method="POST">
        <fieldset>
            <input type="hidden" name="id" value="<?php echo $pasien['id'] ?>" />

        <p>
            <label for="nama">Nama : </label>
            <input type="text" name="nama" value="<?php echo $pasien['nama'] ?>"/>
        </p>
      <p>
          <label for="nama">Poliklinik : </label>
          <select name="poli" require>
            <?php
            while($poli = mysqli_fetch_array($query1)){
              ?>
              <option value="<?php echo $poli['poli'] ?>"><?php echo $poli['poli'] ?></option>
              <?php
            }
             ?>
          </select>
      </p>
      <p>
          <label for="nama">Jaminan Pembayaran : </label>
          <select name="jam_pemb" require>
            <?php
            while($pembayaran = mysqli_fetch_array($query2)){
              ?>
              <option value="<?php echo $pembayaran['jaminan_pembayaran'] ?>"><?php echo $pembayaran['jaminan_pembayaran'] ?></option>
              <?php
            }
             ?>

          </select>
      </p>
      <p>
          <label for="jenis_kelamin">Jenis Kelamin  : </label>
          <label><input type="radio" name="jenis_kelamin" value="laki-laki" required> Laki-laki</label>
          <label><input type="radio" name="jenis_kelamin" value="perempuan" required> Perempuan</label>
      </p>
      <p>
          <label for="nama">Tgl. Kunjungan : </label>
          <input type="date" name="tgl_kunjungan" value="<?php echo $pasien['tgl_kunjungan'] ?>"/>
      </p>
        <p>
            <input type="submit" value="Simpan" name="simpan" />
        </p>
        </fieldset>
    </form>
    </body>
</html>

<?php
include("koneksi.php");
// cek apakah tombol simpan sudah diklik atau blum?
if(isset($_POST['simpan'])){
    // ambil data dari formulir
    $nama = $_POST['nama'];
    $polik = $_POST['poli'];
    $jam_pemb = $_POST['jam_pemb'];
    $jk = $_POST['jenis_kelamin'];
    $kunjungan = $_POST['tgl_kunjungan'];
    // buat query update
    $sql = "UPDATE pasien SET nama='$nama',jenis_kelamin='$jk', poli='$polik', jaminan_pembayaran='$jam_pemb',tgl_kunjungan='$kunjungan' WHERE id=$id";
    $query = mysqli_query($db, $sql);
    // apakah query update berhasil?
    if( $query ) {
        // kalau berhasil alihkan ke halaman list-siswa.php
        echo "<script> location.href='pendaftaran_pasien.php'; </script>";
        exit;
    } else {
        // kalau gagal tampilkan pesan
        die("Gagal menyimpan perubahan...");
    }
}
?>
