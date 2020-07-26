<div class="app-main__outer">
    <div class="app-main__inner">
        <div class="app-page-title">
            <div class="page-title-wrapper">
                <div class="page-title-heading">
                    <div class="page-title-icon">
                        <i class="fas fa-unlock-alt icon-gradient bg-premium-dark">
                        </i>
                    </div>
                    <div>Ganti Password <?= $this->session->userdata('akses'); ?>
                        <div class="page-title-subheading">Silahkan isi formulir di bawah ini !
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="tab-content">
            <?php if ($this->session->flashdata('flash')) : ?>
                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                    <strong><?= $this->session->flashdata('flash'); ?> !</strong>
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
                                <h5 class="card-title">Formulir Ganti Password</h5>
                                <form class="" method="post">

                                    <div class="form-group">
                                        <label for="" class="">Password Lama</label>
                                        <input name="pass_lama" id="pass_lama" placeholder="Masukan password Lama" type="password" class="form-control" onchange="get_tombol1()">
                                        <?php if (form_error('pass_lama')) : ?>
                                            <div class="alert alert-danger form-control" role="alert" style="z-index: 1">
                                                <?= form_error('pass_lama'); ?>
                                            </div>
                                        <?php endif; ?>
                                    </div>

                                    <div class="form-group">
                                        <label for="" class="">Passwor Baru</label>
                                        <input name="pass_baru" id="pass_baru" placeholder="Masukan password baru" type="password" class="form-control">
                                        <?php if (form_error('pass_baru')) : ?>
                                            <div class="alert alert-danger form-control" role="alert" style="z-index: 1">
                                                <?= form_error('pass_baru'); ?>
                                            </div>
                                        <?php endif; ?>
                                    </div>

                                    <div class="form-group">
                                        <label for="" class="">Konfirmasi Password</label>
                                        <input name="conf_password" id="conf_password" placeholder="Konfirmasi Password" type="password" class="form-control">
                                        <?php if (form_error('conf_password')) : ?>
                                            <div class="alert alert-danger form-control" role="alert" style="z-index: 1">
                                                <?= form_error('conf_password'); ?>
                                            </div>
                                        <?php endif; ?>
                                    </div>

                                    <button class="mt-1 btn btn-primary" type="submit" id="tombol_save">Submit</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>