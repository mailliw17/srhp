<div class="app-wrapper-footer">
                    <div class="app-footer">
                        <div class="app-footer__inner">
                            <div class="app-footer-right">
                                <ul class="nav">
                                    <li class="nav-item">
                                        <a href="javascript:void(0);" class="nav-link">
                                            <div class="badge badge-success mr-1 ml-0">
                                                <small>Developed By : William & Jordan</small>
                                            </div>
                                            Gereja Kristus Raja - Ungaran
                                        </a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <script src="http://maps.google.com/maps/api/js?sensor=true"></script>
        <!-- Div ini jangan dihapus ini lanjutan dari header & body -->
        </div>
    </div>
    <script type="text/javascript" src="<?php echo base_url().'assets/scripts/dashboard_admin.js'?>"></script>

    <script src="https://cdn.jsdelivr.net/npm/chart.js@2.8.0"></script>
    <!-- Custom scripts darisb admin-->
    
    

    <!-- ini untuk Jquery -->
    <script src="<?php echo base_url().'assets/scripts/jquery.js'?>"></script>

    <script type="text/javascript" src="<?php echo base_url().'assets/scripts/bootstrap-datepicker.js'?>"></script>

    <!-- Script untuk input tanggal -->
     <script type="text/javascript">
                $(document).ready(function () {
                    $('.waktu').datepicker({
                        format: "yyyy-mm-dd",
                        autoclose:true
                    });
                });
      </script>

    <!-- untuk countdown print rekap -->
      <!-- <script>
        // Set the date we're counting down to
        var countDownDate = new Date("July 6, 2020 11:37:00").getTime();
        var print_rekap=document.getElementById('print_rekap');
        var b_print=document.getElementById('b_print');
        // Update the count down every 1 second
        var x = setInterval(function() {

          // Get today's date and time
          var now = new Date().getTime();

          // Find the distance between now and the count down date
          var distance = countDownDate - now;
          // Time calculations for days, hours, minutes and seconds
          var days = Math.floor(distance / (1000 * 60 * 60 * 24));
          var hours = Math.floor((distance % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
          var minutes = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60));
          var seconds = Math.floor((distance % (1000 * 60)) / 1000);

          // Display the result in the element with id="demo"
          var time_left = days + "d " + hours + "h " + minutes + "m " + seconds + "s ";
          print_rekap.innerHTML = "Print rekap suara akan tersedia dalam : <br> <strong>" + time_left + "</strong>";
          console.log(time_left);
          // If the count down is finished, write some text
          if (distance < 0) {
            clearInterval(x);
            b_print.disabled='false';
            print_rekap.style.display='none';
          }
        }, 1000);
      </script> -->

  <!-- End Countdown print rekap -->

    <script>
        function isi7(val)
        {
            var dph=document.getElementById('dph');
            var ketua_lingkungan=document.getElementById('ketua_lingkungan');
            var ketua_wilayah=document.getElementById('ketua_wilayah');

        if(val=='A'){
            dph.style.display='none';
            ketua_lingkungan.style.display='none';
            ketua_wilayah.style.display='block';

        }else if(val == 'B'){
            dph.style.display='none';
            ketua_lingkungan.style.display='block';
            ketua_wilayah.style.display='none';

        }else if(val == 'C'){
            dph.style.display='block';
            ketua_lingkungan.style.display='none';
            ketua_wilayah.style.display='none';

        }
        }
    </script>

    <!-- Chart untuk Perhitungan suara per kandidat -->
<script>
  var ctx = document.getElementById("chart_jumlah_suara");
  var myChart = new Chart(ctx, {
    type: 'horizontalBar',
    data: {
      labels: [<?php
            if (count($suara)>0) {
              foreach ($suara as $data) {
                echo "'" .$data->nama ."',";
              }
            }
              ?>],
      datasets: [{
        label: 'Jumlah Suara',
        data: [<?php
            if (count($suara)>0) {
              foreach ($suara as $data) {
                echo "'" .$data->suara ."',";
              }
            }
              ?>],
        backgroundColor: [
          'rgba(255, 99, 132, 0.2)',
          'rgba(54, 162, 235, 0.2)',
          'rgba(255, 206, 86, 0.2)',
          'rgba(75, 192, 192, 0.2)',
          'rgba(153, 102, 255, 0.2)',
          'rgba(255, 159, 64, 0.2)',
          'rgba(255, 99, 132, 0.2)',
          'rgba(54, 162, 235, 0.2)',
          'rgba(255, 206, 86, 0.2)',
          'rgba(75, 192, 192, 0.2)',
          'rgba(153, 102, 255, 0.2)',
          'rgba(255, 159, 64, 0.2)'
        ],
        borderColor: [
          'rgba(255,99,132,1)',
          'rgba(54, 162, 235, 1)',
          'rgba(255, 206, 86, 1)',
          'rgba(75, 192, 192, 1)',
          'rgba(153, 102, 255, 1)',
          'rgba(255, 159, 64, 1)',
          'rgba(255, 99, 132, 0.2)',
          'rgba(54, 162, 235, 0.2)',
          'rgba(255, 206, 86, 0.2)',
          'rgba(75, 192, 192, 0.2)',
          'rgba(153, 102, 255, 0.2)',
          'rgba(255, 159, 64, 0.2)'
        ],
        borderWidth: 1
      }]
    },
    options: {
      maintainAspectRatio: false,
    layout: {
      padding: {
        left: 10,
        right: 25,
        top: 25,
        bottom: 0
      }
    },
    legend: {
        display: false
    },
      scales: {
        yAxes: [{
          ticks: {
            beginAtZero: true
           }
        }]
      }
    }
  });
