<div class="app-wrapper-footer">
        <div class="app-footer">
            <div class="app-footer__inner">
                <div class="app-footer-right">
                    <ul class="nav">
                        <li class="nav-item">
                            <a href="javascript:void(0);" class="nav-link">
                                <div class="badge badge-success mr-1 ml-0">
                                    <small>Developed By : William & Jordan</small>
                                </div>
                                Gereja Kristus Raja - Ungaran
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
    </div>
    <script src="http://maps.google.com/maps/api/js?sensor=true"></script>
    </div>
    </div>
    <script type="text/javascript" src="./assets/scripts/main.js"></script>
    <script type="text/javascript" src="<?php echo base_url().'assets/scripts/dashboard_admin.js'?>"></script>

    <!-- untuk countdown pemilihan Ketua Lingkungan -->
      <!-- <script>
        // Set the date we're counting down to
        var countDownDate = new Date("2020-07-06 00:00:00").getTime();
        var pilih=document.getElementById('pilih');
        var calon=document.getElementById('calon');
        // Update the count down every 1 second
        var x = setInterval(function() {

          // Get today's date and time
          var now = new Date().getTime();

          // Find the distance between now and the count down date
          var distance = countDownDate - now;
          // Time calculations for days, hours, minutes and seconds
          var days = Math.floor(distance / (1000 * 60 * 60 * 24));
          var hours = Math.floor((distance % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
          var minutes = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60));
          var seconds = Math.floor((distance % (1000 * 60)) / 1000);

          // Display the result in the element with id="demo"
          var time_left = days + "d " + hours + "h " + minutes + "m " + seconds + "s ";
          pilih.innerHTML = "Pemilihan akan dimulai dalam : <br> <strong>" + time_left + "</strong>";
          console.log(time_left);
          // If the count down is finished, write some text
          if (distance < 0) {
            clearInterval(x);
            pilih.style.display='none';
            calon.style.display='block';
          }
        }, 1000);
      </script> -->

      <script>
  var ctx = document.getElementById("chart_jumlah_suara");
  var myChart = new Chart(ctx, {
    type: 'horizontalBar',
    data: {
      labels: [<?php
            if (count($suara)>0) {
              foreach ($suara as $data) {
                echo "'" .$data->nama ."',";
              }
            }
              ?>],
      datasets: [{
        label: 'Jumlah Suara',
        data: [<?php
            if (count($suara)>0) {
              foreach ($suara as $data) {
                echo "'" .$data->suara ."',";
              }
            }
              ?>],
        backgroundColor: [
          'rgba(255, 99, 132, 0.2)',
          'rgba(54, 162, 235, 0.2)',
          'rgba(255, 206, 86, 0.2)',
          'rgba(75, 192, 192, 0.2)',
          'rgba(153, 102, 255, 0.2)',
          'rgba(255, 159, 64, 0.2)',
          'rgba(255, 99, 132, 0.2)',
          'rgba(54, 162, 235, 0.2)',
          'rgba(255, 206, 86, 0.2)',
          'rgba(75, 192, 192, 0.2)',
          'rgba(153, 102, 255, 0.2)',
          'rgba(255, 159, 64, 0.2)'
        ],
        borderColor: [
          'rgba(255,99,132,1)',
          'rgba(54, 162, 235, 1)',
          'rgba(255, 206, 86, 1)',
          'rgba(75, 192, 192, 1)',
          'rgba(153, 102, 255, 1)',
          'rgba(255, 159, 64, 1)',
          'rgba(255, 99, 132, 0.2)',
          'rgba(54, 162, 235, 0.2)',
          'rgba(255, 206, 86, 0.2)',
          'rgba(75, 192, 192, 0.2)',
          'rgba(153, 102, 255, 0.2)',
          'rgba(255, 159, 64, 0.2)'
        ],
        borderWidth: 1
      }]
    },
    options: {
      maintainAspectRatio: false,
    layout: {
      padding: {
        left: 10,
        right: 25,
        top: 25,
        bottom: 0
      }
    },
    legend: {
        display: false
    },
      scales: {
        yAxes: [{
          ticks: {
            beginAtZero: true
           }
        }]
      }
    }
  });
