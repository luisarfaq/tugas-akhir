<head>
    <!-- Load file CSS Bootstrap offline -->
    <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
    <script src="js/jquery-3.4.1.js"></script>
    <script src="datepicker/js/bootstrap-datepicker.js"></script>
    <link rel="stylesheet" href="datepicker/css/datepicker.css">
</head>
<div class="content-wrapper mt-3">
    <section class="content">
        <div class="container-fluid">

            <div class="row">
                <div class="col-md-12">
                    <div class="card">

                        <div class="card-header">
                            <h3 class="card-title">Laporan Penjualan</h3>
                        </div>

                        <div class="card-body">


 
                           

                               <!--  <thead>
                                    <tr>
                                        <td colspan="2">
                                            <button type='button' class='btn btn-primary btn-xs dropdown-toggle' data-toggle='dropdown' aria-haspopup='true' aria-expanded='false'> <span class='caret'></span> Pilih Waktu </button>
                                            <div class='dropdown-menu' style='border:1px solid #cecece;'>
                                                <a class='dropdown-item' href='<?= base_url('admin/laporan/') ?>'>Semua</a>
                                                <a class=' dropdown-item' href='<?= base_url('admin/laporan_hari') ?>'>Hari Ini</a>
                                                <a class=' dropdown-item' href='<?= base_url('admin/laporan_minggu') ?>'>7 hari terahir</a>
                                                <a class=' dropdown-item' href='<?= base_url('admin/laporan_bulan') ?>'>30 hari terakhir</a>
                                                <a class=' dropdown-item' href='<?= base_url('admin/laporan_tahun') ?>'>1 tahun terakhir</a>
                                            </div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <th style="width: 5%">No</th>
                                        <th>Waktu Transaksi</th>
                                        <th>Kode Transaksi</th>
                                        <th>Total Belanja</th>
                                        <th>Pengiriman</th>
                                        <th>Kota Tujuan</th>
                                    </tr>
                                </thead> -->
                                 <h4>Pencarian Data Berdasarkan Tanggal</h4>

    <form action="" method="get">

        <div class="form-group">
            <label>Tanggal Awal</label>
            <div class="input-group date">
                <div class="input-group-addon">
                    <span class="glyphicon glyphicon-th"></span>
                </div>
                <input id="tgl_awal" placeholder="masukkan tanggal Awal" type="date" class="form-control" name="tgl_awal"  value="<?php if (isset($_GET['tgl_awal'])) echo $_GET['tgl_awal'];?>" >
            </div>
        </div>
        <div class="form-group">
            <label>Tanggal Akhir</label>
            <div class="input-group date">
                <div class="input-group-addon">
                    <span class="glyphicon glyphicon-th"></span>
                </div>
                <input id="tgl_akhir" placeholder="masukkan tanggal Akhir" type="date" class="form-control" name="tgl_akhir" value="<?php if (isset($_GET['tgl_akhir'])) echo $_GET['tgl_akhir'];?>">
            </div>
        </div>
         <div class="form-group">
        <input type="submit" disabled class="btn btn-info" value="Cari" id="btncari">
    </div>
    </form>

