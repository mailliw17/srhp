<div class="app-main__outer">
    <div class="app-main__inner">
        <div class="app-page-title">
            <div class="page-title-wrapper">
                <div class="page-title-heading">
                    <div class="page-title-icon">
                        <i class="fas fa-poll icon-gradient bg-premium-dark">
                        </i>
                    </div>
                    <div class="">Cari data Pemilih DPH
                        <div class="page-title-subheading"><?= $ket1; ?>
                        </div>
                    </div>
                </div>

                <div class="page-title-actions">
                    <div class="badge badge-pill badge-success">
                        Jumlah pemilih DPH : <?= $jumlah_pemilih_dph; ?>
                    </div>
                </div>
            </div>
        </div>
        <?php if ($this->session->flashdata('edit')) : ?>
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                Edit Pemilih <strong><?= $this->session->flashdata('edit'); ?> !</strong>
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
        <?php endif; ?>

        <?php if ($this->session->flashdata('edit1')) : ?>
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                Hak Pilih DPH Telah Diberikan Ke <strong><?= $this->session->flashdata('edit1'); ?> !</strong>
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
        <?php endif; ?>
        <div class="tab-content">
            <div class="tab-pane tabs-animation fade show active" id="tab-content-0" role="tabpanel">
                <div class="row">
                    <div class="col-sm-12 col-xl-12">
                        <div class="main-card mb-3 card">
                            <div class="card-body">
                                <h5 class="card-title">

                                    <form method="post">
                                        <div class="input-group">
                                            <input type="text" name="keyword" id="keyword" placeholder="Masukan NIK/Nama..." class="form-control col-md-4" style="margin-left: 5px;">
                                            <button type="submit" class="btn-shadow mr-3 btn btn-primary" style="margin-left: 5px;"><i class="fas fa-search fa-sm">&nbsp;Cari</i></button>
                                        </div>
                                    </form>
                                </h5>
                                <?php if($ket2) : ?>
                                    <h1 class="h3 mb-0 text-gray-800" style="text-align: center"><?= $ket2 ; ?></h1>
                                <?php else : ?>
                                    <table class="mb-0 table table-striped">
                                        <thead>
                                            <tr>
                                                <th style="text-align: center;">No</th>
                                                <th style="text-align: center;">NIK</th>
                                                <th style="text-align: center;">Nama</th>
                                                <th style="text-align: center;">Nama Baptis</th>
                                                <th style="text-align: center;">Wilayah</th>
                                                <th style="text-align: center;">Lingkungan</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                                if ($hasil_pencarian == 0): 
                                            ?>
                                                    <tr>
                                                        <td colspan="6" style="text-align: center;">
                                                            <h1 class="h3 mb-0 text-gray-800">No Record Found!</h1>
                                                        </td>
                                                    </tr>
                                            <?php 
                                                else:
                                                    $i = 1;
                                                    foreach ($pemilih as $row) :
                                            ?>
                                                        <tr>
                                                            <td style="text-align: center;"><?= $i; ?></td>
                                                            <td style="text-align: center;"><?= $row['nik']; ?></td>
                                                            <td style="text-align: center;"><?= $row['nama']; ?></td>
                                                            <td style="text-align: center;"><?= $row['nama_baptis']; ?></td>
                                                            <td style="text-align: center;"><?= $row['wilayah']; ?></td>
                                                            <td style="text-align: center;"><?= $row['lingkungan']; ?></td>
                                                        </tr>
                                            <?php
                                                    $i++;
                                                    endforeach;
                                                endif;
                                            ?>
                                        </tbody>
                                    </table>
                                <?php endif; ?>
                                
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>