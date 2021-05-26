@extends('layout.index')
@section('title')
    Items
@endsection
@section('styles')
@include('item.partials.style')
@endsection
@section('content')
<!-- /Item Table Start -->
<div class="card">
    <div class="card-header header-elements-inline">
        <h5 class="card-title">Manage Items</h5>
        <div class="header-elements">
            <div class="list-icons">
                <button data-toggle="modal"  data-target="#create_modal" class="btn btn-success float-right create-btn" type="button">Create New Item</button>
                <a class="list-icons-item" data-action="collapse"></a>
                <a class="list-icons-item" data-action="remove"></a>
            </div>
        </div>
    </div>
    <table class="table datatable-button-html5-basic">
        <thead>
            <tr>
                <th>#</th>
                <th>Item Name</th>
                <th>Item Amount</th>
                <th>Brand Name</th>
                <th>Model Name</th>
                <th>Date Added</th>
                <th>Action</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach (App\Models\Item::all() as $key => $item)
            <tr>
                <td>{{$key+1}}</td>
                <td>{{$item->name}}</td>
                <td>{{$item->amount}}</td>
                <td>{{$item->brand->name}}</td>
                <td>{{$item->model->name}}</td>
                <td>{{$item->created_at->format('M d,Y')}}</td>
                <td>
                    <button data-toggle="modal" data-target="#edit_modal" name="{{$item->name}}"
                    id="{{$item->id}}" amount="{{$item->amount}}"  brand="{{$item->brand_id}}" model="{{$item->model_id}}" class="edit-btn btn btn-primary">Edit</button>
                </td>
                <td>
                    <button data-toggle="modal" id="{{$item->id}}" data-target="#delete_modal"
                        class="btn btn-danger delete-btn"> Delete</button>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
<!-- /Item Table End -->
<!-- /Item Create Model Start -->
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
                        <label>Enter Item Name</label>
                        <input type="text" name="name" class="form-control" placeholder="Enter Item Name" required>
                    </div>    
                    <div class="form-group">
                        <label>Enter Item Amount</label>
                        <input type="number" name="amount" class="form-control" placeholder="Enter Item Amount" required>
                    </div>   
                    <div class="form-group ">
                        <label>Select Brand</label>
                        <select data-placeholder="Brand 'as'"  name="brand_id"  class="form-control brand select-minimum" data-fouc required>
                            <option></option>
                            <optgroup label="Top Brands">
                                @foreach(App\Models\Brand::all() as $brand)
                                <option value="{{$brand->id}}">{{$brand->name}}</option>
                                @endforeach
                            </optgroup>
                        </select>   
                    </div>
                    <div class="form-group ">
                        <label>Select Model</label>
                        <select name="model_id"  class="form-control model">
                            <option></option>
                            @foreach(App\Models\Category::all() as $model)
                            <option value="{{$model->id}}">{{$model->name}}</option>
                            @endforeach
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
<!-- /Item Create Model End -->
<!-- /Item Edit Model Start -->
<div id="edit_modal" class="modal fade">
    <div class="modal-dialog">
        <form id="updateForm" method="POST" enctype="multipart/form-data">
            @method('PUT')
            @csrf
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title mt-0" id="myModalLabel">Update Item</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                </div>
                <div class="modal-body">
                    <div class="form-group">
                        <label>Enter Item Name</label>
                        <input type="text" name="name" id="name" class="form-control" placeholder="Enter Item Name" required>
                    </div>    
                    <div class="form-group">
                        <label>Enter Item Amount</label>
                        <input type="number" name="amount" id="amount" class="form-control" placeholder="Enter Item Amount" required>
                    </div>   
                    <div class="form-group ">
                        <label>Select Brand</label>
                        <select data-placeholder="Brand 'as'"  name="brand_id" id="brand"  class="form-control brand select-minimum" data-fouc required>
                            <option></option>
                            <optgroup label="Top Brands">
                                @foreach(App\Models\Brand::all() as $brand)
                                <option value="{{$brand->id}}">{{$brand->name}}</option>
                                @endforeach
                            </optgroup>
                        </select>   
                    </div>
                    <div class="form-group ">
                        <label>Select Model</label>
                        <select name="model_id" id="modalss" class="form-control model">
                            <option></option>
                            @foreach(App\Models\Category::all() as $model)
                            <option value="{{$model->id}}">{{$model->name}}</option>
                            @endforeach
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
<!-- /Item Edit Model End -->
<!-- /Item Delete Model Start -->
<div id="delete_modal" class="modal fade">
    <div class="modal-dialog">
        <form id="deleteForm" method="POST" enctype="multipart/form-data">
            @csrf
            @method('DELETE') 
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title mt-0" id="myModalLabel">Are You Sure to Delete this Item?</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary waves-effect" data-dismiss="modal">No</button>
                    <button type="submit" class="btn btn-primary waves-effect waves-light">Yes</button>
                </div>
            </div>
        </form>
    </div>
</div>
<!-- /Item Delete Model End -->
@endsection
@section('scripts')
<!-- /Item Create Script Start -->
@include('item.partials.create')
<!-- /Item Create Script End -->
<!-- /Item Edit Script Start -->
@include('item.partials.edit')
<!-- /Item Edit Script End -->
<!-- /Item Delete Script Start -->
@include('item.partials.delete')
<!-- /Item Delete Script End -->
<!-- /Script To Get Models Related To Brand Start -->
@include('item.partials.getmodels')
<!-- /Script To Get Models Related To Brand End -->
@endsection