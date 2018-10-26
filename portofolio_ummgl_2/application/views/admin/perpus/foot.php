<div class="slim-footer">
      <div class="container">
        <p>Copyright 2018 &copy; All Rights Reserved. Slim Dashboard Template</p>
        <p>Edited by: <a href="">Rafiq Fathino</a></p>
      </div><!-- container -->
    </div><!-- slim-footer -->

    <script src="<?php echo base_url(); ?>assets/lib/jquery/js/jquery.js"></script>
    <script src="<?php echo base_url(); ?>assets/lib/popper.js/js/popper.js"></script>
    <script src="<?php echo base_url(); ?>assets/lib/bootstrap/js/bootstrap.js"></script>
    <script src="<?php echo base_url(); ?>assets/lib/jquery.cookie/js/jquery.cookie.js"></script>
    <script src="<?php echo base_url(); ?>assets/lib/raphael/js/raphael.min.js"></script>
    <script src="<?php echo base_url(); ?>assets/lib/chart.js/js/Chart.js"></script>
    <script src="<?php echo base_url(); ?>assets/lib/d3/js/d3.js"></script>
    <!-- <script src="<?php echo base_url(); ?>assets/lib/rickshaw/js/rickshaw.min.js"></script> -->
    <script src="<?php echo base_url(); ?>assets/lib/morris.js/js/morris.js"></script>
    <script src="<?php echo base_url(); ?>assets/lib/jquery.sparkline.bower/js/jquery.sparkline.min.js"></script>
    <script src="<?php echo base_url(); ?>assets/lib/select2/js/select2.full.min.js"></script>

    <script src="<?php echo base_url(); ?>assets/js/ResizeSensor.js"></script>

    <script src="<?php echo base_url(); ?>assets/js/slim.js"></script>
    <script src="<?php echo base_url(); ?>assets/js/chart.morris.js"></script>

    <!-----Data Statistik Buku with AJAX----->
    <script type="text/javascript">
      var tampil = '<?php echo $tampil; ?>';
      if (tampil=='buku') {
        tampilDataBuku();
      }
      function tampilDataBuku(){
        tampil_data_grafik();
        tampil_data_tabel();

        function tampil_data_grafik(){
            var dataBuku = [];
            var dataJml = [];
            $.ajax({
                type  : 'ajax',
                url   : '<?php echo base_url(); ?>/admin/getDataBuku',
                async : false,
                dataType : 'json',
                success : function(data){
                    var html = '';
                    var i;
                    for(i=0; i<data.length; i++){
                      if (data[i].jenis_buku!='Image' && data[i].jenis_buku!='Video' && data[i].jenis_buku!='Sirkulasi') {
                        dataBuku.push(data[i].jenis_buku);
                        dataJml.push(data[i].jml_buku);
                      }
                    }
                    // $('#coba').html(html);
                    var show = '<canvas id="chartBarDataBuku" height="200"></canvas>';
                    $('#grafik_buku').html(show);
                    var ctx1 = document.getElementById('chartBarDataBuku').getContext('2d');
                    var myChart1 = new Chart(ctx1, {
                      type: 'bar',
                      data: {
                        labels:  dataBuku,
                        datasets: [{
                          label: '# Jumlah',
                          data: dataJml,
                          backgroundColor: [
                            '#29B0D0','#2A516E','#F07124','#B50E2A','#F50E2A','#974195','#979193','#A09124','#FFA124',
                            '#BBA0E3','#BB7124','#AAB624','#11F124','#0AAF24','#29B0D0','#2A516E','#F07124','#BBA0E3',
                            '#979193','#974195','#A09124','#F50E2A','#FFA124','#BB7124','#AAB624','#11F124','#0AAF24'
                          ]
                        }]
                      },
                      options: {
                        legend: {
                          display: false,
                            labels: {
                              display: false
                            }
                        },
                        scales: {
                          yAxes: [{
                            ticks: {
                              beginAtZero:true,
                              fontSize: 10
                              //max: 80
                            }
                          }],
                          xAxes: [{
                            ticks: {
                              beginAtZero:true,
                              fontSize: 9
                            }
                          }]
                        }
                      }
                    });
                }

            });
        }

        function tampil_data_tabel(){
            $.ajax({
                type  : 'ajax',
                url   : '<?php echo base_url(); ?>/admin/getDataBuku',
                async : false,
                dataType : 'json',
                success : function(data){
                    var thead = '';
                    var row = '';
                    var i;
                    var no=0;
                    for(i=0; i<data.length; i++){
                      if (data[i].jenis_buku!='Image' && data[i].jenis_buku!='Video' && data[i].jenis_buku!='Sirkulasi') {
                        no++;
                        row += '<tr>'+
                                  '<td align="center">'+no+'</td>'+
                                  '<td>'+data[i].jenis_buku+'</td>'+
                                  '<td align="center">'+data[i].jml_buku+'</td>'+
                                '</tr>';
                      }
                    }
                    thead += '<tr>'+
                                '<th width="75px"><center>No.</center></th>'+
                                '<th><center>Kategori Buku</center></th>'+
                                '<th><center>Jumlah</center></th>'+             
                              '</tr>';
                    $('#tbl-buku thead').html(thead);
                    $('#tbl-buku tbody').html(row); 
                }

            });
        }
      }
    </script>

    <!-----Data Statistik Anggota All with AJAX----->
    <script type="text/javascript">
      var tampil = '<?php echo $tampil; ?>';
      if (tampil=='anggotaAll') {
        tampilAnggotaAll();
      }
      function tampilAnggotaAll(){
        tampil_data_grafik();
        tampil_data_tabel();

        function tampil_data_grafik(){
            var dataNama = [];
            var dataJmlAnggota = [];
            $.ajax({
                type  : 'ajax',
                url   : '<?php echo base_url(); ?>/admin/getDataAnggotaAll',
                async : false,
                dataType : 'json',
                success : function(data){
                    var html = '';
                    var i;
                    var jmlMhs = 0;
                    for(i=0; i<data.length; i++){
                      if (data[i].jenis_anggota!='Duplikat') {
                        if (data[i].jenis_anggota=='Mahasiswa' || data[i].jenis_anggota=='Tugas Akhir' || data[i].jenis_anggota=='Skripsi'){
                          jmlMhs = parseInt(data[i].jumlah) + parseInt(jmlMhs);
                        }else{
                          dataNama.push(data[i].jenis_anggota);
                          dataJmlAnggota.push(data[i].jumlah);
                        }
                      }
                    }
                    dataNama.push('Mahasiswa');
                    dataJmlAnggota.push(jmlMhs);
                    // $('#coba').html(html);
                    var show = '<canvas id="chartBarDataAnggota" height="200"></canvas>';
                    $('#grafik_anggota').html(show);
                    var ctx1 = document.getElementById('chartBarDataAnggota').getContext('2d');
                    var myChart1 = new Chart(ctx1, {
                      type: 'bar',
                      data: {
                        labels:  dataNama,
                        datasets: [{
                          label: '# Jumlah',
                          data: dataJmlAnggota,
                          backgroundColor: [
                            '#29B0D0','#2A516E','#F07124','#B50E2A','#F50E2A','#974195','#979193','#A09124','#FFA124',
                            '#BBA0E3','#BB7124','#AAB624','#11F124','#0AAF24','#29B0D0','#2A516E','#F07124','#BBA0E3',
                            '#979193','#974195','#A09124','#F50E2A','#FFA124','#BB7124','#AAB624','#11F124','#0AAF24'
                          ]
                        }]
                      },
                      options: {
                        legend: {
                          display: false,
                            labels: {
                              display: false
                            }
                        },
                        scales: {
                          yAxes: [{
                            ticks: {
                              beginAtZero:true,
                              fontSize: 10
                              //max: 80
                            }
                          }],
                          xAxes: [{
                            ticks: {
                              beginAtZero:true,
                              fontSize: 9
                            }
                          }]
                        }
                      }
                    });
                }

            });
        }

        function tampil_data_tabel(){
            // var dataNama = [];
            // var dataJmlAnggota = [];
            $.ajax({
                type  : 'ajax',
                url   : '<?php echo base_url(); ?>/admin/getDataAnggotaAll',
                async : false,
                dataType : 'json',
                success : function(data){
                    var thead = '';
                    var row = '';
                    var i;
                    var jmlMhs = 0;
                    var no=0;
                    for(i=0; i<data.length; i++){
                      if (data[i].jenis_anggota!='Duplikat') {
                        if (data[i].jenis_anggota=='Mahasiswa' || data[i].jenis_anggota=='Tugas Akhir' || data[i].jenis_anggota=='Skripsi'){
                          jmlMhs = parseInt(data[i].jumlah) + parseInt(jmlMhs);
                        }else{
                          no++;
                          row += '<tr>'+
                                  '<td align="center">'+no+'</td>'+
                                  '<td>'+data[i].jenis_anggota+'</td>'+
                                  '<td align="center">'+data[i].jumlah+'</td>'+
                                '</tr>';
                        }
                      }
                    }
                    no++;
                    row += '<tr>'+
                                  '<td align="center">'+no+'</td>'+
                                  '<td>Mahasiswa</td>'+
                                  '<td align="center">'+jmlMhs+'</td>'+
                                '</tr>';

                    thead += '<tr>'+
                                '<th width="75px"><center>No.</center></th>'+
                                '<th><center>Jenis Anggota</center></th>'+
                                '<th><center>Jumlah</center></th>'+             
                              '</tr>';
                    $('#tbl-anggota thead').html(thead);
                    $('#tbl-anggota tbody').html(row); 
                }

            });
        }
      }
    </script>

    <!-----Data Statistik Anggota per Fakultas with AJAX----->
    <script type="text/javascript">
      var tampil = '<?php echo $tampil; ?>';
      if (tampil=='anggotaMhs') {
        tampilAnggotaMhsFak();
      }
      function tampilAnggotaMhsFak(){
        tampil_data_grafik();
        tampil_data_tabel();

        function tampil_data_grafik(){
            var dataAnggota = [];
            // var dataJmlAnggota = [];
            $.ajax({
                type  : 'ajax',
                url   : '<?php echo base_url(); ?>/admin/getDataAnggotaMhs',
                async : false,
                dataType : 'json',
                success : function(data){
                    var i;
                    for(i=0; i<data.length; i++){
                        dataAnggota.push({y: data[i].fakultas, a: data[i].aktif, b: data[i].pasif});
                    }
                    // $('#coba').html(dataAnggota);
                    var show = '<div id="morrisBar2" class="ht-200 ht-sm-500 bd"></div>';
                    $('#grafik_anggota').html(show);
                    new Morris.Bar({
                        element: 'morrisBar2',
                        data: dataAnggota,
                        xkey: 'y',
                        ykeys: ['a', 'b'],
                        labels: ['Aktif', 'Pasif'],
                        barColors: ['#974195', '#14A0C1'],
                        gridTextSize: 11,
                        hideHover: 'auto',
                        resize: true
                    });
                }

            });
        }

        function tampil_data_tabel(){
            // var dataNama = [];
            // var dataJmlAnggota = [];
            $.ajax({
                type  : 'ajax',
                url   : '<?php echo base_url(); ?>/admin/getDataAnggotaMhs',
                async : false,
                dataType : 'json',
                success : function(data){
                    var thead = '';
                    var row = '';
                    var i;
                    var no=0;
                    for(i=0; i<data.length; i++){
                        no++;
                        row += '<tr>'+
                                  '<td align="center">'+no+'</td>'+
                                  '<td>'+data[i].fakultas+'</td>'+
                                  '<td align="center">'+data[i].aktif+'</td>'+
                                  '<td align="center">'+data[i].pasif+'</td>'+
                                '</tr>';
                    }
                    thead += '<tr>'+
                                '<th width="75px"><center>No.</center></th>'+
                                '<th><center>Fakultas</center></th>'+
                                '<th width="100px"><center>Anggota Aktif</center></th>'+ 
                                '<th width="100px"><center>Anggota Pasif</center></th>'+            
                              '</tr>';
                    $('#tbl-anggota thead').html(thead);
                    $('#tbl-anggota tbody').html(row); 
                }

            });
        }
      }
    </script>

    <!-----Data Statistik Anggota per Prodi with AJAX----->
    <script type="text/javascript">
      function tampilDataPerProdi(){
        var kd_fak=$('#select3 select').val();
        $.ajax({
                type  : 'POST',
                url   : '<?php echo base_url(); ?>/admin/getDataAnggotaMhs',
                dataType : 'JSON',
                data : {kd_fak:kd_fak},
                success : function(data){
                  var dataAnggota = [];
                  var thead = '';
                  var row = '';
                  var i;
                  var no=0;
                  for(i=0; i<data.length; i++){
                      dataAnggota.push({y: data[i].prodi, a: data[i].aktif, b: data[i].pasif});
                      no++;
                      row += '<tr>'+
                                '<td align="center">'+no+'</td>'+
                                '<td>'+data[i].prodi+'</td>'+
                                '<td align="center">'+data[i].aktif+'</td>'+
                                '<td align="center">'+data[i].pasif+'</td>'+
                              '</tr>';
                  }
                  thead += '<tr>'+
                              '<th width="75px"><center>No.</center></th>'+
                              '<th><center>Program Studi</center></th>'+
                              '<th width="100px"><center>Anggota Aktif</center></th>'+ 
                              '<th width="100px"><center>Anggota Pasif</center></th>'+            
                            '</tr>';
                  $('#tbl-anggota thead').html(thead);
                  $('#tbl-anggota tbody').html(row);
                  var show = '<div id="morrisBar2" class="ht-200 ht-sm-500 bd"></div>';
                    $('#grafik_anggota').html(show);
                    new Morris.Bar({
                        element: 'morrisBar2',
                        data: dataAnggota,
                        xkey: 'y',
                        ykeys: ['a', 'b'],
                        labels: ['Aktif', 'Pasif'],
                        barColors: ['#974195', '#14A0C1'],
                        gridTextSize: 11,
                        hideHover: 'auto',
                        resize: true
                    });
              }

        }); 
      }
    </script>

    <!-----Tampil Grafik/Tabel----->
    <script type="text/javascript">
      //$('#grafik').show();
      $('#tabel').hide();
      function pilih(){
        var hasil = document.getElementById("select").value;
        if (hasil == 'grafik') {
          $('#grafik').show();
          $('#tabel').hide();
        }
        else{
          $('#grafik').hide();
          $('#tabel').show();
        }
      }
    </script>

    <!-----Tampil Select-Button----->
    <script type="text/javascript">
      $('#select3').hide();
      $('#select3 select').attr('disabled','');
      // $('#button-show').hide();
      function pilih2(){
        var hasil = document.getElementById("select2").value;
        if (hasil == 'prodi') {
          $('#select3').show();
          $('#select3 select').removeAttr('disabled');
          // $('#button-show').show();
        }
        else{
          $('#select3').hide();
          $('#select3 select').attr('disabled','');
          // $('#button-show').hide();
          tampilAnggotaMhsFak();
          $('#pilihFak').attr('selected','');
        }
      }
    </script>

    <!-----Tampil Per Prodi----->
    <script type="text/javascript">
      function tampilProdi(){
        $('#pilihFak').removeAttr('selected');
          tampilDataPerProdi();
          
      }
    </script>

  </body>
</html>