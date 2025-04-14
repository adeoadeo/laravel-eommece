<<!DOCTYPE html>
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
        <div class="page-header" style="font-weight: ">
          <div class="container-fluid">
          <!-- body start-->
          <div class="table-wrapper">
            <table id="datatable1" class="table display responsive nowrap" style="background:white; ">
              <thead style="color: black ">
                <tr style="font-size: 12px">
                  <th class="wd-15p">Id</th>
                  <th class="wd-15p">Customer Name</th>
                  <th class="wd-15p">Address</th>
                  <th class="wd-15p">Phone</th>
                  <th class="wd-115p">Product Title</th>
                  <th class="wd-15p">Product Price</th>
                  <th class="wd-15p">Image</th>
                  <th class="wd-15p">Status</th>
                  <th class="wd-15p">Change Status</th>
                
                  
                  
                 
                </tr>
              </thead>
              <tbody style="color:black;">
                 
                 
                 @foreach ( $data as $data)
                   
             
                   
                <tr style="font-size: 12px;color:black">
                  <td style="color: black;font-weight:300">{{ $data->id }}</td>
                  <td style="color: black;font-weight:300">{{ $data->name }}</td>
                  <td style="color: black;font-weight:300">{{ $data->rec_address	 }}</td>
                  <td style="color: black;font-weight:300">{{ $data->phone }}</td>
                  <td style="color: black;font-weight:300">{{ $data->product->title}}</td>
                  <td style="color: black;font-weight:300">{{ $data->product->price}}</td>
                  <td>
                      <img src="products/{{ $data->product->image }}" alt="" width="40" height="40">
                  </td>
                  <td>
                    @if ( $data->status == 'in progress')
                    <span style="color: red">{{  $data->status }}</span>
                    @elseif ($data->status == 'In the way')
                    <span style="color:blue">{{  $data->status }}</span>
                    @else
                    <span style="color:darkgreen">{{  $data->status }}</span>
                    @endif
                  </td>
                 <td>
                  <a href="{{ url('on_the_way',$data->id) }}" class="btn btn-primary" style="font-size: 12px">In the way</a>
                  <a href="{{ url('delivered',$data->id) }}" class="btn btn-success" style="font-size: 12px">Delivered</a>
                 </td>
                </tr>
                @endforeach
              </tbody>
            </table>
            <div style="display:flex;justify-content:center;justify-items:center;margin-top: 30px;">
           
           </div>
          </div><!-- table-wrapper -->
             <!-- body end-->
        </div>
      </div>
    </div>
    <!-- JavaScript files-->
    @include('admin.footer')
  </body>
</html>