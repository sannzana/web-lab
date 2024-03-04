<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Hash Techie Official</title>
    <link rel="stylesheet" href="portlast.css">
    <link rel="stylesheet" href="https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css">
</head>

<body>
    <!-- *************************Navbar************************* -->
    <header class="header">
        <a href="login.php" class="logo">Fariha</a>
        <i class='bx bx-menu' id="menu" style='color:#ffffff'></i>
        <nav class="navbar">
            <a href="#home" style="--vlr:1" class="active">Home</a>
            <a href="#about" style="--vlr:2">About Me</a>
            <a href="#education" style="--vlr:3">Education</a>
            <!-- <a href="#Projects" style="--vlr:4">Skills</a> -->
            <a href="contact2.php" style="--vlr:5">Contact Me</a>
        </nav> </header>
    <!-- *************************Home Section************************* -->
   
    <?php
$servername = "localhost:3302";
$username = "root";
$password = "";
$dbname = "data";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$sql = "SELECT home_h1, home_p FROM info";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    $row = $result->fetch_assoc();
    $name = $row['home_h1'];
    $para = $row['home_p'];
} else {
    $name = "Default Name";
}

$conn->close();
?>
   
   <div class="container">
    <section class="home" id="home">
        <div class="text-content">
            <h1>I'm <?php echo $name; ?></h1>
            <div class="text-animation">
                <h2>A Student</h2>
            </div>
            <p><?php echo $para; ?></p>
            <div class="btn-section">
                <button class="btn">Hire me</button>
                <button class="btn">Let's Talk</button>
            </div>
            <div class="social-media">
                <i class='bx bxl-instagram' style="--vlr:7"></i>
                <i class='bx bxl-facebook' style="--vlr:8"></i>
               
            </div>
        </div>
        <img src="image/img22.png" alt="" class="aboutImg">
    </section>

    <?php
// Connect to the database
$servername = "localhost:3302";
$username = "root";
$password = "";
$dbname = "data";

$conn = new mysqli($servername, $username, $password, $dbname);

// Check the connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Fetch data for the home section
$sql_home = "SELECT home_h1, home_p FROM info";
$result_home = $conn->query($sql_home);

if ($result_home->num_rows > 0) {
    $row_home = $result_home->fetch_assoc();
    $name = $row_home['home_h1'];
    $para = $row_home['home_p'];
} else {
    $name = "Default Name";
}

// Fetch data for the about section
$sql_about = "SELECT about_h1, about_p FROM info";
$result_about = $conn->query($sql_about);

if ($result_about->num_rows > 0) {
    $row_about = $result_about->fetch_assoc();
    $about_h1 = $row_about['about_h1'];
    $about_p = $row_about['about_p'];
} else {
    // Handle the case where no data is found for the about section
    $about_h1 = "Default About Heading";
    $about_p = "Default About Paragraph";
}

// Close the connection
$conn->close();
?>


    <section class="about" id="about">
        <h2 class="title">About <span>Me</span></h2>
        <img src="image/img1.jpg" alt="Twitter Icon" >
        <div class="text-content2">
            <h2><?php echo $about_h1; ?></h2>
            <p><?php echo $about_p; ?></p>
            <button class="btn">Read More</button>
        </div>
    </section>

    <?php
    $servername = "localhost:3302";
    $username = "root";
    $password = "";
    $dbname = "data";

    $conn = new mysqli($servername, $username, $password, $dbname);

    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    // Fetch education data from the database
    $sqlFetchEducation = "SELECT * FROM education";
    $resultEducation = $conn->query($sqlFetchEducation);

    $conn->close();
    ?>

    <section class="education" id="education">
        <h2 class="title">My <span>Education</span></h2>
        <div class="row">
            <div class="column">
                <h2>Education</h2>
                <div class="box">
                    <?php
                    if ($resultEducation->num_rows > 0) {
                        while ($rowEducation = $resultEducation->fetch_assoc()) {
                            echo "<div class='education-content'>";
                            echo "<div class='content'>";
                            echo "<div class='year'>" . $rowEducation['year'] . "<i class='bx bxs-calendar'></i></div>";
                            echo "<h3>" . $rowEducation['name'] . "</h3>";
                            echo "<p>" . $rowEducation['details'] . "</p>";
                            echo "</div></div>";
                        }
                    } else {
                        echo "<p>No education information available.</p>";
                    }
                    ?>
                </div>
            </div>
        </div>
    </section>

    <div class="project-section">
    <header>
    <h1>My Projects</h1>
</header>
                        <div class="project-box" id="project1">
                        <img src="image/nn (1).jpg" alt="Twitter Icon" style="width: 50px; height: 50px;">
                            <span class="project-title">Project 1</span>
                        </div>
                        <div class="project-box" id="project2">
                        <img src="image/nn (2).jpg" alt="Twitter Icon" style="width: 50px; height: 50px;">
                            <span class="project-title">Project 2</span>
                        </div>
                        <div class="project-box" id="project3">
                        <img src="image/nn (3).jpg" alt="Twitter Icon" style="width: 50px; height: 50px;">
                            <span class="project-title">Project 3</span>
                        </div>
                    </div>  
                </div>
            </div>
        </div>
    </section>
</div>
<script src="portlast.js"></script>


</div>

</body>
</html>