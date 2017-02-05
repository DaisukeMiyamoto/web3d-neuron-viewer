<?php
if (isset($_GET['name'])) {
    $filename = './data/' . htmlentities($_GET['name'], ENT_QUOTES) . '.x3d';
} else {
    $filename = './data/standardbrain_decimate.x3d';
}

$neuron_list = array(
    '0004',
    '0005',
    '0008',
    '0009',
    '0012',
    '0017',
    '0019',
    '0021',
    '0655',
    '0661',
    '0663',
    '0664',
    '0965',
    '0966',
    '0967',
    '0969',
    '0970',
    '0973',
    '0984',
    '0986',
    '0988',
    '0993',
    '1009',
    '1020',
    '1068',
    '1080',
);


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
    <link rel='stylesheet' type='text/css' href='./switch.css'/>
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

        #log {
            background-color: #000;
            color: #fff;
            height: 60px;
            overflow-y: scroll;
            display: none;
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
            <li><a href="./?name=0004_regist_aopt">Neuron 0004</a></li>
            <li><a href="./?name=1080_regist_aopt">Neuron 1080</a></li>
        </ul>
    </div>
</div>

<div class="container">
    <div class="panel panel-primary">
        <div class="panel-heading">
            3D Viewer <?php echo $filename ?>
        </div>
        <div class="panel-body panel-x3d">
<!--            <x3d id="x3d_element" showStat="true" showLog="true">-->
            <x3d id="x3d_element" showStat="true">
                <scene id="x3d_scene">
                    <viewpoint position="0.0 0.0 13.0" orientation="0.0 0.0 0.0"></viewpoint>
                    <Inline nameSpaceName="inline_model" mapDEFToID="true" url="<?php echo $filename ?>"/>
                    <Background skyColor="0.1 0.1 0.1"/>
                </scene>
            </x3d>
        </div>
        <div class="panel-footer">
            <div class="container-fluid">
                <div class="row">
<!--                    <div class="material-switch pull-right">-->
<!--                        <input id="someSwitchOptionDefault" name="someSwitchOption001" type="checkbox"/>-->
<!--                        <label for="someSwitchOptionDefault" class="label-default"></label>-->
<!--                    </div>-->
                    <ul class="list-group">
                        <?php
                        foreach($neuron_list as $id => $target) {
                            echo '<span><li class=" list-group-item col-6 col-sm-4 col-md-3 col-lg-2 col-xl-1">' . $target;
                            echo '<div class="material-switch pull-right">';
                            echo '<input type="checkbox" id="' . $target . '" class="cb_inline"/>';
                            echo '<label for="' . $target . '" class="label-primary"></label>';
                            echo "</div>";
                            echo '</li></span>';
                        }
                        ?>
                    </ul>
                </div>
            </div>
        </div>
        <div class="panel-footer" id="log">
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

    $('.cb_inline').click(function () {
        if ($(this).is(":checked")) {
            $('#log').append('Append: ' + this.id + '<br />\n');
            $('#x3d_scene').append('<Inline id="inline_' + this.id + '" nameSpaceName="' + this.id + '" mapDEFToID="true" url="data/' + this.id + '_regist_aopt.x3d" />');
        } else {
            $('#log').append('Remove: ' + this.id + '<br />\n');
            $('#inline_' + this.id).remove();
        }
    });


</script>

</body>
</html>
