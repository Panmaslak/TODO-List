      <style>
       .link {
            display: inline-block;
            padding: 10px 20px; /* Dodatkowy odstęp dla lepszego wyglądu */
            background-color: #007bff; /* Kolor tła */
            color: #fff; /* Kolor tekstu */
            text-decoration: none; /* Usunięcie podkreślenia */
            border-radius: 5px; /* Zaokrąglenie rogów */
            transition: background-color 0.3s ease; /* Efekt przejścia */
       }

    </style>

<?php
$id = $_GET['id'];

$servername = "sql112.epizy.com";
$username = "epiz_32762504";
$password = "Px9R2V2FcqoEV";
$dbname = "epiz_32762504_todo";
$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) {
    die("Błąd połączenia z bazą danych: " . $conn->connect_error);
}

$sql = "DELETE FROM tasks WHERE id = '$id'";
if ($conn->query($sql) === TRUE) {
    ?>
    <!DOCTYPE html>
    <html lang="pl">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Komunikat sukcesu</title>
        <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    </head>
    <body>
    <div class="container mt-5">
        <div class="alert alert-success" role="alert">
            Zadanie usunięte           
        </div>
        <a href="/todo/index.php" class="link">Powrót</a>
    </div>
    </body>
    </html>
    <?php
} else {
    ?>
    <!DOCTYPE html>
    <html lang="pl">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Błąd</title>
        <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    </head>
    <body>
    <div class="container mt-5">
        <div class="alert alert-danger" role="alert">
            Błąd podczas usuwania zadania: <br><?php echo $conn->error; ?>
            
        </div>
         <a href="/todo/index.php" class="link">Powrót</a>
    </div>
    </body>
    </html>
    <?php
}
$conn->close();
?>
