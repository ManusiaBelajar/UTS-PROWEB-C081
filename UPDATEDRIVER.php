<?php
    include('KONEKSI.php');
    $status = '';
    $result = '';
    if ($_SERVER['REQUEST_METHOD'] === 'GET') {
        if (isset($_GET['id'])) {
            $idDriver = $_GET['id'];
            $query = "SELECT * FROM driver WHERE id_driver = $idDriver";

            $result = mysqli_query(connection(),$query);
        }
    }
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $idDriver = $_POST['id_driver'];
        $nama = $_POST['nama'];
        $noSIM = $_POST['no_sim'];
        $alamat = $_POST['alamat'];

        $sql = "UPDATE driver SET id_driver='$idDriver', nama='$nama', no_sim='$noSIM', alamat='$alamat' WHERE idDriver=$idDriver";

        $result = mysqli_query(connection(),$sql);
        if ($result) {
            $status = 'okay';
        } else {
            $status = 'error';
        }
        header('Location: TAMPILAN.php?status='.$status);
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>TAMPILAN</title>
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
                <a href="TRANS.php"><button>Data Trans Bus UPN</button></a>
              </li>
              <li>
                <a href="DRIVER.php"><button>Data Driver</button></a>
              </li>
              <li>
                  <a href="BUS.php"><button>Data Bus</button></a>
              </li>
              <li>
                  <a href="KONDEKTUR.php"><button>Data Kondektur</button></a>
              </li>
            </ul>
          </div>
        </nav>
            <main role="main">
                <?php
                    if ($status == 'okay') {
                        echo '<br><br><div role="alert">ID Driver berhasil disimpan</div>';
                    } elseif ($status == 'error') {
                        echo '<br><br><div role="alert">ID Driver gagal disimpan</div>';
                    }
                ?>
                <h2 style="margin: 30px 0 30px;">Update Data Driver</h2>
                <form action="updateDriver.php" method="POST">
                    <?php while($data = mysqli_fetch_array($result)): ?>
                    <div>
                        <label>ID Driver</label>
                        <input type="text" placeholder="driver" value="<?= $data['id_driver'] ?>" name="id_driver" required="required">
                    </div>
                    <div>
                        <label>Nama</label>
                        <input type="text" placeholder="nama" value="<?= $data['nama'] ?>" name="nama" required="required">
                    </div>
                    <div>
                        <label>NO SIM</label>
                        <input type="text" placeholder="no SIM" value="<?= $data['no_sim'] ?>" name="no_sim" required="required">
                    </div>
                    <div>
                        <label>Alamat</label>
                        <input type="text" placeholder="alamat" value="<?= $data['alamat'] ?>" name="alamat" required="required">
                    </div>
                    <?php endwhile ?>
                    <button type="submit">Save</button>
                </form>
            </main>
        </div>
    </div>
</body>
</html>