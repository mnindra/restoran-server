@extends('layout')

@section('content')
  <div class="container">
    <div class="row">
      <div class="col-md-8 col-md-offset-2">
        <div class="panel panel-default">
          <div class="panel-heading">
            <h3 class="panel-title">Daftar Petugas</h3>
          </div>
          <div class="panel-body">

            <form action="{{ url('/register') }}" method="post">
              {{-- CSRF FIELD  --}}
              {{ csrf_field() }}

              {{-- NAMA FIELD  --}}
              <div class="form-group {{ $errors->has('nama') ? 'has-error' : '' }}">
                <label for="nama">Nama</label>
                <input type="text" class="form-control" name="nama" id="nama" value="{{ old('nama') }}" placeholder="Masukkan Nama" required autofocus>

                @if ($errors->has('nama'))
                  <span class="help-block">
                    <strong>{{ $errors->first('nama') }}</strong>
                  </span>
                @endif
              </div>

              {{-- TELP FIELD  --}}
              <div class="form-group {{ $errors->has('telp') ? 'has-error' : '' }}">
                <label for="telp">Telepon</label>
                <input type="number" class="form-control" name="telp" id="telp" value="{{ old('telp') }}" placeholder="Masukkan Telepon">

                @if ($errors->has('telp'))
                  <span class="help-block">
                    <strong>{{ $errors->first('telp') }}</strong>
                  </span>
                @endif
              </div>

              {{-- USERNAME FIELD  --}}
              <div class="form-group {{ $errors->has('username') ? 'has-error' : '' }}">
                <label for="username">Username</label>
                <input type="text" class="form-control" name="username" id="username" value="{{ old('username') }}" placeholder="Masukkan Username" required>

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

              {{-- PASSWORD CONFIRMATION FIELD  --}}
              <div class="form-group">
                <label for="password-confirm">Konfirmasi Password</label>
                <input type="password" class="form-control" name="password_confirmation" id="password-confirm" placeholder="Masukkan Password Kembali" required>
              </div>

              {{-- SUBMIT BUTTON  --}}
              <div class="form-group">
                <button type="submit" name="button" class="btn btn-primary">Daftar</button>
              </div>
            </form>

          </div>
        </div>
      </div>
    </div>
  </div>
@endsection
