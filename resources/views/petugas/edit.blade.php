@extends('layout')

@section('content')
  <div class="container">
    <div class="row">
      <div class="col-md-8 col-md-offset-2">
        <div class="panel panel-default">
          <div class="panel-heading">
            <h3 class="panel-title">Ubah Petugas</h3>
          </div>
          <div class="panel-body">
            <form action="/petugas/edit/{{ $petugas->id_petugas }}" method="post">

              {{-- csrf field  --}}
              {{ csrf_field() }}

              {{-- method field  --}}
              {{ method_field('put') }}

              {{-- nama field  --}}
              <div class="form-group {{ $errors->has('nama') ? 'has-error' : '' }}">
                <label for="nama">Nama</label>
                <input type="text" class="form-control" name="nama" id="nama" value="{{ old('nama') != null ? old('nama') : $petugas->nama }}" placeholder="Masukkan Nama" required>

                @if ($errors->has('nama'))
                  <span class="help-block">
                    <strong>{{ $errors->first('nama') }}</strong>
                  </span>
                @endif
              </div>

              {{-- telp field  --}}
              <div class="form-group {{ $errors->has('telp') ? 'has-error' : '' }}">
                <label for="telp">Telepon</label>
                <input type="number" class="form-control" name="telp" id="telp" value="{{ old('telp') != null ? old('telp') : $petugas->telp }}" placeholder="Masukkan Telepon" required>

                @if ($errors->has('telp'))
                  <span class="help-block">
                    <strong>{{ $errors->first('telp') }}</strong>
                  </span>
                @endif
              </div>

              <div class="form-group">
                <button type="submit" name="button" class="btn btn-primary">Simpan</button>
              </div>

            </form>

          </div>
        </div>
      </div>
    </div>
  </div>
@endsection
