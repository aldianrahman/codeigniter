<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>AdminLTE 2 | Dashboard</title>
  <style>
        #tableID {
            width: 100%; /* Atur lebar tabel sesuai kebutuhan */
        }
    </style>
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <!-- Bootstrap 3.3.7 -->
  <link rel="stylesheet" href="<?php echo base_url()?>assets/bower_components/bootstrap/dist/css/bootstrap.min.css">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="<?php echo base_url()?>assets/bower_components/font-awesome/css/font-awesome.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="<?php echo base_url()?>assets/bower_components/Ionicons/css/ionicons.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="<?php echo base_url()?>assets/dist/css/AdminLTE.min.css">
  <!-- AdminLTE Skins. Choose a skin from the css/skins
       folder instead of downloading all of them to reduce the load. -->
  <link rel="stylesheet" href="<?php echo base_url()?>assets/dist/css/skins/_all-skins.min.css">
  <!-- Morris chart -->
  <link rel="stylesheet" href="<?php echo base_url()?>assets/bower_components/morris.js/morris.css">
  <!-- jvectormap -->
  <link rel="stylesheet" href="<?php echo base_url()?>assets/bower_components/jvectormap/jquery-jvectormap.css">
  <!-- Date Picker -->
  <link rel="stylesheet" href="<?php echo base_url()?>assets/bower_components/bootstrap-datepicker/dist/css/bootstrap-datepicker.min.css">
  <!-- Daterange picker -->
  <link rel="stylesheet" href="<?php echo base_url()?>assets/bower_components/bootstrap-daterangepicker/daterangepicker.css">
  <!-- bootstrap wysihtml5 - text editor -->
  <link rel="stylesheet" href="<?php echo base_url()?>assets/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.min.css">

  <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
  <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
  <!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
  <![endif]-->

  <!-- Google Font -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">

   <!-- jQuery -->
   <script type="text/javascript" 
          src="https://code.jquery.com/jquery-3.5.1.js"> 
  </script> 
  
  <!-- DataTables CSS -->
  <link rel="stylesheet"
        href= 
"https://cdn.datatables.net/1.10.23/css/jquery.dataTables.min.css"> 
  
  <!-- DataTables JS -->
  <script src= 
"https://cdn.datatables.net/1.10.23/js/jquery.dataTables.min.js"> 
  </script>
  