</script>

  <!-- End Countdown pemilihan Ketua Lingkungan -->

  

    <!-- Modal Logout -->

    <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="exampleModalLabel">Anda Yakin Untuk Logout?</h5>
              <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">×</span>
              </button>
            </div>
            <div class="modal-body">Pilih "Logout" Dibawah Ini Untuk Mengakhiri Session Anda.</div>
            <div class="modal-footer">
              <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
              <a href="<?php echo base_url().'C_Logout'?>" class="btn btn-primary">Logout</a>
            </div>
          </div>
        </div>
      </div>
<!-- End Modal Logout -->

<!-- Modal untuk Pilih Ketua Lingkungan -->
<?php 
  $i=1;
  if (!empty($kandidat)):
  if ($kandidat != NULL) :
    foreach ($kandidat as $row):
?>
  <div class="modal fade" id="pilihKetuaLingkungan<?= $row['id'];?>" data-backdrop="static" tabindex="1" role="dialog" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="staticBackdropLabel">Anda Yakin ingin memilih <strong><?= $row['nama'];?></strong> sebagai <?= $tipe;?> anda ?</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <p>Jika anda yakin ingin memilih calon tersebut silahkan tekan pilih</p>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
          <a href="<?= base_url(); ?>C_PilihKetuaLingkungan/pilih/<?= $row['id']; ?>">
            <button type="button" class="btn btn-primary"><i class="fas fa-check"></i> &nbsp;Pilih</button>
          </a>
        </div>
      </div>
    </div>
  </div>
<?php
  $i++;
  endforeach;
  endif;endif;
?>
<!-- end Modal untuk pilih -->

<!-- Modal untuk Pilih Ketua Wilayah -->
<?php 
  $i=1;
  if (!empty($kandidat)):
  if ($kandidat != NULL) :
    foreach ($kandidat as $row):
?>
  <div class="modal fade" id="pilihKetuaWilayah<?= $row['id'];?>" data-backdrop="static" tabindex="1" role="dialog" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="staticBackdropLabel">Anda Yakin ingin memilih <strong><?= $row['nama'];?></strong> sebagai <?= $tipe;?> anda ?</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <p>Jika anda yakin ingin memilih calon tersebut silahkan tekan pilih</p>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
          <a href="<?= base_url(); ?>C_PilihKetuaWilayah/pilih/<?= $row['id']; ?>">
            <button type="button" class="btn btn-primary"><i class="fas fa-check"></i> &nbsp;Pilih</button>
          </a>
        </div>
      </div>
    </div>
  </div>
<?php
  $i++;
  endforeach;
  endif;endif;
?>
<!-- end Modal untuk pilih Ketua Wilayah-->

<!-- Modal untuk Pilih Koordinator Wilayah -->
<?php 
  $i=1;
  if (!empty($kandidat)):
  if ($kandidat != NULL) :
    foreach ($kandidat as $row):
?>
  <div class="modal fade" id="pilihKoorWilayah<?= $row['id'];?>" data-backdrop="static" tabindex="1" role="dialog" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="staticBackdropLabel">Anda Yakin ingin memilih <strong><?= $row['nama'];?></strong> sebagai <?= $tipe;?> ?</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <p>Jika anda yakin ingin memilih calon tersebut silahkan tekan pilih</p>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
          <a href="<?= base_url(); ?>C_PilihKoorWilayah/pilih/<?= $row['id']; ?>">
            <button type="button" class="btn btn-primary"><i class="fas fa-check"></i> &nbsp;Pilih</button>
          </a>
        </div>
      </div>
    </div>
  </div>
<?php
  $i++;
  endforeach;
  endif;endif;
?>
<!-- end Modal untuk pilih Koordinator Wilayah-->


<!-- Modal untuk Pilih DPH -->
<?php 
  $i=1;
  if (!empty($kandidat)):
  if ($kandidat != NULL) :
    foreach ($kandidat as $row):
?>
  <div class="modal fade" id="pilihC1<?= $row['id'];?>" data-backdrop="static" tabindex="1" role="dialog" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="staticBackdropLabel">Anda Yakin ingin memilih <strong><?= $row['nama'];?></strong> sebagai <?= $tipe;?> anda ?</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <p>Jika anda yakin ingin memilih calon tersebut silahkan tekan pilih</p>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
          <a href="<?= base_url(); ?>C_PilihC1/pilih/<?= $row['id']; ?>">
            <button type="button" class="btn btn-primary"><i class="fas fa-check"></i> &nbsp;Pilih</button>
          </a>
        </div>
      </div>
    </div>
  </div>