</script>

<!-- ini untuk ajax di wilayah dan lingkungan usulan dph -->
<script type="text/javascript">
    $(document).ready(function(){
        $('#wilayah').change(function(){
            var id=$(this).val();
            $.ajax({
                url : "<?php echo base_url();?>C_UsulanDph/get_lingkungan",
                method : "POST",
                data : {id: id},
                dataType : 'json',
                success: function(data){
                    console.log(data[1]);
                    var html = '';
                    var dummy = '<option> --Silahkan Pilih Lingkungan-- </option>';
                    var i;
                    for(i=0; i<data.length; i++){
                        html += "<option value = "+data[i].kode_lingkungan+">"+data[i].nama_lingkungan+"</option>";
                    }
                    console.log(html);
                    $('#lingkungan').html(dummy+html);
                     
                }
            });
        });
    });
</script>

<!-- ini untuk ajax nik di usulan dph -->
<script type="text/javascript">
    function autofill_dph(){
        var nik =document.getElementById('nik').value;
        var not_found = document.getElementById('not_found');
        $.ajax({
            url:"<?php echo base_url();?>index.php/C_UsulanDph/get_data_usulan",
            method : "POST",
            data: {nik: nik},
            dataType : 'json',
            success:function(data){
              //console.log(data);
              if (Array.isArray(data) && data.length){ // nik ditemukan
                    $.each(data, function(key,val){
                        //console.log(data);
                        not_found.style.display='none';
                        document.getElementById('nama').value=val.nama;
                        document.getElementById('lingkungan').value=val.lingkungan;
                        document.getElementById('kode_lingkungan').value=val.kode_lingkungan;
                        document.getElementById('wilayah').value=val.wilayah;
                        document.getElementById('kode_wilayah').value=val.kode_wilayah;
                        document.getElementById('nama').style.display='block';
                        document.getElementById('lingkungan').style.display='block';
                        document.getElementById('wilayah').style.display='block';
                        document.getElementById('l_nama').style.display='block';
                        document.getElementById('l_lingkungan').style.display='block';
                        document.getElementById('l_wilayah').style.display='block';
                        document.getElementById('submit').disabled=false;
                    });
                }else{// data tidak ada isinya / nik tidak ditemukan
                    console.log('Tidak ditemukan');
                    document.getElementById('nama').value='';
                    document.getElementById('lingkungan').value='';
                    document.getElementById('kode_lingkungan').value='';
                    document.getElementById('wilayah').value='';
                    document.getElementById('kode_wilayah').value='';
                    document.getElementById('nama').style.display='none';
                    document.getElementById('lingkungan').style.display='none';
                    document.getElementById('wilayah').style.display='none';
                    document.getElementById('submit').disabled=true;
                    document.getElementById('l_nama').style.display='none';
                    document.getElementById('l_lingkungan').style.display='none';
                    document.getElementById('l_wilayah').style.display='none';
                    not_found.style.display='block';
                    // document.getElementById("not_found").innerHTML = "Data Tidak Ditemukan, <a href='<?=base_url()?>/C_usulanDPh/form_isian2'> Silahkan Masukan Data Secara Manual </a>";
                    document.getElementById("not_found").innerHTML = "Data Tidak Ditemukan, <a href='<?=base_url()?>/C_PengaturanPemilih/tambah'> Silahkan Tambah Data Pemilih Terlebih Dahulu ! </a>";
                  }
                
            }
        });              
    }

</script>

