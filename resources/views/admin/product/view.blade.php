@extends('layouts.admin', ['active' => 'products'])

@section('content')
<div id="content" class="content-wrapper p-3">
  	<button id="sidebarCollapse" type="button" class="btn bg-color-3 rounded-pill shadow-sm px-4 mb-4">
        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="#fff" class="bi bi-list" viewBox="0 0 16 16">
            <path fill-rule="evenodd" d="M2.5 12a.5.5 0 0 1 .5-.5h10a.5.5 0 0 1 0 1H3a.5.5 0 0 1-.5-.5zm0-4a.5.5 0 0 1 .5-.5h10a.5.5 0 0 1 0 1H3a.5.5 0 0 1-.5-.5zm0-4a.5.5 0 0 1 .5-.5h10a.5.5 0 0 1 0 1H3a.5.5 0 0 1-.5-.5z"/>
        </svg>
    </button>

    <div class="col-lg-12 container">
        <h2 class="text-center">View Product</h2>

        <a href="{{ route('product.index') }}" class="btn btn-primary mb-4">
            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-arrow-left" viewBox="0 0 16 16">
                <path fill-rule="evenodd" d="M15 8a.5.5 0 0 0-.5-.5H2.707l3.147-3.146a.5.5 0 1 0-.708-.708l-4 4a.5.5 0 0 0 0 .708l4 4a.5.5 0 0 0 .708-.708L2.707 8.5H14.5A.5.5 0 0 0 15 8z"/>
            </svg> Back
        </a>
        
        <div class="row">
            <!--<div class="col-lg-6 d-flex justify-content-center">
                <img src="#" class="img-fluid"/>
            </div>-->
            <div class="col-lg-6">
                <div class="card">
                    <div class="card-body">
                        <div class="row" style="margin-top: -15px">
                            <div class="col-12">
                                <div class="form-group">
                                    <strong class="">Product ID:</strong> {{ $product->product_id }}
                                </div>
                                <div class="form-group">
                                    <strong class="">Product Name:</strong> {{ $product->product_name }}
                                </div>
                                <div class="form-group">
                                    <strong class="">Description:</strong> {{ $product->product_description }}
                                </div>
                                <div class="form-group">
                                    <strong class="">Price:</strong> {{ 'Php ' . number_format($product->price, 2) }}
                                </div>
                            </div>
                        </div> 
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection