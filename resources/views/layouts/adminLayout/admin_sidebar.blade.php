<?php $curenturl =  Route::currentRouteName(); ?>

<div id="sidebar"><a href="#" class="visible-phone"><i class="icon icon-home"></i> Dashboard</a>
  <ul>
    <li <?php if (strcasecmp("admin.dashboard", $curenturl)==0){ ?> class="active" <?php } ?>><a href="{{ route('admin.dashboard') }}"><i class="icon icon-home"></i> <span>Dashboard</span></a> </li>
    <li class="submenu"> <a href="#"><i class="icon icon-th-list"></i> <span>Categories</span> <span class="label label-important"></span></a>
      <ul <?php if (strcasecmp("/categor/i", $curenturl)==0){ ?> style="display: block;" <?php } ?>>
        <li <?php if (strcasecmp("/add-category/i", $curenturl)==0){ ?> class="active" <?php } ?>><a href="{{ route('admin.addcategory')}}">Add Category</a></li>
        <li <?php if (strcasecmp("/view-categories/i", $curenturl)==0){ ?> class="active" <?php } ?>><a href="{{ route('admin.viewcategory')}}">Manage Categories</a></li>
      </ul>
    </li>
     <li class="submenu"> <a href="#"><i class="icon icon-th-list"></i> <span>Products</span> <span class="label label-important">2</span></a>
      <ul <?php if (strcasecmp("/product/i", $curenturl)==0){ ?> style="display: block;" <?php } ?>>
        <li <?php if (strcasecmp("/add-product/i", $curenturl)==0){ ?> class="active" <?php } ?>><a href="{{ url('/admin/add-product')}}">Add Product</a></li>
        <li <?php if (strcasecmp("/view-products/i", $curenturl)==0){ ?> class="active" <?php } ?>><a href="{{ url('/admin/view-products')}}">View Products</a></li>
      </ul>
    </li>
    <li class="submenu"> <a href="#"><i class="icon icon-th-list"></i> <span>Coupons</span> <span class="label label-important">2</span></a>
      <ul <?php if (strcasecmp("/coupon/i", $curenturl)==0){ ?> style="display: block;" <?php } ?>>
        <li <?php if (strcasecmp("/add-coupon/i", $curenturl)==0){ ?> class="active" <?php } ?>><a href="{{ url('/admin/add-coupon')}}">Add Coupon</a></li>
        <li <?php if (strcasecmp("/view-coupons/i", $curenturl)==0){ ?> class="active" <?php } ?>><a href="{{ url('/admin/view-coupons')}}">View Coupons</a></li>
      </ul>
    </li>
    <li class="submenu"> <a href="#"><i class="icon icon-th-list"></i> <span>Orders</span> <span class="label label-important">1</span></a>
      <ul <?php if (strcasecmp("/orders/i", $curenturl)==0){ ?> style="display: block;" <?php } ?>>
        <li <?php if (strcasecmp("/view-orders/i", $curenturl)==0){ ?> class="active" <?php } ?>><a href="{{ url('/admin/view-orders')}}">View Orders</a></li>
      </ul>
    </li>
    <li class="submenu"> <a href="#"><i class="icon icon-th-list"></i> <span>Banners</span> <span class="label label-important">2</span></a>
      <ul <?php if (strcasecmp("/banner/i", $curenturl)==0){ ?> style="display: block;" <?php } ?>>
        <li <?php if (strcasecmp("/add-banner/i", $curenturl)==0){ ?> class="active" <?php } ?>><a href="{{ url('/admin/add-banner')}}">Add Banner</a></li>
        <li <?php if (strcasecmp("/view-banners/i", $curenturl)==0){ ?> class="active" <?php } ?>><a href="{{ url('/admin/view-banners')}}">View Banners</a></li>
      </ul>
    </li>
    <li class="submenu"> <a href="#"><i class="icon icon-th-list"></i> <span>Users</span> <span class="label label-important">1</span></a>
      <ul <?php if (strcasecmp("/users/i", $curenturl)==0){ ?> style="display: block;" <?php } ?>>
        <li <?php if (strcasecmp("/view-users/i", $curenturl)==0){ ?> class="active" <?php } ?>><a href="{{ url('/admin/view-users')}}">View Users</a></li>
      </ul>
    </li>
  </ul>
</div>
<!--sidebar-menu-->