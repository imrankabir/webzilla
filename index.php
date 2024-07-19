<?php
if (isset($_POST['connect'])) {
    $server = $_POST['server'];
    $username = $_POST['username'];
    $password = $_POST['password'];

    try {
        $ftp_conn = ftp_connect($server);
        var_dump($ftp_conn);
        if ($ftp_conn) {
            $login_result = ftp_login($ftp_conn, $username, $password);
            if ($login_result) {
                echo "Connected and logged in!";
            } else {
                echo "Login failed.";
            }
        } else {
            echo "Could not connect to the FTP server.";
        }
    } catch (Exception $e) {
        echo $e->getMessage();
    }
}
$server = '127.0.0.1';
$name = 'ftpuser';
$password = 'ftppass';
?>
<!DOCTYPE html>
<html>

<head>
    <title>FTP Client</title>
</head>

<body>
    <h1>FTP Client</h1>
    <form action="index.php" method="post">
        FTP Server: <input type="text" name="server" value="<?= $server ?>"><br>
        Username: <input type="text" name="username" value="<?= $username ?>"><br>
        Password: <input type="password" name="password" value="<?= $password ?>"><br>
        <input type="submit" name="connect" value="Connect">
    </form>
</body>

</html>