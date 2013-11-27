 <!-- Sidebar -->
      <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
        <!-- Brand and toggle get grouped for better mobile display -->
        <div class="navbar-header">
          <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="navbar-brand" href="<?php echo base_url()."stanje"; ?>">Upravljanje i kontrola kučnog budgeta</a>
        </div>
      
       <?php 
           $active_site = $this->router->fetch_class();
           $active_site_method = $this->router->fetch_method();
        ?>
      
        <!-- LEFT MENU -->
        <div class="collapse navbar-collapse navbar-ex1-collapse">
          <ul class="nav navbar-nav side-nav">
            <li <?php if( $active_site == 'stanje') echo "class='active'" ?>><a href="<?php echo base_url()."stanje"; ?>"><i class="fa fa-dashboard"></i>Stanje</a></li>
            <li <?php if( $active_site == 'racun') echo "class='active'" ?>><a href="<?php echo base_url()."racun"; ?>"><i class="fa fa-bar-chart-o"></i>Računi</a></li>
            <li <?php if( $active_site == 'prihod') echo "class='active'" ?>><a href="<?php echo base_url()."prihod"; ?>"><i class="fa fa-edit"></i>Prihodi</a></li>
            <li <?php if( $active_site == 'rashod') echo "class='active'" ?>><a href="<?php echo base_url()."rashod"; ?>"><i class="fa fa-edit"></i>Rashodi</a></li>
            <li <?php if( $active_site_method == 'etikete_prihodi') echo "class='active'" ?>><a href="<?php echo base_url()."statistika/etikete_prihodi"; ?>"><i class="fa fa-table"></i>Etikete prihodi</a></li>
            <li <?php if( $active_site_method == 'etikete_rashodi') echo "class='active'" ?>><a href="<?php echo base_url()."statistika/etikete_rashodi"; ?>"><i class="fa fa-table"></i>Etikete rashodi</a></li>
            <li <?php if( $active_site_method == 'postavke') echo "class='active'" ?>><a href="<?php echo base_url()."user/postavke"; ?>"><i class="fa fa-gear"></i> Postavke</a></li>
            <li <?php if( $active_site_method == 'logout') echo "class='active'" ?>><a href="<?php echo base_url()."user/logout"; ?>"><i class="fa fa-power-off"></i>Odjava</a></li>
          </ul>

        <!-- USER-->
          <ul class="nav navbar-nav navbar-right navbar-user">
            <li class="dropdown user-dropdown">
              <a href="<?php echo base_url()."user/postavke"; ?>" ><i class="fa fa-user"></i><?php echo $user['ime'] . " " . $user['prezime']; ?> </a>
             
            </li>
          </ul>
        </div><!-- /.navbar-collapse -->
      </nav>