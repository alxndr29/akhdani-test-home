@extends('layouts.adminlte')

@section('content')
<div class="container-fluid">
    <!-- <div class="row">
        <div class="clearfix hidden-md-up"></div>
        <div class="col-12 col-sm-6 col-md-3">
            <div class="info-box mb-3">
                <span class="info-box-icon bg-success elevation-1"><i class="fas fa-shopping-cart"></i></span>
                <div class="info-box-content">
                    <span class="info-box-text">Menunggu Konfirmasi</span>
                    <span class="info-box-number">100 Transaksi</span>
                </div>
            </div>
        </div>
    </div> -->
    <div class="row">
        <div class="col">
            <div class="card">
                <div class="card-header">
                    <div class="d-flex justify-content-between">
                        <div class="p-1 my-auto">
                            Data Provinsi
                        </div>
                        <div class="p-1">
                            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModalCenter">
                                Tambah Perdin
                            </button>
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    <table id="example1" class="table table-bordered table-striped text-center">
                        <thead>
                            <tr>
                                <th style="width:10%">No</th>
                                <th>Kota</th>
                                <th>Tanggal</th>
                                <th>Keterangan</th>
                                <th>Status</th>

                            </tr>
                        </thead>
                        <tbody style="vertical-align: top;">
                            @foreach ($perdin as $key => $value)
                            <tr>
                                <td style="width:10%">{{$key+1}}</td>
                                <td>{{$value->kota_perdin_asal->nama}} -> {{$value->kota_perdin_tujuan->nama}}</td>
                                <td>
                                    {{\Carbon\Carbon::parse($value->tanggal_awal)->format('d F Y')}} - {{\Carbon\Carbon::parse($value->tanggal_akhir)->format('d F Y')}} ({{$value->total_hari}}) Hari
                                </td>
                                <td>{{$value->keterangan}}</td>
                                <td>
                                    @if($value->status == "pending")
                                    <span class="badge badge-primary">{{$value->status}}</span>
                                    @elseif($value->status == "setuju")
                                    <span class="badge badge-success">{{$value->status}}</span>
                                    @elseif($value->status == "tolak")
                                    <span class="badge badge-danger">{{$value->status}}</span>
                                    @endif
                                </td>
                                <!-- <td>
                                    <button type="button" onClick="detail({{$value->id}})" class="btn btn-primary">Detail</button>
                                </td> -->
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Modal -->
<div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLongTitle">Form Tambah Perdin</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form method="post" action="{{route('user.store')}}">
                    @csrf
                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label for="inputState">Kota Asal</label>
                            <select class="form-control" name="kota_asal" id="kota_asal">
                                <option selected>Pilih Kota Asal</option>
                                @foreach ($kota as $value)
                                <option value="{{$value->id}}">{{$value->nama}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group col-md-6">
                            <label for="inputState">Kota Tujuan</label>
                            <select class="form-control" name="kota_tujuan" id="kota_tujuan">
                                <option selected>Pilih Kota Tujuan</option>
                                @foreach ($kota as $value)
                                <option value="{{$value->id}}">{{$value->nama}}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label for="inputEmail4">Tanggal Awal</label>
                            <input type="date" class="form-control" name="tanggal_awal" id="tanggal_awal" required>
                        </div>
                        <div class="form-group col-md-6">
                            <label for="inputEmail4">Tanggal Akhir</label>
                            <input type="date" class="form-control" name="tanggal_akhir" id="tanggal_akhir" required>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-12">
                            <label for="exampleFormControlTextarea1">Keterangan</label>
                            <textarea class="form-control" id="exampleFormControlTextarea1" rows="3" name="keterangan" required></textarea>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-12">
                            <label for="exampleFormControlTextarea1">Total Perjalanan Dinas (Hari) </label>
                            <input type="number" class="form-control" name="total_hari" id="total_hari" required readonly>
                        </div>
                    </div>
                    <button type="submit" class="btn btn-primary">Simpan</button>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
            </div>
        </div>
    </div>
</div>
@endsection

@section('js')
<script type="text/javascript">
    $(document).ready(function() {

    });
    $("#kota_tujuan").on('change', function() {
        // alert('hello');
        if ($("#kota_tujuan").val() == $("#kota_asal").val()) {
            $("#kota_tujuan").prop('selectedIndex', 0);
            alert('kota tidak boleh sama');
        }
    });
    $("#tanggal_akhir").on('change', function() {
        var date1 = new Date(document.getElementById("tanggal_awal").value);
        var date2 = new Date(document.getElementById("tanggal_akhir").value);
        if (date2 < date1) {
            $("#total_hari").val('');
            alert('tanggal akhir tidak boleh lebih kecil');
        } else {
            var difference = date2 - date1;
            var days = difference / (24 * 3600 * 1000);
            $("#total_hari").val(days);
        }
    });

    function detail(id) {
        alert(id);
    }
</script>
@endsection