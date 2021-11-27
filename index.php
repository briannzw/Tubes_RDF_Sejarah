<?php
  require 'vendor/autoload.php';
  require "html_tag_helpers.php";
?>
<html>
    <head>
        <title>Rumahin.com</title>
        <link rel="icon" href="index_img/logo.png">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">
         <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.bundle.min.js" integrity="sha384-JEW9xMcG8R+pH31jmWH6WWP0WintQrMb4s7ZOdauHnUtxwoG2vI5DkLtS3qm9Ekf" crossorigin="anonymous"></script>
        <link rel="preconnect" href="https://fonts.gstatic.com">
        <link href="https://fonts.googleapis.com/css2?family=Amiri:wght@400;700&display=swap" rel="stylesheet">
        <link rel="preconnect" href="https://fonts.gstatic.com">
        <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@200;300;400&display=swap" rel="stylesheet">
        <link rel="stylesheet" href="css-1.css">
        
        <style>
          .bg-light{
            background: transparent !important;
            transition:0.5s ease;
          }
          .bg-light.scroll{
            background: white !important;
          }
        </style>
    </head>
    
    <!-- awal navbar-->
  <main>
      <nav class="navbar navbar-expand-lg bg-light fixed-top ">
          <div class="container-fluid">
            <img src="index_img/logo.png" height="50px" class="me-2">
              <h2 class="amiri">Rumahin.com</h2>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
              <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
              <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                <li class="nav-item">
                  <a class="nav-link ms-5" aria-current="page" href="#">Halaman Utama</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link ms-5" href="jual.php">Jual</a>
                </li>
                <li class="nav-item">
                <a class="nav-link ms-5" href="about.php">Tentang Kami</a>
                </li>
              </ul>
            </div>
          </div>
      </nav>
        <!-- akhir navbar-->
    
    
        <!-- awal carousel -->
      <div id="carouselExampleCaptions" class="carousel slide" data-bs-ride="carousel">
      <div class="carousel-indicators">
        <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
        <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="1" aria-label="Slide 2"></button>
        <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="2" aria-label="Slide 3"></button>
      </div>
      <div class="carousel-inner">
        <div class="carousel-item active">
          <img src="index_img/carousel(1).jpg" class="d-block w-100" alt="...">
          <div class="carousel-caption d-none d-md-block">
              <div class="ccaption">
            <h1 style="font-size: 85px">Rumahin.com</h1>
            <h5>"Ga punya rumah? Rumahin aja!"</h5>
            <button id="cbutton" style="font-size: 18px" onclick="location.href = 'jual.php'">Daftar Pencarian</button>
              </div>
          </div>
        </div>
        <div class="carousel-item">
          <img src="index_img/carousel(2).jpg" class="d-block w-100" alt="...">
          <div class="carousel-caption d-none d-md-block">
              <div class="ccaption">
            <h1 style="font-size: 85px">Rumahin.com</h1>
            <h5>"Ga punya rumah? Rumahin aja!"</h5>
              <button id="cbutton" style="font-size: 18px" onclick="location.href = 'jual.php'">Daftar Pencarian</button>
              </div>
          </div>
        </div>
        <div class="carousel-item">
          <img src="index_img/carousel(3).jpg" class="d-block w-100" alt="...">
          <div class="carousel-caption d-none d-md-block">
              <div class="ccaption">
            <h1 style="font-size: 85px">Rumahin.com</h1>
            <h5>"Ga punya rumah? Rumahin aja!"</h5>
              <button id="cbutton" style="font-size: 18px" onclick="location.href = 'jual.php'">Daftar Pencarian</button>
              </div>
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
    <!--akhir carousel-->

    <?php
      \EasyRdf\RdfNamespace::set("rdf", "http://www.w3.org/1999/02/22-rdf-syntax-ns#");
      \EasyRdf\RdfNamespace::set("rdfs", "http://www.w3.org/2000/01/rdf-schema#");
      \EasyRdf\RdfNamespace::set("dbo", "http://dbpedia.org/ontology/");
      \EasyRdf\RdfNamespace::set("dbr", "http://dbpedia.org/resource/");
      \EasyRdf\RdfNamespace::set("foaf", "http://xmlns.com/foaf/0.1/");
      
      $uri_rdf = "https://raw.githubusercontent.com/briannzw/Tubes_RDF_Sejarah/master/Sejarah_Indonesia.rdf";//https://raw.githack.com/briannzw/Tubes_RDF_Sejarah/master/Test%20RDF/foaf.rdf
      $raw_file = file_get_contents($uri_rdf);
      $parser = new \EasyRdf\Parser\RdfXml();
      $graph = new \EasyRdf\Graph();
      $parser->parse($graph, $raw_file, 'rdfxml', null);

      $doc = $graph->resource("https://github.com/briannzw/Tubes_RDF_Sejarah/");//http://github.com/briannzw/Tubes_RDF_Sejarah/blob/master/Sejarah_Indonesia.rdf
      //var_dump($graph->dump());
      //$doc = $graph->primaryTopic();
      //var_dump($doc);
      //var_dump($graph->toRdfPhp());
      //echo "test\n".$doc->get("rdfs:label");
    ?>

    <!-- Card Container-->
    <?php 
      \EasyRdf\RdfNamespace::setDefault('og');
    ?>
    <div class="container-fluid px-5 pb-5" id="containerbg">
        <h1 class="text-light mb-0 mt-0 py-5">Sejarah Indonesia</h1>
        <?php foreach($doc->all('dbo:event') as $event) : ?>
          <!--Card -->
          <?php 
            $wiki_uri = 'https://en.wikipedia.org/wiki/' . str_replace(\EasyRdf\RdfNamespace::get('dbr'), '' ,$event->get('foaf:page'));
            $img_file = \EasyRdf\Graph::newAndLoad($wiki_uri);
          ?>
          <div class="card my-2">
            <div class="row cardfont">
              <div class="col-md-4">
                <img src="<?= $img_file->image ?>" class="card-img" alt="" onerror="this.onerror=null; this.src='index_img/alt_image.jpg'">
              </div>
              <div class="col-md-8">
                <div class="card-body">
                  <h2><?= $event->get('rdfs:label') ?></h2>
                  <p class="mb-0"><?= $event->get('dbo:date') ?></p>
                  <p class="mb-0"><?= $event->get('dbo:place') ?></p>
                  <a class="bottom-right" href="">Info Selengkapnya</a>
                </div>
              </div>
            </div>
          </div>
          <!--End Card-->
        <?php endforeach; ?>
    </div>
    
    <!--awal Tentang Kami-->
    <!--
    <div class="container-fluid px-5 pb-5" id="containerbg">
        <h1 class="mb-0 mt-0 py-5">Tentang Kami</h1>
            <div class="row cardfont">
                <div class="col-4 p-0">
                <div class="card p-0 h-100" >
                  <img src="index_img/profile.png" class="card-img-top px-5 mt-3" alt="...">
                  <div class="card-body pt-0 pb-5 px-4">
                    <h5 class="card-title mb-3">Siapa Kami</h5>
                    <p class="card-text" style="font-size: 12px">Sejak 2005, Rumahin.com tetap kompetitif dengan memanfaatkan jalur data yang kuat yang dibangun di atas hubungan MLS terbaik di seluruh 50 provinsi. Itu berarti Anda mendapatkan daftar terbaru 24 jam sehari, 365 hari setahun.</p>
                  </div>
                </div>
                </div>
                
                <div class="col-4 p-0">
                <div class="card p-0 h-100" >
                  <img src="index_img/investment.png" class="card-img-top px-5 mt-3" alt="...">
                  <div class="card-body pt-0 pb-5 px-4">
                    <h5 class="card-title mb-3">Kelebihan Kami</h5>
                    <p class="card-text" style="font-size: 12px">Database terbaru kami memungkinkan Anda mencari rumah impian atau menemukan nilai rumah Anda saat ini. Kemudian kami akan menghubungkan Anda dalam beberapa menit dengan salah satu agen lokal terbaik kami.</p>
                  </div>
                </div>
                </div>
                
                <div class="col-4 p-0">
                <div class="card p-0 h-100">
                  <img src="index_img/portfolio.png" class="card-img-top px-5 mt-3" alt="...">
                  <div class="card-body pt-0 pb-5 px-4">
                    <h5 class="card-title mb-3">Kenapa Bekerja Dengan Kami</h5>
                    <p class="card-text" style="font-size: 12px">Kami dapat mengubah masa depan real estat dengan teknologi canggih, alat komunikasi klien terbaru, informasi pasar, teknologi AI adaptif, dan tim pemasar khusus, koordinator transaksi, dan ilmuwan data.</p>
                  </div>
                </div>
                </div>
            </div>
    </div>
        -->
    <!--akhir Tentang kami-->
    
    
    
    <!--awal footer-->
    <footer class="page-footer bg-dark">
        <div id="footer">
          <div class="row">
        <h1 class="card-title text-white col" id="desFooter">"Ga punya rumah? Rumahin aja!"</h1>
         <div class="row justify-content-center" style="text-align: center;color: white ">
                    <div class="col-2" style="font-size: 16px"><b>Contact Us</b></div>
                    <div class="col-2" style="font-size: 14px">
                        <a href="#" class="linkFooter"><img src="index_img/fb.png" style="width: 25px;margin-right: 10px;">Rumahin.com</a>
                    </div>
                    <div class="col-2" style="font-size: 14px">
                        <a href="#" class="linkFooter"><img src="index_img/ig.png" style="width: 25px;margin-right: 10px;">Rumahin.com</a>
                    </div>
                    <div class="col-2" style="font-size: 14px">
                        <a href="#" class="linkFooter"><img src="index_img/twitter.png" style="width: 25px;margin-right: 10px;">Rumahin.com</a>
                    </div>
                </div>
                <div class="row justify-content-center" style="margin-top: 2%; text-align: center">
                    <div class="col-3"><a href="#" class="linkFooter" style="font-size: 15px"><b>Kebijakan dan Privasi</b></a></div>
                    <div class="col-3"><a href="#" class="linkFooter" style="font-size: 15px"><b>Syarat dan Ketentuan</b></a></div>
                </div>
            </div>
        </div>
      <div class="card-footer text-muted text-center">
        <h6><small>Informasi Rumahin disediakan secara eksklusif untuk penggunaan pribadi dan non-komersial konsumen dan tidak boleh digunakan untuk tujuan apa pun selain untuk mengidentifikasi properti prospektif yang mungkin ingin dibeli oleh konsumen. Informasi yang dianggap dapat diandalkan tetapi tidak dijamin akurat. Pembeli untuk memverifikasi semua informasi. Informasi yang diberikan adalah untuk penggunaan pribadi, non-komersial konsumen dan tidak boleh digunakan untuk tujuan apa pun selain untuk mengidentifikasi properti prospektif yang mungkin tertarik untuk dibeli oleh konsumen. Informasi daftar diperbarui setiap 15 menit. Ketentuan Penggunaan & Kebijakan Privasi. Hak Cipta © 2005 - 2021 Rumahin, Inc. Semua hak dilindungi undang-undang</small></h6>
      </div>
    </footer>
    <!--akhir footer-->

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script>
      $(window).scroll(function(){
        $('nav').toggleClass('scroll', $(this).scrollTop() > 700);
      })
    </script>
  </main>
</html>