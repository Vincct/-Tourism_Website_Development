<!DOCTYPE html>
<html>
<?php
include "admin/include/config.php";
if (isset($_POST['Simpan'])) {
  $saranID = $_POST["idsaran"];
  $saranNAMA = $_POST["namasaran"];
  $saranEMAIL = $_POST["emailsaran"];
  $saranKOM = $_POST["komsaran"];

  mysqli_query($connection, "insert into saran values('$saranID', '$saranNAMA', '$saranEMAIL', '$saranKOM')");
}
$vincentius = mysqli_query($connection, "select * from vincentius, destinasi where vincentius.destinasiKODE = destinasi.destinasiKODE");
$menukategori = mysqli_query($connection, "select * from kategoriwisata");
$menurestoran = mysqli_query($connection, "select * from restoran");
$menudestinasi = mysqli_query($connection, "select * from destinasi");
$destinasi = mysqli_query($connection, "select * from destinasi, kategoriwisata where destinasi.kategoriKODE = kategoriwisata.kategoriKODE");
$fotodestinasi = mysqli_query($connection, "select * from fotodestinasi");
$berita = mysqli_query($connection, "select * from berita");
$hotel = mysqli_query($connection, "select * from hotel");
$sqlkategori = mysqli_query($connection, "SELECT * FROM kategoriwisata");
$sqlhotel = mysqli_query($connection, "SELECT * FROM hotel");
$sqlrestoran = mysqli_query($connection, "SELECT * FROM restoran");
$jumlahkategori = mysqli_num_rows($sqlkategori);
$jumlahhotel = mysqli_num_rows($sqlhotel);
$jumlahrestoran = mysqli_num_rows($sqlrestoran);
?>
<div class="container" style="background: skyblue;">

  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title></title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
  </head>

  <body>

    <!-- Menu -->
    <nav class="navbar navbar-expand-lg navbar-light" style="background: deepskyblue;">
      <div class="container">
        <a class="navbar-brand" style="font-family: Lucida Handwriting;" href="http://localhost/webdev2324-A/">WebsiteKu</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
          <ul class="navbar-nav me-auto mb-2 mb-lg-0">
            <li class="nav-item">
              <a class="nav-link active" aria-current="page" href="http://localhost/webdev2324-A/">Home</a>
            </li>
            <li class="nav-item dropdown">
              <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                Kategori Wisata
              </a>
              <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                <?php
                if (mysqli_num_rows($menukategori) > 0) {
                  while ($row = mysqli_fetch_array($menukategori)) { ?>
                    <li><a class="dropdown-item" href="#"><?php echo $row["kategoriNAMA"] ?></a></li>
                <?php }
                } ?>
              </ul>
            </li>
            <li class="nav-item dropdown">
              <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                Destinasi Wisata
              </a>
              <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                <?php
                if (mysqli_num_rows($menudestinasi) > 0) {
                  while ($row = mysqli_fetch_array($menudestinasi)) { ?>
                    <li><a class="dropdown-item" href="#"><?php echo $row["destinasiNAMA"] ?></a></li>
                <?php }
                } ?>
              </ul>
            </li>
            <li class="nav-item dropdown">
              <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                Restoran
              </a>
              <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                <?php
                if (mysqli_num_rows($menurestoran) > 0) {
                  while ($row = mysqli_fetch_array($menurestoran)) { ?>
                    <li><a class="dropdown-item" href="#"><?php echo $row["restoranNAMA"] ?></a></li>
                <?php }
                } ?>
              </ul>
            </li>
          </ul>
        </div>
      </div>
    </nav>
    <!-- Akhir Menu -->

    <!-- Slider -->
    <div id="carouselExampleCaptions" class="carousel slide" data-bs-ride="carousel">
      <div class="carousel-indicators">
        <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
        <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="1" aria-label="Slide 2"></button>
        <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="2" aria-label="Slide 3"></button>
      </div>
      <div class="carousel-inner">
        <div class="carousel-item active">
          <img src="ADMIN/images/Pesonaindonesia.jpg" class="d-block w-100" alt="Foto tidak ada">
          <div class="carousel-caption d-none d-md-block">
            <h5>Informasi Seputar Destinasi Wisata</h5>
            <p>Temukan pesona menarik yang dapat kita jumpai di Indonesia.</p>
          </div>
        </div>
        <div class="carousel-item">
          <img src="ADMIN/images/Pesonajawa.jpg" class="d-block w-100" alt="Foto tidak ada">
          <div class="carousel-caption d-none d-md-block">
            <h5>1001 Informasi mengenai Pesona Jawa</h5>
            <p>Temukan informasi menarik yang ada dipulau jawa.</p>
          </div>
        </div>
        <div class="carousel-item">
          <img src="ADMIN/images/pantaibos.jpg" class="d-block w-100" alt="Foto tidak ada">
          <div class="carousel-caption d-none d-md-block">
            <h5>Beragam pantai yang ada di Indonesia</h5>
            <p>Temukan seputar pantai - pantai yang menarik disini.</p>
          </div>
        </div>
      </div>
      <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="prev">
        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
        <span class="visually-hidden">Previous</span>
      </button>
      <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="next">
        <span class="carousel-control-next-icon" aria-hidden="true"></span>
        <span class="visually-hidden">Next</span>
      </button>
    </div>
    <!-- Akhir Slider -->
    <br>
    <div class="container" style="background: lightblue; font-family: times-new-roman; color: white;"> <!-- Deskripsi -->
      <h2 class="text-center deskripsi" style="padding-top: 10px;">Pariwisata Indonesia</h2>
      <br>
      <p class="text-center" style="color: black;">Kekayaan alam dan budaya merupakan komponen penting dalam pariwisata di Indonesia. Alam Indonesia memiliki kombinasi iklim tropis, 17.508 pulau yang 6.000 diantaranya tidak dihuni, serta garis pantai terpanjang ketiga di dunia setelah Kanada dan Uni Eropa. Indonesia juga merupakan negara kepulauan terbesar dan berpenduduk terbanyak di dunia. Pantai-pantai di Bali, tempat menyelam di Bunaken, Gunung Rinjani di Lombok, dan berbagai taman nasional di Sumatra merupakan contoh tujuan wisata alam di Indonesia. Tempat-tempat wisata itu didukung dengan warisan budaya yang kaya yang mencerminkan sejarah dan keberagaman etnis Indonesia yang dinamis dengan 719 bahasa daerah yang dituturkan di seluruh kepulauan tersebut. Candi Prambanan dan Borobudur, Toraja, Yogyakarta, Minangkabau, dan Bali merupakan contoh tujuan wisata budaya di Indonesia. Hingga 2010, terdapat 7 lokasi di Indonesia yang telah ditetapkan oleh UNESCO yang masuk dalam daftar Situs Warisan Dunia.</p>
      <br>
      <h5 class="text-center penutup-deskripsi" style="padding-bottom: 10px; font-family: Lucida Handwriting; color: white;">Travel News</h5>
    </div><!-- Akhir Deskripsi -->
    <br>
    <!-- Berita -->
    <div class="row">
      <div class="col-sm-8">
        <div class="head-berita" style="margin-bottom: 5px; font-family: times-new-roman; padding: 25px; background: lightblue; font-size: 30px;">
          Latest News
        </div>
        <div class="background-berita" style="background: white;">
          <?php
          if (mysqli_num_rows($berita) > 0) {
            while ($row = mysqli_fetch_array($berita)) { ?>
              <div class="d-flex berita-item">
                <div class="flex-shrink-0">
                  <img style="width:200px; height: 150px; margin: 10px;" src="ADMIN/images/<?php echo $row["kategoriberitaFOTO"]; ?>" alt="No Images">
                </div>
                <div class="flex-grow-1" style="margin-left: 10px; margin-top: 5px;">
                  <small class="text-muted"> <i>Kategori: <?php echo $row["kategoriberitaKAT"] ?></i></small>
                  <h5><?php echo $row["kategoriberitaNAMA"] ?></h5>
                  <p style="text-align: justify; margin-right: 10px;"><?php echo substr($row["kategoriberitaKET"], 0, 250); ?>...</p>
                  <a href="#" class="btn btn-secondary" style="margin-bottom: 10px;">Read More</a>
                </div>
              </div>
          <?php }
          }
          ?>
        </div>
      </div> <!-- Penutup col-sm-8 -->
      <div class="col-sm-4">
        <div class="head-videos" style="margin-bottom: 5px; font-family: times-new-roman; padding: 25px; background: lightblue; font-size: 30px;">
          Panorama Videos
        </div>
        <div class="card">
          <div class="card-body">
            <iframe width="100%" height="250" src="https://www.youtube.com/embed/XU01D0yEScE?si=gSmt9XOBeZ9S9PcO" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" allowfullscreen></iframe>
            <p class="card-text" style="text-align: center;">Source: Pesona Indonesia Youtube Channel</p>
            <iframe width="100%" height="250" src="https://www.youtube.com/embed/g37bUWau-Yo?si=LS8pBS9g8t7GT8F0" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" allowfullscreen></iframe>
            <p class="card-text" style="text-align: center;">Source: Pesona Indonesia Youtube Channel</p>
          </div>
        </div>
      </div> <!-- Penutup col-sm-4 -->
    </div> <!-- Penutup row -->
    <!-- Akhir Berita -->

    <!-- What's In -->
    <div class="container" style="background: white; overflow: hidden; padding: 50px 0; margin: 10px 0;">
      <h2 class="text-center whatsin" style="font-family: times-new-roman;">What's In WebsiteKu</h2>
      <div class="row justify-content-center">
        <div class="card" style=" width: 150px; float: left; margin: 10px 10px 10px 10px;">
          <div class="card-body" style="width: 150px; height: 100%">
            <img src="ADMIN/images/mountain.png" class="d-block w-100" alt="Foto tidak ada" style="padding-top: 15px;">
            <p style="text-align: center; padding-bottom: 15px;">Detinasi Wisata</p>
          </div>
        </div>
        <div class="card" style=" width: 150px; float: left; margin: 10px 10px 10px 10px;">
          <div class="card-body" style="width: 150px; height: 100%">
            <img src="ADMIN/images/hotel.png" class="d-block w-100" alt="Foto tidak ada" style="padding-top: 15px;">
            <p style="text-align: center; padding-bottom: 15px;">Pilihan Hotel</p>
          </div>
        </div>
        <div class="card" style=" width: 150px; float: left; margin: 10px 10px 10px 10px;">
          <div class="card-body" style="width: 150px; height: 100%">
            <img src="ADMIN/images/food-store.png" class="d-block w-100" alt="Foto tidak ada" style="padding-top: 15px;">
            <p style="text-align: center; padding-bottom: 15px;">Pilihan Restoran</p>
          </div>
        </div>
      </div>
    </div><!-- Akhir What's In -->

    <!-- Destinasi Pilihan -->
    <div class="row">
      <div class="col-sm-8">
        <div class="head-destinasi" style="margin-bottom: 5px; font-family: times-new-roman; padding: 25px 0; font-size: 30px;">
          Destinasi Pilihan
        </div>
        <div class="background-destinasi" style="background: white;">
          <?php
          if (mysqli_num_rows($destinasi) > 0) {
            while ($row = mysqli_fetch_array($destinasi)) { ?>
              <div class="d-flex destinasi-item" style="">
                <div class="flex-grow-1" style="padding-bottom: 20px">
                  <h4 style="margin: 15px 0 3px 15px;"><?php echo $row["kategoriNAMA"] ?></h4>
                  <h5 class="text-muted" style="margin: 0 0 0 15px;"> <i><?php echo $row["kategoriKET"] ?></i></h5>
                  <p style="margin: 0 0 0 15px; text-align: justify;"><?php echo substr($row["destinasiKET"], 0, 250); ?></p>
                </div>
                <div class="flex-shrink-0" style="margin: 15px;">
                  <img style="width:180px; height: 130px; " src="ADMIN/images/<?php echo $row["destinasiFOTO"]; ?>" alt="No Images">
                </div>
              </div>
          <?php }
          }
          ?>
        </div>
      </div> <!-- Penutup col-sm-8 -->
      <div class="col-sm-4">
        <div class="box-button" style="margin-top: 100px; background: white;">
          <div class="card-body">
            <button type="button" class="btn">Pilihan Obyek Wisata <span class="badge bg-primary"><?php echo $jumlahkategori ?></span></button>
          </div>
          <div class="card-body">
            <button type="button" class="btn">Pilihan Hotel <span class="badge bg-primary"><?php echo $jumlahhotel ?></span></button>
          </div>
          <div class="card-body">
            <button type="button" class="btn">Pilihan Restoran <span class="badge bg-primary"><?php echo $jumlahrestoran ?></span></button>
          </div>
        </div> <!-- Penutup col-sm-4 -->
      </div> <!-- Penutup row -->
      <!-- Akhir Destinasi Pilihan -->

      <div class="container" style="margin-top: 10px;"> <!-- Foto Destinasi -->
        <h2 class="text-center fotodestinasi" style="font-family: Lucida Handwriting; padding-top: 30px; color: white;">Wonderful Nusantara</h2>
        <br>
        <h3 class="text-center fotodestinasi" style="padding-bottom: 10px; font-family: times-new-roman; color: white; padding-bottom: 20px">Foto Destinasi</h3>
        <div class="container" style="background: white; padding: 50px 0 0 0; margin: 10px 0;">
          <div class="row" style="margin-left: 3px;">
            <?php
            if (mysqli_num_rows($fotodestinasi) > 0) {
              while ($row = mysqli_fetch_array($fotodestinasi)) { ?>
                <div class="col-md-4">
                  <img style="width:400px; height: 250px; margin-bottom: 30px;" src="ADMIN/images/<?php echo $row["fotodestinasiFILE"]; ?>" alt="No Images">
                </div>
            <?php }
            }
            ?>
          </div>
        </div>
        <!-- Pilihan Restoran Hotel -->
        <div class="container" style="background: white; padding: 10px;">
          <h2 style="font-family: Lucida Handwriting; padding: 10px; background: white;">Pilihan Hotel</h2>
          <h2 style="font-family: Lucida Handwriting; padding: 10px; background: white;">Pilihan Restoran</h2>
        </div>
        <div class="container" style="background: plum; padding: 10px;">
          <div class="row">
            <?php
            if (mysqli_num_rows($hotel) > 0) {
              while ($row = mysqli_fetch_array($hotel)) {
            ?>
                <div class="col-md-6">
                  <div class="card" style="background: linear-gradient(to right, white 94%, #E80C9D 94%); margin: 10px 0;">
                    <div class="card-body">
                      <div class="d-flex destinasi-item">
                        <div class="flex-grow-1" style="padding-bottom: 20px">
                          <h4 style="margin: 10px 0 3px 10px;"><?php echo $row["hotelNAMA"] ?></h4>
                        </div>
                        <div class="flex-shrink-0" style="margin: 10px 30px;">
                          <img style="width:300px; height: 200px;" src="ADMIN/images/<?php echo $row["hotelFILE"]; ?>" alt="No Images">
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
            <?php
              }
            }
            ?>
          </div>
        </div>
        <!-- Akhir Pilihan Restoran Hotel -->

        <!-- UAS3 -->
