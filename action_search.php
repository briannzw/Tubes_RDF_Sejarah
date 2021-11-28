<?php
    require 'vendor/autoload.php';

    ini_set("allow_url_fopen", 1);
    $context = stream_context_create(array('ssl'=>array(
        'verify_peer' => false, 
        "verify_peer_name"=>false
        )));
    
    libxml_set_streams_context($context);

    if(isset($_POST['query'])){
        $inputText = $_POST['query'];
        $query = "https://lookup.dbpedia.org/api/search?QueryClass=MilitaryConflict&query=" . $inputText;
        $xml_data = simplexml_load_file($query) or 
        die("Error: Object Creation failure");

        $i = 0;
        $uri = "";
        foreach ($xml_data->children() as $data)
        {
            //Better Search + Terminate
            if($data->Label == "World War II"){
                break;
            }
            if($data->Label != ""){
                $i++;
                $uri = str_replace("http://dbpedia.org/resource/", "", $data->URI);
                echo "<li id='data_list_item_".$i."' URI='".$uri."'>".$data->Label."</li>";
    
                echo "<script>
                $('#data_list_item_".$i."').on('click', function(){
                    if($('#data_list_item_".$i."').attr('URI') != ''){
                        $.redirect('info.php', { 'URI' : $('#data_list_item_".$i."').attr('URI') });
                    }
                });
                </script>";
            }
        }
    }
?>