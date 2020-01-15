<?php use App\Http\Controllers\Konverter\KonverterController; ?>
<script type="text/javascript" src="{{ URL::asset('js/konverter.js') }}"></script>

@extends('layouts.admin_layout')
@section('content')


<style>
    .forminput
    {
        width:500px;
        margin:0 auto;
        padding:10px;    
    }
    /* #redx_wrapper
    {
        background-color:#2a2b3d;
    } */
    .rowx
    {
        padding:1em;
    }
    .thead
    {
        background-color:#7283a7;
        color:white;
        border-color:#7283a7;
    }
    .btnx
    {
        color:white;
    }



</style>

<script>
    $(document).ready(function() {
         $('#redx').DataTable();
    } );
</script>

<div class="rowx">
    {{$totalsaldo}}
    <div class="card shadow border-0 mb-4">
        <div class="card-header py-3">
            <div class="row">
                <div class="col d-flex">
                    <h5 class="mb-0 font-weight-bold" style="align-self: center;">Daftar Pegawai</h5>
                </div>
                <div class="col-auto">
                    <a class="btn btn-sm btn-success" data-toggle="modal" data-target="#orangeModalSubscription">Add Data</a>
                </div>
            </div>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="ui celled table" style="text-align:center;" id="redx" width="100%" cellspacing="0">
                <thead class="thead-dark">
                    <tr style="text-align:center">
                    <th>No</th>
                    <th>Nama Siswa</th>
                    <th>Alamat</th>
                    <th>Telepon</th>
                    <th>Saldo</th>
                    <th width="160">Aksi</th>
                    </tr>
                </thead>
                <tfoot class="thead-dark">
                    <tr style="text-align:center">
                    <th>No</th>
                    <th>Nama</th>
                    <th>Alamat</th>
                    <th>Telepon</th>
                    <th>Saldo</th>
                    <th>Aksi</th>
                    </tr>
                </tfoot>
                <tbody>
                <?php $no = 1 ?>
                    @foreach ($data as $d)
                    <tr>
                        <td><?php echo $no++ ?></td>
                        <td>{{$d -> nama_siswa}}</td>
                        <td>{{$d -> alamat}}</td>
                        <td>{{$d -> nomor_telepon}}</td>
                        <td><?php echo KonverterController::normal($d -> saldo); ?></td>
                        <td>
                            <?php $saldox = KonverterController::normal($d -> saldo); ?>
                            <a href="javascript:;" data-toggle="modal" onclick="deleteData({{$d->id}})" data-target="#DeleteModal" class="btn btn-sm btn-danger"> Delete</a>
                            <a href="javascript:;" data-toggle="modal" onclick="editData( '{{$d->id}}', '{{$d->nama_siswa}}', '{{$d->alamat}}', '{{$d->nomor_telepon}}', '<?php echo $saldox ?>')" data-target="#modaledit" class="btn btn-sm btn-primary"> Edit</a>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

<!-- /////////////////////////////// Modal Tambah Data /////////////////////////////// -->

    <div class="modal fade" id="orangeModalSubscription" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
    aria-hidden="true">
    <div class="modal-dialog modal-notify" role="document">
        <!--Content-->
        <div class="modal-content">
        <!--Header-->
        <div class="modal-header">
            <p class="heading lead">Tambah Data</p>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true" class="white-text">&times;</span>
            </button>
        </div>

        <form action="/admin_dasboard/crud_add" method="POST">
        {{ csrf_field() }}
        <!--Body-->
            <div class="modal-body">
                    <div class="md-form mb-5">
                        <input type="text" name="nama" id="form1" class="form-control validate">
                        <label for="form1">Nama Siswa</label>
                    </div>

                    <div class="md-form mb-5">
                        <input type="text" name="alamat" id="form2" class="form-control validate">
                        <label for="form2">Alamat</label>
                    </div>

                    <div class="md-form">
                        <input type="text" name="telepon" id="form4" class="form-control validate">
                        <label for="form4">Telepon</label>
                    </div>

                    <div class="md-form">
                        <input type="text" id="saldo" name="saldo" id="form4" class="form-control validate">
                        <label for="form4">Saldo</label>
                    </div>

            </div>
            <!--Footer-->
            <div class="modal-footer justify-content-center">
                <button class="btn waves-effect btnx" type="submit" value="Simpan Data">Simpan
            </div>
            
        </form>
    </div>
        <!--/.Content-->
    </div>

    </div>

