<div class="row" ng-controller="jadwalController">
    <div class="col-md-12">
        <div class="row">
            <div class="col-12 col-sm-12">
                <div class="card card-primary">
                    <div class="card-body">
                        <div class="card-body p-0">
                            <div id="calendar"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- <div class="modal fade" id="detail" tabindex="-1" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true">
        <div class="modal-dialog modal-xl  modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header bg-rri">
                    <h5 class="modal-title">Info Jadwal</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <label for="">Spot Iklan</label>
                    <div class="table-responsive p-0">
                        <table class="table table-sm table-hover table-head-fixed text-nowrap">
                            <thead>
                                <tr>
                                    <th>Waktu Penggunaan</th>
                                    <th>Peruntukan</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr ng-repeat="item in dataDetail.spot">
                                    <td>{{item.tanggal_pakai}}</td>
                                    <td>{{item.peruntukan}}</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                    <label for="">Pengumuman</label>
                    <div class="table-responsive p-0">
                        <table class="table table-sm table-hover table-head-fixed text-nowrap">
                            <thead>
                                <tr>
                                    <th>Kategori</th>
                                    <th>Jenis</th>
                                    <th>Waktu Tayang</th>
                                    <th>Topik</th>
                                    <th>Customer</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr ng-repeat="item in dataDetail.pengumuman">
                                    <td>{{item.kategori}}</td>
                                    <td>{{item.jenis}}</td>
                                    <td>{{item.waktu}}</td>
                                    <td>{{item.topik}}</td>
                                    <td>{{item.fullname}}</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary">Save</button>
                </div>
            </div>
        </div>
    </div> -->
</div>