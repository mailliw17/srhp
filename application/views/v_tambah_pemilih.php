<div class="app-main__outer">
    <div class="app-main__inner">
        <div class="app-page-title">
            <div class="page-title-wrapper">
                <div class="page-title-heading">
                    <div class="page-title-icon">
                        <i class="fas fa-user-plus icon-gradient bg-premium-dark">
                        </i>
                    </div>
                    <div>Tambah Pemilih
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
                                <form class="" enctype="multipart/form-data" method="post">

                                    <div class="form-group">
                                        <label for="" class="">NIK</label>
                                        <input name="nik" id="nik" placeholder="Masukan nik ..." type="text" value="<?php echo set_value('nik'); ?>" class="form-control" autocomplete="off">
                                        <?php if (form_error('nik')) : ?>
                                            <div class="alert alert-danger form-control" role="alert" style="z-index: 1">
                                                <?= form_error('nik'); ?>
                                            </div>
                                        <?php endif; ?>
                                    </div>

                                    <div class="form-group">
                                        <label for="" class="">Nomor Kartu Keluarga</label>
                                        <input name="no_kk" id="no_kk" placeholder="Masukan Nomor Kartu Keluarga..." type="text" value="<?php echo set_value('no_kk'); ?>" class="form-control autocomplete="off"">
                                        <?php if (form_error('no_kk')) : ?>
                                            <div class="alert alert-danger form-control" role="alert" style="z-index: 1">
                                                <?= form_error('no_kk'); ?>
                                            </div>
                                        <?php endif; ?>
                                    </div>

                                    <div class="form-group">
                                        <label for="" class="">Tempat Lahir</label>
                                        <input name="tempat_lahir" id="tempat_lahir" placeholder="Masukan tempat lahir..." type="text" value="<?php echo set_value('tempat_lahir'); ?>" class="form-control" autocomplete="off">
                                        <!-- <?php if (form_error('tempat_lahir')) : ?>
                                            <div class="alert alert-danger form-control" role="alert" style="z-index: 1">
                                                <?= form_error('tempat_lahir'); ?>
                                            </div>
                                        <?php endif; ?> -->
                                    </div>

                                    <div class="form-group">
                                        <label for="" class="">Tanggal Lahir</label>
                                        <input name="tanggal_lahir" id="tanggal_lahir" placeholder="Masukan tanggal lahir..." type="text" value="<?php echo set_value('tanggal_lahir'); ?>" autocomplete="off" class="waktu form-control border-1 small">
                                        <!-- <?php if (form_error('tanggal_lahir')) : ?>
                                            <div class="alert alert-danger form-control" role="alert" style="z-index: 1">
                                                <?= form_error('tanggal_lahir'); ?>
                                            </div>
                                        <?php endif; ?> -->
                                    </div>

                                    <div class="form-group">
                                        <label for="" class="">Alamat</label>
                                        <input name="alamat" id="alamat" placeholder="Masukan alamat..." type="text" value="<?php echo set_value('alamat'); ?>" class="form-control" autocomplete="off">
                                        <!-- <?php if (form_error('alamat')) : ?>
                                            <div class="alert alert-danger form-control" role="alert" style="z-index: 1">
                                                <?= form_error('alamat'); ?>
                                            </div>
                                        <?php endif; ?> -->
                                    </div>

                                    <div class="form-group">
                                        <label for="" class="">Kabupaten / Kota</label>
                                        <input name="kabkota" id="kabkota" placeholder="Masukan kabupaten/kota..." type="text" value="<?php echo set_value('kabkota'); ?>" class="form-control" autocomplete="off">
                                        <!-- <?php if (form_error('kabkota')) : ?>
                                            <div class="alert alert-danger form-control" role="alert" style="z-index: 1">
                                                <?= form_error('kabkota'); ?>
                                            </div>
                                        <?php endif; ?> -->
                                    </div>

                                    <div class="form-group">
                                        <label for="" class="">Kecamatan</label>
                                        <input name="kecamatan" id="kecamatan" placeholder="Masukan kecamatan..." type="text" value="<?php echo set_value('kecamatan'); ?>" class="form-control" autocomplete="off">
                                        <!-- <?php if (form_error('kecamatan')) : ?>
                                            <div class="alert alert-danger form-control" role="alert" style="z-index: 1">
                                                <?= form_error('kecamatan'); ?>
                                            </div>
                                        <?php endif; ?> -->
                                    </div>

                                    <div class="form-group">
                                        <label for="" class="">Kelurahan</label>
                                        <input name="kelurahan" id="kelurahan" placeholder="Masukan kelurahan..." type="text" value="<?php echo set_value('kelurahan'); ?>" class="form-control" autocomplete="off">
                                        <!-- <?php if (form_error('kelurahan')) : ?>
                                            <div class="alert alert-danger form-control" role="alert" style="z-index: 1">
                                                <?= form_error('kelurahan'); ?>
                                            </div>
                                        <?php endif; ?> -->
                                    </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-12 col-xl-6">
                        <div class="main-card mb-3 card">
                            <div class="card-body">

                                 <div class="form-group">
                                        <label for="" class="">Nama</label>
                                        <input name="nama" id="nama" placeholder="Masukan nama ..." type="text" value="<?php echo set_value('nama'); ?>" class="form-control" autocomplete="off">
                                        <?php if (form_error('nama')) : ?>
                                            <div class="alert alert-danger form-control" role="alert" style="z-index: 1">
                                                <?= form_error('nama'); ?>
                                            </div>
                                        <?php endif; ?>
                                    </div>

                                    <div class="form-group">
                                        <label for="" class="">Nama Baptis</label>
                                        <input name="nama_baptis" id="nama_baptis" placeholder="Masukan nama baptis..." type="text" value="<?php echo set_value('nama_baptis'); ?>" class="form-control" autocomplete="off">
                                        <?php if (form_error('nama_baptis')) : ?>
                                            <div class="alert alert-danger form-control" role="alert" style="z-index: 1">
                                                <?= form_error('nama_baptis'); ?>
                                            </div>
                                        <?php endif; ?>
                                    </div>

                                    <div class="form-group">
                                        <label for="" class="">Jenis Kelamin</label>
                                        <select name="jenis_kelamin" id="jenis_kelamin" class="form-control" autocomplete="off">
                                            <option value="" selected disabled>--Silahkan Pilih Jenis Kelamin--</option>
                                            <option value="1">Laki-laki</option>
                                            <option value="2">Perempuan</option>
                                        </select>
                                        <?php if (form_error('jenis_kelamin')) : ?>
                                            <div class="alert alert-danger form-control" role="alert" style="z-index: 1">
                                                <?= form_error('jenis_kelamin'); ?>
                                            </div>
                                        <?php endif; ?>
                                    </div>

                                    <div class="position-relative form-group"><label for="exampleSelect" class="">Wilayah</label>
                                        <select name="wilayah" id="wilayah" class="form-control" autocomplete="off">
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
                                        <select name="lingkungan" id="lingkungan" class="form-control" autocomplete="off">
                                            <option value="" selected disabled>--Silahkan Pilih Lingkungan--</option>
                                        </select>
                                        <?php if (form_error('lingkungan')) : ?>
                                            <div class="alert alert-danger" role="alert">
                                                <?= form_error('lingkungan'); ?>
                                            </div>
                                        <?php endif; ?>
                                    </div>

                                    <div class="form-group">
                                        <label for="" class="">Telepon</label>
                                        <input name="telepon" id="telepon" placeholder="Masukan no Telepon..." type="text" value="<?php echo set_value('telepon'); ?>" class="form-control" autocomplete="off">
                                        <!-- <?php if (form_error('telepon')) : ?>
                                            <div class="alert alert-danger form-control" role="alert" style="z-index: 1">
                                                <?= form_error('telepon'); ?>
                                            </div>
                                        <?php endif; ?> -->
                                    </div>

                                    <div class="form-group">
                                        <label for="" class="">Email (tidak wajib)</label>
                                        <input name="email" id="email" placeholder="Masukan Email ..." type="text" value="<?php echo set_value('email'); ?>" class="form-control" autocomplete="off">
                                        <?php if (form_error('email')) : ?>
                                            <div class="alert alert-danger form-control" role="alert" style="z-index: 1">
                                                <?= form_error('email'); ?>
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