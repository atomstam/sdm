<html>
<head>
<style>
body{
font-family: "THSarabun";
/*font-size: 18px;*/
}
</style>
</head>
<body>
					<table width="750" border="0" align="center" cellpadding="0" cellspacing="0" class="formular">
					  <tr>
						<td align="center" style="font-size: 1.6em;"><b>ผลการประเมินบทเรียนดิจิทัลทางการเรียนรู้</b></td>
					  </tr>
					   <tr>
						<td align="center" style="font-size: 1.6em;"><b>หลักสูตร : <span style="border-bottom:1px dotted black;"><?=$course_item['c_name']?></span></b></td>
					  </tr>
					  <tr>
						<td align="center" style="font-size: 1.6em;">&nbsp;&nbsp;</td>
					  </tr>
					</table>
					<table width="750" border="1" align="center" cellpadding="0" cellspacing="0" class="formular">
						<tr>
							<th style="width: 5%;font-size: 1.6em;" class="text-center">
								ที่
							</th>
							<th style="width: 80%;font-size: 1.6em;" class="text-center">
								รายการประเมิน
							</th>
							<th style="width: 15%;font-size: 1.6em;" class="text-center">
								คะแนน
							</th>
						</tr>
					<?php $i=1; foreach ($Item as $Item_list) : $sumScore +=$Item_list['cr_score']; ?>
						<tr>
							<td style="font-size: 1.6em;" align="center">
							<?=$i;?>
							</td>
							<td style="font-size: 1.6em;" class="align-top">
							&nbsp;<?=$Item_list['ite_name'];?>
							</td>
							<td style="font-size: 1.6em;" align="center">
								<?php if($Item_list['ite_num']==1 or $Item_list['ite_num']==4):?>
									<?php if($Item_list['cr_score']==12):?> 12 <?php endif;?>
									<?php if($Item_list['cr_score']==9):?> 9 <?php endif;?>
									<?php if($Item_list['cr_score']==6):?> 6 <?php endif;?>
									<?php if($Item_list['cr_score']==3):?> 3<?php endif;?>
								<?php elseif($Item_list['ite_num']==2):?>
									<?php if($Item_list['cr_score']==10):?> 10 <?php endif;?>
									<?php if($Item_list['cr_score']==7):?> 7 <?php endif;?>
									<?php if($Item_list['cr_score']==4):?> 4 <?php endif;?>
									<?php if($Item_list['cr_score']==1):?> 1 <?php endif;?>
								<?php elseif($Item_list['ite_num']==3):?>
									<?php if($Item_list['cr_score']==6):?> 6 <?php endif;?>
									<?php if($Item_list['cr_score']==4):?> 4 <?php endif;?>
									<?php if($Item_list['cr_score']==2):?> 2 <?php endif;?>
									<?php if($Item_list['cr_score']==0):?> 0 <?php endif;?>
								<?php elseif($Item_list['ite_num']==5 or $Item_list['ite_num']==6 or $Item_list['ite_num']==11):?>
									<?php if($Item_list['cr_score']==3):?> 3 <?php endif;?>
									<?php if($Item_list['cr_score']==2):?> 2 <?php endif;?>
									<?php if($Item_list['cr_score']==1):?> 1 <?php endif;?>
									<?php if($Item_list['cr_score']==0):?> 0 <?php endif;?>
								<?php elseif($Item_list['ite_num']==7):?>
									<?php if($Item_list['cr_score']==9):?> 9 <?php endif;?>
									<?php if($Item_list['cr_score']==6):?> 6 <?php endif;?>
									<?php if($Item_list['cr_score']==3):?> 3 <?php endif;?>
									<?php if($Item_list['cr_score']==0):?> 0 <?php endif;?>
								<?php elseif($Item_list['ite_num']==8):?>
									<?php if($Item_list['cr_score']==8):?> 8 <?php endif;?>
									<?php if($Item_list['cr_score']==6):?> 6 <?php endif;?>
									<?php if($Item_list['cr_score']==4):?> 4 <?php endif;?>
									<?php if($Item_list['cr_score']==2):?> 2 <?php endif;?>
								<?php elseif($Item_list['ite_num']==9 or $Item_list['ite_num']==10):?>
									<?php if($Item_list['cr_score']==7):?> 7 <?php endif;?>
									<?php if($Item_list['cr_score']==5):?> 5 <?php endif;?>
									<?php if($Item_list['cr_score']==3):?> 3 <?php endif;?>
									<?php if($Item_list['cr_score']==1):?> 1 <?php endif;?>
								<?php elseif($Item_list['ite_num']==12):?>
									<?php if($Item_list['cr_score']==6):?> 6 <?php endif;?>
									<?php if($Item_list['cr_score']==0):?> 0 <?php endif;?>
								<?php elseif($Item_list['ite_num']==13):?>
									<?php if($Item_list['cr_score']==4):?> 4 <?php endif;?>
									<?php if($Item_list['cr_score']==2):?> 2 <?php endif;?>
									<?php if($Item_list['cr_score']==1):?> 1 <?php endif;?>
									<?php if($Item_list['cr_score']==0):?> 0 <?php endif;?>
								<?php elseif($Item_list['ite_num']==14):?>
									<?php if($Item_list['cr_score']==10):?> 10 <?php endif;?>
									<?php if($Item_list['cr_score']==5):?> 5 <?php endif;?>
									<?php if($Item_list['cr_score']==0):?> 0 <?php endif;?>
								<?php endif;?>

							</td>
						</tr>
					<?php $i++; endforeach ?>
							<tr>
								<th style="font-size: 1.6em;" colspan="2" align="center">รวม</th>
								<td style="font-size: 1.6em;" align="center"><?=$sumScore;?></td>
							</tr>
				</table>

				<br>
				<table width="750" border="0" align="center" cellpadding="0" cellspacing="0" class="formular">

				  <tr>
					<td align="left" style="font-size: 1.6em;"><b>รวม </b><span style="border-bottom:1px dotted black;"><?=$sumScore;?></span> <b>คะแนน</b> <b>คิดเป็นร้อยละ</b> <span style="border-bottom:1px dotted black;"><?=number_format($sumScore,2);?></span> <b>อยู่ในระดับ</b> <span style="border-bottom:1px dotted black;"><?=Item_Result_P($sumScore);?></span></td>
				  </tr>


				 </table>
				 <br>
				<br>
				<table width="750" border="0" align="center" cellpadding="0" cellspacing="0">
				  <tr>
					<td width="60%" >
					</td>
					<td align="center" ></td>
				 </tr>
				   <tr>
					<td width="60%" >
					</td>
					<td align="center" style="font-size: 1.6em;">ลงชื่อ..........................................กรรมการประเมิน</td>
				 </tr>
				   <tr>
					<td width="60%">
					</td>
					<td align="center" style="font-size: 1.6em;">( <?=$ItemScore['prefix'].$ItemScore['firstName']." ".$ItemScore['lastName'];?> )</td>
				 </tr>
				   <tr>
					<td width="60%">
					</td>
					<td align="center" style="font-size: 1.6em;"><?=FullDateThaiPS($ItemScore['cr_created']);?></td>
				 </tr>
				</table>


</body>
<html>