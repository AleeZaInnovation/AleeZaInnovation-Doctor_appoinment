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
        
            <div align="center" style="padding:70px;">
                @if(session()->has('message'))

                    <div class="alert alert-success">
                        {{session()->get('message')}}
                        <button type="button" class="close" data-dismiss="alert">
                            x
                        </button>
                        
                    </div>

                @endif

                <table>
                    <tr style="background-color: black;">
                        <th style="padding:10px; font-size: 20px; color:white;">
                        Customer Name
                        </th>
                        <th style="padding:10px; font-size: 20px; color:white;">
                        Email
                        </th>
                        <th style="padding:10px; font-size: 20px; color:white;">
                        Phone
                        </th>
                        <th style="padding:10px; font-size: 20px; color:white;">
                        Doctor Name
                        </th>
                        <th style="padding:10px; font-size: 20px; color:white;">
                        Date
                        </th>
                        <th style="padding:10px; font-size: 20px; color:white;">
                        Message
                        </th>
                        <th style="padding:10px; font-size: 20px; color:white;">
                        Status
                        </th>
                        <th style="padding:10px; font-size: 20px; color:white;">
                        Approved
                        </th>
                        <th style="padding:10px; font-size: 20px; color:white;">
                        Canceled
                        </th>
                        <th style="padding:10px; font-size: 20px; color:white;">
                        Send Mail
                        </th>
                    </tr>
                    @foreach($data as $item)
                        <tr style="background-color: skyblue;" align="center">
                        <td style="padding:10px; color:white;">{{$item->name}}</td>
                        <td style="padding:10px; color:white;">{{$item->email}}</td>
                        <td style="padding:10px; color:white;">{{$item->phone}}</td>
                        <td style="padding:10px; color:white;">{{$item->doctor}}</td>
                        <td style="padding:10px; color:white;">{{$item->date}}</td>
                        <td style="padding:10px; color:white;">{{$item->message}}</td>
                        <td style="padding:10px; color:white;">{{$item->status}}</td>
                        <td ><a class="bt btn-success" onclick="return confirm('Are you sure approve appointment')"
                        href="{{url('approve',$item->id)}}"> Approved</a></td>
                        <td ><a class="bt btn-danger"
                        href="{{url('cancell',$item->id)}}"> Cancelled</a></td>
                        <td ><a class="bt btn-primary"
                        href="{{url('emailview',$item->id)}}"> Send Mail</a></td>
                    </tr>
                    @endforeach
                </table>

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

