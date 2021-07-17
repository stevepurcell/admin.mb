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
            <h3>New Setlist Group</h3> 
            <a href="/setlistgroups" class="btn btn-secondary">
            	<i class="nav-icon far fa-hand-point-left"></i>  Back</a>
        </div>
    </div>
	<form action="{{ route('setlistgroups.store') }}" method="post">
		    @csrf
                <div class="card-body">
                  <div class="form-group">
                    <label for="name">Group Name</label>
                    <input type="input" class="form-control" name="name" id="name">
                  </div>
                  <div class="form-check">
                		<input type="radio" name="private" id="public" value="0" checked/> 
                          	<label class="form-check-label">Public</label>
                        </div>
                        <div class="form-check">
                    		<input type="radio" name="private" id="private" value="1"/> 
                          <label class="form-check-label">Private</label>
                        </div>
                </div>
                <!-- /.card-body -->

                <div class="card-footer">
                  <button type="submit" class="btn btn-primary">Submit</button>
                </div>
              </form>
</div>
    
    </div>
</div>

</div>
            </div>
        </div>
    </main>
@endsection




