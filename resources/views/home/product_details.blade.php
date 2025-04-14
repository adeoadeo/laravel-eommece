<!DOCTYPE html>
<html>

<head>
  @include('home.css')
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

  )
  <!-- product details start  -->


  <section class="shop_section layout_padding">
    <div class="container">
      <div class="heading_container heading_center">
        <h2>
          Latest Products
        </h2>
      </div>
      <div class="row">
       
        
          
        
       
        <div class="col-md-12">
          <div class="box">
            <a href="">
              <div class="img-box">
                <img width="600" src="/products/{{ $data->image }}" alt="" >
              </div>
              <div class="detail-box p-2">
                <h6>{{   $data->title }}</h6>
                <h6>
                  Price
                  <span>
                    {{  $data->price }}
                  </span>
                </h6>
                
              </div>
              <div class="detail-box">
                <h6> Category:{{   $data->category}}</h6>
                <h6>
                  Available Quantity:
                  <span>
                    {{  $data->quantity }}
                  </span>
                </h6>
                
              </div>
              
              <div class="detail-box">
                
                  <p> {{  $data->description }}</p> 
                  
                
              </div>
            </a>
          </div>
        </div>
        
      
  </section>





  <!-- product details end -->

 

  <!-- end contact section -->

    <!-- info section -->
    @include('home.info')
<!-- end info section -->
  
    <!-- footer section -->
    @include('home.footer')
   <!--End footer section -->

</body>

</html>