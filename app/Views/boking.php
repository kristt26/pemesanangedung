<div class="col-md-12" ng-controller="bokingController">
    <div class="card card-danger">
        <div class="card-header">
            <h3 class="card-title"><i class="fas fa-list"></i> Daftar Pesanan</h3>
            <div class="card-tools">
                <button class="btn btn-primary btn-sm" data-toggle="modal" data-target="#tambah"
                    ng-click="model={}; model.detail=[]; hitungTotal()"><strong><i
                            class="fas fa-plus-circle"></i></strong></button>
            </div>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-sm table-bordered">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Tanggal penggunaan</th>
                            <th>Acara</th>
                            <th>Total Tagihan</th>
                            <th>Tanggal Pesan</th>
                            <th>Status Pembayaran</th>
                            <th><i class="fas fa-cog fa-spin"></i></th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr ng-repeat="item in datas.pesanan">
                            <td>{{$index+1}}</td>
                            <td>{{item.tanggal_pakai | date: 'EEEE, d MMMM y'}}</td>
                            <td>{{item.peruntukan}}</td>
                            <td>{{item.tagihan - item.totalBayar | currency: 'Rp. '}}</td>
                            <td>{{item.tanggal_pesan | date: 'd MMMM y'}}</td>
                            <td>{{item.status_bayar=='0' ? 'Belum Bayar' :  item.status_bayar=='1' ? 'Panjar' : 'Lunas'}}
                            </td>
                            <td style="width: 10%">
                                <div class="d-flex justify-content-center">
                                    <button class="btn btn-warning btn-sm mr-2" data-toggle="modal"
                                        data-target="#upload" ng-click="showUpload(item)"><i class="fas fa-upload"
                                            title="Upload bukti pembayaran"></i></button>
                                    <button class="btn btn-success btn-sm mr-2" ng-click="showInvoice(item)"><i
                                            class="fas fa-file-invoice" title="Invoice"></i></button>
                                    <!-- <button class="btn btn-danger btn-sm" ng-click="deleted(item)"><i
                                            class="fas fa-trash"></i></button> -->
                                </div>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <!-- Modal Tambah -->
    <div class="modal fade" id="tambah" tabindex="-1" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header bg-danger">
                    <h5 class="modal-title">{{titleModal}}</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form ng-submit="setForm(1)">
                    <div class="modal-body" ng-show="nilai==0">
                        <div class="form-group row">
                            <label for="waktu_acara" class="col-sm-4 col-form-label col-form-label-sm">Pesan untuk
                                tanggal</label>
                            <div class="col-sm-8">
                                <input type="date" class="form-control form-control-sm" id="waktu_acara"
                                    ng-model="model.tanggal_pakai" required>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="peruntukan" class="col-sm-4 col-form-label col-form-label-sm">
                                Acara</label>
                            <div class="col-sm-8">
                                <input type="text" class="form-control form-control-sm" id="peruntukan"
                                    ng-model="model.peruntukan" required>
                            </div>
                        </div>
                    </div>
                    <div class="modal-body" ng-show="nilai==1">
                        <div class="panel-pricing-in">
                            <div class="row">
                                <table class="table table-bordered">
                                    <thead>
                                        <tr>
                                            <th>Fasilitas</th>
                                            <th>Harga</th>
                                            <th>jumlah</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr ng-repeat="item in datas.fasilitas">
                                            <td>{{item.nama}}</td>
                                            <td>{{item.tarif}}</td>
                                            <td>
                                                <div class="form-check form-check-inline">
                                                    <input class="form-check-input" type="checkbox"
                                                        ng-model="item.value" ng-change="check(item)"
                                                        id="inlineCheckbox{{$index}}">
                                                    <label class="form-check-label"
                                                        for="inlineCheckbox{{$index}}">Pilih</label>
                                                </div>
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary btn-sm" data-dismiss="modal"
                            ng-click="nilai=0">Batal</button>
                        <button ng-show="nilai>0" type="button" class="btn btn-warning btn-sm"
                            ng-click="setForm(-1)">Kembali</button>
                        <button ng-show="nilai<3" type="submit" class="btn btn-primary btn-sm">Lanjut</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <div class="modal fade" id="invoice" tabindex="-1" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true"
        data-backdrop="false" data-keyboard="false">
        <div class="modal-dialog modal-xl" role="document">
            <div class="modal-content">
                <div class="modal-body">
                    <div class="invoice p-3 mb-3">
                        <div class="row">
                            <div class="col-12">
                                <h4>
                                    <i class="fas fa-globe"></i> CATERING JAYAPURA
                                    <small class="float-right">Date: <?=date('d M Y');?></small>
                                </h4>
                            </div>
                        </div>
                        <div class="row invoice-info">
                            <div class="col-sm-4 invoice-col">
                                From
                                <address>
                                    <strong>Catering Jayapura</strong><br>
                                    Hamadi, Jayapura Selatan, Kota Jayapura, Papua<br>
                                    Indonesia, Kode Pos 99221<br>
                                    Phone: (0967) 536386<br>
                                    Email: info@rrijayapura.com
                                </address>
                            </div>
                            <div class="col-sm-4 invoice-col">
                                To
                                <address>
                                    <strong><?=session()->get("nama");?></strong><br>
                                    <?=session()->get("alamat") ? session()->get("alamat") : '';?><br>
                                    Phone: <?=session()->get("kontak");?><br>
                                    <!-- Email: <?=session()->get("email");?> -->
                                </address>
                            </div>
                            <div class="col-sm-4 invoice-col">
                                <br>
                                <b>Order ID:</b> {{model.orderid}}<br>
                                <b>Payment Due:</b> <?=date('d-m-Y', strtotime(' +1 day'))?><br>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-12 table-responsive">
                                <table class="table table-striped">
                                    <thead>
                                        <tr>
                                            <th>Paket</th>
                                            <th>Harga Paket</th>
                                            <th>Jumlah Pesan</th>
                                            <th>Total</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr ng-repeat="item in model.detail">
                                            <td>{{item.nama}}</td>
                                            <td>{{item.tarif}}</td>
                                            <td>
                                                <div class="col-sm-3">
                                                    <input type="number" string-to-number
                                                        class="form-control form-control-sm" ng-model="item.jumlah"
                                                        ng-disabled="model.id" ng-change="hitungTotal()" required>
                                                </div>
                                            </td>
                                            <td width=20%>{{item.tarif*item.jumlah | currency}}</td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-6">
                                <p class="lead">Payment Methods:</p>
                                <img src="../assets/backend/dist/img/credit/visa.png" alt="Visa">
                                <img src="../assets/backend/dist/img/credit/mastercard.png" alt="Mastercard">
                                <img src="../assets/backend/dist/img/credit/american-express.png"
                                    alt="American Express">
                                <img src="../assets/backend/dist/img/credit/paypal2.png" alt="Paypal">

                                <p>anda dapat melakukan transfer bank ke rekening berikut<br>
                                    Bank BRI : 0821212121 / Deni Malik <br>
                                    Bank Mandiri : 0821212121 / Deni Malik <br>
                                    Bank BCA : 0821212121 / Deni Malik
                                </p>

                                <!-- <p class="text-muted well well-sm shadow-none" style="margin-top: 10px;">
                                    Etsy doostang zoodles disqus groupon greplin oooj voxy zoodles, weebly ning heekya
                                    handango imeem
                                    plugg
                                    dopplr jibjab, movity jajah plickers sifteo edmodo ifttt zimbra.
                                </p> -->
                            </div>
                            <div class="col-6">
                                <p class="lead">Amount Due <?=date('d-m-Y', strtotime(' +1 day'))?></p>

                                <div class="table-responsive">
                                    <table class="table">
                                        <tr>
                                            <th style="width:50%">Subtotal:</th>
                                            <td>{{subTotal | currency}}</td>
                                        </tr>
                                        <tr>
                                            <th>Tax (10%)</th>
                                            <td>{{tax | currency}}
                                            </td>
                                        </tr>
                                        <tr>
                                            <th>Total:</th>
                                            <td>{{total | currency}}
                                            </td>
                                        </tr>
                                    </table>
                                </div>
                            </div>
                        </div>
                        <div class="row no-print">
                            <div class="col-12">
                                <!-- <a href="invoice-print.html" rel="noopener" target="_blank" class="btn btn-default"><i
                                        class="fas fa-print"></i> Print</a> -->
                                <button ng-show="!model.id" id="pay-button" type="button"
                                    class="btn btn-success float-right" ng-click="save()"><i
                                        class="far fa-credit-card"></i>
                                    Confirm
                                </button>
                                <button ng-show="nilai>0" type="button" class="btn btn-warning btn-sm"
                                    ng-click="setForm(-1)">Kembali</button>
                                <button type="button" class="btn btn-secondary float-right" data-dismiss="modal"
                                    ng-click="nilai=0" style="margin-right: 5px;">
                                    <i class="fas fa-back"></i> Batal
                                </button>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>

    <div class="modal fade" id="upload" tabindex="-1" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header bg-danger">
                    <h5 class="modal-title">Upload Bukti Pembayaran</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form ng-submit="uploadBukti()">
                    <div class="modal-body">
                        <div class="form-group row">
                            <label for="totalTagihan" class="col-sm-2 col-form-label col-form-label-sm">Total
                                Tagihan</label>
                            <div class="col-sm-10">
                                <input type="text" readonly class="form-control-plaintext form-control-sm"
                                    id="totalTagihan" mask-currency="'Rp. '" ng-model="model.tagihanSisa">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="nominal1" class="col-sm-2 col-form-label col-form-label-sm">Nomimal</label>
                            <div class="col-sm-4">
                                <input type="text" class="form-control form-control-sm" id="nominal1"
                                    mask-currency="'Rp. '" ng-model="model.nominal">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="bukti1" class="col-sm-2 col-form-label col-form-label-sm">bukti</label>
                            <div class="col-sm-10">
                                <div class="input-group mb-3">
                                    <div class="custom-file">
                                        <input type="file" class="custom-file-input custom-file-input-sm" id="bukti1"
                                            aria-describedby="inputGroupFileAddon01" ng-model="model.bukti"
                                            base-sixty-four-input ng-change="cekFile(model.bukti)">
                                        <label class="custom-file-label"
                                            for="label">{{model.bukti ? model.bukti.filename: model.bukti && !model.bukti ? model.bukti: 'Pilih File'}}</label>
                                    </div>

                                    <span ng-show="form.model.bukti.$error.maxsize">Files must not exceed 5000
                                        KB</span>
                                </div>
                            </div>

                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary btn-sm" data-dismiss="modal">Tutup</button>
                        <button type="submit" class="btn btn-primary btn-sm">Simpan</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <!-- Button trigger modal -->


    <!-- Modal -->
    <div class="modal fade" id="modelId" tabindex="-1" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <img ng-src="{{files}}" class="img-responsive " />
            </div>
        </div>
    </div>



</div>