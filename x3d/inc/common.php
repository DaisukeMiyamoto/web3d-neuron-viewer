<?php
/**
 * Created by IntelliJ IDEA.
 * User: nebula
 * Date: 2017/02/14
 * Time: 2:45
 */
function draw_showinfo_button()
{
    $str = <<<EOT
                        <span>
                            <li class=" list-group-item col-6 col-sm-4 col-md-3 col-lg-2 col-xl-1">
                                Show Info
                                <div class="material-switch pull-right">
                                    <input type="checkbox" id="show_info" class="show_info" checked/>
                                    <label for="show_info" class="label-info"></label>
                                </div>
                            </li>
                        </span>
EOT;
    return $str;
}

function draw_slicemode_button()
{
    $str = <<<EOT
                        <span>
                            <li class=" list-group-item col-6 col-sm-4 col-md-3 col-lg-2 col-xl-1">
                                Slice Mode
                                <div class="material-switch pull-right">
                                    <input type="checkbox" id="slice_mode" />
                                    <label for="slice_mode" class="label-info"></label>
                                </div>
                            </li>
                        </span>
EOT;
    return $str;
}