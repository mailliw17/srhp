<div class="app-main__outer">
    <div class="app-main__inner">
        <div class="app-page-title">
            <div class="page-title-wrapper">
                <div class="page-title-heading">
                    <div class="page-title-icon">
                        <i class="fas fa-user-plus icon-gradient bg-premium-dark">
                        </i>
                    </div>
                    <div>Usulan DPH
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
                                <h5 class="card-title">Formulir usulan DPH</h5>
                                <form class="" enctype="multipart/form-data" method="post" action="<?= base_url() ?>/C_usulanDPh/form_isian2">

                                    <div class="form-group">
                                        <label for="" class="">NIK</label>
                                        <input name="nik" id="nik" placeholder="Isikan nik kandidat..." type="text" value="<?php echo set_value('nik'); ?>" class="form-control">
                                        <?php if (form_error('nik')) : ?>
                                            <div class="alert alert-danger form-control" role="alert" style="z-index: 1">
                                                <?= form_error('nik'); ?>
                                            </div>
                                        <?php endif; ?>
                                    </div>

                                    <div class="form-group">
                                        <label for="" class="">Nama</label>
                                        <input name="nama" id="nama" placeholder="Isikan nama kandidat..." type="text" value="<?php echo set_value('nama'); ?>" class="form-control">
                                        <?php if (form_error('nama')) : ?>
                                            <div class="alert alert-danger form-control" role="alert" style="z-index: 1">
                                                <?= form_error('nama'); ?>
                                            </div>
                                        <?php endif; ?>
                                    </div>

                                    <div class="position-relative form-group"><label for="exampleSelect" class="">Wilayah</label>
                                        <select name="wilayah" id="wilayah" class="form-control">
                                            <option value="" selected disabled>--Silahkan Pilih Wilayah--</option>
                                            <?php
                                            $i = 1;
                                            foreach ($wilayah as $row) :
                                            ?>
                                                <option value="<?= $row['kode_wilayah']; ?>"><?= $row['nama_wilayah']; ?></option>

                                            <?php
                                                $i++;
                                            endforeach;
                                            ?>
                                        </select>
                                        <?php if (form_error('wilayah')) : ?>
                                            <div class="alert alert-danger" role="alert">
                                                <?= form_error('wilayah'); ?>
                                            </div>
                                        <?php endif; ?>
                                    </div>

                                    <div class="position-relative form-group"><label for="exampleSelect" class="">Lingkungan</label>
                                        <select name="lingkungan" id="lingkungan" class="form-control">
                                            <option value="" selected disabled>--Silahkan Pilih Lingkungan--</option>
                                        </select>
                                        <?php if (form_error('lingkungan')) : ?>
                                            <div class="alert alert-danger" role="alert">
                                                <?= form_error('lingkungan'); ?>
                                            </div>
                                        <?php endif; ?>
                                    </div>


                                    <div class="position-relative form-group"><label for="exampleSelect" class="">Jabatan</label>
                                        <select name="jabatan" id="jabatan" class="form-control">
                                            <option value="" selected disabled>--Silahkan Pilih Kandidat--</option>
                                            <?php
                                            $i = 1;
                                            foreach ($dph as $row) :
                                            ?>
                                                <option value="<?= $row['kode_dph']; ?>"><?= $row['kandidat_dph']; ?></option>

                                            <?php
                                                $i++;
                                            endforeach;
                                            ?>
                                        </select>
                                        <?php if (form_error('jabatan')) : ?>
                                            <div class="alert alert-danger" role="alert">
                                                <?= form_error('jabatan'); ?>
                                            </div>
                                        <?php endif; ?>
                                    </div>

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
                                    <button class="mt-1 btn btn-primary" type="submit">Submit</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>