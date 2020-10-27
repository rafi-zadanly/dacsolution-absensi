<h3>Absensi</h3>

<div class="card shadow mt-5">

    <div class="card-header py-3">
        <form action="<?= BASEURL ?>/absensi/index" method="post">
            <div class="row">
                
            </div>
            <div class="row mt-3">
                <div class="col-3">
                    <label for="">Dari tanggal :</label>
                    <input type="date" name="from" id="" class="form-control" value="<?= OlderValues::getWithoutUnset('absensi_date_from') ?>">
                </div>
                <div class="col-3">
                    <label for="">Sampai tanggal :</label>
                    <input type="date" name="to" id="" class="form-control" value="<?= OlderValues::getWithoutUnset('absensi_date_to') ?>">
                </div>
                <div class="col-2 pt-3 mt-3">
                    <button class="btn btn-primary" type="submit">
                        <i class="fas fa-search"></i>
                    </button>
                </div>
                <div class="col-4 pt-3 mt-3">
                    <a href="<?= BASEURL ?>/absensi/create_all" class="btn btn-primary">
                        <i class="fas fa-plus mr-2"></i>Siapkan absensi hari ini
                    </a>
                    <a href="<?= BASEURL ?>/absensi/index/refresh" class="btn btn-outline-primary ml-3">
                        <i class="fas fa-sync"></i>
                    </a>
                </div>
            </div>
        </form>
    </div>

    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered text-center datatable" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Nama Lengkap</th>
                        <th>Tanggal</th>
                        <th>Jam Datang</th>
                        <th>Jam Pulang</th>
                        <th>Status</th>
                        <th>Action</th>
                    </tr>
                </thead>                
                <tbody>
                    <?php 
                        $i = 1;
                        foreach ($data["absensi"]["data"] as $d) : 
                        $attend_time = $d["attend_time"];
                        $leave_time = $d["leave_time"];
                    ?>
                    <tr>
                        <td><?= $i ?></td>
                        <td><?= $d["full_name"] ?></td>
                        <td><?= date("d/m/Y", strtotime($d["date"])) ?></td>
                        <td><?= $attend_time != NULL ? $attend_time : "-" ?></td>
                        <td><?= $leave_time != NULL ? $leave_time : "-" ?></td>
                        <td>
                            <i class="fa fa-circle <?= $attend_time != NULL && $leave_time == NULL ? "text-danger" : "text-success" ?>" style="font-size: 20px;"></i>
                        </td>
                        <td>
                            <a href="/absensi/edit/<?= $d["id"] ?>" class="btn btn-primary btn-sm"> 
                                <i class="fas fa-pencil-alt" aria-hidden="true"></i>
                            </a>
                            <a href="/absensi/detail/<?= $d["id"] ?>" class="btn btn-success btn-sm"> 
                                <i class="fas fa-search-plus" aria-hidden="true"></i>
                            </a>
                        </td>
                    </tr>
                    <?php 
                        $i++;
                        endforeach; 
                    ?>
                </tbody>
            </table>
        </div>
    </div>

</div>

<script>
    $(".datatable").DataTable();
</script>