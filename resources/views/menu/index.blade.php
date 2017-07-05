@extends('layout')

@section('content')


    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <center>
                        <h3 class="panel-title">
                            Daftar Menu
                        </h3>
                    </center>
                </div>
                <div class="panel-body">

                    <div class="row">
                        {{-- PETUGAS TABLE  --}}
                        <div class="col-md-12">
                            <a href="/menu/create" class="btn btn-primary">Tambah</a> <br> <br>
                            <table class="table table-bordered table-striped table-hover">
                                <tr>
                                    <th>No</th>
                                    <th>Kategori</th>
                                    <th>Nama</th>
                                    <th>Harga</th>
                                    <th>Gambar</th>
                                    <th colspan="2">Aksi</th>
                                </tr>

                                @php $i = 1; @endphp

                                @foreach ($menu as $row)
                                    <tr>
                                        <td>{{ $i++ }}</td>
                                        <td>{{ $row->kategori->nama }}</td>
                                        <td>{{ $row->nama }}</td>
                                        <td>{{ $row->harga }}</td>
                                        <td>
                                            <button class="btn btn-primary" data-toggle="modal" data-target="#image_modal{{ $row->id_menu }}">Lihat Gambar</button>
                                        </td>
                                        <td>
                                            <form action="/menu/delete/{{ $row->id_menu }}" method="post">
                                                {{ csrf_field() }}
                                                {{ method_field('delete') }}
                                                <button type="submit" class="btn btn-danger">Hapus</button>
                                                <button type="button" class="btn btn-warning" onclick="window.location='/menu/edit/{{ $row->id_menu }}'">Ubah</button>
                                            </form>
                                        </td>
                                    </tr>

                                    {{-- Modal dialog for display image  --}}
                                    <div class="modal fade" id="image_modal{{ $row->id_menu }}" tabindex="-1" role="dialog" aria-labelledby="" aria-hidden="true">
                                      <div class="modal-dialog">
                                        <div class="modal-content">
                                          <div class="modal-body">
                                              <img class="img-responsive" src="{{ url('/storage/' . $row->gambar) }}" alt="gambar menu">
                                          </div>
                                        </div>
                                      </div>
                                    </div>
                                @endforeach

                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
