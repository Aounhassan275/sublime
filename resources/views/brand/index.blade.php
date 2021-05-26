@extends('layout.index')
@section('title')
    Brands
@endsection
@section('content')
<!-- /Brand Table Start -->
<div class="card">
    <div class="card-header header-elements-inline">
        <h5 class="card-title">Manage Brands</h5>
        <div class="header-elements">
            <div class="list-icons">
                <button data-toggle="modal"  data-target="#create_modal" class="btn btn-success float-right create-btn" type="button">Create New Brand</button>
                <a class="list-icons-item" data-action="collapse"></a>
                <a class="list-icons-item" data-action="remove"></a>
            </div>
        </div>
    </div>
    <table class="table datatable-save-state">
        <thead>
            <tr>
                <th>#</th>
                <th>Brand Name</th>
                <th>Total Models</th>
                <th>Total Items</th>
                <th>Action</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach (App\Models\Brand::all() as $key => $brand)
            <tr>
                <td>{{$key+1}}</td>
                <td>{{$brand->name}}</td>
                <td>{{$brand->models->count()}}</td>                
                <td>{{$brand->items->count()}}</td>                
                <td>
                    <button data-toggle="modal" data-target="#edit_modal" name="{{$brand->name}}"
                    id="{{$brand->id}}" class="edit-btn btn btn-primary">Edit</button>
                </td>
                <td>
                    <button data-toggle="modal" id="{{$brand->id}}" data-target="#delete_modal"
                        class="btn btn-danger delete-btn"> Delete</button>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
<!-- /Brand Table End -->
<!-- /Brand Create Model Start -->
<div id="create_modal" class="modal fade">
    <div class="modal-dialog">
        <form id="createForm" method="post" enctype="multipart/form-data">
            @csrf
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title mt-0" id="myModalLabel">Create Brand</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                </div>
                <div class="modal-body">
                    <div class="form-group">
                        <label>Enter Brand Name</label>
                        <input type="text" name="name" class="form-control" placeholder="Enter Brand Name" required>
                    </div>    
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary waves-effect" data-dismiss="modal">Cancel</button>
                    <button type="submit" class="btn btn-primary waves-effect waves-light">Create</button>
                </div>
            </div>
        </form>
    </div>
</div>
<!-- /Brand Create Model End -->
<!-- /Brand Edit Model Start -->
<div id="edit_modal" class="modal fade">
    <div class="modal-dialog">
        <form id="updateForm" method="POST" enctype="multipart/form-data">
            @method('PUT')
            @csrf
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title mt-0" id="myModalLabel">Update Brand</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                </div>
                <div class="modal-body">
                    <div class="form-group">
                        <label for="name">Brand Name</label>
                        <input class="form-control" type="text" id="name" name="name" required>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary waves-effect" data-dismiss="modal">Cancel</button>
                    <button type="submit" class="btn btn-primary waves-effect waves-light">Update</button>
                </div>
            </div>
        </form>
    </div>
</div>
<!-- /Brand Edit Model End -->
<!-- /Brand Delete Model Start -->
<div id="delete_modal" class="modal fade">
    <div class="modal-dialog">
        <form id="deleteForm" method="POST" enctype="multipart/form-data">
            @csrf
            @method('DELETE') 
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title mt-0" id="myModalLabel">Are You Sure to Delete this Brand?</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                </div>
                <div class="modal-body">
                    <h6 class="font-weight-semibold">Important Note:</h6>
                    <p>If You Delete this brand then the Models and Items related to this Brand delete automatically.</p>
                    <hr>     
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary waves-effect" data-dismiss="modal">No</button>
                    <button type="submit" class="btn btn-primary waves-effect waves-light">Yes</button>
                </div>
            </div>
        </form>
    </div>
</div>
<!-- /Brand Delete Model End -->
@endsection
@section('scripts')
<!-- /Brand Create Script Start -->
@include('brand.partials.create')
<!-- /Brand Create Script End -->
<!-- /Brand Edit Script Start -->
@include('brand.partials.edit')

<!-- /Brand Edit Script End -->
<!-- /Brand Delete Script Start -->

@include('brand.partials.delete')

<!-- /Brand Delete Script End -->

@endsection