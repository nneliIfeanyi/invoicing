<body class="animsition">
    <div class="page-wrapper">
        <!-- MENU SIDEBAR-->
        <aside class="menu-sidebar2">
            <div class="logo">
                <a href="#" class="text-light font-weight-bold">
                    invoice<span class="text-warning">Online</span>
                    <!-- <img src="<?php echo URLROOT;?>/logo/branding.png" alt="invoiceOnline" /> -->
                </a>
            </div>
            <div class="menu-sidebar2__content js-scrollbar1">
                <!-- <div class="account2">
                    <?php if(!empty($_SESSION['logo'])):?>
                    <div class="image img-cir img-120">
                        <img src="<?php echo URLROOT;?>/logo/branding.png" alt="invoiceOnline" />
                    </div>
                    <?php endif;?>
                    <h4 class="name"><?php echo $_SESSION['user_name'];?></h4>
                    <a href="<?php echo URLROOT;?>/users/logout">Sign out</a>
                </div> -->
                <nav class="navbar-sidebar2">
                    <ul class="list-unstyled navbar__list">
                        <li>
                            <a href="<?php echo URLROOT?>/posts">
                                <i class="fas fa-tachometer-alt"></i>Dashboard</a>
                           
                        </li>
                       <?php if($_SESSION['category'] == 'services'):?>
                        <li>
                            <a href="<?php echo URLROOT?>/posts/add/1">
                                <i class="fas fa-plus"></i>Add Transaction</a>
                        </li>
                        <?php endif;?>
                        <?php if($_SESSION['category'] == 'B&S'):?>
                        <li>
                            <a href="<?php echo URLROOT?>/posts/add/1">
                                <i class="fas fa-plus"></i>Record Sales</a>
                        </li>
                        <li>
                            <a href="<?php echo URLROOT?>/posts/sales">
                                <i class="fas fa-lightbulb"></i>Sales</a>
                        </li>
                        <?php endif;?>
                        <li>
                            <a href="<?php echo URLROOT?>/users/profile">
                                <i class="fas fa-user"></i>Profile</a>
                        </li>
                        <li>
                            <a href="<?php echo URLROOT?>/pages/inventory">
                                <i class="fas fa-chart-line"></i>Inventory</a>
                        </li>
                        <li>
                            <a href="<?php echo URLROOT?>/pages/subscribe">
                                <i class="fas fa-dollar"></i>Fund Wallet</a>
                        </li>
                        <!-- Load Previous version -->
                        <?php if('2024-05-16' > $_SESSION['reg_date']):?>
                        <li>
                            <a href="<?php echo URLROOT?>/posts/archive">
                                <i class="fas fa-check"></i>Previous Transactions</a>
                        </li>
                        <?php endif;?>

                        <!-- Check for usertype -->
                         <?php if($_SESSION['user_type'] == "admin"):?>
                            <li>
                                <a href="<?php echo URLROOT?>/admin">
                                    <i class="fas fa-check"></i>Admin</a>
                            </li>
                        <?php endif;?>
                    
                        <li>
                            <a href="<?php echo URLROOT?>/pages/referal">
                                <i class="fas fa-user-plus"></i>Referal</a>
                        </li>
                        <li>
                            <a href="<?php echo URLROOT?>/pages/sell">
                                <i class="fas fa-arrow-right"></i>Sell Points</a>
                        </li>
                       
                        <!-- End Check for usertype -->
                            <li>
                                <a href="<?php echo URLROOT?>/pages/refresh">
                                    <i class="fas fa-refresh"></i>Refresh</a>
                            </li>
                         <li>
                            <a href="<?php echo URLROOT?>/users/logout">
                                <i class="fas fa-backward"></i>Sign out</a>
                        </li>
                </nav>
            </div>
        </aside>
        <!-- END MENU SIDEBAR-->
        <!-- PAGE CONTAINER-->
        <div class="page-container2">
            <!-- STRAIGHT LINE HEADER -->
            <header class="header-desktop2">
                <div class="section__content section__content--p30">
                    <div class="container-fluid">
                        <div class="header-wrap2">
                            <div class="logo d-block d-lg-none">
                                <a href="#" class="text-light font-weight-bold">
                                    invoice<span class="text-warning">Online</span>
                                    <!-- <img src="<?php echo URLROOT;?>/logo/branding.png" alt="invoiceOnline" /> -->
                                </a>
                            </div>
                            <div class="header-button2">
                                <div class="header-button-item js-item-menu">
                                    <i class="zmdi zmdi-search"></i>
                                    <div class="search-dropdown js-dropdown">
                                        <form action="<?= URLROOT?>/posts/search_results" 
                                              method="post" class="mt-2" id="search_form">
                                            <input class="au-input au-input--full au-input--h60" type="text" placeholder="Search customer name" />
                                        
                                            <button type="submit" class="search-dropdown__icon">
                                             <i class="zmdi zmdi-search"></i> 
                                            </button>
                                       </form>
                                    </div>
                                </div>
                                <div class="header-button-item has-noti js-item-menu">
                                    <i class="zmdi zmdi-notifications"></i>
                                    <div class="notifi-dropdown js-dropdown">
                                        <div class="notifi__title">
                                            <p>You have 1 Notification</p>
                                        </div>
                                        <div class="notifi__item">
                                            <div class="bg-c1 img-cir img-40">
                                                <i class="zmdi zmdi-money"></i>
                                            </div>
                                            <div class="content">
                                                <p>Your wallet balance is</p>
                                                <span class="text-warning">P</span><span style="color:#212529;"><?php echo $_SESSION['user_points'];?></span>
                                            </div>
                                        </div>
                                        <!-- <div class="notifi__item">
                                            <div class="bg-c2 img-cir img-40">
                                                <i class="zmdi zmdi-cloud-download"></i>
                                            </div>
                                            <div class="content">
                                                <button id="install">Install app</button><br>
                                                <span class="text-warning">On this device</span>
                                            </div>
                                        </div> -->
                                        
                                        <div class="notifi__footer">
                                            <a href="<?php echo URLROOT;?>/users/wallet_history" class="text-warning text-muted">
                                            View wallet history</a>
                                        </div>
                                    </div>
                                </div>
                                <div class="header-button-item mr-0 js-sidebar-btn d-lg-none">
                                    <i class="zmdi zmdi-menu"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </header>
            <aside class="menu-sidebar2 js-right-sidebar d-block d-lg-none">
                <div class="logo">
                    <a href="#">
                        <img src="<?php echo URLROOT;?>/logo/branding.png" alt="invoiceOnline" />
                    </a>
                </div>
                <div class="menu-sidebar2__content js-scrollbar2">
                    <div class="account2">
                        <!-- <?php if(empty($_SESSION['logo'])):?>
                        <div class="image img-cir img-120">
                            <img src="<?php echo URLROOT;?>/logo/branding.png" alt="invoiceOnline" />
                        </div>
                         <?php endif;?> -->
                        <h4 class="name"><?php echo $_SESSION['user_name'];?></h4>
                        <a href="<?php echo URLROOT?>/users/logout">Sign out</a>
                    </div>
                    <nav class="navbar-sidebar2">
                        <ul class="list-unstyled navbar__list">
                            <li>
                                <a href="<?php echo URLROOT?>/posts">
                                    <i class="fas fa-tachometer-alt"></i>Dashboard</a>
                                <!-- <span class="inbox-num">3</span> -->
                            </li>
                           <?php if($_SESSION['category'] == 'services'):?>
                            <li>
                                <a href="<?php echo URLROOT?>/posts/add/1">
                                    <i class="fas fa-plus"></i>Add Transaction</a>
                            </li>
                            <?php endif;?>
                            <?php if($_SESSION['category'] == 'B&S'):?>
                            <li>
                                <a href="<?php echo URLROOT?>/posts/add/1">
                                    <i class="fas fa-plus"></i>Record Sales</a>
                            </li>
                            <li>
                                <a href="<?php echo URLROOT?>/posts/sales">
                                    <i class="fas fa-lightbulb"></i>Sales</a>
                            </li>
                            <?php endif;?>
                            <li>
                                <a href="<?php echo URLROOT?>/pages/inventory">
                                <i class="fas fa-chart-line"></i>Inventory</a>
                            </li>
                             <li>
                                <a href="<?php echo URLROOT?>/users/profile">
                                    <i class="fas fa-user"></i>Profile</a>
                            </li>
                            <li>
                                <a href="<?php echo URLROOT?>/pages/subscribe">
                                    <i class="fas fa-dollar"></i>Fund Wallet</a>
                            </li>
                            <!-- Load Previous version -->
                            <?php if('2024-05-16' > $_SESSION['reg_date']):?>
                            <li>
                                <a href="<?php echo URLROOT?>/posts/archive">
                                    <i class="fas fa-check"></i>Previous Transactions</a>
                            </li>
                            <?php endif;?>

                            <!-- Check for usertype -->
                             <?php if($_SESSION['user_type'] == "admin"):?>
                                <li>
                                    <a href="<?php echo URLROOT?>/admin">
                                        <i class="fas fa-check"></i>Admin</a>
                                </li>
                            <?php endif;?>
                                <li>
                                    <a href="<?php echo URLROOT?>/pages/referal">
                                        <i class="fas fa-user-plus"></i>Referal</a>
                                </li>
                                <li>
                                    <a href="<?php echo URLROOT?>/pages/sell">
                                        <i class="fas fa-arrow-right"></i>Sell Points</a>
                                </li>
                            <!-- End Check for usertype -->
                            <li>
                                <a href="<?php echo URLROOT?>/pages/refresh">
                                    <i class="fas fa-refresh"></i>Refresh</a>
                            </li>
                        </ul>
                    </nav>
                </div>
            </aside>
            <!-- END HEADER DESKTOP-->

            