        

        <!-- page content -->
        <div class="right_col" role="main">
          <div class="row ">
            <div class="page-title">
              <div class="title_left">
                <h3><?= $title; ?></h3>
              </div>
            </div>

             <!-- top tiles -->
          <div class="row tile_count col-md-12 col-sm-12 col-xs-12">
            <div class="col-md-2 col-sm-4 col-xs-6 tile_stats_count">
              <span class="count_top"><i class="fa fa-user"></i>Pelanggan</span>
              <div class="count"><i class="fa fa-users"></i> <?= $pembeli ?></div>
            </div>
            <div class="col-md-2 col-sm-4 col-xs-6 tile_stats_count">
              <span class="count_top"><i class="fa fa-user"></i> Karyawan</span>
              <div class="count"><i class="fa fa-group"></i> <?= $karyawan; ?></div>
            </div>

             <div class="col-md-2 col-sm-4 col-xs-6 tile_stats_count">
              <span class="count_top"><i class="fa fa-cubes"></i> Total Barang</span>
              <?php foreach ($total_barang as $key): ?>
              <div class="count"><i class="fa fa-cubes"></i> <?= $key; ?></div>
              <?php endforeach ?>
            </div>

            <div class="col-md-4 col-sm-4 col-xs-6 tile_stats_count">
              <span class="count_top"><i class="fa fa-money"></i> Pendapatan hari ini</span>
              <?php foreach ($tunai_hari_ini as $key): ?>
              <div class="count"><i class="fa fa-money"></i> Rp.<?= number_format($key); ?>,-</div>
              <?php endforeach ?>
            </div>

            </div>

           
          </div>
          <!-- /top tiles -->


              <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                  <div class="x_title">
                    <h2>Penjualan perbulan</h2>
                    <ul class="nav navbar-right panel_toolbox">
                      <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                      </li>
                    </ul>
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">
                    <canvas id="canvas"></canvas>
                  </div>
                </div>
              </div>
          </div>
        </div>
        <!-- /page content -->
  <script src="<?= base_url('assets/') ?>vendors/jquery/dist/jquery.min.js"></script>
<script>
        var MONTHS = ["January", "February", "Maret", "April", "Mai", "Juni", "Juli", "Agustus", "September", "October", "November", "December"];
        
        var randomScalingFactor = function() {
            return Math.round(Math.random() * 100);
            //return 0;
        };
        var randomColorFactor = function() {
            return Math.round(Math.random() * 255);
        };
        var randomColor = function(opacity) {
            return 'rgba(' + randomColorFactor() + ',' + randomColorFactor() + ',' + randomColorFactor() + ',' + (opacity || '.3') + ')';
        };

        var config = {
            type: 'line',
            data: {
                labels: ["January", "February", "Maret", "April", "May", "June", "July","Agustus","September","Oktober","November","Desember"],
                datasets: [  {
                    label: "<?= date('Y') ?>",
                    data: [<?= $januari?>,<?= $februari?>,<?= $maret?>,<?= $april?>,<?= $mei?>,<?= $juni?>,<?= $juli?>,<?= $agust?>,<?= $sept?>,<?= $okt?>,<?= $nov?>,<?= $des?>],
                }]
            },
            options: {
                responsive: true,
                title:{
                    display:true,
                    text:'Statistik Barang terjual perbulan'
                },
                tooltips: {
                    mode: 'label',
                    callbacks: {
                        // beforeTitle: function() {
                        //     return '...beforeTitle';
                        // },
                        // afterTitle: function() {
                        //     return '...afterTitle';
                        // },
                        // beforeBody: function() {
                        //     return '...beforeBody';
                        // },
                        // afterBody: function() {
                        //     return '...afterBody';
                        // },
                        // beforeFooter: function() {
                        //     return '...beforeFooter';
                        // },
                        // footer: function() {
                        //     return 'Footer';
                        // },
                        // afterFooter: function() {
                        //     return '...afterFooter';
                        // },
                    }
                },
                hover: {
                    mode: 'dataset'
                },
                scales: {
                    xAxes: [{
                        display: true,
                        scaleLabel: {
                            show: true,
                            labelString: 'Month'
                        }
                    }],
                    yAxes: [{
                        display: true,
                        scaleLabel: {
                            show: true,
                            labelString: 'Value'
                        },
                        ticks: {

                        }
                    }]
                }
            }
        };

        $.each(config.data.datasets, function(i, dataset) {
            dataset.borderColor = randomColor(0.4);
            dataset.backgroundColor = randomColor(0.5);
            dataset.pointBorderColor = randomColor(0.7);
            dataset.pointBackgroundColor = randomColor(0.5);
            dataset.pointBorderWidth = 1;
        });

        window.onload = function() {
            var ctx = document.getElementById("canvas").getContext("2d");
            window.myLine = new Chart(ctx, config);
        };

        $('#randomizeData').click(function() {
            $.each(config.data.datasets, function(i, dataset) {
                dataset.data = dataset.data.map(function() {
                    return randomScalingFactor();
                });

            });

            window.myLine.update();
        });

        $('#changeDataObject').click(function() {
            config.data = {
                labels: ["July", "August", "September", "October", "November", "December"],
                datasets: [{
                    label: "My First dataset",
                    data: [randomScalingFactor(), randomScalingFactor(), randomScalingFactor(), randomScalingFactor(), randomScalingFactor(), randomScalingFactor()],
                    fill: false,
                }, {
                    label: "My Second dataset",
                    fill: false,
                    data: [randomScalingFactor(), randomScalingFactor(), randomScalingFactor(), randomScalingFactor(), randomScalingFactor(), randomScalingFactor()],
                }]
            };

            $.each(config.data.datasets, function(i, dataset) {
                dataset.borderColor = randomColor(0.4);
                dataset.backgroundColor = randomColor(0.5);
                dataset.pointBorderColor = randomColor(0.7);
                dataset.pointBackgroundColor = randomColor(0.5);
                dataset.pointBorderWidth = 1;
            });

            // Update the chart
            window.myLine.update();
        });

        $('#addDataset').click(function() {
            var newDataset = {
                label: 'Dataset ' + config.data.datasets.length,
                borderColor: randomColor(0.4),
                backgroundColor: randomColor(0.5),
                pointBorderColor: randomColor(0.7),
                pointBackgroundColor: randomColor(0.5),
                pointBorderWidth: 1,
                data: [],
            };

            for (var index = 0; index < config.data.labels.length; ++index) {
                newDataset.data.push(randomScalingFactor());
            }

            config.data.datasets.push(newDataset);
            window.myLine.update();
        });

        $('#addData').click(function() {
            if (config.data.datasets.length > 0) {
                var month = MONTHS[config.data.labels.length % MONTHS.length];
                config.data.labels.push(month);

                $.each(config.data.datasets, function(i, dataset) {
                    dataset.data.push(randomScalingFactor());
                });

                window.myLine.update();
            }
        });

        $('#removeDataset').click(function() {
            config.data.datasets.splice(0, 1);
            window.myLine.update();
        });

        $('#removeData').click(function() {
            config.data.labels.splice(-1, 1); // remove the label first

            config.data.datasets.forEach(function(dataset, datasetIndex) {
                dataset.data.pop();
            });

            window.myLine.update();
        });
    </script>