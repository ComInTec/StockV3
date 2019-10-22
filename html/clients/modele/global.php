    <?php
    ob_start();
//    session_start();
    $error = "Problem connecting";
    $link = mysqli_connect('localhost','root','') or die($error);
    mysqli_select_db($link,'dap2') or die($error);
    ?>