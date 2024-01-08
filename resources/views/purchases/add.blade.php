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
                        <form method="post" action="{{ route('purchases.store') }}" autocomplete="off" enctype="multipart/form-data">
                            @csrf
                            <h6 class="heading-small" style="text-align:center; color: blue;">{{ __('Add Purchase') }}</h6>
                            
                            @if (session('status'))
                                <div class="alert alert-success alert-dismissible fade show" role="alert">
                                    {{ session('status') }}
                                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                            @endif


                            <div class="pl-lg-4">
                                <div class="form-group">
                                    <label for="product_id">Product:</label>
                                    <select name="product_id" id="product_id" class="form-control">
                                        <option value="">-- Select Product --</option>
                                        @foreach($products as $productId => $productName)
                                            <option value="{{ $productId }}">{{ $productName }}</option>
                                        @endforeach
                                    </select>
                                </div>

                                <div class="form-group">
                                    <label for="category_id">Category:</label>
                                    <select name="category_id" id="category_id" class="form-control">
                                        <option value="">-- Select Category --</option>
                                        @foreach($categories as $categoryId => $categoryName)
                                            <option value="{{ $categoryId }}">{{ $categoryName }}</option>
                                        @endforeach
                                    </select>
                                </div>

                                <div class="form-group">
                                    <label for="supplier_id">Supplier:</label>
                                    <select name="supplier_id" id="supplier_id" class="form-control">
                                        <option value="">-- Select Supplier --</option>
                                        @foreach($suppliers as $supplierId => $supplierName)
                                            <option value="{{ $supplierId }}">{{ $supplierName }}</option>
                                        @endforeach
                                    </select>
                                </div>

                                <div class="form-group{{ $errors->has('cost_price') ? ' has-danger' : '' }}">
                                    <label class="form-control-label" for="input-name">{{ __('Cost Price') }}</label>
                                    <input type="text" name="cost_price" value="{{ old('cost_price') }}" id="input-name" class="form-control form-control-alternative{{ $errors->has('cost_price') ? ' is-invalid' : '' }}" placeholder="{{ __('Cost Price') }}" required>

                                    @if ($errors->has('cost_price'))
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $errors->first('cost_price') }}</strong>
                                        </span>
                                    @endif
                                </div>

                                <div class="form-group{{ $errors->has('quantity') ? ' has-danger' : '' }}">
                                    <label class="form-control-label" for="input-name">{{ __('Quantity') }}</label>
                                    <input type="text" name="quantity" value="{{ old('quantity') }}" id="input-name" class="form-control form-control-alternative{{ $errors->has('quantity') ? ' is-invalid' : '' }}" placeholder="{{ __('Quantity') }}" required>

                                    @if ($errors->has('quantity'))
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $errors->first('quantity') }}</strong>
                                        </span>
                                    @endif
                                </div>

                                <div class="form-group{{ $errors->has('expiry_date') ? ' has-danger' : '' }}">
                                    <label class="form-control-label" for="input-expiry-date">{{ __('Expiry Date') }}</label>
                                    <input type="date" name="expiry_date" value="{{ old('expiry_date') }}" id="input-expiry-date" class="form-control form-control-alternative{{ $errors->has('expiry_date') ? ' is-invalid' : '' }}" placeholder="{{ __('Expiry Date') }}" required>
                                
                                    @if ($errors->has('expiry_date'))
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $errors->first('expiry_date') }}</strong>
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
