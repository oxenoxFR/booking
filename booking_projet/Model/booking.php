<?php

require_once 'Model/conf.php';

try {
   $host =  $confHost;
   $port =  $confPort; // Specify the port number
    $dbname = $confDbname;
    $username = $confUsername;

    // Create a PDO instance with the port included in the DSN
    $dsn = "mysql:host=localhost;dbname=$dbname;port=$port;charset=utf8mb4";
    $pdo = new PDO($dsn, $username);

    // Set error mode to exception for better debugging
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    echo "Connection successful!";
} catch (PDOException $e) {
    echo "Connection failed: " . $e->getMessage();
}

?>
<?php
function getBookings($pdo) {
    $stmt = $pdo->prepare("SELECT * FROM bookings");
    $stmt->execute();
    return $stmt->fetchAll(PDO::FETCH_ASSOC);
}
function addBooking($pdo, $name, $date, $time) {
    $stmt = $pdo->prepare("INSERT INTO bookings (name, date, time) VALUES (:name, :date, :time)");
    $stmt->bindParam(':name', $name);
    $stmt->bindParam(':date', $date);
    $stmt->bindParam(':time', $time);
    return $stmt->execute();
}
function updateBooking($pdo, $name, $date, $time) {
    $stmt = $pdo->prepare("UPDATE bookings SET date = :date, time = :time WHERE name = :name");
    $stmt->bindParam(':name', $name);
    $stmt->bindParam(':date', $date);
    $stmt->bindParam(':time', $time);
    return $stmt->execute();
}
function deleteBooking($pdo, $name) {
    $stmt = $pdo->prepare("DELETE FROM bookings WHERE name = :name");
    $stmt->bindParam(':name', $name);
    return $stmt->execute();
}
?>