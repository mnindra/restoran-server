@extends('layout')

@section('content')

  <div class="row">
    <div class="col-md-8 col-md-offset-2">
      <div class="panel panel-default">
        <div class="panel-heading">
          <center>
            <h3 class="panel-title">
              Daftar Pesanan
            </h3>
          </center>
        </div>
        <div class="panel-body">

          <div class="row">
            {{-- PETUGAS TABLE  --}}
            <div class="col-md-12">
              <a href="/pemesanan" class="btn btn-primary">Kembali</a> <br> <br>
              <table class="table table-bordered table-striped table-hover">
                <tr>
                  <th>No</th>
                  <th>Nama</th>
                  <th>Harga</th>
                  <th>Jumlah</th>
                  <th>Subtotal</th>
                </tr>

                @php $i = 1; @endphp

                @foreach ($pemesanan->detail as $row)
                  <tr>
                    <td>{{ $i++ }}</td>
                    <td>{{ $row->menu->nama }}</td>
                    <td>{{ $row->menu->harga }}</td>
                    <td>{{ $row->jumlah }}</td>
                    <td>{{ $row->subtotal }}</td>
                  </tr>
                @endforeach

                <tr>
                  <th colspan="4" align="right">Total</th>
                  <th>{{ $pemesanan->total }}</th>
                </tr>

              </table>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>

@endsection
