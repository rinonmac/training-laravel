@extends('layout.template')
@section('title','User Management Engine')
@section('isi')
<h1 style="text-align:center;">User Management</h1>
<!-- Button trigger modal -->
<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#ModalCreateData" style="margin-bottom: 10px;">
  Add Data
</button>
@if (session('status'))
	<div class="alert alert-success">
		{{ session('status') }}
	</div>
@endif
{{-- List User --}}
<table class="table">
    <thead class="thead-dark">
        <tr>
            <th scope="col">ID</th>
            <th scope="col">Nama Lengkap</th>
            <th scope="col">Username</th>
            <th scope="col">Password</th>
            <th scope="col">Email</th>
            <th scope="col">Phone Number</th>
            <th scope="col">Position</th>
            <th scope="col">Action</th>
        </tr>
    </thead>
    <tbody>
    @foreach ($pengguna as $pgn)
        <tr>
            <th scope="row">{{$loop->iteration}}</th>
            <td>{{$pgn->id}}</td>
            <td>{{$pgn->full_name}}</td>
            <td>{{$pgn->username}}</td>
            <td>{{$pgn->password}}</td>
            <td>{{$pgn->email}}</td>
            <td>{{$pgn->phonenumber}}</td>
            <td>{{$pgn->position}}</td>
            <td><a href="" class="btn btn-danger">Delete</a></td>
        </tr>
    @endforeach
    </tbody>
</table>
<!-- Modal Create -->
<div class="modal fade" id="ModalCreateData" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Add Data</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form action="/" method="post">
            @csrf
            <div class="form-group">
                <label for="">Your Name</label>
                <input class="form-control @error('fullname') is-invalid @enderror" type="text" name="fullname" id="fullname" placeholder="Full Name" value="{{ old('fullname') }}">
                @error('fullname')
                  <div class="invalid-feedback">
                    {{ $message }}
                  </div>
                @enderror
            </div>
            <div class="form-group">
                <label for="">Username</label>
                <input class="form-control @error('username') is-invalid @enderror" type="text" name="username" id="username" placeholder="Username" value="{{ old('username') }}">
                @error('username')
                  <div class="invalid-feedback">
                    {{ $message }}
                  </div>
                @enderror
            </div>
            <div class="form-group">
              <label for="">Password</label>
              <input class="form-control @error('password') is-invalid @enderror" type="password" name="password" id="password" placeholder="Password" value="{{ old('password') }}">
              @error('password')
                <div class="invalid-feedback">
                  {{ $message }}
                </div>
              @enderror
            </div>
            <div class="form-group">
              <label for="">E-Mail</label>
              <input class="form-control @error('email') is-invalid @enderror" type="text" name="email" id="email" placeholder="E-Mail" value="{{ old('email') }}">
              @error('email')
                <div class="invalid-feedback">
                  {{ $message }}
                </div>
              @enderror
            </div>
            <div class="form-group">
              <label for="">Phone Number</label>
              <input class="form-control @error('phonenumber') is-invalid @enderror" type="text" name="phonenumber" id="phonenumber" placeholder="Starts with +62" value="{{ old('phonenumber') }}">
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
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-danger" data-dismiss="modal">Cancel</button>
        <input type="submit" class="btn btn-primary" value="Add Data">
      </div>
      </form>
    </div>
  </div>
</div>
@endsection