<?php 
$id = $data['absensi']['id'];
$full_name = $data['absensi']['full_name'];
$date = $data['absensi']['date'];
$attend_time = $data['absensi']['attend_time'];
$leave_time = $data['absensi']['leave_time'];
$outside_job = $data['absensi']['outside_job'];
$information = $data['absensi']['information'];

$attend_time = $attend_time != NULL ? date("H:i", strtotime($attend_time)) : "";
$leave_time = $leave_time != NULL ? date("H:i", strtotime($leave_time)) : "";
$outside_job = $outside_job != NULL ? $outside_job : "";
?>
<!-- Form input -->
<div class="row">
    <div class="col-8 offset-2">
        <form action="<?= BASEURL ?>/absensi/update/<?= $id ?>" method="post">
            <!-- Card header -->
            <div class="card shadow mb-4 mt-4">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb bg-light">
                        <li class="breadcrumb-item"><a href="<?= BASEURL ?>/absensi">Absensi</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Edit ( <?= $full_name ?> | <?= date("d M Y", strtotime($date)) ?> )</li>
                    </ol>
                </nav>

                <!-- Card body -->
                <div class="card-body pt-0">
                    <div class="row">
                        <div class="col-sm-6 mt-3">
                            <span>Nama Lengkap</span>
                            <input type="text" name="full_name" class="form-control mt-2" value="<?= $full_name ?>" readonly>
                        </div>
                        <div class="col-sm-6 mt-3">
                            <span>Tanggal</span>
                            <input type="text" name="date" class="form-control mt-2" value="<?= date("d M Y", strtotime($date)) ?>" readonly>
                        </div>
                        <div class="col-sm-6 mt-3">
                            <span>Jam Datang</span>
                            <input type="time" name="attend_time" class="form-control mt-2" value="<?= $attend_time ?>">
                        </div>
                        <div class="col-sm-6 mt-3">
                            <span>Jam Pulang</span>
                            <input type="time" name="leave_time" class="form-control mt-2" value="<?= $leave_time ?>">                        
                        </div>
                        <div class="col-sm-6 mt-3">
                            <span>Tujuan</span>
                            <textarea class="form-control mt-2" name="tujuan"><?= $information ?></textarea>
                            <small>*Isi tujuan jika tugas luar bernilai (Iya)</small>
                        </div>
                        <div class="col-sm-6 mt-3">
                            <span>Tugas Luar</span><br>
                            <div class="form-check form-check-inline mt-3">
                                <label class="form-check-label">
                                    <input class="form-check-input" type="radio" name="outside_job" id="" value="true" <?= $outside_job == "1" ? "checked" : "" ?>>Iya
                                </label>
                                <label class="form-check-label ml-3">
                                    <input class="form-check-input" type="radio" name="outside_job" id="" value="false" <?= $outside_job == "0" ? "checked" : "" ?>>Tidak
                                </label>
                            </div>
                        </div>
                    </div>
                </div>     

                <!-- Card footer -->
                <div class="card-footer text-right">
                    <a href="<?= BASEURL ?>/absensi" class="btn btn-secondary">Batal</a>
                    <button type="submit" class="btn btn-primary">Simpan</button>
                </div>
            </div>
        </form>
    </div>
</div>

<script>
    var currentOutsideJob = "<?= $outside_job ?>";
    if (currentOutsideJob == "0") {
        $('textarea[name=tujuan]').attr('readonly', 'on');
    }
    $('input[name=outside_job]').change(function () { 
        if ($(this).val() == "true") {
            $('textarea[name=tujuan]').removeAttr('readonly');
        }else{
            $('textarea[name=tujuan]').attr('readonly', 'on');
        }
    });
</script>