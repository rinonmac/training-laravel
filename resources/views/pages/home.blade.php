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
            <td>{{$pgn->id}}</td>
            <td>{{$pgn->full_name}}</td>
            <td>{{$pgn->username}}</td>
            <td>{{$pgn->password}}</td>
            <td>{{$pgn->email}}</td>
            <td>{{$pgn->phonenumber}}</td>
            <td>{{$pgn->position}}</td>
            <td><a href="{{ $pgn->id }}/edit" class="btn btn-info d-inline">Edit</a></td>
            <td><button class="btn btn-danger d-inline" data-toggle="modal" data-target="#ModalDeleteData">Delete</button></td>
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
        <form action="/" method="post" id="dynamic_form">
            @csrf
        <div id="insert">
          <span id="result"></span>
            <div class="form-group">
                <label for="">Your Name</label>
                <input class="form-control @error('fullname') is-invalid @enderror" type="text" name="fullname[]" id="fullname" placeholder="Full Name" value="">
                @error('fullname')
                  <div class="invalid-feedback">
                    {{ $message }}
                  </div>
                @enderror
            </div>
            <div class="form-group">
                <label for="">Username</label>
                <input class="form-control @error('username') is-invalid @enderror" type="text" name="username[]" id="username" placeholder="Username" value="">
                @error('username')
                  <div class="invalid-feedback">
                    {{ $message }}
                  </div>
                @enderror
            </div>
            <div class="form-group">
              <label for="">Password</label>
              <input class="form-control @error('password') is-invalid @enderror form-password" type="password" name="password[]" id="password" placeholder="Password" value="">
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
              <input class="form-control @error('email') is-invalid @enderror" type="text" name="email[]" id="email" placeholder="E-Mail" value="">
              @error('email')
                <div class="invalid-feedback">
                  {{ $message }}
                </div>
              @enderror
            </div>
            <div class="form-group">
              <label for="">Phone Number</label>
              <input class="form-control @error('phonenumber') is-invalid @enderror" type="text" name="phonenumber[]" id="phonenumber" placeholder="Starts with +62" value="">
              @error('phonenumber')
                <div class="invalid-feedback">
                  {{ $message }}
                </div>
              @enderror
            </div>
            <div class="form-group">
              <label for="">Position</label>
              <select class="form-control @error('position') is-invalid @enderror" name="position[]" id="position">
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
          <button type="button" id="btnAdd" class="btn btn-secondary">Add Form</button>
          <input type="submit" class="btn btn-primary" value="Insert Data">
      </div>
    </form>
    </div>
  </div>
</div>
</div>

{{-- Modal Delete --}}
<div class="modal fade" id="ModalDeleteData" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Delete Data</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form action="{{ $pgn->id }}" method="post" class="d-inline">
        @csrf
        <h5>Are you sure to delete?</h5>
      </div>
      <div class="modal-footer">
          <button class="btn btn-danger">Delete</button>
        </form>
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
      </div>
    </div>
  </div>
