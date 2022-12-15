<?php
require 'config.php';//including the configuration file
$Is_Weekly = "";
$Weekly_Rate = "";
$Is_Daily = "";
$Daily_Rate = "";
$rate_ID ="";
$Start_Date  = '';

$ID_Num_U  = '';
$Tran_ID_U = '';						
$rate_ID_U  = '';
$Vehicle_ID_U  = '';
$Start_Date_U  = '';
$Due_Date_U  = '';
$Date_Returned = '';
$RentalLen = '';
$Is_Returned = '';
$Total_Rental_Cost = '';

?>
<html>
<head>
<title>Harris and Kafley Rentals</title>
<link rel="stylesheet" href="style.css?v=<?php echo time(); ?>">  <!--including and reloading the css file to make sure it is working -->
</head>
<body style ="background-color:#bdc3c7">
	<div id = "main-wrapper">
		<center><h2>Harris and Kafley Rentals</h2></center>
		<div class = "inner_container">
		<?php
			
			if(isset($_POST['price_but'])){//posting the price if it is in weekly or daily Rate

					//echo'<script type="text/javascript">alert("Price Button Submited")</script>';
					$Is_Weekly = $_POST['Is_Weekly'];
					$Is_Daily = $_POST['Is_Daily'];
				if($Is_Weekly =="" || $Is_Daily == "" ){	
					$rate_ID = $_POST['rate_ID'];
					if($rate_ID=="" ){
					echo'<script type="text/javascript">alert("Price Button Submited with no boolean conditions")</script>';
					}else{
						echo'<script type="text/javascript">alert("Price  seach was submited.")</script>';
					$query = "SELECT * FROM rental_rate WHERE rate_ID= '$rate_ID';";
					$querry_run = mysqli_query($cann, $query);
					if($querry_run){
						if(mysqli_num_rows($querry_run) > 0){
						echo'<script type="text/javascript">alert("Here are your results")</script>';
						$row = mysqli_fetch_array($querry_run, MYSQLI_ASSOC);
						$Is_Weekly = $row['Is_Weekly'];
						$Weekly_Rate = $row['Weekly_Rate'];
						$Is_Daily = $row['Is_Daily'];
						$Daily_Rate = $row['Daily_Rate'];
						$rate_ID = $row['rate_ID'];
						}else{
							echo'<script type="text/javascript">alert("Price Button Submited invalid key")</script>';
						}
					}else{
						echo'<script type="text/javascript">alert("Price Button Submited with sql error")</script>';
						}
					}
				}else{
					echo'<script type="text/javascript">alert("Price  seach was submited.")</script>';
					$query = "SELECT * FROM rental_rate WHERE Is_Daily='$Is_Daily' AND Is_Weekly='$Is_Weekly';";
					$querry_run = mysqli_query($cann, $query);
					if($querry_run){
						if(mysqli_num_rows($querry_run) > 0){
						echo'<script type="text/javascript">alert("Here are your results")</script>';
						$row = mysqli_fetch_array($querry_run, MYSQLI_ASSOC);
						$Is_Weekly = $row['Is_Weekly'];
						$Weekly_Rate = $row['Weekly_Rate'];
						$Is_Daily = $row['Is_Daily'];
						$Daily_Rate = $row['Daily_Rate'];
						$rate_ID = $row['rate_ID'];
						}else{
							echo'<script type="text/javascript">alert("Price Button Submited invalid key")</script>';
						}
					}else{
						echo'<script type="text/javascript">alert("Price Button Submited with sql error")</script>';
						}
				}
			}
			
			else if(isset($_POST['price_update_but'])){//posting the new price update
					$Is_Weekly = $_POST['Is_Weekly'];
					$Weekly_Rate = $_POST['Weekly_Rate'];
					$Is_Daily = $_POST['Is_Daily'];
					$Daily_Rate = $_POST['Daily_Rate'];
				if($Is_Weekly =="" || $Is_Daily == "" || $Weekly_Rate =="" || $Daily_Rate == ""){
				
					echo'<script type="text/javascript">alert("Price Update Button was submitted with no data entered.")</script>';
					
				}else{
					echo'<script type="text/javascript">alert("Stuff entered did something!")</script>';
					$query = "UPDATE rental_rate SET Daily_Rate= $Daily_Rate, Weekly_Rate= $Weekly_Rate WHERE Is_Daily='$Is_Daily' AND Is_Weekly='$Is_Weekly';";
					$querry_run = mysqli_query($cann, $query);
					if($querry_run){
						echo'<script type="text/javascript">alert("Your results were entered!")</script>';
						
					}else{
						echo'<script type="text/javascript">alert("Price Button Submited with sql error")</script>';
						}
				}
				
			}
			else if(isset($_POST['rental_update'])){ //update the rental
				echo'<script type="text/javascript">alert("Rental Udate Submited")</script>';
				$Tran_ID_U= $_POST['Tran_ID_U'];
				if($Tran_ID_U ==""){
					echo'<script type="text/javascript">alert("Rental update submited with no transaction ID. This is the required feild.")</script>';
					
				}else{
					echo'<script type="text/javascript">alert("Updating Empty Feilds.")</script>';
					$Is_Returned = $_POST['Is_Returned'];
					if($Is_Returned ==""){
					$query = "SELECT * FROM transactions WHERE Tran_ID = '$Tran_ID_U';";
					$querry_run = mysqli_query($cann, $query);
					if($querry_run){
						echo'<script type="text/javascript">alert("Your results were entered were updated!")</script>';
						 if(mysqli_num_rows($querry_run) > 0){
								
								echo'<script type="text/javascript">alert("Here are your results")</script>';
								$row = mysqli_fetch_array($querry_run, MYSQLI_ASSOC);
								$ID_Num_U = $row['Id_Num'];
								$Tran_ID_U= $row['Tran_ID'];						
								$rate_ID_U = $row['rate_ID'];
								$Vehicle_ID_U = $row['Vehicle_ID'];
								$Start_Date_U = $row['Start_Date'];
								$Due_Date_U = $row['Due_Date'];
								$Date_Returned = $row['Return_Date'];
								$RentalLen = $row['RentalLen'];
								$Is_Returned = $row['Is_Returned'];
								$Total_Rental_Cost = $row['Total_Rental_Cost'];
						
						}else{
							echo'<script type="text/javascript">alert("Price Button Submited invalid key")</script>';
						}
						
					}else{
						echo'<script type="text/javascript">alert("Rental Update Submited with sql error")</script>';
						
						}
					
					
				}
				}
			}
			else if(isset($_POST['return_but'])){//managing the return
				
				echo'<script type="text/javascript">alert("Retrun Button Pressed")</script>';
				$Tran_ID_U= $_POST['Tran_ID_U'];
				$Is_Returned = $_POST['Is_Returned'];
				$rate_ID_U = $_POST['rate_ID_U'];
				$ID_Num_U  = $_POST['ID_Num_U'];
				$Vehicle_ID_U  = $_POST['Vehicle_ID_U'];
				$Start_Date_U  = $_POST['Start_Date_U'];
				$Due_Date_U  = $_POST['Due_Date_U'];
				$Date_Returned = $_POST['Date_Returned'];
				$RentalLen = $_POST['RentalLen'];
				$Total_Rental_Cost = $_POST['Total_Rental_Cost'];
				$Start_Date_U = $_POST['Start_Date_U'];
				// need a daily/ weekly modify
				if($rate_ID_U == "" || $Is_Returned =="" || $Tran_ID_U ==""){
					echo'<script type="text/javascript">alert("Return Button Pressed with no transaction ID and the return status was no entered or not changed")</script>';
					
				}else{
					echo'<script type="text/javascript">alert("Return Button Pressed")</script>';
					$query = "UPDATE transactions SET Is_Returned = 'Y', Return_Date = CURRENT_TIMESTAMP, RentalLen = (Return_Date - Start_Date) WHERE Tran_ID = '$Tran_ID_U';";
					$querry_run = mysqli_query($cann, $query);
					$rate_ID_U = $_POST['rate_ID_U'];
					if($rate_ID_U == "2"){
					
					// below is to caculate the cost for in week with a weekly rate
					if($querry_run){
						echo'<script type="text/javascript">alert("Caculating rates with Weekly rate applied!")</script>';
						$query = "UPDATE transactions INNER JOIN rental_rate ON transactions.rate_ID=rental_rate.rate_ID SET Total_Rental_Cost = (RentalLen*rental_rate.Weekly_Rate)/7 WHERE transactions.rate_ID='$rate_ID_U' AND Tran_ID = '$Tran_ID_U'";
						$querry_run = mysqli_query($cann, $query);
						if($querry_run){
								
									echo'<script type="text/javascript">alert("Updating Car Info")</script>';
									$query = "UPDATE cars SET Is_Avalible = 'Y' WHERE Vehicle_ID = '$Vehicle_ID_U'";
									$querry_run = mysqli_query($cann, $query);
									if($querry_run){
													echo'<script type="text/javascript">alert("Car is now set as avalible!")</script>';
						
						
									}else{
											echo'<script type="text/javascript">alert("Car avaliblity had sql error")</script>';
									}
						}else{
								echo'<script type="text/javascript">alert("Price Button Submited with sql error")</script>';
						}
						
					}
					// below is to caculate the cost for in daily with a weekly rate	
					}elseif($rate_ID_U == "1"){
						echo'<script type="text/javascript">alert("Caculating with daily rates applied")</script>';
						
						if($querry_run){
						$query = "UPDATE transactions INNER JOIN rental_rate ON transactions.rate_ID=rental_rate.rate_ID SET Total_Rental_Cost = RentalLen*rental_rate.Daily_Rate WHERE transactions.rate_ID='$rate_ID_U' AND Tran_ID = '$Tran_ID_U'";
						$querry_run = mysqli_query($cann, $query);
						if($querry_run){
								
									echo'<script type="text/javascript">alert("Updating Car Info")</script>';
									$query = "UPDATE cars SET Is_Avalible = 'Y' WHERE Vehicle_ID = '$Vehicle_ID_U'";
									$querry_run = mysqli_query($cann, $query);
									if($querry_run){
													echo'<script type="text/javascript">alert("Car is now set as avalible!")</script>';
						
						
									}else{
											echo'<script type="text/javascript">alert("Car avaliblity had sql error")</script>';
									}
						}else{
								echo'<script type="text/javascript">alert("Price Button Submited with sql error")</script>';
						}
						
					}
						
						}else{
						echo'<script type="text/javascript">alert("Price Button submited with invalid rate ID")</script>';	
						}
				}
				
			}
		?>
		<!--creating Html forms --> 
			<form action= "index.php" method = "post">
				<div class = "dumb_name">
					<label><b>Show</b><label><button id="btn_clear" name="reset_btn" type="clear">Clear Screen</button></br> 
					<label><button id="btn_go" name="fetch_btn" type="submit">All Cars</button>
					</b><label><button id="btn_aval" name="btn_truck" type="submit">Check For Trucks</button>
					</b><label><button id="btn_aval" name="btn_van" type="submit">Check For Vans</button>
					</b><label><button id="btn_aval" name="btn_suv" type="submit">Check For SUVs</button>
					</b><label><button id="btn_aval" name="btn_small" type="submit">Check For Compact</button>
					</b><label><button id="btn_aval" name="btn_med" type="submit">Check For MidSize</button>
					</b><label><button id="btn_aval" name="btn_large" type="submit">Check For Large</button>
					</br>
					<label><button id="btn_aval" name="aval_btn" type="submit">Check For Avalible Cars</button>
				</div>
				
				
				
				<div class = "dumb_name4">
                <label><b>To enter a new car fill in fields below and  hit submit</b></br>
                </b><input type ="text" placeholder="Enter Model" name="model" maxlength ="20">
                </b><input type ="text" placeholder="Enter Make" name="make" maxlength ="20">
                </b><input type ="text" placeholder="Enter Year of Make" name="yearofMake" maxlength "4">
                </b><input type ="text" placeholder="Enter Color" name="color" maxlength = "20">
                </b><input type ="text" placeholder="Enter Number of Seats" name="num_Seats" maxlength ="1">
                </b><input type ="text" placeholder="Enter Y for AWD and N otherwise" name="has_Awd" maxlength ="1">
                </b><input type ="text" placeholder="Enter Y for Truck Bed and N otherwise" name="has_truck_bed" maxlength ="1">
				
                </br><label><button id="btn_sub" name="btn_subs" type="submit">Submit</button>
                </div>
				
				
				<div class = "dumb_name7">
				<label><b>Check and Change Rental Prices </b></br><input type ="text" placeholder="Enter Y or N" name ="Is_Weekly" value = "<?php echo $Is_Weekly?>">
				</b><input type ="text" placeholder="Enter Weekly Rate" name ="Weekly_Rate" value = "<?php echo $Weekly_Rate?>">
				</b><input type ="text" placeholder="Enter Y or N" name ="Is_Daily" value = "<?php echo $Is_Daily?>">
				</b><input type ="text" placeholder="Enter Daily Rate" name ="Daily_Rate" value = "<?php echo $Daily_Rate?>">
				</b><input type ="text" placeholder="Enter Rate ID(Search Only)" name ="rate_ID" value = "<?php echo $rate_ID?>">
				</br><label><button id="price_sty" name="price_but" type="submit">Search For Prices</button>
				</b><label><button id="price_sty" name="price_update_but" type="submit">Update Prices</button>
				</div>
				
				<div class = "dumb_name5">
				<label><b>Customer Info</br>
				</b><input type ="text" placeholder="Enter First Inital" name="first_int" maxlength = "1">
				<input type ="text" placeholder="Enter Last Name" name="last_name" maxlength = "20">
				<input type ="text" placeholder="Phone Number" name="phone_num" maxlength = "10">
				<input type ="text" placeholder="ID_Num_l" name="ID_Num" maxlength = "10">
				</br><label><button id="btn_go" name="new_customer" type="submit">Submit New Customer</button>
				<label><button id="btn_cust" name="show_a_cust" type="submit">Display A Customer</button>
				<label><button id="btn_cust" name="show_cust" type="submit">Display All Customers</button>
				
				</div>
				
				<div class = "dumb_name3">
				<label><b>Enter A New Car Rental. To Submit Hit New Rental</b></br>
				<input type ="text" placeholder="Customer ID" name="ID_Num_C" maxlength ="20">
				<input type ="text" placeholder="Vehicle ID" name="Vehicle_ID_C" maxlength ="20">
				<input type ="text" placeholder="Rate ID" name="rate_ID_C" maxlength ="20">
				<input type ="text" placeholder="Start Date (yyyy-mm-dd)" name="Start_Date">
				<input type ="text" placeholder="Due Date (yyyy-mm-dd)" name="Due_Date" >
				</br><label><button id="btn_sub" name="new_rental" type="submit">New Rental</button>
				
				
				</br><label><b>To return the car press Return Rental</b></br>
				
				</b><input type ="text" placeholder="Transaction ID(Required Feild)" name="Tran_ID_U" maxlength ="20" value = "<?php echo $Tran_ID_U?>">
				
				</b><input type ="text" placeholder="Customer ID" name="ID_Num_U" maxlength ="20" value = "<?php echo $ID_Num_U?>">
				
				</b><input type ="text" placeholder="Vehicle ID" name="Vehicle_ID_U" maxlength ="20" value = "<?php echo $Vehicle_ID_U?>">
				
				</b><input type ="text" placeholder="Rate ID" name="rate_ID_U" maxlength ="20" value = "<?php echo $rate_ID_U?>">
				
				</b><input type ="text" placeholder="Start Date (yyyy-mm-dd)" name="Start_Date_U" value = "<?php echo $Start_Date_U?>">
				
				</b><input type ="text" placeholder="Due Date (yyyy-mm-dd)" name="Due_Date_U" value = "<?php echo $Due_Date_U?>">
				
				</b><input type ="text" placeholder="Date Returned (yyyy-mm-dd)" name="Date_Returned" value = "<?php echo $Date_Returned?>">
				
				</br></b><input type ="text" placeholder="RentalLen" name="RentalLen" maxlength = "20" value = "<?php echo $RentalLen?>">
				
				</b><input type ="text" placeholder="Enter Y on Return" name ="Is_Returned" value = "<?php echo $Is_Returned?>">
				
				</b><input type ="text" placeholder="No Entry Feild" name ="Total_Rental_Cost" value = "<?php echo $Total_Rental_Cost?>">

				</br><label><button id="btn_sub" name="rental_update" type="submit">Fill Rental In Rental Data</button>
				</b><label><button id="btn_sub" name="return_but" type="submit">Return Rental</button>
				</b><label><button id="btn_sub" name="recipt_butt" type="submit">Print Recipt</button>
				</br><label><button id="btn_aval" name="show_returns" type="submit">Check For Rental History</button>
				</br><label><button id="btn_cur_rent" name="show_cur_rent" type="submit">Display Current Rentals</button>
				</br><label><button id="rent_all" name="btn_all_trans" type="submit">Display All Rentals Transactions</button>
				
				</div>
				
				
				
				
	</div>

