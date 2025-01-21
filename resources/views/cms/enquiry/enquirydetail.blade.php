@extends('cms.layouts.master')
@section('content')



 <!-- Content Wrapper. Contains page content -->
 <div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <div class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1 class="m-0 text-dark">Enquiry Detail</h1>
        </div><!-- /.col -->
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="{{route('dashboard')}}">Dashboard</a></li>
            <li class="breadcrumb-item"><a href="{{route('enquiryList')}}">Enquiry</a></li>
            <li class="breadcrumb-item active">Detail</li>
          </ol>
        </div><!-- /.col -->
      </div><!-- /.row -->
    </div><!-- /.container-fluid -->
  </div>
  <!-- /.content-header -->

  <!-- Main content -->
  <section class="content">
    <div class="container-fluid">
      <!-- Small boxes (Stat box) -->
      <div class="row">
        <!-- left column -->
        <div class="col-md-12">
           
         
            <div class="card card-primary card-outline">
                <div class="card-header">
                    <div class="card-title">
                    Enquiry Detail
                    </div>
                </div>
                <div class="card-body">
                <div class="table-responsive">
              <table id="example1">
                
                <tbody>
                    <tr>
                    <th>Name</th>
                    
                    <td>{{$enquiry->name}}</td>
                 
                    </tr>
                   
                    <tr>
                            <tr>
                                    <th>Email</th>
                                <td>{{$enquiry->email}}</td>
                                </tr>
                                <tr>
                                        <tr>
                                                <th>Phone</th>
                                            <td>{{$enquiry->phone}}</td>
                                            </tr>
                                         
                            <tr>
                                    <th>Address</th>
                                <td>{{$enquiry->address}}</td>
                                </tr>
                              <tr>
                                    <th>Message</th>
                                <td>{{$enquiry->message}}</td>
                                </tr>
                     
                    </tr>     
                    
                </tbody>  
                
                
              </table>
            </div>

            </div>
            <!-- /.card-body -->
          </div>
          <!-- /.card --> 
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->

    </div><!-- /.container-fluid -->
  </section>
  <!-- /.content -->
</div>
<!-- /.content-wrapper -->

@endsection
