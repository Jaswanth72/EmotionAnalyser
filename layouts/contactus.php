<?php include "layouts/header2.php"; ?>
<style>
p{
color:white;
  }
h3{
color:white;
  }
  h2{
color:white;
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
  <center><h2>Contact Info</h2></center></br>
  <center><h3>Project:NATURAL LANGUAGE PROCESSING Project</h3></center></br>
  <center><p>Team Members:N.Jaswanthsai,P.Sai Goutham,Naveen Aaditya</p></center>
  <center><p>Email id:EmotionalAnalyser@gmail.com</p></center>
  <center><p>MobileNo:9030******</p></center>
  <form class="form-horizontal" method="post" action="sendcontact.php">
    <div class="form-group">
      <div class="col-sm-10">          
        <textarea name="msg" class="form-control" placeholder="Type your message here..."></textarea>
      </div>
      <div class="col-sm-2">
        <button type="submit" class="btn btn-primary">Send</button>
      </div>
  </form>
</div>
</div>

</body>
</html>
