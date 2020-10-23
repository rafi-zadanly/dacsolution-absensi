<!-- Breadcrumb -->
<nav aria-label="breadcrumb">
    <ol class="breadcrumb shadow bg-light">
        <li class="breadcrumb-item"><a href="/karyawan">Karyawan</a></li>
        <li class="breadcrumb-item active" aria-current="page">Edit</li>
    </ol>
</nav>

<?php 
    $id = $data["karyawan"]["id"];
    $name = $data["karyawan"]["full_name"];
    $email = $data["karyawan"]["email"];
    $role = $data["karyawan"]["role"];
?>

<!-- Form input -->
<div class="row">
    <div class="col-6 offset-3">
        <form action="<?= BASEURL ?>/karyawan/update/<?= $id ?>" method="post">
            <div class="card shadow mb-4 mt-4">
                <div class="breadcrumb py-2 bg-primary">
                    <h5 class="text-light m-0">Edit Karyawan (<small><?= $name ?></small>)</h5>
                </div>
                <div class="card-body pt-2"> 
                    <div class="">
                        <span>Nama Lengkap :</span>
                        <input type="text" name="name" class="form-control mt-2" value="<?= $name ?>" autofocus>
                    </div>
                    <div class="mt-3">
                        <span>Email :</span>
                        <input type="text" name="email" class="form-control mt-2" value="<?= $email ?>">
                    </div>
                    <div class="mt-3">
                        <span>Pin :</span>
                        <input type="text" name="pin" class="form-control mt-2">
                        <small>*Kosongkan bila tidak ingin mengubah pin</small>
                    </div>
                    <div class="mt-3">
                        <span>Role :</span>
                        <select name="role" class="form-control mt-2">
                            <option value="">Pilih role</option>
                            <option value="Admin" <?= $role == "Admin" ? "selected" : "" ?>>Admin</option>
                            <option value="User" <?= $role == "User" ? "selected" : "" ?>>Karyawan</option>
                        </select>                    
                    </div>
                </div>
                <div class="card-footer text-right">
                    <a href="<?= BASEURL ?>/karyawan" class="btn btn-secondary">Kembali</a>
                    <button type="submit" class="btn btn-primary">Simpan</button>
                </div>
            </div>
        </form>
    </div>
</div>
