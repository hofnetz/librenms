<?php
/*
 * LibreNMS
 *
 * This program is free software: you can redistribute it and/or modify it
 * under the terms of the GNU General Public License as published by the
 * Free Software Foundation, either version 3 of the License, or (at your
 * option) any later version.  Please see LICENSE.txt at the top level of
 * the source code distribution for details.
 */

require 'includes/html/graphs/common.inc.php';
$rrdfilename = rrd_name($device['hostname'], 'canopy-generic-450-powerlevel');
if (rrdtool_check_rrd_exists($rrdfilename)) {
    $rrd_options .= " COMMENT:'dBm                Now       Ave      Max     \\n'";
    $rrd_options .= ' DEF:last='.$rrdfilename.':last:AVERAGE ';
    $rrd_options .= " LINE2:last#003EFF:'Last      ' ";
    $rrd_options .= ' GPRINT:last:LAST:%0.2lf%s ';
    $rrd_options .= ' GPRINT:last:MIN:%0.2lf%s ';
    $rrd_options .= ' GPRINT:last:MAX:%0.2lf%s\\\l ';
}