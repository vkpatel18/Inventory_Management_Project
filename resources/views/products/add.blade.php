@extends('layouts.app')

@section('content')
    @include('layouts.headers.cards')
    <div class="container-fluid mt--7">
        <div class="row">
           
            <div class="col-xl-8 order-xl-1">
                <div class="card bg-secondary shadow">
                    <div class="card-header bg-white border-0">
                        
                    </div>
                    <div class="card-body">
                        <form method="post" action="{{ route('products.store') }}" autocomplete="off" enctype="multipart/form-data">
                            @csrf
                            <h6 class="heading-small" style="text-align:center; color: blue;">{{ __('Add Product') }}</h6>
                            
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
                                    <input type="text" name="name" value="{{ old('name') }}" id="input-name" class="form-control form-control-alternative{{ $errors->has('name') ? ' is-invalid' : '' }}" placeholder="{{ __('Name') }}" required>

                                    @if ($errors->has('name'))
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $errors->first('name') }}</strong>
                                        </span>
                                    @endif
                                </div>

                                <div class="form-group{{ $errors->has('name') ? ' has-danger' : '' }}">
                                    <label class="form-control-label" for="input-name">{{ __('SKU') }}</label>
                                    <input type="text" name="sku" value="{{ old('name') }}" id="input-name" class="form-control form-control-alternative{{ $errors->has('name') ? ' is-invalid' : '' }}" placeholder="{{ __('SKU') }}" required>

                                    @if ($errors->has('sku'))
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $errors->first('sku') }}</strong>
                                        </span>
                                    @endif
                                </div>

                                <div class="form-group{{ $errors->has('description') ? ' has-danger' : '' }}">
                                    <label class="form-control-label" for="input-description">{{ __('Description') }}</label>
                                    <textarea name="description" id="input-description" class="form-control form-control-alternative{{ $errors->has('description') ? ' is-invalid' : '' }}" placeholder="{{ __('Description') }}" required>{{ old('description') }}</textarea>

                                    @if ($errors->has('description'))
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $errors->first('description') }}</strong>
                                        </span>
                                    @endif
                                </div>

                                <div class="form-group{{ $errors->has('product_purchase_rate') ? ' has-danger' : '' }}">
                                    <label class="form-control-label" for="input-product_purchase_rate">{{ __('Product Purchase Rate') }}</label>
                                    <input type="number" name="product_purchase_rate" value="{{ old('product_purchase_rate') }}" id="input-product_purchase_rate" class="form-control form-control-alternative{{ $errors->has('product_purchase_rate') ? ' is-invalid' : '' }}" placeholder="{{ __('Product Purchase Rate') }}" required>

                                    @if ($errors->has('product_purchase_rate'))
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $errors->first('product_purchase_rate') }}</strong>
                                        </span>
                                    @endif
                                </div>

                                <div class="form-group">
                                    <label for="tax_id">Select Tax:</label>
                                    <select class="form-control" name="tax_id" id="tax_id">
                                        <option value="">Select Tax</option>
                                        @foreach ($taxes as $tax)
                                            <option value="{{ $tax->id }}">{{ $tax->name }}</option>
                                        @endforeach
                                    </select>
                                </div>

                                <div class="form-group">
                                    <label for="unit_id">Select Unit:</label>
                                    <select class="form-control" name="unit_id" id="unit_id">
                                        <option value="">Select Unit</option>
                                        @foreach ($units as $unit)
                                            <option value="{{ $unit->id }}">{{ $unit->name }}</option>
                                        @endforeach
                                    </select>
                                </div>


                                <div class="form-group{{ $errors->has('hsn_code') ? ' has-danger' : '' }}">
                                    <label class="form-control-label" for="input-email">{{ __('HSN Code') }}</label>
                                    <input type="text" name="hsn_code" id="input-email" class="form-control form-control-alternative{{ $errors->has('hsn_code') ? ' is-invalid' : '' }}" placeholder="{{ __('HSN Code') }}" required>
                                    @if ($errors->has('hsn_code'))
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $errors->first('hsn_code') }}</strong>
                                        </span>
                                    @endif
                                </div>

                                <div class="form-group">
                                <label class="form-control-label" style="margin-left: 27px;" for="input-type">{{ __('Type: ') }}</label>

                                <div class="custom-control custom-radio custom-control-inline{{ $errors->has('type') ? ' has-danger' : '' }}">
                                    <input type="radio" id="input-barcode" name="type" class="custom-control-input{{ $errors->has('type') ? ' is-invalid' : '' }}" value="barcode" required>
                                    <label class="custom-control-label" for="input-barcode">Barcode</label>
                                </div>

                                <div class="custom-control custom-radio custom-control-inline{{ $errors->has('type') ? ' has-danger' : '' }}">
                                    <input type="radio" id="input-non-barcode" name="type" class="custom-control-input{{ $errors->has('type') ? ' is-invalid' : '' }}" value="non-barcode">
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
                                <input type="file" name="image" id="input-product-image" class="form-control form-control-alternative{{ $errors->has('image') ? ' is-invalid' : '' }}" accept="image/*" required>
                                
                                @if ($errors->has('image'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('image') }}</strong>
                                    </span>
                                @endif
                            </div>

                                <div class="text-center">
                                    <button type="submit" class="btn btn-success mt-4">{{ __('Save') }}</button>
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

@push('js')
    <script src="{{ asset('argon') }}/vendor/chart.js/dist/Chart.min.js"></script>
    <script src="{{ asset('argon') }}/vendor/chart.js/dist/Chart.extension.js"></script>
@endpush
