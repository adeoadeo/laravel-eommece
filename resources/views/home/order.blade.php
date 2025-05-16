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
  <div class="div_deg">
  <table>
    <tr>
    <th>Product Name</th>
    <th>Price</th>
   
    <th>Delivered Status</th>
    <th>Image</th>
    </tr>
  
    
  @foreach (   $order  as    $orders )
      
 
        <tr>
          <td>{{  $orders->product->title }}</td>
        
          <td>{{  $orders->product->price }}</td>
          <td>{{  $orders->status}}</td>
          <td>
          <img width="50" src="/products/{{  $orders->product->image}}" alt="">
          </td>
          
          </tr>
          
          @endforeach
    
    </table>
</div>
    <!-- info section -->
    @include('home.info')
<!-- end info section -->
  
    <!-- footer section -->
    @include('home.footer')
   <!--End footer section -->

</body>

</html>