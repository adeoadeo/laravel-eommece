
<!DOCTYPE html>
<html>

<head>
  @include('home.css')
  <style>
    .div_deg{
        display: flex;
        justify-content: center;
        align-items: center;
        margin: 60px;
       
    }
    table{
        border: 2px solid black;
        text-align: center;
    }
    th{
        border: 2px solid black;
        text-align: center;
        color: white;
        font-size: 20px;
        font-weight:bold;
        background-color:  black;
        width: 250px;
    }
    td{
        border: 1px solid skyblue;
    }

    .car_value{
      text-align: center;
      margin-bottom: 70px;
      padding: 18px;
    }


  </style>
</head>

<body>
  <div class="hero_area">
    <!-- header section strats -->
   @include('home.header')
    <!-- end header section -->
    <!-- slider section -->

   

    <!-- end slider section -->
  </div>
  <!-- end hero area -->

  <!-- shop section -->

 
 <div class="div_deg">
  
  <table>
  <tr>
  <th>Product Title</th>
  <th>Price</th>
 
  <th>Image</th>
  <th>Remove</th>
  </tr>

   <?php 
   $value = 0;
   
     ?>

   @foreach (  $cart as $carts)
      <tr>
        <td>{{ $carts->product->title }}</td>
      
        <td>{{ $carts->product->price}}</td>
        <td>
        <img width="50" src="/products/{{ $carts->product->image }}" alt="">
        </td>
        <td>
         <a class="btn btn-danger" href="{{ url('delete_cart',$carts->id)}}"  onclick="return confirm('Are you delete sure')">remove</a>
        </td>
        </tr>
        <?php 
        $value = $value+$carts->product->price;
          ?>
    
    @endforeach
  </table>

  </div>


   <div class="car_value">
    <h1>Total Value of Cart is:${{$value}}</h1>
  
   <div class="checkout__form">
    <div class="col-lg-6 mt-5 pr-5">
    <h4 class="pl-5">Receiver Address</h4>
  </div>
    <form action="{{ url("confirm_order") }}" method="POST">
      @csrf
        <div class="row">
            <div class="col-lg-8 col-md-6">
                <div class="row">
                    <div class="col-lg-6 ml-5">
                        <div class="checkout__input ml-5">
                            <p class="ml-5"> Name<span>*</span></p>
                            <input type="text" name="name" class="ml-5" placeholder="inter your name" value="{{ Auth::user()->name }}">
                        </div>
                    </div>
                   
                </div>
                <div class="col-lg-6 ml-5">
                <div class="checkout__input ml-5">
                    <p>Address<span>*</span></p>
                    <input type="text" name="address" placeholder="inter your address" class="checkout__input__add ml-5">
                    
                </div>
               
              </div>  
                
                <div class="row">
                    <div class="col-lg-6 ml-5">
                        <div class="checkout__input ml-5">
                            <p>Phone<span>*</span></p>
                            <input type="text" name="phone" class="ml-5" placeholder="inter your phone">
                            <input type="submit" value="Place Order" class="mt-5 btn btn-primary">
                        </div>
                    </div>
                   
                </div>
              
               
            </div>
         
        </div>
        
    </form>
</div>
</div>

    @include('home.info')
    <!-- end info section -->
  
    <!-- footer section -->
    @include('home.footer')
   <!--End footer section -->
  

   
 </body>

</html>