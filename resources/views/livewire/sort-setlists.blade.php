@extends('layouts.master')

@section('content')
<div id="app">
    <main class="py-4">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-12">
<div class="card">
    <div class="card-header bg-light">
        <div class="d-flex justify-content-between">
            <h3><strong>{{ $songs[0]->group->name }}</strong> - {{ $songs[0]->songlist->name }}</h3> 
            <a href="/setlistgroups" class="btn btn-secondary">
                <i class="nav-icon far fa-hand-point-left"></i>  Back</a>
        </div>
    </div>
      <!-- /.card-header -->
      <div class="card-body">
        <table class="table">
          <thead>
            <tr>
                <th></th>
                <th>Title</th>
                <th>Artist</th>
                <th>Status</th>
                <th>Status</th>
            </tr>
          </thead>
            <tbody>
                @forelse ($songs as $song)
                    <tr>
                    {{ $song->position }}
                        <td>
                        @if ($song->position > 1)
                            <a wire:click.prevent="song_up({{ $song->id }})" href="#">
                                &uarr;
                            </a>
                        @endif
                    
                        @if ($song->position < $songs->max('position'))
                            <a wire:click.prevent="song_down({{ $song->id }})" href="#">
                                &darr;
                            </a>
                        @endif
                        </td>
                        <td>{{ $song->song->name }}</td>
                        <td>{{ $song->song->artist }}</td>
                        <td>{{ $song->song->status_id }}</td>
                        <td> <button class="btn btn-sm btn-primary"
                            wire:click.prevent="lw_test()">Edit</button>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="3">No products found.</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
      </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
          </div>
        </div>
        <!-- /.row -->
                </div>
</div>
    
    </div>
</div>

</div>
            </div>
        </div>
    </main>
@endsection




