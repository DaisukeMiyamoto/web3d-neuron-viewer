<?php
define("URL_BASE", "/x3d");
define("INC_BASE", "./inc");
define("DATA_DIR", "./data");

if (isset($_GET['name'])) {
    $filename = DATA_DIR . "/" . htmlentities($_GET['name'], ENT_QUOTES) . ".x3d";
} else {
    $filename = DATA_DIR . "/" . "standardbrain_aopt.x3d";
}
?>
<html>
<head><?php require(INC_BASE . "/header.php"); ?></head>
<body>
<?php require(INC_BASE . "/menu.php"); ?>

<div class="container">
    <div class="panel panel-primary">
        <div class="panel-heading">
            3D Viewer [<?php echo $filename ?>]
        </div>
        <div class="panel-body panel-x3d">
            <x3d id="x3d_element" showStat="true" showLog="true"
                 xmlns="http://www.web3d.org/specifications/x3d-namespace">
                <scene id="x3d_scene">
                    <viewpoint position="0.0 0.0 300.0" zNear="0.01"
                               zFar="10000"></viewpoint>
                    <Transform>
<!--                        <VolumeData id='volume' dimensions='256 256 88'>-->
<!--                            <ImageTextureAtlas containerField='voxels' numberOfSlices='88' slicesOverX='11'-->
<!--                                               slicesOverY='8' url='./volume_data/1089_050622_4f4a_sn_stitch.png'>-->
<!--                            </ImageTextureAtlas>-->
<!--                            <!--                            <MPRVolumeStyle id='style' positionLine='0.5'></MPRVolumeStyle>-->-->
<!--                            <OpacityMapVolumeStyle lightFactor='1.4' opacityFactor='45.0'></OpacityMapVolumeStyle>-->
<!--                        </VolumeData>-->
                        <VolumeData id='volume' dimensions='256 256 77'>
                            <ImageTextureAtlas containerField='voxels' numberOfSlices='77' slicesOverX='11'
                                               slicesOverY='7' url='./volume_data/sb_stitch.png'>
                            </ImageTextureAtlas>
                            <MPRVolumeStyle id='volume_style' enable='true' positionLine='0.5'></MPRVolumeStyle>
<!--                            <OpacityMapVolumeStyle id='volume_style' lightFactor='1.1' opacityFactor='10.0'></OpacityMapVolumeStyle>-->
                        </VolumeData>

                    </Transform>
                    <Inline nameSpaceName="cube" mapDEFToID="true" url="data/cube.x3d"/>
                </scene>
            </x3d>
        </div>
        <div class="panel-footer">
            <div class="container-fluid">
                <div class="row">
                    <ul class="list-group">
                        <?php echo draw_showinfo_button(); ?>
                        <?php echo draw_slicemode_button(); ?>
                    </ul>
                </div>
            </div>
        </div>
        <div class="panel-footer">
            <div class="container-fluid">
                <div class="dropdown">
                    <button class="btn btn-default dropdown-toggle" type="button" id="dropdownMenu1"
                            data-toggle="dropdown"
                            aria-haspopup="true" aria-expanded="true">
                        Choose Model
                        <span class="caret"></span>
                    </button>
                    <ul class="dropdown-menu" aria-labelledby="dropdownMenu1">
                        <li><a href="./show_x3d.php?name=standardbrain_decimate">Standard Brain Decimated</a></li>
                        <li role="separator" class="divider"></li>
                        <li><a href="./show_x3d.php?name=1080_regist_aopt">Neuron 1080</a></li>
                    </ul>
                </div>
            </div>
        </div>
        <div class="panel-footer" id="log">
        </div>
    </div>
</div>


<script type="text/javascript">
    $('#slice_mode').click(function () {
        $('#volume_style').remove();
        if ($(this).is(":checked")) {
            $('#volume_style').attr()
//            $('#volume').append("<MPRVolumeStyle id='volume_style' enable='true' positionLine='0.5'></MPRVolumeStyle>")
        } else {
//            $('#volume').append("<OpacityMapVolumeStyle id='volume_style' enable='true' lightFactor='1.1' opacityFactor='10.0'></OpacityMapVolumeStyle>")
        }
    });

</script>
</body>
</html>
