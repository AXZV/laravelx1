<?php $__env->startSection('content'); ?>

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

<!-- /////////////////////////////// Toast CTRL /////////////////////////////// -->

    <?php if(session()->has('successedit')): ?>
    <?php  echo 
            "<script> 
                    toastr.success('Sukses update data pegawai');
            </script>"; ?>
    <?php endif; ?>
    <?php if(session()->has('successadd')): ?>
    <?php  echo 
            "<script> 
                    toastr.success('Sukses tambah data pegawai');
            </script>"; ?>
    <?php endif; ?>
    <?php if(session()->has('successdelete')): ?>
    <?php  echo 
            "<script> 
                    toastr.success('Sukses hapus data pegawai');
            </script>"; ?>
    <?php endif; ?>


<div class="rowx">
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
                <table class="ui celled table" id="redx" width="100%" cellspacing="0">
                <thead class="thead-dark">
                    <tr style="text-align:center">
                    <th>No</th>
                    <th>Nama</th>
                    <th>Alamat</th>
                    <th>Email</th>
                    <th>Telepon</th>
                    <th width="160">Aksi</th>
                    </tr>
                </thead>
                <tfoot class="thead-dark">
                    <tr style="text-align:center">
                    <th>No</th>
                    <th>Nama</th>
                    <th>Alamat</th>
                    <th>Email</th>
                    <th>Telepon</th>
                    <th>Aksi</th>
                    </tr>
                </tfoot>
                <tbody>
                    <?php $i=1 ?>
                <?php $__currentLoopData = $pegawai; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $p): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    
                    <tr>
                        <td style="text-align:center" ><?php echo $i++ ?></td>
                        <td> <?php echo e($p->nama); ?> </td>
                        <td> <?php echo e($p->alamat); ?> </td>
                        <td> <?php echo e($p->email); ?></td>
                        <td> <?php echo e($p->nomor_telepon); ?></td>
                        <td style="text-align:center">  
                            <a href="javascript:;" data-toggle="modal" onclick="deleteData(<?php echo e($p->id); ?>)" data-target="#DeleteModal" class="btn btn-sm btn-danger"> Delete</a>
                            <a href="javascript:;" data-toggle="modal" onclick="editData( '<?php echo e($p->id); ?>', '<?php echo e($p->nama); ?>', '<?php echo e($p->alamat); ?>', '<?php echo e($p->email); ?>', '<?php echo e($p->nomor_telepon); ?>')" data-target="#modaledit" class="btn btn-sm btn-primary"> Edit</a>
                        </td>
                    </tr>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
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
            <p class="heading lead">Tambah Data Pegawai</p>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true" class="white-text">&times;</span>
            </button>
        </div>

        <form action="/admin_dasboard/proses_tambah_pegawai" method="POST">
        <?php echo e(csrf_field()); ?>

        <!--Body-->
            <div class="modal-body">
                    <div class="md-form mb-5">
                        <input type="text" name="nama" id="form1" class="form-control validate">
                        <label for="form1">Nama</label>
                    </div>

                    <div class="md-form mb-5">
                        <input type="text" name="alamat" id="form2" class="form-control validate">
                        <label for="form2">Alamat</label>
                    </div>

                    <div class="md-form mb-5">
                        <input type="email" name="email" id="form3" class="form-control validate">
                        <label for="form3">Email</label>
                    </div>

                    <div class="md-form">
                        <input type="text" name="telepon" id="form4" class="form-control validate">
                        <label for="form4">Telepon</label>
                    </div>

            </div>
            <!--Footer-->
            <div class="modal-footer justify-content-center">
                <!-- <a type="submit" href="/admin_dasboard/proses_tambah_pegawai" class="btn waves-effect btnx">Simpan</a> -->
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
    <?php echo e(csrf_field()); ?>

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
            var url = "/admin_dasboard/proses_hapus_pegawai/"+id;
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

        <form action="/admin_dasboard/proses_edit_pegawai" id="editForm" method="post">
        <?php echo e(csrf_field()); ?>

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
                        <label>Email</label>
                        <input type="email" name="email" id="form3x" class="form-control" autofocus>
                        
                    </div>

                    <div class="md-form">
                        <label >Telepon</label>
                        <input type="text" name="telepon" id="form4x" class="form-control" autofocus>
                        
                    </div>

            </div>
            <!--Footer-->
            <div class="modal-footer justify-content-center">
                <!-- <a type="submit" href="/admin_dasboard/proses_tambah_pegawai" class="btn waves-effect btnx">Simpan</a> -->
                <button type="submit" class="btn btn-primary btn-sm" >Simpan</button>
                <button type="button" class="btn btn-light btn-sm waves-effect" data-dismiss="modal">Batal</button>
            </div>
            
        </form>
    </div>
        <!--/.Content-->
    </div>

    </div>




    <script type="text/javascript">
        function editData(id, nama, alamat, email, telepon)
        {
            document.getElementById("form0x").value = id;
            document.getElementById("form1x").value = nama;
            document.getElementById("form2x").value = alamat;
            document.getElementById("form3x").value = email;
            document.getElementById("form4x").value = telepon;
        }

    </script>




<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.admin_layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\laravel02\resources\views/admin/tabel_pegawai.blade.php ENDPATH**/ ?>