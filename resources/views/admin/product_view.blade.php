<!DOCTYPE html>
<html>
  <head> 
   @include('admin.css')
  </head>
  <body>
    @include('admin.header')
    <div class="d-flex align-items-stretch">
      <!-- Sidebar Navigation-->
      @include('admin.sidebar')
      <!-- Sidebar Navigation end-->
      <div class="page-content">
        <div class="page-header">
          <div class="container-fluid">
            <h3 style="padding-left: 80px; color:azure" >All Products</h3>
            
            <div class="card pd-20 pd-sm-40" style="margin:70px">
                
              <form action="{{ url('product_search') }}" style="margin-bottom: 10px" method="get">
                @csrf
                <input type="search" name="search" style="padding: 10px">
                <input type="submit" value="Search" class="btn btn-secondary">
              </form>
             
              <div class="table-wrapper">
              <table id="datatable1" class="table display responsive nowrap" style="background:white;">
                <thead style="color: black">
                  <tr>
                    <th class="wd-15p">Id</th>
                    <th class="wd-15p">Product Title</th>
                    <th class="wd-20p">Description</th>
                    <th class="wd-20p">Category</th>
                    <th class="wd-20p">Quantity</th>
                    <th class="wd-20p">Image</th>
                    <th class="wd-20p">Edit</th>
                    <th class="wd-20p">Delete</th>
                    
                   
                  </tr>
                </thead>
                <tbody style="color:black;">
                   
                   
                   @foreach ( $products as  $product)
                       
                     
                  <tr>
                    <td>{{ $product->id }}</td>
                    <td>{{ $product->title }}</td>
                    <td>{!!Str::limit( $product->description,25)!!} </td>
                    <td>{{ $product->category }}</td>
                    <td>{{ $product->quantity }}</td>
                    <td>
                        <img src="products/{{ $product->image}}" alt="" width="50" height="50">
                    </td>
                    <td>
                      <a class="btn btn-success" href="{{ url('update_product',$product->id) }}">Edit</a>
                    </td>
                    <td>
                        <a class="btn btn-danger" href="{{ url('delete_product',$product->id) }}" onclick="return confirm('Are you delete sure')">Delete</a>
                    </td>
                  </tr>
                  @endforeach  
                </tbody>
              </table>
              <div style="display:flex;justify-content:center;justify-items:center;margin-top: 30px;">
              {{ $products->links() }}
             </div>
            </div><!-- table-wrapper -->
            
        </div >
      </div>
    </div>
    <!-- JavaScript files-->
    @include('admin.footer')
  </body>
</html>