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
            <h3>New Contact</h3> 
            <a href="/setlistgroups" class="btn btn-secondary">
            	<i class="nav-icon far fa-hand-point-left"></i>  Back</a>
        </div>
    </div>
	<form action="{{ route('contacts.store') }}" method="post">
		    @csrf
    <div class="card-body">
    <div class="form-group">
    <label for="address">Contact Type</label>
    <div class="form-group">
      <div class="form-check form-check-inline">
        <input class="form-check-input" type="radio" name="type_id" id="inputvenue" value="1">
        <label class="form-check-label" for="inputvenue">Venue</label>
      </div>
      <div class="form-check form-check-inline">
        <input class="form-check-input" type="radio" name="type_id" id="inputband" value="2">
        <label class="form-check-label" for="inputband">Musician/Band</label>
      </div>
      <div class="form-check form-check-inline">
        <input class="form-check-input" type="radio" name="type_id" id="inputbooker" value="3">
        <label class="form-check-label" for="inputbooker">Booker</label>
      </div>
      <div class="form-check form-check-inline">
        <input class="form-check-input" type="radio" name="type_id" id="inputother" value="4">
        <label class="form-check-label" for="inputother">Other</label>
      </div>
    </div>
    </div>
    <div class="form-group">
      <label for="name">Name</label>
      <input type="text" class="form-control" id="name">
    </div>
  <div class="form-group">
    <label for="address">Address</label>
    <input type="text" class="form-control" id="address">
  </div>
  <div class="form-row">
    <div class="form-group col-md-6">
      <label for="city">City</label>
      <input type="text" class="form-control" id="city">
    </div>
    <div class="form-group col-md-4">
      <label for="state">State</label>
      <select id="state" class="form-control">
        <option selected>Choose...</option>
        <option>...</option>
      </select>
    </div>
    <div class="form-group col-md-2">
      <label for="zipcode">Zip</label>
      <input type="text" class="form-control" id="zipcode">
    </div>
  </div>
  <div class="form-row">
    <div class="form-group col-md-4">
      <label for="phone">Phone</label>
      <input type="text" class="form-control" id="phone">
    </div>
    <div class="form-group col-md-8">
      <label for="email">Email</label>
      <input type="text" class="form-control" id="email">
    </div>
  </div>
  <div class="form-group">
      <label for="contact">Contact</label>
      <input type="text" class="form-control" id="contact">
  </div>
  <div class="form-group">
      <label for="notes">Notes</label>
      <textarea class="form-control" id="notes" rows="3"></textarea>
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




