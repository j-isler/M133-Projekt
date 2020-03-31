<?php


class func {

    public static function checkLoginState($dbh){

        if(!isset($_SESSION['id']) || !isset($_COOKIE['PHPSESSID'])){
            session_start();
        }
        if(isset($_COOKIE['id']) && isset($_COOKIE['token']) && isset($_COOKIE['serial'])){
            
            $query = "SELECT * From sessions Where user_id = :userid AND token = :token AND serial = :serial;";

            $userid = $_COOKIE['userid'];
            $token = $_COOKIE['token'];
            $serial = $_COOKIE['serial'];

            $stmt = $dbh->prepare($query);
            $stmt->execute(array(':userid' => $userid, ':token' => $token, 'serial' => $serial));

            $row = $stmt->fetch(PDO::FETCH_ASSOC);

            if($row['userid'] > 0){

                if(
                    $row['userid'] == $_COOKIE['userid'] &&
                    $row['userid'] == $_COOKIE['token'] &&
                    $row['userid'] == $_COOKIE['serial'] 
                ){
                    if(
                        $row['userid'] == $_SESSION['userid'] &&
                        $row['userid'] == $_SESSION['token'] &&
                        $row['userid'] == $_SESSION['serial'] 
                    ){
                        return true;
                    }
                }

            }

        }
    }
    public static function createRecord($dbh, $id, $username){

        $dbh->prepare('DELETE From sessions WHERE userid');


        $token = func::createString(32);
        $serial = func::createString(32);
        func::createCookie($username, $id, $token, $serial);
        func::createSession($username, $id, $token, $serial);

        //$dbh->prepare('INSERT Into sessions () Values WHERE userid'); Part 3 Min 11

    }
    public static function createCookie($username, $id, $token, $serial){
        setcookie('id', $id, time() + (86400) * 30, "/");
        setcookie('username', $username, time() + (86400) * 30, "/");
        setcookie('token', $token, time() + (86400) * 30, "/");
        setcookie('serial', $serial, time() + (86400) * 30, "/");
    }

    public static function createSession($username, $id, $token, $serial){
        if(isset($_SESSION['id']) || !isset($_COOKIE['PHPSESSID'])){
            session_start();
        }
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