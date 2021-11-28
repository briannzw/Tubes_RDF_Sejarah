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
        $query = "https://lookup.dbpedia.org/api/search?type=Event&query=" . $inputText;
        $xml_data = simplexml_load_file($query) or 
        die("Error: Object Creation failure");

        $i = 0;
        $uri = "";
        foreach ($xml_data->children() as $data)
        {
            $checkClass = 0;
            foreach($data->Classes->children() as $class){
                $label = $class->Label;
                if(($label == "Event") || ($label == "Societal Event") || ($label == "Military Conflict")){
                    $checkClass++;
                }
                if($checkClass == 0) break;
            }
            if($checkClass == 3){
                $i++;
                if($data->Label != ""){
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
    }
?>