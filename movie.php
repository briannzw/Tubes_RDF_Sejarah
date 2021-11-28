<?php
  require 'vendor/autoload.php';
  require_once('sparqllib.php');

  $db = sparql_connect("http://localhost:3030/test/sparql");
  if( !$db ) { print sparql_errno() . ": " . sparql_error(). "\n"; exit; }

  sparql_ns("rdf", "http://www.w3.org/1999/02/22-rdf-syntax-ns#");
  sparql_ns("rdfs", "http://www.w3.org/2000/01/rdf-schema#");
  sparql_ns("dbo", "http://dbpedia.org/ontology/");
  sparql_ns("dbr", "http://dbpedia.org/resource/");
  sparql_ns("foaf", "http://xmlns.com/foaf/0.1/");
  sparql_ns("dc", "http://purl.org/dc/elements/1.1/");
?>

<html>
    <head>
        <title>Rekomendasi Film</title>
        <link rel="icon" href="index_img/icon.png">
        <link rel="preconnect" href="https://fonts.gstatic.com">
        <link href="https://fonts.googleapis.com/css2?family=Amiri:wght@400;700&display=swap" rel="stylesheet">
        <link href="https://fonts.googleapis.com/css2?family=Raleway:wght@200&display=swap" rel="stylesheet">
        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.5.0/css/all.css" integrity="sha384-B4dIYHKNBt8Bc12p+WXckhzcICo0wtJAoU8YZTY5qE0Id1GSseTk6S+L3BlXeVIU" crossorigin="anonymous">
        <!--Link ke Bootstrap-->
            <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
            <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
        <!--Akhir link ke Bootstrap-->
        <link rel="stylesheet" href="css2.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/jquery.redirect@1.1.4/jquery.redirect.min.js"></script>
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
                  <li class="nav-item">
                    <a class="nav-link ms-5" aria-current="page" href="#">Rekomendasi Film</a>
                  </li>
                </ul>
              </div>
            </div>
          </nav>
        <!--Akhir Navbar-->

        <?php
            $sparql = "
            PREFIX rdf:  <http://www.w3.org/1999/02/22-rdf-syntax-ns#>
            PREFIX rdfs: <http://www.w3.org/2000/01/rdf-schema#>
            PREFIX dbo:  <http://dbpedia.org/ontology/>
            PREFIX cat:  <http://dbpedia.org/property/>
            PREFIX foaf: <http://xmlns.com/foaf/0.1/>
            PREFIX dc: 	 <http://purl.org/dc/elements/1.1/>
            PREFIX dbp: <http://dbpedia.org/property/>
            SELECT DISTINCT *
            WHERE
            {
                ?movie foaf:image   ?wiki;
                       rdfs:label   ?Judul;
                       dbo:runtime  ?Durasi;
                       dbp:starring ?Pemeran;
                       dbo:genre	?Genre;
                       dbo:rating	?Rating.
            }
            LIMIT 10";
            $result = sparql_query($sparql);
            //var_dump($result);
            $fields = sparql_field_array($result);
            $i = 0;

            \EasyRdf\RdfNamespace::setDefault('og');
        ?>

        <!--Container Gambar-->
        <div class="container-fluid d-flex justify-content-center align-items-center bg-search m-0 p-0 h-100">
            <div class="justify-content-center h-100">
            <table class="table table-light table-bordered">
                <thead class="thead-dark">
                    <tr>
                    <th scope="col">No</th>
                    <th scope="col">Thumbnail</th>
                    <?php foreach($fields as $field) : 
                        $i++;
                        if($i<=2) continue;
                        echo "<th scope='col'>".$field."</th>";
                    
                    endforeach;?>
                    </tr>
                </thead>
                <tbody>
                <?php 
                $i = 1;
                while($row = sparql_fetch_array($result)) : 
                    $j = 0;
                    
                    $img_file = \EasyRdf\Graph::newAndLoad($row['wiki']);
                ?>
                    <tr>
                    <th scope="row"><?= $i ?></th>
                    <?php foreach($fields as $field){ 
                        $j++;
                        if($j==1) continue;
                        if($j==2){
                            echo "<td><img src='".$img_file->image."' class='img-fluid mx-auto cover-img'></img></td>";
                            continue;
                        }
                        echo "<td>".$row[$field]."</td>";
                    }
                    ?>
                    </tr>
                <?php
                $i++;
                endwhile;
                ?>
                </tbody>
            </table>
            </div>
        </div>
        <!--Akhir Container Gambar-->
        <!--Footer-->
        <footer class="page-footer bg-dark">
            <div id="footer">&copy; 2017–2021 Sejarah, Inc. &middot; <a href="#">Privacy</a> &middot; <a href="#">Terms</a></div>
        </footer>
        <!--Akhir Footer-->

        <script>
        $(window).scroll(function(){
            $('nav').toggleClass('scroll', $(this).scrollTop() > 200);
        });
        </script>
    </body>
</html>