<div class="row">
    <div class="col-6 offset-3">
        <form action="<?= BASEURL ?>/karyawan/store" method="post">
            <div class="card shadow mb-4 mt-4">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb bg-light shadow-sm">
                        <li class="breadcrumb-item"><a href="<?= BASEURL ?>/karyawan">Karyawan</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Add</li>
                    </ol>
                </nav>
                <div class="card-body pt-2"> 
                    <div class="">
                        <span>Nama Lengkap :</span>
                        <input type="text" name="name" class="form-control mt-2" value="<?= OlderValues::get("name") ?>" autofocus>
                    </div>
                    <div class="mt-3">
                        <span>Email :</span>
                        <input type="text" name="email" class="form-control mt-2" value="<?= OlderValues::get("email") ?>">
                    </div>
                    <div class="mt-3">
                        <span>Pin :</span>
                        <input type="text" name="pin" class="form-control mt-2" value="<?= OlderValues::get("pin") ?>">
                    </div>
                    <div class="mt-3">
                        <?php $role = OlderValues::get("role"); ?>
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
