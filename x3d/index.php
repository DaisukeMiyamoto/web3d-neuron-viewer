<?php
define("URL_BASE", "/x3d");
define("INC_BASE", "./inc");
define("DATA_DIR", "./data");
define("PAGE_NO", 0);
?>

<html>
<head>
    <?php require(INC_BASE . "/header.php"); ?>
</head>
<body>
<?php require(INC_BASE . "/menu.php"); ?>

<div class="container">
    <div class="jumbotron">
        <h1 class="display-3">Welcome to CNS-PF Viewer</h1>
        <p class="lead">3D Viewer for neurons and brains based on x3dom.</p>
        <a class="btn btn-info" href="https://github.com/DaisukeMiyamoto/test_x3dom" role="button">Get source in GitHub
            »</a>
    </div>
</div>

<div class="container">
    <a class="btn btn-primary btn-lg btn-block" href="./standardbrain.php">Silkmoth Standard Brain Viewer</a>
    <a class="btn btn-primary btn-lg btn-block" href="./show_x3d.php">General x3d File Viewer</a>
    <a class="btn btn-primary btn-lg btn-block" href="./show_volume.php">Volume and Slice Image Viewer</a>
</div>

</body>
</html>
