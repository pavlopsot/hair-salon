<!DOCTYPE html>
<html lang="el">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Κράτηση Ραντεβού</title>
    <style>
        button {
            display: block;
            margin-top: 20px;
            padding: 10px;
            background-color: #007bff;
            color: white;
            border: none;
            cursor: pointer;
            font-size: 16px;
        }
        button:hover {
            background-color: #0056b3;
        }
    </style>
</head>
<body>
    <h2>Κλείσε το ραντεβού σου</h2>
    <form action="save_appointment.php" method="post">
        Όνομα: <input type="text" name="name" required><br>
        Τηλέφωνο: <input type="text" name="phone" required><br>
        Ημερομηνία: <input type="date" name="date" required><br>
        Ώρα: <input type="time" name="time" required><br>
        <input type="submit" value="Κράτηση">
    </form>

    <!-- Κουμπί για εμφάνιση των ραντεβού -->
    <button onclick="window.location.href='view_appointments.php'">Δες τα ραντεβού</button>
</body>
</html>
