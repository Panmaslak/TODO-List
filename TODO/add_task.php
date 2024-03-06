<style>
.link {
    display: inline-block;
    padding: 10px 20px;
    background-color: #007bff;
    color: #fff;
    text-decoration: none;
    border-radius: 5px;
    transition: background-color 0.3s ease;
}

</style>


<?php
$servername = "sql112.epizy.com";
$username = "epiz_32762504";
$password = "Px9R2V2FcqoEV";
$dbname = "epiz_32762504_todo";

// Tworzenie połączenia
$conn = new mysqli($servername, $username, $password, $dbname);

// Sprawdzenie połączenia
if ($conn->connect_error) {
    die("Błąd połączenia: " . $conn->connect_error);
}

// Pobranie danych z formularza
$name = $_POST['name'];

// Utworzenie zapytania SQL do dodania danych użytkownika
$sql = "INSERT INTO tasks (name, status) VALUES ('$name', 'Do zrobienia')";

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
            Pomyślnie dodano nowe zadanie            
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
        <!-- Dodanie Bootstrapa -->
        <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    </head>
    <body>
    <div class="container mt-5">
        <div class="alert alert-danger" role="alert">
            Błąd: <?php echo $sql; ?><br><?php echo $conn->error; ?>
            
        </div>
             <a href="/todo/index.php" class="link">Powrót</a>

    </div>
    </body>
    </html>
    <?php
}

$conn->close();

?>
