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
            <a class="navbar-brand" href="<?php echo URL_BASE ?>">CNS-PF Viewer</a>
        </div>
        <div id="navbar" class="collapse navbar-collapse">
            <ul class="nav navbar-nav">
                <li <?php if(PAGE_NO==0) echo "class=\"active\"" ?>><a href="<?php echo URL_BASE ?>/">Home</a></li>
                <li <?php if(PAGE_NO==1) echo "class=\"active\"" ?>><a href="<?php echo URL_BASE ?>/standardbrain.php">Standard Brain</a></li>
                <li <?php if(PAGE_NO==2) echo "class=\"active\"" ?>><a href="<?php echo URL_BASE ?>/invbrain.php">Invertebrate Brains</a></li>
                <li <?php if(PAGE_NO==3) echo "class=\"active\"" ?>><a href="<?php echo URL_BASE ?>/show_x3d.php">x3d files</a></li>
                <li <?php if(PAGE_NO==4) echo "class=\"active\"" ?>><a href="<?php echo URL_BASE ?>/show_volume.php">Volume files</a></li>
                <li <?php if(PAGE_NO==5) echo "class=\"active\"" ?>><a href="<?php echo URL_BASE ?>/show_cns.php">Database</a></li>
            </ul>
        </div><!--/.nav-collapse -->
    </div>
</nav>

