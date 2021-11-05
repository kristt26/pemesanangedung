<div class="col-md-12" ng-controller="fasilitasController">
    <div class="card card-danger">
        <div class="card-header">
            <h3 class="card-title"><i class="fas fa-list"></i> Daftar Fasilitas</h3>
            <div class="card-tools">
                <button type="button" class="btn btn-primary btn-sm" data-toggle="modal" ng-click="clear()"
                    data-target="#tambah">
                    <i class="fas fa-plus"></i>
                </button>
            </div>
        </div>
        <div class="card-body">
            <table class="table table-sm table-bordered">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Fasilitas</th>
                        <th>satuan</th>
                        <th>tarif</th>
                        <th>jumlah</th>
                        <th>gambar</th>
                        <th><i class="fas fa-cog fa-spin"></i></th>
                    </tr>
                </thead>
                <tbody>
                    <tr ng-repeat="item in datas">
                        <td>{{$index+1}}</td>
                        <td>{{item.nama}}</td>
                        <td>{{item.satuan}}</td>
                        <td>{{item.tarif | currency}}</td>
                        <td>{{item.jumlah}}</td>
                        <td><a href="javascript:void();" ng-click="showFoto(item)">{{item.gambar}}</a></td>
                        <td style="width: 10%">
                            <div class="d-flex justify-content-center">
                                <button class="btn btn-warning btn-sm" ng-click="edit(item)"><i
                                        class="fas fa-edit"></i></button>
                                <button class="btn btn-danger btn-sm" ng-click="deleted(item)"><i
                                        class="fas fa-trash"></i></button>
                            </div>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
    <!-- Modal -->
    <div class="modal fade" id="tambah" tabindex="-1" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Tambah Data</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form ng-submit="save(model)">
                        <div class="form-group row">
                            <label for="fasilitas" class="col-sm-4 col-form-label col-form-label-sm ">Fasilitas</label>
                            <div class="col-sm-8">
                                <input type="text" class="form-control form-control-sm" id="fasilitas"
                                    aria-describedby="emailHelp" ng-model="model.nama">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="satuan" class="col-sm-4 col-form-label col-form-label-sm ">Satuan</label>
                            <div class="col-sm-8">
                                <input type="text" class="form-control form-control-sm" id="satuan"
                                    aria-describedby="emailHelp" ng-model="model.satuan">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="tarif" class="col-sm-4 col-form-label col-form-label-sm ">Tarif</label>
                            <div class="col-sm-8">
                                <input type="text" class="form-control form-control-sm" id="tarif"
                                    mask-currency="'Rp. '" aria-describedby="emailHelp" ng-model="model.tarif">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="jumlah" class="col-sm-4 col-form-label col-form-label-sm ">Jumlah</label>
                            <div class="col-sm-8">
                                <input type="text" class="form-control form-control-sm" id="jumlah"
                                    aria-describedby="emailHelp" ng-model="model.jumlah">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="keterangan"
                                class="col-sm-4 col-form-label col-form-label-sm ">Keterangan</label>
                            <div class="col-sm-8">
                                <textarea id="keterangan" class="form-control form-control-sm" rows="3"
                                    ng-model="model.keterangan"></textarea>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="gambar" class="col-sm-4 col-form-label col-form-label-sm ">Gambar</label>
                            <div class="col-sm-8">
                                <div class="input-group mb-3">
                                    <div class="custom-file">
                                        <input type="file" class="custom-file-input custom-file-input-sm" id="gambar"
                                            aria-describedby="inputGroupFileAddon01" ng-model="model.gambar"
                                            base-sixty-four-input ng-change="cekFile(model.gambar)">
                                        <label class="custom-file-label"
                                            for="gambar">{{model.gambar ? model.gambar.filename: model.gambar && !model.gambar ? model.gambar: 'Pilih File'}}</label>
                                        <div class="col-sm-8">
                                        </div>
                                    </div>

                                    <span ng-show="form.model.gambar.$error.maxsize">Files must not exceed 5000
                                        KB</span>
                                </div>
                                <span ng-if="model.id"><img ng-src="{{model.files}}" class="img-responsive"
                                        width="50%" /></span>
                            </div>
                        </div>
                        <button type="submit" class="btn btn-primary btn-sm">Submit</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade" id="modelId" tabindex="-1" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <img ng-src="{{files}}" class="img-responsive " />
            </div>
        </div>
    </div>
</div>