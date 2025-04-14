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
            <h3 style="padding-left:80px; color:azure">Create Category</h3>
            <section class="content">
               
                <!-- Default box -->
                @if(Session::has('meg'))
                <p class="alert alert-success">{{ Session::get('meg') }}</p>
                @endif
                <div class="container-fluid">
                    <div class="card col-md-6" style="margin-left: 70px">
                       
                        <div class="card-body"  class="col-md-9">	
                            <form action="{{ url('add_category') }}" method="POST">	
                                @csrf					
                            <div class="row">
                                <div class="col-md-9">
                                    <div class="mb-3">
                                        <label for="name" style="color: white">Category Name</label>
                                       
                                        <input type="text" name="category" id="name" class="form-control @error('category_name')is-invalid
                                         @enderror" placeholder="Category Name" style="background-color: white" >
            
                                        @error('category_name')
                                           <span class="text-danger">{{ $message }}</span> 
                                        @enderror
                                    </div>
                                 
            
                                </div>
                                
                                </div>									
                            </div>
                        </div>							
                    </div>
                    <div class="pb-5 pt-3" style="padding-left:80px">
                        <button class="btn btn-primary" style="color: white" >Create</button>
                        
                    </div>
                </div>
            </form>	
                <!-- /.card -->
               
            </section>
            <!-- /.content -->
            
            <h3 style="padding-left: 80px; color:azure" >Category List</h3>
            <div class="card pd-20 pd-sm-40" style="margin:70px">
                
             
              <div class="table-wrapper">
              <table id="datatable1" class="table display responsive nowrap" style="background:white;">
                <thead style="color: black">
                  <tr>
                    <th class="wd-15p">Id</th>
                    <th class="wd-15p">Category Name</th>
                    <th class="wd-20p">Status</th>
                    <th class="wd-20p">Action</th>
                    
                   
                  </tr>
                </thead>
                <tbody style="color:black;">
                   
                    @foreach ( $data as $data)
                        
                  <tr>
                    <td>{{ $data->id}}</td>
                    <td>{{ $data->category_name }}</td>
                    <td>
                    
                    <span class="badge badge-success">Active</span>
                   
                    <span class="badge badge-danger">InActive</span>
                    
                    </td>
                    <td>
                        <a href="{{ url('edit_category_view',$data->id) }}" class="btn btn-success">Edit</a>
                        <a href="{{ url('delete_category',$data->id) }}" class="btn btn-danger" onclick="return confirm('Are you delete sure')" >Delete</a>
                       
                        <a href="" class="btn btn-danger">InActive</a>
                        
                        <a href="" class="btn btn-success">Active</a>
                        
                    </td>  
                    
                    
                  </tr>
                  @endforeach
                </tbody>
              </table>
            </div><!-- table-wrapper -->
           
              
            </div>
        </div>
      </div>
    </div>
    <!-- JavaScript files-->
    
  
   
    <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert2/11.15.10/sweetalert2.min.js" integrity="sha512-M60HsJC4M4A8pgBOj7oC/lvJXuOc9CraWXdD4PF+KNmKl8/Mnz6AH9FANgi4SJM6D9rqPvgQt4KRFR1rPN+EUw==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="{{ asset('admincss/vendor/jquery/jquery.min.js')}}"></script>
    <script src="{{ asset('admincss/vendor/popper.js/umd/popper.min.js')}}"> </script>
    <script src="{{ asset('admincss/vendor/bootstrap/js/bootstrap.min.js')}}"></script>
    <script src="{{ asset('admincss/vendor/jquery.cookie/jquery.cookie.js')}}"> </script>
    <script src="{{ asset('admincss/vendor/chart.js/Chart.min.js')}}"></script>
    <script src="{{ asset('admincss/vendor/jquery-validation/jquery.validate.min.js')}}"></script>
    <script src="{{ asset('admincss/js/charts-home.js')}}"></script>
    <script src="{{ asset('admincss/js/front.js')}}"></script>

    
  
  </body>
</html>