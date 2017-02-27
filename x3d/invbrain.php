<?php
/**
 * Created by IntelliJ IDEA.
 * User: nebula
 * Date: 2017/02/26
 * Time: 23:47
 */

define("URL_BASE", "/x3d");
define("INC_BASE", "./inc");
define("DATA_DIR", "./data");
define("PAGE_NO", 2);
define("SHOW_LOG", "false");

if (isset($_GET['name'])) {
    $filename = DATA_DIR . "/" . htmlentities($_GET['name'], ENT_QUOTES) . ".x3d";
} else {
    $filename = DATA_DIR . "/" . "standardbrain_aopt.x3d";
}
?>

<html>
<head><?php require(INC_BASE. "/header.php"); ?></head>
<body>
<?php require(INC_BASE. "/menu.php"); ?>

<div class="container">
    <div class="dropdown">
        <button class="btn btn-info dropdown-toggle" type="button" id="dropdownMenu1" data-toggle="dropdown"
                aria-haspopup="true" aria-expanded="true">
            Choose Model
            <span class="caret"></span>
        </button>
        <ul class="dropdown-menu" aria-labelledby="dropdownMenu1">
            <li><a href="./show_x3d.php?name=standardbrain_decimate">Standard Brain Decimated</a></li>
            <li><a href="./show_x3d.php?name=standardbrain_decimate_trans">Standard Brain Transparent</a></li>
            <li><a href="./show_x3d.php?name=standardbrain_full">Standard Brain Full</a></li>
            <li><a href="./show_x3d.php?name=standardbrain_aopt">Standard Brain AOPT</a></li>
            <li role="separator" class="divider"></li>
            <li><a href="./show_x3d.php?name=0004_regist_aopt">Neuron 0004</a></li>
            <li><a href="./show_x3d.php?name=1080_regist_aopt">Neuron 1080</a></li>
            <li role="separator" class="divider"></li>
            <li><a href="./show_x3d.php?name=nagatama_decimate2_20170221">Nagatama Decimated</a></li>
            <li><a href="./show_x3d.php?name=nagatama_decimate2_aopt">Nagatama Decimated AOPT</a></li>
            <li><a href="./show_x3d.php?name=suziguro_decimate">Suziguro Decimated1</a></li>
            <li><a href="./show_x3d.php?name=suziguro_decimate2">Suziguro Decimated2</a></li>
            <li><a href="./show_x3d.php?name=yamamayu_decimate">Yamamayu Decimated1</a></li>
            <li><a href="./show_x3d.php?name=yamamayu_decimate2">Yamamayu Decimated2</a></li>
            <li><a href="./show_x3d.php?name=yamamayu_decimate2_flat">Yamamayu Decimated2 Flat</a></li>
        </ul>
    </div>
    <div class="panel panel-primary">
        <div class="panel-heading">
            3D Viewer [<?php echo $filename ?>]

        </div>
        <div class="panel-body panel-x3d">
            <x3d id="x3d_element" showStat="true" showLog="<?php echo SHOW_LOG; ?>">
                <scene id="x3d_scene">
                    <navigationInfo id="head" headlight='true' type='"EXAMINE"'>  </navigationInfo>
                    <viewpoint position="0.0 0.0 13.0" orientation="0.0 0.0 0.0"></viewpoint>
                    <Inline nameSpaceName="SB" mapDEFToID="true" url="<?php echo $filename ?>"></Inline>
                </scene>
            </x3d>
        </div>
        <div class="panel-footer">
            <div class="container-fluid">
                <div class="row">
                    <ul class="list-group">
                        <?php echo draw_showinfo_button(); ?>
                        <?php echo draw_headlight_button(); ?>
                    </ul>
                </div>
            </div>
        </div>
        <div class="panel-footer" id="log">
        </div>
    </div>
</div>

</body>
</html>
