<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lista użytkowników</title>
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="styles.css">
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

   .completed {
    background-color: lightgreen;
    }

    .incomplete {
    background-color: lightcoral;
    }

}


    </style>
</head>
<body>

<div class="container">
    <h2 class="mt-5">Todo List</h2>
    <table class="table">
        <thead>
            <tr>    
                <th>Nazwa</th>
                <th>Status</th>
                
            </tr>
        </thead>
        <tbody>
            <?php
            // Połączenie z bazą danych
            $servername = "sql112.epizy.com";
            $username = "epiz_32762504";
            $password = "Px9R2V2FcqoEV";
            $dbname = "epiz_32762504_todo";
            $conn = new mysqli($servername, $username, $password, $dbname);
            if ($conn->connect_error) {
                die("Błąd połączenia z bazą danych: " . $conn->connect_error);
            }

            // Zapytanie SQL
            $sql = "SELECT id, name, status FROM tasks";
            $result = $conn->query($sql);
            
            // Wyświetlanie danych z bazy danych w tabeli
            if ($result->num_rows > 0) {
             while ($row = $result->fetch_assoc()) {

            $status = $row['status'];
            
            $status_class = $status === 'Ukończone' ? 'completed' : 'incomplete';
            echo "<tr class='$status_class'><td>" . $row["name"] . "</td><td>" . $row["status"] . "</td></tr>"; 


            echo "<td>";
            echo "<a href='/todo/set_done.php?id=" . $row["id"] . "' class='btn btn-primary'>";
            echo "<svg xmlns='http://www.w3.org/2000/svg' width='16' height='16' fill='currentColor' class='bi bi-check2-circle' viewBox='0 0 16'>";
            echo "<path d='M2.5 8a5.5 5.5 0 0 1 8.25-4.764.5.5 0 0 0 .5-.866A6.5 6.5 0 1 0 14.5 8a.5.5 0 0 0-1 0 5.5 5.5 0 1 1-11 0'/>";
            echo "<path d='M15.354 3.354a.5.5 0 0 0-.708-.708L8 9.293 5.354 6.646a.5.5 0 1 0-.708.708l3 3a.5.5 0 0 0 .708 0z'/>";
            echo "</svg>";
            echo "</a>";


            echo "<a href='/todo/delete_task.php?id=" . $row["id"] . "' class='btn btn-danger'>";
            echo "<svg xmlns='http://www.w3.org/2000/svg' width='16' height='16' fill='currentColor' class='bi bi-x-circle' viewBox='0 0 16 16'>";
            echo "<path d='M8 15A7 7 0 1 1 8 1a7 7 0 0 1 0 14m0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16'/>";
            echo " <path d='M4.646 4.646a.5.5 0 0 1 .708 0L8 7.293l2.646-2.647a.5.5 0 0 1 .708.708L8.707 8l2.647 2.646a.5.5 0 0 1-.708.708L8 8.707l-2.646 2.647a.5.5 0 0 1-.708-.708L7.293 8 4.646 5.354a.5.5 0 0 1 0-.708'/";
            echo "</svg>";
            echo "</a>";
            echo "</td></tr>";
            }
        } else {
            echo "<tr><td colspan='3'>Brak zadań</td></tr>";
        }
$conn->close();
?>

            
           <div class="container mt-5">
                <form action="add_task.php" method="post">
              <div class="form-group">
                <label for="name">Treść zadania:</label>
                <input type="text" class="form-control" id="name" name="name" required>
            </div>
               <button type="submit" class="btn btn-success">Dodaj</button>
        </form>
</div>

            
        </tbody>
    </table>
</div>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

</body>
</html>