<?php
  $i++;
  endforeach;
  endif;endif;
?>

<?php 
  $i=1;
  if (!empty($kandidat)):
  if ($kandidat != NULL) :
    foreach ($kandidat as $row):
?>
  <div class="modal fade" id="pilihC2<?= $row['id'];?>" data-backdrop="static" tabindex="1" role="dialog" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="staticBackdropLabel">Anda Yakin ingin memilih <strong><?= $row['nama'];?></strong> sebagai <?= $tipe;?> anda ?</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <p>Jika anda yakin ingin memilih calon tersebut silahkan tekan pilih</p>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
          <a href="<?= base_url(); ?>C_PilihC2/pilih/<?= $row['id']; ?>">
            <button type="button" class="btn btn-primary"><i class="fas fa-check"></i> &nbsp;Pilih</button>
          </a>
        </div>
      </div>
    </div>
  </div>
<?php
  $i++;
  endforeach;
  endif;endif;
?>

<?php 
  $i=1;
  if (!empty($kandidat)):
  if ($kandidat != NULL) :
    foreach ($kandidat as $row):
?>
  <div class="modal fade" id="pilihC3<?= $row['id'];?>" data-backdrop="static" tabindex="1" role="dialog" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="staticBackdropLabel">Anda Yakin ingin memilih <strong><?= $row['nama'];?></strong> sebagai <?= $tipe;?> anda ?</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <p>Jika anda yakin ingin memilih calon tersebut silahkan tekan pilih</p>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
          <a href="<?= base_url(); ?>C_PilihC3/pilih/<?= $row['id']; ?>">
            <button type="button" class="btn btn-primary"><i class="fas fa-check"></i> &nbsp;Pilih</button>
          </a>
        </div>
      </div>
    </div>
  </div>
<?php
  $i++;
  endforeach;
  endif;endif;
?>

<?php 
  $i=1;
  if (!empty($kandidat)):
  if ($kandidat != NULL) :
    foreach ($kandidat as $row):
?>
  <div class="modal fade" id="pilihC4<?= $row['id'];?>" data-backdrop="static" tabindex="1" role="dialog" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="staticBackdropLabel">Anda Yakin ingin memilih <strong><?= $row['nama'];?></strong> sebagai <?= $tipe;?> anda ?</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <p>Jika anda yakin ingin memilih calon tersebut silahkan tekan pilih</p>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
          <a href="<?= base_url(); ?>C_PilihC4/pilih/<?= $row['id']; ?>">
            <button type="button" class="btn btn-primary"><i class="fas fa-check"></i> &nbsp;Pilih</button>
          </a>
        </div>
      </div>
    </div>
  </div>
<?php
  $i++;
  endforeach;
  endif;endif;
?>

<?php 
  $i=1;
  if (!empty($kandidat)):
  if ($kandidat != NULL) :
    foreach ($kandidat as $row):
?>
  <div class="modal fade" id="pilihC5<?= $row['id'];?>" data-backdrop="static" tabindex="1" role="dialog" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="staticBackdropLabel">Anda Yakin ingin memilih <strong><?= $row['nama'];?></strong> sebagai <?= $tipe;?> anda ?</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <p>Jika anda yakin ingin memilih calon tersebut silahkan tekan pilih</p>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
          <a href="<?= base_url(); ?>C_PilihC5/pilih/<?= $row['id']; ?>">
            <button type="button" class="btn btn-primary"><i class="fas fa-check"></i> &nbsp;Pilih</button>
          </a>
        </div>
      </div>
    </div>
  </div>
<?php
  $i++;
  endforeach;
  endif;endif;
?>

<?php 
  $i=1;
  if (!empty($kandidat)):
  if ($kandidat != NULL) :
    foreach ($kandidat as $row):
