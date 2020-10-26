<!-- Form input -->
<div class="row">
    <div class="col-8 offset-2">
        <form action="<?= BASEURL ?>/inventory/add/" method="post">

            <!-- Card header -->
            <div class="card shadow mb-4 mt-4">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb bg-light">
                        <li class="breadcrumb-item"><a href="<?= BASEURL ?>/inventory">Inventory</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Add</li>
                    </ol>
                </nav>

                <!-- Card body -->
                <div class="card-body pt-2">
                    <div class="row">
                        <div class="col-sm-6 mt-2">
                            <span>Tanggal Pembelian</span>
                            <input type="date" name="" class="form-control mt-2" value="">
                        </div>
                        <div class="col-sm-6 mt-2">
                            <span>Nama Barang</span>
                            <input type="text" name="" class="form-control mt-2" value="">                        
                        </div>
                        <div class="col-sm-6 mt-2">
                            <span>Stok Barang</span>
                            <input type="number" name="" class="form-control mt-2" value="">                        
                        </div>
                        <div class="col-sm-6 mt-2">
                            <span>Kota</span>
                            <input type="text" name="" class="form-control mt-2" value="">                        
                        </div>
                        <div class="col-sm-6 mt-2">
                            <span>Lokasi Barang</span>
                            <input type="text" name="" class="form-control mt-2" value="">                        
                        </div>
                        <div class="col-sm-6 mt-2">
                            <span>Kondisi Barang</span>
                            <input type="text" name="" class="form-control mt-2" value="">                        
                        </div>
                        <div class="col-sm-6 mt-2">
                            <span>Keterangan</span>
                            <input type="text" name="" class="form-control mt-2" value="">                        
                        </div>
                        <div class="col-sm-6 mt-2">
                            <span>Masukan Foto</span>
                            <input type="file" name="" class="form-control-file mt-2" value="">                        
                        </div>
                    </div>
                </div>     

                <!-- Card footer -->
                <div class="card-footer text-right">
                    <a href="<?= BASEURL ?>/inventory" class="btn btn-secondary">Batal</a>
                    <button type="submit" class="btn btn-primary">Simpan</button>
                </div>
            </div>
        </form>
    </div>
</div>