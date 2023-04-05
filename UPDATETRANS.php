<?php
    include('KONEKSI.php');

    $status = '';
    $result = '';
    if ($_SERVER['REQUEST_METHOD'] === 'GET') {
        if (isset($_GET['id'])) {
            $idTransUPN_update = $_GET['id'];
            $query = "SELECT * FROM trans_upn WHERE id_trans_upn = $idTransUPN_update";

            $result = mysqli_query(connection(),$query);
        }
    }

    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $idTransUPN = $_POST['id_trans_upn'];
        $idKondektur = $_POST['id_kondektur'];
        $idBus = $_POST['id_bus'];
        $idDriver = $_POST['id_driver'];
        $jumlahKM = $_POST['jumlah_km'];
        $tanggal = $_POST['tanggal'];

        $sql = "UPDATE trans_upn SET id_trans_upn='$idTransUPN', id_kondektur='$idKondektur', id_bus='$idBus', id_driver='$idDriver',jumlah_km='$jumlahKM', tanggal='$tanggal' WHERE id_trans_upn=$idTransUPN";

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
                <a href="TAMBAHTRANS.php"><button>Data Trans Bus UPN</button></a>
              </li>
              <li>
                <a href="TAMBAHDRIVER.php"><button>Data Driver</button></a>
              </li>
              <li>
                  <a href="TAMBAHBUS.php"><button>Data Bus</button></a>
              </li>
              <li>
                  <a href="TAMBAHKONDEKTUR.php"><button>Data Kondektur</button></a>
              </li>
            </ul>
          </div>
        </nav>
            <main role="main">
                <?php
                    if ($status == 'okay') {
                        echo '<br><br><div role="alert">ID Trans BUS berhasil disimpan</div>';
                    } elseif ($status == 'error') {
                        echo '<br><br><div role="alert">ID Trans BUS gagal disimpan</div>';
                    }
                ?>
                <h2 style="margin: 30px 0 30px;">Update Data Trans Bus</h2>
                <form action="updateTrans.php" method="POST">
                    <?php while($data = mysqli_fetch_array($result)): ?>
                    <div>
                        <label>ID Trans UPN</label>
                        <input type="text" placeholder="Intinya Angka" value="<?= $data['id_trans_upn'] ?>" name="id_trans_upn" required="required">
                    </div>
                    <div>
                        <label>ID Kondektur</label>    
                        <input type="text" placeholder="Angka Acak" value="<?= $data['id_kondektur'] ?>" name="id_kondektur" required="required">
                    </div>
                    <div>
                        <label>ID BUS</label>
                        <input type="text" placeholder="Angka Acak" value="<?= $data['id_bus'] ?>" name="id_bus" required="required">
                    </div>
                    <div>
                        <label>ID Driver</label>
                        <input type="text" placeholder="Acak Wes" value="<?= $data['id_driver'] ?>" name="id_driver" required="required">
                    </div>
                    <div>
                        <label>Jumlah KM</label>
                        <input type="text" placeholder="Angka KM" value="<?= $data['jumlah_km'] ?>" name="jumlah_km" required="required">
                    </div>
                    <div>
                        <label>Tanggal</label>
                        <input type="text" placeholder="2022-11-16" value="<?= $data['tanggal'] ?>" name="tanggal" required="required">
                    </div>
                    <?php endwhile ?>
                    <button type="submit">Save</button>
                </form>
            </main>
        </div>
    </div>
</body>
</html>