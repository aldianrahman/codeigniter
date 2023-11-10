  <!-- Left side column. contains the logo and sidebar -->
  <aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
      <!-- Sidebar user panel -->
      <div class="user-panel">
        <div class="pull-left image">
          <img src="<?php echo base_url()?>assets/dist/img/user2-160x160.jpg" class="img-circle" alt="User Image">
        </div>
        <div class="pull-left info">
          <p>Alexander Pierce</p>
          <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
        </div>
      </div>
      <!-- search form -->
      <form action="#" method="get" class="sidebar-form">
        <div class="input-group">
          <input type="text" name="q" class="form-control" placeholder="Search..." readonly>
          <span class="input-group-btn">
                <button disabled type="submit" name="search" id="search-btn" class="btn btn-flat"><i class="fa fa-search"></i>
                </button>
              </span>
        </div>
      </form>
      <!-- /.search form -->
      <!-- sidebar menu: : style can be found in sidebar.less -->

      <ul class="sidebar-menu" data-widget="tree">
        <li class="header">MAIN NAVIGATION</li>
        <li>

        <?php foreach($sidebar as $s): ?>

          <li>
            <?php if ($s->parrent == 1): ?>
              <li class="treeview">
                <a href="<?php echo $s->path ?>">
                  <i class="<?php echo $s->icon ?>"></i>
                  <span><?php echo $s->desc_sidebar ?></span>
                  <span class="pull-right-container">
                    <span class="label label-primary pull-right"><?php echo $notif_sidebar ?></span>
                  </span>
                </a>
                <?php if ($s->id_sidebar == 3) : // Check if it's the "Database" item ?>
                  <ul class="treeview-menu">
                    <?php foreach ($sidebar as $child) : ?>
                      <?php if ($child->parrent_id == 3) : // Check if it's a child of "Database" ?>
                        <li>
                          <a href="<?php echo base_url() . $child->path; ?>">
                            <i class="<?php echo $child->icon; ?>"></i> <?php echo $child->desc_sidebar; ?>
                          </a>
                        </li>
                      <?php endif; ?>
                    <?php endforeach; ?>
                  </ul>
                <?php endif; ?>
              </li>
            <?php elseif($s->parrent_id==0): ?>
              <a href="<?php echo base_url() . $s->path; ?>">
                <i class="<?php echo $s->icon ?>"></i> <span><?php echo $s->desc_sidebar ?></span>
                <span class="pull-right-container">
                <!-- <small class="label pull-right bg-green">new</small> -->
                </span>
              </a>
            <?php endif; ?>

          
          </li>
        <?php endforeach; ?>


        

      </ul>

      
    </section>
    <!-- /.sidebar -->
  </aside>