<?php

echo "Here is the info requested is below<br>";
echo "------------------------------<br>";

if(isset($_POST['fetch_btn'])){//posting the  cars
	$sql= "SELECT Model, Make, YearofMake, Color, Num_Seats, Has_AWD, Has_Truck_Bed, Vehicle_ID, Is_Avalible
FROM CARS";
	$results = $cann -> query($sql);
	if($results){
		while($row = $results -> fetch_assoc()){
			echo "Model: ".$row["Model"]."</br>Make: ".$row["Make"]."</br> Color: ".$row["Color"]."</br>Year of Make: ".$row["YearofMake"]."</br>Vehicle ID: ".$row["Vehicle_ID"]."</br>Avalible: ".$row["Is_Avalible"]."</br>";
		}
	}else
{
	echo "No Results";
}
}
if(isset($_POST['aval_btn'])){//when the available button is clicked
	$sql = "SELECT Model, Make, YearofMake, Color, Num_Seats, Has_AWD, Has_Truck_Bed, Vehicle_ID, Is_Avalible FROM CARS
	WHERE Is_Avalible = 'y' OR Is_Avalible = 'Y'";
	$results = $cann -> query($sql);
	if($results){
		echo "Cars:</br> ";
		while($row = $results -> fetch_assoc()){
			echo "Model: ".$row["Model"]."</br>Make: ".$row["Make"]."</br> Color: ".$row["Color"]."</br>Year of Make: ".$row["YearofMake"]."</br>Vehicle ID: ".$row["Vehicle_ID"]."</br>Avalible: ".$row["Is_Avalible"]."</br>";
		}
	}else{
			echo "No Results";
	}
}
if(isset($_POST['show_cust'])){//displaying a customer
	$sql= "SELECT LastName, FirstInt, PhoneNum, Id_Num
FROM customer";
	$results = $cann -> query($sql);
	if($results){
		while($row = $results -> fetch_assoc()){
			echo "".$row["LastName"]." ".$row["FirstInt"]."     ".$row["PhoneNum"]."    ".$row["Id_Num"]."<br>";
		}
	}else
{
	echo "No Results";
}
}
if(isset($_POST['show_a_cust'])){//displaying the customer where Id no is got
	echo'<script type="text/javascript">alert("Button Pressed")</script>';
	$ID_Num = $_POST['ID_Num'];
	if($ID_Num == ""){
		echo'<script type="text/javascript">alert("Insert values in ID fields")</script>';
	}else{
	$sql= "SELECT LastName, FirstInt, PhoneNum, Id_Num
FROM customer WHERE ID_Num = '$ID_Num'";
	$results = $cann -> query($sql);
	if($results){
		while($row = $results -> fetch_assoc()){
			echo "".$row["LastName"]." ".$row["FirstInt"]."     ".$row["PhoneNum"]."    ".$row["Id_Num"]."<br>";
		}
	}else
{
	echo "No Results";
}
}
}
if(isset($_POST['btn_truck'])){//checking for truck
	$sql= "SELECT Model, Make, YearofMake, Color, Num_Seats, Has_AWD, Has_Truck_Bed, Vehicle_ID, Is_Avalible
FROM CARS
WHERE Has_Truck_Bed = 'Y'";
	$results = $cann -> query($sql);
	if($results){
		while($row = $results -> fetch_assoc()){
			echo "Model: ".$row["Model"]."</br>Make: ".$row["Make"]."</br> Color: ".$row["Color"]."</br>Year of Make: ".$row["YearofMake"]."</br>Vehicle ID: ".$row["Vehicle_ID"]."</br>Avalible: ".$row["Is_Avalible"]."</br>";
		}
	}else
{
	echo "No Results";
}
}
if(isset($_POST['btn_van'])){//checking for van
	$sql= "SELECT Model, Make, YearofMake, Color, Num_Seats, Has_AWD, Has_Truck_Bed, Vehicle_ID, Is_Avalible
FROM CARS
WHERE Num_Seats > 5 AND Has_Truck_Bed = 'N'";
	$results = $cann -> query($sql);
	if($results){
		while($row = $results -> fetch_assoc()){
			echo "Model: ".$row["Model"]."</br>Make: ".$row["Make"]."</br> Color: ".$row["Color"]."</br>Year of Make: ".$row["YearofMake"]."</br>Vehicle ID: ".$row["Vehicle_ID"]."</br>Avalible: ".$row["Is_Avalible"]."</br>";
		}
	}else
{
	echo "No Results";
}
}
if(isset($_POST['btn_suv'])){//checking for suv
	$sql= "SELECT Model, Make, YearofMake, Color, Num_Seats, Has_AWD, Has_Truck_Bed, Vehicle_ID, Is_Avalible
FROM CARS
WHERE Has_AWD = 'Y' AND Has_Truck_Bed = 'N'";
	$results = $cann -> query($sql);
	if($results){
		while($row = $results -> fetch_assoc()){
			echo "Model: ".$row["Model"]."</br>Make: ".$row["Make"]."</br> Color: ".$row["Color"]."</br>Year of Make: ".$row["YearofMake"]."</br>Vehicle ID: ".$row["Vehicle_ID"]."</br>Avalible: ".$row["Is_Avalible"]."</br>";
		}
	}else
{
	echo "No Results";
}
}
if(isset($_POST['btn_small'])){//checking for small cars
	$sql= "SELECT Model, Make, YearofMake, Color, Num_Seats, Has_AWD, Has_Truck_Bed, Vehicle_ID, Is_Avalible
FROM CARS
WHERE Num_Seats <= 3 ";
	$results = $cann -> query($sql);
	if($results){
		while($row = $results -> fetch_assoc()){
			echo "Model: ".$row["Model"]."</br>Make: ".$row["Make"]."</br> Color: ".$row["Color"]."</br>Year of Make: ".$row["YearofMake"]."</br>Vehicle ID: ".$row["Vehicle_ID"]."</br>Avalible: ".$row["Is_Avalible"]."</br>";
		}
	}else
{
	echo "No Results";
}
}
if(isset($_POST['btn_med'])){//checking for medium cars
	$sql= "SELECT Model, Make, YearofMake, Color, Num_Seats, Has_AWD, Has_Truck_Bed, Vehicle_ID, Is_Avalible
FROM CARS
WHERE Num_Seats > 3 AND Num_Seats < 8";
	$results = $cann -> query($sql);
	if($results){
		while($row = $results -> fetch_assoc()){
			echo "Model: ".$row["Model"]."</br>Make: ".$row["Make"]."</br> Color: ".$row["Color"]."</br>Year of Make: ".$row["YearofMake"]."</br>Vehicle ID: ".$row["Vehicle_ID"]."</br>Avalible: ".$row["Is_Avalible"]."</br>";
		}
	}else
{
	echo "No Results";
}
}
if(isset($_POST['btn_large'])){//checking for large cars
	$sql= "SELECT Model, Make, YearofMake, Color, Num_Seats, Has_AWD, Has_Truck_Bed, Vehicle_ID, Is_Avalible
FROM CARS
WHERE Num_Seats >= 8";
	$results = $cann -> query($sql);
	if($results){
		while($row = $results -> fetch_assoc()){
			echo "Model: ".$row["Model"]."</br>Make: ".$row["Make"]."</br> Color: ".$row["Color"]."</br>Year of Make: ".$row["YearofMake"]."</br>Vehicle ID: ".$row["Vehicle_ID"]."</br>Avalible: ".$row["Is_Avalible"]."</br>";
		}
	}else
{
	echo "No Results";
}
}

