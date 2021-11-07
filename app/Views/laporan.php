<div class="row" ng-controller="laporanController">
    <div class="col-md-12">
        <div class="card card-danger">
            <div class="card-header">
                <h3 class="card-title"><i class="fas fa-th-list"></i>&nbsp;&nbsp; Laporan</h3>
                <div class="card-tools">
                    <div class="input-group">
                        <div class="input-group-prepend">
                            <span class="input-group-text">
                                <i class="far fa-calendar-alt"></i>
                            </span>
                        </div>
                        <input type="text" class="form-control float-right form-control-sm" ng-model="tanggal"
                            id="reservationtime" ng-change="tampil(tanggal)">
                        <button class="btn btn-primary btn-sm"><i class="fas fa-print" ng-click="print()"></i></button>
                    </div>
                </div>
            </div>
            <!-- /.card-header -->
            <div class="card-body table-responsive p-0" style="height: 500px;">
                <div id="print">
                    <div class="screen">
                        <div class="col-md-12 d-flex justify-content-between">
                            <div class="col-md-4"><img src="<?=base_url('public/img/logo.png');?>" width="100px"></div>
                            <div class="col-md-4 text-center">
                                <h2>LAPORAN</h2>
                                <h5>TANGGAL: {{tanggal}}</h5>

                            </div>
                            <div class="col-md-4">&nbsp;</div>
                        </div>
                        <hr class="style2" style="margin-bottom:12px"><br>
                    </div>
                    <div ng-bind-html="html"></div>
                    <!-- <table class="table table-sm table-bordered">
                    </table> -->
                    <!-- <table class="table table-sm table-bordered">
                        <thead>
                            <tr>
                                <th rowspan='2'>No</th>
                                <th rowspan='2'>Konsumen</th>
                                <th rowspan='2'>Tanggal Acara</th>
                                <th colspan='2'>Pembayaran</th>
                                <th rowspan='2'>Status Bayar</th>
                                <th rowspan='2'>Total</th>
                            </tr>
                            <tr>
                                <th>Tanggal Bayar</th>
                                <th>Nominal</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td rowspan='2'>1</td>
                                <td rowspan='2'>Konsumen</td>
                                <td rowspan='2'>Tanggal Acara</td>
                                <td>20 Agustus 2021</td>
                                <td>Rp. 3000000</td>
                                <td rowspan='2'>Panjar</td>
                                <td rowspan='2'>Rp. 8000000</td>
                            </tr>
                            <tr>
                                <td>20 Agustus 2021</td>
                                <td>Rp. 3000000</td>
                            </tr>
                            <tr>
                                <td rowspan='3'>1</td>
                                <td rowspan='3'>Konsumen</td>
                                <td rowspan='3'>Tanggal Acara</td>
                                <td>20 Agustus 2021</td>
                                <td>Rp. 3000000</td>
                                <td rowspan='3'>Panjar</td>
                                <td rowspan='3'>Rp. 8000000</td>
                            </tr>
                            <tr>
                                <td>20 Agustus 2021</td>
                                <td>Rp. 3000000</td>
                            </tr>
                            <tr>
                                <td>20 Agustus 2021</td>
                                <td>Rp. 3000000</td>
                            </tr>
                        </tbody>
                    </table> -->
                </div>
            </div>
            <!-- /.card-body -->
        </div>
    </div>
</div>