@extends('layout')

@section('content')

  <div class="row">
    <div class="col-md-8 col-md-offset-2">
      <div class="panel panel-default">
        <div class="panel-heading">
          <center>
            <h3 class="panel-title">
              Data Pemesanan
            </h3>
          </center>
        </div>
        <div class="panel-body">

          <div class="row">
            {{-- PEMESANAN TABLE  --}}
            <div class="col-md-12">
              <table class="table table-bordered table-striped table-hover">
                <tr>
                  <th>No</th>
                  <th>Tanggal</th>
                  <th>Jam</th>
                  <th>Meja</th>
                  <th>Pesanan</th>
                  <th>Total</th>
                  <th>Status</th>
                  <th colspan="2">Aksi</th>
                </tr>

                @php $i = 1; @endphp

                @foreach ($pemesanan as $row)
                  <tr>
                    <td>{{ $i++ }}</td>
                    <td>{{ $row->tanggal }}</td>
                    <td>{{ date('H:i', strtotime($row->jam)) }}</td>
                    <td>{{ $row->meja->nama }}</td>
                    <td>
                        <button type="button" class="btn btn-primary" onclick="window.location='/pemesanan/{{ $row->id_pemesanan }}'">
                          Lihat Pesanan
                        </button>
                    </td>
                    <td>{{ $row->total }}</td>
                    <td>{{ $row->status->nama }}</td>
                    <td>
                        <form action="/pemesanan/edit/{{ $row->id_pemesanan }}" method="post">

                            {{ csrf_field() }}
                            {{ method_field('put') }}

                            @if ($row->status->id_status == 1)
                                <input type="hidden" name="id_status" value="2">
                                <button type="submit" name="button" class="btn btn-primary">Konfirmasi</button>
                            @elseif ($row->status->id_status == 2)
                                <input type="hidden" name="id_status" value="3">
                                <button type="submit" name="button" class="btn btn-primary">Lunas</button>
                            @endif

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
