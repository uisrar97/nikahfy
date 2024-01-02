<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
<body class="nav-md">
<div class="container body">
    <div class="main_container">
        <div class="col-md-3 left_col">
            <div class="left_col scroll-view">
                <div class="navbar nav_title" style="border-bottom: 3px solid #666666;">
                <!--<i class="fa fa-paw" style="color: white;"></i> <span>CenterSquare</span>-->
                    <a href="<?php echo base_url()?>" class="site_title">
                        <img src="<?=base_url().'assets/images/logo.png'?>" alt="">
                    </a>
                </div>
                
                <div class="clearfix"></div>
                <br/>
                <!-- sidebar menu -->
                <div id="sidebar-menu" class="main_menu_side hidden-print main_menu">
                    <div class="menu_section">
                        <ul class="nav side-menu">
                            <li style="border-bottom: 0.1em solid #666666"><a href="<?php echo base_url().'dashboard'?>"><i class="fa fa-dashboard"></i>Dashboard</a></li>
                            <?php if($this->session->userdata('is_sup_admin') == "1" || in_array("1",$this->session->userdata('permissions')) || in_array("2",$this->session->userdata('permissions')) || in_array("3",$this->session->userdata('permissions')) || in_array("4",$this->session->userdata('permissions')) || in_array("5",$this->session->userdata('permissions')) || in_array("6",$this->session->userdata('permissions')) || in_array("7",$this->session->userdata('permissions'))){ ?>
                                <li style="border-bottom: 0.1em solid #666666"><a><i class="fa fa-th"></i>CMS <span class="fa fa-chevron-down"></span></a>
                            <?php } ?>
                                <ul class="nav child_menu">
                                    <?php if($this->session->userdata('is_sup_admin') == "1" || in_array("1",$this->session->userdata('permissions'))){ ?>
                                        <li><a href="<?php echo base_url(); ?>pages/manage_pages"><i class="fa fa-arrow-circle-o-right"></i>Pages</a></li>
                                    <?php } ?>
                                    <?php if($this->session->userdata('is_sup_admin') == "1" || in_array("2",$this->session->userdata('permissions'))){ ?>
                                        <li><a href="<?php echo base_url(); ?>Sections/manage_section"><i class="fa fa-arrow-circle-o-right"></i>Sections</a></li>
                                    <?php } ?>
                                    <?php if($this->session->userdata('is_sup_admin') == "1" || in_array("3",$this->session->userdata('permissions'))){ ?>
                                        <li><a href="<?php echo base_url(); ?>Seo"><i class="fa fa-arrow-circle-o-right"></i>SEO</a></li>
                                    <?php } ?>
                                    <?php if($this->session->userdata('is_sup_admin') == "1" || in_array("4",$this->session->userdata('permissions'))){ ?>
                                        <li><a href="<?php echo base_url(); ?>pages/settings"><i class="fa fa-arrow-circle-o-right"></i>Settings</a></li>
                                    <?php } ?>
                                    <?php if($this->session->userdata('is_sup_admin') == "1" || in_array("5",$this->session->userdata('permissions'))){ ?>
                                        <li><a href="<?php echo base_url(); ?>cms/Services"><i class="fa fa-arrow-circle-o-right"></i>Our Services</a></li>
                                    <?php } ?>
                                    <?php if($this->session->userdata('is_sup_admin') == "1" || in_array("6",$this->session->userdata('permissions'))){ ?>
                                        <li><a href="<?php echo base_url(); ?>cms/Subscriber"><i class="fa fa-arrow-circle-o-right"></i>Support Messages</a></li>
                                    <?php } ?>
                                    <?php if($this->session->userdata('is_sup_admin') == "1" || in_array("7",$this->session->userdata('permissions'))){ ?>
                                        <li><a href="<?php echo base_url(); ?>Faqs"><i class="fa fa-arrow-circle-o-right"></i>FAQs</a></li>
                                    <?php } ?>
                                </ul>
                            </li>
                            <?php if($this->session->userdata('is_sup_admin') == "1" || in_array("8",$this->session->userdata('permissions')) || in_array("9",$this->session->userdata('permissions')) || in_array("10",$this->session->userdata('permissions')) || in_array("11",$this->session->userdata('permissions'))){ ?>
                                <li style="border-bottom: 0.1em solid #666666"><a><i class="fa fa-user"></i>User Management<span class="fa fa-chevron-down"></span></a>
                            <?php } ?>
                                <ul class="nav child_menu">
                                    <?php if($this->session->userdata('is_sup_admin') == "1" || in_array("8",$this->session->userdata('permissions'))){ ?>
                                        <li><a href="<?php echo base_url().'app/Appusers';?>"><i class="fa fa-arrow-circle-o-right"></i>App Users List</a></li>
                                    <?php } ?>
                                    <?php if($this->session->userdata('is_sup_admin') == "1" || in_array("9",$this->session->userdata('permissions'))){ ?>
                                        <li><a href="<?php echo base_url().'app/Blockusers';?>"><i class="fa fa-arrow-circle-o-right"></i>Blocked Users List</a></li>
                                    <?php } ?>
                                    <?php if($this->session->userdata('is_sup_admin') == "1" || in_array("10",$this->session->userdata('permissions'))){ ?>
                                        <li><a href="<?php echo base_url().'app/Usercons';?>"><i class="fa fa-arrow-circle-o-right"></i>User Connections</a></li>
                                    <?php } ?>
                                    <?php if($this->session->userdata('is_sup_admin') == "1" || in_array("11",$this->session->userdata('permissions'))){ ?>
                                        <li><a href="<?php echo base_url().'app/Incomplete';?>"><i class="fa fa-arrow-circle-o-right"></i>Incomplete Profiles</a></li>
                                    <?php } ?>
                                    <?php if($this->session->userdata('is_sup_admin') == "1"){ ?>
                                        <li><a href="<?php echo base_url().'app/Chats';?>"><i class="fa fa-arrow-circle-o-right"></i>User Chats</a></li>
                                    <?php } ?>                                        
                                </ul>
                            </li>
                            <?php if($this->session->userdata('is_sup_admin') == "1" || in_array("12",$this->session->userdata('permissions')) || in_array("13",$this->session->userdata('permissions')) || in_array("14",$this->session->userdata('permissions')) || in_array("15",$this->session->userdata('permissions'))){ ?>
                                <li style="border-bottom: 0.1em solid #666666"><a><i class="fa fa-envelope"></i>Email<span class="fa fa-chevron-down"></span></a>
                            <?php } ?>
                                <ul class="nav child_menu">
                                    <?php if($this->session->userdata('is_sup_admin') == "1" || in_array("12",$this->session->userdata('permissions'))){ ?>
                                        <li><a href="<?php echo base_url().'New_Email';?>"><i class="fa fa-arrow-circle-o-right"></i>New Email</a></li>
                                    <?php } ?>
                                    <?php if($this->session->userdata('is_sup_admin') == "1" || in_array("13",$this->session->userdata('permissions'))){ ?>
                                        <li><a href="<?php echo base_url().'Developer';?>"><i class="fa fa-arrow-circle-o-right"></i>To Developer</a></li>
                                    <?php } ?>
                                    <?php if($this->session->userdata('is_sup_admin') == "1" || in_array("14",$this->session->userdata('permissions'))){ ?>
                                        <li><a href="<?php echo base_url().'Marketing';?>"><i class="fa fa-arrow-circle-o-right"></i>To Marketing</a></li>
                                    <?php } ?>
                                    <?php if($this->session->userdata('is_sup_admin') == "1" || in_array("15",$this->session->userdata('permissions'))){ ?>
                                        <li><a href="<?php echo base_url().'email/Email';?>"><i class="fa fa-arrow-circle-o-right"></i>To User</a></li>
                                    <?php } ?>
                                </ul>
                            </li>
                            <?php if($this->session->userdata('is_sup_admin') == "1" || in_array("16",$this->session->userdata('permissions')) || in_array("17",$this->session->userdata('permissions')) || in_array("18",$this->session->userdata('permissions'))){ ?>
                                <li style="border-bottom: 0.1em solid #666666"><a><i class="fa fa-gear"></i>Admin Users<span class="fa fa-chevron-down"></span></a>
                            <?php } ?>
                                <ul class="nav child_menu">
                                    <?php if($this->session->userdata('is_sup_admin') == "1" || in_array("16",$this->session->userdata('permissions'))){ ?>
                                        <li><a href="<?php echo base_url().'manageadmin/Newadmin';?>"><i class="fa fa-arrow-circle-o-right"></i>New Admin</a></li>
                                    <?php } ?>
                                    <?php if($this->session->userdata('is_sup_admin') == "1" || in_array("17",$this->session->userdata('permissions'))){ ?>
                                        <li><a href="<?php echo base_url().'manageadmin/rolesList';?>"><i class="fa fa-arrow-circle-o-right"></i>Manage Roles</a></li>
                                    <?php } ?>
                                    <?php if($this->session->userdata('is_sup_admin') == "1" || in_array("18",$this->session->userdata('permissions'))){ ?>
                                        <li><a href="<?php echo base_url().'manageadmin/Adminlist';?>"><i class="fa fa-arrow-circle-o-right"></i>Admin List</a></li>
                                    <?php } ?>
                                </ul>
                            </li>
                        </ul>
                        <!--  <h3>Dashboard</h3>-->
                    </div>
                </div>
            </div>
        </div>

        <!-- top navigation -->

        <div class="top_nav">
            <div class="nav_menu">
                <nav>
                    <div class="nav toggle">
                        <a id="menu_toggle">
                            <i class="fa fa-bars"></i>
                        </a>
                    </div>
                    <div style=" position: relative; float: left;   margin-top: 12px;">
                        <a>
                            <h4>Welcome, <?php echo $this->session->userdata('username')?></h4>
                        </a>
                    </div>
                    <ul class="nav navbar-nav navbar-right">
                        <li class="">
                            <a href="javascript:;" class="user-profile dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
								<img src="<?php echo base_url().'uploads/admin_profile_images/'. $this->session->userdata('profile_image')?>" alt="Profile Image"><?php echo $this->session->userdata('username')?>
								<span class=" fa fa-angle-down"></span>
                            </a>
                            <ul class="dropdown-menu dropdown-usermenu pull-right">
                                <li><a href="<?php echo base_url().'logout'?>"><i class="fa fa-sign-out pull-right"></i> Log Out</a></li>
                            </ul>
                        </li>
                    </ul>
                </nav>
            </div>
        </div>
        <!-- /top navigation -->
