@extends('app')
@section('siteTitle','List Category')
@section('content')
<!-- Basic Bootstrap Table -->
<div class="card">
    <h5 class="card-header">Category List</h5>
    <div class="table-responsive text-nowrap">
        <table class="table">
            <thead>
                <tr>
                <th>#SL</th>
                <th>Name</th>
                <th>Image</th>
                <th>Actions</th>
                </tr>
            </thead>
            <tbody class="table-border-bottom-0">
                @forelse ($categories as $cat)
                <tr>
                    <td><i class="fab fa-angular fa-lg text-danger me-3"></i> <strong>{{ ++$loop->index }}</strong></td>
                    <td>{{ $cat->category }}</td>
                    <td><img width="50px" src="{{ asset('uploads/category/'.$cat->image) }}"></td>
                    <td><span class="badge bg-label-primary me-1"><a href="{{ route('category.edit',$cat->id) }}"><i class="fas fa-edit"></i></a>
                        <a href="javascript:void()" onclick="$('#form{{ $cat->id }}').submit()"><i class="fas fa-trash"></i></a></span>
                        <form id="form{{ $cat->id }}" action="{{ route('category.destroy',$cat->id) }}" method="post">
                            @csrf
                            @method('delete')
                        </form>
                    </td>
                </tr>

                @empty
                <tr>
                    <th colspan="4">No Category Found</th>
                </tr>

                @endforelse

            </tbody>
        </table>
    </div>
</div>
<!--/ Basic Bootstrap Table -->

@endsection
