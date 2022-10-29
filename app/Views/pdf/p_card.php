<?php
if($level==1):
	$Img='uploads/card/1.png';
elseif($level==2):
	$Img='uploads/card/2.png';
elseif($level==3):
	$Img='uploads/card/3.png';
elseif($level==4):
	$Img='uploads/card/4.png';
else:
	$Img='uploads/card/5.png';
endif

?>
<html>
<head>
<style>
body {
	/*background: url('<?=base_url('uploads/card/'.$level.'.png')?>') no-repeat 0 0;
	background: url('<?=base_url();?>/uploads/card/1.jpg') no-repeat 0 0;
    background-image-resize: 6;
	font-family: "THSarabun";*/
}
.text-number {
    color: #000000;
    text-align: right;
    font-size: 18px;
}
.text-name1 {
    margin-top: 210px;
    font-size: 4em;    
    text-align: center;
}
.text-name2 {
    margin-top: 151px;
    margin-left: 410px;
    font-size: 2.2em;    
}
.text-name {
    margin-top: 190px;
    font-size: 4em;    
    text-align: center;
}
.text-topic {
    margin-top: 40px;
    font-size: 2em;    
    text-align: center;
}

</style>
</head>
<body style="background-image: url('<?=$Img;?>');
             background-position: top left;
             background-repeat: no-repeat;
             background-image-resize: 4;
             background-image-resolution: from-image;">
<div class="text-name" >
</div>
<br>
<div class="text-name" >
    <?=$name;?>
</div>
<br>
<div class="text-name2" >
    14
</div>
</body>
<html>