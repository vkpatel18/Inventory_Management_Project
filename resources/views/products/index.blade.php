@extends('layouts.app')

@section('content')
    @include('layouts.headers.cards' , ['productCount' => $productCount])

      <!-- Main content -->
<div class="main-content" id="panel">
    <!-- Page content -->
    <div class="container-fluid mt-1">
      <div class="row" style="margin-top: -76px">
        <div class="col">
          <div class="card">
            <!-- Card header -->
            <div class="card-header border-0">
    <div class="row align-items-center">
        <div class="col">

              @if (session('status') && session('alert-type') == 'success')
      <div class="alert alert-success alert-dismissible fade show" role="alert">
          {{ session('status') }}
          <button type="button" class="close" data-dismiss="alert" aria-label="Close">
              <span aria-hidden="true">&times;</span>
          </button>
      </div>
  @endif

              @if (session('status') && session('alert-type') == 'info')
      <div class="alert alert-info alert-dismissible fade show" role="alert">
          {{ session('status') }}
          <button type="button" class="close" data-dismiss="alert" aria-label="Close">
              <span aria-hidden="true">&times;</span>
          </button>
      </div>
  @endif

          @if (session('status') && session('alert-type') == 'danger')
      <div class="alert alert-danger alert-dismissible fade show" role="alert">
          {{ session('status') }}
          <button type="button" class="close" data-dismiss="alert" aria-label="Close">
              <span aria-hidden="true">&times;</span>
          </button>
      </div>
  @endif

  <h3 class="mb-0">Products</h3>


  
</div>
<form action="" method="get" class="navbar-search navbar-search-dark form-inline ml-0 d-none d-md-flex custom-search-form">
  <div class="form-group mb-0" style="margin-right: 104px;">
      <div class="input-group input-group-alternative">
          <div class="input-group-prepend">
              <span class="input-group-text bg-dark text-white"><i class="fas fa-search"></i></span>
          </div>
          <input class="form-control border-0" id="searchInput" name="search" placeholder="Search" type="search" style="background-color: #343a40; color: #ffffff;">

          <!-- Add the purple design button -->
          <div class="input-group-append">
              <button class="btn btn-purple" type="submit" id="searchButton" style="background-color : rgb(117,101,228); color:#ffffff">
                  Search
              </button>
          </div>
      </div>
  </div>
