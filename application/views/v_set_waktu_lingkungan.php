<div class="app-main__outer">
    <div class="app-main__inner">
        <div class="app-page-title">
            <div class="page-title-wrapper">
                <div class="page-title-heading">
                    <div class="page-title-icon">
                        <i class="fas fa-user-plus icon-gradient bg-premium-dark">
                        </i>
                    </div>
                    <div>Pengaturan Waktu Pemilihan Ketua Lingkungan
                        <div class="page-title-subheading">Silahkan isi formulir di bawah ini !
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="tab-content">
            <div class="tab-pane tabs-animation fade show active" id="tab-content-0" role="tabpanel">
                <div class="row">
                    <div class="col-sm-12 col-xl-6">
                        <div class="main-card mb-3 card">
                            <div class="card-body">
                                <h5 class="card-title">Pengaturan Waktu Pemilihan Ketua Lingkungan </h5>
                                <form class="" enctype="multipart/form-data" method="post">

                                    <div class="form-group">
                                        <label for="" class="">Waktu Pemilihan</label>
                                        <input type="text" name="waktu" autocomplete="off" class="waktu form-control bg-light border-1 small" id="waktu" value="<?php echo set_value('waktu'); ?>">
                                        <?php if (form_error('waktu')) : ?>
                                            <div class="alert alert-danger form-control" role="alert" style="z-index: 1">
                                                <?= form_error('waktu'); ?>
                                            </div>
                                        <?php endif; ?>
                                    </div>
                                    <button id="submit" name="submit" class="mt-1 btn btn-primary" type="submit">Simpan</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>