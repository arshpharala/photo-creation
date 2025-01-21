@extends('cms.layouts.master')
@section('content')

 <!-- Content Wrapper. Contains page content -->
 <div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <div class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1 class="m-0 text-dark">Blogs</h1>
        </div><!-- /.col -->
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="{{route('dashboard')}}">Dashboard</a></li>
            <li class="breadcrumb-item active">Blogs</li>
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
        <div class="col-md-12">
        <!-- left column -->
        <div class="card card-primary card-outline">
          <div class="card-header">
            <div class="card-title col-sm-12">
             Blog List
              <!-- <div class="popular">
              Popular
              
            </div> -->
                <br>
                <!-- <div class="onoffswitch">
                  <input type="checkbox" name="popular" class="onoffswitch-checkbox" id="myonoffswitch" tabindex="0">
                  <label class="onoffswitch-label" for="myonoffswitch">
                      <span class="onoffswitch-inner"></span>
                      <span class="onoffswitch-switch"></span>
                  </label>
              </div> -->
                
            </div>  
          </div>
            <!-- /.card-header -->
            <div class="card-body">
              <span class="message" id="success_type"></span>
              <table id="example1">
                <thead>
                <tr>
                  <th>Name</th>
                  <!-- <th>Date</th> -->
            
                  <th>
                  
                    Actions
            
                </th>
                </tr>
                </thead>
                <tbody>
                
                    @foreach ($data as $item)
                    <tr>
                    <td>{{$item->title}}</td>
                    <!-- <td>{{$item->post_date}}</td> -->
              
                    <td>
                 
                    <a href="{{route('editBlog',['blog'=>$item->id])}}" class="fa fa-edit"></a>
                
                    <a href="#" onclick="" class="fa fa-trash" style="color: red"></a>
                   
                  </td>
                </tr>
                    @endforeach
                  
                
                </tfoot>
              </table>
            
              <a id="add" href="{{route('createBlog')}}" class="btn btn-success" style="">Add new Record</a>
       
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
      success = $('#success_type');
        $(document).ready(function(){
          
           var table= $('#example1').DataTable({
              "columns": [
                        { "name": "Name" },
                        { "name": "Date", searching:false },
                        { "name": "Popular", "sorting":false, searching:false },
                        { "name": "Actions", "sorting":false, searching:false }
              ]                    
            });
            $('tbody').on('click','.popularArticle',function(){
              var id=$(this).val();
              var checked=$(this).attr('checked');
              var that = this;
              $.ajax({
                url:'',
                data:{articleId:id,checked:checked},
                type:'post',
                headers: {
                'X-CSRF-TOKEN': $("meta[name='token']").attr('content')
            },
            success: function(data) {
              if(data=='removed'){
                $(that).attr('checked',false);
              }
              else{
                $(that).attr("checked", true);
              }
                    success.fadeIn('slow', function(){

                        toastr.success('successfully '+data);
                        success.delay(3000).fadeOut(); 
                        location.reload();
                    });
                }
            
              });
            });
            $('#myonoffswitch').on('change',function(){
         
      
         if($(this).is(':checked')){
             $.fn.dataTable.ext.search.push(
                 function(settings, data, dataIndex) {  

  return data[2] 
     }
         )
              }
              else {
$.fn.dataTable.ext.search.pop()
}
table.draw()
     });
        });
    </script>
@endsection