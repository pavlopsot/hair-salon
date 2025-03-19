<?php
// Σύνδεση στη βάση δεδομένων
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "hair_salon";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Σφάλμα σύνδεσης: " . $conn->connect_error);
}

// Παίρνουμε τα δεδομένα από τη φόρμα
$name = $_POST['name'];
$phone = $_POST['phone'];
$date = $_POST['date'];
$time = $_POST['time'];

// Εισαγωγή στη βάση δεδομένων
$sql = "INSERT INTO appointments (name, phone, date, time) VALUES ('$name', '$phone', '$date', '$time')";
if ($conn->query($sql) === TRUE) {
    echo "Το ραντεβού καταχωρήθηκε επιτυχώς!";
} else {
    echo "Σφάλμα: " . $sql . "<br>" . $conn->error;
}

// Αποθήκευση στο εξωτερικό αρχείο
$file = fopen("appointments.txt", "a");
fwrite($file, "$name - $phone - $date - $time\n");
fclose($file);

$conn->close();
?>
<br><a href="index.php">Επιστροφή</a>
