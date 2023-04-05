<?php 
  include ('KONEKSI.php'); 
?>
<!DOCTYPE html>
<html>
  <head>
    <title>UTS PEMWEB</title>
    <link href="" rel="stylesheet">
    <link href="" rel="stylesheet">
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
                echo '<br><br><div>]ID Kondektur berhasil di-perbarui</div>';
              }
              else if ($status=='error'){
                echo '<br><br><div role="alert">ID Kondektur gagal di-perbarui</div>';
              }

            }
           ?>
          <h2 style="margin: 30px 0 30px 0;">Tabel Kondektur Trans UPN</h2>
          <div>
            <table border="1">
              <thead>
                <tr>
                  <th>ID Kondektur</th>
                  <th>Nama</th>
                  <th>Action</th>
                </tr>
              </thead>
              <tbody>
                <?php 
                  //proses menampilkan data dari database:
                  //siapkan query SQL
                  $query = "SELECT * FROM kondektur";
                  $result = mysqli_query(connection(),$query);
                 ?>
                 <?php while($data = mysqli_fetch_array($result)): ?>
                  <tr>
                    <td><?php echo $data['id_kondektur'];  ?></td>
                    <td><?php echo $data['nama'];  ?></td>
                    <td>
                      <a href="<?php echo "HAPUSKONDEKTUR.php?id=".$data['id_kondektur']; ?>"> <button>Delete</button></a>
                      &nbsp;&nbsp;
                      <a href="<?php echo "UPDATEKONDEKTUR.php?id=".$data['id_kondektur']; ?>"> <button>Update</button></a>
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
