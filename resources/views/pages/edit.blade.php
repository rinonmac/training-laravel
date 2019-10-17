@extends('layout.template')
@section('title','Edit Data')
@section('isi')
<h1 style="text-align: center;">Edit Data</h1>
<div class="row">
    <div class="col-md-3"></div>
    <div class="col-md-6">
       <form action="/{{ $pengguna->id }}" method="post" id="edit_form">
        @method('patch')
        @csrf
        <div class="form-group">
            <label for="">Your Name</label>
            <input class="form-control @error('fullname') is-invalid @enderror" type="text" name="fullname" id="fullname" placeholder="Full Name" value="{{ $pengguna->full_name }}">
            @error('fullname')
              <div class="invalid-feedback">
                {{ $message }}
              </div>
            @enderror
        </div>
        <div class="form-group">
            <label for="">Username</label>
            <input class="form-control @error('username') is-invalid @enderror" type="text" name="username" id="username" placeholder="Username" value="{{ $pengguna->username }}">
            @error('username')
              <div class="invalid-feedback">
                {{ $message }}
              </div>
            @enderror
        </div>
        <div class="form-group">
            <label for="">Password</label>
            <input class="form-control @error('password') is-invalid @enderror form-password" type="password" name="password" id="password" placeholder="Password" value="{{ old('password') }}">
            <div class="form-check">
              <input type="checkbox" class="form-check-input form-checkbox">
              <label for="" class="form-check-label">Show Password</label>
            </div>
            @error('password')
            <div class="invalid-feedback">
                {{ $message }}
            </div>
            @enderror
        </div>
        <div class="form-group">
          <label for="">E-Mail</label>
          <input class="form-control @error('email') is-invalid @enderror" type="text" name="email" id="email" placeholder="E-Mail" value="{{ $pengguna->email }}">
          @error('email')
            <div class="invalid-feedback">
              {{ $message }}
            </div>
          @enderror
        </div>
        <div class="form-group">
          <label for="">Phone Number</label>
          <input class="form-control @error('phonenumber') is-invalid @enderror" type="text" name="phonenumber" id="phonenumber" placeholder="Starts with +62" value="{{ $pengguna->phonenumber }}">
          @error('phonenumber')
            <div class="invalid-feedback">
              {{ $message }}
            </div>
          @enderror
        </div>
        <div class="form-group">
          <label for="">Position</label>
          <select class="form-control @error('position') is-invalid @enderror" name="position" id="position">
            <option value="">--Select Position--</option>
            @for ($i = 0; $i < count($position); $i++)
              <option value="{{ $position[$i]->position }}">{{ $position[$i]->position }}</option>
            @endfor
          </select>
          @error('position')
            <div class="invalid-feedback">
                {{ $message }}
            </div>
            @enderror
        </div>
        <div id="button_changes">
            <input type="submit" class="btn btn-primary" value="Save Changes">
            <a href="/" class="btn btn-danger">Cancel</a>
        </div>
       </form>
    </div>
    <div class="col-md-3"></div>
</div>
<script>
$(document).ready(function(){
  $('.form-checkbox').click(function(){
    if($(this).is(':checked')){
      $('.form-password').attr('type','text');
    }else{
       $('.form-password').attr('type','password'); 
    }
  });
});
</script>
@endsection