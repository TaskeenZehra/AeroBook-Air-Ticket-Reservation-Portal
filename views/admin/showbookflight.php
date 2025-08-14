<?php
require_once '../../controllers/admin/showBookFlightController.php';

// Database credentials
$host = "localhost";
$user = "root";
$pass = "";
$db = "airlinedb";

// Connect to the database
$conn = mysqli_connect($host, $user, $pass, $db);
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

$totalTickets = null;
$from = $to = "";

if (isset($_GET['from_date']) && isset($_GET['to_date'])) {
    $from = $_GET['from_date'];
    $to = $_GET['to_date'];

    $query = "
        SELECT t.uname, DATE(t.booking_date) AS booking_date, f.flightid, f.ddate, f.ttime, f.ffrom, f.tto
        FROM tickets t
        INNER JOIN flight f ON t.flightid = f.fid
        WHERE DATE(t.booking_date) BETWEEN '$from' AND '$to'
        ORDER BY t.booking_date ASC
    ";

    $countQuery = "
        SELECT COUNT(*) as total
        FROM tickets
        WHERE DATE(booking_date) BETWEEN '$from' AND '$to'
    ";

    $countResult = mysqli_query($conn, $countQuery);
    $countRow = mysqli_fetch_assoc($countResult);
    $totalTickets = $countRow['total'];
} else {
    $query = "
        SELECT t.uname, DATE(t.booking_date) AS booking_date, f.flightid, f.ddate, f.ttime, f.ffrom, f.tto
        FROM tickets t
        INNER JOIN flight f ON t.flightid = f.fid
        ORDER BY t.booking_date DESC
    ";
}

$rs = mysqli_query($conn, $query);
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Admin</title>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" />
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" />
  <link rel="stylesheet" href="css/showFlight.css" />
  <style>
    .search { margin-bottom: 100px; }
  </style>
</head>
<body>
<?php require_once 'navbar.php'; ?>
<section id="admin-menu">
  <?php include "adminMenu.php"; ?>
  <div class="split-right">
    <div>
      <div class="search p-l-55 p-r-55 p-t-65 p-b-50">
        <span class="search-form-title">List of Flight Bookings</span>
        <br><br>

        <!-- Date Filter Form -->
        <form method="GET" class="form-inline mb-4">
          <label class="mr-2">From:</label>
          <input type="date" name="from_date" value="<?= htmlspecialchars($from) ?>" class="form-control mr-4" required>
          <label class="mr-2">To:</label>
          <input type="date" name="to_date" value="<?= htmlspecialchars($to) ?>" class="form-control mr-4" required>
          <button type="submit" class="btn btn-primary">Filter</button>
        </form>

        <?php if (isset($from, $to)) { ?>
            <p class="text-muted">
              Showing results from <strong><?= htmlspecialchars($from) ?></strong> to <strong><?= htmlspecialchars($to) ?></strong>
            </p>
        <?php } ?>

        <?php if (isset($totalTickets)) { ?>
            <p class="text-info"><strong>Total Tickets Booked:</strong> <?= htmlspecialchars($totalTickets) ?></p>
        <?php } ?>

        <table class="search-table" style="width: 100%">
          <thead class="search-table">
            <tr>
              <th class="search-table">Username</th>
              <th class="search-table">Flight ID</th>
              <th class="search-table">Booking Date</th>
              <th class="search-table">Departure Date</th>
              <th class="search-table">Time</th>
              <th class="search-table">From</th>
              <th class="search-table">To</th>
            </tr>
          </thead>
          <tbody>
          <?php
          if ($rs && mysqli_num_rows($rs) > 0) {
              while ($row = mysqli_fetch_assoc($rs)) {
                  echo "<tr>";
                  echo '<td class="search-table">' . htmlspecialchars($row["uname"]) . '</td>';
                  echo '<td class="search-table">' . htmlspecialchars($row["flightid"]) . '</td>';
                  echo '<td class="search-table">' . htmlspecialchars($row["booking_date"]) . '</td>';
                  echo '<td class="search-table">' . htmlspecialchars($row["ddate"]) . '</td>';
                  echo '<td class="search-table">' . htmlspecialchars($row["ttime"]) . '</td>';
                  echo '<td class="search-table">' . htmlspecialchars($row["ffrom"]) . '</td>';
                  echo '<td class="search-table">' . htmlspecialchars($row["tto"]) . '</td>';
                  echo "</tr>";
              }
          } else {
              echo '<tr><td colspan="7" class="text-center">No bookings found.</td></tr>';
          }

          mysqli_close($conn);
          ?>
          </tbody>
        </table>
      </div>
    </div>
  </div>
</section>

</body>
</html>