if(isset($_POST['new_customer'])){//submitting a new customer
		$FirstInt =$_POST['first_int'];
		$LastName =$_POST['last_name'];
		$PhoneNum =$_POST['phone_num'];
	if($FirstInt=="" || $LastName=="" || $PhoneNum == ""){
		echo'<script type="text/javascript">alert("Insert values in all fields")</script>';
	}else{
		$query = "INSERT INTO customer (FirstInt, LastName, PhoneNum) VALUES ('$FirstInt', '$LastName', '$PhoneNum')";
		$query_run=mysqli_query($cann, $query);
		if($query_run){
			echo'<script type="text/javascript">alert("New Customer Inserted")</script>';
			
		}else{
			echo'<script type="text/javascript">alert("Stupid Fucking Programs Never Work")</script>';
		}
		}
}
if(isset($_POST['new_rental'])){//creating a new rental
		@$ID_Num_C =$_POST['ID_Num_C'];
		//$RentalLen =$_POST['RentalLen'];
		@$Start_Date =$_POST['Start_Date'];
		@$Due_Date =$_POST['Due_Date'];
		@$Vehicle_ID_C=$_POST['Vehicle_ID_C'];
		@$rate_ID_C=$_POST['rate_ID_C'];
	if($ID_Num_C=="" || $Start_Date == "" || $Due_Date ==""|| $Vehicle_ID_C ==""|| $rate_ID_C ==""){
		echo'<script type="text/javascript">alert("Insert values in all fields")</script>';
	}else{ 
	
		$sql = "SELECT Model, Make, YearofMake, Color, Num_Seats, Has_AWD, Has_Truck_Bed, Vehicle_ID, Is_Avalible FROM CARS
		WHERE Is_Avalible = 'N' AND Vehicle_ID = '$Vehicle_ID_C'";
		$results = mysqli_query($cann, $sql);
		if($results){
		if(mysqli_num_rows($results) < 1 ){
		
		$query = "INSERT INTO transactions (ID_Num, Vehicle_ID, rate_ID, Start_Date, Due_Date,Is_Returned) VALUES ('$ID_Num_C', '$Vehicle_ID_C','$rate_ID_C', '$Start_Date', '$Due_Date','N');";
		$query_run=mysqli_query($cann, $query);
		if($query_run ){
			echo'<script type="text/javascript">alert("New Rental Info Saved updating rental length")</script>';
			$query = "UPDATE transactions SET RentalLen = Due_Date - Start_Date WHERE ID_Num = '$ID_Num_C' AND Vehicle_ID = '$Vehicle_ID_C' AND Start_Date = '$Start_Date';";
			$query_run=mysqli_query($cann, $query);
			if($query_run){
					echo'<script type="text/javascript">alert("New Rental Info Saved")</script>';
					echo'<script type="text/javascript">alert("Updating Car Info")</script>';
						$query = "UPDATE cars SET Is_Avalible = 'N' WHERE Vehicle_ID = '$Vehicle_ID_C'";
						$querry_run = mysqli_query($cann, $query);
						if($querry_run){
									echo'<script type="text/javascript">alert("Car is now set as unavalible!")</script>';
						}else{
								echo'<script type="text/javascript">alert("Car avaliblity had sql error")</script>';
						}
			
			}else{
				echo'<script type="text/javascript">alert("Stupid Fucking Programs Never Work")</script>';
			}	
		}else{
			echo'<script type="text/javascript">alert("Stupid Fucking Programs Never Work")</script>';
		}
		}else{
				echo'<script type="text/javascript">alert("Car unavalible!")</script>';
	}
	}else{
		echo'<script type="text/javascript">alert("Stupid Fucking Programs Never Work")</script>';
	}
		
		
		}
}
if(isset($_POST['show_returns'])){//showing the return
	$sql= "SELECT transactions.Tran_ID, cars.Vehicle_ID, cars.Model, transactions.Due_Date, customer.LastName, customer.PhoneNum,transactions.Is_Returned
FROM transactions
INNER JOIN customer ON transactions.ID_Num=customer.ID_Num
INNER JOIN cars ON transactions.vehicle_ID=cars.vehicle_ID
WHERE transactions.Is_Returned='Y';";
	$results = $cann -> query($sql);
	if($results){
		while($row = $results -> fetch_assoc()){
			echo "".$row["LastName"]." ".$row["Tran_ID"]." ".$row["Vehicle_ID"]." ".$row["PhoneNum"]."<br>";
		}
	}else
{
	echo "No Results";
}
}
if(isset($_POST['show_cur_rent'])){//displaying current rentals
	
	$sql= "SELECT transactions.Tran_ID, cars.Vehicle_ID, cars.Model, transactions.Due_Date, customer.LastName, customer.PhoneNum,transactions.Is_Returned
FROM transactions
INNER JOIN customer ON transactions.ID_Num=customer.ID_Num
INNER JOIN cars ON transactions.vehicle_ID=cars.vehicle_ID
WHERE transactions.Is_Returned='N';";
	$results = $cann -> query($sql);
	if($results){
		while($row = $results -> fetch_assoc()){
			echo "Name: ".$row["LastName"]." </br>Tran ID: ".$row["Tran_ID"]."</br>Vehicle_ID: ".$row["Vehicle_ID"]."</br>Phone Number ".$row["PhoneNum"]."<br></br>";
		}
	}else
{
	echo "No Results";
}
}
if(isset($_POST['btn_all_trans'])){
	$sql= "SELECT transactions.Tran_ID, cars.Vehicle_ID, cars.Model, transactions.Due_Date, customer.LastName, customer.PhoneNum,transactions.Is_Returned
FROM transactions
INNER JOIN customer ON transactions.ID_Num=customer.ID_Num
INNER JOIN cars ON transactions.vehicle_ID=cars.vehicle_ID;";
	$results = $cann -> query($sql);
	if($results){
		while($row = $results -> fetch_assoc()){
			echo "Cars: ".$row["LastName"]." ".$row["Tran_ID"]." ".$row["Vehicle_ID"]." ".$row["PhoneNum"]."<br>";
		}
	}else
{
	echo "No Results";
}
}

