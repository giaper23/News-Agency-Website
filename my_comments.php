<?php

require_once 'header.php';

$email = $_SESSION["email"];

// Authentication
$query1 = "SELECT * FROM users WHERE email = '$email'";

// Result from DB
$result1 = mysqli_query($db, $query1)
or die(mysqli_error($db));

$row1 = mysqli_fetch_assoc($result1);

if ($email = $row1["email"]) {

echo '      <!--  ADMIN PANEL MAIN PAGE     -->
<!--PAGE TITLE-->
<div class="container-fluid">
  <div class="row">
      <div class="col page-place">
        <h6 class="page-title">User Panel</h6>
                  
      </div>
      
  </div>
</div>
<!--ADMIN PANEL PLACE-->

<div class="container">
<div class="row">
      <div class="col">
          <h3 style="padding-top:30px;">Comments</h3>
          <p style="margin-bottom:30px;">Hello '.$row1["first_name"].'! Here you can edit or delete your comments.</p>
      

          <!--TABLE OF RESULTS-->
          <div class="table-responsive">
          <table class="table table-sm table-hover" style="text-align: center;">
              <!--TITLE OF COLUMNS-->
              <thead class="thead-dark">
              <tr>
                  <th scope="col">Comment id</th>
                  <th scope="col">Text</th>
                  <th scope="col">Posted</th>
                  <th scope="col">Edited</th>
                  <th scope="col">User</th>
                  <th scope="col">Article id</th>
                  <th scope="col">Edit</th>
                  <th scope="col">Delete</th>
              </tr>
              </thead>
              <!--RESULTS ONS COLUMNS-->
              <tbody>';
              
                $query2 = "SELECT * FROM comments WHERE comment_email = '$email'";

                // Result from DB
                $result2 = mysqli_query($db, $query2)
                or die(mysqli_error($db));

                // Row count
                $count2 = mysqli_num_rows($result2);

                // If row found
                if($count2=1){

                    while ( $row2 = mysqli_fetch_assoc($result2) ) {

                    echo '<tr>
                    <th scope="row">'.$row2["comment_id"].'</th> <!--FIRST ROW OF RESULTS-->
                    <td>'.$row2["comment_text"].'</td>
                    <td>'.$row2["comment_post_time"].'</td>
                    <td>'.$row2["comment_edit_time"].'</td>
                    <td>'.$row2["comment_email"].'</td>
                    <td>'.$row2["article_id"].'</td>
                    <td> <a href="edit_comment.php?comment='.$row2["comment_id"].'" class="btn btn-primary btn-sm"><strong>Edit</strong></a></td>
                    <td> <a href="php/delete_comment.php?delete='.$row2["comment_id"].'" class="btn btn-danger btn-sm"><strong>X</strong></a></td>
                  </tr>';

                }

                }   else    {

                // Error
                echo "No comments found!";

                }

              echo '  
              </tbody>
          </table>
      </div>
      </div>
</div>
</div>';

              } else{

                echo "Unauthorized access!";

              }

require_once 'footer.php';

?>