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
            <h3>Contacts</h3> 
            <a href="contacts/create" class="btn btn-secondary">New Contact</a>
        </div>
    </div>
    <div class="card-body">

    <table class="table">
        <thead>
            <tr>
                <th style="width: 15%"></th>
                <th>Name</th>
                <th>Type</th>
                <th>Phone</th>
                <th>Email</th>
                <th></th>
            </tr>
        </thead>
  <tbody>
        @forelse ($data as $item)
            <tr>
            <td>{{ $item->name }}</td>
            <td>{{ $item->type_id }}</td>
            <td>{{ $item->phone }}</td>
            <td>{{ $item->email }}</td>
            <td class="">
                    <button class="btn btn-sm btn-primary">Edit</button>
                    <button class="btn btn-sm btn-danger">Delete</button>
                </td>
            </tr>
        @empty
            <tr>
                <td colspan="3">No Contacts found.</td>
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






