
<?php
function checkInternet()
{

    //Checking internet connection status with predefined function
    switch (connection_status()) {
        case CONNECTION_NORMAL:
            $msg = 'You are connected to internet.';
            break;
        case CONNECTION_ABORTED:
            $msg = 'No Internet connection';
            break;
        case CONNECTION_TIMEOUT:
            $msg = 'Connection time-out';
            break;
        case (CONNECTION_ABORTED & CONNECTION_TIMEOUT):
            $msg = 'No Internet and Connection time-out';
            break;
        default:
            $msg = 'Undefined state';
            break;
    }
    //display connection status
    echo $msg;
}


function test_input($data)
{
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}
