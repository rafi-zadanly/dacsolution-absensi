<h3 class="mb-3">Dashboard</h3>

<div class="row">
<!-- Online employees card -->
    <div class="col-xl-3 col-md-6 mb-4">
        <div class="card border-left-primary shadow h-100 py-2">
            <div class="card-body">
                <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                        <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">Sedang Bekerja</div>
                        <div class="h5 mb-0 font-weight-bold text-gray-800">
                            <i class="fa fa-circle text-success online-sign" aria-hidden="true"></i> 12
                        </div>
                    </div>
                    <div class="col-auto">
                        <i class="fas fa-user-clock fa-2x text-gray-300"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Total Employees Card -->
    <div class="col-xl-3 col-md-6 mb-4">
        <div class="card border-left-info shadow h-100 py-2">
            <div class="card-body">
                <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                        <div class="text-xs font-weight-bold text-info text-uppercase mb-1">Total Karyawan</div>
                        <div class="row no-gutters align-items-center">
                            <div class="col-auto">
                                <div class="h5 mb-0 mr-3 font-weight-bold text-gray-800">15</div>
                            </div>
                        </div>
                    </div>
                    <div class="col-auto">
                        <i class="fas fa-user-friends fa-2x text-gray-300"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Leave request card -->
    <div class="col-xl-3 col-md-6 mb-4">
        <div class="card border-left-success shadow h-100 py-2">
            <div class="card-body">
                <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                        <div class="text-xs font-weight-bold text-success text-uppercase mb-1">Permintaan Cuti</div>
                        <div class="h5 mb-0 font-weight-bold text-gray-800">2 | <a href=""  class="font-small"><u>cek disini</u></a></div>
                    </div>
                    <div class="col-auto">
                        <i class="fas fa-arrow-down fa-2x text-gray-300"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="card shadow mb-4">

    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">Sedang Bekerja</h6>
    </div>

    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered text-center datatable" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Nama Lengkap</th>
                        <th>Jam Datang</th>
                        <th>Lama Bekerja</th>                        
                    </tr>
                </thead>                
                <tbody>
                    <tr>
                        <td>1</td>
                        <td>Fatimah Rizkyana Nuraini</td>
                        <td>08:20:21</td>
                        <td>17:26:23</td>                        
                    </tr>
                    <tr>
                        <td>2</td>
                        <td>Rafi Zadanly</td>
                        <td>08:21:21</td>
                        <td>17:22:29</td>                        
                    </tr>
                    <tr>
                        <td>3</td>
                        <td>Mikha T</td>
                        <td>08:26:23</td>
                        <td>17:28:23</td>
                    </tr>
                    <tr>
                        <td>4</td>
                        <td>Asya Rasyanti</td>
                        <td>08:10:19</td>
                        <td>17:10:30</td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>

</div>

<script>
    $(".datatable").DataTable();
</script>