<!-- ini untuk ajax nik di usulan ketua wilayah -->
<script type="text/javascript">
    function autofill_wilayah(){
        var nik =document.getElementById('nik').value;
        var not_found = document.getElementById('not_found');
        $.ajax({
            url:"<?php echo base_url();?>index.php/C_UsulanKetuaWilayah/get_data_usulan",
            method : "POST",
            data: {nik: nik},
            dataType : 'json',
            success:function(data){
              //console.log(data);
              if (Array.isArray(data) && data.length){ // nik ditemukan
                    $.each(data, function(key,val){
                        //console.log(data);
                        not_found.style.display='none';
                        document.getElementById('nama').value=val.nama;
                        document.getElementById('lingkungan').value=val.lingkungan;
                        document.getElementById('kode_lingkungan').value=val.kode_lingkungan;
                        document.getElementById('wilayah').value=val.wilayah;
                        document.getElementById('kode_wilayah').value=val.kode_wilayah;
                        document.getElementById('nama').style.display='block';
                        document.getElementById('lingkungan').style.display='block';
                        document.getElementById('wilayah').style.display='block';
                        document.getElementById('l_nama').style.display='block';
                        document.getElementById('l_lingkungan').style.display='block';
                        document.getElementById('l_wilayah').style.display='block';
                        document.getElementById('submit').disabled=false;
                    });
                }else{// data tidak ada isinya / nik tidak ditemukan
                    console.log('Tidak ditemukan');
                    document.getElementById('nama').value='';
                    document.getElementById('lingkungan').value='';
                    document.getElementById('kode_lingkungan').value='';
                    document.getElementById('wilayah').value='';
                    document.getElementById('kode_wilayah').value='';
                    document.getElementById('nama').style.display='none';
                    document.getElementById('lingkungan').style.display='none';
                    document.getElementById('wilayah').style.display='none';
                    document.getElementById('submit').disabled=true;
                    document.getElementById('l_nama').style.display='none';
                    document.getElementById('l_lingkungan').style.display='none';
                    document.getElementById('l_wilayah').style.display='none';
                    not_found.style.display='block';
                    // document.getElementById("not_found").innerHTML = "Data Tidak Ditemukan, <a href='<?=base_url()?>/C_usulanKetuaWilayah/form_isian2'> Silahkan Masukan Data Secara Manual </a>";
                    document.getElementById("not_found").innerHTML = "Data Tidak Ditemukan, <a href='<?=base_url()?>/C_PengaturanPemilih/tambah'> Silahkan Tambah Data Pemilih Terlebih Dahulu ! </a>";
                  }
                
            }
        });              
    }

</script>

<!-- ini untuk ajax nik di usulan ketua lingkungan -->
<script type="text/javascript">
    function autofill_lingkungan(){
        var nik =document.getElementById('nik').value;
        var not_found = document.getElementById('not_found');
        $.ajax({
            url:"<?php echo base_url();?>index.php/C_UsulanKetuaLingkungan/get_data_usulan",
            method : "POST",
            data: {nik: nik},
            dataType : 'json',
            success:function(data){
              //console.log(data);
              if (Array.isArray(data) && data.length){ // nik ditemukan
                    $.each(data, function(key,val){
                        //console.log(data);
                        not_found.style.display='none';
                        document.getElementById('nama').value=val.nama;
                        document.getElementById('lingkungan').value=val.lingkungan;
                        document.getElementById('kode_lingkungan').value=val.kode_lingkungan;
                        document.getElementById('kode_wilayah').value=val.kode_wilayah;
                        document.getElementById('nama').style.display='block';
                        document.getElementById('lingkungan').style.display='block';
                        document.getElementById('l_nama').style.display='block';
                        document.getElementById('l_lingkungan').style.display='block';
                        document.getElementById('submit').disabled=false;
                    });
                }else{// data tidak ada isinya / nik tidak ditemukan
                    console.log('Tidak ditemukan');
                    document.getElementById('nama').value='';
                    document.getElementById('lingkungan').value='';
                    document.getElementById('kode_lingkungan').value='';
                    document.getElementById('kode_wilayah').value='';
                    document.getElementById('nama').style.display='none';
                    document.getElementById('lingkungan').style.display='none';
                    document.getElementById('submit').disabled=true;
                    document.getElementById('l_nama').style.display='none';
                    document.getElementById('l_lingkungan').style.display='none';
                    not_found.style.display='block';
                    // document.getElementById("not_found").innerHTML = "Data Tidak Ditemukan, <a href='<?=base_url()?>/C_usulanKetuaLingkungan/form_isian2'> Silahkan Masukan Data Secara Manual </a>";
                    document.getElementById("not_found").innerHTML = "Data Tidak Ditemukan, <a href='<?=base_url()?>/C_PengaturanPemilih/tambah'> Silahkan Tambah Data Pemilih Terlebih Dahulu ! </a>";
                  }
                
            }
        });              
    }

</script>
<!-- ini untuk ajax jumllah suara per kandidat -->
<!-- DPH -->
<script type="text/javascript">
    function chart_dph(){
        var dph =document.getElementById('dph').value;
        var ket_kandidat = document.getElementById("ket_kandidat");
        //untuk mengisi keterangan
        $.ajax({
            url:"<?php echo base_url();?>index.php/C_DashboardAdmin/get_kandidat_dph",
            method : "POST",
            data: {dph: dph},
            dataType : 'json',
            success:function(data){
              console.log(data);
              ket_kandidat.innerHTML = data;
            },
            error: function (data) {
              console.log('gagal');
            }
        });

        //untuk menggambar chart
        $.ajax({
            url:"<?php echo base_url();?>index.php/C_DashboardAdmin/get_suara_dph",
            method : "POST",
            data: {dph: dph},
            dataType : 'json',
            success:function(data){
              console.log(data);
              if (Array.isArray(data) && data.length){
                drawChart(data);
                document.getElementById("chart_jumlah_suara").style.display='block';
                document.getElementById("not_found").style.display='none';
              }else{
                console.log("tidak ditemukan");
                document.getElementById("chart_jumlah_suara").style.display='none';
                document.getElementById("not_found").innerHTML = "<h1 class='h3 mb-0 text-gray-800'>No Record Found!</h1>";
                document.getElementById("not_found").style.display='block';
              }
              
            },
            error: function (data) {
              console.log('gagal');
              console.log(data);
              //drawChart(data);

            }
        });              
    }

