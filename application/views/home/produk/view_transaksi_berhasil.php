<head>
    <script type="text/javascript"
            src="https://app.sandbox.midtrans.com/snap/snap.js"
            data-client-key="<SB-Mid-client-5d94PsIUGZD5ojwv"></script>
    <script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
  </head>
  
<div class="row">
  <div class="col-md-7 mx-auto">


    <div class="mb-3 text-center">
      <h5 class="mb-5">Transaksi Berhasil</h5>
      No Invoice anda : <b><?= $orders; ?></b><br>
      Total belanja anda <b class="text-danger">Rp <?= $total_bayar; ?></b><br>
      <a target='_BLANK' class="btn btn-sm btn-success mt-3 mb-2" href="<?= base_url(); ?>produk/print_invoice/<?= $orders; ?>"><span class="glyphicon glyphicon-print"></span> Download Invoice</a>
      <br>
    </div>

    <div class="mb-3">
      <p class="text-justify">
        Kami juga telah mengirimkan rincian pesanan anda ke <b class='text-danger'><?= $email; ?></b><br>
        Silahkan melakukan pembayaran uang dengan total <b>Rp <?= $total_bayar; ?></b> ke salah satu pilihan metode di bawah ini : <br>
      </p>
    </div>

<form id="payment-form" method="post" action="<?=site_url()?>members/riwayat_belanja">
      <input type="hidden" name="result_type" id="result-type" value=""></div>
      <input type="hidden" name="result_data" id="result-data" value=""></div>
    
    <div class="mb-3 text-center">
      <button class="btn btn-primary" id="pay-button">Pilih Metode Pembayaran!</button>
    </div>
    </form>

     <script type="text/javascript">
  
    $('#pay-button').click(function (event) {
      event.preventDefault();
      // $(this).attr("disabled", "disabled");
    
    $.ajax({
      url: '<?=site_url()?>keranjang/token/<?=$id_penjualan?>',
      cache: false,

      success: function(data) {
        //location = data;

        console.log('token = '+data);
        
        var resultType = document.getElementById('result-type');
        var resultData = document.getElementById('result-data');

        function changeResult(type,data){
          $("#result-type").val(type);
          $("#result-data").val(JSON.stringify(data));
          //resultType.innerHTML = type;
          //resultData.innerHTML = JSON.stringify(data);
        }

        snap.pay(data, {
          
          onSuccess: function(result){
            changeResult('success', result);
            console.log(result.status_message);
            console.log(result);
            $("#payment-form").submit();
          },
          onPending: function(result){
            changeResult('pending', result);
            console.log(result.status_message);
            $("#payment-form").submit();
          },
          onError: function(result){
            changeResult('error', result);
            console.log(result.status_message);
            $("#payment-form").submit();
          }
        });
      }
    });
  });

  </script>

    <!-- <div class="col-md-10 mx-auto text-left">
      <table class='table table-borderless table-sm'>
        <thead>
          <tr>
            <th width="20px">No</th>
            <th>Nama Bank</th>
            <th>No Rekening</th>
            <th>Atas Nama</th>
          </tr>
        </thead>
        <tbody>
          <?php
          $no = 1;
          foreach ($rekening->result_array() as $row) {
            echo "<tr>
                <td>$no</td>
                <td>$row[nama_bank]</td>
                <td>$row[no_rekening]</td>
                <td>$row[pemilik_rekening]</td>
            </tr>";
            $no++;
          }
          ?>
        </tbody>
      </table>
    </div> -->

    <hr>
    <p class="mt-2 mb-2">
      Setelah melakukan Pembayaran, silahkan konfirmasi pembayaran anda <a href='<?= base_url(); ?>konfirmasi'><strong>disini</strong></a>.
    </p>
  </div>
</div>
<div class="border-top mt-2 mb-5"></div>