<div class="col-md-12">
    <div class="card">
        <div class="card-body">
            <h4><strong>Fasilitas The Plaza Papua Trade Center (PTC) </strong></h4>
            <?php foreach ($fasilitas as $key => $fas): ?>
            <div class="col-md-8">
                <div class="row">
                    <div class="col-md-5">
                        <?=$fas['nama'];?>
                    </div>
                    <div class="col-md-5">
                        : Rp.
                        <?=number_format($fas['tarif'], 2, ",", ".") . "/" . $fas['satuan'] . " (" . $fas['jumlah'] . " " . $fas['satuan'] . ")"?>
                    </div>
                </div>
            </div>
            <?php endforeach;?><br>
            <h5 style="font-style: italic;"><strong>Catatan</strong></h5>
            <p>
            <ul>
                <li>Uang Muka sewa The Plaza PTC minimum Rp. 2.500.000,- Pembayaran harus segera dilunasi paling labat 3
                    hari sebelum acara
                </li>
                <li>Apabila tanggal yang ditetapkan batal maka Uang muka tidak dapat dikembalikan (hangus)
                </li>
                <li>Jika ada penambahan tempat di The Plaza akan dikenakan pembayaran dengan senilai dengan
                    penambahan tempat
                    fasilitas
                </li>
                <li>Tidak menerima kursi dari luar
                </li>
            </ul>
            </p>
            <h5 style="font-style: italic;"><strong>Phone Number: 082197503176</strong></h5>

        </div>
    </div>
</div>