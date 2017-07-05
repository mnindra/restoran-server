@extends('layout')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <h3 class="panel-title">Tambah Menu</h3>
                    </div>
                    <div class="panel-body">
                        <form action="/menu/create" method="post" enctype="multipart/form-data">

                            {{-- csrf field  --}}
                            {{ csrf_field() }}

                            {{-- kategori field  --}}
                            <div class="form-group {{ $errors->has('id_kategori') ? 'has-error' : '' }}">
                                <label for="kategori">Kategori</label>

                                <select class="form-control" name="id_kategori" id="kategori" required>
                                    <option disabled selected>Pilih Kategori</option>
                                    @foreach ($kategori as $row)
                                        <option value="{{$row->id_kategori}}" {{ $row->id_kategori == old('id_kategori') ? "selected" : "" }}>{{ $row->nama }}</option>
                                    @endforeach
                                </select>

                                @if ($errors->has('id_kategori'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('id_kategori') }}</strong>
                                    </span>
                                @endif
                            </div>

                            {{-- nama field  --}}
                            <div class="form-group {{ $errors->has('nama') ? 'has-error' : '' }}">
                                <label for="nama">Nama</label>
                                <input type="text" class="form-control" name="nama" id="nama" value="{{ old('nama') }}" placeholder="Masukkan Nama" required>

                                @if ($errors->has('nama'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('nama') }}</strong>
                                    </span>
                                @endif
                            </div>

                            {{-- harga field  --}}
                            <div class="form-group {{ $errors->has('harga') ? 'has-error' : '' }}">
                                <label for="harga">Harga</label>
                                <input type="number" class="form-control" name="harga" id="harga" value="{{ old('harga') }}" placeholder="Masukkan Harga" required>

                                @if ($errors->has('harga'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('harga') }}</strong>
                                    </span>
                                @endif
                            </div>

                            {{-- gambar field  --}}
                            <div class="form-group {{ $errors->has('gambar') ? 'has-error' : '' }}">
                              <label for="gambar">Gambar</label>
                              <input type="file" class="form-control" name="gambar" id="gambar" value="{{ old('gambar') }}" required>

                              @if ($errors->has('gambar'))
                                <span class="help-block">
                                  <strong>{{ $errors->first('gambar') }}</strong>
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
