<?php
/**
 * Created by IntelliJ IDEA.
 * User: nebula
 * Date: 2017/03/03
 * Time: 14:42
 */
define("URL_BASE", "/x3d");
define("INC_BASE", "./inc");
define("DATA_DIR", "./data");
define("PAGE_NO", 5);
define("SHOW_LOG", "false");

$uri_prefix = "https://cns.neuroinf.jp/modules/xoonips/preview.php";
if (isset($_GET['name'])) {
    $filename = DATA_DIR . "/" . htmlentities($_GET['name'], ENT_QUOTES) . ".x3d";
} elseif (isset($_GET['file_id'])) {
    $filename = '?file_id=' . htmlspecialchars($_GET['file_id']);
} else {
    $filename = "/1330/7588/maeso20170301.x3d";
}

if (isset($_GET['fullscreen'])) {
    $fullscreen = True;
}
?>

<html>
<head><?php require(INC_BASE . "/header.php"); ?></head>
<body>

<?php if ($fullscreen) { ?>
    <x3d id="x3d_element" class="fullscreen" showStat="false" showLog="<?php echo SHOW_LOG; ?>">
        <scene id="x3d_scene">
            <navigationInfo id="head" headlight='true' type='"EXAMINE"'></navigationInfo>
            <viewpoint position="0.0 0.0 13.0" orientation="0.0 0.0 0.0"></viewpoint>
            <Inline nameSpaceName="INLINE" mapDEFToID="true"
                    url="<?php echo $uri_prefix . $filename ?>"></Inline>
        </scene>
    </x3d>

    <?php
} else {
    ?>

    <?php require(INC_BASE . "/menu.php"); ?>

    <div class="container">
        <div class="panel panel-primary">
            <div class="panel-heading">
                3D Viewer [<?php echo $filename ?>]

            </div>
            <div class="panel-body panel-x3d">
                <x3d id="x3d_element" showStat="true" showLog="<?php echo SHOW_LOG; ?>">
                    <scene id="x3d_scene">
                        <navigationInfo id="head" headlight='true' type='"EXAMINE"'></navigationInfo>
                        <viewpoint position="0.0 0.0 13.0" orientation="0.0 0.0 0.0"></viewpoint>
                        <Inline nameSpaceName="INLINE" mapDEFToID="true"
                                url="<?php echo $uri_prefix . $filename ?>"></Inline>
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
    <?php
}
?>

</body>
</html>
