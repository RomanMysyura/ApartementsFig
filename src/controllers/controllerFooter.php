<?php
function controllerFooter($request, $response, $container){
    
    $response->setTemplate("footer.php");
    return $response;
    
}
