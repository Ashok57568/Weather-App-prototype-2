<?php
        
        $servername = "localhost";
        $username = "root";
        $password = "";
        $dbname = "weather_tbl";
        $conn = new mysqli($servername, $username, $password, $dbname);
        
        // Check connection
        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }
        

        function set($conn,$city){
            $date=date('Y-m-d');
            
            $api="https://api.openweathermap.org/data/2.5/weather?q=".$city.'&units=metric&appid=a996fdcd6c4f2a16fd83338c84ab0236';
            $json_data = file_get_contents($api);
            $response = json_decode($json_data,true);
            $name=$response["name"];
            $temperature=$response["main"]["temp"];
            $humidity=$response["main"]["humidity"];
            $code="SELECT * FROM weather WHERE Address='$name' AND Date='$date';";
            $test = $conn->query($code);
            if (mysqli_num_rows($test)==1){
                $code1="UPDATE `weather` SET `Date`='$date',`Address`='$city',`Temperature`=$temperature,`Humidity`=$humidity WHERE Address='$city' AND Date='$date';";
                $conn->query($code1);
            }else{
                $code2="INSERT INTO `weather`(`Date`, `Address`, `Temperature`, `Humidity`) VALUES ('$date','$city',$temperature,$humidity)";
                $conn->query($code2);
          }
         }
        function get($conn,$city){

            $code11="SELECT * FROM weather WHERE Address='$city' ORDER BY Date DESC;";
            $result = $conn->query($code11);
            
            
           
            $len=mysqli_num_rows($result);
                        
            if ($len >= 7) {
                echo "<h1>Last 7 days weather detail of $city:</h1>
                <table>
                        <tr>
                            <th>Date</th>
                            <th>Temperature</th>
                            <th>Humidity</th>
                        </tr>";
                $count = 0;
                while ($count < 7 && $row = $result->fetch_assoc()) {
                    echo "<tr>
                            <td>".$row["Date"]."</td>
                            <td>".$row["Temperature"]."</td>
                            <td>".$row["Humidity"]."</td>
                        </tr>";
                    $count++;
                }
                echo "</table>
                <style>
                    table td,th{
                        padding: 10px;
                        border: 2px solid blue;
                        text-align:center;
                        
                    }
                    body{
                    background-color:tan;
                
                    }
                    }
                </style>";
            } else {
                echo "<p>No data found.</p>";
            }

            
        }
        
        if (isset($_POST['search'])){
            $city=$_REQUEST['search'];
            set($conn,$city);
            get($conn,$city);
        }
        // set($conn,$city);
        //desending order ma data laune ani 1st 7 lai line slect garera ani yai table banayera haldine
    ?>