</head>
<body class="hold-transition skin-blue sidebar-mini">
<div class="wrapper">

  <header class="main-header">
    <!-- Logo -->
    <a href="<?php echo base_url().'admin/index' ?>" class="logo">
      <!-- mini logo for sidebar mini 50x50 pixels -->
      <span class="logo-mini"><b>B</b>IG</span>
      <!-- logo for regular state and mobile devices -->
      <span class="logo-lg"><b>ERP </b>BIG</span>
    </a>
    <!-- Header Navbar: style can be found in header.less -->
    <nav class="navbar navbar-static-top">
      <!-- Sidebar toggle button-->
      <a href="#" class="sidebar-toggle" data-toggle="push-menu" role="button">
        <span class="sr-only">Toggle navigation</span>
      </a>

      <div class="navbar-custom-menu">
        <ul class="nav navbar-nav">
          <!-- Messages: style can be found in dropdown.less-->
          <li class="dropdown messages-menu">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
              <i class="fa fa-envelope-o"></i>
              <span class="label label-success">4</span>
            </a>
            <ul class="dropdown-menu">
              <li class="header">You have 4 messages</li>
              <li>
                <!-- inner menu: contains the actual data -->
                <ul class="menu">
                  <li><!-- start message -->
                    <a href="#">
                      <div class="pull-left">
                        <img src="<?php echo base_url()?>assets/dist/img/user2-160x160.jpg" class="img-circle" alt="User Image">
                      </div>
                      <h4>
                        Support Team
                        <small><i class="fa fa-clock-o"></i> 5 mins</small>
                      </h4>
                      <p>Why not buy a new awesome theme?</p>
                    </a>
                  </li>
                  <!-- end message -->
                  <li>
                    <a href="#">
                      <div class="pull-left">
                        <img src="<?php echo base_url()?>assets/dist/img/user3-128x128.jpg" class="img-circle" alt="User Image">
                      </div>
                      <h4>
                        AdminLTE Design Team
                        <small><i class="fa fa-clock-o"></i> 2 hours</small>
                      </h4>
                      <p>Why not buy a new awesome theme?</p>
                    </a>
                  </li>
                  <li>
                    <a href="#">
                      <div class="pull-left">
                        <img src="<?php echo base_url()?>assets/dist/img/user4-128x128.jpg" class="img-circle" alt="User Image">
                      </div>
                      <h4>
                        Developers
                        <small><i class="fa fa-clock-o"></i> Today</small>
                      </h4>
                      <p>Why not buy a new awesome theme?</p>
                    </a>
                  </li>
                  <li>
                    <a href="#">
                      <div class="pull-left">
                        <img src="<?php echo base_url()?>assets/dist/img/user3-128x128.jpg" class="img-circle" alt="User Image">
                      </div>
                      <h4>
                        Sales Department
                        <small><i class="fa fa-clock-o"></i> Yesterday</small>
                      </h4>
                      <p>Why not buy a new awesome theme?</p>
                    </a>
                  </li>
                  <li>
                    <a href="#">
                      <div class="pull-left">
                        <img src="<?php echo base_url()?>assets/dist/img/user4-128x128.jpg" class="img-circle" alt="User Image">
                      </div>
                      <h4>
                        Reviewers
                        <small><i class="fa fa-clock-o"></i> 2 days</small>
                      </h4>
                      <p>Why not buy a new awesome theme?</p>
                    </a>
                  </li>
                </ul>
              </li>
              <li class="footer"><a href="#">See All Messages</a></li>
            </ul>
          </li>

          
          
          <!-- Notifications: style can be found in dropdown.less -->
          <li class="dropdown notifications-menu">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
              <i class="fa fa-bell-o"></i>
              <span class="label label-warning">10</span>
            </a>
            <ul class="dropdown-menu">
              <li class="header">You have 10 notifications</li>
              <li>
                <!-- inner menu: contains the actual data -->
                <ul class="menu">
                  <li>
                    <a href="#">
                      <i class="fa fa-users text-aqua"></i> 5 new members joined today
                    </a>
                  </li>
                  <li>
                    <a href="#">
                      <i class="fa fa-warning text-yellow"></i> Very long description here that may not fit into the
                      page and may cause design problems
                    </a>
                  </li>
                  <li>
                    <a href="#">
                      <i class="fa fa-users text-red"></i> 5 new members joined
                    </a>
                  </li>
                  <li>
                    <a href="#">
                      <i class="fa fa-shopping-cart text-green"></i> 25 sales made
                    </a>
                  </li>
                  <li>
                    <a href="#">
                      <i class="fa fa-user text-red"></i> You changed your username
                    </a>
                  </li>
                </ul>
              </li>
              <li class="footer"><a href="#">View all</a></li>
            </ul>
          </li>
          <!-- Tasks: style can be found in dropdown.less -->
          <li class="dropdown tasks-menu">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
              <i class="fa fa-flag-o"></i>
              <span class="label label-danger">9</span>
            </a>
            <ul class="dropdown-menu">
              <li class="header">You have 9 tasks</li>
              <li>
                <!-- inner menu: contains the actual data -->
                <ul class="menu">
                  <li><!-- Task item -->
                    <a href="#">
                      <h3>
                        Design some buttons
                        <small class="pull-right">20%</small>
                      </h3>
                      <div class="progress xs">
                        <div class="progress-bar progress-bar-aqua" style="width: 20%" role="progressbar"
                             aria-valuenow="20" aria-valuemin="0" aria-valuemax="100">
                          <span class="sr-only">20% Complete</span>
                        </div>
                      </div>
                    </a>
                  </li>
                  <!-- end task item -->
                  <li><!-- Task item -->
                    <a href="#">
                      <h3>
                        Create a nice theme
                        <small class="pull-right">40%</small>
                      </h3>
                      <div class="progress xs">
                        <div class="progress-bar progress-bar-green" style="width: 40%" role="progressbar"
                             aria-valuenow="20" aria-valuemin="0" aria-valuemax="100">
                          <span class="sr-only">40% Complete</span>
                        </div>
                      </div>
                    </a>
                  </li>
                  <!-- end task item -->
                  <li><!-- Task item -->
                    <a href="#">
                      <h3>
                        Some task I need to do
                        <small class="pull-right">60%</small>
                      </h3>
                      <div class="progress xs">
                        <div class="progress-bar progress-bar-red" style="width: 60%" role="progressbar"
                             aria-valuenow="20" aria-valuemin="0" aria-valuemax="100">
                          <span class="sr-only">60% Complete</span>
                        </div>
                      </div>
                    </a>
                  </li>
                  <!-- end task item -->
                  <li><!-- Task item -->
                    <a href="#">
                      <h3>
                        Make beautiful transitions
                        <small class="pull-right">80%</small>
                      </h3>
                      <div class="progress xs">
                        <div class="progress-bar progress-bar-yellow" style="width: 80%" role="progressbar"
                             aria-valuenow="20" aria-valuemin="0" aria-valuemax="100">
                          <span class="sr-only">80% Complete</span>
                        </div>
                      </div>
                    </a>
                  </li>
                  <!-- end task item -->
                </ul>
              </li>
              <li class="footer">
                <a href="#">View all tasks</a>
              </li>
            </ul>
          </li>
          <li class="dropdown messages-menu">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
              <i class="fa fa-user"></i>
              <span class="label label-info"><?php echo $count_user_online ?></span>
            </a>
            <ul class="dropdown-menu">
              <li class="header">Karyawan Online : <?php echo $count_user_online ?></li>
              <li>
                <!-- inner menu: contains the actual data -->
                <ul class="menu">
                  <?php foreach($karyawan_online as $c): ?>
                  <li><!-- start message -->
                    <a href="<?php echo base_url() ?>karyawan/profile/<?php echo $c->id_karyawan ?>">
                      <div class="pull-left">
                        <img src="<?php echo base_url()?>assets/foto_karyawan/<?php echo $c->foto_karyawan ?>" class="img-circle" alt="User Image">
                      </div>
                      <h4>
                      <i class="fa fa-circle text-success"></i> <?php echo $c->nama_karyawan ?>
                        <small><i class="fa fa-clock-o"></i> 
                      <?php
                     
                    //  date_default_timezone_set("America/New_York");
                    //   echo "The time is " . date("Y-m-d H:i:s");

                      date_default_timezone_set("Asia/Jakarta");


                        
                      $awal   = strtotime($c->last_login); //lebih rendah
                      $akhir  = strtotime(date("Y-m-d H:i:s")); //lebih tinggi
                      $diff  = $akhir - $awal;

                      

                      // echo intval($menit/60)." Menit";
                      $minutes = intval($diff/60);

                      if ($minutes > 60) {
                        // Check if it's more than 24 hours
                        if ($minutes > 1440) { // 24 hours * 60 minutes
                            // More than 24 hours
                            $timeDifference = floor($minutes / 1440) . ' days';
                          echo $timeDifference;

                        } else {
                            // More than 60 minutes but less than 24 hours
                            $timeDifference = floor($minutes / 60) . ' hours';
                          echo $timeDifference;

                        }
                    } else {
                        // Less than or equal to 60 minutes
                        if($minutes == 0){
                          echo "now";
                        }else{
                          $timeDifference = $minutes . ' minutes';
                          echo $timeDifference;
                        }
                    }

                      ?>
                      </small>
                      </h4>
                      <p><?php echo $c->desc_jabatan ?></p>
                    </a>
                  </li>
                  <?php endforeach;?>
                </ul>
              </li>
            </ul>
          </li>
          <li class="dropdown messages-menu">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
              <i class="fa fa-plus"></i>
              <span class="label label-default"><?php echo $count_acc_friend ?></span>
            </a>
            <ul class="dropdown-menu">
              <li class="header">Menunggu Pertemanan : <?php echo $count_acc_friend ?></li>
              <li>
                <!-- inner menu: contains the actual data -->
                <ul class="menu">
                  <?php foreach($acc_friend as $acc): ?>
                    <?php if ($id_karyawan == $acc->id_karyawan_1): ?>
                      <li><!-- start message -->
                        <a href="<?php echo base_url() ?>karyawan/profile/<?php echo $acc->id_karyawan_2?>">
                          <div class="pull-left">
                            <img src="<?php echo base_url()?>assets/foto_karyawan/<?php echo $acc->foto_karyawan_2 ?>" class="img-circle" alt="User Image">
                          </div>
                          <h4>
                          <?php echo $acc->nama_karyawan_2 ?>
                          </h4>
                        </a>
                      </li>
                    <?php else: ?>
                      <li><!-- start message -->
                        <a href="<?php echo base_url() ?>karyawan/profile/<?php echo $acc->id_karyawan_1 ?>">
                          <div class="pull-left">
                            <img src="<?php echo base_url()?>assets/foto_karyawan/<?php echo $acc->foto_karyawan_1 ?>" class="img-circle" alt="User Image">
                          </div>
                          <h4>
                          <?php echo $acc->nama_karyawan_1 ?>
                          </h4>
                        </a>
                      </li>
                    <?php endif; ?>
                  <?php endforeach;?>
                </ul>
              </li>
            </ul>
          </li>
          <!-- User Account: style can be found in dropdown.less -->
          <li class="dropdown user user-menu">
            <?php if($this->session->userdata('id_karyawan'))?>
            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
              <img src="<?php echo base_url()?>assets/foto_karyawan/<?php echo $ui_karyawan->foto_karyawan ?>" class="user-image" alt="User Image">
              <span class="hidden-xs"><?php echo $ui_karyawan->nama_karyawan ?></span>
            </a>
            <ul class="dropdown-menu">
              <!-- User image -->
              <li class="user-header">
                <img src="<?php echo base_url()?>assets/foto_karyawan/<?php echo $ui_karyawan->foto_karyawan ?>" class="img-circle" alt="User Image">

                <p>
                  <?php echo $ui_karyawan-> nama_karyawan." <br> ".$ui_karyawan->desc_jabatan ?>
                  <small><?php 
                  
                  $tanggal_waktu = $ui_karyawan->created_at;

                  // Ubah format menggunakan fungsi date
                  $format_baru = date("l, j F Y H:i:s", strtotime($tanggal_waktu));

                  // Tampilkan hasil
                  echo $format_baru;
                  
                  
                  ?></small>
                </p>
              </li>
              <!-- Menu Body -->
              <li class="user-body">
                <div class="row">
                  <div class="col-xs-4 text-center">
                    <a href="#">Followers</a>
                  </div>
                  <div class="col-xs-4 text-center">
                    <a href="#">Sales</a>
                  </div>
                  <div class="col-xs-4 text-center">
                    <a href="#">Friends</a>
                  </div>
                </div>
                <!-- /.row -->
              </li>
              <!-- Menu Footer-->
              <li class="user-footer">
                <div class="pull-left">
                  <a href="<?php echo base_url() ?>karyawan/profile/<?php echo $ui_karyawan->id_karyawan ?>" class="btn btn-default btn-flat">Profile</a>
                </div>
                <div class="pull-right">
                  <a href="<?php echo base_url().'auth/logout'?>" class="btn btn-default btn-flat">Sign out</a>
                </div>
              </li>
            </ul>
          </li>
          <!-- Control Sidebar Toggle Button -->
          <li>
            <a href="#" data-toggle="control-sidebar"><i class="fa fa-gears"></i></a>
          </li>
        </ul>
      </div>
    </nav>
  </header>