@extends('app')
@section('content')
<!-- Basic Layout -->
<div class="col-xxl">
    <div class="card mb-4">
        <div class="card-header d-flex align-items-center justify-content-between">
            <h5 class="mb-0">Create Category</h5>
            <small class="text-muted float-end">Default label</small>
        </div>
        <div class="card-body">
            <form method="post" enctype="multipart/form-data" action="{{ route('category.update',$category->id) }}">
                @csrf
                @method('put')
                <div class="row mb-3">
                    <label class="col-sm-2 col-form-label" for="name">Category Name</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" value="{{ $category->category }}" id="name" name="category"/>
                    </div>
                </div>
                <div class="row mb-3">
                    <label class="col-sm-2 col-form-label" for="image">Image</label>
                    <div class="col-sm-10">
                        <input type="file" class="form-control" id="image" name="image"/>
                    </div>
                </div>
                <div class="row justify-content-end">
                    <div class="col-sm-10">
                        <button type="submit" class="btn btn-primary">save</button>
                        <img class="float-end" width="100px" src="{{ asset('uploads/category/'.$category->image) }}" alt="">
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
<!-- Basic layout end -->
