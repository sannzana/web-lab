<?php
include 'database.php';

// Check the connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

// Fetch data from the first table (info)
$sqlInfo = "SELECT * FROM info";
$resultInfo = mysqli_query($conn, $sqlInfo);

// Check if the query for the first table was successful
if (!$resultInfo) {
    die("Error executing the query for info table: " . mysqli_error($conn));
}

// Fetch data from the second table (education)
$sqlEducation = "SELECT * FROM education";
$resultEducation = mysqli_query($conn, $sqlEducation);

// Check if the query for the second table was successful
if (!$resultEducation) {
    die("Error executing the query for education table: " . mysqli_error($conn));
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="index.css">
    <!-- style change korte hbe -->
</head>
<body>
    <div class="container">
        <!-- Display information from the second table (education) -->
        <div class="container">
            <div class="tab1"> 
                <!-- Display information from the first table (info) --> 
                <table class="style">
                    <thead>
                        <tr>
                            <th scope="col">Year</th>
                            <th scope="col">Institute</th>
                            <th scope="col">Details</th>
                            <th scope="col">Operation</th>
                        </tr>
                    </thead>
                    <tbody> 
                        <?php
                        // Loop through the results and display data for the second table (education)
                        while ($row = mysqli_fetch_assoc($resultEducation)) {
                            $inf1 = $row['year'];
                            $inf2 = $row['name'];
                            $inf3 = $row['details'];

                            echo '<tr>
                                    <td>' . $inf1 . '</td>
                                    <td>' . $inf2 . '</td>
                                    <td>' . $inf3 . '</td>
                                    <td>
                                        <div class="button-container">
                                        <button class="update-btn" data-id="'.$inf1.'"><a href="update.php?upid='.$inf1.'">Change Information</a></button>
                                            <button class="delete-btn" data-id="'.$inf1.'">Delete Information</button>
                                        </div>
                                    </td>
                                </tr>';
                        }
                        ?>
                    </tbody>
                </table>
            </div>
        </div>

        <script>
            // JavaScript code for confirmation prompt
            document.addEventListener('DOMContentLoaded', function () {
                const deleteButtons = document.querySelectorAll('.delete-btn');

                deleteButtons.forEach(function (button) {
                    button.addEventListener('click', function (event) {
                        // Prevent the default action of the anchor tag
                        event.preventDefault();

                        const confirmDelete = confirm('Are you sure you want to delete?');

                        if (confirmDelete) {
                            // Redirect to delete.php with the deleteid parameter
                            window.location.href = 'delete.php?deleteid=' + button.getAttribute('data-id');
                        }
                    });
                });
            });
        </script>


<script>
    // JavaScript code for confirmation prompt
    document.addEventListener('DOMContentLoaded', function () {
        const updateButtons = document.querySelectorAll('.update-btn');

        updateButtons.forEach(function (button) {
            button.addEventListener('click', function (event) {
                // Prevent the default action of the anchor tag
                event.preventDefault();

                const confirmUpdate = confirm('Are you sure you want to update?');

                if (confirmUpdate) {
                    // Redirect to update.php with the upid parameter
                    window.location.href = 'update.php?upid=' + button.getAttribute('data-id');
                }
            });
        });
    });
</script>

    </div>
</body>
</html>
