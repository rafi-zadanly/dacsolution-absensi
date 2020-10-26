<h3>Inventory</h3>

<!-- Table -->
<div class="card shadow mb-4 mt-5">

    <!-- Table header -->
    <div class="card-header py-3">
        <a href="/inventory/add" class="btn">
            <h5 class="m-0 font-weight-bold text-primary"><i class="fas fa-plus mr-2"></i>Tambah</h5>            
        </a>
    </div>

    <!-- Table body -->
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered text-center datatable" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Tanggal Pembelian</th>
                        <th>Kode Barang</th>
                        <th>Nama Barang</th>
                        <th>Stok Barang</th>
                        <th>Kota</th>
                        <th>Lokasi Barang</th>
                        <th>Kondisi Barang</th>
                        <th>Action</th>
                    </tr>
                </thead>                
                <tbody>
                    <?php 
                        $i = 1;
                        foreach ($data["inventory"] as $d) :
                    ?>
            
                    <tr>
                        <td><?= $i ?></td>
                        <td><?= $d["tanggal_pembelian"] ?></td>
                        <td><?= $d["kode_barang"] ?></td>
                        <td><?= $d["nama_barang"] ?></td>
                        <td><?= $d["stok_barang"] ?></td>
                        <td><?= $d["kota"] ?></td>
                        <td><?= $d["lokasi_barang"] ?></td>
                        <td><?= $d["kondisi_barang"] ?></td>
                        <td>
                            <a href="/inventory/edit" class="btn btn-primary btn-sm"> 
                                <i class="fas fa-pencil-alt" aria-hidden="true"></i>
                            </a>
                            <a href="/inventory/detail" class="btn btn-success btn-sm"> 
                                <i class="fas fa-search-plus" aria-hidden="true"></i>
                            </a>
                            <button class="btn btn-danger btn-sm">
                                <i class="fas fa-trash" aria-hidden="true"></i>
                            </button>
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

<!-- Datatable -->
<script type="text/javascript">
    $('.datatable').DataTable();
</script>