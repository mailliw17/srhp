            
            <div class="app-main__outer">
                <div class="app-main__inner">
                    <div class="row">
                        <div class="col-md-12 col-xl-4">
                            <div class="card mb-3 widget-content bg-midnight-bloom">
                                <div class="widget-content-wrapper text-white">
                                    <div class="widget-content-left">
                                        <div class="widget-heading">Pemilih</div>
                                        <div class="widget-subheading">Jumlah pemilih</div>
                                    </div>
                                    <div class="widget-content-right">
                                        <div class="widget-numbers text-white"><span><?= $jumlah_pemilih; ?></span></div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="col-md-12 col-xl-4">
                            <div class="card mb-3 widget-content bg-midnight-bloom">
                                <div class="widget-content-wrapper text-white">
                                    <div class="widget-content-left">
                                        <div class="widget-heading">Pemilih</div>
                                        <div class="widget-subheading">Jumlah pemilih pria</div>
                                    </div>
                                    <div class="widget-content-right">
                                        <div class="widget-numbers text-white"><span><?= $jumlah_pemilih_pria; ?></span></div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="col-md-12 col-xl-4">
                            <div class="card mb-3 widget-content bg-midnight-bloom">
                                <div class="widget-content-wrapper text-white">
                                    <div class="widget-content-left">
                                        <div class="widget-heading">Pemilih</div>
                                        <div class="widget-subheading">Jumlah pemilih wanita</div>
                                    </div>
                                    <div class="widget-content-right">
                                        <div class="widget-numbers text-white"><span><?= $jumlah_pemilih_wanita; ?></span></div>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>
                    <div class="row">    
                        <div class="col-md-12 col-xl-12">
                            <div class="card-shadow-<?php if($suara_terpakai >= 0 && $suara_terpakai <= 35){
                                                        echo 'danger';
                                                        }elseif ($suara_terpakai > 35 && $suara_terpakai <= 75){
                                                            echo 'warning';
                                                        }else{
                                                            echo 'success';
                                                        }
                                                    ?> mb-3 text-left card">
                                <div class="widget-content">
                                    <div class="widget-content-outer">
                                        <div class="widget-content-wrapper">
                                            <div class="widget-content-left fsize-1">
                                                <div class="text-muted opacity-6">Total Suara Masuk</div>
                                            </div>
                                            <div class="widget-content-left pr-2 fsize-1">
                                                <div class="widget-numbers mt-0 fsize-3 text-<?php if($suara_terpakai >= 0 && $suara_terpakai <= 35){
                                                        echo 'danger';
                                                        }elseif ($suara_terpakai > 35 && $suara_terpakai <= 75){
                                                            echo 'warning';
                                                        }else{
                                                            echo 'success';
                                                        }
                                                    ?>"><?= $suara_terpakai; ?>%</div>
                                            </div>
                                            <div class="widget-content-right w-100">
                                                <div class="progress-bar-xs progress">
                                                    <div class="progress-bar bg-

                                                    <?php if($suara_terpakai >= 0 && $suara_terpakai <= 35){
                                                        echo 'danger';
                                                        }elseif ($suara_terpakai > 35 && $suara_terpakai <= 75){
                                                            echo 'warning';
                                                        }else{
                                                            echo 'success';
                                                        }
                                                    ?>" role="progressbar"
                                                        aria-valuenow="54" aria-valuemin="0" aria-valuemax="100"
                                                        style="width: <?= $suara_terpakai; ?>%;"></div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <?php if ($status_pemilihan_lingkungan_1 == 'selesai' && $status_pemilihan_wilayah_1 == 'selesai' && $status_pemilihan_koor_wilayah_1 == 'selesai' && $status_pemilihan_dph_1 == 'selesai') : ?>
                        <div class="row justify-content-md-center">
                            <div class="col-md-12 col-xl-8">
                                <a href="<?php echo base_url() . 'C_RekapSuara' ?>">
                                    <div class="card mb-3  widget-content bg-info">
                                        <div class="widget-content-wrapper text-white">
                                            <div class="widget-content-center">
                                                <div class="widget-heading">Pemilihan Telah Berakhir</div>
                                                <div class="widget-subheading"><strong>Klik Untuk Melihat hasil Pemilihan</strong></div>
                                            </div>
                                        </div>
                                    </div>
                                </a>
                            </div>
                        </div>
                    <?php else: ?>
                        <div class="row">
                            <?php if($status_pemilihan_lingkungan_1 == 'belum') : ?>
                                <div class="col-md-12 col-xl-4">
                                    <a href="#" data-toggle="modal" data-target="#Modal_setLingkungan1">
                                        <div class="card mb-3 widget-content bg-grow-early">
                                            <div class="widget-content-wrapper text-white">
                                                <div class="widget-content-left">
                                                    <div class="widget-heading">Buka Pemlihan <strong>Ketua Lingkungan</strong></div>
                                                    <div class="widget-subheading">Klik untuk membuka pemilihan ketua lingkungan</div>
                                                </div>
                                            </div>
                                        </div>
                                    </a>
                                </div>
                            <?php else: ?>
                                <div class="col-md-12 col-xl-4">
                                    <?php if ($status_pemilihan_lingkungan_1 != 'selesai'): ?>
                                    <a href="#" data-toggle="modal" data-target="#Modal_setLingkungan2">
                                        <div class="card mb-3 widget-content bg-danger">
                                            <div class="widget-content-wrapper text-white">
                                                <div class="widget-content-left">
                                                    <div class="widget-heading">Tutup Pemlihan <strong>Ketua Lingkungan </strong></div>
                                                    <div class="widget-subheading">Klik untuk menutup pemilihan ketua lingkungan</div>
                                                </div>
                                            </div>
                                        </div>
                                    </a>
                                    <?php else : ?>
                                        <div class="card mb-3 widget-content bg-info">
                                            <div class="widget-content-wrapper text-white">
                                                <div class="widget-content-left">
                                                    <div class="widget-heading">Pemilihan Ketua Lingkungan </div>
                                                    <div class="widget-subheading"><strong>Selesai</strong></div>
                                                </div>
                                            </div>
                                        </div>
                                    <?php endif ; ?>
                                </div>
                            <?php endif; ?>

                            <?php if($status_pemilihan_wilayah_1 == 'belum') : ?>
                                <div class="col-md-12 col-xl-4">
                                    <a href="#" data-toggle="modal" data-target="#Modal_setWilayah1">
                                        <div class="card mb-3 widget-content bg-grow-early">
                                            <div class="widget-content-wrapper text-white">
                                                <div class="widget-content-left">
                                                    <div class="widget-heading">Buka Pemlihan <strong>Ketua Wilayah </strong></div>
                                                    <div class="widget-subheading">Klik untuk membuka pemilihan ketua wilayah</div>
                                                </div>
                                            </div>
                                        </div>
                                    </a>
                                </div>
                            <?php else: ?>
                                <div class="col-md-12 col-xl-4">
                                    <?php if ($status_pemilihan_wilayah_1 != 'selesai'): ?>
                                    <a href="#" data-toggle="modal" data-target="#Modal_setWilayah2">
                                        <div class="card mb-3 widget-content bg-danger">
                                            <div class="widget-content-wrapper text-white">
                                                <div class="widget-content-left">
                                                    <div class="widget-heading">Tutup Pemlihan <strong>Ketua Wilayah</strong></div>
                                                    <div class="widget-subheading">Klik untuk menutup pemilihan ketua wilayah</div>
                                                </div>
                                            </div>
                                        </div>
                                    </a>
                                    <?php else : ?>
                                        <?php if ($status_pemilihan_koor_wilayah_1 == 'belum'): ?>
                                            <a href="#" data-toggle="modal" data-target="#Modal_setKoorWilayah1">
                                                <div class="card mb-3 widget-content bg-grow-early">
                                                    <div class="widget-content-wrapper text-white">
                                                        <div class="widget-content-left">
                                                            <div class="widget-heading">Buka Pemlihan <strong>Koordinator Wilayah</strong></div>
                                                            <div class="widget-subheading">Klik untuk membuka pemilihan Koordinator wilayah</div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </a>
                                        <?php else : ?>
                                            <?php if($status_pemilihan_koor_wilayah_1 != 'selesai'): ?>
                                                <a href="#" data-toggle="modal" data-target="#Modal_setKoorWilayah2">
                                                    <div class="card mb-3 widget-content bg-danger">
                                                        <div class="widget-content-wrapper text-white">
                                                            <div class="widget-content-left">
                                                                <div class="widget-heading">Tutup Pemlihan Koordinator Wilayah</div>
                                                                <div class="widget-subheading">Klik untuk menutup pemilihan Koordinator wilayah</div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </a>
                                            <?php elseif($status_pemilihan_koor_wilayah_1 == 'selesai' && $status_pemilihan_wilayah_1 == 'selesai'): ?>
                                                <div class="card mb-3 widget-content bg-info">
                                                    <div class="widget-content-wrapper text-white">
                                                        <div class="widget-content-left">
                                                            <div class="widget-heading">Pemilihan Ketua Wilayah</div>
                                                            <div class="widget-subheading"><strong>Selesai</strong></div>
                                                        </div>
                                                    </div>
                                                </div>
                                            <?php endif; ?>
                                        <?php endif ; ?>
                                    <?php endif ; ?>
                                </div>
                            <?php endif; ?>

                            <?php if($status_pemilihan_dph_1 == 'belum') : ?>
                                <div class="col-md-12 col-xl-4">
                                    <a href="#" data-toggle="modal" data-target="#Modal_setDPH1">
                                        <div class="card mb-3 widget-content bg-grow-early">
                                            <div class="widget-content-wrapper text-white">
                                                <div class="widget-content-left">
                                                    <div class="widget-heading">Buka Pemlihan <strong>DPH</strong></div>
                                                    <div class="widget-subheading">Klik untuk membuka pemilihan DPH</div>
                                                </div>
                                            </div>
                                        </div>
                                    </a>
                                </div>
                            <?php else: ?>
                                <div class="col-md-12 col-xl-4">
                                    <?php if ($status_pemilihan_dph_1 != 'selesai'): ?>
                                    <a href="#" data-toggle="modal" data-target="#Modal_setDPH2">
                                        <div class="card mb-3 widget-content bg-danger">
                                            <div class="widget-content-wrapper text-white">
                                                <div class="widget-content-left">
                                                    <div class="widget-heading">Tutup Pemlihan <strong>DPH</strong></div>
                                                    <div class="widget-subheading">Klik untuk menutup pemilihan DPH</div>
                                                </div>
                                            </div>
                                        </div>
                                    </a>
                                    <?php else : ?>
                                        <div class="card mb-3 widget-content bg-info">
                                            <div class="widget-content-wrapper text-white">
                                                <div class="widget-content-left">
                                                    <div class="widget-heading">Pemilihan DPH</div>
                                                    <div class="widget-subheading"><strong>Selesai</strong></div>
                                                </div>
                                            </div>
                                        </div>
                                    <?php endif ; ?>
                                </div>
                            <?php endif; ?>
                            
                        </div>
                    <?php endif; ?>
                    <?php if($this->session->flashdata('flash')): ?>
                        <div class="alert alert-success alert-dismissible fade show" role="alert">
                            Password Berhasil <strong><?= $this->session->flashdata('flash'); ?>!</strong>
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                    <?php endif; ?>

                    <?php if($this->session->flashdata('kandidat_dph')): ?>
                        <div class="alert alert-success alert-dismissible fade show" role="alert">
                            Kandidat DPH <strong><?= $this->session->flashdata('kandidat_dph'); ?></strong> ditambahkan!
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                    <?php endif; ?>

                    <?php if($this->session->flashdata('kandidat_lingkungan')): ?>
                        <div class="alert alert-success alert-dismissible fade show" role="alert">
                            Kandidat Ketua Lingkungan <strong><?= $this->session->flashdata('kandidat_lingkungan'); ?></strong> ditambahkan!
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                    <?php endif; ?>

                    <?php if($this->session->flashdata('kandidat_wilayah')): ?>
                        <div class="alert alert-success alert-dismissible fade show" role="alert">
                            Kandidat Ketua Wilayah <strong><?= $this->session->flashdata('kandidat_wilayah'); ?></strong> ditambahkan!
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                    <?php endif; ?>


                    <!-- <?php var_dump($suara); ?> -->
                    <!-- <?php var_dump($this->session->userdata('koor_wilayah')); ?> -->

                    <!-- CHART LINE -->
                    <div class="row"> 
                        <div class="col-xl-8 col-md-12">
                            <div class="card shadow mb-4">
                                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                                    <h6 class="m-0 font-weight-bold text-primary"><i class="fas fa-chart-bar"></i> &nbsp;Grafik Jumlah Suara <span id="ket_kandidat" class="text-dark"></span>


                                        <!-- <u>
                                        <?php
                                            if($this->session->userdata('ket1')){
                                                echo $this->session->userdata('ket1');
                                            } 
                                        ?></u> -->
                                    </h6> 
                                </div>
                                <div class="card-body" style="margin-top: -35px">
                                    <div class="input-group" style="margin-top: 20px; justify-content: center;">
                                        <select class="form-control custom-select bg-light border-1 small col-md-4" name="jenis_kandidat" id="jenis_kandidat" onchange="isi7(this.value);" style="margin-top: 10px;">
                                            <option value =''>Jenis Kandidat</option>
                                            <?php 
                                                $i = 1;
                                                foreach ( $jenis_kandidat as $row): 
                                            ?>
                                                <option value="<?= $row['id']; ?>"><?= $row['jenis_kandidat']; ?></option>

                                            <?php
                                                $i++;
                                                endforeach;
                                            ?>
                                        </select>

                                        <select class="form-control custom-select bg-light border-1 small col-md-4" name="dph" id="dph" style="margin-top: 10px; display: none;" onchange="chart_dph()">
                                            <option value=''>Jenis DPH</option>
                                            <?php 
                                                $i = 1;
                                                foreach ( $dph as $row): 
                                            ?>
                                                <option value="<?= $row['kode_dph']; ?>"><?= $row['kandidat_dph']; ?></option>

                                            <?php
                                                $i++;
                                                endforeach;
                                            ?>
                                        </select>

                                        <input list="data_lingkungan" type="text" class="form-control bg-light col-md-4" name="ketua_lingkungan" id="ketua_lingkungan" autocomplete = "off" placeholder="Masukan Nama Lingkungan" style="margin-top: 10px; display: none;" onchange="chart_lingkungan()">
                                        <datalist id="data_lingkungan">
                                            <?php
                                                foreach ($lingkungan as $row)
                                                {
                                                    echo "<option value='$row->nama_lingkungan'>$row->nama_lingkungan</option>";
                                                }
                                            ?>
                     
                                        </datalist> 


                                        <select class="form-control custom-select bg-light border-1 small col-md-4" name="ketua_wilayah" id="ketua_wilayah" style="margin-top: 10px;display: none;" onchange="chart_wilayah()">
                                            <option>Pilih Wilayah</option>
                                            <?php 
                                                $i = 1;
                                                foreach ( $wilayah as $row): 
                                            ?>
                                                <option value="<?= $row['kode_wilayah']; ?>"><?= $row['nama_wilayah']; ?></option>

                                            <?php
                                                $i++;
                                                endforeach;
                                            ?>
                                        </select>
                                    </div>
                                    <hr>
                                    <div class="chart-area" style="margin-top: 40px; text-align: center; height: 320px">
                                        <canvas id="chart_jumlah_suara">
                                        </canvas>
                                        <span id="not_found" style="display: none;"></span>
                                    </div>

                                </div>
                            </div>
                        </div>

                        <div class="col-xl-4 col-md-12">
                            <div class="card shadow mb-4">
                                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                                    <h6 class="m-0 font-weight-bold text-primary"><i class="fas fa-chart-bar"></i> &nbsp;Grafik Jumlah Suara Terpakai <span id="ket_lingkungan" class="text-dark"></span>
                                    </h6> 
                                </div>
                                <form method="post">
                                <div id="cjsp" class="card-body" style="margin-top: -35px">
                                    <div class="input-group" style="margin-top: 20px;">
                                        <input list="data_lingkungan" type="text" class="form-control bg-light col-xl-12 col-md-12" name="ketua_lingkungan2" id="ketua_lingkungan2" autocomplete = "off" placeholder="Masukan Nama Lingkungan" onchange="chart1()" style="margin-top: 10px;">
                                        <datalist id="data_lingkungan">
                                            <?php
                                                foreach ($lingkungan as $row)
                                                {
                                                    echo "<option value='$row->nama_lingkungan'>$row->nama_lingkungan</option>";
                                                }
                                            ?>
                     
                                        </datalist> 
                                    </div>
                                    <hr>
                                    <div class="mt-4 text-center small">
                                        <span class="mr-2">
                                          <i class="fas fa-circle" style="color: #3DA81F"></i> Suara Terpakai
                                        </span>
                                        <span class="mr-2">
                                          <i class="fas fa-circle" style="color: #EC2A17"></i> Suara Tidak Terpakai
                                        </span>
                                    </div>
                                    <div class="chart-area">
                                        <canvas id="chart_jumlah_suara_terpakai">
                                        </canvas>
                                    </div>

                                </div>
                                </form>
                            </div>
                        </div>

                    </div>
                </div>