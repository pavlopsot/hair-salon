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

// Έλεγχος αν υπάρχει ήδη ραντεβού την ίδια ώρα και μέρα
$check_sql = "SELECT * FROM appointments WHERE date = '$date' AND time = '$time'";
$result = $conn->query($check_sql);

if ($result->num_rows > 0) {
    echo "Σφάλμα: Η ώρα αυτή είναι ήδη κλεισμένη! Παρακαλώ επιλέξτε άλλη ώρα.";
} else {
    // Αν δεν υπάρχει άλλο ραντεβού, προχωράμε στην εισαγωγή
    $sql = "INSERT INTO appointments (name, phone, date, time) VALUES ('$name', '$phone', '$date', '$time')";
    if ($conn->query($sql) === TRUE) {
        echo "Το ραντεβού καταχωρήθηκε επιτυχώς!";
        
        // Αποθήκευση στο εξωτερικό αρχείο
        $file = fopen("appointments.txt", "a");
        fwrite($file, "$name - $phone - $date - $time\n");
        fclose($file);
    } else {
        echo "Σφάλμα: " . $sql . "<br>" . $conn->error;
    }
}

$conn->close();
?>
<br><a href="index.php">Επιστροφή</a>
