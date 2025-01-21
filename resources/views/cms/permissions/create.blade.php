{{ Form::open(['route' => 'permissions.store', 'method' => 'POST']) }}
<div class="modal-header">
    <h4 class="modal-title">Add Permission</h4>
    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
        <span aria-hidden="true">&times;</span>
    </button>
</div>
<div class="modal-body">
    <div class="row">
        <div class="col-md-12 form-group">
            <label for="">Select Module</label>
            {!! Form::select('module_id', $modules ?? [],  null, ['class' => 'form-control', 'required']) !!}
        </div>
        <div class="col-md-12 form-group">
            <label for="">Name</label>
            {!! Form::text('name', null, ['class' => 'form-control', 'required']) !!}
        </div>
    </div>
</div>
<div class="modal-footer justify-content-between">
    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
    <button type="submit" class="btn btn-primary">Save</button>
</div>
{{ Form::close() }}
