<?php

/* Protection des inputs  */
function traite_chaine($chaine){
    $sortie = htmlentities(strip_tags(trim($chaine)),ENT_QUOTES);
    return $sortie;
}
?>