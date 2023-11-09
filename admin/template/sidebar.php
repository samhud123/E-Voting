<!-- ============================================================== -->
<!-- Left Sidebar - style you can find in sidebar.scss  -->
<!-- ============================================================== -->
<aside class="left-sidebar">
    <!-- Sidebar scroll-->
    <div class="scroll-sidebar">
        <!-- Sidebar navigation-->
        <nav class="sidebar-nav">
            <ul id="sidebarnav">
                <li> <a class="waves-effect waves-dark <?php if($title == "Dashboard") echo 'active'; ?>" href="index.php" aria-expanded="false"><i class="mdi mdi-gauge"></i><span class="hide-menu">Dashboard</span></a>
                </li>
                <li> <a class="waves-effect waves-dark <?php if($title == "Saksi") echo 'active'; ?>" href="saksi.php" aria-expanded="false"><i class="mdi mdi-account-multiple"></i><span class="hide-menu">Saksi</span></a>
                </li>
                <li> <a class="waves-effect waves-dark <?php if($title == "Hasil") echo 'active'; ?>" href="hasil.php" aria-expanded="false"><i class="mdi mdi-table"></i><span class="hide-menu">Hasil</span></a>
                </li>
                <li> <a class="waves-effect waves-dark <?php if($title == "Profile") echo 'active'; ?>" href="profile.php" aria-expanded="false"><i class="mdi mdi-account-circle"></i><span class="hide-menu">Profile</span></a>
                </li>
                <li> <a class="waves-effect waves-dark btn btn-danger text-white" href="logout.php" aria-expanded="false"><i class="mdi mdi-logout text-white"></i><span class="hide-menu">Logout</span></a>
                </li>
            </ul>
        </nav>
        <!-- End Sidebar navigation -->
    </div>
</aside>
<!-- ============================================================== -->
<!-- End Left Sidebar - style you can find in sidebar.scss  -->
<!-- ============================================================== -->