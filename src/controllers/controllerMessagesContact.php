<?php
function controllerMessagesContact($request, $response, $container) {
    $userModel = $container->users(); 
    $messages = $container->users()->selectAllMessages();
    $response->set("messages", $messages);
    $response->setTemplate("missatgescontactar.php");
    return $response;






}
