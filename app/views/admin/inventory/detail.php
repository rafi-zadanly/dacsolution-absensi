<div class="row">
    <div class="col-8 offset-2">
        <div class="card shadow mb-4">

            <!-- Card Header -->
            <div class="card-header py-0">
                <nav aria-label="breadcrumb" class="pt-3">
                    <ol class="breadcrumb bg-light">
                        <li class="breadcrumb-item"><a href="<?= BASEURL ?>/inventory">Inventory</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Detail</li>
                    </ol>
                </nav>
            </div>

            <!-- Card Body -->
            <div class="card-body">

                <!-- Table -->
                <div class="table-responsive">
                    <table class="table table-bordered text-left" cellspacing="0">
                        <tr>
                            <td><b>Kode Barang</b></td>
                            <td><?= $data["inventory"]["id"] ?></td>                     
                        </tr>                
                        <tr>
                            <td><b>Tanggal Pembelian</b></td>
                            <td><?= $data["inventory"]["tanggal_pembelian"] ?></td>                                            
                        </tr>                        
                        <tr>
                            <td><b>Nama Barang</b></td>
                            <td><?= $data["inventory"]["nama_barang"] ?></td>
                        </tr>
                        <tr>
                            <td><b>Stok Barang</b></td>
                            <td><?= $data["inventory"]["stok_barang"] ?></td>
                        </tr>
                        <tr>
                            <td><b>Kota</b></td>
                            <td><?= $data["inventory"]["kota"] ?></td>
                        </tr>
                        <tr>
                            <td><b>Lokasi Barang</b></td>
                            <td><?= $data["inventory"]["lokasi_barang"] ?></td>
                        </tr>
                        <tr>
                            <td><b>Kondisi Barang</b></td>
                            <td><?= $data["inventory"]["kondisi_barang"] ?></td>
                        </tr>
                        <tr>
                            <td><b>Keterangan</b></td>
                            <td><?= $data["inventory"]["keterangan"] ?></td>
                        </tr>
                        <tr>
                            <td><b>Gambar Barang</b></td>
                            <td><?= $data["inventory"]["gambar_barang"] ?></td>
                        </tr>
                    </table>
                    <a href="/inventory" class="btn btn-dark">Kembali</a>
                </div>
            </div>
        </div>

    </div>
</div>


