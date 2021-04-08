@extends('layouts.app')

@section('content')

    <div class="container-fluid">
      <div class="row">
      
        @include('partials.sidemenu')

        <main role="main" class="col-md-9 ml-sm-auto col-lg-10 pt-3 px-4">
          <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pb-2 mb-3 border-bottom">
            <h1 class="h2 font-weight-bold">Emulator</h1>
            <!-- <div class="btn-toolbar mb-2 mb-md-0">
              <div class="btn-group mr-2">
                <button class="btn btn-sm btn-outline-secondary">Share</button>
                <button class="btn btn-sm btn-outline-secondary">Export</button>
              </div>
              <button class="btn btn-sm btn-outline-secondary dropdown-toggle">
                <span data-feather="calendar"></span>
                This week
              </button>
            </div> -->
          </div>

          

          <!-- <canvas class="my-4" id="myChart" width="900" height="380"></canvas> -->

          <!-- <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pb-2 mb-3 border-bottom">
            <h2 class="h2">Add New Map</h2>
          </div> -->

          <!-- Content -->
          <div class="cotnainer">
            <div class="row">
                <div class="col-md-6">
                    
                    <div class="container">

                        <!-- Actions -->
                        <div class="row mt-2 mb-5">
                            <div class="col-md-12">
                                <div class="card">
                                    <div class="card-body">

                                        <!-- Action buttons -->
                                        <div class="form-group">
                                            <div class="form-row">
                                                <div class="col">
                                                    <button onclick="initSimulator(); return false" class="btn btn-lg btn-info btn-block">Run/Re-run Emulator</button>
                                                </div>
                                            </div>
                                        </div>
                                        <!-- ./Action buttons -->

                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- ./Actions -->

                    </div>
                    <!-- ./container -->

                </div>
                <div class="col-md-6">
                    <canvas id="canvas-map" width="700" height="900"></canvas>
                </div>
            </div>
          </div>

          
        </main>
      </div>
    </div>

    

@endsection

@section('bodyEnd')
  {{--@include('scripts/maps_insert')--}}
  @include('scripts/artyom')
@endsection