<?php 
    require 'vendor/autoload.php';

    $uri="";
    if($_SERVER['REQUEST_METHOD'] == "POST"){
        if($_POST['URI']){
            $uri = $_POST['URI'];
        }
    }
    else{
        var_dump('POST Data not found!');
        header('Location: index.php');
        die;
    }
    \EasyRdf\RdfNamespace::set("rdf", "http://www.w3.org/1999/02/22-rdf-syntax-ns#");
    \EasyRdf\RdfNamespace::set("rdfs", "http://www.w3.org/2000/01/rdf-schema#");
    \EasyRdf\RdfNamespace::set("dbo", "http://dbpedia.org/ontology/");
    \EasyRdf\RdfNamespace::set("dbr", "http://dbpedia.org/resource/");
    \EasyRdf\RdfNamespace::set("foaf", "http://xmlns.com/foaf/0.1/");
    \EasyRdf\RdfNamespace::set("geo", "http://www.w3.org/2003/01/geo/wgs84_pos#");
    
    \EasyRdf\RdfNamespace::setDefault('og');

    $wiki_uri = 'https://en.wikipedia.org/wiki/' . $uri;
    $img_file = \EasyRdf\Graph::newAndLoad($wiki_uri);
    
    $sparql = new \EasyRdf\Sparql\Client('https://dbpedia.org/sparql');

    $query = "
    SELECT DISTINCT *
    WHERE {
        <".\EasyRdf\RdfNamespace::get("dbr").$uri."> rdfs:label ?label;
                     dbo:abstract ?abstract;
                     dbo:place ?tmp_place.
        OPTIONAL{<".\EasyRdf\RdfNamespace::get("dbr").$uri."> dbo:date ?date.}
        OPTIONAL{<".\EasyRdf\RdfNamespace::get("dbr").$uri."> dbp:casualties ?casuality.}
        OPTIONAL{<".\EasyRdf\RdfNamespace::get("dbr").$uri."> dbo:result ?result.}
        ?tmp_place   rdfs:label ?place.
        OPTIONAL{ ?tmp_place geo:lat ?lat.}
        OPTIONAL{ ?tmp_place geo:long ?long.}
        FILTER NOT EXISTS {?tmp_place dbo:currencyCode 'IDR'}
        FILTER(LANG(?label) = 'in' || LANG(?label) = 'en' || LANG(?label) = '').
        FILTER(LANG(?abstract) = 'in' || LANG(?abstract) = 'en' || LANG(?abstract) = '')
    }
    ORDER BY DESC(?casuality)
    ";
    
    $result = $sparql->query($query);

    $detail = [];
    foreach($result as $row){
        $detail = [
            'label'=> isset($row->label) ? $row->label : "Tidak Diketahui",
            'abstract'=> isset($row->abstract) ? $row->abstract : "Tidak Diketahui",
            'place'=> isset($row->place) ? $row->place : "Tidak Diketahui",
            'date'=> isset($row->date) ? $row->date : "Tidak Diketahui",
            'casuality'=> isset($row->casuality) ? $row->casuality : "Tidak Diketahui",
            'result'=> isset($row->result) ? $row->result : "Tidak Diketahui",
            'lat'=> isset($row->lat) ? $row->lat : -6.166667,
            'long'=> isset($row->long) ? $row->long : 106.816666,
        ];
        break; //ambil hanya 1 data
    }
?>

