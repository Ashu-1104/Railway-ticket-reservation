<?php
session_start();
include("DBConnection.php");

// Check if the user is logged in
if (!isset($_SESSION["uname"])) {
    header("location: ./index.php?logout=1");
    exit();
}

$uname = $_SESSION["uname"];

// Retrieve data from the session or POST
$pnr = $_SESSION["pnr"] ?? $_POST["pnr"] ?? null;

// If PNR is not set, redirect to the home page
if (!$pnr) {
    echo "<script>alert('Invalid Access! No PNR found.'); window.location.href='index.php';</script>";
    exit();
}

// Fetch ticket details from the database
$sql = "SELECT t.*, s.source, s.destination, s.depart_time, s.arrival_time, s.fare, tr.train_name, tr.class 
        FROM ticket t 
        JOIN station s ON t.station_no = s.station_no 
        JOIN train tr ON t.train_no = tr.train_no 
        WHERE t.ticket_no = ?";

$stmt = $conn->prepare($sql);
$stmt->bind_param("i", $pnr);
$stmt->execute();
$result = $stmt->get_result();

if ($result->num_rows === 0) {
    echo "<script>alert('Ticket not found!'); window.location.href='index.php';</script>";
    exit();
}

$ticket = $result->fetch_assoc();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Train Ticket</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
    <link rel="stylesheet" href="asset/css/ticket-style.css">
    <style>
        body {
  font-family: "Arial", sans-serif;
  background-color: #f0f0f0;
  display: flex;
  justify-content: center;
  align-items: center;
  min-height: 100vh;
  margin: 0;
  padding: 20px;
  box-sizing: border-box;
}

.container {
  width: 100%;
  max-width: 600px;
}

.ticket {
  background-color: #fff;
  border-radius: 15px;
  box-shadow: 0 0 20px rgba(0, 0, 0, 0.1);
  overflow: hidden;
}

.ticket-header {
  background-color: #3498db;
  color: #fff;
  padding: 20px;
  text-align: center;
}

.ticket-header h1 {
  margin: 0;
  font-size: 24px;
}

.ticket-number {
  font-size: 18px;
  margin-top: 10px;
}

.ticket-body {
  padding: 20px;
}

.ticket-info {
  display: grid;
  gap: 15px;
}

.info-item {
  display: flex;
  align-items: center;
}

.info-item i {
  margin-right: 10px;
  color: #3498db;
  width: 20px;
}

.ticket-footer {
  background-color: #f9f9f9;
  padding: 20px;
  text-align: center;
}

.barcode {
  font-family: "Libre Barcode 39", cursive;
  font-size: 48px;
  margin-bottom: 20px;
}

.btn {
  display: inline-block;
  background-color: #3498db;
  color: #fff;
  padding: 10px 20px;
  text-decoration: none;
  border-radius: 5px;
  transition: background-color 0.3s;
}

.btn:hover {
  background-color: #2980b9;
}

@media (max-width: 480px) {
  .ticket-header h1 {
    font-size: 20px;
  }

  .ticket-number {
    font-size: 16px;
  }

  .info-item {
    font-size: 14px;
  }
}


    </style>
</head>
<body>
    <div class="container">
        <div class="ticket">
            <div class="ticket-header">
                <h1>Train Ticket</h1>
                <div class="ticket-number">PNR: <?php echo htmlspecialchars($ticket['ticket_no']); ?></div>
            </div>
            <div class="ticket-body">
                <div class="ticket-info">
                    <div class="info-item">
                        <i class="fas fa-train"></i>
                        <span><?php echo htmlspecialchars($ticket['train_name']); ?> (<?php echo htmlspecialchars($ticket['train_no']); ?>)</span>
                    </div>
                    <div class="info-item">
                        <i class="fas fa-map-marker-alt"></i>
                        <span><?php echo htmlspecialchars($ticket['source']); ?> → <?php echo htmlspecialchars($ticket['destination']); ?></span>
                    </div>
                    <div class="info-item">
                        <i class="fas fa-calendar-alt"></i>
                        <span><?php echo htmlspecialchars($ticket['date']); ?></span>
                    </div>
                    <div class="info-item">
                        <i class="fas fa-clock"></i>
                        <span>Departure: <?php echo htmlspecialchars($ticket['depart_time']); ?></span>
                    </div>
                    <div class="info-item">
                        <i class="fas fa-clock"></i>
                        <span>Arrival: <?php echo htmlspecialchars($ticket['arrival_time']); ?></span>
                    </div>
                    <div class="info-item">
                        <i class="fas fa-couch"></i>
                        <span>Class: <?php echo htmlspecialchars($ticket['class'] ?? 'N/A'); ?></span>
                    </div>
                    <div class="info-item">
                        <i class="fas fa-money-bill-wave"></i>
                        <span>Fare: ₹<?php echo htmlspecialchars($ticket['fare'] ?? 'N/A'); ?></span>
                    </div>
                    <div class="info-item">
                        <i class="fas fa-info-circle"></i>
                        <span>Status: <?php echo htmlspecialchars($ticket['status']); ?></span>
                    </div>
                </div>
            </div>
            <div class="ticket-footer">
                <div class="barcode">
                    <!-- You can replace this with an actual barcode image or generator -->
                    |||||| |||| || ||||| || ||| |||||| |||| || ||||| || |||
                </div>
                <a href="index.php" class="btn">Back to Home</a>
            </div>
        </div>
    </div>
</body>
</html>

