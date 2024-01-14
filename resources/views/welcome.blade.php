<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Dashboard</title>
  <style>
    body {
      font-family: Arial, sans-serif;
      margin: 0;
      padding: 0;
      background-color: #f4f4f4;
    }

    .dashboard-container {
      display: flex;
      justify-content: center;
      align-items: center;
      height: 100vh;
    }

    .dashboard-box {
      text-align: center;
      background-color: #fff;
      padding: 20px;
      border-radius: 8px;
      box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
    }

    .button-container {
      margin-top: 20px;
    }

    .button {
      display: inline-block;
      padding: 10px 20px;
      font-size: 16px;
      text-align: center;
      text-decoration: none;
      background-color: #3498db;
      color: #fff;
      border-radius: 5px;
      cursor: pointer;
    }

    .button:hover {
      background-color: #2980b9;
    }
  </style>
</head>
<body>

  <div class="dashboard-container">
    <div class="dashboard-box">
      <h1>Selamat datang di web Data Sekolah</h1>
      <div class="button-container">
        <a href="{{route('login')}}" class="button">Login</a>
        <a href="{{route('registration')}}" class="button">Register</a>
      </div>
    </div>
  </div>

</body>
</html>