</form>
<div id="searchResults"></div>

          <div class="col-lg-6 col-5 text-right">
        
            <a href="{{ route('products.create') }}" class="btn btn-sm btn-neutral mr-2">Add Product</a>

          </div>
      </div>
  </div>
            <!-- Light table -->
            <div class="table-responsive">
              <table class="table align-items-center table-flush">
                <thead class="thead-light">
                  <tr class="custom-table">
                    <th scope="col" class="sort" data-sort="name">Id</th>
                    <th scope="col" class="sort" data-sort="name">Name</th>
                    <th scope="col" class="sort" data-sort="name">SKU</th>
                    <th scope="col" class="sort" data-sort="budget">Description</th>
                    <th scope="col" class="sort" data-sort="status">Product Purchase Rate</th>
                    <th scope="col" class="sort" data-sort="completion">Tax</th>
                    <th scope="col" class="sort" data-sort="completion">Unit</th>
                    <th scope="col" class="sort" data-sort="completion">HSN Code</th>
                    <th scope="col" class="sort" data-sort="completion">Type</th>
                    <th scope="col" class="sort" data-sort="completion">Image</th>
                    <th scope="col" class="sort" data-sort="completion">Action</th>
                  </tr>
                </thead>
                <tbody class="list">
                  @if(count($products) > 0)
                  @foreach ($products as $key => $product)

                    <tr>
                      <td scope="row">
                        <div class="media align-items-center">
                      
                          <div class="media-body">
                            <span class="name mb-0 text-sm">{{ ++$key }}</span>
                          </div>
                        </div>
                      </td>

                      <td scope="row">
                        <div class="media align-items-center">
                      
                          <div class="media-body">
                            <span class="name mb-0 text-sm">{{ $product->name }}</span>
                          </div>
                        </div>
                        <div class="media align-items-center">
                      </td>

                      <td scope="row">
                        <div class="media align-items-center">
                      
                          <div class="media-body">
                            <span class="name mb-0 text-sm">{{ $product->sku }}</span>
                          </div>
                        </div>
                        <div class="media align-items-center">
                      </td>
                      
                         
                      <td class="budget">
                        {{$product->description}}
                      </td>
                      <td>
                        <span class="status">{{ $product->product_purchase_rate }}</span>
                      </td>
                      <td>
                        <div class="avatar-group">
                          <span>{{ optional($product->tax)->name }}</span>                         
                        </div>
                      </td>
                      <td>
                        <div class="d-flex align-items-center">
                          <span class="completion mr-2">{{ optional($product->unit)->name }}</span>
                          
                        </div>
                      </td>
                     
                      <td>
                        <div class="barcode-container">
                            <span class="barcode">{{ $product->hsn_code }}</span>
                        </div>
                    </td>

                      <td>
                        <div class="barcode-container">
                            <span class="barcode">{{ $product->type }}</span>
                        </div>
                    </td>

                      <td>
                        <div class="barcode-container">
                        <img src="{{ storage_path('app/public/products/2Z38QaSckjMdiu9w9TRfCaVxwlpPPnoIcIOncTe7.jpg') }}" alt="Product Image" height="50" width="50">
                        </div>
                    </td>

                    <td>
                    <div class="action-buttons">
                      <a href="{{ route('products.edit', $product->id) }}" class="btn btn-primary btn-sm" title="Edit">
                          <i class="fas fa-edit"></i> Edit
                      </a>

                      <form class="delete-form d-inline" action="{{ route('products.destroy', $product->id) }}" method="post">
                        @csrf
                        @method('DELETE')

                        <!-- Delete Button -->
                        <button type="button" class="btn btn-danger btn-sm" title="Delete" data-toggle="modal" data-target="#deleteConfirmationModal{{ $product->id }}">
                            <i class="fas fa-trash-alt"></i> Delete
                        </button>

                        <!-- Modal -->
                        <div class="modal fade" id="deleteConfirmationModal{{ $product->id }}" tabindex="-1" role="dialog" aria-labelledby="deleteConfirmationModalLabel" aria-hidden="true">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                    <div class="modal-header bg-danger text-white">
                                        <h5 class="modal-title" id="deleteConfirmationModalLabel">Confirm Deletion</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <div class="modal-body">
                                        Are you sure you want to delete this record?
                                    </div>
                                    <div class="modal-footer">
                                        <!-- Cancel Button -->
                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>

                                        <!-- Delete Button -->
                                        <button type="submit" class="btn btn-danger">Delete</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                      </form>

              </div>
            </td>
          </tr>
        @endforeach
        @else
          <tr>
              <td colspan="9" class="text-center">No records found</td>
          </tr>
        @endif
      </tbody>
    </table>
</div>

    <!-- Card footer -->
    <div class="card-footer py-4">
        <nav aria-label="...">
            <ul class="pagination justify-content-end mb-0">
                @if($products->onFirstPage())
                    <li class="page-item disabled">
                        <a class="page-link" href="#" tabindex="-1">
                            <i class="fas fa-angle-left"></i>
                            <span class="sr-only">Previous</span>
                        </a>
                    </li>
                @else
                    <li class="page-item">
                        <a class="page-link" href="{{ $products->previousPageUrl() }}" tabindex="-1">
                            <i class="fas fa-angle-left"></i>
                            <span class="sr-only">Previous</span>
                        </a>
                    </li>
                @endif

                @foreach($products->getUrlRange(1, $products->lastPage()) as $page => $url)
                    <li class="page-item {{ $page == $products->currentPage() ? 'active' : '' }}">
                        <a class="page-link" href="{{ $url }}">{{ $page }} @if($page == $products->currentPage()) <span class="sr-only">(current)</span> @endif</a>
                    </li>
                @endforeach

                @if($products->hasMorePages())
                    <li class="page-item">
                        <a class="page-link" href="{{ $products->nextPageUrl() }}">
                            <i class="fas fa-angle-right"></i>
                            <span class="sr-only">Next</span>
                        </a>
                    </li>
                @else
                    <li class="page-item disabled">
                        <a class="page-link" href="#">
                            <i class="fas fa-angle-right"></i>
                            <span class="sr-only">Next</span>
                        </a>
                    </li>
                @endif
            </ul>
        </nav>
      </div>
    </div>
  </div>
</div>
@include('layouts.footers.auth')
@endsection

@push('js')
    <script src="{{ asset('argon') }}/vendor/chart.js/dist/Chart.min.js"></script>
    <script src="{{ asset('argon') }}/vendor/chart.js/dist/Chart.extension.js"></script>
@endpush



