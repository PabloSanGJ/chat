<?php

include('Chat.php');

switch($_GET["action"]) {
    case "new":
        if (isset($_POST["user"]) && isset($_POST["message"])) {
            $result = Chat::newMessage($_POST["user"], $_POST["message"]);
        } else {
            $result = "Wrong arguments";
        }
        break;
        
    case "list":
        $result = Chat::messages();
        break;
}

echo json_encode($result);