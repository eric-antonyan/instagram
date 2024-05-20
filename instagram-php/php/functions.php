<?php

require_once "connect.php";

function showPage($page)
{
  include 'pages/' . $page . '.php';
}

function getUserByUserame($username)
{
  global $connection;
  $sql = "SELECT * FROM `users` WHERE username = '$username'";
  $res = mysqli_query($connection, $sql);

  return mysqli_fetch_assoc($res);
}

function getUser($id)
{
  global $connection;
  $sql = "SELECT * FROM `users` WHERE id = $id";
  $res = mysqli_query($connection, $sql);

  return mysqli_fetch_assoc($res);
}

function getUserByUid($uid)
{
  global $connection;
  $sql = "SELECT * FROM `users` WHERE uid = '$uid'";
  $res = mysqli_query($connection, $sql);

  return mysqli_fetch_assoc($res);
}

function q($sql)
{
  global $connection;
  $res = mysqli_query($connection, $sql);
  return $res;
}

function search($query)
{
  global $connection;
  
}

function checkUsername($uname)
{
  global $connecton;
}

function showTime($date) {
  $timestamp = strtotime($date);	
  
  $strTime = array("second", "minute", "hour", "day", "month", "year");
  $length = array("60","60","24","30","12","10");

  $currentTime = time();
  if($currentTime >= $timestamp) {
       $diff     = time()- $timestamp;
       for($i = 0; $diff >= $length[$i] && $i < count($length)-1; $i++) {
       $diff = $diff / $length[$i];
       }

       $diff = round($diff);
       return $diff . " " . $strTime[$i] . " ago ";
  }
}

function setFollowNotification($username) {
  q("INSERT INTO `notifications` (`from`, `to`, `text`) VALUES ()");
}

function isLiked($pid, $uid) {
  $res = q("SELECT * FROM `likes` WHERE `pid` = $pid AND `uid` = $uid");

  if (mysqli_num_rows($res) < 0) {
    return "true";
  } else {
    return "false";
  }
}

function getLikes($id) {
  $res = q("SELECT COUNT(*) AS likes_count FROM `likes` WHERE pid = $id");
  return mysqli_fetch_assoc($res)['likes_count'];
}

function pidToId($pid) {
  $res = q("SELECT * FROM `posts` WHERE pid = '$pid'");
  return mysqli_fetch_assoc($res)['id'];
}