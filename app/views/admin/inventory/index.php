<h3>Inventory</h3>

<!-- Table -->
<div class="card shadow mb-4 mt-5">

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
                        <button class="btn btn-primary btn-sm" data-toggle="modal" data-target=""> 
                                <i class="fas fa-pencil-alt" aria-hidden="true"></i>
                            </button>
                            <button class="btn btn-danger btn-sm" data-toggle="modal" data-target="">
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
                        <button class="btn btn-primary btn-sm" data-toggle="modal" data-target=""> 
                                <i class="fas fa-pencil-alt" aria-hidden="true"></i>
                            </button>
                            <button class="btn btn-danger btn-sm" data-toggle="modal" data-target="">
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