<?php
include("koneksi.php");
// kalau tidak ada id di query string
if( !isset($_GET['id']) ){
    header('Location: jaminan_pembayaran.php');
}
//ambil id dari query string
$id = $_GET['id'];
// buat query untuk ambil data dari database
$sql = "SELECT * FROM pembayaran WHERE id=$id";
$query = mysqli_query($db, $sql);
$pembayaran = mysqli_fetch_assoc($query);
// jika data yang di-edit tidak ditemukan
if( mysqli_num_rows($query) < 1 ){
    die("data tidak ditemukan...");
}
?>
<!DOCTYPE html>
<html>
<head>
    <title>Edit Data Jaminan Pembayaran</title>

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
        <h3 style="text-align:center">Edit Data Jaminan Pembayaran</h3>
    </header>
    <form action="" method="POST">
        <fieldset>
            <input type="hidden" name="id" value="<?php echo $pembayaran['id'] ?>" />
        <p>
            <label for="nama">Nama Jaminan Pembayaran: </label>
            <input type="text" name="pembayaran" value="<?php echo $pembayaran['jaminan_pembayaran'] ?>" />
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
    $namaPembayaran = $_POST['pembayaran'];
    // buat query update
    $sql = "UPDATE pembayaran SET jaminan_pembayaran='$namaPembayaran' WHERE id=$id";
    $query = mysqli_query($db, $sql);
    // apakah query update berhasil?
    if( $query ) {
        // kalau berhasil alihkan ke halaman list-siswa.php
        header('Location: jaminan_pembayaran.php');
    } else {
        // kalau gagal tampilkan pesan
        die("Gagal menyimpan perubahan...");
    }
}
?>
