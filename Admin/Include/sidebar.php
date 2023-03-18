<div id="layoutSidenav">
<div id="layoutSidenav_nav">
                <nav class="sb-sidenav accordion sb-sidenav-dark" id="sidenavAccordion">
                    <div class="sb-sidenav-menu">
                        <div class="nav">                           
                            <a class="nav-link active" href="index.php">
                                <div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>
                                Dashboard
                            </a>
                            <a class="nav-link" href="">
                                <div class="sb-nav-link-icon"><i class="fas fa-tasks"></i></div>
                                Booking List
                            </a>
                            <div class="sb-sidenav-menu-heading">Maintenance</div>
                            <a class="nav-link" href="vehicleList.php">
                                <div class="sb-nav-link-icon"><i class="fas fa-car"></i></div>
                                Vehicle type
                            </a>
                            <a class="nav-link" href="ServicesList.php">
                                <div class="sb-nav-link-icon"><i class="fas fa-th-list"></i></div>
                                Service List
                            </a>
                            <a class="nav-link" href="PriceList.php">
                                <div class="sb-nav-link-icon"><i class="fas fa-money-bill-alt"></i></div>
                                Price
                            </a>
                            <a class="nav-link" href="userList.php">
                                <div class="sb-nav-link-icon"><i class="fas fa-users-cog"></i></div>
                                User List
                            </a>         
                        </div>
                    </div>
                    <div class="sb-sidenav-footer">
                        <div class="small">Logged in as:</div>
                        <?php echo $_SESSION['Email']; ?>
                    </div>
                </nav>
            </div>
            <div id="layoutSidenav_content">