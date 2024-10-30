<?php
    include "config.php";
    $sqldestinasi = mysqli_query($connection, "SELECT * FROM destinasi");
    $sqlkategori = mysqli_query($connection, "SELECT * FROM kategoriwisata");
    $sqloleh = mysqli_query($connection, "SELECT * FROM oleholeh");
    $sqlrestoran = mysqli_query($connection, "SELECT * FROM restoran");
    $sqltravel = mysqli_query($connection, "SELECT * FROM travel");
    $sqlhotel = mysqli_query($connection, "SELECT * FROM hotel");
    $sqlberita = mysqli_query($connection, "SELECT * FROM berita");
    $jumlahdestinasi = mysqli_num_rows($sqldestinasi);
    $jumlahkategori = mysqli_num_rows($sqlkategori);
    $jumlaholeh = mysqli_num_rows($sqloleh);
    $jumlahrestoran = mysqli_num_rows($sqlrestoran);
    $jumlahtravel = mysqli_num_rows($sqltravel);
    $jumlahhotel = mysqli_num_rows($sqlhotel);
    $jumlahberita = mysqli_num_rows($sqlberita);
?>
<div class="row">
    <div class="col-xl-3 col-md-6">
        <div class="card bg-primary text-white mb-4">
            <div class="card-body">Jumlah Destinasi Wisata: <?php echo $jumlahdestinasi?></div>
            <div class="card-footer d-flex align-items-center justify-content-between">
                <a class="small text-white stretched-link" href="tampilandestinasi.php">View Details</a>
                <div class="small text-white"><i class="fas fa-angle-right"></i></div>
            </div>
        </div>
    </div>
    <div class="col-xl-3 col-md-6">
        <div class="card bg-warning text-white mb-4">
            <div class="card-body">Jumlah Kategori Wisata: <?php echo $jumlahkategori?></div>
            <div class="card-footer d-flex align-items-center justify-content-between">
                <a class="small text-white stretched-link" href="tampilankategori.php">View Details</a>
                <div class="small text-white"><i class="fas fa-angle-right"></i></div>
            </div>
        </div>
    </div>
    <div class="col-xl-3 col-md-6">
        <div class="card bg-success text-white mb-4">
            <div class="card-body">Jumlah Oleh-oleh Destinasi Wisata: <?php echo $jumlaholeh?></div>
            <div class="card-footer d-flex align-items-center justify-content-between">
                <a class="small text-white stretched-link" href="tampilanoleh.php">View Details</a>
                <div class="small text-white"><i class="fas fa-angle-right"></i></div>
            </div>
        </div>
    </div>
    <div class="col-xl-3 col-md-6">
        <div class="card bg-danger text-white mb-4">
            <div class="card-body">Jumlah Destinasi Restoran: <?php echo $jumlahrestoran?></div>
            <div class="card-footer d-flex align-items-center justify-content-between">
                <a class="small text-white stretched-link" href="tampilanrestoran.php">View Details</a>
                <div class="small text-white"><i class="fas fa-angle-right"></i></div>
            </div>
        </div>
    </div>
    <div class="col-xl-3 col-md-6">
        <div class="card bg-info text-white mb-4">
            <div class="card-body">Jumlah Destinasi Wisata Travel: <?php echo $jumlahtravel?></div>
            <div class="card-footer d-flex align-items-center justify-content-between">
                <a class="small text-white stretched-link" href="tampilantravel.php">View Details</a>
                <div class="small text-white"><i class="fas fa-angle-right"></i></div>
            </div>
        </div>
    </div>
    <div class="col-xl-3 col-md-6">
        <div class="card bg-dark text-white mb-4">
            <div class="card-body">Jumlah Hotel Destinasi: <?php echo $jumlahhotel?></div>
            <div class="card-footer d-flex align-items-center justify-content-between">
                <a class="small text-white stretched-link" href="tampilanhotel.php">View Details</a>
                <div class="small text-white"><i class="fas fa-angle-right"></i></div>
            </div>
        </div>
    </div>
    <div class="col-xl-3 col-md-6">
        <div class="card bg-secondary text-white mb-4">
            <div class="card-body">Jumlah Berita Destinasi Wisata: <?php echo $jumlahberita?></div>
            <div class="card-footer d-flex align-items-center justify-content-between">
                <a class="small text-white stretched-link" href="tampilankategoriberita.php">View Details</a>
                <div class="small text-white"><i class="fas fa-angle-right"></i></div>
            </div>
        </div>
    </div>
</div>