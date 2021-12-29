<?php
$cht = "qr";
$chs = $_POST['size'];
$chl = $_POST['content'];
$root_url = "http://chart.googleapis.com/chart?cht=qr&chs=" . $chs . "&chl=" . $chl;
// $root_url = 'http://chart.googleapis.com/chart?cht=qr&chs=200x200&chl=http://enews.agu.edu.vn';
echo "<h3>Your QR code</h3>";
echo "<p>Image size: <em>$chs</em></p>";
echo "<p>Content: <em>$chl</em></p>";
echo "<p><img src='" . $root_url . "'></p>";
echo "<input type='button' value='Recreate' onclick='history.back()'>";
?>
<!-- "http://chart.googleapis.com/chart?cht=qr&chs=200x200&chl=http://enews.agu.edu.vn"/> -->
 