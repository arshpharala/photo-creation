@extends('cms.layouts.master')
@section('content')



 <!-- Content Wrapper. Contains page content -->
 <div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <div class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1 class="m-0 text-dark">Banner</h1>
        </div><!-- /.col -->
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="{{route('dashboard')}}">Dashboard</a></li>
            <li class="breadcrumb-item active">Banner</li>
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
                              Banner List
                    </div>
                </div>
                <div class="card-body">
              <table id="example1">
                <thead>
                <tr>
                  <th>Heading</th>
                  <th>Reference</th>
                  <th>     
                    Actions     
                </th>

                </tr>
                </thead>
                <tbody>
                
                    @foreach ($banners as $banner)
                    <tr>
                    <td>{{$banner->heading}}</td>
                    <td>{{$banner->reference}}</td>
                    <td>
                
                      <a href="{{ route('updateBanner',['banner'=>$banner->id]) }}" class="fa fa-edit"></a>
                   
                      <a href=""onclick="deleteItem('{{ route('deleteBanner',['banner'=>$banner->id])}}')" class="fa fa-trash" style="color: red"></a>
                   
                    </td>
                </tr>
                    @endforeach
                  
                
                </tfoot>
              </table>
          
              <a id="add" href="{{ route('createBanner')}}" class="btn btn-success" style="">Add new Record</a>
             
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
@section('footer')
    <script>
        $(document).ready(function(){
            $('#example1').DataTable({
              "columns":[
              {'name':'Heading'},
              {'name':'Reference'},
              {'name':'Actions','sorting':false,searching:false}
              ]
            });
            $('#add').hover(function(){
                $(this).removeClass('btn-success');
                $(this).addClass('btn-primary');
            },function(){
                $(this).removeClass('btn-primary');
                $(this).addClass('btn-success');
            });
        });
        
    </script>
@endsection