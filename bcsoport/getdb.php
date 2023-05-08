<?php
function getdb()
{
    $link=mysqli_connect("localhost","root","")
        or die ("Csatlakozási hiba".mysqli_error($link));
    mysqli_select_db($link,"b_csoport");
    return $link;

}
?>