<!-- /////////////////////////////// Modal Hapus Data /////////////////////////////// -->

   <!-- Central Modal Medium Danger -->
    <div class="modal fade" id="DeleteModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
    aria-hidden="true">
    <div class="modal-dialog modal-notify modal-danger" role="document">
    <!--Content-->
    <form action="" id="deleteForm" method="post">
    {{ csrf_field() }}
    <div class="modal-content">
        <!--Header-->
        <div class="modal-header">
        <p class="heading lead">Konfirmasi hapus data </p>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true" class="white-text">&times;</span>
        </button>
        </div>

        <!--Body-->
        <div class="modal-body">
        <div class="text-center">
        <!-- <i class="fas fa-trash-alt"></i> -->
            <i class="fas fa-trash-alt fa-4x mb-3 animated rotateIn"></i>
            <p>Apakah anda yakin akan menghapus data</p>
            <h2><span class="badge"></span></h2>
        </div>
        </div>

        <!--Footer-->
        <div class="modal-footer justify-content-center">
        <button type="submit" name="" class="btn btn-danger" data-dismiss="modal" onclick="formSubmit()">Yes, Delete</button>
        <button type="button" class="btn btn-light waves-effect" data-dismiss="modal">Batal</button>
        </div>

    </div>
    </form>
    <!--/.Content-->
    </div>
    </div>
    <!-- Central Modal Medium Danger-->




    <script type="text/javascript">
        function deleteData(id)
        {
            var id = id;
            var url = "/admin_dasboard/crud_del/"+id;
            $("#deleteForm").attr('action', url);
        }

        function formSubmit()
        {
            $("#deleteForm").submit();
        }
    </script>


<!-- /////////////////////////////// Modal Edit Data /////////////////////////////// -->

    <div class="modal fade" id="modaledit" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
    aria-hidden="true">
    <div class="modal-dialog modal-notify" role="document">
        <!--Content-->
        <div class="modal-content">
        <!--Header-->
        <div class="modal-header">
            <p class="heading lead">Edit Data Pegawai</p>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true" class="white-text">&times;</span>
            </button>
        </div>

        <form action="/admin_dasboard/crud_edit" id="editForm" method="post">
        {{ csrf_field() }}
        <!--Body-->
            <div class="modal-body">

                    <input type="hidden" name="id" id="form0x" class="form-control">

                    <div class="md-form mb-5">
                        <label >Nama</label>
                        <input type="text" name="nama" id="form1x" class="form-control" autofocus>
                        
                    </div>

                    <div class="md-form mb-5">
                        <label >Alamat</label>
                        <input type="text" name="alamat" id="form2x" class="form-control" autofocus>
                        
                    </div>

                    <div class="md-form mb-5">
                        <label>Telepon</label>
                        <input type="text" name="telepon" id="form3x" class="form-control" autofocus>
                        
                    </div>

                    <div class="md-form">
                        <label >Saldo</label>
                        <input type="text" name="saldo" id="form4x" class="form-control" autofocus>
                        
                    </div>

            </div>
            <!--Footer-->
            <div class="modal-footer justify-content-center">
                <button type="submit" class="btn btn-primary btn-sm" >Simpan</button>
                <button type="button" class="btn btn-light btn-sm waves-effect" data-dismiss="modal">Batal</button>
            </div>
            
        </form>
    </div>
        <!--/.Content-->
    </div>

    </div>




    <script type="text/javascript">
        function editData(id, nama_siswa, alamat, telepon, saldo)
        {
            document.getElementById("form0x").value = id;
            document.getElementById("form1x").value = nama_siswa;
            document.getElementById("form2x").value = alamat;
            document.getElementById("form3x").value = telepon;
            document.getElementById("form4x").value = saldo;
        }

    </script>

    <script>

        var rupiah = document.getElementById("saldo");
        rupiah.addEventListener("keyup", function(e) {

        rupiah.value = formatRupiah(this.value, "Rp. ");

        });
    </script>
    <script>
        var rupiah = document.getElementById("form4x");
        rupiah.addEventListener("keyup", function(e) {
        rupiah.value = formatRupiah(this.value, "Rp. ");
        });
    </script>





@endsection