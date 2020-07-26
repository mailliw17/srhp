<div class="app-main__outer">
    <div class="app-main__inner">
        <div class="app-page-title">
            <div class="page-title-wrapper">
                <div class="page-title-heading">
                    <div class="page-title-icon">
                        <i class="fas fa-users">
                        </i>
                    </div>
                    <div>Kandidat - Ketua Wilayah
                        <div class="page-title-subheading"><?= $ket4; ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <?php if ($this->session->flashdata('edit')) : ?>
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                Edit Kandidat <strong><?= $this->session->flashdata('edit'); ?> !</strong>
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
        <?php endif; ?>

        <?php if ($this->session->flashdata('hapus')) : ?>
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                Kandidat berhasil <strong><?= $this->session->flashdata('hapus'); ?> !</strong>
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
        <?php endif; ?>
        <div class="row">
            <form method="post">
                <div class="input-group">
                    <select name="nama_wilayah" id="nama_wilayah" class="form-control" style="margin-left: 16px;">
                        <option value="" selected disabled>--Silahkan pilih wilayah--</option>
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
                    <input type="text" name="keyword" id="keyword" placeholder="Masukan Kata Kunci..." class="form-control" style="margin-left: 5px;">
                    <button type="submit" class="btn-shadow mr-3 btn btn-primary" style="margin-left: 5px;"><i class="fas fa-search fa-sm">&nbsp;Cari</i></button>
                </div>
            </form>
        </div>
        <div class="row" style="margin-top: 15px">
            <div class="col-lg-12">
                <div class="main-card mb-3 card">
                    <div class="card-body">
                        <table class="mb-0 table table-striped">
                            <thead>
                                <tr>
                                    <th style="text-align: center;">No</th>
                                    <th style="text-align: center;">Nama</th>
                                    <th style="text-align: center;">Wilayah</th>
                                    <th style="text-align: center;">Lingkungan</th>
                                    <th style="text-align: center;">Foto</th>
                                    <th style="text-align: center;">Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $i = 1;
                                if ($total != 0) :
                                    foreach ($kandidat_ketua_wilayah as $row) :
                                ?>
                                        <tr>
                                            <td style="text-align: center;"><?= $i; ?></td>
                                            <td style="text-align: center;"><?= $row['nama']; ?></td>
                                            <td style="text-align: center;"><?= $row['nama_wilayah']; ?></td>
                                            <td style="text-align: center;"><?= $row['nama_lingkungan']; ?></td>
                                            <td style="text-align: center;"><img src="
                                                        <?= base_url(); ?>foto/ketua_wilayah/<?= $row['foto']; ?>" width="100" height="100"></td>
                                            <td style="text-align: center;">
                                                <a href="<?= base_url(); ?>C_KandidatKetuaWilayah/edit/<?= $row['id']; ?>">
                                                    <button type="button" class="btn btn-warning btn-sm">Edit</button>
                                                </a>
                                                <a href="#" data-toggle="modal" data-target="#Modal_hapus1<?= $row['id']; ?>">
                                                    <button type="button" class="btn btn-danger btn-sm">Hapus</button>
                                                </a>
                                            </td>
                                        </tr>
                                    <?php
                                        $i++;
                                    endforeach;
                                elseif ($total == 0) :
                                    ?>
                                    <tr>
                                        <td colspan="6" style="text-align: center;">
                                            <h1 class="h3 mb-0 text-gray-800">No Record Found!</h1>
                                        </td>
                                    </tr>
                                <?php
                                endif;
                                ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>