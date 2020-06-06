<?php

// ------ DotEnv Import ----------------------------
require '../vendor/autoload.php';

// Note the different path when not in root folder
$dotenv = \Dotenv\Dotenv::createImmutable(__DIR__ . '/../'); 
$dotenv->load();
//--------------------------------------------------

require_once 'db_connect.php';
require_once 'sanitize.php';

$output = ''; // Make output empty

if(isset($_POST["query"]))
{
 $search = mysqli_real_escape_string($db, test_input($_POST["query"]));
 $query = "
  SELECT * FROM articles
  WHERE article_title LIKE '%$search%' LIMIT 7
 ";
}
else
{
  // This query returns empty!! Had trouble returning empty until I found this!
 $query = "
  SELECT 1 FROM dual WHERE false
 ";
}

$result = mysqli_query($db, $query); // The results from the db
if(mysqli_num_rows($result) > 0) // If the result brings back rows do the following
{
    while($row = mysqli_fetch_array($result))
    {

        $output .= '
        <a href=article.php?article='.$row["article_id"].'> <!-- Almost gave up before finding this -->
        <li class="list-group-item col-12 search-result-li">
             <img src="'.$row["article_image"].'" style="height: 30px; width:30px;"> &nbsp
             '.$row["article_title"].'
        </li>
     </a>';

    }

    echo $output;
}
?>