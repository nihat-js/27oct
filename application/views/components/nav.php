
<?php
 $BASE = function() {
    return "/27oct";
 } 
?>
<nav>
    <a href="<?php echo $BASE()."/"?>/"> Home </a>
    <a href="<?php echo $BASE()."/employee"?>/"> Employee </a>
    <a href="<?php echo $BASE()."/employee/add"?>/">  Add Employee </a>
</nav>