</script>

<!-- END DPH -->

<!-- Ketua Wilayah -->

<script type="text/javascript">
    function chart_wilayah(){
        var ketua_wilayah =document.getElementById('ketua_wilayah').value;
        var ket_kandidat = document.getElementById("ket_kandidat");
        //untuk mengisi keterangan
        $.ajax({
            url:"<?php echo base_url();?>index.php/C_DashboardAdmin/get_kandidat_wilayah",
            method : "POST",
            data: {ketua_wilayah: ketua_wilayah},
            dataType : 'json',
            success:function(data){
              ket_kandidat.innerHTML = data;
            },
            error: function (data) {
              console.log('gagal');
            }
        });

        //untuk menggambar chart
        $.ajax({
            url:"<?php echo base_url();?>index.php/C_DashboardAdmin/get_suara_wilayah",
            method : "POST",
            data: {ketua_wilayah: ketua_wilayah},
            dataType : 'json',
            success:function(data){
              console.log(data);
              if (Array.isArray(data) && data.length){
                drawChart(data);
                document.getElementById("chart_jumlah_suara").style.display='block';
                document.getElementById("not_found").style.display='none';
              }else{
                console.log("tidak ditemukan");
                document.getElementById("chart_jumlah_suara").style.display='none';
                document.getElementById("not_found").innerHTML = "<h1 class='h3 mb-0 text-gray-800'>No Record Found!</h1>";
                document.getElementById("not_found").style.display='block';
              }
            },
            error: function (data) {
              console.log('gagal');
              console.log(data);

            }
        });              
    }

</script>
<!-- END Ketua Wilayah -->

<!-- Ketua Lingkungan -->

<script type="text/javascript">
    function chart_lingkungan(){
        var ketua_lingkungan =document.getElementById('ketua_lingkungan').value;
        var ket_kandidat = document.getElementById("ket_kandidat");
        //untuk mengisi keterangan
        $.ajax({
            url:"<?php echo base_url();?>index.php/C_DashboardAdmin/get_kandidat_lingkungan",
            method : "POST",
            data: {ketua_lingkungan: ketua_lingkungan},
            dataType : 'json',
            success:function(data){
              ket_kandidat.innerHTML = data;
            },
            error: function (data) {
              console.log('gagal');
            }
        });

        //untuk menggambar chart
        $.ajax({
            url:"<?php echo base_url();?>index.php/C_DashboardAdmin/get_suara_lingkungan",
            method : "POST",
            data: {ketua_lingkungan: ketua_lingkungan},
            dataType : 'json',
            success:function(data){
              console.log(data);
              if (Array.isArray(data) && data.length){
                drawChart(data);
                document.getElementById("chart_jumlah_suara").style.display='block';
                document.getElementById("not_found").style.display='none';
              }else{
                console.log("tidak ditemukan");
                document.getElementById("chart_jumlah_suara").style.display='none';
                document.getElementById("not_found").innerHTML = "<h1 class='h3 mb-0 text-gray-800'>No Record Found!</h1>";
                document.getElementById("not_found").style.display='block';
              }
            },
            error: function (data) {
              console.log('gagal');
              console.log(data);

            }
        });              
    }

</script>
<!-- END Ketua Lingkungan -->


<!-- gambar chart jumlah suara per kandidat -->

<script>
  function drawChart(data){
  var ctx = document.getElementById("chart_jumlah_suara");
  var nama =[];
  var suara = [];
  $.each(data, function(key,val){
    nama.push(val.nama);
    suara.push(val.suara);
  });
  console.log(nama);
  var myChart = new Chart(ctx, {
    type: 'horizontalBar',
    data: {
      labels: nama,
      datasets: [{
        label: 'Jumlah Suara',
        data: suara,
        backgroundColor: [
          'rgba(255, 99, 132, 0.2)',
          'rgba(54, 162, 235, 0.2)',
          'rgba(255, 206, 86, 0.2)',
          'rgba(75, 192, 192, 0.2)',
          'rgba(153, 102, 255, 0.2)',
          'rgba(255, 159, 64, 0.2)',
          'rgba(255, 99, 132, 0.2)',
          'rgba(54, 162, 235, 0.2)',
          'rgba(255, 206, 86, 0.2)',
          'rgba(75, 192, 192, 0.2)',
          'rgba(153, 102, 255, 0.2)',
          'rgba(255, 159, 64, 0.2)'
        ],
        borderColor: [
          'rgba(255,99,132,1)',
          'rgba(54, 162, 235, 1)',
          'rgba(255, 206, 86, 1)',
          'rgba(75, 192, 192, 1)',
          'rgba(153, 102, 255, 1)',
          'rgba(255, 159, 64, 1)',
          'rgba(255, 99, 132, 0.2)',
          'rgba(54, 162, 235, 0.2)',
          'rgba(255, 206, 86, 0.2)',
          'rgba(75, 192, 192, 0.2)',
          'rgba(153, 102, 255, 0.2)',
          'rgba(255, 159, 64, 0.2)'
        ],
        borderWidth: 1
      }]
    },
    options: {
      maintainAspectRatio: false,
    layout: {
      padding: {
        left: 10,
        right: 25,
        top: 25,
        bottom: 0
      }
    },
    legend: {
        display: false
    },
      scales: {
        yAxes: [{
          ticks: {
            beginAtZero: true
           }
        }]
      }
    }
  });
}
</script>
<!-- END gambar chart jumlah suara per kandidat -->



