    <div class="app-main__outer">
        <div class="app-main__inner">

            <div class="app-page-title">
                <div class="page-title-wrapper">
                    <div class="page-title-heading">
                        <div class="page-title-icon">
                            <i class="fas fa-users icon-gradient bg-amy-crisp">
                            </i>
                        </div>
                        <div>Menampilkan Calon Bendahara Umum DPH
                            <div class="page-title-subheading">
                            </div>
                        </div>
                    </div>
                </div>
            </div>


            <?php if ($this->session->flashdata('berhasil')) : ?>
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    Kandidat <strong><?= $this->session->flashdata('berhasil'); ?> dipilih !</strong>
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
            <?php endif; ?>
            <?php if($status_pemilihan_dph_1 == 'belum'): ?>
                <div class="alert alert-warning text-center" role="alert">
                    Pemilihan DPH Belum Dibuka ! 
                </div>
            <?php else: ?>
                <?php if ($status_pemilihan_dph_1 == 'selesai'): ?>
                    <div class="alert alert-info text-center" role="alert">
                        Pemilihan DPH Telah Selesai ! 
                    </div>
                <?php else: ?> <!-- berjalan -->
                <?php if ($hs_dph == 0) : ?>
                    <div class="alert alert-info text-center" role="alert">
                        Anda Telah Memilih Bendahara Umum DPH 
                    </div>
                <?php endif; ?>

            <div id="calon" class="tab-content">
                <div class="tab-pane tabs-animation fade show active" id="tab-content-1" role="tabpanel">
                    <div class="row">
                        <?php if ($hs_dph != 0) :
                            if ($kandidat == NULL) :
                        ?>
                                <div class="alert alert-warning col-md-12 text-center" role="alert">
                                    Data calon Bendahara Umum DPH <strong>belum</strong> masuk!
                                </div>
                                <?php
                            else :
                                foreach ($kandidat as $row) :
                                ?>
                                    <div class="col-md-4" style="width: 15rem;">
                                        <div class="main-card mb-3 card">
                                            <img class="card-img-top" src="<?= base_url(); ?>foto/dph/<?= $row['foto']; ?>" alt="Card image cap" width="300" height="300">
                                            <div class="card-body text-center">
                                                <h5 class="card-title "><?= $row['nama'] ?></h5>
                                                <!-- <p class="card-text">Wilayah : Boyolali <br> Lingkungan : Kucing</p> -->
                                                <a href="#" data-toggle="modal" data-target="#pilihC81<?= $row['id'] ?>" class="btn btn-primary">Pilih</a>
                                            </div>
                                        </div>
                                    </div>
                                <?php
                                endforeach;
                            endif;
                        else :
                            foreach ($C8 as $row) :
                                ?>
                                <div class="card-body">
                                    <h5 class="card-title">kandidat yang anda pilih :</h5>
                                    <div class="col-md-6" style="width: 25rem;">
                                        <div class="main-card mb-3 card">
                                            <img class="card-img-top" src="<?= base_url(); ?>foto/dph/<?= $row['foto']; ?>" alt="Card image cap" width="400" height="300">
                                            <div class="card-body text-center">
                                                <h5 class="card-title "><?= $row['nama'] ?></h5>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                        <?php endforeach;
                        endif; ?>

                    </div>
                    <?php endif ;endif; ?>
                    <div class="row">
                        <?php if($status_pemilihan_dph_1 == 'selesai'): ?>
                            <?php if($hs_dph != 0) : ?>
                                <div class="alert alert-danger text-center" role="alert" style="margin-left: 15px;">
                                    Anda Tidak Menggunakan Hak Suara Anda!
                                </div>
                            <?php else : ?>
                                <?php foreach ($C8 as $row) :
                                    ?>
                                    <div class="card-body">
                                        <h5 class="card-title">kandidat yang anda pilih :</h5>
                                        <div class="col-md-6" style="width: 25rem;">
                                            <div class="main-card mb-3 card">
                                                <img class="card-img-top" src="<?= base_url(); ?>foto/dph/<?= $row['foto']; ?>" alt="Card image cap" width="400" height="300">
                                                <div class="card-body text-center">
                                                    <h5 class="card-title "><?= $row['nama'] ?></h5>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                <?php endforeach; ?>
                            <?php endif; ?>
                        <?php endif; ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>
    </div>