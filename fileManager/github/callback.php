<?php
/**
 * Respond to callback with list of repositories
 *
 * @author Shivashriganesh Mahato
 */

include 'util.php';

// TODO Replace session with DB

$code = $_GET['code'];
$token = fetchToken($code, $client_id, $client_secret);

if ($token) {
    $_SESSION['token'] = $token;
    include 'saveGHUserData.php';
    header("Location: ../../Castle.php#/settings");
} else {
echo "UNS";
//    header("Location: ../../Castle.php#/settings?unsuccessful");
}
