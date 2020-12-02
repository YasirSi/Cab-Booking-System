<?php
    class admin
    {
        function General($idpass,$connect)
        {
            $sql = "SELECT * from tbl_user WHERE user_id = '".$idpass."'";
            $result = $connect->query($sql);

            if ($result->num_rows > 0) 
            {
                $row = $result->fetch_assoc();
                
                if($row['is_block'] == 0)
                {
                    $sql1 = "UPDATE tbl_user SET is_block = '1'  WHERE user_id ='".$idpass."' ";
                    $result = $connect->query($sql1);
                }
                else
                {
                    $sql1 = "UPDATE tbl_user SET is_block = '0'  WHERE user_id ='".$idpass."' ";
                    $result = $connect->query($sql1);
                }
            }  
        }

        function Ride($idpass,$connect)
        {
            $sql = "SELECT * from tbl_ride WHERE ride_id = '".$idpass."'";
            $result = $connect->query($sql);

            if ($result->num_rows > 0) 
            {
                $row = $result->fetch_assoc();
                
                if($row['status'] == 1)
                {
                    $sql1 = "UPDATE tbl_ride SET status = '2'  WHERE ride_id ='".$idpass."' ";
                    $result = $connect->query($sql1);
                }
                elseif($row['status'] == 2)
                {
                    $sql2 = "UPDATE tbl_ride SET status = '1'  WHERE ride_id ='".$idpass."' ";
                    $result = $connect->query($sql2);
                }
            }  
        }

        function Ride2($idpass,$connect)
        {
            $sql = "SELECT * from tbl_ride WHERE ride_id = '".$idpass."'";
            $result = $connect->query($sql);

            if ($result->num_rows > 0) 
            {
                $row = $result->fetch_assoc();
                
                if($row['status'] == 1)
                {
                    $sql1 = "UPDATE tbl_ride SET status = '0'  WHERE ride_id ='".$idpass."' ";
                    $result = $connect->query($sql1);
                }
            }  
        }

        function total_user($connect)
        {
            $sql = "SELECT COUNT(user_id) As Total from tbl_user";
          
            $result = $connect->query($sql);
            $row = $result->fetch_assoc();
            echo $row['Total'];
        }
        
        function total_fare($connect)
        {
            $sql = "SELECT SUM(total_fare) As Total from tbl_ride";
            $result = $connect->query($sql);
            $row = $result->fetch_assoc();
            echo $row['Total'];
        }

        function approved_user($connect)
        {
            $sql = "SELECT COUNT(user_id) As Total from tbl_user WHERE `is_block`='1' AND `is_admin`='0'";
            $result = $connect->query($sql);
            $row = $result->fetch_assoc();
            echo $row['Total'];
        }

        function blocked_user($connect)
        {
            $sql = "SELECT COUNT(user_id) As Total from tbl_user WHERE `is_block`='0' AND `is_admin`='0'";
            $result = $connect->query($sql);
            $row = $result->fetch_assoc();
            echo $row['Total'];
        }

        function pending_request($connect)
        {
            $sql = "SELECT COUNT(ride_id) As Total from tbl_ride WHERE `status`= 1";
            $result = $connect->query($sql);
            $row = $result->fetch_assoc();
            echo $row['Total'];
        }

        function cancelled_request($connect)
        {
            $sql = "SELECT COUNT(ride_id) As Total from tbl_ride WHERE `status`= 0";
            $result=$connect->query($sql);
            $row= $result->fetch_assoc();
            echo $row['Total'];
        }

        function filterrr($a,$filter,$connect)
        {
            if($filter=='name')
            {
                $sql="SELECT * FROM tbl_user WHERE `is_admin`='0'
                ORDER BY `name` DESC
                LIMIT 0, 7";
                $result = $connect->query($sql);
                if ($result->num_rows > 0) 
                {
                    while ($row= $result->fetch_assoc()) 
                    {
                        $a.='<td style="padding: 15px">'.$row['user_name'].'</td>';
                        $a.='<td style="padding: 15px">'.$row['name'].'</td>';
                        $a.='<td style="padding: 15px">'.$row['mobile'].'</td></tr>';
                        $a.='<td style="padding: 15px">'.$row['dateofsignup'].'</td>';     
                    }
                    $a.='</table>';
                    echo $a;
                }
            }

            if($filter=='date')
            {
                $sql="SELECT * FROM tbl_ride
                ORDER BY ride_date DESC ";
                $result = $connect->query($sql);
                if ($result->num_rows > 0) 
                {
                    while ($row= $result->fetch_assoc()) 
                    {
                        $a.='<td style="padding: 15px">'.$row['ride_id'].'</td>';
                        $a.='<td style="padding: 15px">'.$row['ride_date'].'</td>';
                        $a.='<td style="padding: 15px">'.$row['pickup'].'</td>';
                        $a.='<td style="padding: 15px">'.$row['destination'].'</td>';
                        $a.='<td style="padding: 15px">'.$row['total_distance'].'</td>';
                        $a.='<td style="padding: 15px">'.$row['total_fare'].'</td>';
                        $a.='<td style="padding: 15px">'.$row['luggage'].'</td></tr>';
                    }
                    $a.='</table>';
                    echo $a;
                }
            }
            
            if($filter=='fare')
            {
                $sql="SELECT * FROM tbl_ride
                ORDER BY total_fare DESC ";
                $result=$connect->query($sql);
                if ($result->num_rows > 0) 
                {
                    while ($row= $result->fetch_assoc()) 
                    {
                        $a.='<td style="padding: 15px">'.$row['ride_id'].'</td>';
                        $a.='<td style="padding: 15px">'.$row['ride_date'].'</td>';
                        $a.='<td style="padding: 15px">'.$row['pickup'].'</td>';
                        $a.='<td style="padding: 15px">'.$row['destination'].'</td>';
                        $a.='<td style="padding: 15px">'.$row['total_distance'].'</td>';
                        $a.='<td style="padding: 15px">'.$row['total_fare'].'</td>';
                        $a.='<td style="padding: 15px">'.$row['luggage'].'</td></tr>';
                    }
                    $a.='</table>';
                    echo $a;
                }
            }
        }   
    }
?>