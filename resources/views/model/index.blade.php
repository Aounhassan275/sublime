@extends('layout.index')
@section('title')
    Models
@endsection
@section('content')
<!-- /Model Table Start -->
<div class="card">
    <div class="card-header header-elements-inline">
        <h5 class="card-title">Manage Models</h5>
        <div class="header-elements">
            <div class="list-icons">
                <button data-toggle="modal"  data-target="#create_modal" class="btn btn-success float-right create-btn" type="button">Create New Model</button>
                <a class="list-icons-item" data-action="collapse"></a>
                <a class="list-icons-item" data-action="remove"></a>
            </div>
        </div>
    </div>
    <table class="table datatable-save-state">
        <thead>
            <tr>
                <th>#</th>
                <th>Model Name</th>
                <th>Brand Name</th>
                <th>Total Items</th>
                <th>Action</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach (App\Models\Category::all() as $key => $model)
            <tr>
                <td>{{$key+1}}</td>
                <td>{{$model->name}}</td>
                <td>{{$model->brand->name}}</td>
                <td>{{$model->items->count()}}</td>
                <td>
                    <button data-toggle="modal" data-target="#edit_modal" name="{{$model->name}}" brand="{{$model->brand_id}}"
                    id="{{$model->id}}" class="edit-btn btn btn-primary">Edit</button>
                </td>
                <td>
                    <button data-toggle="modal" id="{{$model->id}}" data-target="#delete_modal"
                        class="btn btn-danger delete-btn"> Delete</button>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
<!-- /Model Table End -->
<!-- /Model Create Model Start -->
<div id="create_modal" class="modal fade">
    <div class="modal-dialog">
        <form id="createForm" method="post" enctype="multipart/form-data">
            @csrf
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title mt-0" id="myModalLabel">Create Model</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                </div>
                <div class="modal-body">
                    <div class="form-group">
                        <label>Enter Model Name</label>
                        <input type="text" name="name" class="form-control" placeholder="Enter Model Name" required>
                    </div>    
                    <div class="form-group ">
                        <label>Select Brand</label>
                        <select data-placeholder="Brand 'as'"  name="brand_id"  class="form-control select-minimum" data-fouc required>
                            <option></option>
                            <optgroup label="Top Brands">
                                @foreach(App\Models\Brand::all() as $brand)
                                <option value="{{$brand->id}}">{{$brand->name}}</option>
                                @endforeach
                            </optgroup>
                        </select>   

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
<!-- /Model Create Model End -->
<!-- /Model Edit Model Start -->
<div id="edit_modal" class="modal fade">
    <div class="modal-dialog">
        <form id="updateForm" method="POST" enctype="multipart/form-data">
            @method('PUT')
            @csrf
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title mt-0" id="myModalLabel">Update Category</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                </div>
                <div class="modal-body">
                    <div class="form-group">
                        <label for="name">Model Name</label>
                        <input class="form-control" type="text" id="name" name="name" required>
                    </div>
                    <div class="form-group ">
                        <label>Select Brand</label>
                        <select data-placeholder="Brand 'as'"  name="brand_id" id="brand" class="form-control select-minimum" data-fouc required>
                            <option></option>
                            <optgroup label="Top Brands">
                                @foreach(App\Models\Brand::all() as $brand)
                                <option value="{{$brand->id}}">{{$brand->name}}</option>
                                @endforeach
                            </optgroup>
                        </select>   

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
<!-- /Model Edit Model End -->
<!-- /Model Delete Model Start -->
<div id="delete_modal" class="modal fade">
    <div class="modal-dialog">
        <form id="deleteForm" method="POST" enctype="multipart/form-data">
            @csrf
            @method('DELETE') 
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title mt-0" id="myModalLabel">Are You Sure to Delete this Model?</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                </div>
                <div class="modal-body">
                    <h6 class="font-weight-semibold">Important Note:</h6>
                    <p>If You Delete this model then the Items related to this Brand delete automatically.</p>
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
<!-- /Model Delete Model End -->
@endsection
@section('scripts')
<!-- /Model Create Script Start -->
@include('model.partials.create')
<!-- /Model Create Script End -->
<!-- /Model Edit Script Start -->
@include('model.partials.edit')

<!-- /Model Edit Script End -->
<!-- /Model Delete Script Start -->
@include('model.partials.delete')

<!-- /Model Delete Script End -->
@endsection