<table id="laptabel" class="table table-bordered table-hover" style="width:100%">
        <br>
        <thead>
        <tr>
            <th style="width: 5%">No</th>
                                        <th>Waktu Transaksi</th>
                                        <th>Kode Transaksi</th>
                                        <th>Pengiriman</th>
                                        <th>Kota Tujuan</th>
                                        <th>Total Belanja</th>
        </tr>
        </thead>
                                <!-- <tbody>
                                    <?php
                                    $no = 1;
                                    foreach ($record->result_array() as $row) {

                                        $total = $this->db->query("SELECT a.kode_transaksi, a.kurir, a.resi, a.service, a.proses, a.ongkir, sum((b.harga_jual*b.jumlah)-(c.diskon*b.jumlah)) as total, sum(c.berat*b.jumlah) as total_berat FROM `tb_toko_penjualan` a JOIN tb_toko_penjualandetail b ON a.id_penjualan=b.id_penjualan JOIN tb_toko_produk c ON b.id_produk=c.id_produk JOIN tb_pengguna d ON a.id_pembeli=d.id_pengguna where a.kode_transaksi='$row[kode_transaksi]'")->row_array();
                                        $alamat = $this->db->query("SELECT id_alamat FROM tb_pengguna WHERE id_pengguna=$row[id_pembeli]")->row_array();
                                        $kota = $this->db->query("SELECT a.nama_kota FROM `tb_kota` a JOIN tb_alamat b ON a.kota_id=b.id_kota where b.id_alamat='$alamat[id_alamat]'")->row_array();

                                    ?>
                                        <tr>
                                            <td><?= $no ?> </td>
                                            <td><?= $row['waktu_transaksi'] ?></td>
                                            <td><?= $row['kode_transaksi']; ?></td>
                                            <td style='color:red;'>Rp <?= rupiah($total['total'] + $total['ongkir']) ?></td>
                                            <td><span style='text-transform:uppercase'> <?= $total['kurir'] ?></span> <?= ($total['service']) ?></td>
                                            <td><?= $kota['nama_kota'] ?></td>
                                        </tr>
                                    <?php
                                        $no++;
                                    }
                                    ?>
                                </tbody> -->

                                
                                <tbody>
                                <?php
                                    $no = 1;
                                    $total_harga = 0;
                                    foreach ($record->result_array() as $row) {
                                        $total_harga += $total['total'] + $total['ongkir'];

                                        $total = $this->db->query("SELECT a.kode_transaksi, a.kurir, a.resi, a.service, a.proses, a.ongkir, sum((b.harga_jual*b.jumlah)-(c.diskon*b.jumlah)) as total, sum(c.berat*b.jumlah) as total_berat FROM `tb_toko_penjualan` a JOIN tb_toko_penjualandetail b ON a.id_penjualan=b.id_penjualan JOIN tb_toko_produk c ON b.id_produk=c.id_produk JOIN tb_pengguna d ON a.id_pembeli=d.id_pengguna where a.kode_transaksi='$row[kode_transaksi]'")->row_array();
                                        $alamat = $this->db->query("SELECT id_alamat FROM tb_pengguna WHERE id_pengguna=$row[id_pembeli]")->row_array();
                                        $kota = $this->db->query("SELECT a.nama_kota FROM `tb_kota` a JOIN tb_alamat b ON a.kota_id=b.id_kota where b.id_alamat='$alamat[id_alamat]'")->row_array();

                                    ?>
       
            
          <tr>
                                            <td><?= $no ?> </td>
                                            <td><?= $row['waktu_transaksi'] ?></td>
                                            <td><?= $row['kode_transaksi']; ?></td>
                                            <td><span style='text-transform:uppercase'> <?= $total['kurir'] ?></span> <?= ($total['service']) ?></td>
                                            <td><?= $kota['nama_kota'] ?></td>
                                            <td style='color:red;'>Rp <?= rupiah($total['total'] + $total['ongkir']) ?></td>
                                        </tr>
                                    <?php
                                        $no++;
                                    }
                                    ?>
           
                            </table>
                        </div>

                    </div>

                </div>
            </div>
        </div>
    </section>
</div>