<!-- ini untuk ajax jumlah suara terpakai -->
<script type="text/javascript">
    function chart1(){
        var ketua_lingkungan2 =document.getElementById('ketua_lingkungan2').value;
        console.log(ketua_lingkungan2);
        var cjsp = document.getElementById("cjsp");
        $.ajax({
            url:"<?php echo base_url();?>index.php/C_DashboardAdmin/get_suara_terpakai",
            method : "POST",
            data: {ketua_lingkungan2: ketua_lingkungan2},
            dataType : 'json',
            success:function(data){
              console.log(data);
              document.getElementById("ket_lingkungan").innerHTML = "Lingkungan "+ ketua_lingkungan2;
              if (data[1] >= 80){
                cjsp.classList.add("card-shadow-danger");
              }else if(data[1] >= 60 && data[1] < 80){
                cjsp.classList.add("card-shadow-warning");
              } else {
                cjsp.classList.add("card-shadow-success");
              }
              drawChart2(data);
            },
            error: function (data) {
              console.log('gagal');
              console.log(data);
              drawChart(data);

            }
        });              
    }

</script>
 <script type="text/javascript">

  function drawChart2(chart_data){
Chart.defaults.global.defaultFontFamily = 'Nunito', '-apple-system,system-ui,BlinkMacSystemFont,"Segoe UI",Roboto,"Helvetica Neue",Arial,sans-serif';
Chart.defaults.global.defaultFontColor = '#858796';

var ctxi = document.getElementById("chart_jumlah_suara_terpakai");
var myPieChart = new Chart(ctxi, {
  type: 'doughnut',
  data: {
    labels: ["Suara Terpakai", "Suara Tidak Terpakai"],
    datasets: [{

      data: [chart_data[0], chart_data[1]],
      backgroundColor: ['#3DA81F', '#EC2A17'],
      hoverBackgroundColor: ['#143D09', '#5F0E07'],
      hoverBorderColor: "rgba(234, 236, 244, 1)",
    }],
  },
  options: {
    maintainAspectRatio: false,
    tooltips: {
      backgroundColor: "rgba(0, 0, 0, 0.8)",
      bodyFontColor: "#FFFFFF",
      borderColor: 'rgb(0, 0, 0)',
      borderWidth: 1,
      xPadding: 15,
      yPadding: 15,
      displayColors: false,
      caretPadding: 10,
       callbacks: {
                label: function(tooltipItem, data) {
                    var dataset = data.datasets[tooltipItem.datasetIndex];
                    var labels = data.labels[tooltipItem.index];
                    var currentValue = dataset.data[tooltipItem.index];
                    return labels+": "+currentValue+" %";
                }
            }
    },
    legend: {
      display: false
    },
    cutoutPercentage: 70,
  },
});
}
 </script>


</body>

</html>

<!-- BEGGINING OF MODAL TAMBAH -->
<div class="modal fade" id="modalGantiPassword" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Ganti Password</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">



                <form action="" method="post">

                    <div class="form-group">
                        <label for="nama">Password Sebelumnya</label>
                        <input type="password" name="pass_sebelum" class="form-control" autocomplete="off" required>
                    </div>

                    <div class="form-group">
                        <label for="nama">Password Baru</label>
                        <input type="password" name="pass_baru1" class="form-control" autocomplete="off" required>
                    </div>

                    <div class="form-group">
                        <label for="nama">Ulangi Password</label>
                        <input type="password" name="pass_baru2" class="form-control" autocomplete="off" required>
                    </div>

                    <button type="reset" class="btn btn-danger" data-dismiss="modal">Reset</button>
                    <button type="submit" class="btn btn-primary">Simpan</button>


                </form>



            </div>
        </div>

    </div>
</div>

<!-- Modal  buka pemilihan lingkungan -->

<div class="modal fade" id="Modal_setLingkungan1" data-backdrop="static" tabindex="1" role="dialog" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="staticBackdropLabel">Buka Pemilihan Ketua Lingkungan Sekarang</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <p>ilahkan pilih buka untuk membuka pemilihan ketua lingkungan</p>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
          <a href="<?= base_url(); ?>C_DashboardAdmin/setLingkungan1">
            <button type="button" class="btn btn-primary"><i class="fas fa-trash"></i> &nbsp;Buka</button>
          </a>
        </div>
      </div>
    </div>
  </div>

  <!-- Modal  tutup pemilihan lingkungan -->

<div class="modal fade" id="Modal_setLingkungan2" data-backdrop="static" tabindex="1" role="dialog" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="staticBackdropLabel">Tutup Pemilihan Ketua Lingkungan Sekarang</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <p>ilahkan pilih tutup untuk membuka pemilihan ketua lingkungan</p>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
          <a href="<?= base_url(); ?>C_DashboardAdmin/setLingkungan2">
            <button type="button" class="btn btn-primary"><i class="fas fa-trash"></i> &nbsp;Tutup</button>
          </a>
        </div>
      </div>
    </div>
  </div>

  <!-- Modal  buka pemilihan Wilayah -->

