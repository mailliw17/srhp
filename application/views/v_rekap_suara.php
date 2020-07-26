<div class="app-main__outer">
    <div class="app-main__inner">
        <div class="app-page-title">
            <div class="page-title-wrapper">
                <div class="page-title-heading">
                    <div class="page-title-icon">
                        <i class="fas fa-poll icon-gradient bg-premium-dark">
                        </i>
                    </div>
                    <div>Rekap Suara
                        <!-- <div class="page-title-subheading" id="print_rekap">
                        </div> -->
                    </div>
                </div>

                <div class="page-title-actions">

                    <a href="<?php echo base_url() . 'C_RekapSuara/print' ?>"><button class="btn-shadow mr-3 btn btn-success" id="b_print" <?php if ($status != 0 ): ?>disabled <?php endif; ?>><i class="fas fa-file"> Print Rekap Suara</i></button></a>
                </div>
            </div>
        </div>
        <div class="tab-content">
            <div class="tab-pane tabs-animation fade show active" id="tab-content-0" role="tabpanel">
                <div class="row">
                    <div class="col-sm-12 col-xl-12">
                        <div class="main-card mb-3 card">
                            <div class="card-body">
                                <h5 class="card-title">Perolehan Suara DPH</h5>
                                <table class="mb-0 table table-striped">
                                    <thead>
                                        <tr>
                                            <th style="text-align: center;">No</th>
                                            <th style="text-align: center;">Keterangan</th>
                                            <th style="text-align: center;">Nama</th>
                                            <th style="text-align: center;">Asal Wilayah</th>
                                            <th style="text-align: center;">Asal Lingkungan</th>
                                            <th style="text-align: center;">Total Suara</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        $i = 1;
                                        foreach ($dph as $row) :
                                        ?>
                                            <tr>
                                                <td style="text-align: center;"><?= $i; ?></td>
                                                <td style="text-align: center;"><?= $row['kandidat_dph']; ?></td>
                                                <td style="text-align: center;"><?= $row['nama']; ?></td>
                                                <td style="text-align: center;"><?= $row['nama_wilayah']; ?></td>
                                                <td style="text-align: center;"><?= $row['nama_lingkungan']; ?></td>
                                                <td style="text-align: center;"><?= $row['suara']; ?></td>
                                            </tr>
                                        <?php
                                            $i++;
                                        endforeach;
                                        ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-sm-12 col-xl-12">
                        <div class="main-card mb-3 card">
                            <div class="card-body">
                                <h5 class="card-title">Perolehan Suara Ketua Wilayah</h5>
                                <table class="mb-0 table table-striped">
                                    <thead>
                                        <tr>
                                            <th style="text-align: center;">No</th>
                                            <th style="text-align: center;">Keterangan</th>
                                            <th style="text-align: center;">Nama</th>
                                            <th style="text-align: center;">Asal Wilayah</th>
                                            <th style="text-align: center;">Asal Lingkungan</th>
                                            <th style="text-align: center;">Total Suara</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        $i = 1;
                                        foreach ($ketua_wilayah as $row) :
                                        ?>
                                            <tr>
                                                <td style="text-align: center;"><?= $i; ?></td>
                                                <td style="text-align: center;">Ketua Wilayah <?= $row['nama_wilayah']; ?></td>
                                                <td style="text-align: center;"><?= $row['nama']; ?></td>
                                                <td style="text-align: center;"><?= $row['nama_wilayah']; ?></td>
                                                <td style="text-align: center;"><?= $row['nama_lingkungan']; ?></td>
                                                <td style="text-align: center;"><?= $row['suara']; ?></td>
                                            </tr>
                                        <?php
                                            $i++;
                                        endforeach;
                                        ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-sm-12 col-xl-12">
                        <div class="main-card mb-3 card">
                            <div class="card-body">
                                <h5 class="card-title">Perolehan Suara Koordinator Wilayah</h5>
                                <table class="mb-0 table table-striped">
                                    <thead>
                                        <tr>
                                            <th style="text-align: center;">No</th>
                                            <th style="text-align: center;">Nama</th>
                                            <th style="text-align: center;">Asal Wilayah</th>
                                            <th style="text-align: center;">Asal Lingkungan</th>
                                            <th style="text-align: center;">Total Suara</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        $i = 1;
                                        foreach ($koor_wilayah as $row) :
                                        ?>
                                            <tr>
                                                <td style="text-align: center;"><?= $i; ?></td>
                                                <td style="text-align: center;"><?= $row['nama']; ?></td>
                                                <td style="text-align: center;"><?= $row['nama_wilayah']; ?></td>
                                                <td style="text-align: center;"><?= $row['nama_lingkungan']; ?></td>
                                                <td style="text-align: center;"><?= $row['suara']; ?></td>
                                            </tr>
                                        <?php
                                            $i++;
                                        endforeach;
                                        ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>


                <?php
                $i = 1;
                foreach ($ketua_lingkungan as $key => $row) :
                    if ($key == 0) :
                        $w = $row['nama_wilayah'];
                ?>
                        <div class="row">
                            <div class="col-sm-12 col-xl-12">
                                <div class="main-card mb-3 card">
                                    <div class="card-body">
                                        <h5 class="card-title">Perolehan Suara Ketua Lingkungan <?= $row['nama_wilayah'] ?></h5>
                                        <table class="mb-0 table table-striped">
                                            <thead>
                                                <tr>
                                                    <th style="text-align: center;">No</th>
                                                    <th style="text-align: center;">Keterangan</th>
                                                    <th style="text-align: center;">Nama</th>
                                                    <th style="text-align: center;">Asal Wilayah</th>
                                                    <th style="text-align: center;">Asal Lingkungan</th>
                                                    <th style="text-align: center;">Total Suara</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <tr>
                                                    <td style="text-align: center;"><?= $i; ?></td>
                                                    <td style="text-align: center;">Ketua Lingkungan <?= $row['nama_lingkungan']; ?></td>
                                                    <td style="text-align: center;"><?= $row['nama']; ?></td>
                                                    <td style="text-align: center;"><?= $row['nama_wilayah']; ?></td>
                                                    <td style="text-align: center;"><?= $row['nama_lingkungan']; ?></td>
                                                    <td style="text-align: center;"><?= $row['suara']; ?></td>
                                                </tr>

                                            <?php
                                        elseif ($row['nama_wilayah'] != $w) :
                                            $i = 1;
                                            $w = $row['nama_wilayah'];
                                            ?>

                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-12 col-xl-12">
                                <div class="main-card mb-3 card">
                                    <div class="card-body">
                                        <h5 class="card-title">Perolehan Suara Ketua Lingkungan <?= $row['nama_wilayah'] ?></h5>
                                        <table class="mb-0 table table-striped">
                                            <thead>
                                                <tr>
                                                    <th style="text-align: center;">No</th>
                                                    <th style="text-align: center;">Keterangan</th>
                                                    <th style="text-align: center;">Nama</th>
                                                    <th style="text-align: center;">Asal Wilayah</th>
                                                    <th style="text-align: center;">Asal Lingkungan</th>
                                                    <th style="text-align: center;">Total Suara</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <tr>
                                                    <td style="text-align: center;"><?= $i; ?></td>
                                                    <td style="text-align: center;">Ketua Lingkungan <?= $row['nama_lingkungan']; ?></td>
                                                    <td style="text-align: center;"><?= $row['nama']; ?></td>
                                                    <td style="text-align: center;"><?= $row['nama_wilayah']; ?></td>
                                                    <td style="text-align: center;"><?= $row['nama_lingkungan']; ?></td>
                                                    <td style="text-align: center;"><?= $row['suara']; ?></td>
                                                </tr>


                                            <?php
                                        elseif ($key != 0 && $row['nama_wilayah'] == $w) :
                                            $w = $row['nama_wilayah'];
                                            ?>
                                                <tr>
                                                    <td style="text-align: center;"><?= $i; ?></td>
                                                    <td style="text-align: center;">Ketua Lingkungan <?= $row['nama_lingkungan']; ?></td>
                                                    <td style="text-align: center;"><?= $row['nama']; ?></td>
                                                    <td style="text-align: center;"><?= $row['nama_wilayah']; ?></td>
                                                    <td style="text-align: center;"><?= $row['nama_lingkungan']; ?></td>
                                                    <td style="text-align: center;"><?= $row['suara']; ?></td>
                                                </tr>


                                        <?php
                                        endif;
                                        $i++;
                                    endforeach;
                                        ?>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>

            </div>
        </div>
    </div>