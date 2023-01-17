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
                            Menunggu Pengiriman
                        </div>
                        <div class="p-1">
                            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModalCenter">
                                Tambah Kota
                            </button>

                        </div>
                    </div>
                </div>
                <div class="card-body">
                    <table id="example1" class="table table-bordered table-striped text-center">
                        <thead>
                            <tr>
                                <th style="width:10%">No</th>
                                <th>Nama Kota</th>
                                <th>Provinsi</th>
                                <th>Pulau</th>
                                <th>Luar Negeri</th>
                                <th>Latitude</th>
                                <th>Longitude</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody style="vertical-align: top;">
                            @foreach ($kota as $key => $value)
                            <tr>
                                <td>{{$key+1}}</td>
                                <td>{{$value->nama_kota}}</td>
                                <td>{{$value->provinsi}}</td>
                                <td>{{$value->pulau}}</td>
                                <td>{{$value->luar_negeri}}</td>
                                <td>{{$value->latitude}}</td>
                                <td>{{$value->longitude}}</td>
                                <td>
                                    <button class="btn btn-primary">Delete</button>
                                    <button class="btn btn-primary">Update</button>
                                    </a>
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
                <h5 class="modal-title" id="exampleModalLongTitle">Modal title</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form method="post" action="{{route('kota.store')}}">
                    @csrf
                    <div class="form-group">
                        <label for="exampleFormControlInput1">Email address</label>
                        <input type="text" class="form-control" id="exampleFormControlInput1" placeholder="name@example.com" name="nama_kota">
                    </div>
                    <div class="form-group">
                        <label for="exampleFormControlSelect1">Example select</label>
                        <select class="form-control" id="exampleFormControlSelect1" name="provinsi">
                            <option>1</option>
                            <option>2</option>
                            <option>3</option>
                            <option>4</option>
                            <option>5</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="exampleFormControlSelect1">Example select</label>
                        <select class="form-control" id="exampleFormControlSelect1" name="pulau">
                            <option>1</option>
                            <option>2</option>
                            <option>3</option>
                            <option>4</option>
                            <option>5</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="exampleFormControlSelect1">Example select</label>
                        <select class="form-control" id="exampleFormControlSelect1" name="luar_negeri">
                            <option selected>Dalam Negeri</option>
                            <option>Luar Negeri</option>
                           
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="exampleFormControlInput1">Latitude</label>
                        <input type="text" class="form-control" placeholder="name@example.com" name="latitude" id="latitude" required>
                    </div>
                    <div class="form-group">
                        <label for="exampleFormControlInput1">Longitude</label>
                        <input type="text" class="form-control" placeholder="name@example.com" name="longitude" id="longitude" required>
                    </div>
                    <div class="form-group">
                        <div id="map" style="height: 300px; width:100%;"></div>
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
    var marker;
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
</script>
@endsection