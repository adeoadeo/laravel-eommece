<nav id="sidebar">
    <!-- Sidebar Header-->
    <div class="sidebar-header d-flex align-items-center">
      <div class="avatar"><img src="{{asset('admincss/img/avatar-6.jpg')}}" alt="..." class="img-fluid rounded-circle"></div>
      <div class="title">
        <h1 class="h5" style="color: white">Mark Stephen</h1>
        <p style="color:white">Web Designer</p>
      </div>
    </div>
    <!-- Sidebar Navidation Menus--><span class="heading" style="color: white">Main</span>
    <ul class="list-unstyled">
            <li class="active"><a href="{{ url('admin/dashboard') }}" style="color: white"> <i class="icon-home"></i>Home </a></li>
            <li><a href="{{ url('view_category') }}" style="color: white"> <i class="icon-grid"></i>Category</a></li>

            
            
            <li><a href="#exampledropdownDropdown" aria-expanded="false" data-toggle="collapse" style="color: white"> <i class="icon-windows"></i>Products </a>
              <ul id="exampledropdownDropdown" class="collapse list-unstyled ">
                <li><a href="{{ url('add_product_view') }}" style="color: white">Add Products</a></li>
                <li><a href="{{ url('view_product') }}" style="color: white">view Products</a></li>
               
               </ul>
              <li><a href="{{ url('view_order') }}" style="color: white"> <i class="icon-grid"></i>Orders</a></li>

    </ul>
  </nav>