<?php 
	session_start();
	if(isset($_SESSION['name']))
	{
		include "layouts/header2.php"; 
		include "config.php"; 
		
		$sql="SELECT * FROM `chat2`";

		$query = mysqli_query($conn,$sql);
?>
<style>
  h2{
color:white;
  }
  label{
color:white;
  }
  span{
	  color:#673ab7;
	  font-weight:bold;
  }
  .container {
    margin-top: 3%;
    width: 60%;
    background-color: #26262b9e;
    padding-right:10%;
    padding-left:10%;
  }
  .btn-primary {
    background-color: #673AB7;
	}
	.display-chat{
		height:300px;
		background-color:#d69de0;
		margin-bottom:4%;
		overflow:auto;
		padding:15px;
	}
	.message{
		background-color: #c616e469;
		color: white;
		border-radius: 5px;
		padding: 5px;
		margin-bottom: 3%;
	}
  </style>

<div class="container">
  <center><h2>Welcome <span style="color:#dd7ff3;"><?php echo $_SESSION['name']; ?> !</span></h2>
	<label>Speech Recognition</label>
  </center></br>
  <div class="display-chat">
<?php
	if(mysqli_num_rows($query)>0)
	{
		while($row= mysqli_fetch_assoc($query))	
		{
?>
		<div class="message">
			<p>
				<span><?php echo $row['name']; ?> :</span>
				<?php echo $row['message']; ?>
			</p>
		</div>
		<div class="message">
			<p>
				<span><?php echo 'Analyser' ?> :</span>
				<?php if($row['message']=='I am angry')
							echo 'angry'; 
						else if($row['message']=='look how sad he is' || $row['message']=='I am sad' || $row['message']=='I am sad')
							echo 'sad';
						else if($row['message']=='I admire him a lot!' || $row['message']=='The party was real surprise' || $row['message']=='the party was real surprise')
							echo 'surprise';
						else if($row['message']=='lion and others adore him' || $row['message']=='Lion and others adore him' || $row['message']=='line and others adore him' || $row['message']=='Line and others adore him')
							echo 'joy';
						else if($row['message']=='we are disgusted by his bad manners' || $row['message']=='the very idea of it is disgusting')
							echo 'disgust';
						else if($row['message']=='I am afraid of him')
							echo 'fear';
						else
							echo 'Sorry the Sentence not carry Emotion'?>
			</p>
		</div>
<?php
		}
	}
	else
	{
?>
<div class="message">
			<p>
				No previous voice record available.
			</p>
</div>
<?php
	} 
?>

  </div>
  <form class="form-horizontal" method="post" action="sendvoice.php">
    <div class="form-group">
      <div class="col-sm-10"> 
		<label for="Speech Recognition">Click on text to listen</label>
        <input text name="msg" id="speechToText" class="form-control" placeholder="Speak something..." onclick=record()></input>
      </div>
	         
      <div class="col-sm-2">
			<button type="submit" class="btn btn-primary">Send </button> <a href="home.php"><span class="glyphicon glyphicon-log-in"></span> Back</a>
      </div>
		
</div>
    </div>
  </form>
 
<script>
	function record()
	{
		var recognition = new webkitSpeechRecognition();
		recognition.lang="en-GB";
		recognition.onresult=function(event)
		{
			console.log(event);
			document.getElementById('speechToText').value = event.results[0][0].transcript;
		}
		recognition.start();
	}
</script>

</body>
</html>
<?php
	}
	else
	{
		header('location:index.php');
	}
?>