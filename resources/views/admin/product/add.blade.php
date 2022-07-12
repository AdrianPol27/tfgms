@extends('layouts.admin', ['active' => 'products'])

@section('content')
<div id="content" class="content-wrapper p-3">
  	<button id="sidebarCollapse" type="button" class="btn bg-color-3 rounded-pill shadow-sm px-4 mb-4">
        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="#fff" class="bi bi-list" viewBox="0 0 16 16">
            <path fill-rule="evenodd" d="M2.5 12a.5.5 0 0 1 .5-.5h10a.5.5 0 0 1 0 1H3a.5.5 0 0 1-.5-.5zm0-4a.5.5 0 0 1 .5-.5h10a.5.5 0 0 1 0 1H3a.5.5 0 0 1-.5-.5zm0-4a.5.5 0 0 1 .5-.5h10a.5.5 0 0 1 0 1H3a.5.5 0 0 1-.5-.5z"/>
        </svg>
    </button>
  	
    <div class="col-lg-12">
        <h2 class="text-center">Product</h2>
        <a href="{{ route('product.index') }}" class="btn btn-primary mb-4">
            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-arrow-left" viewBox="0 0 16 16">
                <path fill-rule="evenodd" d="M15 8a.5.5 0 0 0-.5-.5H2.707l3.147-3.146a.5.5 0 1 0-.708-.708l-4 4a.5.5 0 0 0 0 .708l4 4a.5.5 0 0 0 .708-.708L2.707 8.5H14.5A.5.5 0 0 0 15 8z"/>
            </svg> Back
        </a>
        
        <div class="card">
            <div class="card-header">
                <h5 class="title m-0">{{ __('Add Product') }}</h5>
            </div>
            <div class="card-body">
            <form action="{{ route('product.addSubmit') }}" method="POST" enctype="multipart/form-data">
                @csrf

                <!-- Input File Start -->
                <input type="file" name="image" class="form-control mt-2">
                <!-- Input File End -->

                <div class="form-floating mt-2">
                    <input type="text" id="product_name" name="product_name" class="form-control">
                    <label for="product_name">Product Name</label>
                </div>
                <div class="form-floating mt-2">
                    <input type="number" id="price" name="price" class="form-control">
                    <label for="price">Price</label>
                </div>

                <!-- File Description Start -->
                <textarea name="product_description" id="product_description" class="form-control my-2" style="height: 100px; resize: none;" placeholder="Description"></textarea>
                <!-- File Description End -->

                <button class="btn btn-primary w-100" type="submit">Submit</button>
            </form>
        </div>
        </div>
    </div>

@endsection