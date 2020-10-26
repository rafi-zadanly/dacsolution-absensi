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
                        <th>Kode Barang</th>
                        <th>Tanggal Pembelian</th>                        
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
                        <td><?= $d["id"] ?></td>
                        <td><?= $d["tanggal_pembelian"] ?></td>                        
                        <td><?= $d["nama_barang"] ?></td>
                        <td><?= $d["stok_barang"] ?></td>
                        <td><?= $d["kota"] ?></td>
                        <td><?= $d["lokasi_barang"] ?></td>
                        <td><?= $d["kondisi_barang"] ?></td>
                        <td>
                            <a href="/inventory/edit" class="btn btn-primary btn-sm"> 
                                <i class="fas fa-pencil-alt" aria-hidden="true"></i>
                            </a>
                            <a href="/inventory/detail/<?= $d["id"] ?>" class="btn btn-success btn-sm"> 
                                <i class="fas fa-search-plus" aria-hidden="true"></i>
                            </a>
                            <button class="btn btn-danger btn-sm" data-toggle="modal" data-target="#inventoryDeleteModal<?= $i ?>">
                                <i class="fas fa-trash" aria-hidden="true"></i>
                            </button>
                        </td>
                    </tr>

                    <!-- Modal Hapus -->
                    <div class="modal fade" id="inventoryDeleteModal<?= $i ?>" tabindex="-1" role="dialog" aria-labelledby="modelTitleId"aria-hidden="true">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title">Hapus data inventory [<small><?= $d["nama_barang"] ?></small>] ?</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-footer">
                                    <form action="<?= BASEURL ?>/inventory/destroy" method="post">
                                        <input type="hidden" name="id_delete" value="<?= $d["id"] ?>">
                                        <button type="submit" class="btn btn-danger">Hapus</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>

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