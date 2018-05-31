
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
    </style>
  </head>

  <body id="page-top">

    <!-- Navigation -->
    <?php require 'navbar.php'; ?>
    <?php 
        $i = 1;
		$text = $_GET['cari'];
		$data = $konek->query("SELECT * FROM `laporan`,`menu`,`pesan` WHERE menu.idmenu = pesan.idmenu AND laporan.nama LIKE '%$text%' AND pesan.nama = laporan.nama group by pesan.nama");
 	?>
    <section class="masthead" style="margin-top:50px;">
          <div class="container">
          
            <h2 class="text-center text-uppercase">Laporan Transaksi</h2><div>
            
            <div class="row">
            <div class="col-lg-6">
            <div class="input-group">
            <form action="query.php" method="get">
            <input type="text" name="cari" class="form-control" placeholder="Search for customer">
            <span class="input-group-btn">
            <button class="btn btn-default" type="submit">Search!</button>
            </span>
            </form>
            </div><!-- /input-group -->
            </div><!-- /.col-lg-6 -->
            </div><!-- /.row -->

            <br>
            <div class="row">
             <table class="table table-stripped">
                <thead>
                  <tr>
                    <th>No.</th>
                    <th>Nama Pemesan</th>
                    <th>Menu yang Dipesan</th>
                    <th>Tanggal Transaksi</th>
                    <th>Aksi</th>

                  </tr>
                </thead>
                <tbody>
                  <?php
                      foreach ($data as $d) {
                        $nama = $d['nama'];
                        if ($d['ket'] == 'OK') {
                          $disabled = 'disabled';
                          $sudah = 'Sudah di bayar';
                          $type = 'hidden';
                        }else{
                          $disabled = '';
                          $sudah = '';
                          $type = 'text';
                        }
                    ?>
                  <tr>
                    <td><?php echo $i;?></td>
                    <td><?php echo $d['nama']; ?></td>
                    <td>
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
                        </table>
                    </td>
                    <td><?php echo $d['tanggal']; ?></td>
<script type="text/javascript">
  function kembalian<?php echo $i; ?>() {
    var totalHarga = <?php echo $total; ?>;
    var bayar = document.getElementById('bayar<?php echo $i;?>').value;
    if(bayar >= totalHarga){
      var hasil = bayar - totalHarga;
      var reverse = hasil.toString().split('').reverse().join(''),
          ribuan = reverse.match(/\d{1,3}/g);
      ribuan = ribuan.join('.').split('').reverse().join('');
      var kembalian = document.getElementById('kembalian<?php echo $i;?>').innerHTML="Rp "+ribuan+",-";
      var byr = document.getElementById('byr<?php echo $i;?>').value=bayar;
      var balik = document.getElementById('balik<?php echo $i;?>').value=hasil;
    }else{
      var kembalian = document.getElementById('kembalian<?php echo $i;?>').innerHTML="Maaf, uang anda kurang";
    }
  }
</script>
                    <td>
                      <b><?php echo $sudah; ?></b>
                      <input type="<?php echo $type; ?>" id="bayar<?php echo $i;?>" class="form-input" <?php echo $disabled; ?>>
<!-- Trigger the modal with a button -->
<a class="btn btn-primary <?php echo $disabled; ?>" onclick="kembalian<?php echo $i;?>()" data-toggle="modal" href="#myModal<?php echo $i;?>">BAYAR</a>

<!-- Modal -->
<div id="myModal<?php echo $i;?>" class="modal fade" role="dialog">
  <div class="modal-dialog">
    <form method="POST" action="insert_lap.php">
    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title">Kembalian</h4>
        <button type="button" class="close" data-dismiss="modal">&times;</button>
      </div>
      <div class="modal-body">
        <h5 id="kembalian<?php echo $i;?>"></h5>
        <input type="hidden" name="totalbayar" value="<?php echo $total; ?>">
        <input type="hidden" name="nama" value="<?php echo $nama; ?>">
        <input type="hidden" name="bayar" id="byr<?php echo $i;?>">
        <input type="hidden" name="nomormeja" value="<?php echo $d['nomormeja']; ?>">
        <input type="hidden" name="kembalian" id="balik<?php echo $i; ?>">
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary">Simpan</button>
      </div>
    </div>
    </form>
  </div>
</div>
                    </td>
                  </tr>
                  <?php $i++;} ?>
                </tbody>
              </table>
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
