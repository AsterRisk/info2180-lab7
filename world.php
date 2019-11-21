<?php
$host = getenv('IP');
$username = 'AsterRisk';
$password = 'Latias_234';
$dbname = 'world';
$name = $_GET["country"];

$conn = new PDO("mysql:host=$host;dbname=$dbname;charset=utf8mb4", $username, $password);
$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if ($name)
{
  $q = "SELECT * FROM countries WHERE name LIKE '" . $name . "';";
  $results = $conn->query($q);
}
else
{
  $q = "SELECT * FROM countries;";
  $results = $conn->query($q);
}

if($results.size == 0)
  {?>
    <p>No such country found :(</p>
  <?php }
?>
<ul>
<?php foreach ($results as $row): ?>
  <li><?= $row['name'] . ' is ruled by ' . $row['head_of_state']; ?></li>
<?php endforeach; ?>
</ul>