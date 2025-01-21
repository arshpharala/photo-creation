@extends('cms.layouts.master')
@section('content')
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Dashboard</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="{{route('dashboard')}}">Dashboard</a></li>
              <li class="breadcrumb-item active">Enquiry</li>
            </ol>
          </div>
        </div>
      <!-- /.container-fluid -->

                <!-- /.card-header -->
                
                <div class="col-xs-12 col-sm-12 col-md-12">
                    <div class="card card-primary card-outline">
                        <div class="card-header">
                            <div class="card-title">
                            Enquiry List
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive" style="background-color: white">
                                <table class="table table-hover">
                            <thead>
                                <tr>
                                    <th>Date</th>
                                    <th>Name</th>
                                    <th>Detail</th>
        
                                  
                                </tr>        
                            </thead>
                            <tbody>
                                   
                                 
                                @php
                                $i = ($enquiries->perPage() * $enquiries->currentPage()) - ($enquiries->perPage() - 1);
                                @endphp

                             @foreach($enquiries as  $index => $enquiry)
                             <tr>
                                 <td> {{ $enquiry->created_at->format('d-m-Y')}}</td>
                                 <td>{{$enquiry->name}}</td>
                            
                               
                                  <td><a href="{{ route('enquirydetail',['id'=>$enquiry->id]) }}" class="btn btn-primary" onclick="">Detail</a></td> 
                             </tr>
                             @endforeach
                             
                         </tbody>
                        </table>
 </div>
</div>
<div class="box-footer clear-fix small-pagination">

{{ $enquiries->links() }}
   </div>
</div>

</section>
</div>
 @endsection

 @section('footer')
<script>
    $('.select').select2();
    </script>
@endsection
