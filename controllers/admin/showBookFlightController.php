<?php
require_once '../../models/database_connect.php';
session_start();

if (!isset($_SESSION['loggedinuser'])) {
    header("Location:../../views/Login.php");
    exit(); // Always exit after header redirect
}

function getAllTickets() {
    $query = "SELECT * FROM tickets";
    $ticket = get($query);
    
    if ($ticket === false) {
        // You can log this or show a user-friendly error
        error_log("Failed to fetch tickets.");
        return [];
    }

    return $ticket;
}


// No need to close $conn manually here
?>
