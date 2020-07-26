<div class="app-main__outer">
    <div class="app-main__inner">
        <div class="app-page-title">
            <div class="page-title-wrapper">
                <div class="page-title-heading">
                    <div class="page-title-icon">
                        <i class="fas fa-mouse-pointer">
                        </i>
                    </div>
                    <div>Seleksi Kandidat - DPH
                        <div class="page-title-subheading"><?= $ket; ?>
                        </div>
                    </div>
                </div>

                <div class="page-title-actions">
                    <button type="button" class="btn-shadow mr-3 btn btn-warning" data-toggle="modal" data-target="#modalSeleksi">
                        <i class="fas fa-hand-pointer"> Pilih Jenis</i>
                    </button>
                </div>
            </div>
        </div>
        <?php if ($this->session->flashdata('terima')) : ?>
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                Kandidat Telah <strong><?= $this->session->flashdata('terima'); ?> !</strong>
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
        <?php endif; ?>
        <?php if ($this->session->flashdata('tolak')) : ?>
            <div class="alert alert-warning alert-dismissible fade show" role="alert">
                Kandidat <strong><?= $this->session->flashdata('tolak'); ?> !</strong>
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
        <?php endif; ?>
        <?php if ($this->session->flashdata('berhasil')) : ?>
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                Edit Kandidat <strong><?= $this->session->flashdata('berhasil'); ?> !</strong>
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
        <?php endif; ?>
        <div class="row">
            <div class="col-lg-12">
                <div class="main-card mb-3 card">
                    <div class="card-body">
                        <table class="mb-0 table table-striped">
                            <thead>
                                <tr>
                                    <th style="text-align: center;">No</th>
                                    <th style="text-align: center;">Nama</th>
                                    <th style="text-align: center;">Wilayah</th>
                                    <th style="text-align: center;">Lingkungan</th>
                                    <th style="text-align: center;">Foto</th>
                                    <th style="text-align: center;">Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $i = 1;
                                if ($total != 0) :
                                    foreach ($usulan_dph as $row) :
                                ?>
                                        <tr>
                                            <td style="text-align: center;"><?= $i; ?></td>
                                            <td style="text-align: center;"><?= $row['nama']; ?></td>
                                            <td style="text-align: center;"><?= $row['nama_wilayah']; ?></td>
                                            <td style="text-align: center;"><?= $row['nama_lingkungan']; ?></td>
                                            <td style="text-align: center;"><img src="
                                                        <?php
                                                        $url1 = base_url();
                                                        $url2 = $url1 . 'foto/dph';
                                                        echo $url2;

                                                        ?>/<?= $row['foto']; ?>" width="100" height="100"></td>
                                            <td style="text-align: center;">
                                                <a href="<?= base_url(); ?>C_SeleksiDph/edit/<?= $row['id']; ?>">
                                                    <button type="button" class="btn btn-warning btn-sm">Edit</button>
                                                </a>
                                                <a href="#" data-toggle="modal" data-target="#Modal_tolak<?= $row['id']; ?>">
                                                    <button type="button" class="btn btn-danger btn-sm">Tolak</button>
                                                </a>
                                                <a href="#" data-toggle="modal" data-target="#Modal_terima<?= $row['id']; ?>">
                                                    <button type="button" class="btn btn-success btn-sm">Terima</button>
                                                </a>
                                            </td>
                                        </tr>
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
                                elseif ($usulan_dph == NULL && !($this->session->userdata('jenis_kandidat')) && $total == 0) :
                                ?>
                                    <tr>
                                        <td colspan="6" style="text-align: center;">
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