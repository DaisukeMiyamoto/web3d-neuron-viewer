<?php
define("URL_BASE", "/x3d");
define("INC_BASE", "./inc");
define("DATA_DIR", "./data");
define("PAGE_NO", 3);
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
            <li><a href="./show_x3d.php?name=nagatama_labels_decimate1">Nagatama Labels Decimated1</a></li>
            <li><a href="./show_x3d.php?name=nagatama_labels_decimate2">Nagatama Labels Decimated2</a></li>
            <li><a href="./show_x3d.php?name=nagatama_labels_decimate1_aopt">Nagatama Labels Decimated1 AOPT</a></li>
            <li><a href="./show_x3d.php?name=nagatama_labels_decimate2_aopt">Nagatama Labels Decimated2 AOPT</a></li>
            <li role="separator" class="divider"></li>
            <li><a href="./show_x3d.php?name=nagatama_outline_decimate1">Nagatama Outline Decimated1</a></li>
            <li><a href="./show_x3d.php?name=nagatama_outline_decimate2">Nagatama Outline Decimated2</a></li>
            <li><a href="./show_x3d.php?name=nagatama_outline_decimate1_aopt">Nagatama Outline Decimated1 AOPT</a></li>
            <li><a href="./show_x3d.php?name=nagatama_outline_decimate2_aopt">Nagatama Outline Decimated2 AOPT</a></li>
            <li role="separator" class="divider"></li>
            <li><a href="./show_x3d.php?name=suziguro_labels_decimate1">suziguro Labels Decimated1</a></li>
            <li><a href="./show_x3d.php?name=suziguro_labels_decimate2">suziguro Labels Decimated2</a></li>
            <li><a href="./show_x3d.php?name=suziguro_labels_decimate1_aopt">suziguro Labels Decimated1 AOPT</a></li>
            <li><a href="./show_x3d.php?name=suziguro_labels_decimate2_aopt">suziguro Labels Decimated2 AOPT</a></li>
            <li role="separator" class="divider"></li>
            <li><a href="./show_x3d.php?name=suziguro_outline_decimate1">suziguro Outline Decimated1</a></li>
            <li><a href="./show_x3d.php?name=suziguro_outline_decimate2">suziguro Outline Decimated2</a></li>
            <li><a href="./show_x3d.php?name=suziguro_outline_decimate1_aopt">suziguro Outline Decimated1 AOPT</a></li>
            <li><a href="./show_x3d.php?name=suziguro_outline_decimate2_aopt">suziguro Outline Decimated2 AOPT</a></li>
            <li role="separator" class="divider"></li>
            <li><a href="./show_x3d.php?name=yamamayuga_labels_decimate1">yamamayuga Labels Decimated1</a></li>
            <li><a href="./show_x3d.php?name=yamamayuga_labels_decimate2">yamamayuga Labels Decimated2</a></li>
            <li><a href="./show_x3d.php?name=yamamayuga_labels_decimate1_aopt">yamamayuga Labels Decimated1 AOPT</a></li>
            <li><a href="./show_x3d.php?name=yamamayuga_labels_decimate2_aopt">yamamayuga Labels Decimated2 AOPT</a></li>
            <li role="separator" class="divider"></li>
            <li><a href="./show_x3d.php?name=yamamayuga_outline_decimate1">yamamayuga Outline Decimated1</a></li>
            <li><a href="./show_x3d.php?name=yamamayuga_outline_decimate2">yamamayuga Outline Decimated2</a></li>
            <li><a href="./show_x3d.php?name=yamamayuga_outline_decimate1_aopt">yamamayuga Outline Decimated1 AOPT</a></li>
            <li><a href="./show_x3d.php?name=yamamayuga_outline_decimate2_aopt">yamamayuga Outline Decimated2 AOPT</a></li>
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
