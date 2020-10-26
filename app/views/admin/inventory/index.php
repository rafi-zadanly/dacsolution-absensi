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
                    <tr>
                        <td>1</td>
                        <td>21/10/2020</td>
                        <td>A001</td>
                        <td>Meja</td>
                        <td>15</td>
                        <td>Depok</td>
                        <td>Ruang meeting</td>
                        <td>Tidak rusak</td>
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
                    <tr>
                        <td>2</td>
                        <td>21/10/2020</td>
                        <td>A002</td>
                        <td>Kursi</td>
                        <td>15</td>
                        <td>Depok</td>
                        <td>Ruang meeting</td>
                        <td>Tidak rusak</td>
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
                </tbody>
            </table>
        </div>
    </div>

</div>

<!-- Datatable -->
<script type="text/javascript">
    $('.datatable').DataTable();
</script>