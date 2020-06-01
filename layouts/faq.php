<?php include "layouts/header2.php"; ?>
<style>
p{
color:white;
  }
h2{
color:white;
  }
  h3{
color:black;
  }
  label{
color:white;
  }
  .container {
    margin-top: 5%;
    width: 50%;
    background-color: #26262b9e;
    padding-top:5%;
    padding-bottom:5%;
    padding-right:10%;
    padding-left:10%;
  }
  .btn-primary {
    background-color: #673AB7;
}
  </style>

<body>
<div class="container">
  <center><h2>FAQ's</h2></center></br>
  <h3>1.Where is the dataset taken from</h3>
  <p>A.Developed by us by interpreting plutchik's Wheel of Emotions</p>
  <h3>2.The API used for speech to text conversion</h3>
  <p>A.The speech to text Google API is used</p>
  <form class="form-horizontal" method="post" action="sendFaq.php">
    <div class="form-group">
      <div class="col-sm-10">          
        <textarea name="msg" class="form-control" placeholder="Type your query here we post the answers..."></textarea>
      </div>
      <div class="col-sm-2">
        <button type="submit" class="btn btn-primary">Send</button>
      </div>
  </form>
</div>

</body>
</html>
