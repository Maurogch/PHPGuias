<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Document</title>

  <style>
    body {
      position: relative;
      height: 100vh;
      background-color: skyblue;
      user-select: none;
      font-family: 'Fira Code';
    }
    form {
      position: absolute;
      top: 50%;
      left: 50%;
      transform: translate(-50%, -50%);
      text-align: center;
      background-color: white;
      padding: 2rem;
    }
    form > * {
      margin: 1rem 0;
    }
  </style>
</head>
<body>

  <form action="<?= FRONT_ROOT ?>controller/addFile" method="POST" enctype="multipart/form-data">
    <div>
      <label for="file">File: </label>
      <input id="file" type="file" name="file">
    </div>
    
    <input type="submit" value="Upload">
  </form>

</body>
</html>