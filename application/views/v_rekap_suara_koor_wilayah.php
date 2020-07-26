
<html>
<head>
  <title>Cetak PDF</title>
  <style>
    table {
      border-collapse:collapse;
      table-layout:fixed;width: 630px;
    }
    table td {
      word-wrap:break-word;
      width: 25%;
      
    }
    .str{ 
      mso-number-format:\@; 
    }
    .center{
      text-align: center;
    } 
  </style>
</head>
<body>
    <?php
        header("Content-type: application/vnd-ms-excel");
        header("Content-Disposition: attachment; filename=rekap_suara_koordinator_wilayah.xls");
    ?>
    <h2 style="text-align: center;"><b><u>REKAP PEROLEHAN SUARA </u></b></h2>
    <h2 style="text-align: center;"><b><u>Gereja Kristus Raja Semesta Alam Ungaran </u></b></h2>
    
 
  <h5 style="text-align: center;"><b><u>Perolehan Suara <?= $ket6; ?></u></b></h5>
  <table border="1" cellpadding="8">
    <thead>
                                <tr>
                                    <th style="text-align: center;">No</th>
                                    <th style="text-align: center;">Nama</th>
                                    <th style="text-align: center;">Lingkungan</th>
                                    <th style="text-align: center;">Asal Wilayah</th>
                                    <th style="text-align: center;">Suara</th>
                            </thead>
                            <tbody>
                                <?php
                                $i = 1;
                                if ($total != 0) :
                                    foreach ($koor_wilayah as $row) :
                                ?>
                                        <tr>
                                            <td style="text-align: center;"><?= $i; ?></td>
                                            <td style="text-align: center;"><?= $row['nama']; ?></td>
                                            <td style="text-align: center;"><?= $row['nama_lingkungan']; ?></td>
                                            <td style="text-align: center;"><?= $row['nama_wilayah']; ?></td>
                                            <td style="text-align: center;"><?= $row['suara']; ?></td>
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
                                elseif ($koor_wilayah == NULL) :
                                ?>
                                    <tr>
                                        <td colspan="6" style="text-align: center;">
                                            <h1 class="h3 mb-0 text-gray-800">Silahkan Pilih Jenis Kandidat Terlebih Dulu!</h1>
                                        </td>
                                    </tr>
                                <?php
                                endif;
                                ?>
                            </tbody>
  </table><br><br>


</body>
</html>