?>
  <div class="modal fade" id="pilihC6<?= $row['id'];?>" data-backdrop="static" tabindex="1" role="dialog" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="staticBackdropLabel">Anda Yakin ingin memilih <strong><?= $row['nama'];?></strong> sebagai <?= $tipe;?> anda ?</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <p>Jika anda yakin ingin memilih calon tersebut silahkan tekan pilih</p>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
          <a href="<?= base_url(); ?>C_PilihC6/pilih/<?= $row['id']; ?>">
            <button type="button" class="btn btn-primary"><i class="fas fa-check"></i> &nbsp;Pilih</button>
          </a>
        </div>
      </div>
    </div>
  </div>
<?php
  $i++;
  endforeach;
  endif;endif;
?>

<?php 
  $i=1;
  if (!empty($kandidat)):
  if ($kandidat != NULL) :
    foreach ($kandidat as $row):
?>
  <div class="modal fade" id="pilihC71<?= $row['id'];?>" data-backdrop="static" tabindex="1" role="dialog" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="staticBackdropLabel">Anda Yakin ingin memilih <strong><?= $row['nama'];?></strong> sebagai <?= $tipe;?> anda ?</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <p>Jika anda yakin ingin memilih calon tersebut silahkan tekan pilih</p>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
          <a href="<?= base_url(); ?>C_PilihC71/pilih/<?= $row['id']; ?>">
            <button type="button" class="btn btn-primary"><i class="fas fa-check"></i> &nbsp;Pilih</button>
          </a>
        </div>
      </div>
    </div>
  </div>
<?php
  $i++;
  endforeach;
  endif;endif;
?>

<?php 
  $i=1;
  if (!empty($kandidat)):
  if ($kandidat != NULL) :
    foreach ($kandidat as $row):
?>
  <div class="modal fade" id="pilihC72<?= $row['id'];?>" data-backdrop="static" tabindex="1" role="dialog" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="staticBackdropLabel">Anda Yakin ingin memilih <strong><?= $row['nama'];?></strong> sebagai <?= $tipe;?> anda ?</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <p>Jika anda yakin ingin memilih calon tersebut silahkan tekan pilih</p>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
          <a href="<?= base_url(); ?>C_PilihC72/pilih/<?= $row['id']; ?>">
            <button type="button" class="btn btn-primary"><i class="fas fa-check"></i> &nbsp;Pilih</button>
          </a>
        </div>
      </div>
    </div>
  </div>
<?php
  $i++;
  endforeach;
  endif;endif;
?>

<?php 
  $i=1;
  if (!empty($kandidat)):
  if ($kandidat != NULL) :
    foreach ($kandidat as $row):
?>
  <div class="modal fade" id="pilihC73<?= $row['id'];?>" data-backdrop="static" tabindex="1" role="dialog" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="staticBackdropLabel">Anda Yakin ingin memilih <strong><?= $row['nama'];?></strong> sebagai <?= $tipe;?> anda ?</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <p>Jika anda yakin ingin memilih calon tersebut silahkan tekan pilih</p>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
          <a href="<?= base_url(); ?>C_PilihC73/pilih/<?= $row['id']; ?>">
            <button type="button" class="btn btn-primary"><i class="fas fa-check"></i> &nbsp;Pilih</button>
          </a>
        </div>
      </div>
    </div>
  </div>
<?php
  $i++;
  endforeach;
  endif;endif;
?>

<?php 
  $i=1;
  if (!empty($kandidat)):
  if ($kandidat != NULL) :
    foreach ($kandidat as $row):
?>
  <div class="modal fade" id="pilihC81<?= $row['id'];?>" data-backdrop="static" tabindex="1" role="dialog" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="staticBackdropLabel">Anda Yakin ingin memilih <strong><?= $row['nama'];?></strong> sebagai <?= $tipe;?> anda ?</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <p>Jika anda yakin ingin memilih calon tersebut silahkan tekan pilih</p>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
          <a href="<?= base_url(); ?>C_PilihC81/pilih/<?= $row['id']; ?>">
            <button type="button" class="btn btn-primary"><i class="fas fa-check"></i> &nbsp;Pilih</button>
          </a>
        </div>
      </div>
    </div>
  </div>
<?php
  $i++;
  endforeach;
  endif;endif;
?>

<?php 
  $i=1;
  if (!empty($kandidat)):
  if ($kandidat != NULL) :
    foreach ($kandidat as $row):
