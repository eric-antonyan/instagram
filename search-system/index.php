<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js" integrity="sha512-v2CJ7UaYy4JwqLDIrZUI/4hqeoQieOmAZNXBeQyjo21dadnwR+8ZaIJVT8EE2iyI61OV8e6M8PP2/4hpQINQ/g==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
  <title>Document</title>
</head>

<body>
  <div class="serach-bar d-flex gap-2 mt-3">
    <input class="form-control rounded-right" name="input" id="search_text" type="text">
    <button class="btn btn-primary">Search</button>
  </div>
  <table class="table w-75" padding="0" >
    <tr>
      <th>#</th>
      <th>pid</th>
      <th>price</th>
      <th>Description</th>
      <th>image</th>
      <th>order</th>
    </tr>
    <style>
      table, th, td {
        padding: 5px;
      }

      body {
        display: flex;
        flex-direction: column;
        justify-content: center;
        align-items: center;
        gap: 10px;
      }
    </style>
    <tbody id="search-catalog"></tbody>
  </table>

  <script src="js/getdata.js"></script>
</body>

</html>