if(isset($_POST['recipt_butt'])){ //printing the receipt
	
		//$RentalLen =$_POST['RentalLen'];
		$Tran_ID_U =$_POST['Tran_ID_U'];
	if($Tran_ID_U==""){
		echo'<script type="text/javascript">alert("Insert values in transaction ID fields")</script>';
	}else{  
	$sql= "SELECT transactions.Tran_ID, cars.Vehicle_ID, cars.Model,cars.Color, transactions.Trans_Start,transactions.Start_Date,transactions.Due_Date, transactions.Return_Date,customer.LastName,customer.FirstInt,customer.PhoneNum, transactions.RentalLen,transactions.Total_Rental_Cost 
FROM transactions INNER JOIN customer ON transactions.ID_Num=customer.ID_Num INNER JOIN cars ON transactions.vehicle_ID=cars.vehicle_ID 
WHERE transactions.Tran_ID='$Tran_ID_U' ";
	$results = $cann -> query($sql);
	if($results){
		while($row = $results -> fetch_assoc()){
			echo "Name:	".$row["LastName"]." ".$row["FirstInt"].". </b>Phone Number: ".$row["PhoneNum"]."</b>Transaction ID:	".$row["Tran_ID"]."
			</br> Vehicle_ID:	".$row["Vehicle_ID"]."</b>Car Model:	".$row["Model"]." </b>Car Model:	".$row["Color"]."
			</br></b>Day Reserved:	".$row["Trans_Start"]."</b>Day Picked Up	:".$row["Start_Date"]."</b>Day Car Due:	".$row["Due_Date"]."</b>Day Returned:".$row["Return_Date"]."
			<br></b>Total Amount Due:	".$row["Total_Rental_Cost"]."";
			echo'<script type="text/javascript">alert("I worked and printed A recipt")</script>';
		}
	}else
{
	echo'<script type="text/javascript">alert("Stupid Fucking Programs Never Work")</script>';
}
	}
}
if(isset($_POST['btn_subs'])){ 
		$model = $_POST['model'];
		$make = $_POST['make'];
		$yearofMake = $_POST['yearofMake'];
		$color = $_POST['color'];
		$num_Seats = $_POST['num_Seats'];
		$has_Awd= $_POST['has_Awd'];
		$has_truck_bed= $_POST['has_truck_bed'];
	if($model=="" || $make=="" || $yearofMake == "" || $color==""||$num_Seats==""||$has_Awd== "" || $has_truck_bed==""){
		echo'<script type="text/javascript">alert("Insert values in all fields")</script>';
	}else{
		$query = "INSERT INTO Cars (Model, Make, YearofMake , Color , Num_Seats, Has_AWD , Has_Truck_Bed , Is_Avalible)
VALUES ('$model', '$make', '$yearofMake', '$color' , '$num_Seats', '$has_Awd' , '$has_truck_bed' , 'Y' )";
		$query_run=mysqli_query($cann, $query);
		if($query_run){
			echo'<script type="text/javascript">alert("New Car Submitted ")</script>';
			
		}else{
			echo'<script type="text/javascript">alert("Stupid Fucking Programs Never Work")</script>';
		}
		}
}

?>
</body>
</html>