@extends('layout')

@section('content')

  <div class="row">
    <div class="col-md-8 col-md-offset-2">
      <div class="panel panel-default">
        <div class="panel-heading">
          <center>
            <h3 class="panel-title">
              Data Petugas
            </h3>
          </center>
        </div>
        <div class="panel-body">

          <div class="row">
            {{-- PETUGAS TABLE  --}}
            <div class="col-md-12">
              <a href="/petugas/create" class="btn btn-primary">Tambah</a> <br> <br>
              <table class="table table-bordered table-striped table-hover">
                <tr>
                  <th>No</th>
                  <th>Nama</th>
                  <th>Username</th>
                  <th>Telp</th>
                  <th colspan="2">Aksi</th>
                </tr>

                @php $i = 1; @endphp

                @foreach ($petugas as $row)
                  <tr>
                    <td>{{ $i++ }}</td>
                    <td>{{ $row->nama }}</td>
                    <td>{{ $row->username }}</td>
                    <td>{{ $row->telp }}</td>
                    <td>
                      <form action="/petugas/delete/{{ $row->id_petugas }}" method="post">
                        {{ csrf_field() }}
                        {{ method_field('delete') }}
                        <button type="submit" class="btn btn-danger">Hapus</button>
                        <button type="button" class="btn btn-warning" onclick="window.location='/petugas/edit/{{ $row->id_petugas }}'">Ubah</button>
                      </form>
                    </td>
                  </tr>
                @endforeach

              </table>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>

@endsection
