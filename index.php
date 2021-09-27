<?php
session_start();

?>
<!DOCTYPE html>
<html>
<head>
	<title>Search Result</title>

<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
<script
  src="http://code.jquery.com/jquery-3.3.1.min.js"
  integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8="
  crossorigin="anonymous"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.js"></script>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.min.css" />
  <style type="text/css">
  	.center
  	{
  		margin: auto;
  
  	}
  	.max-width-600
  	{
  		max-width: 400px;

  	 }
  	 .top-mar-100
  	 {
        margin-top:100px;    
  	 }
  	 .form-container
  	 {
  	 	border: 5px solid black double;
  	 	background-color: 
  	 }
  	 form
  	 {
  	 	border: 6px double black;
  	 	padding: 30px;
  	 }
     .search-result-item
     {
      box-shadow: 0px 0px 10px -3px grey;
      padding: 50px;
      margin: 30px;
      border-radius: 10px;

     }

  </style>
</head>

<body>

<div  class="container">



  <?php

include("omg.php"); 
if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $place=$_POST['place'];
    $acre=$_POST['acre'];
    $from=$_POST['from'];
    $to=$_POST['to'];



   


  $sql="Select * from land where `land_place`= '$place' and `acre`=$acre  and `LAND_PRICE_2019` between $from and $to";
 // echo $sql;

  $result=$conn->query($sql);
  

  $rows=$result->num_rows;

  for($c=0;$c<$rows;$c++)
  {
      $cursor=$result->fetch_assoc();



  ?>
         <div class="search-result-item">
        <div>

          <?php

            echo "Road No : " . $cursor["LAND_ROAD"]. "<br>";
            echo "Area : " . $cursor ["LAND_pLACE"]  ."<br>";
            echo "Land Price : ".$cursor["LAND_PRICE_2019"] ."<br>";
            


 
          ?>
      
      </div>
      <div class="btn btn-info" id="Interested_btn" seller_id="<?php echo $cursor["S_EMAIL"]; ?>" landid = "<?php echo $cursor["LAND_ID"]; ?>"  user_email="<?php echo $_SESSION['user']['B_EMAIL']; ?>"  >
        Interested
      </div>
      <button type="button "   class="btn btn-info testId" landid = <?php

          echo $cursor["LAND_ID"];

      ?> data-toggle  =  modal  data-target="#exampleModal">
       Show Detail




        </button>
      </div>

      <?php



     //var_dump($cursor);
  } 

}

?>
    
  

</div>
<!-- Button trigger modal -->


<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Future prices</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <div class="form-group">
      <label for="exampleInputEmail1"> Enter year</label>
      <input type="number" class="form-control" name="query_year" id="query_year" placeholder="Enter year">
      
    </div>
    <div class="btn btn-info" id="find">
        Find
      </div>
      <div>
        <span id="regression_result_container">
        </span>
        <div style="height: 300px;">
          <canvas id="chart-area" width="400" height="300"></canvas>
        </div>
      </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>

      </div>
    </div>
  </div>
  
</div>


<script>

let selectedLandId=-1;

$(".testId").click(function(){
    selectedLandId=$(this).attr("landid");
});

$("#find").click(function(){

  console.log(selectedLandId);

  let data=
  {
    year:$("#query_year").val(),
    landId:selectedLandId
  }
  $.post("test.php",data,function(data){

    

    var parsedData=JSON.parse(data);
    $("#regression_result_container").html(parsedData.price);
    
    var x=parsedData.x;
    console.log(x);
    
    x.push(parseInt($("#query_year").val()))
    var string_y=parsedData.y;
    var y=[]; 
    for(var c=0;c<string_y.length;c++)
    {
       y.push(parseFloat(string_y[c]));
    }
    y.push(parseFloat(parsedData.price));
    
     
   drawGraph(x,y);



  

})
});
$("#Interested_btn").click(function(){
  
  var landid=$(this).attr("landid");
  var sellerid=$(this).attr("seller_id")
  var user_email=$(this).attr("user_email");
  
  var data={
    buyer_email:user_email,
    seller_email:sellerid,
    land_id:landid
  }

  $.post("notify.php",data,function(res)
  {
     alert(res);
  })
});



</script>
<script>
 function drawGraph(x,y)
 {
   var ctx = document.getElementById('chart-area').getContext('2d');
new Chart(ctx, {
  type: 'line',
  data: {
    labels:x,
    datasets: [{ 
        data:y,
        label: "Price",
        borderColor: "#3e95cd",
        fill: false
      },
    ]
  },
  options: {
    title: {
      display: true,
      
    }
  }
});
 }

</script>
</body>
</html>