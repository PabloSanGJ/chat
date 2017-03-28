<?php

include_once('Connection.php');

class Chat {
    
    const LIMIT = 10; 
    
    var $user;
    var $message;
    var $date;
    
    function __construct($user, $message, $date) {
        $this->user = $user == "0" ? "Ping" : "Pong";
        $this->message = $message;
        $this->date = date("Y-m-d H:i:s", $date);;
    }
    
    function messages() {
        try {
           $connection = new Connection();
        
            $query = "SELECT user, message, date FROM messages ORDER BY date DESC LIMIT " . self::LIMIT;
            $data = $connection->db->query($query);

            while ($row = $data->fetchArray()) {
                $result[] = new Chat($row['user'], $row['message'], $row['date']);
            }

            return array_reverse($result); 
        } catch (Exception $ex) {
            return 'ERROR: ' . $ex->getMessage();
        }
        
    }

    function newMessage($user, $message) {
        // Just a little security here
        if ($user !== "0" && $user !== "1") {
            return "Wrong input parameters";
        }
        
        $message = SQLite3::escapeString($message);
        
        $now = new DateTime();
        $date = $now->getTimestamp();
        
        $query = "INSERT INTO messages (user, message, date) VALUES "
                . "($user, '$message', $date)";
        
        try { 
            $connection = new Connection();
            $connection->db->exec($query);
            return 'ok';
        } catch (Exception $ex) {
            return 'ERROR: ' . $ex->getMessage();
        }
    }
}