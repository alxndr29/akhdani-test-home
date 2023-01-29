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
                            Data Kota
                        </div>
                        <div class="p-1">
                            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModalCenter">
                                Tambah Data
                            </button>
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    <table id="example1" class="table table-bordered table-striped text-center">
                        <thead>
                            <tr>
                                <th style="width:10%">No</th>
                                <th>Nama Pulau</th>
                                <th>Nama Provinsi</th>
                                <th>Nama Kota</th>
                                <th>Luar Negeri</th>
                                <th>Latitude</th>
                                <th>Longitude</th>
                                <th>Edit</th>
                                <td>Delete</th>
                            </tr>
                        </thead>
                        <tbody style="vertical-align: top;">
                            @foreach ($kota as $key => $value )
                            <tr>
                                <td style="width:10%">{{$key+1}}</td>
                                <td>{{$value->provinsi->pulau->nama}}</td>
                                <td>{{$value->provinsi->nama}}</td>
                                <td>{{$value->nama}}</td>
                                <td>
                                    @if($value->luar_negeri == 1)
                                    Ya
                                    @else
                                    Tidak
                                    @endif
                                </td>
                                <td>{{$value->latitude}}</td>
                                <td>{{$value->longitude}}</td>
                                <td>
                                    <a onClick="modalEdit({{$value->id}})" class="btn btn-primary">Edit</a>
                                </td>
                                <td>
                                    <form action="{{route('kota.delete',$value->id)}}" method="post">
                                        @csrf
                                        @method('delete')
                                        <button type="submit" class="btn btn-danger">Delete</submit>
                                    </form>
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
<!-- Modal -->
<div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLongTitle">Form Ubah Kota</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form method="post" action="{{route('kota.store')}}">
                    @csrf
                    <div class="form-group">
                        <label for="exampleFormControlSelect1">Nama Pulau</label>
                        <select class="form-control" name="pulau" id="pulau" required>
                            <option selected>Pilih..</option>
                            @foreach ($pulau as $value)
                            <option value="{{$value->id}}">{{$value->nama}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="exampleFormControlSelect1">Nama Provinsi</label>
                        <select class="form-control" name="provinsi" id="provinsi" required>

                        </select>
                    </div>
                    <div class="form-group">
                        <label>Nama Kota</label>
                        <input type="text" class="form-control" placeholder="Masukan Nama Provinsi" name="nama" required>
                    </div>
                    <div class="form-group">
                        <div id="map" style="height: 300px; width:100%;"></div>
                    </div>
                    <div class="form-check">
                        <input type="checkbox" class="form-check-input" id="exampleCheck1" name="luar-negeri">
                        <label class="form-check-label" for="exampleCheck1">Luar Negeri</label>
                    </div>
                    <input type="hidden" name="latitude" id="latitude">
                    <input type="hidden" name="longitude" id="longitude">
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
<!-- Modal Edit-->
<div class="modal fade" id="modal-edit" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLongTitle">Form Edit Pulau</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form method="post" action="#" id="form-modal-edit">
                    @method('put')
                    @csrf
                    <div class="form-group">
                        <label for="exampleFormControlSelect1">Nama Pulau</label>
                        <select class="form-control" id="pulau-edit" name="pulau" required>
                            @foreach ($pulau as $value)
                            <option value="{{$value->id}}">{{$value->nama}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="exampleFormControlSelect1">Nama Provinsi</label>
                        <select class="form-control" name="provinsi" id="provinsi-edit" required>
                            @foreach ($provinsi as $value)
                            <option value="{{$value->id}}">{{$value->nama}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label>Nama</label>
                        <input type="text" class="form-control" placeholder="Masukan Nama Pulau" name="nama" id="nama-edit">
                    </div>
                    <div class="form-group">
                        <div id="map-edit" style="height: 300px; width:100%;"></div>
                    </div>
                    <div class="form-check">
                        <input type="checkbox" class="form-check-input" id="luar-negeri-edit" name="luar-negeri">
                        <label class="form-check-label" for="exampleCheck1">Luar Negeri</label>
                    </div>
                    <input type="hidden" name="latitude" id="latitude-edit">
                    <input type="hidden" name="longitude" id="longitude-edit">
                    <button type="submit" class="btn btn-primary">Simpan</button>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
            </div>
        </div>
    </div>
</div>
@section('js')
<script type="text/javascript">
    var marker;
    var marker1;
    var map1;
    $(document).ready(function() {
        var map = L.map('map').setView(["-6.917500", "107.619100"], 7);
        setTimeout(function() {
            map.invalidateSize(true);
        }, 100);
        L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
            maxZoom: 19,
            attribution: '© OpenStreetMap'
        }).addTo(map);
        marker = L.marker(["-6.917500", "107.619100"]).addTo(map);

        function onMapClick(e) {
            console.log(e.latlng);
            $("#latitude").val(e.latlng.lat.toString());
            $("#longitude").val(e.latlng.lng.toString());
            marker.setLatLng(e.latlng);
        }
        map.on('click', onMapClick);
    });
    $("#pulau").on('change', function() {
        getKota(this.value);
    });
    $("#pulau-edit").on('change', function() {
        $.ajax({
            type: 'GET',
            url: '{{url("provinsi/getprovinsi")}}/' + this.value,
            success: function(result) {
                $("#provinsi-edit").empty();
                $.each(result.data, function(i, v) {
                    $("#provinsi-edit").append('<option value="' + v.id + '">' + v.nama + '</option>');
                });
            },
            error: function(data) {
                console.log(data);
            }
        });
    });

    function modalEdit(id) {
        $.ajax({
            type: 'GET',
            url: '{{url("kota/edit")}}/' + id,
            success: function(result) {
                console.log(result);
                var url = "{{url('kota/update')}}/" + id;
                $("#form-modal-edit").attr('action', url);
                $("#nama-edit").val(result.data.nama);
                $("#pulau-edit").val(result.data.provinsi.id_pulau);
                $("#provinsi-edit").val(result.data.id_provinsi);
                $("#latitude-edit").val(result.data.latitude);
                $("#longitude-edit").val(result.data.longitude);
                if (result.data.luar_negeri == 1) {
                    $("#luar-negeri-edit").prop('checked', true);
                } else {
                    $("#luar-negeri-edit").prop('checked', false);
                }
                if (map1 != null) {
                    map1.remove();
                }
                map1 = L.map('map-edit').setView([result.data.latitude, result.data.longitude], 7);
                setTimeout(function() {
                    map1.invalidateSize(true);
                }, 100);
                L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
                    maxZoom: 19,
                    attribution: '© OpenStreetMap'
                }).addTo(map1);
                marker1 = L.marker([result.data.latitude, result.data.longitude]).addTo(map1);

                function onMapClick(e) {
                    $("#latitude-edit").val(e.latlng.lat.toString());
                    $("#longitude-edit").val(e.latlng.lng.toString());
                    marker1.setLatLng(e.latlng);
                }
                map1.on('click', onMapClick);

                $("#modal-edit").modal('show');
            },
            error: function(data) {
                console.log(data);
            }
        });
    }

    function getKota(id) {
        $.ajax({
            type: 'GET',
            url: '{{url("provinsi/getprovinsi")}}/' + id,
            success: function(result) {
                $("#provinsi").empty();
                $.each(result.data, function(i, v) {
                    $("#provinsi").append('<option value="' + v.id + '">' + v.nama + '</option>');
                });
            },
            error: function(data) {
                console.log(data);
            }
        });
    }
</script>
@endsection