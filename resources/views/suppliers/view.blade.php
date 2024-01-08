@extends('layouts.app')

@section('content')
    @include('layouts.headers.cards')

  <!-- Main content -->
  <div class="main-content" id="panel">
    <!-- Page content -->
    <div class="container-fluid mt--6">
      <div class="row">
        <div class="col">
          <div class="card">
            <!-- Card header -->
            <div class="card">
                <div class="card-header border-0 d-flex justify-content-between align-items-center">
                    
                    <h3 class="mb-0">suppliers</h3>
                    <form action="" method="get" class="navbar-search navbar-search-dark form-inline ml-0 d-none d-md-flex custom-search-form">
                        <div class="form-group mb-0">
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

                    @if (session('status') && session('alert-type') == 'success')
                      <div style="width: 800px; margin: 0 auto; margin-left: 147px;" class="alert alert-success alert-dismissible fade show" role="alert">
                          {{ session('status') }}
                          <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                              <span aria-hidden="true">&times;</span>
                          </button>
                      </div>
                    @endif

                    @if (session('status') && session('alert-type') == 'info')
                      <div style="width: 800px; margin: 0 auto; margin-left: 147px;" class="alert alert-info alert-dismissible fade show" role="alert">
                          {{ session('status') }}
                          <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                              <span aria-hidden="true">&times;</span>
                          </button>
                      </div>
                    @endif

                    @if (session('status') && session('alert-type') == 'danger')
                      <div style="width: 800px; margin: 0 auto; margin-left: 147px;" class="alert alert-danger alert-dismissible fade show" role="alert">
                          {{ session('status') }}
                          <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                              <span aria-hidden="true">&times;</span>
                          </button>
                      </div>
                    @endif

                  

                    <div class="col-lg-6 col-5 text-right">
                        <a href="{{ route('suppliers.create') }}" class="btn btn-sm btn-neutral mr-2">Add Supplier</a>
                    </div>
                </div>
            </div>

            <!-- Light table -->
            <div class="table-responsive">
              <table class="table align-items-center table-flush">          
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">First Name</th>
                        <th scope="col">Last Name</th>
                        <th scope="col">Company Name</th>
                        <th scope="col">GST Number</th>
                        <th scope="col">Pan Card Number</th>
                        <th scope="col">Address</th>
                        <th scope="col">Credit Line</th>
                        <th scope="col">Action</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($suppliers as $key => $supplier)
                        <tr>
                            <th scope="row">{{ ++$key }}</th>
                            <td>{{ $supplier->first_name }}</td>
                            <td>{{ $supplier->last_name }}</td>
                            <td>{{ $supplier->company_name }}</td>
                            <td>{{ $supplier->gst_number }}</td>
                            <td>{{ $supplier->pan_number }}</td>
                            <td>{{ $supplier->address }}</td>
                            <td>{{ $supplier->credit_line }}</td>
                            <td>
                              <div class="btn-group" role="group">
                                  <a href="{{ route('suppliers.edit', $supplier->id) }}" class="btn btn-primary btn-sm mr-1" title="Edit">
                                      <i class="fas fa-edit"></i> Edit
                                  </a>
                                 
                                  <form class="delete-form d-inline" action="{{ route('suppliers.destroy', $supplier->id) }}" method="post">
                                    @csrf
                                    @method('DELETE')

                                    <!-- Delete Button -->
                                    <button type="button" class="btn btn-danger btn-sm" title="Delete" data-toggle="modal" data-target="#deleteConfirmationModal{{ $supplier->id }}">
                                        <i class="fas fa-trash-alt"></i> Delete
                                    </button>

                                    <!-- Modal -->
                                    <div class="modal fade" id="deleteConfirmationModal{{ $supplier->id }}" tabindex="-1" role="dialog" aria-labelledby="deleteConfirmationModalLabel" aria-hidden="true">
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
                    @empty
                        <tr>
                            <td colspan="4" class="text-center">No records found</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
          </div>

        
          <div class="card-footer py-4">
    <nav aria-label="...">
        <ul class="pagination justify-content-end mb-0">

            {{-- Previous Page --}}
            @if ($suppliers->onFirstPage())
                <li class="page-item disabled">
                    <span class="page-link" tabindex="-1" aria-disabled="true">
                        <i class="fas fa-angle-left"></i>
                        <span class="sr-only">Previous</span>
                    </span>
                </li>
            @else
                <li class="page-item">
                    <a class="page-link" href="{{ $suppliers->previousPageUrl() }}">
                        <i class="fas fa-angle-left"></i>
                        <span class="sr-only">Previous</span>
                    </a>
                </li>
            @endif

            {{-- Page Numbers --}}
            @foreach ($suppliers->getUrlRange(1, $suppliers->lastPage()) as $page => $url)
                <li class="page-item {{ $page == $suppliers->currentPage() ? 'active' : '' }}">
                    <a class="page-link" href="{{ $url }}">
                        {{ $page }}
                        @if ($page == $suppliers->currentPage()) <span class="sr-only">(current)</span> @endif
                    </a>
                </li>
            @endforeach

            {{-- Next Page --}}
            @if ($suppliers->hasMorePages())
                <li class="page-item">
                    <a class="page-link" href="{{ $suppliers->nextPageUrl() }}">
                        <i class="fas fa-angle-right"></i>
                        <span class="sr-only">Next</span>
                    </a>
                </li>
            @else
                <li class="page-item disabled">
                    <span class="page-link" aria-disabled="true">
                        <i class="fas fa-angle-right"></i>
                        <span class="sr-only">Next</span>
                    </span>
                </li>
            @endif

        </ul>
    </nav>
</div>
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