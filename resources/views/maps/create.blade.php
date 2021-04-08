@extends('layouts.app')

@section('content')

    <div class="container-fluid">
      <div class="row">
      
        @include('partials.sidemenu')

        <main role="main" class="col-md-9 ml-sm-auto col-lg-10 pt-3 px-4">
          <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pb-2 mb-3 border-bottom">
            <h1 class="h2 font-weight-bold">Add New Map</h1>
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
                    
                    <form action="#" method="post">

                        <div class="container">

                            <!-- Map Information -->
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="card">
                                        <div class="card-header">
                                            <h3 class="h3">Map Information</h3>
                                        </div>
                                        <div class="card-body">

                                            <!-- Destination name -->
                                            <div class="form-group">
                                                <label for="dest_name">Destination Name</label>
                                                <input type="text" class="form-control" id="dest_name" name="dest_name">
                                            </div>

                                            <!-- Voice Command String -->
                                            <div class="form-group">
                                                <label for="voice_command">Voice command</label>
                                                <input type="text" class="form-control" id="voice_command" name="voice_command">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- ./Maps Information -->

                            <!-- Directions -->
                            <div class="row mt-2">
                                <div class="col-md-12">
                                    <div class="card">
                                        <div class="card-header">
                                            <h3 class="h3">Directions</h3>
                                        </div>
                                        <div class="card-body">

                                            <div class="row">
                                                <div class="col-md-6">
                                                    <!-- Meters -->
                                                    <div class="form-row">
                                                        <div class="col-md-12">
                                                            <div class="form-group">
                                                                <label for="meters">How many meters to move?</label>
                                                                <input type="text" class="form-control" id="meters" name="meters">
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <!-- Directions switch -->
                                                    <div class="form-group">
                                                        <label for="voice_command">Directions switch</label>
                                                        <div class="form-row">
                                                            <div class="col">
                                                                <button class="btn btn-info btn-block" onclick="addDirection('Right'); return false">Right</button>
                                                            </div>
                                                            <div class="col">
                                                                <button class="btn btn-info btn-block" onclick="addDirection('Left'); return false">Left</button>
                                                            </div>
                                                            <div class="col">
                                                                <button class="btn btn-info btn-block" onclick="addDirection('Forward'); return false">Forward</button>
                                                            </div>
                                                            <div class="col">
                                                                <button class="btn btn-info btn-block" onclick="addDirection('Backward'); return false">Backward</button>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>

                                                <!-- Directions Table -->
                                                <div class="col-md-6">
                                                    <table class="table table-dark" id="directions_table">
                                                        <thead>
                                                            <tr>
                                                                <th scope="col">Direction</th>
                                                                <th scope="col">Meters</th>
                                                                <th scope="col">Actions</th>
                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                            
                                                            <!-- <tr>
                                                                <th scope="row">1</th>
                                                                <td>Right</td>
                                                                <td>10</td>
                                                                <td>
                                                                    <button class="btn btn-danger btn-sm" type="submit">Delete</button>
                                                                    <button class="btn btn-warning btn-sm" type="submit">Edit</button>
                                                                </td>
                                                            </tr> -->

                                                        </tbody>
                                                    </table>
                                                </div>
                                            </div>

                                            
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- ./Directions -->

                            <!-- Actions -->
                            <div class="row mt-2 mb-5">
                                <div class="col-md-12">
                                    <div class="card">
                                        <div class="card-header">
                                            <h3 class="h3">Done</h3>
                                        </div>
                                        <div class="card-body">

                                            <!-- Action buttons -->
                                            <div class="form-group">
                                                <div class="form-row">
                                                    <div class="col">
                                                        <button onclick="save(this); return false" class="btn btn-success btn-block">Save</button>
                                                    </div>
                                                    <div class="col">
                                                        <button onclick="bookmark(); return false" class="btn btn-info btn-block">Bookmark</button>
                                                    </div>
                                                    <div class="col">
                                                        <button onclick="resetEverything(); return false" class="btn btn-primary btn-block">New</button>
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
                    </form>

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
  @include('scripts/maps_insert')
@endsection