<?php 
  include ('KONEKSI.php'); 
?>
<!DOCTYPE html>
<html>
  <head>
    <title>UTS PEMWEB</title>
    <link rel="stylesheet" href="EDIT.css">
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
                  <a href="BUS.php"><button>Data Bus</button></a>
              </li>
              <li>
                  <a href="KONDEKTUR.php"><button>Data Kondektur</button></a>
              </li>
              <li>
                  <a href="TAMBAHTRANS.php"><button>Tambah Data Trans UPN<</button></a>
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
          <form action="" method="GET">
                <label for="">Status</label>
                <select name="statusbus" id="statusbus" required>
                    <option value="">Pilih</option>
                    <option value="1">Beroperasi</option>
                    <option value="2">Cadangan</option>
                    <option value="0">Rusak</option>
                </select>
                <button type="submit">Pilih</button>
            </form>
            <?php 
            if(isset($_GET['status_bus'])){
                $status_bus = $_GET['status_bus'];
                $query = "SELECT * FROM bus WHERE status = '$status_bus'";
            }else{
                $query = "SELECT * FROM bus";
            }
              $result = mysqli_query(connection(),$query);
             ?>
          <?php 
            if (@$_GET['status']!==NULL) {
              $status = $_GET['status'];
              if ($status=='okay') {
                echo '<br><br><div>ID BUS berhasil di-perbarui</div>';
              }
              else if ($status=='error'){
                echo '<br><br><div role="alert">ID BUS gagal di-perbarui</div>';
              }
            }
           ?>
          <h2 style="margin: 30px 0 30px 0;">Tabel BUS Trans UPN</h2>
          <div>
            <table border="1">
              <thead>
                <tr>
                  <th>ID BUS</th>
                  <th>PLAT</th>
                  <th>Status</th>
                  <th>Action</th>
                </tr>
              </thead>
              <tbody>
                <?php 
                  //proses menampilkan data dari database:
                  //siapkan query SQL
                  $query = "SELECT * FROM bus";
                  $result = mysqli_query(connection(),$query);
                 ?>

                 <?php while($data = mysqli_fetch_array($result)): ?>
                  <tr>
                    <td><?php echo $data['id_bus'];  ?></td>
                    <td><?php echo $data['plat'];  ?></td>
                    <td class="status_<?php if ($data['status'] == 1){ echo 'beroperasi';} elseif ($data['status'] == 2) { echo 'cadangan';} elseif ($data['status'] == 0){ echo 'rusak';} ?>">
                    <?php echo $data['status'];  ?></td>
                    <td>
                      <a href="<?php echo "HAPUSBUS.php?id=".$data['id_bus']; ?>"> <button>Delete</button></a>
                      &nbsp;&nbsp;
                      <a href="<?php echo "UPDATEBUS.php?id=".$data['id_bus']; ?>"> <button>Update</button></a>
                    </td>
                  </tr>
                 <?php endwhile ?>
              </tbody>
            </table>
          </div>
        </main>
      </div>
    </div>

  </body>
</html>