<div class="modal fade" id="Modal_setWilayah1" data-backdrop="static" tabindex="1" role="dialog" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="staticBackdropLabel">Buka Pemilihan Ketua Wilayah Sekarang</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <p>ilahkan pilih buka untuk membuka pemilihan ketua Wilayah</p>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
          <a href="<?= base_url(); ?>C_DashboardAdmin/setWilayah1">
            <button type="button" class="btn btn-primary"><i class="fas fa-trash"></i> &nbsp;Buka</button>
          </a>
        </div>
      </div>
    </div>
  </div>

  <!-- Modal  tutup pemilihan Wilayah -->

<div class="modal fade" id="Modal_setWilayah2" data-backdrop="static" tabindex="1" role="dialog" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="staticBackdropLabel">Tutup Pemilihan Ketua Wilayah Sekarang</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <p>ilahkan pilih tutup untuk membuka pemilihan ketua Wilayah</p>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
          <a href="<?= base_url(); ?>C_DashboardAdmin/setWilayah2">
            <button type="button" class="btn btn-primary"><i class="fas fa-trash"></i> &nbsp;Tutup</button>
          </a>
        </div>
      </div>
    </div>
  </div>

<!-- Modal  buka pemilihan KOOR Wilayah -->

<div class="modal fade" id="Modal_setKoorWilayah1" data-backdrop="static" tabindex="1" role="dialog" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="staticBackdropLabel">Buka Pemilihan Koordinator Wilayah Sekarang</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <p>ilahkan pilih buka untuk membuka pemilihan koordinator Wilayah</p>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
          <a href="<?= base_url(); ?>C_DashboardAdmin/setKoorWilayah1">
            <button type="button" class="btn btn-primary"><i class="fas fa-trash"></i> &nbsp;Buka</button>
          </a>
        </div>
      </div>
    </div>
  </div>

  <!-- Modal  tutup pemilihan KoorWilayah -->

<div class="modal fade" id="Modal_setKoorWilayah2" data-backdrop="static" tabindex="1" role="dialog" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="staticBackdropLabel">Tutup Pemilihan koordinator Wilayah Sekarang</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <p>ilahkan pilih tutup untuk membuka pemilihan koordinator Wilayah</p>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
          <a href="<?= base_url(); ?>C_DashboardAdmin/setKoorWilayah2">
            <button type="button" class="btn btn-primary"><i class="fas fa-trash"></i> &nbsp;Tutup</button>
          </a>
        </div>
      </div>
    </div>
  </div>


  <!-- Modal  buka pemilihan DPH -->

<div class="modal fade" id="Modal_setDPH1" data-backdrop="static" tabindex="1" role="dialog" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="staticBackdropLabel">Buka Pemilihan Ketua DPH Sekarang</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <p>ilahkan pilih buka untuk membuka pemilihan ketua DPH</p>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
          <a href="<?= base_url(); ?>C_DashboardAdmin/setDPH1">
            <button type="button" class="btn btn-primary"><i class="fas fa-trash"></i> &nbsp;Buka</button>
          </a>
        </div>
      </div>
    </div>
  </div>

  <!-- Modal  tutup pemilihan DPH -->

<div class="modal fade" id="Modal_setDPH2" data-backdrop="static" tabindex="1" role="dialog" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="staticBackdropLabel">Tutup Pemilihan Ketua DPH Sekarang</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <p>ilahkan pilih tutup untuk membuka pemilihan ketua DPH</p>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
          <a href="<?= base_url(); ?>C_DashboardAdmin/setDPH2">
            <button type="button" class="btn btn-primary"><i class="fas fa-trash"></i> &nbsp;Tutup</button>
          </a>
        </div>
      </div>
    </div>
  </div>

<!-- BEGGINING OF MODAL SELECT Kategori -->
<div class="modal fade" id="modalSeleksi" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Seleksi Kandidat DPH</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">



                <form action="" method="post">

                    <div class="form-group">
                        <label for="Jenis kandidat">Jenis kandidat</label>
                        <select name="jenis_kandidat" id="jenis_kandidat" class="form-control" required>
                            <option value="" selected disabled>--Silahkan pilih Jenis kandidat--</option>
                            <?php 
                                $i = 1;
                                foreach ( $jenis_kandidat as $row): 
                            ?>
                                <option value="<?= $row['kode_dph']; ?>"><?= $row['kandidat_dph']; ?></option>

                            <?php
                                $i++;
                            endforeach;
                            ?>
                        </select>
                    </div>
                    <button type="submit" class="btn btn-primary">Tampilkan</button>


                </form>



            </div>
        </div>

    </div>
</div>
<!-- END OF MODAL SELECT Kategori -->

<!-- Modal Logout -->

<div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Anda Yakin Untuk Logout?</h5>
          <button class="close" type="button" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">×</span>
          </button>
        </div>
        <div class="modal-body">Pilih "Logout" Dibawah Ini Untuk Mengakhiri Session Anda.</div>
        <div class="modal-footer">
          <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
          <a href="<?php echo base_url().'C_Logout'?>" class="btn btn-primary">Logout</a>
        </div>
      </div>
    </div>
  </div>
