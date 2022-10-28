@extends('app')
@section('siteTitle','List Product')
@section('content')
<!-- Basic Bootstrap Table -->
<div class="card">
    <h5 class="card-header">Product List</h5>
    <div class="table-responsive text-nowrap">
        <table class="table">
            <thead>
                <tr>
                <th>#SL</th>
                <th>Name</th>
                <th>Category</th>
                <th>Description</th>
                <th>Price</th>
                <th>Image</th>
                <th>Status</th>
                <th>Actions</th>
                </tr>
            </thead>
            <tbody class="table-border-bottom-0">
                @forelse ($products as $p)
                <tr>
                    <td><i class="fa-lg text-danger me-3"></i> <strong>{{ ++$loop->index }}</strong></td>
                    <td>{{ $p->name }}</td>
                    <td>{{ $p->category?->category }}</td>
                    <td>{{ $p->description }}</td>
                    <td>{{ $p->price }}</td>
                    <td><img width="50px" src="{{ asset('uploads/product/'.$p->image) }}"></td>
                    <td>@if($p->status==1) Active @else Inactive @endif</td>
                    {{-- <td>{{ $p->status==1?"Active":"Inactive" }}</td> --}}
                    <td><span class=""><a href="{{ route('product.edit',$p->id) }}"><i class="fas fa-edit"></i></a>
                        <a href="javascript:void()" onclick="$('#form{{ $p->id }}').submit()"><i class="fas fa-trash"></i></a></span>
                        <form id="form{{ $p->id }}" action="{{ route('product.destroy',$p->id) }}" method="post">
                            @csrf
                            @method('delete')
                        </form>
                    </td>
                </tr>

                @empty
                <tr>
                    <th colspan="4">No Product Found</th>
                </tr>

                @endforelse

            </tbody>
        </table>
        {{ $products->links() }}
    </div>
</div>
<!--/ Basic Bootstrap Table -->

@endsection
