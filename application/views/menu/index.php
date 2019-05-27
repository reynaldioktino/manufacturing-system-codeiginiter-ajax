<?php $this->load->view('main/header'); ?>
</head>

<body>
    <div id="preloader">
        <div class="loader"></div>
    </div>
    <!-- preloader area end -->
    <!-- page container area start -->
    <div class="page-container">
        <!-- navbar -->
        <?php $this->load->view('main/navbar'); ?>
        <!-- isi dashboard -->
        <div class="main-content-inner">
            <div class="row">
                <!-- seo fact area start -->
                <div class="col-lg-8">
                    <div class="row">
                        <div class="col-md-6 mt-5 mb-3">
                            <div class="card">
                                <div class="seo-fact sbg1">
                                    <div class="p-4 d-flex justify-content-between align-items-center">
                                        <div class="seofct-icon"><i class="ti-shopping-cart"></i> Products</div>
                                        <h2><?php echo $product_count->semua; ?></h2>
                                    </div>
                                    <canvas id="seolinechart1" height="50"></canvas>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6 mt-md-5 mb-3">
                            <div class="card">
                                <div class="seo-fact sbg2">
                                    <div class="p-4 d-flex justify-content-between align-items-center">
                                        <div class="seofct-icon"><i class="ti-user"></i> User</div>
                                        <h2><?php echo $user_count->semua; ?></h2>
                                    </div>
                                    <canvas id="seolinechart2" height="50"></canvas>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6 mb-3 mb-lg-0">
                            <div class="card">
                                <div class="seo-fact sbg3">
                                    <div class="p-4 d-flex justify-content-between align-items-center">
                                        <div class="seofct-icon"></i>Bill of Material</div>
                                        <h2><?php echo $bom_count->semua; ?></h2>
                                        <canvas id="seolinechart3" height="60"></canvas>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="card">
                                <div class="seo-fact sbg4">
                                    <div class="p-4 d-flex justify-content-between align-items-center">
                                        <div class="seofct-icon"></i>Manufacturing</div>
                                        <h2><?php echo $manufacturing_count->semua; ?></h2>
                                        <canvas id="seolinechart4" height="60"></canvas>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- seo fact area end -->
                <!-- Advertising area start -->
                <div class="col-lg-4 mt-5">
                    <div class="card h-full">
                        <div class="card-body">
                            <h4 class="header-title">Manufacturing</h4>
                            <canvas id="seolinechart8" height="233"></canvas>
                        </div>
                    </div>
                </div>
                <!-- Advertising area end -->
                <!-- Statistics area start -->
                <div class="col-lg-8 mt-5">
                    <div class="card">
                        <div class="card-body">
                            <h4 class="header-title">Manufacturing Statistics</h4>
                            <div id="socialads" style="height: 500px;"></div>
                        </div>
                    </div>
                </div>
                <!-- Statistics area end -->
                <!-- Advertising area start -->
                <div class="col-lg-4 mt-5">
                    <div class="card">
                        <div class="card-body">
                            <div class="d-flex justify-content-between mb-4">
                                <h4 class="header-title mb-0">Manufacturing Done</h4>
                            </div>
                            <div class="table-responsive">
                                <table class="dbkit-table">
                                    <tbody>
                                        <tr class="heading-td">
                                            <td>Product Name</td>
                                            <td>Quantity</td>
                                        </tr>
                                        <?php 
                                        $a=1;
                                        foreach ($manufacturing_done as $va) { ?>
                                        <tr>
                                            <td><?php echo $va->product_name; ?></td>
                                            <td><?php echo $va->quantity; ?></td>
                                        </tr>
                                        <?php
                                        $a++; 
                                    } ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                <!-- Advertising area end -->
            </div>
        </div>

        <!-- visitor graph area start -->
        <!-- <div class="card mt-5">
            <div class="card-body">
                <div class="d-flex justify-content-between mb-5">
                    <h4 class="header-title mb-0">Visitor Graph</h4>\
                </div>
                <div id="visitor_graph"></div>
            </div>
        </div> -->
        <!-- visitor graph area end -->
        <div class="row">
            <!-- product sold area start -->
            <div class="col-xl-8 col-lg-7 col-md-12 mt-5">
                <div class="card">
                    <div class="card-body">
                        <div class="d-flex justify-content-between mb-4">
                            <h4 class="header-title mb-0">Manufacturing Produce</h4>
                        </div>
                        <div class="table-responsive">
                            <table class="dbkit-table">
                                <tbody>
                                    <tr class="heading-td">
                                        <td>Product Name</td>
                                        <td>Quantity</td>
                                        <td>Deadline Start</td>
                                    </tr>
                                    <?php 
                                    $a=1;
                                    foreach ($manufacturing_produce as $val) { ?>
                                    <tr>
                                        <td><?php echo $val->product_name; ?></td>
                                        <td><?php echo $val->quantity; ?></td>
                                        <td><?php echo $val->deadline_start; ?></td>
                                    </tr>
                                    <?php
                                    $a++; 
                                } ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
        <!-- product sold area end -->
        <!-- team member area start -->
        <div class="col-xl-4 col-lg-5 col-md-12 mt-5">
            <div class="card">
                <div class="card-body">
                    <div class="d-sm-flex flex-wrap justify-content-between mb-4 align-items-center">
                        <h4 class="header-title mb-0">Contact</h4>
                    </div>
                    <div class="member-box">
                        <?php 
                        $no=1;
                        foreach ($user as $value) { ?>

                        <div class="s-member">
                            <div class="media align-items-center">
                                <img src="assets/images/team/team-author1.jpg" class="d-block ui-w-30 rounded-circle" alt="">
                                <div class="media-body ml-5">
                                    <p><?php echo $value->name ?></p><span><?php if($value->level==1){echo 'Administrator';}else{echo 'Pengguna';} ?></span>
                                </div>
                                <div class="tm-social">
                                    <a href="#"><i class="fa fa-phone"></i></a>
                                    <a href="#"><i class="fa fa-envelope"></i></a>
                                </div>
                            </div>
                        </div>
                        <?php
                        $no++; 
                    } ?>
                </div>
            </div>
        </div>
    </div>
    <!-- team member area end -->
