<?php
  require 'vendor/autoload.php';
?>
<html>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/jquery.redirect@1.1.4/jquery.redirect.min.js"></script>
    <head>
        <title>Sejarah Indonesia</title>
        <link rel="icon" href="index_img/icon.png">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
         <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.bundle.min.js" integrity="sha384-JEW9xMcG8R+pH31jmWH6WWP0WintQrMb4s7ZOdauHnUtxwoG2vI5DkLtS3qm9Ekf" crossorigin="anonymous"></script>
        <link rel="preconnect" href="https://fonts.gstatic.com">
        <link href="https://fonts.googleapis.com/css2?family=Amiri:wght@400;700&display=swap" rel="stylesheet">
        <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@200;300;400&display=swap" rel="stylesheet">
        <link href="https://fonts.googleapis.com/css2?family=Raleway:wght@200&display=swap" rel="stylesheet"> 
        <link rel="stylesheet" href="css1.css">
        
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
    
  <main>
        <!-- awal navbar-->
        <nav class="navbar navbar-expand-lg navbar-light bg-light fixed-top ">
          <div class="container-fluid">
            <h2 class="amiri ms-5 my-2 fs-2">Sejarah</h2>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
              <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
              <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                <li class="nav-item">
                  <a class="nav-link ms-5" aria-current="page" href="#">Halaman Utama</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link ms-5" aria-current="page" href="search.php">Pencarian</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link ms-5" aria-current="page" href="movie.php">Rekomendasi Film</a>
                </li>
              </ul>
            </div>
          </div>
        </nav>
        <!-- akhir navbar-->
    
    
        <!-- awal carousel -->
        <div id="myCarousel" class="carousel slide" data-bs-ride="carousel">
          <div class="carousel-indicators">
            <button type="button" data-bs-target="#myCarousel" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
            <button type="button" data-bs-target="#myCarousel" data-bs-slide-to="1" aria-label="Slide 2"></button>
            <button type="button" data-bs-target="#myCarousel" data-bs-slide-to="2" aria-label="Slide 3"></button>
          </div>
          <div class="carousel-inner">
            <div class="carousel-item active">
              <img src="https://i.pinimg.com/originals/cb/c9/62/cbc96234dcdeb601473001a1c8fc11fd.jpg" width="100%" height="100%" style="object-fit:cover; object-position: 50% 40%;"/>
              <div class="container">
                <div class="carousel-caption text-start">
                  <h2 style="color:black;">"Untuk mencapai sesuatu, harus diperjuangkan dulu. Seperti mengambil buah kelapa, dan tidak menunggu saja seperti jatuh durian yang telah masak.”</h2>
                  <p class="my-5 amiri" style="color:black;">- Mohammad Natsir<p>
                </div>
              </div>
            </div>
            <div class="carousel-item">
            <img src="https://mmc.tirto.id/image/2018/03/29/ilustrasi-pocut-baren.jpg" width="100%" height="100%" style="object-fit:cover; "/>
              <div class="container">
                <div class="carousel-caption">
                  <h2>"Dalam menghadapi musuh, tak ada yang lebih mengena daripada senjata kasih sayang."</h2>
                  <p class="my-5 amiri">- Cut Nyak Dien<p>
                </div>
              </div>
            </div>
            <div class="carousel-item">
            <img src="https://blue.kumparan.com/image/upload/fl_progressive,fl_lossy,c_fill,q_auto:best/v1608981485/hq4agky94t7q1q6yuapg.jpg" width="100%" height="100%" style="object-fit:cover; object-position: 50% 40%;"/>

              <div class="container">
                <div class="carousel-caption text-end">
                  <h2 style="color:black;">"Hidup yang tidak dipertaruhkan tidak akan pernah dimenangkan."</h2>
                  <p class="my-5 amiri" style="color:black;">- Sutan Syahrir</p>
                </div>
              </div>
            </div>
          </div>
          <button class="carousel-control-prev" type="button" data-bs-target="#myCarousel" data-bs-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Previous</span>
          </button>
          <button class="carousel-control-next" type="button" data-bs-target="#myCarousel" data-bs-slide="next">
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
      
      $uri_rdf = "https://raw.githubusercontent.com/briannzw/Tubes_RDF_Sejarah/master/Sejarah_Indonesia.rdf";
      $raw_file = file_get_contents($uri_rdf);
      $parser = new \EasyRdf\Parser\RdfXml();
      $graph = new \EasyRdf\Graph();
      $parser->parse($graph, $raw_file, 'rdfxml', null);

      $doc = $graph->resource("https://github.com/briannzw/Tubes_RDF_Sejarah/");
      //var_dump($graph->dump());
      //$doc = $graph->primaryTopic();
      //var_dump($doc);
      //var_dump($graph->toRdfPhp());
      //echo "test\n".$doc->get("rdfs:label");
    ?>

    <!-- Card Container-->
    <?php 
      \EasyRdf\RdfNamespace::setDefault('og');
      $i = 0;
    ?>
    
      <div class="container mt-5">
        <?php foreach($doc->all('dbo:event') as $event) : ?>
          <!--Card -->
          <?php 
            $i++;
            $uri = str_replace(\EasyRdf\RdfNamespace::get('dbr'), '' ,$event->get('foaf:page'));
            $wiki_uri = 'https://en.wikipedia.org/wiki/' . $uri;
            $img_file = \EasyRdf\Graph::newAndLoad($wiki_uri);
          ?>
          <div class="row style=" style="position:relative;">
            <div class="col-md-7 order-md-2">
              <h2 class="featurette-heading"><?= $event->get('rdfs:label') ?></h2><br>
              <p class="lead"><?= $event->get('dbo:date') ?></p>
              <p class="lead"><?= $event->get('dbo:place') ?></p>
              <a class="bottom-right link" id="link-<?= $i ?>" data_uri="<?= $uri ?>">Info Selengkapnya</a>
            </div>
            <div class="col-md-3 order-md-1">
              <img src="<?= $img_file->image ?>" class="img-fluid mx-auto cover-img" alt="" onerror="this.onerror=null; this.src='index_img/alt_image.jpg'">
            </div>
          </div>
          <!--End Card-->

          <hr class="my-5">
          
          <script>
            $(function(){
              $('#link-<?= $i ?>').on("click", function(e){
                e.preventDefault();
                $.redirect('info.php', { 'URI' : $('#link-<?= $i ?>').attr("data_uri") });
              });
            });
          </script>
        <?php endforeach; ?>
    </div>
    
    <!--awal footer-->
        <footer class="page-footer bg-dark">
            <div id="footer">&copy; 2017–2021 Sejarah, Inc. &middot; <a href="#">Privacy</a> &middot; <a href="#">Terms</a></div>
        </footer>
    <!--akhir footer-->

    <script>
      $(window).scroll(function(){
        $('nav').toggleClass('scroll', $(this).scrollTop() > 700);
      })
    </script>
  </main>
</html>