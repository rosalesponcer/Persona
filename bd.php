<?php
$con = mysqli_connect('localhost', 'root', '', 'crud');
$query = "select *from task";
$result = mysqli_query($con, $query);
