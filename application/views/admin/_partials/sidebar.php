<!-- Sidebar -->
<ul class="sidebar navbar-nav">
    <li class="nav-item <?php echo $this->uri->segment(2) == '' ? 'active': '' ?>">
         <!-- Line 5-8 : untuk Menu Dashboard  -->
        <a class="nav-link" href="<?php echo site_url('admin') ?>"> 
            <i class="fas fa-fw fa-tachometer-alt"></i>
            <span>Dashboard</span>
        </a>
    </li>
    <li class="nav-item dropdown <?php echo $this->uri->segment(2) == 'products' ? 'active': '' ?>">
        <!-- Line 12-16 : untuk menu Products -->
        <a class="nav-link dropdown-toggle" href="#" id="pagesDropdown" role="button" data-toggle="dropdown" aria-haspopup="true"
            aria-expanded="false">
            <i class="fas fa-fw fa-boxes"></i>
            <span>Products</span>
        </a>
        <!-- Line 18-21 : untuk sub menu dari Products yaitu New products dan List products -->
        <div class="dropdown-menu" aria-labelledby="pagesDropdown">
            <a class="dropdown-item" href="<?php echo site_url('admin/products/new') ?>">New Product</a>
            <a class="dropdown-item" href="<?php echo site_url('admin/products') ?>">List Product</a>
        </div>
    </li>
    <li class="nav-item">
        <!-- Line 25-28 : untuk menu Users -->
        <a class="nav-link" href="#">
            <i class="fas fa-fw fa-users"></i>
            <span>Users</span></a>
    </li>
    <li class="nav-item">
        <!-- Line 31-34 : untuk menu Settings-->
        <a class="nav-link" href="#">
            <i class="fas fa-fw fa-cog"></i>
            <span>Settings</span></a>
    </li>
</ul>
