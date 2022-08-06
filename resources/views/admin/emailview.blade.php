<!DOCTYPE html>
<html lang="en">
<head>
    <style type="text/css">
        label
        {
            display: inline-block;
            width: 200px;
        }

    </style>
    <base href="/public">
@include('admin.css')
</head>
  <body>
    <div class="container-scroller">
      <div class="row p-0 m-0 proBanner" id="proBanner">
        <div class="col-md-12 p-0 m-0">
          <div class="card-body card-body-padding d-flex align-items-center justify-content-between">
            <div class="ps-lg-1">
              <div class="d-flex align-items-center justify-content-between">
                <p class="mb-0 font-weight-medium me-3 buy-now-text">Free 24/7 customer support, updates, and more with this template!</p>
                <a href="https://www.bootstrapdash.com/product/corona-free/?utm_source=organic&utm_medium=banner&utm_campaign=buynow_demo" target="_blank" class="btn me-2 buy-now-btn border-0">Get Pro</a>
              </div>
            </div>
            <div class="d-flex align-items-center justify-content-between">
              <a href="https://www.bootstrapdash.com/product/corona-free/"><i class="mdi mdi-home me-3 text-white"></i></a>
              <button id="bannerClose" class="btn border-0 p-0">
                <i class="mdi mdi-close text-white me-0"></i>
              </button>
            </div>
          </div>
        </div>
      </div>
      <!-- partial:partials/_sidebar.html -->
      @include('admin.sidebar')
      <!-- partial -->
      <div class="container-fluid page-body-wrapper">
        <!-- partial:partials/_navbar.html -->
        @include('admin.navbar')
        <!-- partial -->
        <div class="container-fluid page-body-wrapper">
            
            <div class="container" align="center" style="padding-top: 100px;">
              @if(session()->has('message'))

                  <div class="alert alert-success">
                  {{session()->get('message')}}
                      <button type="button" class="close" data-dismiss="alert">
                          x
                      </button>
                      
                  </div>

              @endif
                <form action="{{url('sendmail',$data->id)}}" method="post" enctype="multipart/form-data">
                    @csrf
                    <div style="padding-top: 15px;">
                        <label for=""> Greeting</label>
                        <input type="text" name="greeting" style="color:black;" placeholder="Write the greeting" required>
                    </div>
                    <div style="padding-top: 15px;">
                        <label for=""> Body </label>
                        <input type="text" name="body" style="color:black;" placeholder="Write the body" required>
                    </div>
                    <div style="padding-top: 15px;">
                        <label for=""> Action Part</label>
                        <input type="text" name="actionpart" style="color:black;" placeholder="Write the actionpart" required>
                    </div>
                    <div style="padding-top: 15px;">
                        <label for=""> Action URL</label>
                        <input type="text" name="actionurl" style="color:black;" placeholder="Write the actionurl" required>
                    </div>
                    <div style="padding-top: 15px;">
                        <label for=""> End Part</label>
                        <input type="text" name="endpart" style="color:black;" placeholder="Write the endpart" required>
                    </div>
                    
                    
                    <div style="padding-top: 15px;">
                        
                        <input type="submit" class="btn btn-success" >
                    </div>
                </form>

            </div> 
        </div>
 
         
        <!-- main-panel ends -->
      </div>
      <!-- page-body-wrapper ends -->
    </div>
    <!-- container-scroller -->
    <!-- plugins:js -->
   @include('admin.script')
  </body>
</html>