<html>
    <head>
        <title><?= $detail['label'] ?></title>
        <link rel="preconnect" href="https://fonts.gstatic.com">
        <link href="https://fonts.googleapis.com/css2?family=Amiri:wght@400;700&display=swap" rel="stylesheet">
        <link href="https://fonts.googleapis.com/css2?family=Raleway:wght@200&display=swap" rel="stylesheet"> 
        <!--Link ke Bootstrap-->
            <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
            <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
        <!--Akhir link ke Bootstrap-->
        
        <link rel="stylesheet" href="https://unpkg.com/leaflet@1.7.1/dist/leaflet.css"
        integrity="sha512-xodZBNTC5n17Xt2atTPuE1HxjVMSvLVW9ocqUKLsCC5CXdbqCmblAshOMAS6/keqq/sMZMZ19scR4PsZChSR7A=="
        crossorigin=""/>

         <!-- Make sure you put this AFTER Leaflet's CSS -->
        <script src="https://unpkg.com/leaflet@1.7.1/dist/leaflet.js"
        integrity="sha512-XQoYMqMTK8LvdxXYG3nZ448hOEQiglfqkJs1NOQV44cWnUrBc8PkAOcXy20w0vlaXaVUearIOBhiXZ5V3ynxwA=="
        crossorigin=""></script>

        <!--CSS-->
            <style>
                .amiri{
                    font-family: 'Amiri', serif;
                    margin: auto;
                    font-size: 20px;
                }
                .containerText,p,#footer{
                    font-family: 'Raleway', sans-serif;
                }
                #judul{
                    font-size: 40px;
                }
                table,tr,td{
                    padding: 10px;
                    font-size: 23px;
                }
                .bg-light{
                    background: transparent !important;
                    transition:0.5s ease;
                }
                .bg-light.scroll{
                    background: white !important;
                }
                p{
                    text-align: right;
                }
                #footer{
                    color:white;
                    text-align: center;
                    padding: 20px;
                }
                a:active, a:link, a:visited, a:hover{
                    color: white;
                    text-decoration: none;
                    
                }
                #map { height: 180px; }
            </style>
        <!--Akhir CSS-->
    </head>
    <body>
        <!--Navbar-->
        <nav class="navbar navbar-expand-lg navbar-light bg-light fixed-top ">
            <div class="container-fluid">
                <h2 class="amiri ms-5 my-2 fs-2">Sejarah</h2>
              <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
              </button>
              <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                  <li class="nav-item">
                    <a class="nav-link ms-5" aria-current="page" href="index.php">Halaman Utama</a>
                  </li>
                    <li class="nav-item">
                    <a class="nav-link ms-5" aria-current="page" href="search.php">Pencarian</a>
                    </li>
                </ul>
              </div>
            </div>
          </nav>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script>
        $(window).scroll(function(){
        $('nav').toggleClass('scroll', $(this).scrollTop() > 200);
        })
    </script>
        <!--Akhir Navbar-->
        <!--Container Gambar-->
            <div class="container-fluid" style="margin-bottom: 5%;">
                <div class="row">
                    <div class="col" style="background-color:gainsboro">
                        <div class="container">
                            <div class="row">
                                <div class="col-9 mx-auto">
                                    <img src="<?= $img_file->image ?>" style="width: 100%;" onerror="this.onerror=null; this.src='index_img/alt_image.jpg'">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        <!--Akhir Container Gambar-->
        <!--Awal Container Teks-->
            <div class="container-fluid">
                <div class="row">
                    <div class="col">
                        <div class="container">
                            <div class="row">
                                <div class="col-9 mx-auto">
                                    <h1 class="containerText" id="judul"><b><?= $detail['label'] ?></b></h1><br><br>
                                    <table>
                                        <tr>
                                            <td class="containerText">Tempat</td>
                                            <td class="containerText">:</td>
                                            <td class="containerText"><?= $detail['place'] ?></td>
                                            
                                        </tr>
                                        <tr>
                                            <td class="containerText">Tanggal</td>
                                            <td class="containerText">:</td>
                                            <td class="containerText"><?= $detail['date'] ?></td>
                                        </tr>
                                        <tr>
                                            <td class="containerText">Kasualitas</td>
                                            <td class="containerText">:</td>
                                            <td class="containerText"><?= $detail['casuality'] ?></td>
                                        </tr>
                                        <tr>
                                            <td class="containerText">Hasil</td>
                                            <td class="containerText">:</td>
                                            <td class="containerText"><?= $detail['result'] ?></td>
                                        </tr>
                                    </table>
                                    <br>
                                    <p><?= $detail['abstract'] ?></p>
                                    
                                    <!-- Map -->
                                    <?php
                                    print "<div id='map'></div>";
                                    $map_script = "var mymap = L.map('map').setView([" . $detail['lat'] . ", " . $detail['long'] . "], 13);
                                            L.tileLayer('https://api.mapbox.com/styles/v1/{id}/tiles/{z}/{x}/{y}?access_token=pk.eyJ1IjoibWFwYm94IiwiYSI6ImNpejY4NXVycTA2emYycXBndHRqcmZ3N3gifQ.rJcFIG214AriISLbB6B5aw', {
                                            maxZoom: 18,
                                            attribution: 'Map data &copy; <a href=\"https://www.openstreetmap.org/\">OpenStreetMap</a> contributors, ' +
                                                    '<a href=\"https://creativecommons.org/licenses/by-sa/2.0/\">CC-BY-SA</a>, ' +
                                                        'Imagery © <a href=\"https://www.mapbox.com/\">Mapbox</a>',
                                            id: 'mapbox/streets-v11',
                                            tileSize: 512,
                                            zoomOffset: -1
                                        }).addTo(mymap);

                                        L.marker([" . $detail['lat'] . ", " . $detail['long'] . "]).addTo(mymap)
                                        .bindPopup(\"<b>" . $detail['place'] . "</b>\").openPopup();";

                                    print "<script>" . $map_script . "</script>";

                                    ?>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        <!--Akhir Container Teks-->
        <br>
        <!--Footer-->
        <footer class="page-footer bg-dark">
            <div id="footer">&copy; 2017–2021 Sejarah, Inc. &middot; <a href="#">Privacy</a> &middot; <a href="#">Terms</a></div>
        </footer>
        <!--Akhir Footer-->

    </body>
</html>