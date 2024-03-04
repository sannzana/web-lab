<?php
include 'database.php';

$id = $_GET['upid'];
$sql = "SELECT * FROM education WHERE year=?";
$stmt = mysqli_prepare($conn, $sql);

mysqli_stmt_bind_param($stmt, "i", $id);
mysqli_stmt_execute($stmt);

$result = mysqli_stmt_get_result($stmt);

if (!$result) {
    die('Error retrieving data: ' . mysqli_error($conn));
}

$row = mysqli_fetch_assoc($result);

$year1 = $row['year'];
$ins1 = $row['name'];
$det1 = $row['details'];

mysqli_stmt_close($stmt);

if (isset($_POST['update'])) {
    $year = $_POST["yr"];
    $name = $_POST["ins"];
    $details = $_POST["det"];

    $sql = "UPDATE education SET year=?, name=?, details=? WHERE year=?";
    $stmt = mysqli_prepare($conn, $sql);

    mysqli_stmt_bind_param($stmt, "sssi", $year, $name, $details, $id);
    mysqli_stmt_execute($stmt);

    mysqli_stmt_close($stmt);

    header('Location: index.php');
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Update Information</title>
    <link rel="stylesheet" href="update.css">
</head>
<body>

    <form method="post" onsubmit="return confirmUpdate()">
        <div>
            <label for="exampleInputEmail1" class="form-label">Year: </label>
            <input type="text" name="yr" class="form-control" id="exampleInputEmail1" value="<?php echo $year1; ?>">
        </div>
        <div>
            <label for="exampleInputPassword1" class="form-label">Institute: </label>
            <input type="text" name="ins" class="form-control" id="exampleInputPassword1" value="<?php echo $ins1; ?>">
        </div>
        <div>
            <label for="exampleInputPassword1" class="form-label">Details: </label>
            <input type="text" name="det" class="form-control" id="exampleInputPassword1" value="<?php echo $det1; ?>">
        </div>
        <div>
            <input type="checkbox" class="form-check-input" id="exampleCheck1">
            <label class="form-check-label" for="exampleCheck1">Check me out</label>
        </div>
        <button type="submit" name="update" class="btn btn-primary">Submit</button>
    </form>

    <script>
        // JavaScript code for confirmation prompt before update submission
        function confirmUpdate() {
            const confirmation = confirm('Are you sure you want to update?');
            if (!confirmation) {
                // Redirect to index.php if "Cancel" is clicked
                window.location.href = 'index.php';
            }
            return confirmation;
        }
    </script>

</body>
</html>