<script>
    function getBase64Image(img) {
        var canvas = document.createElement("canvas");
        canvas.width = img.width;
        canvas.height = img.height;
        var ctx = canvas.getContext("2d");
        ctx.drawImage(img, 0, 0);
        return canvas.toDataURL("image/png");
    }
    $(document).ready(function() {
        $('#laptabel').DataTable({
            "searching": false,
            "ordering": false,
            "bInfo": false,
            dom: 'Bfrtip',
            buttons: [
                    'copy',
                    'csv', 
                    'excel', 
                    // 'pdf', 
                    'print',
                    {
                        extend: 'pdfHtml5',
                        text: 'PDF',
                        customize: function ( doc ) {

                            var myGlyph = new Image();
                            myGlyph.src = '<?= base_url('assets/images/logo/logo_default.jpg') ?>';
                            var gambar_base64 = getBase64Image(myGlyph);

                            doc.content.splice( 1, 0, [
                                {text: 'Laporan Penjualan - Topgear Coffe & Roastery', alignment: 'left', margin:[60,-3,0,0],fontSize:17,bold: true, },
                                {text: 'Jl. C. Simanjuntak No.17, Terban, Kec. Gondokusuman, Kota Yogyakarta, \n Daerah Istimewa Yogyakarta 55223 , Yogyakarta', alignment: 'left', margin:[60,0,0,0],height:200 },
                                {text: '', alignment: 'left', margin:[60,0,0,10],height:200 },
                            ]);
                            // header
                            var cols = [];
                            cols[0] = {image: gambar_base64, alignment: 'left', margin:[40,45],width: 50,height: 50,};
                            // cols[1] = [
                            //     {text: 'Laporan Penjualan - Topgear Coffe & Roastery', alignment: 'left', margin:[60,-3,0,0],fontSize:17,bold: true, },
                            //     {text: 'Jl. C. Simanjuntak No.17, Terban, Kec. Gondokusuman, Kota Yogyakarta, \n Daerah Istimewa Yogyakarta 55223 , Yogyakarta', alignment: 'left', margin:[60,-1,0,0],height:200 },
                            // ];
                            var objHeader = {};
                            objHeader['columns'] = cols;
                            doc['header']=objHeader;
                            doc.styles.title.fontSize = 0;
                            // doc.styles.header.height=100;



                            doc.content.push(
                                {text:"Total : Rp. <?= rupiah($total_harga) ?>",margin:[400,20,20,20]}
                            );
                            doc.content.push(
                                {text:"Yogyakarta, <?= date('j F Y') ?>",margin:[350,20,20,20]}
                            );
                            doc.content.push(
                                {text:"",margin:[350,20,20,20],alignment: 'center',}
                            );
                            doc.content.push(
                                {text:"<?= $this->session->userdata('nama_lengkap') ?>",margin:[350,20,20,20],alignment: 'center',}
                            );
                            // footer
                            var cols = [];
                            cols[0] = {text: '<?= base_url("admin/laporan") ?>', alignment: 'left', margin:[20] };
                            cols[1] = {text: '', alignment: 'right', margin:[0,0,20] };
                            var objFooter = {};
                            objFooter['columns'] = cols;
                            doc['footer']=objFooter;
                        }
                    }]
                    
            });
    });

   $(function(){
                function cek_date(cek) {
                    console.log('ss')
                    var tanggal_awal = $('#tgl_awal').val();
                    var tanggal_akhir = $('#tgl_akhir').val();
                    console.log(tanggal_awal)
                    console.log(tanggal_akhir)
                    if (tanggal_awal !== '' && tanggal_akhir !== '') {
                        if (tanggal_awal>tanggal_akhir) {
                            alert('tanggal akhir tidak boleh kurang dari tanggal awal')
                            $('#tgl_awal').val('')
                            $('#tgl_akhir').val('')
                            $('#btncari').attr('disabled',true)
                        }else{
                            $('#btncari').attr('disabled',false)
                        }
                    }else{
                            $('#btncari').attr('disabled',true)
                        console.log('null')
                    }
                }
                cek_date()

                $('#tgl_awal').change(function(){
                    cek_date('awal')
                })
                $('#tgl_akhir').change(function(){
                    cek_date('akhir')
                })
                // $("#tgl_akhir").datepicker({
                //     format: 'dd-mm-yyyy',
                //     autoclose: true,
                //     todayHighlight: true,
                // });
                // $("#tgl_mulai").on('change', function(selected) {
                //     var startDate = new Date(selected.date.valueOf());
                //     $('#tgl_akhir').datepicker({
                //         startDate: startDate
                //     });
                //     // $("#tgl_akhir").datepicker('setStartDate', startDate);
                //     // if($("#tgl_mulai").val() > $("#tgl_akhir").val()){
                //     //     $("#tgl_akhir").val();
                //     // }
                // });
            });
</script>