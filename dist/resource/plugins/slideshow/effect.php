<div  class="meta-box-sortables ui-sortable">
<div class="postbox">
<div class="handlediv" title="Click to toggle"><br></div>
<h3 class="hndle"><span>Select Effect</span></h3>
<div class="inside">

<div style="height:10px"></div>
<select style="font-size:12px;margin:0px;padding:0px;width:100%" id="op_effect" name="binfo[op_effect]">
<option>Select a effect</option>
<?php

	$arr = array(
	"0"=>"randomSmart",
    "1" => "cube",
    "2" => "cubeRandom",
	"3" => "block",
	"4"=>"circles",
	"5"=>"cubeStop",
	"6"=>"cubeHide",
	"7"=>"cubeSize",
	"8"=>"horizontal",
	"9"=>"showBars",
	"10"=>"showBarsRandom",
	"11"=>"tube",
	"12"=>"fade",
	"13"=>"fadeFour",
	"14"=>"paralell",
	"15"=>"blind",
	"16"=>"blindHeight",
	"17"=>"blindWidth",
	"18"=>"directionTop",
	"19"=>"directionBottom",
	"20"=>"directionRight",
	"21"=>"directionLeft",
	"22"=>"cubeStopRandom",
	"23"=>"cubeSpread",
	"24"=>"cubeJelly",
	"25"=>"glassCube",
	"26"=>"glassBlock",
	"27"=>"circles",
	"28=circlesInside",
	"29"=>"circlesRotate",
	"30"=>"random"	
	);

foreach($arr as $a=>$key){
	if(get_option('binfo[op_effect]')==$a)
		echo '<option value='.$a.' selected="selected">'.$key.'</option>';
	else
		echo '<option value='.$a.'>'.$key.'</option>';
}
?>

</select>
<div style="height:10px"></div>

<div style="float:left;width:100px">Show shadow:</div>
<div style="float:left">
<input type="radio" name="binfo[show_shadow]" value="1" style="margin:0px 5px 0px 5px !important;" <?php echo ($shadow==1)?'checked="checked"':""; ?>  /><label>Yes</label>
<input type="radio" name="binfo[show_shadow]" value="0" style="margin:0px 5px 0px 5px !important;" <?php echo ($shadow==0)?'checked="checked"':""; ?>  /><label>No</label>
</div>

<div style="clear:both"></div>
<div style="height:10px"></div>

<div style="float:left;width:100px">Show control:</div>
<div style="float:left">
<input type="radio" name="binfo[show_control]" value="1" style="margin:0px 5px 0px 5px !important;" <?php echo ($control==1)?'checked="checked"':""; ?>  /><label>Yes</label>
<input type="radio" name="binfo[show_control]" value="0" style="margin:0px 5px 0px 5px !important;" <?php echo ($control==0)?'checked="checked"':""; ?>  /><label>No</label>
</div>
<div style="clear:both"></div>
</div>
</div>
</div>