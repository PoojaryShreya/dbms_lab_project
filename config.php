<?php
/*database configuration */
$SERVER='localhost';
$USERNAME='root';
$PASSWORD='';
$DB='test1';
/*connectiong to database*/
$conn = mysqli_connect($SERVER,$USERNAME,$PASSWORD,$DB);
if($conn==true)
{
    ?>
    <script>
    alert('connection successful');
    </script>
    <?php
}
else
{
    echo "connection unsuccessful";
}
?>
