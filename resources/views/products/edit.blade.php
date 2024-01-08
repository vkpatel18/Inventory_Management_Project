@extends('layouts.app', ['title' => __('User Profile')])
@section('content')
    <div class="container-fluid mt--7">
        <div class="row">
           
            <div class="col-xl-8 order-xl-1">
                <div class="card bg-secondary shadow">
                    <div class="card-header bg-white border-0">
                        <div class="row align-items-center">
                            <h3 class="mb-0">{{ __('Edit Profile') }}</h3>
                        </div>
                    </div>
                    <div class="card-body">
                        <form method="post" action="{{ route('products.update', [$product->id]) }}" autocomplete="off" enctype="multipart/form-data">
                            @csrf
                            @method('put')
                            <h6 class="heading-small" style="text-align:center; color: blue;">{{ __('Edit Product') }}</h6>

                            
                            @if (session('status'))
                                <div class="alert alert-success alert-dismissible fade show" role="alert">
                                    {{ session('status') }}
                                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                            @endif


                            <div class="pl-lg-4">   
                                <div class="form-group{{ $errors->has('name') ? ' has-danger' : '' }}">
                                    <label class="form-control-label" for="input-name">{{ __('Name') }}</label>
                                    <input type="text" name="name" id="input-name" class="form-control form-control-alternative{{ $errors->has('name') ? ' is-invalid' : '' }}" placeholder="{{ __('Name') }}" value="{{ $product->name }}" autofocus required>

                                    @if ($errors->has('name'))
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $errors->first('name') }}</strong>
                                        </span>
                                    @endif
                                </div>

                                <div class="form-group{{ $errors->has('name') ? ' has-danger' : '' }}">
                                    <label class="form-control-label" for="input-name">{{ __('SKU') }}</label>
                                    <input type="text" name="sku" value="{{ $product->sku }}" id="input-name" class="form-control form-control-alternative{{ $errors->has('name') ? ' is-invalid' : '' }}" placeholder="{{ __('SKU') }}" required>

                                    @if ($errors->has('sku'))
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $errors->first('sku') }}</strong>
                                        </span>
                                    @endif
                                </div>

                                <div class="form-group{{ $errors->has('description') ? ' has-danger' : '' }}">
                                    <label class="form-control-label" for="input-description">{{ __('Description') }}</label>
                                    <input type="text" name="description" id="input-description" class="form-control form-control-alternative{{ $errors->has('description') ? ' is-invalid' : '' }}" placeholder="{{ __('Description') }}" value="{{ $product->description }}" required>

                                    @if ($errors->has('description'))
                                        <span class="invalid-feedback" role="alert" required>
                                            <strong>{{ $errors->first('description') }}</strong>
                                        </span>
                                    @endif
                                </div>

                                <div class="form-group{{ $errors->has('product_purchase_rate') ? ' has-danger' : '' }}">
                                    <label class="form-control-label" for="input-product_purchase_rate">{{ __('Product Purchase Rate') }}</label>
                                    <input type="text" name="product_purchase_rate" id="input-product_purchase_rate" class="form-control form-control-alternative{{ $errors->has('product_purchase_rate') ? ' is-invalid' : '' }}" placeholder="{{ __('Product Purchase Rate') }}" value="{{ $product->product_purchase_rate }}" required>

                                    @if ($errors->has('product_purchase_rate'))
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $errors->first('product_purchase_rate') }}</strong>
                                        </span>
                                    @endif
                                </div>

                                <div class="form-group{{ $errors->has('name') ? ' has-danger' : '' }}">
                                    <label class="form-control-label" for="input-name">{{ __('Tax') }}</label>
                                    <input type="text" name="tax" value="{{ $product->tax }}" id="input-name" class="form-control form-control-alternative{{ $errors->has('name') ? ' is-invalid' : '' }}" placeholder="{{ __('Name') }}" required>

                                    @if ($errors->has('tax'))
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $errors->first('tax') }}</strong>
                                        </span>
                                    @endif
                                </div>



                                <div class="form-group{{ $errors->has('email') ? ' has-danger' : '' }}">
                                    <label class="form-control-label" for="input-email">{{ __('Unit') }}</label>
                                    <input type="text" name="unit" id="input-email"  class="form-control form-control-alternative{{ $errors->has('email') ? ' is-invalid' : '' }}" value="{{ $product->unit }}"  placeholder="{{ __('Unit') }}" required>

                                    @if ($errors->has('unit'))
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $errors->first('unit') }}</strong>
                                        </span>
                                    @endif
                                </div>

                                <div class="form-group{{ $errors->has('hsn_code') ? ' has-danger' : '' }}">
                                <label class="form-control-label" for="input-email">{{ __('HSN Code') }}</label>
                                <input type="text" name="hsn_code" id="input-email" value="{{ $product->hsn_code }}" class="form-control form-control-alternative{{ $errors->has('hsn_code') ? ' is-invalid' : '' }}" placeholder="{{ __('HSN Code') }}" required>
                            </div>


                                    @if ($errors->has('hsn_code'))
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $errors->first('hsn_code') }}</strong>
                                        </span>
                                    @endif
                                </div>

                                <div class="form-group">
                                    <label class="form-control-label" style="margin-left: 27px;" for="input-type">{{ __('Type: ') }}</label>

                                    <div class="custom-control custom-radio custom-control-inline{{ $errors->has('type') ? ' has-danger' : '' }}">
                                        <input type="radio" id="input-barcode" name="type" class="custom-control-input{{ $errors->has('type') ? ' is-invalid' : '' }}" required value="barcode" {{ $product->type === 'barcode' ? 'checked' : '' }}>
                                        <label class="custom-control-label" for="input-barcode">Barcode</label>
                                    </div>

                                    <div class="custom-control custom-radio custom-control-inline{{ $errors->has('type') ? ' has-danger' : '' }}">
                                        <input type="radio" id="input-non-barcode" name="type" class="custom-control-input{{ $errors->has('type') ? ' is-invalid' : '' }}" value="non-barcode" {{ $product->type === 'non-barcode' ? 'checked' : '' }}>
                                        <label class="custom-control-label" for="input-non-barcode">Non-Barcode</label>
                                    </div>

                                    @error('type')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>


                            <div class="form-group{{ $errors->has('image') ? ' has-danger' : '' }}" style="margin-left: 27px;">
                                <label class="form-control-label" for="image">{{ __('Image') }}</label>
                                <input type="file" name="image" id="input-product-image" class="form-control form-control-alternative{{ $errors->has('image') ? ' is-invalid' : '' }}">
                                
                                @if ($errors->has('image'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('image') }}</strong>
                                    </span>
                                @endif
                            </div>

                            <img src="{{ asset('storage/' . $product->image) }}" alt="Product Image" height="50" width="50">  

                                <div class="text-center">
                                    <button type="submit" class="btn btn-success mt-4">{{ __('Update') }}</button>
                                </div>
                            </div>
                        </form>
                       
                    </div>
                </div>
            </div>
        </div>
        
        @include('layouts.footers.auth')
    </div>
@endsection
