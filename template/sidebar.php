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
                <li> <a class="waves-effect waves-dark <?php if($title == "E-Voting") echo 'active'; ?>" href="voting.php" aria-expanded="false"><i class="mdi mdi-account-check"></i><span class="hide-menu">Voting</span></a>
                </li>
                <li> <a class="waves-effect waves-dark" href="hasil.php" aria-expanded="false"><i class="mdi mdi-table"></i><span class="hide-menu">Hasil</span></a>
                </li>
                <li> <a class="waves-effect waves-dark btn btn-danger text-white" href="logout.php" aria-expanded="false"><i class="mdi mdi-logout text-white"></i><span class="hide-menu">Logout</span></a>
                </li>
            </ul>
        </nav>
        <!-- End Sidebar navigation -->
    </div>
    <!-- End Sidebar scroll-->
</aside>
<!-- ============================================================== -->
<!-- End Left Sidebar - style you can find in sidebar.scss  -->
<!-- ============================================================== -->