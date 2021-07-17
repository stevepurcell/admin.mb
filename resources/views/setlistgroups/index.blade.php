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
            <h3>Setlists</h3> 
            <a href="setlistgroups/create" class="btn btn-secondary">New Group</a>
        </div>
    </div>
    <div class="card-body">

    <table class="table">
        <thead>
            <tr>
                <th style="width: 15%"></th>
                <th>Name</th>
                <th>Creator</th>
                <th>Action</th>
            </tr>
        </thead>
  <tbody>
        @forelse ($data as $item)
            <tr>
                <td><a href="setlists/create/{{ $item->id }}" class="btn btn-sm btn-secondary">
                        Add Setlist</a></td>

            <td>{{ $item->name }}</td>
            <td>{{ getUsername($item->creator) }}</td>
            <td class="">
                    <button class="btn btn-sm btn-primary">Edit</button>
                    <button class="btn btn-sm btn-danger">Delete</button>
                </td>
            </tr>
            @foreach($item->songlists as $songlist)
                <tr height="12px">
                <td></td>
                    <td class="h6"><small><a href="/setlists/{{ $songlist->id }}">
                        {{ $songlist->name }}</a></small></td>
                    <td class="h6"><small>{{ getSongCount($songlist->id) }} Songs</small></td>
                </tr>
            @endforeach
        @empty
            <tr>
                <td colspan="3">No Songs found.</td>
            </tr>
        @endforelse
    </tbody>
</table>

    {{-- {!! $data->links() !!}      --}}
</div>
    
    </div>
</div>

</div>
            </div>
        </div>

    </main>
@endsection






