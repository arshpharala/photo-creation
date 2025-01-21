@extends('cms.layouts.master')
@section('content')


 <!-- Content Wrapper. Contains page content -->
 <div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <div class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1 class="m-0 text-dark">Page Content Form</h1>
        </div><!-- /.col -->
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="{{route('dashboard')}}">Dashboard</a></li>
            <li class="breadcrumb-item"><a href="{{route('pageDetailList')}}">Page Detail</a></li>
            <li class="breadcrumb-item active">Form</li>
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
            <!-- general form elements -->
            <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title">Page Content Form</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              {{Form::model($pageDetail,['route'=>$submitRoute,"files"=>"true"])}}
                <div class="card-body">

                  <div class="form-group">
                    {{Form::label('page_name','PageName')}}
                    {{Form::text('page_name',null,['class'=>'form-control'])}}
                  </div>

                  <div class="form-group">
                    {{Form::label('section','Section')}}
                    {{Form::text('section',null,['class'=>'form-control '])}}
                  </div>

                  <div class="form-group">
                    {{Form::label('sub_section','Sub Section')}}
                    {{Form::text('sub_section',null,['class'=>'form-control'])}}
                  </div>
                  
                  <div class="form-group">
                    {{Form::label('heading','Heading')}}
                    {{Form::text('heading',null,['class'=>'form-control'])}}
                  </div>
                  <label for="content">Content</label>
                  <button  id="change">summernote</button>
                  <div id="content" class="form-group">
                    <br>
                    {{Form::textarea('content',null,['id'=>'contentData','class'=>'form-control', 'placeholder'=>'Write content here..'])}}
                  </div>
                  <div id="summernote" class="form-group" style="display: none">
                    <br>
                    {{Form::textarea('content',null,['id'=>'summernoteData','disabled'=>'disabled', 'class'=>'form-control summernote'])}}
                  </div>
                  <div class="form-group">
                    {{Form::label('page_tag_line','Page Tag Line')}}
                    {{Form::text('page_tag_line',null,['class'=>'form-control'])}}
                  </div>

                  <div class="form-group">
                    {{Form::label('image','Image')}}
                    {{Form::file('image')}}
                    <img id="pImage" src="{{ $pageDetail->getImagePath() }}" class=" pad" height="70px" width="70px"/>
                    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                    <a class="fa fa-trash" id="removeimage" onclick="removeImage()" style="color: red"></a>
                    <a class="fas fa-undo" id="undoremoveimage" onclick="undoImage()" style="color: red"></a>
                    {{Form::hidden('removeimagetxt',null,array_merge(['id'=>'removeimagetxt','class' => 'form-control']))}}
                    <br/>
                  </div>

                  <div class="form-group">
                    {{Form::label('image_alt','Image Alt')}}
                    {{Form::text('image_alt',null,['class'=>'form-control'])}}
                  </div>

                  <div class="form-group">
                    {{Form::label('icon','Icon')}}
                    {{Form::file('icon')}}
                    @if(!empty($pageDetail->icon))
                    <img id="pIcon" src="{{ $pageDetail->getIconPath() }}" class=" pad" height="70px" width="70px"/>
                    @endif
                    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                    <a class="fa fa-trash" id="removeicon" onclick="removeIcon()" style="color: red"></a>
                    <a class="fas fa-undo" id="undoremoveicon" onclick="undoIcon()" style="color: red"></a>
                    {{Form::hidden('removeicontxt',null,array_merge(['id'=>'removeicontxt','class' => 'form-control']))}}
                    <br/>
                  </div>
                  
                  <div class="form-group">
                    {{Form::label('icon_alt','Icon Alt')}}
                    {{Form::text('icon_alt',null,['class'=>'form-control'])}}
                  </div>
                  
                </div>
                <!-- /.card-body -->

                <div class="card-footer">
                  <button type="submit" class="btn btn-primary">Submit</button>
                </div>
                {{Form::close()}}
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
        $(document).ready(function() {
          var summernote=JSON.parse('{{$summernote}}');
          if(summernote!=null){
            if(summernote==true){
              $('#change').text('textarea');
              $('#summernote').css({'display' : ''});
              $("#summernoteData").removeAttr('disabled');
              $('#content').css({'display' : 'none'});
              $("#contentData").attr('disabled','disabled');
            }
            else{
              $('#change').text('summernote');
              $('#content').css({'display' : ''});
              $('#summernote').css({'display' : 'none'});
              $("#summernoteData").attr('disabled','disabled');
              $("#contentData").removeAttr('disabled');
            }
          }
            $('#undoremoveimage').hide();
                @if($pageDetail['image'] == null)
                $('#removeimage').hide();
                @endif

                $('#undoremoveicon').hide();
                @if($pageDetail['icon'] == null)
                $('#removeicon').hide();
                @endif
          $('#change').click(function(e){
            e.preventDefault();
            if ($('#summernote').css('display') == 'none')
            {
              $('#change').text('textarea');
              $('#summernote').css({'display' : ''});
              $("#summernoteData").removeAttr('disabled');
              $('#content').css({'display' : 'none'});
              $("#contentData").attr('disabled','disabled');
            }
            else{
              $('#change').text('summernote');
              $('#content').css({'display' : ''});
              $('#summernote').css({'display' : 'none'});
              $("#summernoteData").attr('disabled','disabled');
              $("#contentData").removeAttr('disabled');
            }
          });
        });
        function removeImage()
            {
                $('#removeimagetxt').val('removed');
                $('#pImage').attr('src','/images/no-image.png');
                $('#removeimage').hide();
                $('#undoremoveimage').show();
            }
            function undoImage()
            {
                $('#removeimagetxt').val(null);
                $('#pImage').attr('src','{{$pageDetail->getImagePath()}}');
                $('#removeimage').show();
                $('#undoremoveimage').hide();
            }

            function removeIcon()
            {
                $('#removeicontxt').val('removed');
                $('#pIcon').attr('src','/images/no-image.png');
                $('#removeicon').hide();
                $('#undoremoveicon').show();
            }
            function undoIcon()
            {
                $('#removeicontxt').val(null);
                $('#pIcon').attr('src','{{$pageDetail->getIconPath()}}');
                $('#removeicon').show();
                $('#undoremoveicon').hide();
            }

    </script>
@endsection
