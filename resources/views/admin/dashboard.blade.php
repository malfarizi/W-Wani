@extends('admin.templateadmin')

@section('title', 'Dashboard Admin')
    
@section('content')


<div class="container-fluid" id="container-wrapper">
          <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Dashboard</h1>
            <ol class="breadcrumb">
              <li class="breadcrumb-item"><a href="./">Home</a></li>
              <li class="breadcrumb-item active" aria-current="page">Dashboard</li>
            </ol>
          </div>
          <div class="card-header">
            @if (session('success'))
            <div class="alert alert-success alert-dismissible" role="alert">
              <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
              <h6><i class="fas fa-check"></i><b> Berhasil!</b></h6>
              {{ session('success') }}
            </div>
            @endif
          </div>
          <div class="row mb-3">
            <!-- Earnings (Monthly) Card Example -->
            <div class="col-xl-3 col-md-6 mb-4">
              <div class="card h-100">
                <div class="card-body">
                  <div class="row align-items-center">
                    <div class="col mr-2">
                      <div class="text-xs font-weight-bold text-uppercase mb-1">Mitra</div>
                      <div class="h5 mb-0 font-weight-bold text-gray-800">{{$trm}}</div>
                      
                    </div>
                    <div class="col-auto">
                      <i class="fas fa-store fa-2x text-primary"></i>
                    </div>
                  </div>
                </div>
              </div>
            </div>


             <div class="col-xl-3 col-md-6 mb-4">
              <div class="card h-100">
                <div class="card-body">
                  <div class="row align-items-center">
                    <div class="col mr-2">
                      <div class="text-xs font-weight-bold text-uppercase mb-1">Calon Mitra</div>
                      <div class="h5 mb-0 font-weight-bold text-gray-800">{{$blm}}</div>
                      
                    </div>
                    <div class="col-auto">
                      <i class="fas fa-store fa-2x text-secondary"></i>
                    </div>
                  </div>
                </div>
              </div>
            </div>

            <div class="col-xl-3 col-md-6 mb-4">
              <div class="card h-100">
                <div class="card-body">
                  <div class="row align-items-center">
                    <div class="col mr-2">
                      <div class="text-xs font-weight-bold text-uppercase mb-1">Total Saldo</div>
                      <div class="h5 mb-0 font-weight-bold text-gray-800">@currency($grand)</div>
                      
                    </div>
                    <div class="col-auto">
                      <i class="fas fa-coins fa-2x text-info"></i>
                      
                    </div>
                  </div>
                </div>
              </div>
            </div>

            <div class="col-xl-3 col-md-6 mb-4">
              <div class="card h-100">
                <div class="card-body">
                  <div class="row align-items-center">
                    <div class="col mr-2">
                      <div class="text-xs font-weight-bold text-uppercase mb-1">Profit</div>
                      <div class="h5 mb-0 font-weight-bold text-gray-800">@currency($profit)</div>
                      
                    </div>
                    <div class="col-auto">
                      <i class="fas fa-wallet fa-2x text-success"></i>
                    </div>
                  </div>
                </div>
              </div>
            </div>




           </div>
     @endsection