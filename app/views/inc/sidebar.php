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
                       
                        <li>
                            <a href="<?php echo URLROOT?>/posts/add/1">
                                <i class="fas fa-plus"></i>Add Transaction</a>
                        </li>
                        <li>
                            <a href="<?php echo URLROOT?>/users/profile">
                                <i class="fas fa-user"></i>Profile</a>
                        </li>
                        <li>
                            <a href="<?php echo URLROOT?>/pages/about#fund">
                                <i class="fas fa-dollar"></i>Fund Wallet</a>
                        </li>
                        <?php if('2024-05-16' > REGDATE):?>
                        <li>
                            <a href="<?php echo URLROOT?>/posts/archive">
                                <i class="fas fa-check"></i>Previous Transactions</a>
                        </li>
                        <?php endif;?>
                         <li>
                            <a href="<?php echo URLROOT?>/users/logout">
                                <i class="fas fa-backward"></i>Sign out</a>
                        </li>
                        <!-- <li class="has-sub">
                            <a class="js-arrow" href="#">
                                <i class="fas fa-trophy"></i>Features
                                <span class="arrow">
                                    <i class="fas fa-angle-down"></i>
                                </span>
                            </a>
                            <ul class="list-unstyled navbar__sub-list js-sub-list">
                                <li>
                                    <a href="table.html">
                                        <i class="fas fa-table"></i>Tables</a>
                                </li>
                                <li>
                                    <a href="form.html">
                                        <i class="far fa-check-square"></i>Forms</a>
                                </li>
                                <li>
                                    <a href="calendar.html">
                                        <i class="fas fa-calendar-alt"></i>Calendar</a>
                                </li>
                                <li>
                                    <a href="map.html">
                                        <i class="fas fa-map-marker-alt"></i>Maps</a>
                                </li>
                            </ul>
                        </li>
                         -->
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
                                                <span style="color: #fe6b2a;">P</span><span style="color:#212529;"><?php echo $_SESSION['user_points'];?></span>
                                            </div>
                                        </div>
                                        <!-- <div class="notifi__item">
                                            <div class="bg-c2 img-cir img-40">
                                                <i class="zmdi zmdi-account-box"></i>
                                            </div>
                                            <div class="content">
                                                <p>Your account has been blocked</p>
                                                <span class="date">April 12, 2018 06:50</span>
                                            </div>
                                        </div> -->
                                        
                                       <!--  <div class="notifi__footer">
                                            <a href="#">All notifications</a>
                                        </div> -->
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
                            <li>
                                <a href="<?php echo URLROOT?>/posts/add/1">
                                    <i class="fas fa-plus"></i>Add Transaction</a>
                            </li>

                             <li>
                                <a href="<?php echo URLROOT?>/users/profile">
                                    <i class="fas fa-user"></i>Profile</a>
                            </li>
                            <li>
                                <a href="<?php echo URLROOT?>/pages/about#fund">
                                    <i class="fas fa-dollar"></i>Fund Wallet</a>
                            </li>
                            <?php if('2024-05-15' > REGDATE):?>
                            <li>
                                <a href="<?php echo URLROOT?>/posts/archive">
                                    <i class="fas fa-check"></i>Previous Transactions</a>
                            </li>
                            <?php endif;?>
                            <!-- <li class="has-sub">
                                <a class="js-arrow" href="#">
                                    <i class="fas fa-trophy"></i>Features
                                    <span class="arrow">
                                        <i class="fas fa-angle-down"></i>
                                    </span>
                                </a>
                                <ul class="list-unstyled navbar__sub-list js-sub-list">
                                    <li>
                                        <a href="table.html">
                                            <i class="fas fa-table"></i>Tables</a>
                                    </li>
                                    <li>
                                        <a href="form.html">
                                            <i class="far fa-check-square"></i>Forms</a>
                                    </li>
                                    <li>
                                        <a href="calendar.html">
                                            <i class="fas fa-calendar-alt"></i>Calendar</a>
                                    </li>
                                    <li>
                                        <a href="map.html">
                                            <i class="fas fa-map-marker-alt"></i>Maps</a>
                                    </li>
                                </ul>
                            </li> -->
                           
                        </ul>
                    </nav>
                </div>
            </aside>
            <!-- END HEADER DESKTOP-->

            