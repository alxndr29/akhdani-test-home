@extends('layouts.adminlte')

@section('content')
<div class="container-fluid">
    <nav>
        <div class="nav nav-tabs" id="nav-tab" role="tablist">
            <a class="nav-item nav-link active" id="nav-home-tab" data-toggle="tab" href="#nav-home" role="tab" aria-controls="nav-home" aria-selected="true">Pengajuan Baru</a>
            <a class="nav-item nav-link" id="nav-profile-tab" data-toggle="tab" href="#nav-profile" role="tab" aria-controls="nav-profile" aria-selected="false">History Pengajuan</a>
        </div>
    </nav>
    <div class="tab-content" id="nav-tabContent">
        <div class="tab-pane fade show active" id="nav-home" role="tabpanel" aria-labelledby="nav-home-tab">
            <br>
            <div class="row">
                <div class="col">
                    <div class="card">
                        <div class="card-header">
                            <div class="d-flex justify-content-between">
                                <div class="p-1 my-auto">
                                    Data Pengajuan Baru
                                </div>
                            </div>
                        </div>
                        <div class="card-body">
                            <table id="example1" class="table table-bordered table-striped text-center">
                                <thead>
                                    <tr>
                                        <th style="width:10%">No</th>
                                        <th>Nama</th>
                                        <th>Kota</th>
                                        <th>Tanggal</th>
                                        <th>Keterangan</th>
                                        <th>Status</th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                                <tbody style="vertical-align: top;">
                                    @foreach ($pengajuan_baru as $key => $value)
                                    <tr>
                                        <td style="width:10%">{{$key+1}}</td>
                                        <td>{{$value->user->name}}</td>
                                        <td>{{$value->kota_perdin_asal->nama}} -> {{$value->kota_perdin_tujuan->nama}}</td>
                                        <td>{{$value->tanggal_awal}} - {{$value->tanggal_awal}} {{$value->total_hari}}</td>
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
                                        <td>
                                            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModalCenter-{{$value->id}}">
                                                Detail
                                            </button>
                                        </td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="tab-pane fade" id="nav-profile" role="tabpanel" aria-labelledby="nav-profile-tab">
            <br>
            <div class="row">
                <div class="col">
                    <div class="card">
                        <div class="card-header">
                            <div class="d-flex justify-content-between">
                                <div class="p-1 my-auto">
                                    History Pengajuan
                                </div>
                            </div>
                        </div>
                        <div class="card-body">
                            <table id="example1" class="table table-bordered table-striped text-center">
                                <thead>
                                    <tr>
                                        <th style="width:10%">No</th>
                                        <th>Nama</th>
                                        <th>Kota</th>
                                        <th>Tanggal</th>
                                        <th>Keterangan</th>
                                        <th>Status</th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                                <tbody style="vertical-align: top;">
                                    @foreach ($history as $key => $value)
                                    <tr>
                                        <td style="width:10%">{{$key+1}}</td>
                                        <td>{{$value->user->name}}</td>
                                        <td>{{$value->kota_perdin_asal->nama}} -> {{$value->kota_perdin_tujuan->nama}}</td>
                                        <td>{{$value->tanggal_awal}} - {{$value->tanggal_awal}} {{$value->total_hari}}</td>
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
                                        <td>
                                            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModalCenter-{{$value->id}}">
                                                Detail
                                            </button>
                                        </td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Modal -->
@foreach ($pengajuan_baru as $key => $value)
<div class="modal fade" id="exampleModalCenter-{{$value->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLongTitle">Form Tambah Pulau</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="form-group">
                    <label>Nama</label>
                    <input type="text" class="form-control" value="{{$value->user->name}}" readonly>
                </div>
                <div class="form-row">
                    <div class="form-group col-md-6">
                        <label for="inputState">Kota Asal</label>
                        <input type="text" class="form-control" value="{{$value->kota_perdin_asal->nama}}" readonly>
                    </div>
                    <div class="form-group col-md-6">
                        <label for="inputState">Kota Tujuan</label>
                        <input type="text" class="form-control" value="{{$value->kota_perdin_tujuan->nama}}" readonly>
                    </div>
                </div>
                <div class="form-row">
                    <div class="form-group col-md-6">
                        <label for="inputState">Tanggal Awal</label>
                        <input type="text" class="form-control" value="{{$value->tanggal_awal}}" readonly>
                    </div>
                    <div class="form-group col-md-6">
                        <label for="inputState">Tanggal Akhir</label>
                        <input type="text" class="form-control" value="{{$value->tanggal_akhir}}" readonly>
                    </div>
                </div>
                <div class="form-group">
                    <label>Keterangan</label>
                    <textarea class="form-control" rows="3" readonly>{{$value->keterangan}}</textarea>
                </div>
                <div class="d-flex justify-content-center">
                    <div class="p-3">
                        Total Hari:
                        <br>
                        {{$value->total_hari}}
                    </div>
                    <div class="p-3">
                        Jarak Tempuh:
                        <br>
                        {{$value->jarak}} Km.
                        <br>
                        @if ($value->jarak >= 60 && $value->kota_perdin_asal->provinsi->id == $value->kota_perdin_tujuan->provinsi->id)
                        Rp. {{number_format(200000)}}.-/ Hari
                        <br>
                        Jarak >= 60Km dan Provinsi Sama.
                        @endif
                        @if ($value->jarak >= 60 && $value->kota_perdin_asal->provinsi->id != $value->kota_perdin_tujuan->provinsi->id && $value->kota_perdin_asal->provinsi->pulau->id == $value->kota_perdin_tujuan->provinsi->pulau->id)
                        Rp. {{number_format(250000)}}.-/ Hari
                        <br>
                        Jarak >= 60Km dan Pulau Sama.
                        @endif
                        @if ($value->kota_perdin_asal->luar_negeri == 1 && $value->kota_perdin_tujuan->luar_negeri == 1)
                        USD. {{number_format(50)}}.-/ Hari
                        <br>
                        Diluar Negeri.
                        @endif
                    </div>
                    <div class="p-3">
                        Total Uang Perdin:
                        <br>
                        Rp. {{number_format($value->total_uang)}}
                    </div>
                </div>
                <div class="d-flex justify-content-center">
                    <div class="p-3">
                        <a class="btn btn-danger" href="{{route('divisisdm.setuju',$value->id)}}">Setuju</a>
                    </div>
                    <div class="p-3">
                        <a class="btn btn-primary" href="{{route('divisisdm.tolak',$value->id)}}">Tolak</a>
                    </div>
                </div>

            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
            </div>
        </div>
    </div>
