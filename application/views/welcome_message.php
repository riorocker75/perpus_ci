<html>
<head>
  <title>Hasil Cek Ongkos Kirim</title>
  <script src="//ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
  <link rel='stylesheet' href='http://fortawesome.github.io/Font-Awesome/assets/css/site.css'>
  <script src="https://raw.githubusercontent.com/tuupola/jquery_chained/master/jquery.chained.min.js"></script>
  <script src='https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js'></script>
  <link rel="stylesheet" href="http://fortawesome.github.io/Font-Awesome/assets/font-awesome/css/font-awesome.css">
</head>

<body>
  <div class="container">
    <div class="row"> 
      <div class="col-md-11 col-sm-12">

        <?php echo "<h3>Kota Asal Dari : <mark>".$query['rajaongkir']['origin_details']['city_name']. "</mark> Kota Tujuan Ke : <mark>" .$query['rajaongkir']['destination_details']['city_name']. "</mark> @".htmlspecialchars($_POST['weight'])." Gram | 
        <a href='".base_url()."'><small><i class='fa fa-repeat'></i> Hitung Kembali </small></a> </h3><br>";?>

        <table class='table table-stripped table-hover table-condensed table-bordered'>
          <tr style='background-color:#26A65B;'>
            <th style='text-align:center;color:#fff;'> <h4>Kurir</h4></th>
            <th style='text-align:center;color:#fff;'> <h4>Jenis Layanan</h4> </th>
            <th style='text-align:center;color:#fff;'> <h4>Tarif</h4> </th>
          </tr>
          <?php
          for ($i=0; $i < count($query['rajaongkir']['results']); $i++) { 
          for ($j=0; $j < count($query['rajaongkir']['results'][$i]['costs']); $j++) {
          ?>
          <tr>
            <td><strong><?php echo $query['rajaongkir']['results'][$i]['name']; ?></strong><p><small><?php echo $query['rajaongkir']['results'][$i]['costs'][$j]['description'];?></small></td>
            <td><?php echo $query['rajaongkir']['results'][$i]['costs'][$j]['service']; ?></td>
            <td><?php echo "Rp. ".number_format($query['rajaongkir']['results'][$i]['costs'][$j]['cost'][0]['value']);?></td>
          </tr>
          <?php 
        } 
      }
      ?>
    </div>
  </div>
</div>


</body>
</html>