<!-- Form input -->
<div class="row">
    <div class="col-8 offset-2">
        <form action="<?= BASEURL ?>/absensi/edit/" method="post">

            <!-- Card header -->
            <div class="card shadow mb-4 mt-4">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb bg-light">
                        <li class="breadcrumb-item"><a href="<?= BASEURL ?>/absensi">Absensi</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Edit</li>
                    </ol>
                </nav>

                <!-- Card body -->
                <div class="card-body pt-2">
                    <div class="row">
                        <div class="col-sm-6 mt-2">
                            <span>Nama Lengkap</span>
                            <input type="text" name="" class="form-control mt-2" value="">
                        </div>
                        <div class="col-sm-6 mt-2">
                            <span>Jam Datang</span>
                            <input type="time" name="" class="form-control mt-2" value="">                        
                        </div>
                        <div class="col-sm-6 mt-2">
                            <span>Jam Pulang</span>
                            <input type="time" name="" class="form-control mt-2" value="">                        
                        </div>
                        <div class="col-sm-6 mt-2">
                            <span>Tugas Luar</span>
                            <input type="text" name="" class="form-control mt-2" value="">                        
                        </div>
                    </div>
                </div>     

                <!-- Card footer -->
                <div class="card-footer text-right">
                    <a href="<?= BASEURL ?>/absensi " class="btn btn-secondary">Batal</a>
                    <button type="submit" class="btn btn-primary">Simpan</button>
                </div>
            </div>
        </form>
    </div>
</div>