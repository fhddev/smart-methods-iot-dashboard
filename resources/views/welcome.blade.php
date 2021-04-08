@extends('layouts.app')

@section('content')

    <div class="container-fluid">
      <div class="row">
      
        @include('partials.sidemenu')

        <main role="main" class="col-md-9 ml-sm-auto col-lg-10 pt-3 px-4">
          <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pb-2 mb-3 border-bottom">
            <h1 class="h2">IoT Dashboard</h1>
          </div>
          <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pb-2 mb-3">
            <img src="{{ asset('images/dashboard-bg.jpg') }}" alt="background" class="img-fluid">
          </div>

          
        </main>
      </div>
    </div>

@endsection