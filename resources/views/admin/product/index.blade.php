@extends('layouts.admin', ['active' => 'products'])

@section('css')
    <link href="//cdn.datatables.net/1.11.5/css/jquery.dataTables.min.css" rel="stylesheet">
@endsection

@section('content')
<div id="content" class="content-wrapper p-3">
  	<button id="sidebarCollapse" type="button" class="btn bg-color-3 rounded-pill shadow-sm px-4 mb-4">
        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="#fff" class="bi bi-list" viewBox="0 0 16 16">
            <path fill-rule="evenodd" d="M2.5 12a.5.5 0 0 1 .5-.5h10a.5.5 0 0 1 0 1H3a.5.5 0 0 1-.5-.5zm0-4a.5.5 0 0 1 .5-.5h10a.5.5 0 0 1 0 1H3a.5.5 0 0 1-.5-.5zm0-4a.5.5 0 0 1 .5-.5h10a.5.5 0 0 1 0 1H3a.5.5 0 0 1-.5-.5z"/>
        </svg>
    </button>

    <div class="col-lg-12">
        <h2 class="text-center">Products</h2><br>
        <a href="{{ route('product.add') }}" class="btn btn-primary mb-4">
            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-plus" viewBox="0 0 16 16">
                <path d="M8 4a.5.5 0 0 1 .5.5v3h3a.5.5 0 0 1 0 1h-3v3a.5.5 0 0 1-1 0v-3h-3a.5.5 0 0 1 0-1h3v-3A.5.5 0 0 1 8 4z"/>
            </svg> Add Products
        </a>

        @if(Session::has('product_added'))
            <div class="alert alert-success mt-2" role="alert">
                {{Session::get('product_added')}}
            </div>
        @endif

        @if(Session::has('product_deleted'))
            <div class="alert alert-danger mt-2" role="alert">
                {{Session::get('product_deleted')}}
            </div>
        @endif

        @if(Session::has('product_updated'))
            <div class="alert alert-success mt-2" role="alert">
                {{Session::get('product_updated')}}
            </div>
        @endif
        
        @if(count($products)==0)
            <div class="alert alert-warning" role="alert">
                {{'No Products Added Yet!'}}
            </div>

            @else
            <div class="table-responsive">
                <table class="table" id="productTable">
                    <thead class=" text-info">
                        <th class="text-center">
                            Product Id
                        </th>
                        <th class="text-center">
                            Product Name
                        </th>
                        <th class="text-center">
                            Description
                        </th>
                        <th class="text-center">
                            Price
                        </th>
                        <th class="text-center">
                            Action
                        </th>
                    </thead>
                    <tbody>
                    @foreach ($products as $product)
                        <tr>
                            <td class="text-center">
                                {{ $product->product_id}}
                            </td>
                            <td class="text-center">
                                {{ $product->product_name }}
                            </td>
                            <td class="text-center">
                                {{ $product->product_description }}
                            </td>
                            <td class="text-center">
                                {{ 'Php ' . number_format($product->price, 2) }}
                            </td>
                            <td class="text-center">
                                <a class="btn btn-sm btn-info" href="/products/view/{{$product->product_id}}">
                                    View
                                </a>
                                <a class="btn btn-sm btn-warning" href="/products/edit/{{$product->product_id}}">
                                     Edit
                                </a>
                                <a class="btn btn-sm btn-danger" href="/products/delete/{{$product->product_id}}">
                                     Delete
                                </a>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        @endif
    </div>
</div>
@endsection

@push('scripts')
    <script src="//cdn.datatables.net/1.11.5/js/jquery.dataTables.min.js"></script>
    <script>
        $(document).ready( function () {
            $('#productTable').DataTable();
        } );
    </script>
@endpush
