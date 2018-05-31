<!DOCTYPE html>
<html lang="en">

  <head>

    <?php require 'header.php'; ?>
    <style type="text/css">
      a.btn.disabled{
        pointer-events: none;
        cursor: default;
        background-color: #fff;
        border-color: #fff;
      }
      .borderless td, .borderless th {
          border: none;
      }
    </style>
  </head>

  <body id="page-top">

    <!-- Navigation -->
    <?php require 'navbar.php'; ?>
    <?php 
        $i = 1;
        $nama = $_GET['nama'];
        $data = $konek->query("SELECT * FROM laporan WHERE nama = '$nama'");
        foreach ($data as $x) {
        }
     ?>
    <section class="masthead" style="margin-top:50px;">
          <div class="container">
            <h2 class="text-center text-uppercase" style="color : #aa4040; ">NOTA PEMBAYARAN</h2>
            <br>
            <div class="row">
              <div class="col-md-5">
                <table class="table borderless">
                  <tr>
                    <th>Nama</th>
                    <th>:</th>
                    <th><?php echo $x['nama']; ?></th>
                  </tr>
                  <tr>
                    <th>Tanggal Transaksi</th>
                    <th>:</th>
                    <th><?php echo $x['tanggal']; ?></th>
                  </tr>
              </table>
              </div>
              <div class="col-lg-12">
                      <table class="table table-hover">
                        <th>Nama Menu</th>
                        <th>Jumlah</th>
                        <th>Harga</th>
                        <th>Jumlah</th>
                      <?php
                        $pesan = $konek->query("SELECT * FROM `menu`, `pesan` WHERE nama = '$nama' AND pesan.idmenu = menu.idmenu");
                        $total = 0;
                        foreach ($pesan as $p) {
                          $sumH = $p['hargamenu']*$p['jumlah'];
                          $total += $sumH
                          ?>
                          <tr>
                            <td><?php echo $p['namamenu'];?></td>
                            <td><?php echo $p['jumlah'];?></td>
                            <td><?php echo $p['hargamenu'];?></td>
                            <td><?php echo $sumH;?></td>
                          </tr>
                        <?php }?>
                        <tr>
                          <td colspan="3"><b>TOTAL</b></td>
                          <td><b>Rp <?php echo number_format($total,0,",","."); ?>,-</b></td>
                        </tr>
                        <tr>
                          <td colspan="3"><b>BAYAR</b></td>
                          <td><b>Rp <?php echo number_format($x['bayar'],0,",","."); ?>,-</b></td>
                        </tr>
                        <tr>
                          <td colspan="3"><b>KEMBALIAN</b></td>
                          <td><b>Rp <?php echo number_format($x['kembalian'],0,",","."); ?>,-</b></td>
                        </tr>
                        </table>
                        </div>
            </div>
          </div>
        </section>
    <!-- Scroll to Top Button (Only visible on small and extra-small screen sizes) -->
    <div class="scroll-to-top d-lg-none position-fixed ">
      <a class="js-scroll-trigger d-block text-center text-white rounded" href="#page-top">
        <i class="fa fa-chevron-up"></i>
      </a>
    </div>

    <!-- Portfolio Modals -->

    
    <!-- Bootstrap core JavaScript -->
    <?php require 'script.php'; ?>

  </body>

</html>
