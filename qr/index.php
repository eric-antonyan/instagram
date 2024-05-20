<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js" integrity="sha512-v2CJ7UaYy4JwqLDIrZUI/4hqeoQieOmAZNXBeQyjo21dadnwR+8ZaIJVT8EE2iyI61OV8e6M8PP2/4hpQINQ/g==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
  <title>Document</title>
</head>

<body>
  <div id="reader"></div>
  <form action="php/scan.php" method="post">
    <input name="barcode" id="barcode" type="text">
    <button>Check</button>
  </form>

  <script src="https://unpkg.com/html5-qrcode@2.3.8/html5-qrcode.min.js"></script>
  <table border="1" padding="3">
    <thead>
      <tr>
        <th>barcode</th>
        <th>product_name</th>
        <th>product_price</th>
      </tr>
    </thead>
    <tbody class="container">
    </tbody>
  </table>

  <script src="ajax.js"></script>
</body>

</html>