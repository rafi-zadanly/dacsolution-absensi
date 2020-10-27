<style>
    table tr th {
        width: 30%;
    }
    table tr td {
        width: 70%;
    }
</style>
<?php 
$full_name = $data["absensi"]["full_name"];
$date = $data['absensi']['date'];
$attend_time = $data['absensi']['attend_time'];
$leave_time = $data['absensi']['leave_time'];
$attend_image = $data['absensi']['attend_image'];
$leave_image = $data['absensi']['leave_image'];
$outside_job = $data['absensi']['outside_job'];
$information = $data['absensi']['information'];

$attend_time = $attend_time != NULL ? date("H:i:s", strtotime($attend_time)) : "-";
$leave_time = $leave_time != NULL ? date("H:i:s", strtotime($leave_time)) : "-";
$outside_job = $outside_job != NULL ? $outside_job : "-";
$information = $information != NULL ? $information : "-";
?>
<div class="row">
    <div class="col-8 offset-2">
        <div class="card shadow mb-4">

            <!-- Card Header -->
            <div class="card-header py-0">
                <nav aria-label="breadcrumb" class="pt-3">
                    <ol class="breadcrumb bg-light">
                        <li class="breadcrumb-item"><a href="<?= BASEURL ?>/absensi">Absensi</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Detail ( <?= $full_name ?> | <?= date("d M Y", strtotime($date)) ?> )</li>
                    </ol>
                </nav>
            </div>

            <!-- Card Body -->
            <div class="card-body">

                <!-- Table -->
                <div class="table-responsive">
                    <table class="table table-bordered text-left datatable" cellspacing="0">                
                        <tr>
                            <th>Nama Lengkap</th>
                            <td><?= $full_name ?></td>                                            
                        </tr>
                        <tr>
                            <th>Tanggal</th>
                            <td><?= date("d M Y", strtotime($date)) ?></td>                     
                        </tr>
                        <tr>
                            <th>Jam Datang</th>
                            <td><?= $attend_time ?></td>
                        </tr>
                        <tr>
                            <th>Jam Pulang</th>
                            <td><?= $leave_time ?></td>
                        </tr>
                        <tr>
                            <th>Tugas Luar</th>
                            <td><?= $outside_job != "-" && $outside_job == "1" ? "Iya" : "Tidak" ?></td>
                        </tr>
                        <tr>
                            <th>Tujuan</th>
                            <td><?= $information ?></td>
                        </tr>
                        <tr>
                            <th>Gambar Datang</th>
                            <td>
                                <?php if ($attend_image != (NULL || "")) : ?>
                                    <img src="<?= BASEURL ?>/img/attendance/<?= $attend_image ?>" alt="Foto absen hadir tidak ditemukan." class="img img-fluid w-50">
                                <?php else : ?>
                                    -
                                <?php endif; ?>
                            </td>
                        </tr>
                        <tr>
                            <th>Gambar Pulang</th>
                            <td>
                            <?php if ($leave_image != (NULL || "")) : ?>
                                    <img src="<?= BASEURL ?>/img/attendance/<?= $leave_image ?>" alt="Foto absen pulang tidak ditemukan." class="img img-fluid w-50">
                                <?php else : ?>
                                    -
                                <?php endif; ?>
                            </td>
                        </tr>
                    </table>
                    <a href="<?= BASEURL ?>/absensi" class="btn btn-dark">Kembali</a>
                </div>
            </div>

        </div>
    </div>
</div>



