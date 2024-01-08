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
                        <form method="post" action="{{ route('suppliers.update', [$supplier->id]) }}" autocomplete="off" enctype="multipart/form-data">
                            @csrf
                            @method('put')
                            <h6 class="heading-small" style="text-align:center; color: blue;">{{ __('Edit Supplier') }}</h6>
                            
                            @if (session('status'))
                                <div class="alert alert-success alert-dismissible fade show" role="alert">
                                    {{ session('status') }}
                                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                            @endif


                            <div class="pl-lg-4">
                                <div class="form-group{{ $errors->has('first_name') ? ' has-danger' : '' }}">
                                    <label class="form-control-label" for="input-name">{{ __('First Name') }}</label>
                                    <input type="text" name="first_name" value="{{ $supplier->first_name }}" id="input-name" class="form-control form-control-alternative{{ $errors->has('first_name') ? ' is-invalid' : '' }}" placeholder="{{ __('First Name') }}" required>

                                    @if ($errors->has('first_name'))
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $errors->first('first_name') }}</strong>
                                        </span>
                                    @endif
                                </div>

                                <div class="form-group{{ $errors->has('last_name') ? ' has-danger' : '' }}">
                                    <label class="form-control-label" for="input-name">{{ __('Last Name') }}</label>
                                    <input type="text" name="last_name" value="{{ $supplier->last_name }}" id="input-name" class="form-control form-control-alternative{{ $errors->has('last_name') ? ' is-invalid' : '' }}" placeholder="{{ __('Last Name') }}" required>

                                    @if ($errors->has('last_name'))
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $errors->first('last_name') }}</strong>
                                        </span>
                                    @endif
                                </div>

                                <div class="form-group{{ $errors->has('company_name') ? ' has-danger' : '' }}">
                                    <label class="form-control-label" for="input-name">{{ __('Company Name') }}</label>
                                    <input type="text" name="company_name" value="{{ $supplier->company_name }}" id="input-name" class="form-control form-control-alternative{{ $errors->has('company_name') ? ' is-invalid' : '' }}" placeholder="{{ __('Company Name') }}" required>

                                    @if ($errors->has('company_name'))
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $errors->first('company_name') }}</strong>
                                        </span>
                                    @endif
                                </div>

                                <div class="form-group{{ $errors->has('gst_number') ? ' has-danger' : '' }}">
                                    <label class="form-control-label" for="input-name">{{ __('GST Number') }}</label>
                                    <input type="text" name="gst_number" value="{{ $supplier->gst_number }}" id="input-name" class="form-control form-control-alternative{{ $errors->has('gst_number') ? ' is-invalid' : '' }}" placeholder="{{ __('GST Number') }}" required>

                                    @if ($errors->has('gst_number'))
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $errors->first('gst_number') }}</strong>
                                        </span>
                                    @endif
                                </div>

                                <div class="form-group{{ $errors->has('pan_number') ? ' has-danger' : '' }}">
                                    <label class="form-control-label" for="input-name">{{ __('Pan Card Number') }}</label>
                                    <input type="text" name="pan_number" value="{{ $supplier->pan_number }}" id="input-name" class="form-control form-control-alternative{{ $errors->has('pan_number') ? ' is-invalid' : '' }}" placeholder="{{ __('Pan Card Number') }}" required>

                                    @if ($errors->has('pan_number'))
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $errors->first('pan_number') }}</strong>
                                        </span>
                                    @endif
                                </div>

                                <div class="form-group{{ $errors->has('address') ? ' has-danger' : '' }}">
                                    <label class="form-control-label" for="input-name">{{ __('Address') }}</label>
                                    <input type="text" name="address" value="{{ $supplier->address }}" id="input-name" class="form-control form-control-alternative{{ $errors->has('address') ? ' is-invalid' : '' }}" placeholder="{{ __('Address') }}" required>

                                    @if ($errors->has('address'))
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $errors->first('address') }}</strong>
                                        </span>
                                    @endif
                                </div>

                                <div class="form-group{{ $errors->has('credit_line') ? ' has-danger' : '' }}">
                                    <label class="form-control-label" for="input-name">{{ __('Credit Line') }}</label>
                                    <input type="text" name="credit_line" value="{{ $supplier->credit_line }}" id="input-name" class="form-control form-control-alternative{{ $errors->has('credit_line') ? ' is-invalid' : '' }}" placeholder="{{ __('Credit Line') }}" required>

                                    @if ($errors->has('credit_line'))
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $errors->first('credit_line') }}</strong>
                                        </span>
                                    @endif
                                </div>

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

@push('js')
    <script src="{{ asset('argon') }}/vendor/chart.js/dist/Chart.min.js"></script>
    <script src="{{ asset('argon') }}/vendor/chart.js/dist/Chart.extension.js"></script>
@endpush
