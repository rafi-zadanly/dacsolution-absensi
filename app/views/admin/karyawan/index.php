<style>
    .input-group-text {
        width: 80px;
    }
</style>

<h3 class="mb-3">Karyawan</h3>

<div class="card shadow mb-4 mt-5">

    <div class="card-header py-3">
        <a href="<?= BASEURL ?>/karyawan/add" class="btn">
            <h5 class="m-0 font-weight-bold text-primary"><i class="fas fa-plus mr-2"></i>Tambah</h5>            
        </a>
    </div>
    <div class="card-body" id="card-body">
        <div class="table-responsive" id="karyawan-table">
            <table class="table table-bordered text-center datatable" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Nama Lengkap</th>
                        <th>Email</th>
                        <th>Role</th>
                        <th>Action</th>                        
                    </tr>
                </thead>                
                <tbody>
                <?php 
                    $i = 1;
                    foreach ($data["karyawan"] as $d) :                     
                ?>
                    <tr>
                        <td><?= $i ?></td>
                        <td><?= $d["full_name"] ?></td>
                        <td><?= $d["email"] ?></td>
                        <td><?= $d["role"] ?></td>
                        <td>
                            <a href="/karyawan/edit/<?= $d["id"] ?>" class="btn btn-primary btn-sm"> 
                                <i class="fas fa-pencil-alt" aria-hidden="true"></i>
                            </a>
                            <button class="btn btn-danger btn-sm" data-toggle="modal" data-target="#karyawanDeleteModal<?= $i ?>">
                                <i class="fas fa-trash" aria-hidden="true"></i>
                            </button>
                        </td>
                    </tr>

                    <!-- Modal Hapus -->
                    <div class="modal fade" id="karyawanDeleteModal<?= $i ?>" tabindex="-1" role="dialog" aria-labelledby="modelTitleId"aria-hidden="true">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title">Hapus data karyawan [<small><?= $d["full_name"] ?></small>] ?</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-footer">
                                    <form action="<?= BASEURL ?>/karyawan/destroy" method="post">
                                        <input type="hidden" name="id_delete" value="<?= $d["id"] ?>">
                                        <button type="submit" class="btn btn-danger">Hapus</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                <?php
                    $i++;
                    endforeach; 
                ?>
                </tbody>
            </table>
        </div>
    </div>
</div>

<script type="text/javascript">
    $('.datatable').DataTable();
</script>
