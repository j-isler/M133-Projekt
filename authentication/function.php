<?php


class func {

    public static function checkLoginState($dbh){

        if(!isset($_SESSION['user_id']) || !isset($_COOKIE['PHPSESSID'])){
            session_start();
        }
        if(isset($_COOKIE['user_id']) && isset($_COOKIE['token']) && isset($_COOKIE['serial'])){
            
            $query = "SELECT * From sessions Where user_id = :userid AND token = :token AND serial = :serial;";

            $userid = $_COOKIE['user_id'];
            $token = $_COOKIE['token'];
            $serial = $_COOKIE['serial'];

            $stmt = $dbh->prepare($query);
            $stmt->execute(array(':userid' => $userid, ':token' => $token, 'serial' => $serial));
 
            $row = $stmt->fetch(PDO::FETCH_ASSOC);

           if($row['id'] > 0){

                if(
                    $row['user_id'] == $_COOKIE['user_id'] &&
                    $row['token'] == $_COOKIE['token'] &&
                    $row['serial'] == $_COOKIE['serial'] 
                ){
                    if(
                        $row['user_id'] == $_SESSION['user_id'] &&
                        $row['token'] == $_SESSION['token'] &&
                        $row['serial'] == $_SESSION['serial'] 
                    ){
                        return true;
                    }
                }

            } 

        }
    }
    public static function createRecord($dbh, $id, $username){

        $query = 'INSERT Into sessions (user_id, token, serial, date ) Values (:user_id, :token, :serial, "22/04/2020")';
        $dbh->prepare("DELETE From sessions WHERE user_id = :userid;")->execute(array(':userid' => $id));


        $token = func::createString(32);
        $serial = func::createString(32);
        func::createCookie($username, $id, $token, $serial);
        func::createSession($username, $id, $token, $serial);

        $stmt = $dbh->prepare($query);
        $stmt->execute(array(':user_id' => $id, ':token' => $token, ':serial' => $serial));
    }
    public static function createCookie($username, $id, $token, $serial){
        setcookie('user_id', $id, time() + (86400) * 30, "/");
        setcookie('username', $username, time() + (86400) * 30, "/");
        setcookie('token', $token, time() + (86400) * 30, "/");
        setcookie('serial', $serial, time() + (86400) * 30, "/");
    }

    public static function createSession($username, $id, $token, $serial){
        if(isset($_SESSION['user_id']) || !isset($_COOKIE['PHPSESSID'])){
            session_start();
        }
        $_SESSION['user_id'] = $id;
        $_SESSION['token'] = $token;
        $_SESSION['serial'] = $serial;
        $_SESSION['username'] = $username;
        
    }

    public static function createString($len){
        $string = "YnYserVqMQOL5g4DqTG7JTBdQV6bKXgFlFL6aTogfmubcPkx3dXWfcI09iBt8YNIf6HyDPyFSevddkMPcWKlA5PHYouTZc3CfxRI";
        $s = '';
        $r_new = '';
        $r_old = '';

        for ($i=1; $i < $len; $i++) { 
            while($r_old == $r_new){
                $r_new = rand(0, 60);
            }
            $r_old = $r_new;
            
            $s = $s.$string[$r_new];
        }
        return $s;

    }
}



?>