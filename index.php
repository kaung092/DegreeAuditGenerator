<?php $version = '2014101477';  ?>

<head>
  <title>Student Degree Audit Generator</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css<?php echo "?ver=$version"; ?>">
  <link rel="stylesheet" href="index.css">

  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.0/jquery.min.js<?php echo "?ver=$version"; ?>"></script>
  <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js<?php echo "?ver=$version"; ?>"></script>
	<script src="index.js<?php echo "?ver=$version"; ?>" language="JavaScript" type="text/javascript"></script>
</head>
<body>


<?php
	$placeholder = "Example:
2013-02   ENGR   276     3.00  A      Engrng Economics";


?>


<div class="container">
  <h2>Generate Student Degree Audit</h2>

  <p>
		Copy and paste student's class information in text area below:
	</p>
  <form role="form">
    <div class="form-group">
      <textarea placeholder="<?php echo $placeholder ?>"style="height:50%;width:50%;display:inline-block;" class="form-control" rows="5" id="student_info"></textarea>
			<span id="egspan">
					<p style="font-size:1.5em;">Example Student Data</p>
					<p id="egdata">
					2012-02      CSC    		102    	 3.00  	B+     Intro Computing<br>
					2013-02      ECO    		102.50 	 3.00  	A      Prin Microeconomics<br>
					2013-09      EE     		241    	 3.00  	B+     Electronics 1<br>
					2015-09      EE     		428    	 1.00  	B      Photonics Engr Lab<br>
					2015-09      ENGR   		230    	 3.00  	A-     Thermodynamics<br>
					transfer  	 MATH   		201    	 3.00  	CR     Calculus 1<br>
					transfer  	 MATH   	  202    	 3.00  	CR     Calculus 2<br>
					2012-02   	 PHYS   	  207    	 4.00  	B-     General<br>
					2014-09   	 EE     		344    	 3.00  	B-     Dgtl Comp Systems<br>
					2015-02   	 EE     		371    	 3.00 	D      Linear Feedbak Syst<br>
					2012-02   	 ENGL   		210.07 	 3.00  	B-     Writing-Engineers<br>
					2013-02   	 ENGR		    204    	 3.00  	B      Electrical Circuits
					</p>
			</span>

			<br>
			<!--
			<label>Student Last Name</label>
      <textarea placeholder="<?php echo 'Last Name' ?>"style="height:40px;width:300px;" class="form-control" rows="5" id="name"></textarea>
			-->
			<br>
			Note: Currently, only EE curriculum is integrated. Most liberal Arts and other courses will be listed under "Others" category
			<br>
			<br>
			<button id="generate" style="background:lightgreen;border:1px solid;" type="button" class="btn btn-success-outline">Generate Excel</button>
    </div>
  </form>
</div>

</body>
</html>