</div>
<script>
$(document).ready(function () {
    var i = 1;

    $(document).on('click', '.btn_close', function () {
        var button_id = $(this).attr("id");
        $('#dynamic_form_' + button_id + '').remove();
    });
    $('#btnAdd').click(function () {
        i++;
    //     $('#insert').append(`
    //       <button type="button" id="`+i+`" class="btn btn-danger btn_close">Close Form</button>
    //         @csrf
    //         <div class="form-group">
    //             <label for="">Your Name</label>
    //             <input class="form-control @error('fullname') is-invalid @enderror" type="text" name="fullname[]" id="fullname" placeholder="Full Name" value="">
    //             @error('fullname')
    //               <div class="invalid-feedback">
    //                 {{ $message }}
    //               </div>
    //             @enderror
    //         </div>
    //         <div class="form-group">
    //             <label for="">Username</label>
    //             <input class="form-control @error('username') is-invalid @enderror" type="text" name="username[]" id="username" placeholder="Username" value="">
    //             @error('username')
    //               <div class="invalid-feedback">
    //                 {{ $message }}
    //               </div>
    //             @enderror
    //         </div>
    //         <div class="form-group">
    //           <label for="">Password</label>
    //           <input class="form-control @error('password') is-invalid @enderror form-password" type="password" name="password[]" id="password" placeholder="Password" value="">
    //           <div class="form-check">
    //             <input type="checkbox" class="form-check-input form-checkbox">
    //             <label for="" class="form-check-label">Show Password</label>
    //           </div>
    //           @error('password')
    //             <div class="invalid-feedback">
    //               {{ $message }}
    //             </div>
    //           @enderror
    //         </div>
    //         <div class="form-group">
    //           <label for="">E-Mail</label>
    //           <input class="form-control @error('email') is-invalid @enderror" type="text" name="email[]" id="email[]" placeholder="E-Mail" value="">
    //           @error('email')
    //             <div class="invalid-feedback">
    //               {{ $message }}
    //             </div>
    //           @enderror
    //         </div>
    //         <div class="form-group">
    //           <label for="">Phone Number</label>
    //           <input class="form-control @error('phonenumber') is-invalid @enderror" type="text" name="phonenumber[]" id="phonenumber" placeholder="Starts with +62" value="">
    //           @error('phonenumber')
    //             <div class="invalid-feedback">
    //               {{ $message }}
    //             </div>
    //           @enderror
    //         </div>
    //         <div class="form-group">
    //           <label for="">Position</label>
    //           <select class="form-control @error('position') is-invalid @enderror" name="position" id="position">
    //             <option value="">--Select Position--</option>
    //             @for ($i = 0; $i < count($position); $i++)
    //               <option value="{{ $position[$i]->position }}">{{ $position[$i]->position }}</option>
    //             @endfor
    //           </select>
    //           @error('position')
    //             <div class="invalid-feedback">
    //               {{ $message }}
    //             </div>
    //           @enderror
    //         </div>
    //   </div>
    // `);
    $('#insert').append(`
            <button type="button" id="`+i+`" class="btn btn-danger btn_close">Close Form</button>
            <div class="form-group">
                <label for="">Your Name</label>
                <input class="form-control @error('fullname') is-invalid @enderror" type="text" name="fullname[]" id="fullname" placeholder="Full Name" value="">
                @error('fullname')
                  <div class="invalid-feedback">
                    {{ $message }}
                  </div>
                @enderror
            </div>
            <div class="form-group">
                <label for="">Username</label>
                <input class="form-control @error('username') is-invalid @enderror" type="text" name="username[]" id="username" placeholder="Username" value="">
                @error('username')
                  <div class="invalid-feedback">
                    {{ $message }}
                  </div>
                @enderror
            </div>
            <div class="form-group">
              <label for="">Password</label>
              <input class="form-control @error('password') is-invalid @enderror form-password" type="password" name="password[]" id="password" placeholder="Password" value="">
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
              <input class="form-control @error('email') is-invalid @enderror" type="text" name="email[]" id="email" placeholder="E-Mail" value="">
              @error('email')
                <div class="invalid-feedback">
                  {{ $message }}
                </div>
              @enderror
            </div>
            <div class="form-group">
              <label for="">Phone Number</label>
              <input class="form-control @error('phonenumber') is-invalid @enderror" type="text" name="phonenumber[]" id="phonenumber" placeholder="Starts with +62" value="">
              @error('phonenumber')
                <div class="invalid-feedback">
                  {{ $message }}
                </div>
              @enderror
            </div>
            <div class="form-group">
              <label for="">Position</label>
              <select class="form-control @error('position') is-invalid @enderror" name="position[]" id="position">
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
    `);
    });
    $('.form-checkbox').click(function(){
      if($(this).is(':checked')){
        $('.form-password').attr('type','text');
      }else{
       $('.form-password').attr('type','password'); 
      }
    });
  $('#dynamic_form').on('submit', function(event){
                event.preventDefault();
                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                    });
                $.ajax({
                    url:'{{ route(".") }}',
                    method:'post',
                    data:$(this).serialize(),
                    dataType:'json',
                    beforeSend:function(){
                        $('#save').attr('disabled','disabled');
                    },
                    success:function(data)
                    {
                        if(data.error)
                        {
                            var error_html = '';
                            for(var count = 0; count < data.error.length; count++)
                            {
                                error_html += '<p>'+data.error[count]+'</p>';
                            }
                            $('#result').html('<div class="alert alert-danger">'+error_html+'</div>');
                        }
                        else
                        {
                            $('#result').html('<div class="alert alert-success">'+data.success+'</div>');
                        }
                        $('#save').attr('disabled', false);
                    }
                }) 
    });
});
  //     $('#dynamic_form').submit(function(event) {
  //      event.preventDefault();

  //   $.ajax({
  //   url: '.',
  //   type: 'POST',
  //   data: $(this).serialize(),
  //   success: function(data){
  //       alert(data);
  //       // success logic
  //   },
  //   error: function(jqXhr, json, errorThrown){// this are default for ajax errors 
  //       var errors = jqXhr.responseJSON;
  //       var errorsHtml = '';
  //       $.each(errors['errors'], function (index, value) {
  //           errorsHtml += '<ul class="list-group"><li class="list-group-item alert alert-danger">' + value + '</li></ul>';
  //       });
  //       //I use SweetAlert2 for this
  //       swal({
  //           title: "Error " + jqXhr.status + ': ' + errorThrown,// this will output "Error 422: Unprocessable Entity"
  //           html: errorsHtml,
  //           width: 'auto',
  //           confirmButtonText: 'Try again',
  //           cancelButtonText: 'Cancel',
  //           confirmButtonClass: 'btn',
  //           cancelButtonClass: 'cancel-class',
  //           showCancelButton: true,
  //           closeOnConfirm: true,
  //           closeOnCancel: true,
  //           type: 'error'
  //       }, function(isConfirm) {
  //           if (isConfirm) {
  //                $('#openModal').click();//this is when the form is in a modal
  //           }
  //       });
  //   },
  // });
  // });
  // });
</script>
@endsection