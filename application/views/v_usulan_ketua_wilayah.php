<div class="app-main__outer">
    <div class="app-main__inner">
        <div class="app-page-title">
            <div class="page-title-wrapper">
                <div class="page-title-heading">
                    <div class="page-title-icon">
                        <i class="fas fa-user-plus icon-gradient bg-premium-dark">
                        </i>
                    </div>
                    <div>Usulan Ketua Wilayah
                        <div class="page-title-subheading">Silahkan isi formulir di bawah ini !
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="tab-content">
            <?php if ($this->session->flashdata('gagal_upload_foto')) : ?>
                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                    Kandidat <strong> Gagal </strong> Ditambahkan, Karena Foto <strong><?= $this->session->flashdata('gagal_upload_foto'); ?> !</strong>
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
            <?php endif; ?>
            <?php if ($this->session->flashdata('nama_sama')) : ?>
                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                    Kandidat <strong> Gagal </strong> Ditambahkan, Karena Nama <strong><?= $this->session->flashdata('nama_sama'); ?> !</strong>
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
            <?php endif; ?>
            <div class="tab-pane tabs-animation fade show active" id="tab-content-0" role="tabpanel">
                <div class="row">
                    <div class="col-sm-12 col-xl-6">
                        <div class="main-card mb-3 card">
                            <div class="card-body">
                                <h5 class="card-title">Formulir Usulan Ketua Wilayah</h5>
                                <form class="" enctype="multipart/form-data" method="post">

                                    <div class="form-group">
                                        <label for="" class="">NIK</label>
                                        <input name="nik" id="nik" placeholder="Isikan nik kandidat..." type="text" value="<?php echo set_value('nik'); ?>" class="form-control">
                                        <?php if (form_error('nik')) : ?>
                                            <div class="alert alert-danger form-control" role="alert" style="z-index: 1">
                                                <?= form_error('nik'); ?>
                                            </div>
                                        <?php endif; ?>

                                        <button class="mt-1 btn btn-success" type="button" onclick="autofill_wilayah()"><i class="fas fa-search"></i>&nbsp;cek</button>

                                        <div class="alert alert-danger" role="alert" id="not_found" name="not_found" style="display: none;">

                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label for="" class="" id="l_nama" style="display: none;">Nama</label>
                                        <input name="nama" id="nama" placeholder="Isikan nama kandidat..." type="text" value="<?php echo set_value('nama'); ?>" class="form-control" style="display: none;" readonly>
                                    </div>

                                    <div class="form-group">
                                        <label for="" class="" id="l_wilayah" style="display: none;">Wilayah</label>
                                        <input name="wilayah" id="wilayah" placeholder="Isikan wilayah kandidat..." type="text" value="<?php echo set_value('wilayah'); ?>" class="form-control" style="display: none;" readonly>
                                    </div>

                                    <div class="form-group">
                                        <label for="" class="" id="l_lingkungan" style="display: none;">Lingkungan</label>
                                        <input name="lingkungan" id="lingkungan" placeholder="Isikan lingkungan kandidat..." type="text" value="<?php echo set_value('lingkungan'); ?>" class="form-control" style="display: none;" readonly>
                                    </div>

                                    <input name="kode_wilayah" id="kode_wilayah" type="text" class="form-control" style="display: none;">
                                    <input name="kode_lingkungan" id="kode_lingkungan" type="text" class="form-control" style="display: none;">
                                    <div class="position-relative form-group"><label for="exampleFile" class="">Foto Kandidat</label>
                                        <input name="foto" id="foto" type="file" class="form-control-file" value="<?php echo set_value('foto'); ?>">
                                        <small class="form-text text-muted">File foto yang diupload harus
                                            sesuai dengan fomat JPG / JPEG / PNG</small>
                                        <?php if ($this->session->flashdata('no_foto')) : ?>
                                            <div class="alert alert-danger" role="alert">
                                                <?= $this->session->flashdata('no_foto'); ?>
                                            </div>
                                        <?php endif; ?>
                                    </div>
                                    <button id="submit" name="submit" class="mt-1 btn btn-primary" type="submit" disabled>Submit</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>