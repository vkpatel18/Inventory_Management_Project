
<div class="header bg-gradient-primary pb-8 pt-5 pt-md-8">
    <div class="container-fluid">
        <div class="header-body">
            <!-- Card stats -->
            <div class="row">
                <div class="col-xl-3 col-lg-6">
                    <div class="card card-stats mb-4 mb-xl-0">
                        <div class="card-body">
                            <div class="row">
                                <div class="col">
                                    <h5 class="card-title text-uppercase text-muted mb-0">Products</h5>
                                    @if(isset($productCount))
                                        <span class="h2 font-weight-bold mb-0">{{ $productCount }}</span>
                                    @else
                                        <span class="h2 font-weight-bold mb-0">Product count not available</span>
                                    @endif
                                </div>
                                <div class="col-auto">
                                    <div class="icon icon-shape bg-danger text-white rounded-circle shadow">
                                        <i class="fas fa-shopping-cart"></i>
                                    </div>
                                </div>
                            </div>
                            <p class="mt-3 mb-0 text-muted text-sm">
                                <span class="text-success mr-2"><i class="fa fa-arrow-up"></i> 3.48%</span>
                                <span class="text-nowrap">Since last month</span>
                            </p>
                        </div>
                    </div>
                </div>
                <div class="col-xl-3 col-lg-6">
                    <div class="card card-stats mb-4 mb-xl-0">
                        <div class="card-body">
                            <div class="row">
                                <div class="col">
                                    <h5 class="card-title text-uppercase text-muted mb-0">Taxes</h5>
                                    @if(isset($taxCount))
                                        <span class="h2 font-weight-bold mb-0">{{ $taxCount }}</span>
                                    @else
                                        <span class="h2 font-weight-bold mb-0">Tax count not available</span>
                                    @endif
                                </div>
                                <div class="col-auto">
                                    <div class="icon icon-shape bg-warning text-white rounded-circle shadow">
                                        <i class="fas fa-file-invoice"></i>
                                    </div>
                                </div>
                            </div>
                            <p class="mt-3 mb-0 text-muted text-sm">
                                <span class="text-danger mr-2"><i class="fas fa-arrow-down"></i> 3.48%</span>
                                <span class="text-nowrap">Since last week</span>
                            </p>
                        </div>
                    </div>
                </div>
                <div class="col-xl-3 col-lg-6">
                    <div class="card card-stats mb-4 mb-xl-0">
                        <div class="card-body">
                            <div class="row">
                                <div class="col">
                                    <h5 class="card-title text-uppercase text-muted mb-0">Units</h5>
                                    @if(isset($unitCount))
                                        <span class="h2 font-weight-bold mb-0">{{ $unitCount }}</span>
                                    @else
                                        <span class="h2 font-weight-bold mb-0">Unit count not available</span>
                                    @endif
                                </div>
                                <div class="col-auto">
                                    <div class="icon icon-shape bg-yellow text-white rounded-circle shadow">
                                        <i class="fas fa-money-bill"></i>
                                    </div>

                                </div>
                            </div>
                            <p class="mt-3 mb-0 text-muted text-sm">
                                <span class="text-warning mr-2"><i class="fas fa-arrow-down"></i> 1.10%</span>
                                <span class="text-nowrap">Since yesterday</span>
                            </p>
                        </div>
                    </div>
                </div>
                <div class="col-xl-3 col-lg-6">
                    <div class="card card-stats mb-4 mb-xl-0">
                        <div class="card-body">
                            <div class="row">
                                <div class="col">
                                    <h5 class="card-title text-uppercase text-muted mb-0">Stock Report</h5>
                                    @if(isset($stockCount))
                                        <span class="h2 font-weight-bold mb-0">{{ $stockCount }}</span>
                                    @else
                                        <span class="h2 font-weight-bold mb-0">Stock count not available</span>
                                    @endif
                                </div>


                                <div class="col-auto">
                                    <div class="icon icon-shape bg-info text-white rounded-circle shadow">
                                        <i class="fas fa-chart-bar"></i>
                                    </div>
                                </div>
                            </div>
                            <p class="mt-3 mb-0 text-muted text-sm">
                                <span class="text-success mr-2"><i class="fas fa-arrow-up"></i> 12%</span>
                                <span class="text-nowrap">Since last month</span>
                            </p>
                        </div>
                    </div>
                </div>

                <div class="col-xl-3 col-lg-6" style="margin-top: 28px;">
                    <div class="card card-stats mb-4 mb-xl-0">
                        <div class="card-body">
                            <div class="row">
                                <div class="col">
                                    <h5 class="card-title text-uppercase text-muted mb-0">Suppliers</h5>
                                    @if(isset($supplierCount))
                                        <span class="h2 font-weight-bold mb-0">{{ $supplierCount }}</span>
                                    @else
                                        <span class="h2 font-weight-bold mb-0">Suppliers count not available</span>
                                    @endif
                                </div>

                                <div class="col-auto">
                                    <div class="icon icon-shape" style="background-color: #ff69b4; color: white; border-radius: 50%; padding: 10px; box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);">
                                        <i class="fas fa-truck"></i>
                                    </div>
                                </div>
                                
                            </div>
                            <p class="mt-3 mb-0 text-muted text-sm">
                                <span class="text-success mr-2"><i class="fas fa-arrow-up"></i> 12%</span>
                                <span class="text-nowrap">Since last month</span>
                            </p>
                        </div>
                    </div>
                </div>
                
                <div class="col-xl-3 col-lg-6" style="margin-top: 28px;">
                    <div class="card card-stats mb-4 mb-xl-0">
                        <div class="card-body">
                            <div class="row">
                                <div class="col">
                                    <h5 class="card-title text-uppercase text-muted mb-0">Purchases</h5>
                                    @if(isset($supplierCount))
                                        <span class="h2 font-weight-bold mb-0">{{ $supplierCount }}</span>
                                    @else
                                        <span class="h2 font-weight-bold mb-0">Purchases count not available</span>
                                    @endif
                                </div>

                                <div class="col-auto">
                                    <div class="icon icon-shape" style="background-color: #8a2be2; color: white; border-radius: 50%; padding: 10px; box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);">
                                        <i class="fas fa-shopping-bag fa-2x"></i>
                                    </div>
                                </div>
                                
                            </div>
                            <p class="mt-3 mb-0 text-muted text-sm">
                                <span class="text-success mr-2"><i class="fas fa-arrow-up"></i> 12%</span>
                                <span class="text-nowrap">Since last month</span>
                            </p>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
</div>