</div>
</div>
</div>
<!-- main content area end -->
<!-- footer area start-->
<footer>
    <div class="footer-area">
        <p>© Copyright 2018. All right reserved. Template by <a href="https://colorlib.com/wp/">Colorlib</a>.</p>
    </div>
</footer>
<!-- footer area end-->
</div>
<!-- page container area end -->
<!-- offset area start -->
<div class="offset-area">
    <div class="offset-close"><i class="ti-close"></i></div>
    <ul class="nav offset-menu-tab">
        <li><a class="active" data-toggle="tab" href="#activity">Activity</a></li>
        <li><a data-toggle="tab" href="#settings">Settings</a></li>
    </ul>
    <div class="offset-content tab-content">
        <div id="activity" class="tab-pane fade in show active">
            <div class="recent-activity">
                <div class="timeline-task">
                    <div class="icon bg1">
                        <i class="fa fa-envelope"></i>
                    </div>
                    <div class="tm-title">
                        <h4>Rashed sent you an email</h4>
                        <span class="time"><i class="ti-time"></i>09:35</span>
                    </div>
                    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Esse distinctio itaque at.
                    </p>
                </div>
                <div class="timeline-task">
                    <div class="icon bg2">
                        <i class="fa fa-check"></i>
                    </div>
                    <div class="tm-title">
                        <h4>Added</h4>
                        <span class="time"><i class="ti-time"></i>7 Minutes Ago</span>
                    </div>
                    <p>Lorem ipsum dolor sit amet consectetur.
                    </p>
                </div>
                <div class="timeline-task">
                    <div class="icon bg2">
                        <i class="fa fa-exclamation-triangle"></i>
                    </div>
                    <div class="tm-title">
                        <h4>You missed you Password!</h4>
                        <span class="time"><i class="ti-time"></i>09:20 Am</span>
                    </div>
                </div>
                <div class="timeline-task">
                    <div class="icon bg3">
                        <i class="fa fa-bomb"></i>
                    </div>
                    <div class="tm-title">
                        <h4>Member waiting for you Attention</h4>
                        <span class="time"><i class="ti-time"></i>09:35</span>
                    </div>
                    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Esse distinctio itaque at.
                    </p>
                </div>
                <div class="timeline-task">
                    <div class="icon bg3">
                        <i class="ti-signal"></i>
                    </div>
                    <div class="tm-title">
                        <h4>You Added Kaji Patha few minutes ago</h4>
                        <span class="time"><i class="ti-time"></i>01 minutes ago</span>
                    </div>
                    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Esse distinctio itaque at.
                    </p>
                </div>
                <div class="timeline-task">
                    <div class="icon bg1">
                        <i class="fa fa-envelope"></i>
                    </div>
                    <div class="tm-title">
                        <h4>Ratul Hamba sent you an email</h4>
                        <span class="time"><i class="ti-time"></i>09:35</span>
                    </div>
                    <p>Hello sir , where are you, i am egerly waiting for you.
                    </p>
                </div>
                <div class="timeline-task">
                    <div class="icon bg2">
                        <i class="fa fa-exclamation-triangle"></i>
                    </div>
                    <div class="tm-title">
                        <h4>Rashed sent you an email</h4>
                        <span class="time"><i class="ti-time"></i>09:35</span>
                    </div>
                    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Esse distinctio itaque at.
                    </p>
                </div>
                <div class="timeline-task">
                    <div class="icon bg2">
                        <i class="fa fa-exclamation-triangle"></i>
                    </div>
                    <div class="tm-title">
                        <h4>Rashed sent you an email</h4>
                        <span class="time"><i class="ti-time"></i>09:35</span>
                    </div>
                </div>
                <div class="timeline-task">
                    <div class="icon bg3">
                        <i class="fa fa-bomb"></i>
                    </div>
                    <div class="tm-title">
                        <h4>Rashed sent you an email</h4>
                        <span class="time"><i class="ti-time"></i>09:35</span>
                    </div>
                    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Esse distinctio itaque at.
                    </p>
                </div>
                <div class="timeline-task">
                    <div class="icon bg3">
                        <i class="ti-signal"></i>
                    </div>
                    <div class="tm-title">
                        <h4>Rashed sent you an email</h4>
                        <span class="time"><i class="ti-time"></i>09:35</span>
                    </div>
                    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Esse distinctio itaque at.
                    </p>
                </div>
            </div>
        </div>
        <div id="settings" class="tab-pane fade">
            <div class="offset-settings">
                <h4>General Settings</h4>
                <div class="settings-list">
                    <div class="s-settings">
                        <div class="s-sw-title">
                            <h5>Notifications</h5>
                            <div class="s-swtich">
                                <input type="checkbox" id="switch1" />
                                <label for="switch1">Toggle</label>
                            </div>
                        </div>
                        <p>Keep it 'On' When you want to get all the notification.</p>
                    </div>
                    <div class="s-settings">
                        <div class="s-sw-title">
                            <h5>Show recent activity</h5>
                            <div class="s-swtich">
                                <input type="checkbox" id="switch2" />
                                <label for="switch2">Toggle</label>
                            </div>
                        </div>
                        <p>The for attribute is necessary to bind our custom checkbox with the input.</p>
                    </div>
                    <div class="s-settings">
                        <div class="s-sw-title">
                            <h5>Show your emails</h5>
                            <div class="s-swtich">
                                <input type="checkbox" id="switch3" />
                                <label for="switch3">Toggle</label>
                            </div>
                        </div>
                        <p>Show email so that easily find you.</p>
                    </div>
                    <div class="s-settings">
                        <div class="s-sw-title">
                            <h5>Show Task statistics</h5>
                            <div class="s-swtich">
                                <input type="checkbox" id="switch4" />
                                <label for="switch4">Toggle</label>
                            </div>
                        </div>
                        <p>The for attribute is necessary to bind our custom checkbox with the input.</p>
                    </div>
                    <div class="s-settings">
                        <div class="s-sw-title">
                            <h5>Notifications</h5>
                            <div class="s-swtich">
                                <input type="checkbox" id="switch5" />
                                <label for="switch5">Toggle</label>
                            </div>
                        </div>
                        <p>Use checkboxes when looking for yes or no answers.</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- offset area end -->
