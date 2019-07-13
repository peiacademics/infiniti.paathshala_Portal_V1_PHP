<html>
<head>
<title>Paathshala Attendance</title>
<meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    <link href="<?php echo base_url("css/bootstrap.min.css"); ?>" rel="stylesheet">
    <link href="<?php echo base_url("font-awesome/css/font-awesome.css"); ?>" rel="stylesheet">
    <link href="<?php echo base_url("css/style.css"); ?>" rel="stylesheet">
    <script src="<?php echo base_url("js/jquery-2.1.1.js"); ?>"></script>
    <script src="<?php echo base_url("js/bootstrap.min.js"); ?>"></script>
    <script type="text/javascript">
    	base_url = '<?php echo base_url(); ?>';
    </script>
<style type="text/css">
body{
    width:100%;
    text-align:center;
}
img{
    border:0;
}
#main{
    margin: 15px auto;
    background:white;
    overflow: auto;
	width: 100%;
}
#header{
    background:white;
    margin-bottom:15px;
}
#mainbody{
    background: white;
    width:100%;
	display:none;
}

#v{
    width:320px;
    height:240px;
}
#qr-canvas{
    display:none;
}
#qrfile{
    width:320px;
    height:240px;
}
#mp1{
    text-align:center;
    font-size:35px;
}
#imghelp{
    position:relative;
    left:0px;
    top:-160px;
    z-index:100;
    font:18px arial,sans-serif;
    background:#f0f0f0;
	margin-left:35px;
	margin-right:35px;
	padding-top:10px;
	padding-bottom:10px;
	border-radius:20px;
}
.selector{
    margin:0;
    padding:0;
    cursor:pointer;
    margin-bottom:-5px;
}
#outdiv
{
    width:100%;
    height:480px;
    /*border:3px solid black;*/
}

.tsel{
    padding:0;
}

</style>

<script type="text/javascript" src="<?php echo base_url('js/llqrcode.js'); ?>"></script>
<script type="text/javascript" src="<?php echo base_url('js/webqr.js'); ?>"></script>

</head>

<body style="background-color: #2f4050 !important;" class="container grey-bg">
<div class="row">
	<div class="col-xs-12 h1 text-white">
		PAATHSHALA ATTENDANCE
	</div>
</div>
<div class="row">
	<div class="col-xs-12 col-lg-6">
		<div id="outdiv"></div>
		<br>
		<button class="btn btn-info" id="webcamimg" onclick="setwebcam()"> <i class="fa fa-reset"></i> Reset Scanner </button>
		<br><br>
	</div>
	<div class="col-xs-12 col-lg-6">
		<div class="form-group" id="btn">
			<div class="col-lg-12 hidden">
				<textarea id="result" class="form-control"></textarea>
			</div>
			<div class="col-xs-12 col-lg-6">
				<div class="widget style1 navy-bg">
				    <div class="row vertical-align" onclick="set_attendence('IN')">
				        <div class="col-xs-3">
				            <i class="fa fa-backward fa-3x"></i>
				        </div>
				        <div class="col-xs-9 text-right">
				            <h2 class="font-bold">IN</h2>
				        </div>
				    </div>
				</div>
			</div>
			<div class="col-xs-12 col-lg-6">
				<div class="widget style1 red-bg">
				    <div class="row vertical-align" onclick="set_attendence('OUT')">
				        <div class="col-xs-9 text-left">
				            <h2 class="font-bold">OUT</h2>
				        </div>
				        <div class="col-xs-3">
				            <i class="fa fa-forward fa-3x"></i>
				        </div>
				    </div>
				</div>
			</div>
		</div>
	</div>
</div>
<span class="selector" id="qrimg" src="cam.png" onclick="setimg()" align="right"></span>
</div>
</div>
<canvas id="qr-canvas"></canvas>
<script type="text/javascript">load();</script>
</body>

</html>