<?php
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

if (!isset($_SESSION['loggedinuser'])) {
    header("Location:../Login.php");
    exit();
}

require_once '../../models/database_connect.php';

if (isset($_POST['submit'])) {
    $err_from = '';
    $from = '';
    $err_to = '';
    $to = '';
    $err_select = '';
    $err_date = '';
    $date = '';
    $has_err = false;

    if (!isset($_POST['from']) || $_POST['from'] == 'NULL') {
        $err_from = '*Please Select';
        $has_err = true;
    } else {
        $from = $_POST['from'];
    }

    if (!isset($_POST['to']) || $_POST['to'] == 'NULL') {
        $err_to = '*Please Select';
        $has_err = true;
    } else {
        if ($_POST['from'] === $_POST['to']) {
            $err_select = '*Error Select';
            $has_err = true;
        } else {
            $to = $_POST['to'];
        }
    }

    if (!isset($_POST['date']) || empty($_POST['date'])) {
        $err_date = '*Date Required';
        $has_err = true;
    } else {
        $date = $_POST['date'];
    }

    if (!$has_err) {
        // Fetch flights (even though not used here, you can debug/log if needed)
        getAllFlights($from, $to, $date);
        header("Location:usearchresult.php?from=" . urlencode($from) . "&to=" . urlencode($to) . "&date=" . urlencode($date));
        exit();
    }
}

function getAllCities()
{
    return get("SELECT * FROM cities");
}

function getAllFlights($from = '', $to = '', $date = '')
{
    if ($from && $to && $date) {
        $query = "SELECT * FROM flight WHERE ffrom='$from' AND tto='$to' AND ddate='$date'";
        $flight = get($query);
        return $flight;
    }
    return [];
}
?>
