<?php
/**
 * Created by IntelliJ IDEA.
 * User: nebula
 * Date: 17/02/09
 * Time: 16:08
 */
?>

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
            <a class="navbar-brand" href="#">CNS-PF 3D Viewer</a>
        </div>
        <div id="navbar" class="collapse navbar-collapse">
            <ul class="nav navbar-nav">
                <li><a href="<?php echo URL_BASE ?>/">Home</a></li>
                <li class="active"><a href="<?php echo URL_BASE ?>/">Standard Brain</a></li>
                <li><a href="<?php echo URL_BASE ?>/show_x3d.php">x3d files</a></li>
                <li><a href="<?php echo URL_BASE ?>/show_volume.php">Volume files</a></li>
            </ul>
        </div><!--/.nav-collapse -->
    </div>
</nav>

