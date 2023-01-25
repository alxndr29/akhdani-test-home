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
                                <th>Edit</th>
                                <td>Delete</th>
                            </tr>
                        </thead>
                        <tbody style="vertical-align: top;">
                            @foreach ($provinsi as $key => $value )
                            <tr>
                                <td style="width:10%">{{$key+1}}</td>
                                <td>{{$value->pulau->nama}}</td>
                                <td>{{$value->nama}}</td>
                                <td>
                                    <a onClick="modalEdit({{$value->id}})" class="btn btn-primary">Edit</a>
                                </td>
                                <td>
                                    <form action="{{route('provinsi.delete',$value->id)}}" method="post">
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
                <h5 class="modal-title" id="exampleModalLongTitle">Form Tambah Provinsi</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form method="post" action="{{route('provinsi.store')}}">
                    @csrf
                    <div class="form-group">
                        <label for="exampleFormControlSelect1">Nama Pulau</label>
                        <select class="form-control" name="pulau" required>
                            @foreach ($pulau as $value)
                            <option value="{{$value->id}}">{{$value->nama}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label>Nama Provinsi</label>
                        <input type="text" class="form-control" placeholder="Masukan Nama Provinsi" name="nama" required>
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
                        <select class="form-control" id="pulau" name="pulau" required>
                            @foreach ($pulau as $value)
                            <option value="{{$value->id}}">{{$value->nama}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label>Nama</label>
                        <input type="text" class="form-control" placeholder="Masukan Nama Pulau" name="nama" id="nama-edit">
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
@section('js')
<script type="text/javascript">
    $(document).ready(function() {

    });

    function modalEdit(id) {
        $.ajax({
            type: 'GET',
            url: '{{url("provinsi/edit")}}/' + id,
            success: function(result) {
                console.log(result);
                var url = "{{url('provinsi/update')}}/" + id;
                $("#form-modal-edit").attr('action', url);
                $("#nama-edit").val(result.data.nama);
                $("#pulau").val(result.data.id_pulau);
                $("#modal-edit").modal('show');
            },
            error: function(data) {
                console.log(data);
            }
        });
    }
</script>
@endsection