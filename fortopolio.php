<section class="portfolio" id="portfolio">
      <div class="container">
        <h2 class="text-center text-uppercase text-secondary mb-0" style="color : #8d7b18; ">Menu</h2>
        <hr class="star-dark mb-5">
        <div class="row">
          <?php 
        $i=1;

         $menu = $konek->query("SELECT * FROM `menu`");
         foreach ($menu as $x) {
           ?>
          <div class="col-md-6 col-lg-4">
            <a class="portfolio-item d-block mx-auto" href="#portfolio-modal-<?php echo $i ?>">
              <div class="portfolio-item-caption d-flex position-absolute h-100 w-100">
                <div class="portfolio-item-caption-content my-auto w-100 text-center text-white">
                  <i class="fa fa-search-plus fa-3x"></i>
                </div>
              </div>
              <img class="img-fluid" src="img/<?php echo $x['gambar'] ?>" alt="">
            </a>
          </div>
          <div class="portfolio-modal mfp-hide" id="portfolio-modal-<?php echo $i ?>">
      <div class="portfolio-modal-dialog bg-white">
        <a class="close-button d-none d-md-block portfolio-modal-dismiss" href="#">
          <i class="fa fa-3x fa-times"></i>
        </a>
        <div class="container text-center">
          <div class="row">
            <div class="col-lg-8 mx-auto">
              <h2 class="text-secondary text-uppercase mb-0"><?php echo $x['namamenu'] ?></h2>
              <hr class="star-dark mb-5">
              <img class="img-fluid mb-5" src="img/<?php echo $x['gambar'] ?>" alt="">
              <p class="mb-5">Rp <?php echo $x['hargamenu']; ?>,-<?php  ?></p>
              <a class="btn btn-primary btn-lg rounded-pill portfolio-modal-dismiss" href="#">
                <i class="fa fa-close"></i>
                Close</a>
            </div>
          </div>
        </div>
      </div>
    </div>

   
          <?php 
          $i++;
          }
           ?>
        </div>
      </div>
    </section>
<!-- Portfolio Modal 1 -->
    