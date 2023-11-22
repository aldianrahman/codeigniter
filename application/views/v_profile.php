

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        User Profile
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="#">Examples</a></li>
        <li class="active">User profile</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">

    <?php echo $this->session->flashdata('message_profile_not_found'); ?>


      <div class="row">
        <div class="col-md-3">

          <!-- Profile Image -->
          <div class="box box-primary">
            
          <?php echo form_open('karyawan/search_profile') ?>

          <input type="text" name="keyword" class="form-control" placeholder="Search.." required>
          <button type="submit" class="btn btn-success">Cari</button>

          <?php echo form_close() ?>
            
            <div class="box-body box-profile">
              <img class="profile-user-img img-responsive img-circle" src="<?php echo base_url()?>assets/foto_karyawan/<?php echo $get_ui_profile->foto_karyawan ?>" alt="User profile picture">

              <h3 class="profile-username text-center"><?php echo $get_ui_profile->nama_karyawan ?></h3>

              <p class="text-muted text-center"><?php echo $get_ui_profile->desc_jabatan ?></p>

              <ul class="list-group list-group-unbordered">
                <li class="list-group-item">
                  <b>Teman</b> <a class="pull-right">0</a>
                </li>
              </ul>

              <?php if ($hide_setting): ?>
                <a href="#" class="btn btn-default btn-block" disabled><b>Profile Anda</b></a>
              <?php else: ?>
                <a href="<?php echo base_url() ?>karyawan/tambah_teman/<?php echo $get_ui_profile->id_karyawan ?>" class="btn btn-primary btn-block"><b>Follow</b></a>
              <?php endif; ?>

            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->

          <?php if ($about_me === null): ?>

            <!-- About Me Box -->
          <div class="box box-primary">
            <div class="box-header with-border">
              <h3 class="box-title">About Me</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <strong><i class="fa fa-book margin-r-5"></i> Pendidikan</strong>

              <p class="text-muted">
                <?php echo "-" ?>
              </p>

              <hr>

              <strong><i class="fa fa-map-marker margin-r-5"></i> Lokasi</strong>

              <p class="text-muted">
                <?php echo "-" ?>
              </p>

              <hr>

              <strong><i class="fa fa-pencil margin-r-5"></i> Kemampuan</strong>

              <p>
                <span class="label label-danger">
                <?php echo "-" ?>
              </span>
                <!-- <span class="label label-danger">UI Design</span>
                <span class="label label-success">Coding</span>
                <span class="label label-info">Javascript</span>
                <span class="label label-warning">PHP</span>
                <span class="label label-primary">Node.js</span> -->
              </p>

              <hr>

              <strong><i class="fa fa-file-text-o margin-r-5"></i> Catatan</strong>

              <p>
              <?php echo "-" ?>
              </p>
            </div>
            <!-- /.box-body -->
          </div>
          <?php else: ?>

            <!-- About Me Box -->
          <div class="box box-primary">
            <div class="box-header with-border">
              <h3 class="box-title">About Me</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <strong><i class="fa fa-book margin-r-5"></i> Pendidikan</strong>

              <p class="text-muted">
                <?php echo $about_me->pendidikan_karyawan ?>
              </p>

              <hr>

              <strong><i class="fa fa-map-marker margin-r-5"></i> Lokasi</strong>

              <p class="text-muted">
                <?php echo $about_me->lokasi_karyawan ?>
              </p>

              <hr>

              <strong><i class="fa fa-pencil margin-r-5"></i> Kemampuan</strong>

              <p>
                <span class="label label-danger">
                <?php echo $about_me->skill_karyawan ?>
              </span>
                <!-- <span class="label label-danger">UI Design</span>
                <span class="label label-success">Coding</span>
                <span class="label label-info">Javascript</span>
                <span class="label label-warning">PHP</span>
                <span class="label label-primary">Node.js</span> -->
              </p>

              <hr>

              <strong><i class="fa fa-file-text-o margin-r-5"></i> Catatan</strong>

              <p>
              <?php echo $about_me->note_karyawan ?>
              </p>
            </div>
            <!-- /.box-body -->
          </div>

          <?php endif; ?>
          <!-- /.box -->
        </div>
        <!-- /.col -->
        <div class="col-md-9">
          <div class="nav-tabs-custom">
            <ul class="nav nav-tabs">
              <?php if ($hide_setting): ?>
                <li class="active"><a href="#activity" data-toggle="tab">Activity</a></li>
                <li><a href="#timeline" data-toggle="tab">Timeline</a></li>
                <li><a href="#settings" data-toggle="tab">Settings</a></li>
              <?php else: ?>
                <li class="active"><a href="#activity" data-toggle="tab">Activity</a></li>
                <li><a href="#timeline" data-toggle="tab">Timeline</a></li>
              <?php endif; ?>

            </ul>
            <div class="tab-content">
              <div class="active tab-pane" id="activity">

              <div class="box-footer">
                <div class="input-group">
                  <input class="form-control" placeholder="Menulis pada profile <?php echo $get_ui_profile->nama_karyawan ?>...">

                  <div class="input-group-btn">
                    <button type="button" class="btn btn-success"><i class="fa fa-plus"></i></button>
                  </div>
                </div>
              </div>
                
                <!-- Post -->
                <div class="post">
                  <div class="user-block">
                    <img class="img-circle img-bordered-sm" src="<?php echo base_url()?>assets/foto_karyawan/<?php echo $get_ui_profile->foto_karyawan ?>" alt="user image">
                        <span class="username">
                          <a href="#">Jonathan Burke Jr.</a>
                          <a href="#" class="pull-right btn-box-tool"><i class="fa fa-times"></i></a>
                        </span>
                    <span class="description">Shared publicly - 7:30 PM today</span>
                  </div>
                  <!-- /.user-block -->
                  <p>
                    Lorem ipsum represents a long-held tradition for designers,
                    typographers and the like. Some people hate it and argue for
                    its demise, but others ignore the hate as they create awesome
                    tools to help create filler text for everyone from bacon lovers
                    to Charlie Sheen fans.
                  </p>
                  <ul class="list-inline">
                    <li><a href="#" class="link-black text-sm"><i class="fa fa-share margin-r-5"></i> Share</a></li>
                    <li><a href="#" class="link-black text-sm"><i class="fa fa-thumbs-o-up margin-r-5"></i> Like</a>
                    </li>
                    <li class="pull-right">
                      <a href="#" class="link-black text-sm"><i class="fa fa-comments-o margin-r-5"></i> Comments
                        (5)</a></li>
                  </ul>

                  <input class="form-control input-sm" type="text" placeholder="Type a comment">
                </div>
                <!-- /.post -->


              </div>
              <!-- /.tab-pane -->
              <div class="tab-pane" id="timeline">
                <!-- The timeline -->
                <ul class="timeline timeline-inverse">
                  <!-- timeline time label -->
                  <li class="time-label">
                        <span class="bg-red">
                          10 Feb. 2014
                        </span>
                  </li>
                  <!-- /.timeline-label -->
                  <!-- timeline item -->
                  <li>
                    <i class="fa fa-envelope bg-blue"></i>

                    <div class="timeline-item">
                      <span class="time"><i class="fa fa-clock-o"></i> 12:05</span>

                      <h3 class="timeline-header"><a href="#">Support Team</a> sent you an email</h3>

                      <div class="timeline-body">
                        Etsy doostang zoodles disqus groupon greplin oooj voxy zoodles,
                        weebly ning heekya handango imeem plugg dopplr jibjab, movity
                        jajah plickers sifteo edmodo ifttt zimbra. Babblely odeo kaboodle
                        quora plaxo ideeli hulu weebly balihoo...
                      </div>
                      <div class="timeline-footer">
                        <a class="btn btn-primary btn-xs">Read more</a>
                        <a class="btn btn-danger btn-xs">Delete</a>
                      </div>
                    </div>
                  </li>
                  <!-- END timeline item -->
                  <!-- timeline item -->
                  <li>
                    <i class="fa fa-user bg-aqua"></i>

                    <div class="timeline-item">
                      <span class="time"><i class="fa fa-clock-o"></i> 5 mins ago</span>

                      <h3 class="timeline-header no-border"><a href="#">Sarah Young</a> accepted your friend request
                      </h3>
                    </div>
                  </li>
                  <!-- END timeline item -->
                  <!-- timeline item -->
                  <li>
                    <i class="fa fa-comments bg-yellow"></i>

                    <div class="timeline-item">
                      <span class="time"><i class="fa fa-clock-o"></i> 27 mins ago</span>

                      <h3 class="timeline-header"><a href="#">Jay White</a> commented on your post</h3>

                      <div class="timeline-body">
                        Take me to your leader!
                        Switzerland is small and neutral!
                        We are more like Germany, ambitious and misunderstood!
                      </div>
                      <div class="timeline-footer">
                        <a class="btn btn-warning btn-flat btn-xs">View comment</a>
                      </div>
                    </div>
                  </li>
                  <!-- END timeline item -->
                  <!-- timeline time label -->
                  <li class="time-label">
                        <span class="bg-green">
                          3 Jan. 2014
                        </span>
                  </li>
                  <!-- /.timeline-label -->
                  <!-- timeline item -->
                  <li>
                    <i class="fa fa-camera bg-purple"></i>

                    <div class="timeline-item">
                      <span class="time"><i class="fa fa-clock-o"></i> 2 days ago</span>

                      <h3 class="timeline-header"><a href="#">Mina Lee</a> uploaded new photos</h3>

                      <div class="timeline-body">
                        <img src="http://placehold.it/150x100" alt="..." class="margin">
                        <img src="http://placehold.it/150x100" alt="..." class="margin">
                        <img src="http://placehold.it/150x100" alt="..." class="margin">
                        <img src="http://placehold.it/150x100" alt="..." class="margin">
                      </div>
                    </div>
                  </li>
                  <!-- END timeline item -->
                  <li>
                    <i class="fa fa-clock-o bg-gray"></i>
                  </li>
                </ul>
              </div>
              <!-- /.tab-pane -->

              <?php if ($about_me === null): ?>

                <div class="tab-pane" id="settings">
                <form class="form-horizontal" action="<?php echo base_url().'karyawan/insert_about_me'; ?>" method="post">
                  <div class="form-group">


                    <div class="col-sm-10">
                      <input value="" type="text" name="pendidikan_karyawan" class="form-control" placeholder="Pendidikan" required>
                    </div>
                  </div>
                  <div class="form-group">
                    <div class="col-sm-10">
                      <input value="" type="text" name="lokasi_karyawan" class="form-control" placeholder="Lokasi" required>
                    </div>
                  </div>
                  <div class="form-group">
                    <div class="col-sm-10">
                      <input value="" type="text" name="skill_karyawan" class="form-control" placeholder="Skill" required>
                    </div>
                  </div>
                  <div class="form-group">
                    <div class="col-sm-10">
                      <input value="" class="form-control" name="note_karyawan" placeholder="Catatan Anda"></input>
                    </div>
                  </div>
                  
                  <button type="submit" class="btn btn-danger">Submit</button>
                  
                </form>
              </div>

              <?php else: ?>

                <div class="tab-pane" id="settings">
                <form class="form-horizontal" action="<?php echo base_url().'karyawan/update_about_me'; ?>" method="post">
                  <div class="form-group">


                    <div class="col-sm-10">
                      <input value="<?php echo $about_me->pendidikan_karyawan ?>" type="text" name="pendidikan_karyawan" class="form-control" placeholder="Pendidikan" required>
                    </div>
                  </div>
                  <div class="form-group">
                    <div class="col-sm-10">
                      <input value="<?php echo $about_me->lokasi_karyawan ?>" type="text" name="lokasi_karyawan" class="form-control" placeholder="Lokasi" required>
                    </div>
                  </div>
                  <div class="form-group">
                    <div class="col-sm-10">
                      <input value="<?php echo $about_me->skill_karyawan ?>" type="text" name="skill_karyawan" class="form-control" placeholder="Skill" required>
                    </div>
                  </div>
                  <div class="form-group">
                    <div class="col-sm-10">
                      <input value="<?php echo $about_me->note_karyawan ?>" class="form-control" name="note_karyawan" placeholder="Catatan Anda"></input>
                    </div>
                  </div>
                  
                  <button type="submit" class="btn btn-danger">Submit</button>
                  
                </form>
              </div>

              <?php endif; ?>
              <!-- /.tab-pane -->
            </div>
            <!-- /.tab-content -->
          </div>
          <!-- /.nav-tabs-custom -->
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->

    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Create the tabs -->
    <ul class="nav nav-tabs nav-justified control-sidebar-tabs">
      <li><a href="#control-sidebar-home-tab" data-toggle="tab"><i class="fa fa-home"></i></a></li>
      <li><a href="#control-sidebar-settings-tab" data-toggle="tab"><i class="fa fa-gears"></i></a></li>
    </ul>
    <!-- Tab panes -->
    <div class="tab-content">
      <!-- Home tab content -->
      <div class="tab-pane" id="control-sidebar-home-tab">
        <h3 class="control-sidebar-heading">Recent Activity</h3>
        <ul class="control-sidebar-menu">
          <li>
            <a href="javascript:void(0)">
              <i class="menu-icon fa fa-birthday-cake bg-red"></i>

              <div class="menu-info">
                <h4 class="control-sidebar-subheading">Langdon's Birthday</h4>

                <p>Will be 23 on April 24th</p>
              </div>
            </a>
          </li>
          <li>
            <a href="javascript:void(0)">
              <i class="menu-icon fa fa-user bg-yellow"></i>

              <div class="menu-info">
                <h4 class="control-sidebar-subheading">Frodo Updated His Profile</h4>

                <p>New phone +1(800)555-1234</p>
              </div>
            </a>
          </li>
          <li>
            <a href="javascript:void(0)">
              <i class="menu-icon fa fa-envelope-o bg-light-blue"></i>

              <div class="menu-info">
                <h4 class="control-sidebar-subheading">Nora Joined Mailing List</h4>

                <p>nora@example.com</p>
              </div>
            </a>
          </li>
          <li>
            <a href="javascript:void(0)">
              <i class="menu-icon fa fa-file-code-o bg-green"></i>

              <div class="menu-info">
                <h4 class="control-sidebar-subheading">Cron Job 254 Executed</h4>

                <p>Execution time 5 seconds</p>
              </div>
            </a>
          </li>
        </ul>
        <!-- /.control-sidebar-menu -->

        <h3 class="control-sidebar-heading">Tasks Progress</h3>
        <ul class="control-sidebar-menu">
          <li>
            <a href="javascript:void(0)">
              <h4 class="control-sidebar-subheading">
                Custom Template Design
                <span class="label label-danger pull-right">70%</span>
              </h4>

              <div class="progress progress-xxs">
                <div class="progress-bar progress-bar-danger" style="width: 70%"></div>
              </div>
            </a>
          </li>
          <li>
            <a href="javascript:void(0)">
              <h4 class="control-sidebar-subheading">
                Update Resume
                <span class="label label-success pull-right">95%</span>
              </h4>

              <div class="progress progress-xxs">
                <div class="progress-bar progress-bar-success" style="width: 95%"></div>
              </div>
            </a>
          </li>
          <li>
            <a href="javascript:void(0)">
              <h4 class="control-sidebar-subheading">
                Laravel Integration
                <span class="label label-warning pull-right">50%</span>
              </h4>

              <div class="progress progress-xxs">
                <div class="progress-bar progress-bar-warning" style="width: 50%"></div>
              </div>
            </a>
          </li>
          <li>
            <a href="javascript:void(0)">
              <h4 class="control-sidebar-subheading">
                Back End Framework
                <span class="label label-primary pull-right">68%</span>
              </h4>

              <div class="progress progress-xxs">
                <div class="progress-bar progress-bar-primary" style="width: 68%"></div>
              </div>
            </a>
          </li>
        </ul>
        <!-- /.control-sidebar-menu -->

      </div>
      <!-- /.tab-pane -->
      <!-- Stats tab content -->
      <div class="tab-pane" id="control-sidebar-stats-tab">Stats Tab Content</div>
      <!-- /.tab-pane -->
      <!-- Settings tab content -->
      <div class="tab-pane" id="control-sidebar-settings-tab">
        <form method="post">
          <h3 class="control-sidebar-heading">General Settings</h3>

          <div class="form-group">
            <label class="control-sidebar-subheading">
              Report panel usage
              <input type="checkbox" class="pull-right" checked>
            </label>

            <p>
              Some information about this general settings option
            </p>
          </div>
          <!-- /.form-group -->

          <div class="form-group">
            <label class="control-sidebar-subheading">
              Allow mail redirect
              <input type="checkbox" class="pull-right" checked>
            </label>

            <p>
              Other sets of options are available
            </p>
          </div>
          <!-- /.form-group -->

          <div class="form-group">
            <label class="control-sidebar-subheading">
              Expose author name in posts
              <input type="checkbox" class="pull-right" checked>
            </label>

            <p>
              Allow the user to show his name in blog posts
            </p>
          </div>
          <!-- /.form-group -->

          <h3 class="control-sidebar-heading">Chat Settings</h3>

          <div class="form-group">
            <label class="control-sidebar-subheading">
              Show me as online
              <input type="checkbox" class="pull-right" checked>
            </label>
          </div>
          <!-- /.form-group -->

          <div class="form-group">
            <label class="control-sidebar-subheading">
              Turn off notifications
              <input type="checkbox" class="pull-right">
            </label>
          </div>
          <!-- /.form-group -->

          <div class="form-group">
            <label class="control-sidebar-subheading">
              Delete chat history
              <a href="javascript:void(0)" class="text-red pull-right"><i class="fa fa-trash-o"></i></a>
            </label>
          </div>
          <!-- /.form-group -->
        </form>
      </div>
      <!-- /.tab-pane -->
    </div>
  </aside>
  <!-- /.control-sidebar -->
  <!-- Add the sidebar's background. This div must be placed
       immediately after the control sidebar -->
  <div class="control-sidebar-bg"></div>
</div>
<!-- ./wrapper -->