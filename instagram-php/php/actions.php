
<?php 

require_once 'connect.php';

session_start();

if (isset($_GET['fetch-users'])) {
  $sql = "SELECT * FROM `users` ORDER BY `id`";
  $res = mysqli_query($connection, $sql);
  $json = '';
  $data = array();

  while($users = mysqli_fetch_assoc($res)) {
    $data[] = $users;
  }

  header('Content-Type: application/json');
  echo json_encode($data);
}

if (isset($_GET['login'])) {
  $username = $_POST['username'];
  $password = $_POST['password'];
  $sql = "SELECT * FROM `users` WHERE username = '$username' AND password = '$password'";
  $res = mysqli_query($connection, $sql);
  $user = mysqli_fetch_assoc($res);
  $_SESSION['userdata'] = [
    "id" => $user['id'],
    "uid" => $user['uid'],
    "username" => $user['username'],
    "password" => $user['password'],
    "bio" => $user['bio'],
    "full_name" => $user['full_name'],
    "picture" => $user['picture'],
    "status" => $user['status']
  ];
}

if (isset($_GET['get-followed'])) {
  $output = "";
  $user_id = $_SESSION['userdata']['id'];
  $sql = "SELECT users.id, users.username, users.pic
  FROM users
  WHERE users.id IN (
      SELECT followers.follower_id
      FROM followers
      WHERE followers.follower_id != 8
  )";

  $res = mysqli_query($connection, $sql);
  if (mysqli_num_rows($res) > 0) {
    while ($row = mysqli_fetch_assoc($res)) {
      $output .= '
      <div class="user">
            <img src="users/'.$row['pic'].'" alt="">
            <div class="user__details">
              <h4>@'.$row['username'].'</h4>
              <button onclick="follow('.$row['user_id'].');" id="button'.$row['id'].'" class="follow__user-btn pointer">Follow</button>
            </div>
          </div>';
    }
    echo $output;
  }
}

if (isset($_GET['flw'])) {
  $follower_id = $_SESSION['userdata']['id'];
  $followed_id = $_POST['followed_id'];
  $_insert = "INSERT INTO `followers` (`follower_id`, `followed_id`) VALUES ($follower_id, $followed_id);";
  $res = mysqli_query($connection, $_insert);

  if ($res == true) {
    echo "Followed";
  } else {
    echo "Try again";
  }
}