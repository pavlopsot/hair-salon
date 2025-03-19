<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "hair_salon";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Σφάλμα σύνδεσης: " . $conn->connect_error);
}

$sql = "SELECT * FROM appointments ORDER BY date, time";
$result = $conn->query($sql);

echo "<h2>Προγραμματισμένα Ραντεβού</h2>";
if ($result->num_rows > 0) {
    echo "<table border='1'><tr><th>Όνομα</th><th>Τηλέφωνο</th><th>Ημερομηνία</th><th>Ώρα</th><th>Ενέργεια</th></tr>";
    while ($row = $result->fetch_assoc()) {
        echo "<tr>
                <td>".$row["name"]."</td>
                <td>".$row["phone"]."</td>
                <td>".$row["date"]."</td>
                <td>".$row["time"]."</td>
                <td><a href='delete_appointment.php?id=".$row["id"]."' onclick='return confirm(\"Είσαι σίγουρος ότι θέλεις να ακυρώσεις αυτό το ραντεβού;\")'>Διαγραφή</a></td>
              </tr>";
    }
    echo "</table>";
} else {
    echo "Δεν υπάρχουν προγραμματισμένα ραντεβού.";
}

$conn->close();
?>
<br><a href="index.php">Νέο Ραντεβού</a>
