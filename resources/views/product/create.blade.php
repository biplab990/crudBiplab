@extends('app')
@section('content')
<!-- Basic Layout -->
<div class="col-xxl">
    <div class="card mb-4">
        <div class="card-header d-flex align-items-center justify-content-between">
            <h5 class="mb-0">Create Product</h5>
            <small class="text-muted float-end">Default label</small>
        </div>
        <div class="card-body">
            <form method="post" enctype="multipart/form-data" action="{{ route('product.store') }}">
                @csrf
                <div class="row mb-3">
                    <label class="col-sm-2 col-form-label" for="category">Category Name</label>
                    <div class="col-sm-10">
                        <select class="form-control" name="category" id="category">
                         <option value="">select Category</option>
                         @forelse ($categories as $cat)
                         <option value="{{$cat->id}}" {{ old('category')==$cat->id?"selected":"" }} > {{$cat->category}} </option>                       
                         @empty
                             <option value="">No Category found</option>
                         @endforelse
                        </select>
                    </div>
                </div>
                <div class="row mb-3">
                    <label class="col-sm-2 col-form-label" for="productName">Name</label>
                    <div class="col-sm-10">
                        <input type="text" value="{{old('productName')}}" class="form-control" id="productName" name="productName"/>
                    </div>
                </div>
                <div class="row mb-3">
                    <label class="col-sm-2 col-form-label" for="description">Description</label>
                    <div class="col-sm-10">
                        <textarea class="form-control" id="description" name="description">{{old('description')}}</textarea>
                    </div>
                </div>
                <div class="row mb-3">
                    <label class="col-sm-2 col-form-label" for="price">Price</label>
                    <div class="col-sm-10">
                        <input type="text" value="{{old('price')}}" class="form-control" id="price" name="price"/>
                    </div>
                </div>
                <div class="row mb-3">
                    <label class="col-sm-2 col-form-label" for="image">Image</label>
                    <div class="col-sm-10">
                        <input type="file" class="form-control" id="image" name="image"/>
                        @if($errors->has('image'))
                        <span class="text-danger">{{$errors->first('image')}}</span>
                        @endif
                    </div>
                </div>
                <div class="row justify-content-end">
                    <div class="col-sm-10">
                        <button type="submit" class="btn btn-primary">save</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
<!-- Basic layout end -->
