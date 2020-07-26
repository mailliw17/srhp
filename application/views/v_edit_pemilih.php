
            <div class="app-main__outer">
                <div class="app-main__inner">
                    <div class="app-page-title">
                        <div class="page-title-wrapper">
                            <div class="page-title-heading">
                                <div class="page-title-icon">
                                    <i class="pe-7s-users icon-gradient bg-premium-dark">
                                    </i>
                                </div>
                                <div>Edit Data Pemilih
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
                                            <h5 class="card-title">Formulir edit data Pemilih</h5>
                                            <form class="" enctype="multipart/form-data" method="post">
                                                <?php                                                     
                                                    foreach($pemilih as $row):
                                                ?>

                                                <div class="form-group">
                                                    <label for="" class="">NIK</label>

                                                    <input name="nik_lama" id="nik_lama" type="hidden" class="form-control-file" value="<?= $row['nik'];?>">

                                                    <input name="dummy" id="dummy" type="hidden" class="form-control-file" value="working">

                                                    <input name="nik" id="nik" placeholder="<?= $row['nik']; ?>"
                                                        type="text" value="<?php echo set_value('nik'); ?>" class="form-control" onchange= "get_tombol()">
                                                    <?php if (form_error('nik')): ?>
                                                        <div class="alert alert-danger form-control" role="alert" style="z-index: 1">
                                                        <?= form_error('nik'); ?>                      
                                                        </div>
                                                    <?php endif; ?>
                                                </div>

                                                <div class="form-group">
                                                    <label for="" class="">Nama</label>

                                                    <input name="nama_lama" id="nama_lama" type="hidden" class="form-control-file" value="<?= $row['nama'];?>">

                                                    <input name="nama" id="nama" placeholder="<?= $row['nama']; ?>"
                                                        type="text" value="<?php echo set_value('nama'); ?>" class="form-control" onchange= "get_tombol()">
                                                    <?php if (form_error('nama')): ?>
                                                        <div class="alert alert-danger form-control" role="alert" style="z-index: 1">
                                                        <?= form_error('nama'); ?>                      
                                                        </div>
                                                    <?php endif; ?>
                                                </div>

                                                <?php
                                                    endforeach;
                                                ?>

                                                <?php                                                     
                                                    foreach($pemilih as $row):
                                                ?>
                                                    <div class="position-relative form-group"><label for="exampleSelect"
                                                            class="">Wilayah</label>

                                                        <input name="wilayah_lama" id="wilayah_lama" type="hidden" class="form-control-file" value="<?= $row['kode_wilayah'];?>">

                                                        <select name="wilayah" id="wilayah" class="form-control" onchange="get_tombol()">
                                                            <option value="" selected disabled><?= $row['wilayah']; ?></option>

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
                                                    </div>
                                                <?php
                                                    endforeach;
                                                ?>

                                                <?php                                                     
                                                    foreach($pemilih as $row):
                                                ?>
                                                <div class="position-relative form-group"><label for="exampleSelect"
                                                        class="">Lingkungan</label>
                                                    <input name="lingkungan_lama" id="lingkungan_lama" type="hidden" class="form-control-file" value="<?= $row['kode_lingkungan'];?>">
                                                    <select name="lingkungan" id="lingkungan" class="form-control" onchange="get_tombol()">
                                                        <option value="" selected disabled><?= $row['lingkungan']; ?></option>
                                                    </select>
                                                </div>

                                                <?php
                                                    endforeach;
                                                ?>


                                                <?php                                                     
                                                    foreach($pemilih as $row):
                                                        if($row['tipe'] == 1):
                                                ?>
                                                    <div class="position-relative form-group">
                                                        <input type="checkbox" id="hak_suara_dph" name="hak_suara_dph" value="2" onchange="get_tombol()">
                                                        <label for="hak_suara_dph">Hilangkan Hak Pilih DPH</label>
                                                    </div>
                                                <?php
                                                        endif;
                                                    endforeach; 
                                                ?>
                                                <button class="mt-1 btn btn-primary" id="tombol_edit" type="submit" disabled="disabled">Simpan</button>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>