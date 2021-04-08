@extends('layouts.app')

@section('headTag')
  <!-- {{-- CSRF Token --}}
  <meta name="csrf-token" content="{{ csrf_token() }}"> -->
@endsection

@section('content')

    <div class="container-fluid">
      <div class="row">
      
        @include('partials.sidemenu')

        <main role="main" class="col-md-9 ml-sm-auto col-lg-10 pt-3 px-4">
          <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pb-2 mb-3 border-bottom">
            <!-- <h1 class="h2">Dashboard</h1> -->
            <h2 class="h2">Saved Maps</h2>
            <div class="btn-toolbar mb-2 mb-md-0">
              <a href="{{ route('maps.create') }}" class="btn btn-sm btn-primary">
                <span data-feather="plus-square"></span>
                Add New Map
              </a>
            </div>
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

          <!-- <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pb-2 mb-3">
            <h2 class="h2">Saved Maps</h2>
            <div class="btn-toolbar mb-2 mb-md-0">
              <a href="{{ route('maps.create') }}" class="btn btn-sm btn-primary">
                <span data-feather="plus-square"></span>
                Add New Map
              </a>
            </div>
          </div> -->

          <div class="table-responsive mt-5">
            <table class="table table-striped table-sm">
              <thead>
                <tr>
                  <th>Destination</th>
                  <th>Voice Command String</th>
                  <th>Sides Count</th>
                  <th>Actions</th>
                </tr>
              </thead>
              <tbody>
              @if($maps->count() > 0)
                @foreach($maps as $map)
                  <tr>
                    <td>{{ $map->dest_name }}</td>
                    <td>{{ $map->voice_command }}</td>
                    <td>{{ $map->sides()->count() }}</td>
                    <td>
                      <button class="btn btn-info float-left">View</button>
                      <button class="btn btn-warning float-left ml-1">Edit</button>
                      <form action="{{ route('maps.destroy', $map->id) }}" method="post">
                        @csrf
                        <input type="hidden" name="_method" value="DELETE">
                        <button class="btn btn-danger float-left ml-1" type="button" data-toggle="modal" data-target="#confirmDelete" data-title="Delete Confirmation" data-message="Are you sure you want to delete map?">Delete</button>
                      </form>
                    </td>
                  </tr>
                @endforeach
              @else 
                <tr><td colspan="5">No data</td></tr>
              @endif
              </tbody>
            </table>
          </div>
        </main>
      </div>
    </div>


<!-- Delete Model -->
<div class="modal fade modal-danger" id="confirmDelete" role="dialog" tabindex="-1">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title"></h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    <span class="sr-only">close</span>
                </button>
            </div>
            <div class="modal-body">
                <p></p>
            </div>
            <div class="modal-footer">
                <button class="btn btn-light pull-left" type="button" data-dismiss="modal">Cancel</button>
                <button class="btn btn-danger pull-right btn-flat" type="button" id="confirm">Delete</button>
            </div>
        </div>
    </div>
</div>


@endsection

@section('bodyEnd')
  @include('scripts/delete')
@endsection