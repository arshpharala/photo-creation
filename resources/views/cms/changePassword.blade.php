@extends('cms.layouts.master')
@section('content')


 <!-- Content Wrapper. Contains page content -->
 <div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <div class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1 class="m-0 text-dark">Form</h1>
        </div><!-- /.col -->
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="{{route('dashboard')}}">Dashboard</a></li>
              <li class="breadcrumb-item active">Change Password</li>
          </ol>
      </div>
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
            <!-- general form elements -->
            <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title">Change Password</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              {{Form::open(['route'=>'changepasswordRoute'])}}
              <div class="card-body">
                @csrf
                <div class="form-group">
                  {{Form::label('currentPassword','Current Password:')}}
                  <div class="input-group">
                    <div class="input-group-prepend">
                      <span class="input-group-text"><i class="fas fa-key"></i></span>
                    </div>
                    {{Form::password('currentPassword',['class'=>'form-control'])}}
                  </div>
                  <!-- /.input group -->
                </div>
                <!-- /.form group -->

                
                <div class="form-group">
                  {{Form::label('newPassword','New Password:')}}
                  <div class="input-group">
                    <div class="input-group-prepend">
                      <span class="input-group-text"><i class="fas fa-key"></i></span>
                    </div>
                    {{Form::password('newPassword',['class'=>'form-control'])}}
                  </div>
                  <!-- /.input group -->
                </div>
                <!-- /.form group -->

                
                <div class="form-group">
                  {{Form::label('confirmPassword','Confirm Password')}}
                  <div class="input-group">
                    <div class="input-group-prepend">
                      <span class="input-group-text"><i class="fas fa-key"></i></span>
                    </div>
                    {{Form::password('confirmPassword',['class'=>'form-control'])}}
                  </div>
                  <!-- /.input group -->
                </div>
                
                <!-- /.form group -->
                </div>
                <div class="card-footer">
                  <button type="submit" class="btn btn-primary">Submit</button>
                </div>
                
            </div>
            <!-- /.card -->
            {{Form::close()}}
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