<!-- End Modal Logout -->

<!-- BEGGINING OF MODAL EDIT -->
<div class="modal fade" id="modalEdit" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Edit Data Usulan Kandidat</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">



                <form action="" method="post">

                    <div class="form-group">
                        <label for="nama">Nama</label>
                        <input type="text" name="nama" class="form-control" autocomplete="off" required>
                    </div>

                    <div class="form-group">
                        <label for="wilayah">Wilayah</label>
                        <select name="wilayah" id="wilayah" class="form-control" required>
                            <option value="" selected disabled>--Silahkan pilih wilayah--</option>
                            <option value="">Wilayah 1</option>
                            <option value="">Wilayah 2</option>
                        </select>
                    </div>

                    <div class="form-group">
                        <label for="lingkungan">Lingkungan</label>
                        <select name="lingkungan" id="lingkungan" class="form-control" required>
                            <option value="" selected disabled>--Silahkan pilih lingkungan--</option>
                            <option value="">Lingkungan 1</option>
                            <option value="">Lingkungan 2</option>
                        </select>
                    </div>

                    <div class="form-group">
                        <label for="">Upload foto</label>
                        <input type="file" name="foto" class="form-control" autocomplete="off" required>
                    </div>

                    <button type="reset" class="btn btn-danger" data-dismiss="modal">Reset</button>
                    <button type="submit" class="btn btn-primary">Simpan</button>


                </form>



            </div>
        </div>

    </div>
</div>
<!-- END OF MODAL EDIT -->

<!-- Modal untuk Tolak -->
<?php 
  $i=1;
  if (!empty($usulan_dph)):
  if ($usulan_dph != NULL) :
    foreach ($usulan_dph as $row):
?>
  <div class="modal fade" id="Modal_tolak<?= $row['id'];?>" data-backdrop="static" tabindex="1" role="dialog" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="staticBackdropLabel">Anda Yakin ingin Menolak Usulan ?</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <p>Jika anda yakin ingin menolak usulan silahkan pilih tolak</p>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
          <a href="<?= base_url(); ?>C_SeleksiDph/tolak/<?= $row['id']; ?>">
            <button type="button" class="btn btn-primary"><i class="fas fa-trash"></i> &nbsp;Tolak</button>
          </a>
        </div>
      </div>
    </div>
  </div>
<?php
  $i++;
  endforeach;
  endif;endif;
?>
<!-- end Modal untuk tolak -->

<!-- Modal untuk Terima -->
<?php 
  $i=1;
  if (!empty($usulan_dph)):
  if ($usulan_dph != NULL) :
    foreach ($usulan_dph as $row):
?>
  <div class="modal fade" id="Modal_terima<?= $row['id'];?>" data-backdrop="static" tabindex="1" role="dialog" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="staticBackdropLabel">Anda Yakin ingin Menerima Usulan ?</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <p>Jika anda yakin ingin menerima usulan silahkan pilih terima</p>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
          <a href="<?= base_url(); ?>C_SeleksiDph/terima/<?= $row['id']; ?>">
            <button type="button" class="btn btn-primary"><i class="fas fa-trash"></i> &nbsp;Terima</button>
          </a>
        </div>
      </div>
    </div>
  </div>
<?php
  $i++;
  endforeach;
  endif;endif;
?>
<!-- end Modal untuk Terima -->
<!-- end modal seleksi dph -->

<!-- untuk tombol simpan pada edit -->
<script>
  function get_tombol(){
    var tombol=document.getElementById('tombol_edit');
    tombol.disabled= false;
  }
</script>
<!-- end tombol simpan pada edit -->


<!-- Modal untuk Hapus KAndidat DPH -->
<?php 
  $i=1;
  if (!empty($kandidat_dph)):
  if ($kandidat_dph != NULL) :
    foreach ($kandidat_dph as $row):
?>
  <div class="modal fade" id="Modal_hapus<?= $row['id'];?>" data-backdrop="static" tabindex="1" role="dialog" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="staticBackdropLabel">Anda Yakin ingin Menghapus Kandidat ?</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <p>Jika anda yakin ingin menghapus kandidat silahkan pilih delete</p>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
          <a href="<?= base_url(); ?>C_KandidatDph/hapus/<?= $row['id']; ?>">
            <button type="button" class="btn btn-danger"><i class="fas fa-trash"></i> &nbsp;Delete</button>
          </a>
        </div>
      </div>
    </div>
  </div>
<?php
  $i++;
  endforeach;
  endif;endif;
?>
<!-- end Modal untuk Hapus Kandidat DPH -->

<!-- Modal untuk Hapus Ketua Wilayah -->
<?php 
  $i=1;
  if (!empty($kandidat_ketua_wilayah)):
  if ($kandidat_ketua_wilayah != NULL) :
    foreach ($kandidat_ketua_wilayah as $row):