</div>
@endforeach
@foreach ($history as $key => $value)
<div class="modal fade" id="exampleModalCenter-{{$value->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLongTitle">Form Tambah Pulau</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="form-group">
                    <label>Nama</label>
                    <input type="text" class="form-control" value="{{$value->user->name}}" readonly>
                </div>
                <div class="form-row">
                    <div class="form-group col-md-6">
                        <label for="inputState">Kota Asal</label>
                        <input type="text" class="form-control" value="{{$value->kota_perdin_asal->nama}}" readonly>
                    </div>
                    <div class="form-group col-md-6">
                        <label for="inputState">Kota Tujuan</label>
                        <input type="text" class="form-control" value="{{$value->kota_perdin_tujuan->nama}}" readonly>
                    </div>
                </div>
                <div class="form-row">
                    <div class="form-group col-md-6">
                        <label for="inputState">Tanggal Awal</label>
                        <input type="text" class="form-control" value="{{$value->tanggal_awal}}" readonly>
                    </div>
                    <div class="form-group col-md-6">
                        <label for="inputState">Tanggal Akhir</label>
                        <input type="text" class="form-control" value="{{$value->tanggal_akhir}}" readonly>
                    </div>
                </div>
                <div class="form-group">
                    <label>Keterangan</label>
                    <textarea class="form-control" rows="3" readonly>{{$value->keterangan}}</textarea>
                </div>
                <div class="d-flex justify-content-center">
                    <div class="p-3">
                        Total Hari:
                        <br>
                        {{$value->total_hari}}
                    </div>
                    <div class="p-3">
                        Jarak Tempuh:
                        <br>
                        {{$value->jarak}} Km.
                        <br>
                        @if ($value->jarak >= 60 && $value->kota_perdin_asal->provinsi->id == $value->kota_perdin_tujuan->provinsi->id)
                        Rp. {{number_format(200000)}}.-/ Hari
                        <br>
                        Jarak >= 60Km dan Provinsi Sama.
                        @endif
                        @if ($value->jarak >= 60 && $value->kota_perdin_asal->provinsi->id != $value->kota_perdin_tujuan->provinsi->id && $value->kota_perdin_asal->provinsi->pulau->id == $value->kota_perdin_tujuan->provinsi->pulau->id)
                        Rp. {{number_format(250000)}}.-/ Hari
                        <br>
                        Jarak >= 60Km dan Pulau Sama.
                        @endif
                        @if ($value->kota_perdin_asal->luar_negeri == 1 && $value->kota_perdin_tujuan->luar_negeri == 1)
                        USD. {{number_format(50)}}.-/ Hari
                        <br>
                        Diluar Negeri.
                        @endif
                    </div>
                    <div class="p-3">
                        Total Uang Perdin:
                        <br>
                        Rp. {{number_format($value->total_uang)}}
                    </div>
                </div>
                <!-- <div class="d-flex justify-content-center">
                    <div class="p-3">
                        <a class="btn btn-danger" href="{{route('divisisdm.setuju',$value->id)}}">Setuju</a>
                    </div>
                    <div class="p-3">
                        <a class="btn btn-primary" href="{{route('divisisdm.tolak',$value->id)}}">Tolak</a>
                    </div>
                </div> -->
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
            </div>
        </div>
    </div>
</div>
@endforeach

@endsection

@section('js')
<script type="text/javascript">
    $(document).ready(function() {
        $("#example2").DataTable();
    });
</script>
@endsection