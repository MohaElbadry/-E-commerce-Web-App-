<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous" />
    <link rel="stylesheet" href="../styles.css" />
    <title>CSS GRID DASHBOARD</title>
</head>

<body id="body">
    <div class="container">
        <!-- nav bar -->
        <?php
        include('template/navbar.php')
        ?>
        <!-- end of navbar -->

        <main>
            <div class="main__container">
                <!-- MAIN TITLE STARTS HERE -->
                <div class="main__title">
                    <img src="assets/hello.svg" alt="" />
                    <div class="main__greeting">
                        <h1>titre</h1>
                        <p>descrription</p>
                    </div>
                </div>
                <!-- MAIN TITLE ENDS HERE -->
                <!-- MAIN STARTS HERE -->




















                <!-- MAIN ENDS HERE -->
            </div>
        </main>

        <!-- sidebar -->
        <?php
        include('template/sidebar.php');
        ?>
        <!-- end of sidebar -->

    </div>
    <script src="https://cdn.jsdelivr.net/npm/apexcharts"></script>
    <script src="script.js"></script>
</body>

</html>