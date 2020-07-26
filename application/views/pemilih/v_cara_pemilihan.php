    <div class="app-main__outer">
        <div class="app-main__inner">

            <div class="app-page-title">
                <div class="page-title-wrapper">
                    <div class="page-title-heading">
                        <div class="page-title-icon">
                            <i class="fas fa-door-open icon-gradient bg-amy-crisp">
                            </i>
                        </div>
                        <div>Selamat Datang <strong><?= $this->session->userdata('nama') ?></strong>
                            <div class="page-title-subheading">
                                <?php if($status_pemilihan_lingkungan_1 == 'selesai' && $status_pemilihan_wilayah_1 == 'selesai' && $status_pemilihan_dph_1 == 'selesai' && $status_pemilihan_koor_wilayah_1 == 'selesai') : ?>
                                    Proses Pemilihan Telah Berakhir !
                                <?php else: ?>
                                    Berikut adalah tata cara pemilihannya
                                <?php endif; ?>
                        </div>
                    </div>
                </div>
            </div>

            <?php if ($this->session->flashdata('flash')) : ?>
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    Password Berhasil <strong><?= $this->session->flashdata('flash'); ?>!</strong>
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
            <?php endif; ?>
            <!-- <div class="alert alert-warning text-center" role="alert" id="pilih">

            </div> -->
            <br>

            <?php if($status_pemilihan_lingkungan_1 == 'selesai' && $status_pemilihan_wilayah_1 == 'selesai' && $status_pemilihan_dph_1 == 'selesai' && $status_pemilihan_koor_wilayah_1 == 'selesai') : ?>

            <div class="main-card mb-3 card-shadow-success">
                <div class="card-body">
                    <h5 class="card-title">Proses Pemilihan Telah Berakhir !</h5>
                    <ul>
                        <li>Terimakasih atas partisipasi Saudara-Saudari sekalian terhadap proses pemilihan Paroki Gereja Kristus Raja Ungaran</li>
                        <li>Silahkan lihat hasil perolehan suara pada tab menu sidebar</li>
                    </ul>
                </div>
            </div>
            <?php else: ?>
            <div class="main-card mb-3 card-shadow-info">
                <div class="card-body">
                    <h5 class="card-title">Tata Cara Pemilihan</h5>
                    <ol>
                        <li>Silahkan pilih jenis kandidat yang ingin sdr/sdri pilih pada menu pemilih</li>
                        <li>Sistem akan memunculkan semua kandidat</li>
                        <li>Tekan Tombol Pilih</li>
                    </ol>
                </div>
            </div>
         <?php endif; ?>
        </div>
    </div>
    </div>
    </div>