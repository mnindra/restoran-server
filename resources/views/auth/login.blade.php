@extends('layout')

@section('content')
  <div class="container">
    <div class="row">
      <div class="col-md-8 col-md-offset-2">
        <div class="panel panel-default">
          <div class="panel-heading">
            <h3 class="panel-title">Login Petugas</h3>
          </div>
          <div class="panel-body">
            <form class="" action="{{ url('/login') }}" method="post">

              {{-- CSRF FIELD  --}}
              {{ csrf_field() }}

              {{-- USERNAME FIELD  --}}
              <div class="form-group {{ $errors->has('username') ? 'has-error' : '' }}">
                <label for="username">Username</label>
                <input type="text" class="form-control" name="username" id="username" value="{{ old('username') }}" placeholder="Masukkan Username" required autofocus>

                @if ($errors->has('username'))
                  <span class="help-block">
                    <strong>{{ $errors->first('username') }}</strong>
                  </span>
                @endif
              </div>

              {{-- PASSWORD FIELD  --}}
              <div class="form-group {{ $errors->has('password') ? 'has-error' : '' }}">
                <label for="password">Password</label>
                <input type="password" class="form-control" name="password" id="password" placeholder="Masukkan Password" required>

                @if ($errors->has('password'))
                  <span class="help-block">
                    <strong>{{ $errors->first('password') }}</strong>
                  </span>
                @endif
              </div>

              {{-- SUBMIT BUTTON  --}}
              <div class="form-group">
                <button type="submit" class="btn btn-primary">Login</button>
                <button type="button" onclick="window.location='/register'" class="btn btn-warning">Register</button>
              </div>

            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
@endsection
