<?php

function getContent($URL)
{
    $ch = curl_init();
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
    curl_setopt($ch, CURLOPT_URL, $URL);
    curl_setopt($ch, CURLOPT_USERAGENT, "Mozilla/5.0 (Macintosh; Intel Mac OS X 10.11; rv:43.0) Gecko/20100101 Firefox/43.0");
    
    $data = curl_exec($ch);
    curl_close($ch);
        
    $position_debut = strpos($data, 'data=[[["');   
    $position_fin = strpos($data, ";var d={'time':google.time()}");
    return substr($data, $position_debut, $position_fin - $position_debut);
}


if(isset($_GET['titre']) && isset($_GET['artiste']))
{
    
    $titre      = $_GET['titre'];
    $artiste    = $_GET['artiste'];
    $url        = 'https://www.google.fr/search?hl=EN&site=imghp&tbm=isch&source=hp&biw=1254&bih=694&q='.$titre.'+'.$artiste.'+application&oq='.$titre.'+'.$artiste.'+application';
    
    echo getContent($url);
}




