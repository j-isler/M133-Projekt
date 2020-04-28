<?php


class SessionMngt {

    public static function runSession(){
        if (!isset($_SESSION)) {
            session_start();
        }
    }

    public static function checkLoginState($dbh){

        SessionMngt::runSession();


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
                    else{
                        SessionMngt::createSession($_COOKIE['username'], $_COOKIE['user_id'], $_COOKIE['token'],
                         $_COOKIE['serial']);
                        return true;
                    }
                }


            } 

        }
    }
    public static function createRecord($dbh, $id, $username){

        $query = 'INSERT Into sessions (user_id, token, serial/*, date */) Values (:user_id, :token, :serial/*, "22/04/2020"*/)';
        $dbh->prepare("DELETE From sessions WHERE user_id = :userid;")->execute(array(':userid' => $id));


        $token = SessionMngt::createString(32);
        $serial = SessionMngt::createString(32);

        SessionMngt::createCookie($username, $id, $token, $serial);
        SessionMngt::createSession($username, $id, $token, $serial);

        $stmt = $dbh->prepare($query);
        $stmt->execute(array(':user_id' => $id,
                             ':token' => $token,
                             ':serial' => $serial));
    }
    public static function createCookie($username, $id, $token, $serial){
        setcookie('user_id', $id, time() + (86400) * 30, "/");
        setcookie('username', $username, time() + (86400) * 30, "/");
        setcookie('token', $token, time() + (86400) * 30, "/");
        setcookie('serial', $serial, time() + (86400) * 30, "/");
    }

    public static function deleteCookie(){
        SessionMngt::runSession();
        setcookie('user_id', '', time() -1, "/");
        setcookie('username', '', time()  -1, "/");
        setcookie('token', '', time()  -1, "/");
        setcookie('serial', '', time()  -1, "/");
        session_destroy();
    }


    public static function createSession($username, $id, $token, $serial){
        SessionMngt::runSession();
        
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