?>
  <div class="modal fade" id="pilihC82<?= $row['id'];?>" data-backdrop="static" tabindex="1" role="dialog" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="staticBackdropLabel">Anda Yakin ingin memilih <strong><?= $row['nama'];?></strong> sebagai <?= $tipe;?> anda ?</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <p>Jika anda yakin ingin memilih calon tersebut silahkan tekan pilih</p>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
          <a href="<?= base_url(); ?>C_PilihC82/pilih/<?= $row['id']; ?>">
            <button type="button" class="btn btn-primary"><i class="fas fa-check"></i> &nbsp;Pilih</button>
          </a>
        </div>
      </div>
    </div>
  </div>
<?php
  $i++;
  endforeach;
  endif;endif;
?>

<?php 
  $i=1;
  if (!empty($kandidat)):
  if ($kandidat != NULL) :
    foreach ($kandidat as $row):
?>
  <div class="modal fade" id="pilihC83<?= $row['id'];?>" data-backdrop="static" tabindex="1" role="dialog" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="staticBackdropLabel">Anda Yakin ingin memilih <strong><?= $row['nama'];?></strong> sebagai <?= $tipe;?> anda ?</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <p>Jika anda yakin ingin memilih calon tersebut silahkan tekan pilih</p>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
          <a href="<?= base_url(); ?>C_PilihC83/pilih/<?= $row['id']; ?>">
            <button type="button" class="btn btn-primary"><i class="fas fa-check"></i> &nbsp;Pilih</button>
          </a>
        </div>
      </div>
    </div>
  </div>
<?php
  $i++;
  endforeach;
  endif;endif;
?>

<?php 
  $i=1;
  if (!empty($kandidat)):
  if ($kandidat != NULL) :
    foreach ($kandidat as $row):
?>
  <div class="modal fade" id="pilihC84<?= $row['id'];?>" data-backdrop="static" tabindex="1" role="dialog" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="staticBackdropLabel">Anda Yakin ingin memilih <strong><?= $row['nama'];?></strong> sebagai <?= $tipe;?> anda ?</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <p>Jika anda yakin ingin memilih calon tersebut silahkan tekan pilih</p>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
          <a href="<?= base_url(); ?>C_PilihC84/pilih/<?= $row['id']; ?>">
            <button type="button" class="btn btn-primary"><i class="fas fa-check"></i> &nbsp;Pilih</button>
          </a>
        </div>
      </div>
    </div>
  </div>
<?php
  $i++;
  endforeach;
  endif;endif;
?>

<?php 
  $i=1;
  if (!empty($kandidat)):
  if ($kandidat != NULL) :
    foreach ($kandidat as $row):
?>
  <div class="modal fade" id="pilihC85<?= $row['id'];?>" data-backdrop="static" tabindex="1" role="dialog" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="staticBackdropLabel">Anda Yakin ingin memilih <strong><?= $row['nama'];?></strong> sebagai <?= $tipe;?> anda ?</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <p>Jika anda yakin ingin memilih calon tersebut silahkan tekan pilih</p>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
          <a href="<?= base_url(); ?>C_PilihC85/pilih/<?= $row['id']; ?>">
            <button type="button" class="btn btn-primary"><i class="fas fa-check"></i> &nbsp;Pilih</button>
          </a>
        </div>
      </div>
    </div>
  </div>
<?php
  $i++;
  endforeach;
  endif;endif;
?>
<?php 
  $i=1;
  if (!empty($kandidat)):
  if ($kandidat != NULL) :
    foreach ($kandidat as $row):
?>
  <div class="modal fade" id="pilihC9<?= $row['id'];?>" data-backdrop="static" tabindex="1" role="dialog" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="staticBackdropLabel">Anda Yakin ingin memilih <strong><?= $row['nama'];?></strong> sebagai <?= $tipe;?> anda ?</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <p>Jika anda yakin ingin memilih calon tersebut silahkan tekan pilih</p>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
          <a href="<?= base_url(); ?>C_PilihC9/pilih/<?= $row['id']; ?>">
            <button type="button" class="btn btn-primary"><i class="fas fa-check"></i> &nbsp;Pilih</button>
          </a>
        </div>
      </div>
    </div>
  </div>
<?php
  $i++;
  endforeach;
  endif;endif;
?>
<!-- end Modal untuk pilih Ketua Wilayah-->


</body>

</html>