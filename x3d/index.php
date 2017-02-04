<?php
if (isset($_GET['name'])) {
    $filename = './data/' . htmlentities($_GET['name'], ENT_QUOTES) . '.x3d';
} else {
    $filename = './data/standardbrain_decimate.x3d';
}
?>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Bootstrap -->
    <link href="/tools/css/bootstrap.min.css" rel="stylesheet">

    <title>x3d neuron viewer</title>
    <script type='text/javascript' src='https://www.x3dom.org/download/x3dom.js'></script>
    <link rel='stylesheet' type='text/css' href='https://www.x3dom.org/download/x3dom.css'/>
    <style>
        body {
            padding-top: 70px;
        }

        x3d {
            border: 2px solid darkorange;
            #background: #000;
            width: 90%;
            height: 80%;
        }

        body {
        }

        .starter-template {
            padding: 40px 15px;
            text-align: center;
        }

    </style>
</head>
<body>
<nav class="navbar navbar-inverse navbar-fixed-top">
    <div class="container">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar"
                    aria-expanded="false" aria-controls="navbar">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="#">Kanzaki-Takahashi Lab.</a>
        </div>
        <div id="navbar" class="collapse navbar-collapse">
            <ul class="nav navbar-nav">
                <li><a href="/tools">Home</a></li>
                <li class="active"><a href="/tools">3D Viewer</a></li>
                <li><a href="/tools/place.php">Place</a></li>
                <li><a href="/tools/matlab.php">Matlab</a></li>
            </ul>
        </div><!--/.nav-collapse -->
    </div>
</nav>

<div class="container">
    <h1>3D Viewer</h1>
    <div class="dropdown">
        <button class="btn btn-default dropdown-toggle" type="button" id="dropdownMenu1" data-toggle="dropdown"
                aria-haspopup="true" aria-expanded="true">
            Choose Model
            <span class="caret"></span>
        </button>
        <ul class="dropdown-menu" aria-labelledby="dropdownMenu1">
            <li><a href="./?name=standardbrain_decimate">Standard Brain Decimated</a></li>
            <li><a href="./?name=standardbrain_full">Standard Brain Full</a></li>
            <li role="separator" class="divider"></li>
            <li><a href="./?name=Deer">Deer</a></li>
        </ul>
    </div>
</div>

<div class="container">
    <x3d id="the_element" showStat="true">
        <scene>
            <viewpoint position="0.0 0.0 10.0" orientation="0.0 0.0 0.0"></viewpoint>
            <Inline nameSpaceName="Deer" mapDEFToID="true" onclick='redNose();' url="<?php echo $filename ?>"/>
            <Background skyColor="0.2 0.2 0.2 "/>

        </scene>
    </x3d>
</div>

<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
<!-- Include all compiled plugins (below), or include individual files as needed -->
<script src="/tools/js/bootstrap.min.js"></script>
</body>
</html>
