<style>
    .input-group-text {
        width: 80px;
    }
</style>

<h3 class="mb-3">Karyawan</h3>

<div class="card shadow mb-4 mt-5">

    <div class="card-header py-3">
        <a href="#" class="btn" data-toggle="modal" data-target="#karyawanAddModal">
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
                            <button class="btn btn-primary btn-sm" data-toggle="modal" data-target="#karyawanEditModal<?= $i ?>"> 
                                <i class="fas fa-pencil-alt" aria-hidden="true"></i>
                            </button>
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
                                    <h5 class="modal-title">Hapus data karyawan "<?= $d["full_name"] ?>" ?</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-footer">
                                    <form action="<?= BASEURL ?>/karyawan/destroy" method="post">
                                        <input type="hidden" name="id_delete" value="<?= $d["id"] ?>">
                                        <button type="submit" class="btn btn-primary">Hapus</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Modal Edit -->
                    <div class="modal fade" id="karyawanEditModal<?= $i ?>" tabindex="-1" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true">
                        <div class="modal-dialog modal-dialog-centered" role="document">
                            <div class="modal-content">
                                <form action="<?= BASEURL ?>/karyawan/store" method="post">
                                    <input type="hidden" name="id_edit" value="<?= $d["id"] ?>">
                                    <div class="modal-header">
                                        <h5 class="modal-title">Edit Karyawan [<small><?= $d["full_name"] ?></small>]</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <div class="modal-body pt-3 pb-2">
                                        <div class="row">
                                            <div class="col-10 offset-1">
                                                <div class="form-group">
                                                    <div class="input-group">
                                                        <div class="input-group-text">Nama</div>
                                                        <input type="text" class="form-control" name="edit_name" aria-describedby="helpId" placeholder="" value="<?= $d["full_name"] ?>">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-10 offset-1">
                                                <div class="form-group">
                                                    <div class="input-group">
                                                        <div class="input-group-text">Email</div>
                                                        <input type="text" class="form-control" name="edit_email" aria-describedby="helpId" placeholder="" value="<?= $d["email"] ?>">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-10 offset-1">
                                                <div class="form-group">
                                                    <div class="input-group">
                                                        <div class="input-group-text">Pin</div>
                                                        <input type="text" class="form-control" name="edit_pin" aria-describedby="helpId" placeholder="">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-10 offset-1">
                                            <div class="form-group">
                                                    <div class="input-group">
                                                        <div class="input-group-text">Role</div>
                                                        <select name="edit_role" class="form-control">
                                                            <option value="">Pilih role</option>
                                                            <option value="Admin" <?= $d["role"] == "Admin" ? "selected" : "" ?>>Admin</option>
                                                            <option value="User" <?= $d["role"] == "User" ? "selected" : "" ?>>Karyawan</option>
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-primary">Save</button>
                                    </div>
                                </form>
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

<!-- Modal Tambah -->
<div class="modal fade" id="karyawanAddModal" tabindex="-1" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <form action="<?= BASEURL ?>/karyawan/store" method="post">
                <div class="modal-header">
                    <h5 class="modal-title">Tambah Karyawan</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body pt-3 pb-2">
                    <div class="row">
                        <div class="col-10 offset-1">
                            <div class="form-group">
                                <div class="input-group">
                                    <div class="input-group-text">Nama</div>
                                    <input type="text" class="form-control" name="save_name" aria-describedby="helpId" placeholder="" value="<?= OlderValues::get("save_name") ?>">
                                </div>
                            </div>
                        </div>
                        <div class="col-10 offset-1">
                            <div class="form-group">
                                <div class="input-group">
                                    <div class="input-group-text">Email</div>
                                    <input type="text" class="form-control" name="save_email" aria-describedby="helpId" placeholder="" value="<?= OlderValues::get("save_email") ?>">
                                </div>
                            </div>
                        </div>
                        <div class="col-10 offset-1">
                            <div class="form-group">
                                <div class="input-group">
                                    <div class="input-group-text">Pin</div>
                                    <input type="text" class="form-control" name="save_pin" aria-describedby="helpId" placeholder="" value="<?= OlderValues::get("save_pin") ?>">
                                </div>
                            </div>
                        </div>
                        <div class="col-10 offset-1">
                        <div class="form-group">
                                <div class="input-group">
                                    <?php $save_role = OlderValues::get("save_role"); ?>
                                    <div class="input-group-text">Role</div>
                                    <select name="save_role" class="form-control">
                                        <option value="">Pilih role</option>
                                        <option value="Admin" <?= $save_role == "Admin" ? 'selected' : '' ?>>Admin</option>
                                        <option value="User" <?= $save_role == "User" ? 'selected' : '' ?>>Karyawan</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-primary" id="save-button">Save</button>
                </div>
            </form>
        </div>
    </div>
</div>

<?php if (OlderValues::get("modal") == "Add") : ?>
    <script>
        $("#karyawanAddModal").modal("show");
    </script>
<?php endif; ?>

<script type="text/javascript">
    $('.datatable').DataTable();
</script>