<!-- jquery latest version -->
<script src="<?php echo base_url('') ?>assets/js/vendor/jquery-2.2.4.min.js"></script>
<!-- bootstrap 4 js -->
<script src="<?php echo base_url('') ?>assets/js/popper.min.js"></script>
<script src="<?php echo base_url('') ?>assets/js/bootstrap.min.js"></script>
<script src="<?php echo base_url('') ?>assets/js/owl.carousel.min.js"></script>
<script src="<?php echo base_url('') ?>assets/js/metisMenu.min.js"></script>
<script src="<?php echo base_url('') ?>assets/js/jquery.slimscroll.min.js"></script>
<script src="<?php echo base_url('') ?>assets/js/jquery.slicknav.min.js"></script>

<!-- start chart js -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.7.2/Chart.min.js"></script>
<!-- start highcharts js -->
<script src="https://code.highcharts.com/highcharts.js"></script>
<!-- start zingchart js -->
<script src="https://cdn.zingchart.com/zingchart.min.js"></script>
<script>
    zingchart.MODULESDIR = "https://cdn.zingchart.com/modules/";
    ZC.LICENSE = ["569d52cefae586f634c54f86dc99e6a9", "ee6b7db5b51705a13dc2339db3edaf6d"];
</script>
<!-- all line chart activation -->
<script src="<?php echo base_url('') ?>assets/js/line-chart.js"></script>
<!-- all bar chart activation -->
<!-- <script src="<echo base_url('') ?>assets/js/bar-chart.js"></script> -->
    <!-- all pie chart -->
    <!-- <script src="echo base_url('') ?>assets/js/pie-chart.js"></script> -->
    <!-- others plugins -->
    <script src="<?php echo base_url('') ?>assets/js/plugins.js"></script>
    <script src="<?php echo base_url('') ?>assets/js/scripts.js"></script>
    <script type="text/javascript">
        /*--------------  bar chart 14 highchart start ------------*/
        if ($('#socialads').length) {

            Highcharts.chart('socialads', {
                chart: {
                    type: 'column'
                },
                title: false,
                xAxis: {
                    categories: ["Jan", "Feb", "Mar", "Apr", "May", "Jun", "Jul", "Aug", "Sep", "Oct", "Nov", "Dec"]
                },
                colors: ['#5F73F2', '#F5CA3F', '#E5726D', '#12C599'],
                yAxis: {
                    min: 0,
                    title: false
                },
                tooltip: {
                    pointFormat: '<span style="color:{series.color}">{series.name}</span>: <b>{point.y}</b> ({point.percentage:.0f}%)<br/>',
                    shared: true
                },
                plotOptions: {
                    column: {
                        stacking: 'column'
                    }
                },
                series: [{
                    name: 'Quantity',
                    data: [<?php echo $manufacturing_jan->semua; ?>, 
                    <?php echo $manufacturing_feb->semua; ?>, 
                    <?php echo $manufacturing_mar->semua; ?>, 
                    <?php echo $manufacturing_apr->semua; ?>, 
                    <?php echo $manufacturing_mei->semua; ?>, 
                    <?php echo $manufacturing_jun->semua; ?>, 
                    <?php echo $manufacturing_jul->semua; ?>, 
                    <?php echo $manufacturing_agu->semua; ?>, 
                    <?php echo $manufacturing_sep->semua; ?>, 
                    <?php echo $manufacturing_okt->semua; ?>, 
                    <?php echo $manufacturing_nov->semua; ?>, 
                    <?php echo $manufacturing_des->semua; ?>]
                }
                ]
            });
        }
        /*--------------  bar chart 14 highchart END ------------*/
        /*-------------- 7 Pie chart chartjs start ------------*/
        if ($('#seolinechart8').length) {
            var ctx = document.getElementById("seolinechart8").getContext('2d');
            var chart = new Chart(ctx, {
        // The type of chart we want to create
        type: 'doughnut',
        // The data for our dataset
        data: {
            labels: ["CONFIRMED", "IN PRODUCE", "DONE"],
            datasets: [{
                backgroundColor: [
                "#E36D68",
                "#F8CB3F",
                "#12C498",
                "#8919FE"
                ],
                borderColor: '#fff',
                data: [<?php echo $manuf_confirmed->semua; ?>, 
                    <?php echo $manuf_produce->semua; ?>, 
                    <?php echo $manuf_done->semua; ?>],
            }]
        },
        // Configuration options go here
        options: {
            legend: {
                display: true
            },
            animation: {
                easing: "easeInOutBack"
            }
        }
    });
        }
        /*-------------- 7 Pie chart chartjs end ------------*/
    </script>
</body>

</html>
