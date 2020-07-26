<div class="app-main__outer">
    <div class="app-main__inner">
        <div class="app-page-title">
            <div class="page-title-wrapper">
                <div class="page-title-heading">
                    <div class="page-title-icon">
                        <i class="fas fa-poll-h icon-gradient bg-happy-itmeo">
                        </i>
                    </div>
                    <div><?php
                            if ($this->session->userdata('ket5')) {
                                echo 'Perolehan Suara DPH';
                            } else {
                                echo "Silahkan Pilih Jenis DPH";
                            }
                            ?>
                        <div class="page-title-subheading">
                            <?php
                            if ($this->session->userdata('ket5')) {
                                echo $ket5;
                            } else {
                                echo "Jenis DPH yang terpilih akan ditampilkan hasil
                                        perolehan suaranya";
                            }
                            ?>
                        </div>
                    </div>
                </div>

                <div class="page-title-actions">
                    <button type="button" class="btn-shadow mr-3 btn btn-warning" data-toggle="modal" data-target="#modalTampil">
                        <i class="fas fa-eye"> Tampilkan Kandidat</i>
                    </button>
                    <a href="<?= base_url(); ?>C_SuaraDph/print/<?=$this->session->userdata('dph'); ?>">
                        <button type="button" class="btn-shadow mr-3 btn btn-success" <?php if ($status != 'selesai' || !($this->session->userdata('dph'))): ?>disabled <?php endif; ?>>
                            <i class="fas fa-file"> Print Perolehan Suara</i>
                        </button>
                    </a>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-xl-6 col-sm-12">
                <div class="main-card mb-3 card">
                    <div class="card-body">
                        <h5 class="card-title">Calon DPH</h5>
                        <div id="carouselExampleControls2" class="carousel slide carousel-fade" data-ride="carousel">
                            <div class="carousel-inner">
                                <?php
                                $i = 1;
                                if ($total != 0) :
                                    foreach ($kandidat_dph as $row) :
                                ?>
                                        <div class="carousel-item <?php if ($i == 1) {
                                                                        echo 'active';
                                                                    } ?>">
                                            <img class="d-block w-100" src="<?php
                                                                            $url1 = base_url();
                                                                            $url2 = $url1 . 'foto/dph';
                                                                            echo $url2;

                                                                            ?>/<?= $row['foto']; ?>" alt="First slide" width="800" height="400">
                                            <div class="carousel-caption d-none d-md-block" style="background-color: grey; opacity: 0.8;">
                                                <h5>
                                                    Urutan <?php
                                                            if ($i == 1) {
                                                                echo "Pertama";
                                                            } elseif ($i == 2) {
                                                                echo "Kedua";
                                                            } elseif ($i == 3) {
                                                                echo "Ketiga";
                                                            } else {
                                                                echo "ke-" . $i;
                                                            }
                                                            ?>
                                                </h5>
                                                <p><?= $row['nama']; ?></p>
                                            </div>
                                        </div>
                                    <?php
                                        $i++;
                                    endforeach;
                                elseif ($total == 0) :
                                    ?>
                                    <tr>
                                        <td colspan="6" style="text-align: center;">
                                            <h1 class="h3 mb-0 text-gray-800">No Record Found!</h1>
                                        </td>
                                    </tr>
                                <?php
                                elseif ($kandidat_dph == NULL) :
                                ?>
                                    <tr>
                                        <td colspan="6" style="text-align: center;">
                                            <h1 class="h3 mb-0 text-gray-800">Silahkan Pilih Jenis Kandidat Terlebih Dulu!</h1>
                                        </td>
                                    </tr>
                                <?php
                                endif;
                                ?>
                            </div>
                            <a class="carousel-control-prev" href="#carouselExampleControls2" role="button" data-slide="prev">
                                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                <span class="sr-only">Previous</span>
                            </a>
                            <a class="carousel-control-next" href="#carouselExampleControls2" role="button" data-slide="next">
                                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                <span class="sr-only">Next</span>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xl-6 col-lg-12">
                <div class="card shadow mb-4">
                    <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                        <h6 class="m-0 font-weight-bold text-secondary"><i class="fas fa-chart-bar"></i> &nbsp;Grafik Jumlah Suara<u>
                            </u>
                        </h6>
                    </div>
                    <div class="card-body" style="margin-top: -35px">
                        <hr>
                        <div class="chart-area" style="margin-top: -30px; min-height:400px">
                            <canvas id="chart_jumlah_suara">
                            </canvas>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-12">
                <div class="main-card mb-3 card">

                    <div class="card-body">
                        <h5 class="card-title">Leaderboard</h5>
                        <table class="mb-0 table table-striped">
                            <thead>
                                    <th style="text-align: center;">No</th>
                                    <th style="text-align: center;">Nama</th>
                                    <th style="text-align: center;">Asal Lingkungan</th>
                                    <th style="text-align: center;">Asal Wilayah</th>
                                    <th style="text-align: center;">Suara</th>
                            </thead>
                            <tbody>
                                <?php
                                $i = 1;
                                if ($total != 0) :
                                    foreach ($kandidat_dph as $row) :
                                ?>
                                        <tr>
                                            <td style="text-align: center;"><?= $i; ?></td>
                                            <td style="text-align: center;"><?= $row['nama']; ?></td>
                                            <td style="text-align: center;"><?= $row['nama_lingkungan']; ?></td>
                                            <td style="text-align: center;"><?= $row['nama_wilayah']; ?></td>
                                            <td style="text-align: center;"><?= $row['suara']; ?></td>
                                        </tr>
                                    <?php
                                        $i++;
                                    endforeach;
                                elseif ($total == 0) :
                                    ?>
                                    <tr>
                                        <td colspan="5" style="text-align: center;">
                                            <h1 class="h3 mb-0 text-gray-800">No Record Found!</h1>
                                        </td>
                                    </tr>
                                <?php
                                elseif ($kandidat_dph == NULL) :
                                ?>
                                    <tr>
                                        <td colspan="5" style="text-align: center;">
                                            <h1 class="h3 mb-0 text-gray-800">Silahkan Pilih Jenis Kandidat Terlebih Dulu!</h1>
                                        </td>
                                    </tr>
                                <?php
                                endif;
                                ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>