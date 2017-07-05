@extends('layout')

@section('content')

  <div class="row">
    <div class="col-md-8 col-md-offset-2">
      <div class="panel panel-default">
        <div class="panel-heading">
          <center>
            <h3 class="panel-title">
              Kategori Menu
            </h3>
          </center>
        </div>
        <div class="panel-body">

          <div class="row">
            {{-- KATEGORI TABLE  --}}
            <div class="col-md-8">
              <table class="table table-bordered table-striped table-hover">
                <tr>
                  <th>No</th>
                  <th>Nama</th>
                  <th colspan="2">Aksi</th>
                </tr>

                @php $i = 1; @endphp

                @foreach ($kategori as $row)
                  <tr>
                    <td>{{ $i++ }}</td>
                    <td><input type="text" form="form-update{{ $row->id_kategori }}" class="form-control" name="nama" value="{{ $row->nama }}"></td>
                    <td>

                      {{-- FORM DELETE  --}}
                      <form id="form-delete{{ $row->id_kategori }}" action="/kategori/delete/{{ $row->id_kategori }}" method="post">
                        {{ csrf_field() }}
                        {{ method_field('delete') }}
                      </form>

                      {{-- FORM UPDATE  --}}
                      <form id="form-update{{ $row->id_kategori }}" action="/kategori/edit/{{ $row->id_kategori }}" method="post">
                        {{ csrf_field() }}
                        {{ method_field('put') }}
                      </form>

                      {{-- BUTTON DELETE  --}}
                      <button type="submit" form="form-delete{{ $row->id_kategori }}" class="btn btn-danger">Hapus</button>
                      {{-- BUTTON UPDATE  --}}
                      <button type="submit" form="form-update{{ $row->id_kategori }}" class="btn btn-warning">Ubah</button>

                    </td>
                  </tr>
                @endforeach

              </table>
            </div>

            {{-- FORM TAMBAH KATEGORI  --}}
            <div class="col-md-4">
              <h4>Tambah Kategori</h4>
              <form class="form" action="{{ url('/kategori/create') }}" method="post">

                {{-- csrf field  --}}
                {{ csrf_field() }}

                {{-- nama field  --}}
                <div class="form-group {{ $errors->has('nama') ? 'has-error' : '' }}">

                  <input type="text" class="form-control" name="nama" id="nama" value="{{ old('nama') }}" placeholder="Masukkan Nama Kategori" required>

                  @if ($errors->has('nama'))
                    <span class="help-block">
                      <strong>{{ $errors->first('nama') }}</strong>
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
