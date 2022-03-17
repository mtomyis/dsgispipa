    <!-- Fixed navbar -->
    <div class="navbar navbar-inverse navbar-fixed-top" role="navigation">
      <div class="container-fluid">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="navbar-brand" href="#">GIS HIPPAM</a>
        </div>
        <div class="collapse navbar-collapse">
          <ul class="nav navbar-nav">
            <?php
					$addr_root = $addr_root.'admin/';
                    $menu = "menu";
                    $sql_1 = "SELECT * FROM $menu WHERE level=1 AND aktif=1 ORDER BY upline,urut,id";
                    $data_1 = $db->fetchdata($sql_1);
                    foreach($data_1 as $dat_1){
                        $ses_name = "menu_".$dat_1["id"];
        	
                        if((isset($_SESSION[$ses_name])&&($_SESSION[$ses_name] == '1'))||($_SESSION['login_grp_id']=='SA')){
                            if($dat_1['icon'])
                                $icon = "<i class='".$dat_1['icon']." icon-white'></i>";
                            else
                                $icon = '';
                            echo "	<li class='dropdown ".active_menu($dat_1["id"])."'><a class='dropdown-toggle' data-toggle='dropdown' data-hover='dropdown' href='#'>".$icon.'&nbsp;&nbsp;'.$dat_1["nama"]. " </a>
                                <ul class='dropdown-menu'>";
                                $sql_2 = "SELECT * FROM $menu WHERE level=2 AND upline='".$dat_1["id"]."' AND aktif=1 ORDER BY upline,urut,id";
                                $data_2 = $db->fetchdata($sql_2);
                                foreach($data_2 as $dat_2){
                                    $ses_name = "menu_".$dat_2["id"];
                                    if((isset($_SESSION[$ses_name])&&($_SESSION[$ses_name] == '1'))||($_SESSION['login_grp_id']=='SA')){
                                        if($dat_2["tipe"]=='Detail'){
                                            if($dat_2['icon'])
                                                $icon = "<i class='".$dat_2['icon']."'></i>";
                                            else
                                                $icon = "";
                                            echo "<li><a href='".$addr_root.$dat_2["link"]."'> ".$icon.'&nbsp;'.$dat_2["nama"]."</a></li>";
                                        }
                                        else{
                                            echo "	<li class=dropdown-submenu><a href='#' tabindex='-1'> <i class='".$dat_2['icon']."'></i>".'&nbsp;'.$dat_2["nama"]."</a>";
                                            echo "		<ul class='dropdown-menu'>";
                                            $sql_3 = "SELECT * FROM $menu WHERE level=3 AND upline='".$dat_2["id"]."' AND aktif=1 ORDER BY upline,urut,id";
                                            $data_3 = $db->fetchdata($sql_3);
                                            foreach($data_3 as $dat_3){
                                                $ses_name = "menu_".$dat_3["id"];
                                                if((isset($_SESSION[$ses_name])&&($_SESSION[$ses_name] == '1'))||($_SESSION['login_grp_id']=='SA')){
                                                    if($dat_3["tipe"]=='Detail'){
                                                            if($dat_3['icon'])
                                                                $icon = "<i class='".$dat_3['icon']."'></i>";
                                                            else
                                                                $icon = "";
                                                            echo "<li><a href='".$addr_root.$dat_3["link"]."' tabindex='-1'> ".$icon.'&nbsp;'.$dat_3["nama"]."</a></li>";
                                                    }
                                                    else{
                                                        echo "	<li class=dropdown-submenu><a href='#' tabindex='-1'> <i class='".$dat_3['icon']."'></i>".'&nbsp;'.$dat_3["nama"]."</a>";
                                                        echo "		<ul class='dropdown-menu'>";
                                                        $sql_4 = "SELECT * FROM $menu WHERE level=4 AND upline='".$dat_3["id"]."' AND aktif=1 ORDER BY upline,urut,id";
                                                        $data_4 = $db->fetchdata($sql_4);
                                                        foreach($data_4 as $dat_4){
                                                            $ses_name = "menu_".$dat_4["id"];
                                                            if((isset($_SESSION[$ses_name])&&($_SESSION[$ses_name] == '1'))||($_SESSION['login_grp_id']=='SA')){
                                                                if($dat_4["tipe"]=='Detail'){
                                                                        if($dat_4['icon'])
                                                                            $icon = "<i class='".$dat_4['icon']."'></i>";
                                                                        else
                                                                            $icon = "";
                                                                        echo "<li><a href='".$addr_root.$dat_4["link"]."' tabindex='-1'> ".$icon.'&nbsp;'.$dat_4["nama"]."</a></li>";
                                                                }
                                                                else{
                                                                    echo "	<li class=dropdown-submenu><a href='#' '> ".'&nbsp;'.$dat_4["nama"]."</a>";
                                                                    echo "		<ul class='dropdown-menu'>";
                                                                        $sql_5 = "SELECT * FROM $menu WHERE level=5 AND upline='".$dat_4["id"]."' AND aktif=1 ORDER BY upline,urut,id";
                                                                        $data_5 = $db->fetchdata($sql_5);
                                                                        foreach($data_5 as $dat_5){
                                                                            $ses_name = "menu_".$dat_5["id"];
                                                                            if((isset($_SESSION[$ses_name])&&($_SESSION[$ses_name] == '1'))||($_SESSION['login_grp_id']=='SA')){
                                                                                if($dat_5["tipe"]=='Detail'){
                                                                                    if($dat_5['icon'])
                                                                                        $icon = "<i class='".$dat_5['icon']."'></i>";
                                                                                    else
                                                                                        $icon = "";
                                                                                    echo "<li><a href='".$addr_root.$dat_5["link"]."'> ".$icon.'&nbsp;'.$dat_5["nama"]."</a></li>";
                                                                                }
                                                                                else{
                                                                                    echo "<li><a href='#'>N/A ".$dat_5["nama"]."</a></li>";
                                                                                }
                                                                            }
                                                                        }

                                                                    echo "		</ul>";
                                                                    echo "	</li>";
                                                                    }
                                                                }
                                                            }
        												
                                                            echo "		</ul>";
                                                            echo "	</li>";
                                                        }
                                                    }
                                                }

                                                echo "		</ul>";
                                                echo "	</li>";
                                            }
                                        }
                                }
        						
                            echo "		</ul>
        				</li>";
                        }
                }

            ?>
          </ul>
          <p class="navbar-text navbar-right visible-md-block visible-lg-block">Selamat datang <?=$_SESSION['user_nama'];?></p>
        </div><!--/.nav-collapse -->
      </div>
    </div>
    <?php $addr_root=dirname($addr_root).'/';?>