<div class="row">
      <div class="col-sm-12">
        <div class="head-vincentius" style="margin: 10px 0; font-family: times-new-roman; padding: 25px; background: lightblue; font-size: 30px;">
          Vincentius
        </div>
        <div class="background-vincentius" style="background: white;">
          <?php
          if (mysqli_num_rows($vincentius) > 0) {
            while ($row = mysqli_fetch_array($vincentius)) { ?>
              <div class="d-flex vincentius-item">
                <div class="flex-shrink-0">
                  <img style="width:200px; height: 150px; margin: 10px;" src="ADMIN/images/<?php echo $row["destinasiFOTO"]; ?>" alt="No Images">
                </div>
                <div class="flex-grow-1" style="margin-left: 10px; margin-top: 5px;">
                  <small class="text-muted"> <i>Kategori: <?php echo $row["destinasiNAMA"] ?></i></small>
                  <h5><?php echo $row["vincentiusKOTA"] ?></h5>
                  <p style="text-align: justify; margin-right: 100px;"><?php echo substr($row["destinasiKET"], 0, 255); ?></p>
                  <small class="text-muted" style="font-size: 12px;">ID : <i><?php echo $row["vincentiusID"] ?> |</i></small>
                  <small class="text-muted" style="font-size: 12px;">KODE : <i><?php echo $row["destinasiKODE"] ?></i></small>
                </div>
              </div>
          <?php }
          }
          ?>
        </div>
      </div> <!-- Penutup col-sm-12 -->
    </div> <!-- Penutup row -->
        <!-- Akhir UAS3 -->

        <!-- What The -->
        <div class="container" style="background: white; overflow: hidden; padding: 50px 0; margin: 10px 0; text-align: center;">
          <h2 class="whatthe" style="font-family: times-new-roman;">What The Author Said?</h2>
          <div class="d-flex whatthe-item justify-content-center">
            <div style="margin: 20px 10px;">
              <img src="ADMIN/images/fotoprofil.jpg" alt="Foto tidak ada" style="width: 150px; height:150px; border-radius: 50%; margin-right: 15px;">
            </div>
            <div style="margin-top: 15px; padding-bottom: 20px; text-align: left; width: 50%;">
              <h5>Vincentius</h5>
              <p style=" text-align:justify;">Halo, nama Saya Vincentius. Lahir di Jakarta, tanggal 17 April 2004 dan umur Saya sekarang 19 tahun. Saat ini Saya sedang berkuliah di Universitas Tarumanagara dengan Fakultas Teknik Informasi di jurusan Sistem Informasi.</p>
            </div>
          </div>
        </div><!-- Akhir What The -->

        <div class="container saran"> <!-- Akhir Saran -->
          <div class="row">
            <div class="col-md-4" style="background: white; padding-bottom: 15px;">
              <h4 style="font-family: Lucida Handwriting; margin: 15px 10px; width: 70%; font-weight: bold;">Yuk Beri Saran Untuk Websiteku!</h4>
              <form method="POST">
              <div class="form-group row" style="margin: 0 5px;">
                  <label for="saranID" class="col-sm-12 col-form-label">ID :</label>
                  <div class="col-sm-12">
                    <input type="text" class="form-control" id="saranID" name="idsaran">
                  </div>
              </div>
              <div class="form-group row" style="margin: 0 5px;">
                <label for="saranNAMA" class="col-sm-12 col-form-label">Nama :</label>
                <div class="col-sm-12">
                  <input type="text" class="form-control" id="saranNAMA" name="namasaran">
                </div>
              </div>
              <div class="form-group row" style="margin: 0 5px;">
                <label for="saranEMAIL" class="col-sm-12 col-form-label">Email :</label>
                <div class="col-sm-12">
                  <input type="text" class="form-control" id="saranEMAIL" name="emailsaran">
                </div>
              </div>
              <div class="form-group row" style="margin: 0 5px;">
                <label for="saranKOM" class="col-sm-12 col-form-label">Komentar :</label>
                <div class="col-sm-12">
                  <textarea class="form-control" id="saranKOM" name="komsaran" rows="5"></textarea>
                </div>
              </div>
              <br>
              <div class="form-group row" style="margin: 0 5px;">
                <div class="col-sm-3">
                  <button type="submit" class="btn btn-secondary" value="Simpan" name="Simpan">Simpan</button>
                </div>
                <div class="col-sm-2">
                  <button type="reset" class="btn btn-success">Batal</button>
                </div>
              </div>
              </form>
            </div>
            <div class="col-md-8" style="background: lightblue;">
              <h4 style="font-family: Lucida Handwriting; text-align: center; font-weight: bold; padding: 20px 0;">Komentar Anda</h4>
              <table class="table" style="flex-grow: 1; background: lightblue; margin: 0 20px; width: 95%;">
                <thead>
                  <tr>
                    <th scope="col" style="flex-shrink: 1; border-bottom: 0;">No</th>
                    <th scope="col" style="flex-shrink: 1; border-bottom: 0; width: 30%;">Nama</th>
                    <th scope="col" style="flex-shrink: 1; border-bottom: 0; width: 30%;">Email</th>
                    <th scope="col" style="flex-shrink: 1; border-bottom: 0;">Komentar</th>
                  </tr>
                </thead>
                <tbody>
                  <?php
                  $jumlahtampilan = 7;
                  $halaman = (isset($_GET['page'])) ? $_GET['page'] : 1;
                  $mulaitampilan = ($halaman - 1) * $jumlahtampilan;

                  if (isset($_POST["kirim"])) {
                    $search = $_POST["search"];
                    $query = mysqli_query($connection, "select saran.* from saranID where saranNAMA like '%" . $search . "%' limit $mulaitampilan, $jumlahtampilan");
                  } else {
                    $query = mysqli_query($connection, "select saran.* from saran limit $mulaitampilan, $jumlahtampilan");
                  }

                  $nomor = 1;
                  while ($row = mysqli_fetch_array($query)) {
                  ?>
                    <tr>
                      <td style="border: 0;"><?php echo $mulaitampilan + $nomor; ?></td>
                      <td style="border: 0;"><?php echo $row['saranNAMA']; ?></td>
                      <td style="border: 0;"><?php echo $row['saranEMAIL']; ?></td>
                      <td style="border: 0;"><?php echo $row['saranKOM']; ?></td>
                    </tr>
                    <?php $nomor = $nomor + 1; ?>
                  <?php } ?>
                </tbody>
              </table>
              <?php
              $query = mysqli_query($connection, "SELECT * FROM saran");
              $jumlahrecord = mysqli_num_rows($query);
              $jumlahpage = ceil($jumlahrecord / $jumlahtampilan);
              ?>

              <nav aria-label="Page navigation example" style=" bottom: 0; width: 100%; margin-top: 30px;">
                <ul class="pagination">
                  <li class="page-item"><a class="page-link" style="color: black;" href="?page=<?php $nomorhal = 1; echo $nomorhal ?>">PERTAMA</a></li>
                  <?php for ($nomorhal = 1; $nomorhal <= $jumlahpage; $nomorhal++) { ?>
                    <li class="page-item">
                      <?php
                      if ($nomorhal != $halaman) { ?>
                        <a class="page-link" href="?page=<?php echo $nomorhal ?>"><?php echo $nomorhal ?></a>
                      <?php } else { ?>
                        <a class="page-link" style="color: black;" href="?page=<?php echo $nomorhal ?>"><?php echo $nomorhal ?></a>
                      <?php } ?>
                    </li>
                  <?php } ?>
                  <li class="page-item"><a class="page-link" style="color: black;" href="?page=<?php echo $nomorhal - 1 ?>">TERAKHIR</a></li>
                </ul>
              </nav>
            </div>
          </div>
        </div> <!-- Akhir Saran -->

        <div class="footer" style="margin: 100px 0; display: flex;">
    <div class="row">
        <div class="col-sm-1"></div>
        <div class="col-sm-5">
            <div style="display: flex; align-items: center; margin: 30px 0;">
                <img src="ADMIN/images/location.png" alt="Foto tidak ada" style="width: 50px; height:50px; margin-right: 15px;">
                <p style="text-align:left; margin: 0;">Yayasan Tarumanagara, Jl. Letjen S. Parman No.1, RT.3/RW.8, Tomang, Kec. Grogol petamburan, Kota Jakarta Barat, Daerah Khusus Ibukota Jakarta 11440</p>
            </div>
            <div style="display: flex; align-items: center; margin-bottom: 30px;">
                <img src="ADMIN/images/phone-call.png" alt="Foto tidak ada" style="width: 50px; height:50px; margin-right: 15px;">
                <p style="text-align:left; margin: 0;">021 - 56958723</p>
            </div>
            <div style="display: flex; align-items: center;">
                <img src="ADMIN/images/mail.png" alt="Foto tidak ada" style="width: 50px; height:50px; margin-right: 15px;">
                <p style="text-align:left; margin: 0;">humas@untar.ac.id</p>
            </div>
        </div>
        <div class="col-sm-5">
            <h1 style="font-family: times-new-roman; margin-bottom: 30px;">About WebsiteKu</h1>
            <p style="text-align:justify; margin-bottom: 30px;">Website ini diciptakan untuk mengeksplor dan membagikan keindahan alam Nusantara kepada seluruh orang yang sedang mencari destinasi wisata.</p>
            <img src="ADMIN/images/facebooklogo.png" alt="Foto tidak ada" style="width: 50px; height:50px; border-radius: 50%; margin-right: 15px;">
            <img src="ADMIN/images/twitterlogo.png" alt="Foto tidak ada" style="width: 50px; height:50px; border-radius: 50%; margin-right: 15px;">
            <img src="ADMIN/images/instagramlogo.png" alt="Foto tidak ada" style="width: 50px; height:50px; border-radius: 50%; margin-right: 15px;">
        </div>
        <div class="col-sm-1"></div>
    </div>
</div>

      </div>

        
          </div> <!-- Close row-->
        </div> <!-- Close col-sm-10-->
      </div> <!-- Penutup Container -->
      <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
      <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
      <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/js/select2.min.js"></script>
  </body>
  <!-- Script Menu -->

  <!-- Akhir Script Menu -->

</html>