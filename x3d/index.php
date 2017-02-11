<?php
define("URL_BASE", "/x3d");
define("INC_BASE", "./inc");
define("DATA_DIR", "./data");

$filename = DATA_DIR . "/" . "standardbrain_decimate_trans_aopt.x3d";
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
<?php require(INC_BASE. "/header.php"); ?>
</head>
<body>
<?php require(INC_BASE. "/menu.php"); ?>

<div class="container">
    <div class="panel panel-primary">
        <div class="panel-heading">
            3D Viewer [<?php echo $filename ?>]
        </div>
        <div class="panel-body panel-x3d">
            <x3d id="x3d_element" showStat="true">
                <scene id="x3d_scene">
                    <viewpoint position="0.0 0.0 13.0" orientation="0.0 0.0 0.0"></viewpoint>
                    <Inline id="inline_SB" nameSpaceName="inline_SB" mapDEFToID="true" url="<?php echo $filename ?>"/>
                </scene>
            </x3d>
        </div>
        <div class="panel-footer">
            <div class="container-fluid">
                <div class="row">
                    <ul class="list-group">
                        <span>
                            <li class=" list-group-item col-6 col-sm-4 col-md-3 col-lg-2 col-xl-1">
                                Show Info
                                <div class="material-switch pull-right">
                                    <input type="checkbox" id="show_info" class="show_info" checked/>
                                    <label for="show_info" class="label-info"></label>
                                </div>
                            </li>
                        </span>
                        <span>
                            <li class=" list-group-item col-6 col-sm-4 col-md-3 col-lg-2 col-xl-1">
                                Coloring
                                <div class="material-switch pull-right">
                                    <input type="checkbox" id="cb_coloring" class="show_info"/>
                                    <label for="cb_coloring" class="label-info"></label>
                                </div>
                            </li>
                        </span>
                    </ul>
                </div>
            </div>
        </div>
        <div class="panel-footer">
            <div class="container-fluid">
                <div class="row">
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
        <div class="panel-footer">
            <div class="container-fluid">
                <div class="row">
                    <ul class="list-group">
                        <li class="list-group-item col-6">
                            <label>Standard Brain Transparency (experimental)</label>
                            <div id="transSlider" class="slider"/>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
        <div class="panel-footer" id="log">
        </div>
    </div>
</div>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
<script src="<?php echo URL_BASE; ?>/lib/jquery-ui.min.js"></script>
<script src="<?php echo URL_BASE; ?>/lib/bootstrap.min.js"></script>

<script type="text/javascript">
    $(document).ready(function () {
        $(".slider").slider({
            min: 0, max: 1, step: 0.1, slide: function(e, ui) {
                var newTrans = $("#transSlider").slider('option', 'value');
                $("#inline_SB__MA_Material").attr("transparency", newTrans);
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

    $('#show_info').click(function () {
        if ($(this).is(":checked")) {
            $('#x3dom-state-viewer').css('display', 'block');
        } else {
            $('#x3dom-state-viewer').css('display', 'none');
        }
    });

    $('#cb_coloring').click(function () {
        $('#inline_SB').remove();
        if ($(this).is(":checked")) {
            $('#x3d_scene').append('<Inline id="inline_SB" nameSpaceName="inline_SB" mapDEFToID="true" url="data/standardbrain_aopt.x3d" />');
        } else {
            $('#x3d_scene').append('<Inline id="inline_SB" nameSpaceName="inline_SB" mapDEFToID="true" url="data/standardbrain_decimate_trans_aopt.x3d" />');
        }
    });

</script>

</body>
</html>
