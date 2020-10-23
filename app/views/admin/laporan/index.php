<h3>Cetak Laporan</h3>

<div class="row mt-5">
    <div class="col-sm-6">
        <div class="card shadow">
            <h5 class="card-header bg-dark text-light text-center">Cetak laporan <small>(tanpa tanggal)</small></h5>
            <div class="card-body">
                <form action="" method="post">
                    <h5 class="card-title">Pilih data untuk di cetak</h5>
                    <hr color="black">
                        <select id="" class="form-control" name="cetak_pdf">
                            <option value="">Pilih data</option>
                            <option value="">Karyawan</option>
                            <option value="">Inventory</option>
                        </select>
                    <center>
                        <button type="submit" class="btn btn-primary mt-4">PDF</button>
                        <button type="submit" class="btn btn-primary mt-4">XLS</button>
                    </center>
                </form>
            </div>
        </div>
    </div>
    
    <div class="col-sm-6">
        <div class="card shadow">
            <h5 class="card-header bg-dark text-light text-center">Cetak laporan <small>(dengan tanggal)</small></h5>
            <div class="card-body">
                <form action="" method="post">
                    <h5 class="card-title">Pilih data dan masukan tanggal untuk di cetak</h5>
                    <hr color="black">
                    <div class="row mb-3">
                        <div class="col-6">
                            <label for="">Dari tanggal :</label>
                            <input type="date" name="" id="" class="form-control">
                        </div>
                        <div class="col-6">
                            <label for="">Sampai tanggal :</label>
                            <input type="date" name="" id="" class="form-control">
                        </div>
                    </div>

                        <select id="inputState" class="form-control" name="cetak_xls">
                            <option value="">Pilih data</option>
                            <option value="">Absensi</option>
                            <option value="">Penggajian</option>
                            <option value="">Cuti</option>
                        </select>
                    <center>
                        <button type="submit" class="btn btn-primary mt-4">PDF</button>
                        <button type="submit" class="btn btn-primary mt-4">XLS</button>
                    </center>
                </form>
            </div>
        </div>
    </div> 
</div>