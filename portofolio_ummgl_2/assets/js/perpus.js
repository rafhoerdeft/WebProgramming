<?php 
          foreach ($Buku as $key) {
            $jb[] = $key->jenis_buku;
            $db[] = $key->jml;
          }

        ?>
        var jb = 
            '<?php
                for ($i=0; $i<count($jb); $i++) { 
                     echo $jb[$i];
                     if ($i != count($db)-1){
                        echo ',';
                     }
                } 
            ?>'
        var dataJenisBuku = jb.split(',');

        var db = 
            '<?php
                for ($i=0; $i<count($db); $i++) { 
                     echo $db[$i];
                     if ($i != count($db)-1){
                        echo ',';
                     }
                } 
            ?>'
        var dataJmlBuku = db.split(',');

        $(function(){
          'use strict';

          var ctx1 = document.getElementById('chartBar1').getContext('2d');
          var myChart1 = new Chart(ctx1, {
            type: 'bar',
            data: {
              labels:  dataJenisBuku,
              datasets: [{
                label: '# Jumlah',
                data: dataJmlBuku,
                backgroundColor: [
                  '#29B0D0',
                  '#2A516E',
                  '#F07124',
                  '#B50E2A',
                  '#F50E2A',
                  '#974195',
                  '#979193',
                  '#A09124',
                  '#FFA124',
                  '#BBA0E3',
                  '#BB7124',
                  '#AAB624',
                  '#11F124',
                  '#0AAF24',
                  '#29B0D0',
                  '#2A516E',
                  '#F07124',
                  '#BBA0E3',
                  '#979193',
                  '#974195',
                  '#A09124',
                  '#F50E2A',
                  '#FFA124',
                  '#BB7124',
                  '#AAB624',
                  '#11F124',
                  '#0AAF24'
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
                    fontSize: 11
                  }
                }]
              }
            }
          });
          
        });