<section id="contact">
      <div class="container">
        <h2 class="text-center text-uppercase text-secondary mb-0">Order</h2>
        <hr class="star-dark mb-5">
        <div class="row">
          <div class="col-lg-8 mx-auto">
            <!-- To configure the contact form email address, go to mail/contact_me.php and update the email address in the PHP file on line 19. -->
            <!-- The form should work on most web servers, but if the form is not working you may need to configure your web server differently. -->
            <form method="POST" action="save_order.php">
              <div class="form-group">
                <label for="exampleInputEmail1"><strong>Nama Lengkap</strong></label>
                <input type="text" class="form-control" name="nama">
              </div>
              <div class="form-group">
                <label for="exampleInputPassword1"><strong>Nomor Meja</strong></label>
                <input type="text" class="form-control" name="no_meja">
              </div>
              <div class="form-group">
                <label for="exampleInputPassword1"><strong>Pilih Jenis Makanan</strong></label><br>
                <div class="row">
                  <?php
                    $makanan = $konek->query("SELECT * FROM menu WHERE kategori = 'makanan'");
                    foreach ($makanan as $x) {
                  ?>
                  <div class="col-sm-3">
                      <label class="cc"><?php echo ucfirst($x['namamenu']); ?>
                        <input type="checkbox" value="<?php echo $x['idmenu']; ?>" name="makanan[]">
                        <span class="checkmark"></span>
                      </label>
                  </div>
                  <div class="col-sm-1">
                    <input type="text" class="form-control" name="jumlah_makanan[]"></div>
                  <br>
                  <?php }?>
                </div>
              </div>
              <div class="form-group">
                <label for="exampleInputPassword1"><strong>Pilih Jenis Minuman</strong></label><br>
                <div class="row">
                  <?php
                    $makanan = $konek->query("SELECT * FROM menu WHERE kategori = 'minuman'");
                    foreach ($makanan as $x) {
                  ?>
                  <div class="col-sm-3">
                      <label class="cc"><?php echo ucfirst($x['namamenu']); ?>
                        <input type="checkbox" value="<?php echo $x['idmenu']; ?>" name="makanan[]">
                        <span class="checkmark"></span>
                      </label>
                  </div>
                  <div class="col-sm-1">
                    <input type="text" class="form-control" name="jumlah_makanan[]"></div>
                  <br>
                  <?php }?>
                </div>
              </div>
              <div class="form-group">
                <label for="exampleInputPassword1"><strong>Pilih Jenis Dessert</strong></label><br>
                <div class="row">
                  <?php
                    $makanan = $konek->query("SELECT * FROM menu WHERE kategori = 'dessert'");
                    foreach ($makanan as $x) {
                  ?>
                  <div class="col-sm-3">
                      <label class="cc"><?php echo ucfirst($x['namamenu']); ?>
                        <input type="checkbox" value="<?php echo $x['idmenu']; ?>" name="makanan[]">
                        <span class="checkmark"></span>
                      </label>
                  </div>
                  <div class="col-sm-1">
                    <input type="text" class="form-control" name="jumlah_makanan[]"></div>
                  <br>
                  <?php }?>
                </div>
              </div>
              <div class="form-group">
                <label for="exampleInputPassword1"><strong>Tanggal Order</strong></label>
                <input type="hidden" class="form-control" name="tanggal" value="<?php echo date('Y-m-d'); ?>">
                <input type="text" class="form-control" value="<?php echo date('Y-m-d'); ?>" disabled>
              </div>
              <button type="submit" class="btn btn-primary">Submit</button>
            </form>
          </div>
        </div>
      </div>
    </section>
