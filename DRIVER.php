<?php 
  include ('KONEKSI.php'); 
?>
<!DOCTYPE html>
<html>
  <head>
    <title>UTS PEMWEB</title>
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
                  <a href="TAMBAHTRANS.php"><button>Tambah Data Trans UPN</button></a>
              </li>
              <li>
                  <a href="TAMBAHKONDEKTUR.php"><button>Tambah Data Kondektur</button></a>
              </li>
              <li>
                  <a href="TAMBAHDRIVER.php"><button>Tambah Data Driver</button></a>
              </li>
              <li>
                  <a href="TAMBAHBUS.php"><button>Tambah Data bus</button></a>
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
                echo '<br><br><div>ID Driver berhasil di-update</div>';
              }
              else if ($status=='error'){
                echo '<br><br><div role="alert">ID Driver gagal di-update</div>';
              }
            }
           ?>
          <h2 style="margin: 30px 0 30px 0;">Tabel Trans UPN</h2>
          <div>
            <table border="1">
              <thead>
                <tr>
                  <th>ID Driver</th>
                  <th>NO SIM</th>
                  <th>Nama</th>
                  <th>Alamat</th>
                  <th>Action</th>
                </tr>
              </thead>
              <tbody>
                <?php 
                  $query = "SELECT * FROM driver";
                  $result = mysqli_query(connection(),$query);
                 ?>
                 <?php while($data = mysqli_fetch_array($result)): ?>
                  <tr>
                    <td><?php echo $data['id_driver'];  ?></td>
                    <td><?php echo $data['no_sim'];  ?></td>
                    <td><?php echo $data['nama'];  ?></td>
                    <td><?php echo $data['alamat'];  ?></td>
                    <td>
                      <a href="<?php echo "HAPUSDRIVER.php?id=".$data['id_driver']; ?>"> <button>Delete</button></a>
                      &nbsp;&nbsp;
                      <a href="<?php echo "TAMBAHDRIVER.php?id=".$data['id_driver']; ?>"> <button>Update</button></a>
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
