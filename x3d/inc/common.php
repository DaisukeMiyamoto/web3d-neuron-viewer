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

        <script type="text/javascript">
            $('#show_info').click(function () {
                if ($(this).is(":checked")) {
                    $('#x3dom-state-viewer').css('display', 'block');
                } else {
                    $('#x3dom-state-viewer').css('display', 'none');
                }
            });
        </script>
EOT;
    return $str;
}

function draw_slice_mode_button()
{
    $str = <<<HTML
        <span>
            <li class=" list-group-item col-6 col-sm-4 col-md-3 col-lg-2 col-xl-1">
                Slice Mode
                <div class="material-switch pull-right">
                    <input type="checkbox" id="slice_mode" />
                    <label for="slice_mode" class="label-warning"></label>
                </div>
            </li>
        </span>
        <span>
            <li class="list-group-item col-12 col-sm-8 col-md-6 col-lg-4 col-xl-2">
                Slice No.
                <input id="ex1" data-slider-id='ex1Slider' type="text" data-slider-min="0" data-slider-max="0.95" data-slider-step="0.05" data-slider-value="0.5"/>
            </li>
        </span>


        <script type="text/javascript">
            $('#slice_mode').click(function () {
                if ($(this).is(":checked")) {
                    $('#volume_slice').attr('render', 'true');
                } else {
                    $('#volume_slice').attr('render', 'false');
                }
            });

            $('#ex1').slider({
                formatter: function(value) {
                    return 'Current value: ' + value;
                }
            });

            $('#ex1').change(function () {
                $('#mpr_volume_style').attr('positionline', $(this).val())
            });
        </script>
HTML;
    return $str;
}

function draw_volume_mode_button()
{
    $str = <<<HTML
        <span>
            <li class=" list-group-item col-6 col-sm-4 col-md-3 col-lg-2 col-xl-1">
                Volume Mode
                <div class="material-switch pull-right">
                    <input type="checkbox" id="volume_mode" checked/>
                    <label for="volume_mode" class="label-warning"></label>
                </div>
            </li>
        </span>

        <script type="text/javascript">
            $('#volume_mode').click(function () {
                if ($(this).is(":checked")) {
                    $('#volume').attr('render', 'true');
                } else {
                    $('#volume').attr('render', 'false');
                }
            });
        </script>
HTML;
    return $str;
}
