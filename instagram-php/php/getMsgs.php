<?php

require "connect.php";
require "functions.php";

session_start();

$incoming_id = $_POST['incoming_id'];
$outgoing_id = $_SESSION['userdata']['id'];

$msgs = q("SELECT * FROM `messages` WHERE (outgoing_id = $incoming_id AND incoming_id = $outgoing_id) OR (outgoing_id = $outgoing_id AND incoming_id = $incoming_id)");

$output = '';

$pattern1 = "/@([a-zA-Z0-9_]+)/";
$pattern2 = "/https:\/\/\S+/i";

while ($msg = mysqli_fetch_assoc($msgs)) {

  if ($msg['outgoing_id'] === $outgoing_id) {
    $output .= '<div class="outgoing message">
    <span>
      ' . preg_replace(
        [
          '/(https?:\/\/\S+)/',                
          '/@([a-zA-Z0-9_]+)/'                 
        ],
        [
          '<a class="bold" href="../redirect.php?url=$1">$1</a>',
          '<a class="bold" href="../$1">@$1</a>'
        ],
        $msg['msg_txt']
      ) . '
    </span>
  </div>';
  } else {
    $output .= '<div class="incoming message">
    <span>
      ' . preg_replace(
      [
        '/(https?:\/\/\S+)/',                
        '/@([a-zA-Z0-9_]+)/'                 
      ],
      [
        '<a href="$1">$1</a>',
        '<a href="../$1">@$1</a>'
      ],
      $msg['msg_txt']
    ) . '
    </span>
  </div>';
  }
}

echo $output;
