<?php
    include('KONEKSI.php');
    $status = '';
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $idKondektur = $_POST['id_kondektur'];
        $nama = $_POST['nama'];

        $query = "INSERT INTO kondektur VALUES ('$idKondektur','$nama')";
        echo $query;
        $result = mysqli_query(connection(),$query);
        if ($result) {
            $status = 'okay';
        } else {
            $status = 'error';
        }
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah Kondektur Trans UPN</title>
</head>
<body>
    <nav>
      <h1>BUS TRANS UPN</h1>
    </nav>
    <div>
      <div>
        <nav>
          <div>
            <ul style="margin-top:100px;">
              <li>
                <a href="TAMPILAN.php"><button>Data Trans Bus UPN</button></a>
              </li>
              <li>
                <a href="DRIVER.php"><button>Data Driver</button></a>
              </li>
              <li>
                  <a href="BUS.php"><button>Data Driver</button></a>
              </li>
              <li>
                  <a href="KONDEKTUR.php"><button>Data Kondektur</button></a>
              </li>
              <li>
                  <a href="TAMBAHTRANS.php"><button>Tambah Data Trans UPN</button></a>
              </li>
              <li>
                  <a href="TAMBAHKONDEKTUR.php"><button>Tambah Data Kondektur</button></a>
              </li>
              <li>
                  <a href="TAMBAHDRIVER.php"><button>Tambah Data Driver</button></a>
              </li>
              <li>
                  <a href="TAMBAHBUS.php"><button>Tambah Data BUS</button></a>
              </li>
              <li>
                  <a href="GAJI.php"><button>Menghitung Gaji</button></a>
              </li>
            </ul>
          </div>
        </nav>
        <main role="main">
          <?php 
            if (@$_GET['status']!==NULL) {
              $status = $_GET['status'];
              if ($status=='okay') {
                echo '<br><br><div>]ID Kondektur UPN berhasil di-perbarui</div>';
              }
              else if ($status=='error'){
                echo '<br><br><div role="alert">ID Kondektur UPN gagal di-perbarui</div>';
              }
            }
           ?>
                <h2 style="margin: 30px 0 30px;">MENAMBAH DATA KONDEKTUR TRANS UPN</h2>
                <form action="TAMBAHKONDEKTUR.php" method="POST">
                    <div>
                        <label>ID Kondektur</label>
                        <input type="text" placeholder="Kondektur" name="id_kondektur" required="required">
                    </div>
                    <div>
                        <label>Nama</label>
                        <input type="text" placeholder="BUS" name="nama" required="required">
                    </div>
                    <button type="submit">Simpan</button>
                </form>
            </main>
        </div>
    </div>
</body>
</html>