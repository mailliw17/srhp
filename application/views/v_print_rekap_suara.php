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
        header("Content-Disposition: attachment; filename=rekap_suara.xls");
    ?>
    <h2 style="text-align: center;"><b><u>REKAP PEROLEHAN SUARA </u></b></h2>
    <h2 style="text-align: center;"><b><u>Gereja Kristus Raja Semesta Alam Ungaran </u></b></h2>
    
 
  <h5 style="text-align: center;"><b><u>Perolehan Suara DPH</u></b></h5>
  <table border="1" cellpadding="8">
    <thead>
      <tr>
        <th style="text-align: center;">No</th>
        <th style="text-align: center;">Keterangan</th>
        <th style="text-align: center;">Nama</th>
        <th style="text-align: center;">Asal Wilayah</th>
        <th style="text-align: center;">Asal Lingkungan</
      </tr>
    </thead>
    <tbody>
      <?php
        $i=1;
        foreach ($dph as $row):
      ?>
        <tr>
          <td style="text-align: center;"><?= $i; ?></td>
          <td style="text-align: center;"><?= $row['kandidat_dph']; ?></td>
          <td style="text-align: center;"><?= $row['nama']; ?></td>
          <td style="text-align: center;"><?= $row['nama_wilayah']; ?></td>
          <td style="text-align: center;"><?= $row['nama_lingkungan']; ?></td>
        </tr>
    <?php
      $i++;
      endforeach;
    ?>
    </tbody>
  </table><br><br>

  <h5 style="text-align: center;"><b><u>Perolehan Suara Ketua Wilayah</u></b></h5>
  <table border="1" cellpadding="8">
    <thead>
      <tr>
        <th style="text-align: center;">No</th>
        <th style="text-align: center;">Keterangan</th>
        <th style="text-align: center;">Nama</th>
        <th style="text-align: center;">Asal Wilayah</th>
        <th style="text-align: center;">Asal Lingkungan</th>
      </tr>
    </thead>
    <tbody>
      <?php
        $i=1;
        foreach ($ketua_wilayah as $row):
      ?>
        <tr>
          <td style="text-align: center;"><?= $i; ?></td>
          <td style="text-align: center;">Ketua Wilayah <?= $row['nama_wilayah']; ?></td>
          <td style="text-align: center;"><?= $row['nama']; ?></td>
          <td style="text-align: center;"><?= $row['nama_wilayah']; ?></td>
          <td style="text-align: center;"><?= $row['nama_lingkungan']; ?></td>
        </tr>
    <?php
      $i++;
      endforeach;
    ?>
    </tbody>
  </table><br><br>

  <h5 style="text-align: center;"><b><u>Perolehan Suara Koordinator Wilayah</u></b></h5>
  <table border="1" cellpadding="8">
    <thead>
      <tr>
        <th style="text-align: center;">No</th>
        <th style="text-align: center;">Nama</th>
        <th style="text-align: center;">Asal Wilayah</th>
        <th style="text-align: center;">Asal Lingkungan</th>
      </tr>
    </thead>
    <tbody>
      <?php
        $i=1;
        foreach ($koor_wilayah as $row):
      ?>
        <tr>
          <td style="text-align: center;"><?= $i; ?></td>
          <td style="text-align: center;"><?= $row['nama']; ?></td>
          <td style="text-align: center;"><?= $row['nama_wilayah']; ?></td>
          <td style="text-align: center;"><?= $row['nama_lingkungan']; ?></td>
        </tr>
    <?php
      $i++;
      endforeach;
    ?>
    </tbody>
  </table><br><br>


  <?php 
    $i = 1;
    foreach ($ketua_lingkungan as $key => $row):
      if ($key==0):
        $w = $row['nama_wilayah'];
    ?>
      <h5 style="text-align: center;"><b><u>Perolehan Suara Ketua Lingkungan <?= $row['nama_wilayah'] ?></u></b></h5>
      <table border="1" cellpadding="8">
        <thead>
          <tr>
            <th style="text-align: center;">No</th>
            <th style="text-align: center;">Keterangan</th>
            <th style="text-align: center;">Nama</th>
            <th style="text-align: center;">Asal Wilayah</th>
            <th style="text-align: center;">Asal Lingkungan</th>
          </tr>
        </thead>
        <tbody>
          <tr>
            <td style="text-align: center;"><?= $i; ?></td>
            <td style="text-align: center;">Ketua Lingkungan <?= $row['nama_lingkungan']; ?></td>
            <td style="text-align: center;"><?= $row['nama']; ?></td>
            <td style="text-align: center;"><?= $row['nama_wilayah']; ?></td>
            <td style="text-align: center;"><?= $row['nama_lingkungan']; ?></td>
            
          </tr>
                                                    
  <?php 
        elseif($row['nama_wilayah'] != $w):
          $i = 1;
          $w = $row['nama_wilayah'];
  ?>

        </tbody>
      </table><br><br>
      <h5 style="text-align: center;"><b><u>Perolehan Suara Ketua Lingkungan <?= $row['nama_wilayah'] ?></u></b></h5>
      <table border="1" cellpadding="8">
        <thead>
          <tr>
            <th style="text-align: center;">No</th>
            <th style="text-align: center;">Keterangan</th>
            <th style="text-align: center;">Nama</th>
            <th style="text-align: center;">Asal Wilayah</th>
            <th style="text-align: center;">Asal Lingkungan</th>
          </tr>
        </thead>
        <tbody>
          <tr>
            <td style="text-align: center;"><?= $i; ?></td>
            <td style="text-align: center;">Ketua Lingkungan <?= $row['nama_lingkungan']; ?></td>
            <td style="text-align: center;"><?= $row['nama']; ?></td>
            <td style="text-align: center;"><?= $row['nama_wilayah']; ?></td>
            <td style="text-align: center;"><?= $row['nama_lingkungan']; ?></td>
            
          </tr>
                                                    
                                                            
  <?php 
        elseif($key != 0 && $row['nama_wilayah'] == $w):
          $w = $row['nama_wilayah'];
  ?>
          <tr>
            <td style="text-align: center;"><?= $i; ?></td>
            <td style="text-align: center;">Ketua Lingkungan <?= $row['nama_lingkungan']; ?></td>
            <td style="text-align: center;"><?= $row['nama']; ?></td>
            <td style="text-align: center;"><?= $row['nama_wilayah']; ?></td>
            <td style="text-align: center;"><?= $row['nama_lingkungan']; ?></td>
            
          </tr>

  <?php
        endif;
         $i++;
      endforeach;
  ?>
    </tbody>
  </table>



</body>
</html>