<!-- ============================================================== -->
<!-- Left Sidebar - style you can find in sidebar.scss  -->
<!-- ============================================================== -->
<div class="navbar-default sidebar" role="navigation">
    <div class="sidebar-nav slimscrollsidebar">
        <div class="sidebar-head">
            <h3><span class="fa-fw open-close"><i class="ti-close ti-menu"></i></span> <span class="hide-menu">Navigation</span></h3>
        </div>
        <ul class="nav" id="side-menu">
            <li style="padding: 70px 0 0;">
                <h5 align="center"><b>Halo, <?php echo $_SESSION['nama'] ?></b></h5>
            </li>
            <li>
                <a href="r" class="waves-effect"><i class="fa fa-clock-o fa-fw" aria-hidden="true"></i>Dashboard</a>
            </li>
            <?php
                if ($_SESSION['role'] == 'admin') {
            ?>
            <li>
                <a href="r?m=barang&s=barang" class="waves-effect"><i class="fa fa-database fa-fw" aria-hidden="true"></i>Data Barang</a>
            </li>
            <?php } ?>
            <li>
                <a href="r?m=laporan&s=laporan" class="waves-effect"><i class="fa fa-archive fa-fw" aria-hidden="true"></i>Laporan</a>
            </li>
            <li>
                <a href="r?m=logout" class="waves-effect"><i class="fa fa-sign-out fa-fw" aria-hidden="true"></i>Logout</a>
            </li>

        </ul>
    </div>
    
</div>
<!-- ============================================================== -->
<!-- End Left Sidebar -->
<!-- ============================================================== -->