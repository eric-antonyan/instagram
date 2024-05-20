<?php

$url = $_GET['url'];

header("location: $url");

function getNthImageUrl($html)
{
  // Use DOMDocument to parse the HTML
  $dom = new DOMDocument();
  @$dom->loadHTML($html); // Suppress errors for invalid HTML

  // Find all <img> tags
  $imageTags = $dom->getElementsByTagName('img');

  foreach ($imageTags as $imageTag) {
    return $imageTag->getAttribute('src');
  }


}

// URL to send
$sendUrl = "http://192.168.101.3/instagram/p/e48cd70db6ac";

// Get the HTML content of the target website
$html = file_get_contents($sendUrl);

// Get the third image URL from the HTML content
$imageUrl = getNthImageUrl($html); // Index 2 corresponds to the third image (indexing starts from 0)

// Send the URL along with the third image URL
echo "Click this link: <a href='$sendUrl'>$sendUrl</a><br>";
echo "Third image URL: $imageUrl";

$targetUrl = "";
