
            <div class="app-main__outer">
                <div class="app-main__inner">
                    <div class="app-page-title">
                        <div class="page-title-wrapper">
                            <div class="page-title-heading">
                                <div class="page-title-icon">
                                    <i class="pe-7s-users icon-gradient bg-premium-dark">
                                    </i>
                                </div>
                                <div>Edit Kandidat Ketua Wilayah
                                    <div class="page-title-subheading">Silahkan isi formulir di bawah ini !
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="tab-content">
                        <?php if($this->session->flashdata('gagal_upload_foto')): ?>
                            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                              Edit Kandidat <strong> Gagal </strong> Karena Foto <strong><?= $this->session->flashdata('gagal_upload_foto'); ?> !</strong>
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
                                            <h5 class="card-title">Formulir edit Kandidat Ketua Wilayah</h5>
                                            <form class="" enctype="multipart/form-data" method="post">
                                                <input name="dummy" id="dummy" type="hidden" class="form-control-file" value="working">
                                                <div class="position-relative form-group"><label for="exampleFile"
                                                        class="">Foto Kandidat</label>
                                                    <input name="foto" id="foto" type="file" class="form-control-file" value="<?php echo set_value('foto'); ?>" onchange="get_tombol()">
                                                    <?php                                                     
                                                        foreach($kandidat as $row):
                                                    ?>
                                                        <input name="foto_lama" id="foto_lama" type="hidden" class="form-control-file" value="<?= $row['foto'];?>">
                                                        <input name="nama_lama" id="nama_lama" type="hidden" class="form-control-file" value="<?= $row['nama'];?>">
                                                    <?php
                                                        endforeach;
                                                    ?>
                                                        <small class="form-text text-muted">File foto yang diupload harus
                                                        sesuai dengan fomat JPG / JPEG / PNG</small>
                                                </div>
                                                <button class="mt-1 btn btn-primary" id="tombol_edit" type="submit" disabled="disabled">Simpan</button>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>