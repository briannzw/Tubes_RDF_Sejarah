<html>
    <head>
        <title>Cari Sejarah</title>
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
                    background-color: rgba(255,255,255,0.8)!important;
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

                .logo{
                    position: relative;
                    left: 150px;
                    width: 40%;
                    margin-bottom: 2%;
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
                  <a class="nav-link ms-5" aria-current="page" href="#">Pencarian</a>
                    </li>
                  <li class="nav-item">
                    <a class="nav-link ms-5" aria-current="page" href="movie.php">Rekomendasi Film</a>
                  </li>
                </ul>
              </div>
            </div>
          </nav>
        <!--Akhir Navbar-->
        <!--Container Gambar-->
        <div class="container-fluid d-flex justify-content-center align-items-center bg-search m-0 p-0 h-100">
            <div class="justify-content-center">
                <!--<h1 style="text-align:center; color:black; position:relative; my-5">Pencarian Saya</h1>-->
                <img class="logo" src='index_img/icon.png' />
                <div class="searchbar">
                    <input class="search_input" type="text" name="" placeholder="Keyword: Medan, Surabaya, Battle...">
                    <a id="#search-button" class="search_icon"><i class="fas fa-search"></i></a>
                </div>
                <div id="suggesstion-box">
                </div>
            </div>
        </div>
        <!--Akhir Container Gambar-->
        <!--Footer-->
        <footer class="page-footer bg-dark">
            <div id="footer">&copy; 2017–2021 Sejarah, Inc. &middot; <a href="#">Privacy</a> &middot; <a href="#">Terms</a></div>
        </footer>
        <!--Akhir Footer-->

        <script>
        $(function(){
            $(document).ready(function() {
                $(".search_input").keyup(function(){
                        text = $('.search_input').val();
                        if((text != "") && (text.length > 3)){
                            $.ajax({
                                url: 'action_search.php',
                                method: 'POST',
                                data: {
                                    query: text
                                },
                                success: function(data){
                                    $("#suggesstion-box").show();
                                    $("#suggesstion-box").html(data);
                                    $("#search-box").css("background","#FFF");
                                }
                            });
                        }
                });
                $(".search_input").focus(function() {
                    if($("#suggesstion-box").html() != "")
                    $("#suggesstion-box").show();
                });
                $(".search_input").focusout(function() {
                });
            });
        });
            
        </script>
    </body>
</html>