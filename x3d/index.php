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
    <title>x3d neuron viewer</title>
    <script type='text/javascript' src='https://www.x3dom.org/download/x3dom.js'></script>
    <link rel='stylesheet' type='text/css' href='https://www.x3dom.org/download/x3dom.css'/>
    <!-- Bootstrap -->
    <link href="/tools/css/bootstrap.min.css" rel="stylesheet">
    <link href="/css/jquery-ui.css" rel="stylesheet">
    <style>
        body {
            padding-top: 70px;
        }

        x3d {
            border: none;
            width: 100%;
            height: 70%;
        }

        .panel-x3d {
            background-color: #181818;
        }

        .dropdown {
            margin-bottom: 20px;
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
    <div class="dropdown">
        <button class="btn btn-default dropdown-toggle" type="button" id="dropdownMenu1" data-toggle="dropdown"
                aria-haspopup="true" aria-expanded="true">
            Choose Model
            <span class="caret"></span>
        </button>
        <ul class="dropdown-menu" aria-labelledby="dropdownMenu1">
            <li><a href="./?name=standardbrain_decimate">Standard Brain Decimated</a></li>
            <li><a href="./?name=standardbrain_decimate_trans">Standard Brain Transparent</a></li>
            <li><a href="./?name=standardbrain_full">Standard Brain Full</a></li>
            <li><a href="./?name=standardbrain_aopt">Standard Brain AOPT</a></li>
            <li role="separator" class="divider"></li>
            <li><a href="./?name=0005">Neuron 0005</a></li>
            <li><a href="./?name=0696">Neuron 0696</a></li>
        </ul>
    </div>
</div>

<div class="container">
    <div class="panel panel-primary">
        <div class="panel-heading">
            3D Viewer <?php echo $filename ?>
        </div>
        <div class="panel-body panel-x3d">
            <x3d id="the_element" showStat="true" showLog="true">
                <scene>
                    <viewpoint position="0.0 0.0 13.0" orientation="0.0 0.0 0.0"></viewpoint>
                    <Inline nameSpaceName="inline_model" mapDEFToID="true" url="<?php echo $filename ?>"/>
	            <!--
                    <Inline nameSpaceName="inline_model3" mapDEFToID="true" url="data/mb_aopt.x3d"/>
                    <Inline nameSpaceName="inline_model" mapDEFToID="true" url="data/al_aopt.x3d"/>
                    <Inline nameSpaceName="inline_model2" mapDEFToID="true" url="data/standardbrain_aopt.x3d"/>
-->
                    <Background skyColor="0.1 0.1 0.1"/>
                </scene>
            </x3d>
        </div>
        <div class="panel-footer">
            <div class="input-group">
                <span class="input-group-addon">
                    <input type="checkbox"/> Standard Brain
                </span>
                <div id="sliderContainer">
                    <ul>
                        <li><label>Red</label>
                            <div id="redSlider" class="slider"/>
                        </li>
                        <li><label>Green</label>
                            <div id="greenSlider" class="slider"/>
                        </li>
                        <li><label>Blue</label>
                            <div id="blueSlider" class="slider"/>
                        </li>
                        <li><label>Alpha</label>
                            <div id="alphaSlider" class="slider"/>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
<script src="/js/jquery-ui.min.js"></script>
<!-- Include all compiled plugins (below), or include individual files as needed -->
<script src="/tools/js/bootstrap.min.js"></script>

<script type="text/javascript">
    $(document).ready(function () {

        // Create the sliders
        $(".slider").slider({
            min: 0, max: 1, step: 0.01, slide: function (e, ui) {
                var newTrans = $("#alphaSlider").slider('option', 'value')
                $("Material", "#inline_model__StandardBrain_ifs_TRANSFORM").attr("transparency", newTrans);
            }
        });

    });
</script>

</body>
</html>
