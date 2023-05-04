
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Weather App</title>
  <link rel="stylesheet" href="AshokDhungana_2329448.css"/>
  <script src="https://kit.fontawesome.com/d771216f39.js" crossorigin="anonymous"></script>
  
</head>
<body>
  <form action="Ashok.php" method="post">
  <div class="input">
    <input type="text" class="inputValue" placeholder="Enter a city here" name="search">
    <input type="submit" value="Submit" class="button">
  </div>
</form>
  <div class="display">
    <h1 class="name"></h1>
    <img class="icon" src="" alt="Weather">
    <p class="temp"></p>
    <p class="desc"></p>
    <p class="day"></p>
    <div class="next">
      <table>
        <tr>
          
          <td class="humi"></td>
          <td class="wind "></td>
        </tr>
        <tr>
          <td id ="rain"></td>
          <td class="feelslike"></td>
          
        </tr>
      </table>
    </div>
   
  </div>

  <script src="AshokDhungana_2329448.js"></script>
</body>
</html>