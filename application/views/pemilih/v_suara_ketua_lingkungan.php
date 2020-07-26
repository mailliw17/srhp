<div class="app-main__outer">
    <div class="app-main__inner">
        <div class="app-page-title">
            <div class="page-title-wrapper">
                <div class="page-title-heading">
                    <div class="page-title-icon">
                        <i class="fas fa-poll-h icon-gradient bg-happy-itmeo">
                        </i>
                    </div>
                    <div>Perolehan Suara Ketua Lingkungan <?= $nama_lingkungan; ?>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-xl-6 col-sm-12">
                <div class="main-card mb-3 card">
                    <div class="card-body">
                        <h5 class="card-title">Ketua Lingkungan</h5>
                        <div id="carouselExampleControls2" class="carousel slide carousel-fade" data-ride="carousel">
                            <div class="carousel-inner">
                                <?php
                                $i = 1;
                                if ($total != 0) :
                                    foreach ($kandidat_ketua_lingkungan as $row) :
                                ?>
                                        <div class="carousel-item <?php if ($i == 1) {
                                                                        echo 'active';
                                                                    } ?>">
                                            <img class="d-block w-100" src="<?= base_url(); ?>foto/ketua_lingkungan/<?= $row['foto']; ?>" alt="First slide" width="800" height="400">
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
                                <tr>
                                    <th style="text-align: center;">No</th>
                                    <th style="text-align: center;">Nama</th>
                                    <th style="text-align: center;">Lingkungan</th>
                                    <th style="text-align: center;">Wilayah</th>
                                    <th style="text-align: center;">Suara</th>
                            </thead>
                            <tbody>
                                <?php
                                $i = 1;
                                if ($total != 0) :
                                    foreach ($kandidat_ketua_lingkungan as $row) :
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
                                elseif ($kandidat_ketua_lingkungan == NULL) :
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