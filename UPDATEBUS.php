<?php
    include('KONEKSI.php');
    $status = '';
    $result = '';
    if ($_SERVER['REQUEST_METHOD'] === 'GET') {
        if (isset($_GET['id'])) {
            $idBus = $_GET['id'];
            $query = "SELECT * FROM bus WHERE id_bus = $idBus";

            $result = mysqli_query(connection(),$query);
        }
    }

    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $idBus = $_POST['id_bus'];
        $plat = $_POST['plat'];
        $status = $_POST['status'];

        $sql = "UPDATE bus SET id_bus='$idBus', plat='$plat', 'status'='$status' WHERE id_bus=$idBus";

        $result = mysqli_query(connection(),$sql);
        if ($result) {
            $status = 'okay';
        } else {
            $status = 'error';
        }

        header('Location: BUS.php?status='.$status);
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
                <a href="TRANS.php">Data Trans Bus UPN</a>
              </li>
              <li>
                <a href="DRIVER.php">Data Driver</a>
              </li>
              <li>
                  <a href="BUS.php">Data Bus</a>
              </li>
              <li>
                  <a href="KONDEKTUR.php">Data Kondektur</a>
              </li>
            </ul>
          </div>
        </nav>
            <main role="main">
                <?php
                    if ($status == 'okay') {
                        echo '<br><br><div role="alert">ID BUS berhasil disimpan</div>';
                    } elseif ($status == 'error') {
                        echo '<br><br><div role="alert">ID BUS gagal disimpan</div>';
                    }
                ?>
                <h2 style="margin: 30px 0 30px;">Update Data Trans Bus</h2>
                <form action="updateBus.php" method="POST">
                    <?php while($data = mysqli_fetch_array($result)): ?>
                    <div>
                        <label>ID BUS</label>
                        <input type="text" placeholder="id bus" value="<?= $data['id_bus'] ?>" name="id_bus" required="required">
                    </div>
                    <div>
                        <label>PLAT</label>
                        <input type="text" placeholder="plat" value="<?= $data['plat'] ?>" name="plat" required="required">
                    </div>
                    <div>
                        <label>Status</label>
                        <input type="text" placeholder="status" value="<?= $data['status'] ?>" name="status" required="required">
                    </div>
                    <?php endwhile ?>
                    <button type="submit">Save</button>
                </form>
            </main>
        </div>
    </div>
</body>
</html>