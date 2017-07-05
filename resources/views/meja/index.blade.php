@extends('layout')

@section('content')

  <div class="row">
    <div class="col-md-10 col-md-offset-1">
      <div class="panel panel-default">
        <div class="panel-heading">
          <center>
            <h3 class="panel-title">
              Daftar Meja
            </h3>
          </center>
        </div>
        <div class="panel-body">

          <div class="row">
            {{-- MEJA TABLE  --}}
            <div class="col-md-9">
              <table class="table table-bordered table-striped table-hover">
                <tr>
                  <th>No</th>
                  <th>Nama</th>
                  <th>Username</th>
                  <th>Password</th>
                  <th colspan="2">Aksi</th>
                </tr>

                @php $i = 1; @endphp

                @foreach ($meja as $row)
                  <tr>
                    <td>{{ $i++ }}</td>
                    <td><input type="text" form="form-update{{ $row->id_meja }}" class="form-control" name="nama" value="{{ $row->nama }}"></td>
                    {{-- <td><input type="text" form="form-update{{ $row->id_meja }}" class="form-control" name="username" value="{{ $row->nama }}"></td> --}}
                    {{-- <td><input type="text" form="form-update{{ $row->id_meja }}" class="form-control" name="password" value="{{ $row->nama }}"></td> --}}
                    <td>{{ $row->username }}</td>
                    <td>{{ $row->password }}</td>
                    <td>

                      {{-- FORM DELETE  --}}
                      <form id="form-delete{{ $row->id_meja }}" action="/meja/delete/{{ $row->id_meja }}" method="post">
                        {{ csrf_field() }}
                        {{ method_field('delete') }}
                      </form>

                      {{-- FORM UPDATE  --}}
                      <form id="form-update{{ $row->id_meja }}" action="/meja/edit/{{ $row->id_meja }}" method="post">
                        {{ csrf_field() }}
                        {{ method_field('put') }}
                      </form>

                      {{-- BUTTON DELETE  --}}
                      <button type="submit" form="form-delete{{ $row->id_meja }}" class="btn btn-danger">Hapus</button>
                      {{-- BUTTON UPDATE  --}}
                      <button type="submit" form="form-update{{ $row->id_meja }}" class="btn btn-warning">Ubah</button>

                    </td>
                  </tr>
                @endforeach

              </table>
            </div>

            {{-- FORM TAMBAH MEJA  --}}
            <div class="col-md-3">
              <h4>Tambah Meja</h4>
              <form class="form" action="{{ url('/meja/create') }}" method="post">

                {{-- csrf field  --}}
                {{ csrf_field() }}

                {{-- nama field  --}}
                <div class="form-group {{ $errors->has('nama') ? 'has-error' : '' }}">

                  <input type="text" class="form-control" name="nama" id="nama" value="{{ old('nama') }}" placeholder="Masukkan Nama Meja" required>

                  @if ($errors->has('nama'))
                    <span class="help-block">
                      <strong>{{ $errors->first('nama') }}</strong>
                    </span>
                  @endif
                </div>

                {{-- username field  --}}
                <div class="form-group {{ $errors->has('username') ? 'has-error' : '' }}">

                  <input type="text" class="form-control" name="username" id="username" value="{{ old('username') }}" placeholder="Masukkan Username" required>

                  @if ($errors->has('username'))
                    <span class="help-block">
                      <strong>{{ $errors->first('username') }}</strong>
                    </span>
                  @endif
                </div>

                {{-- password field  --}}
                <div class="form-group {{ $errors->has('password') ? 'has-error' : '' }}">

                  <input type="text" class="form-control" name="password" id="password" value="{{ old('password') }}" placeholder="Masukkan Password" required>

                  @if ($errors->has('password'))
                    <span class="help-block">
                      <strong>{{ $errors->first('password') }}</strong>
                    </span>
                  @endif
                </div>

                <div class="form-group">
                  <button type="submit" class="btn btn-primary" name="button">Simpan</button>
                </div>
              </form>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>

@endsection
