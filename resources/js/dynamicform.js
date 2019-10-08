$(document).ready(function () {
    var i = 1

    $(document).on('click', '.btn_close', function () {
        var button_id = $(this).attr("id");
        $('#ModalCreateData' + button_id + '').remove();
    });
    $('#btnAdd').click(function () {
        i++;
        $('#insert').append(`
        <form action="/" method="post" id="dynamic_form">
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
    </form>
    `)
    });
});