?>
  <div class="modal fade" id="Modal_hapus1<?= $row['id'];?>" data-backdrop="static" tabindex="1" role="dialog" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="staticBackdropLabel">Anda Yakin ingin Menghapus Kandidat ?</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <p>Jika anda yakin ingin menghapus kandidat silahkan pilih delete</p>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
          <a href="<?= base_url(); ?>C_KandidatKetuaWilayah/hapus/<?= $row['id']; ?>">
            <button type="button" class="btn btn-danger"><i class="fas fa-trash"></i> &nbsp;Delete</button>
          </a>
        </div>
      </div>
    </div>
  </div>
<?php
  $i++;
  endforeach;
  endif;endif;
?>
<!-- end Modal untuk Hapus Ketua Wilayah -->

<!-- Modal untuk Hapus Ketua Lingkungan -->
<?php 
  $i=1;
  if (!empty($kandidat_ketua_lingkungan)):
  if ($kandidat_ketua_lingkungan != NULL) :
    foreach ($kandidat_ketua_lingkungan as $row):
?>
  <div class="modal fade" id="Modal_hapus2<?= $row['id'];?>" data-backdrop="static" tabindex="1" role="dialog" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="staticBackdropLabel">Anda Yakin ingin Menghapus Kandidat ?</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <p>Jika anda yakin ingin menghapus kandidat silahkan pilih delete</p>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
          <a href="<?= base_url(); ?>C_KandidatKetuaLingkungan/hapus/<?= $row['id']; ?>">
            <button type="button" class="btn btn-danger"><i class="fas fa-trash"></i> &nbsp;Delete</button>
          </a>
        </div>
      </div>
    </div>
  </div>
<?php
  $i++;
  endforeach;
  endif;endif;
?>
<!-- end Modal untuk Hapus Ketua Lingkungan -->

<!-- Modal untuk Hapus Pemilih -->
<?php 
  $i=1;
  if (!empty($pemilih)):
  if ($pemilih != NULL) :
    foreach ($pemilih as $row):
?>
  <div class="modal fade" id="Modal_hapusPemilih<?= $row['no'];?>" data-backdrop="static" tabindex="1" role="dialog" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="staticBackdropLabel">Anda Yakin ingin Menghapus Data Pemilih? ?</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <p>Jika anda yakin ingin menghapus data pemilih silahkan pilih delete</p>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
          <a href="<?= base_url(); ?>C_PengaturanPemilih/hapus/<?= $row['no']; ?>">
            <button type="button" class="btn btn-danger"><i class="fas fa-trash"></i> &nbsp;Delete</button>
          </a>
        </div>
      </div>
    </div>
  </div>
<?php
  $i++;
  endforeach;
  endif;endif;
?>
<!-- end Modal untuk Hapus Pemilih -->

<!-- BEGGINING OF MODAL SELECT Kategori DPH untuk suara DPH -->
<div class="modal fade" id="modalTampil" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Pilih Jenis Kandidat DPH</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="" method="post">
                    <div class="form-group">
                        <label for="Jenis kandidat">Jenis kandidat</label>
                        <select name="jenis_kandidat" id="jenis_kandidat" class="form-control" required>
                            <option value="" selected disabled>--Silahkan pilih Jenis kandidat--</option>
                            <?php 
                                $i = 1;
                                foreach ( $jenis_kandidat as $row): 
                            ?>
                                <option value="<?= $row['kode_dph']; ?>"><?= $row['kandidat_dph']; ?></option>

                            <?php
                                $i++;
                            endforeach;
                            ?>
                        </select>
                    </div>
                    <button type="submit" class="btn btn-primary">Tampilkan</button>
                </form>
            </div>
        </div>

    </div>
</div>
<!-- END OF MODAL SELECT Kategori DPH untuk Suara DPH -->

<!-- BEGGINING OF MODAL SELECT wilayah untuk suara ketua wilayah -->
<div class="modal fade" id="modalTampil1" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Pilih Wilayah</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="" method="post">
                    <div class="form-group">
                        <label for="Jenis kandidat">Wilayah</label>
                        <select name="wilayah" id="wilayah" class="form-control" required>
                            <option value="" selected disabled>--Silahkan pilih Wilayah--</option>
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
                    <button type="submit" class="btn btn-primary">Tampilkan</button>
                </form>
            </div>
        </div>

    </div>
</div>
<!-- END OF MODAL SELECT wilayah untuk suara ketua wilayah -->

<!-- BEGGINING OF MODAL SELECT wilayah untuk suara ketua lingkungan -->
<div class="modal fade" id="modalTampil2" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Pilih Lingkungan</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="" method="post">
                    <div class="form-group">
                        <label for="Jenis kandidat">Lingkungan</label>
                        <input list="data_lingkungan" type="text" class="form-control" name="lingkungan" id="lingkungan" autocomplete = "off" placeholder="Masukan Lingkungan..">
                        <datalist id="data_lingkungan">
                          <?php
                              foreach ($lingkungan as $row)
                              {
                                echo "<option value='$row->nama_lingkungan'>$row->nama_lingkungan</option>";
                              }
                          ?>
                     
                        </datalist>
                    </div>
                    <button type="submit" class="btn btn-primary">Tampilkan</button>
                </form>
            </div>
        </div>

    </div>
</div>
<!-- END OF MODAL SELECT wilayah untuk suara ketua lingkungan -->
