<!DOCTYPE html>
<html>
<head>
  <?php
  include("koneksi.php");

  $sql1 = "SELECT * FROM poliklinik";
  $query1 = mysqli_query($db, $sql1);
  $sql2 = "SELECT * FROM pembayaran";
  $query2 = mysqli_query($db, $sql2);
  ?>
    <title>MASUKAN DATA PASIEN</title>
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
        <h3 style="text-align:center">Data Pasien</h3>
    </header>
    <form action="" method="POST">
        <fieldset>

          <p>
              <label for="nama">Nama : </label>
              <input type="text" name="nama" required/>
          </p>
        <p>
            <label for="nama">Alamat : </label>
            <input type="text" name="alamat" required/>
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
            <label for="nama">No. Telp : </label>
            <input type="number" id="phone" name="telp" required>
        </p>
        <p>
            <label for="nama">Tgl. Lahir : </label>
            <input type="date" name="tgl_lahir" required/>
        </p>
        <p>
            <label for="jenis_kelamin">Jenis Kelamin  : </label>
            <label><input type="radio" name="jenis_kelamin" value="laki-laki"> Laki-laki</label>
            <label><input type="radio" name="jenis_kelamin" value="perempuan"> Perempuan</label>
        </p>
        <p>
            <label for="nama">Tgl. Kunjungan : </label>
            <input type="date" name="tgl_kunjungan" required/>
        </p>
        <p>
            <input type="submit" value="Tambah" name="daftar" />
        </p>
        </fieldset>
    </form>
    </body>
</html>

<?php
// cek apakah tombol daftar sudah diklik atau blum?
if(isset($_POST['daftar'])){
    // ambil data dari formulir
    // $id = $_POST['id'];
    $nama = $_POST['nama'];
    $alamat = $_POST['alamat'];
    $telp = $_POST['telp'];
    $polik = $_POST['poli'];
    $jam_pemb = $_POST['jam_pemb'];
    $lahir = $_POST['tgl_lahir'];
    $jk = $_POST['jenis_kelamin'];
    $kunjungan = $_POST['tgl_kunjungan'];
    // buat query
    $sql = "INSERT INTO pasien (nama, alamat, telp, tgl_lahir, jenis_kelamin, poli, jaminan_pembayaran, tgl_kunjungan) VALUE ('$nama', '$alamat', '$telp', '$lahir', '$jk', '$polik', '$jam_pemb', '$kunjungan')";
    $query = mysqli_query($db, $sql);
    // apakah query simpan berhasil?
    if( $query ) {
        // kalau berhasil alihkan ke halaman index.php dengan status=sukses
        echo "<script> location.href='pendaftaran_pasien.php'; </script>";
        exit;
    } else {
        // kalau gagal alihkan ke halaman indek.php dengan status=gagal
        echo "<script> location.href='pendaftaran_pasien.php'; </script>";
        exit;
    }
}
?>
