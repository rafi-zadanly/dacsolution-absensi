<?php 
    $id = $data["karyawan"]["id"];
    $name = $data["karyawan"]["full_name"];
    $email = $data["karyawan"]["email"];
    $role = $data["karyawan"]["role"];
    $old_name = OlderValues::get("name");
    $old_email = OlderValues::get("email");
    $old_pin = OlderValues::get("pin");
    $old_role = OlderValues::get("role");

    $role = $old_role != NULL ? $old_role : $role;
?>

<!-- Form input -->
<div class="row">
    <div class="col-6 offset-3">
        <form action="<?= BASEURL ?>/karyawan/update/<?= $id ?>" method="post">
            <div class="card shadow mb-4 mt-4">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb bg-light">
                        <li class="breadcrumb-item"><a href="<?= BASEURL ?>/karyawan">Karyawan</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Edit (<?= $name ?>)</li>
                    </ol>
                </nav>
                <div class="card-body pt-2"> 
                    <div class="row">
                        <div class="col-6">
                            <span>Nama Lengkap :</span>
                            <input type="text" name="name" class="form-control mt-2" value="<?= $old_name != NULL ? $old_name : $name ?>" autofocus>
                        </div>
                        <div class="col-6">
                            <span>Email :</span>
                            <input type="text" name="email" class="form-control mt-2" value="<?= $old_email != NULL ? $old_email : $email ?>">
                            <input type="hidden" name="old_email" value="<?= $email ?>">
                        </div>
                        <div class="mt-3 col-6">
                            <span>Pin :</span>
                            <input type="text" name="pin" class="form-control mt-2" value="<?= $old_pin ?>">
                            <small>*Isi jika ingin mengubah pin</small>
                        </div>
                        <div class="mt-3 col-6">
                            <span>Role :</span>
                            <select name="role" class="form-control mt-2">
                                <option value="">Pilih role</option>
                                <option value="Admin" <?= $role == "Admin" ? "selected" : "" ?>>Admin</option>
                                <option value="User" <?= $role == "User" ? "selected" : "" ?>>Karyawan</option>
                            </select>                    
                        </div>
                    </div>
                </div>
                <div class="card-footer text-right">
                    <a href="<?= BASEURL ?>/karyawan" class="btn btn-secondary">Batal</a>
                    <button type="submit" class="btn btn-primary">Simpan</button>
                </div>
            </div>
        </form>
    </div>
</div>
