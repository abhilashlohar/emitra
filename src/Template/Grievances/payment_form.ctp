<form action="http://emitrauat.rajasthan.gov.in/payments/v1/init" method="POST" id="myForm">
<input type="hidden"  name="MERCHANTCODE" value="HACKATHON2017"/>
<input type="hidden"  name="PRN" value=""/>
<input type="hidden"  name="REQTIMESTAMP" value=""/>
<input type="hidden"  name="PURPOSE" value=""/>
<input type="hidden"  name="AMOUNT" value=""/>
<input type="hidden"  name="SUCCESSURL" value=""/>
<input type="hidden"  name="FAILUREURL" value="http://www.jeelwaterpark.com/grievance/grievances/failurePage"/>
<input type="hidden"  name="CANCELURL" value="http://www.google.com"/>
<input type="hidden"  name="USERNAME" value=""/>
<input type="hidden"  name="USERMOBILE" value=""/>
<input type="hidden"  name="USEREMAIL" value="abhilashlohar01@gmail.com"/>
<input type="hidden"  name="UDF1" value=""/>
<input type="hidden"  name="UDF2" value=""/>
<input type="hidden"  name="UDF3" value=""/>
<input type="hidden"  name="CHECKSUM" value=""/>

<button type="submmit" style="display:none;">Submit</button>
</form>
<br/><br/>
<div align="center"><?php echo $this->Html->image('/img/triangle_square_animation.gif',['width'=>'300px']) ?></div>

<script>
function setValueinForm(PRN,REQTIMESTAMP,PURPOSE,AMOUNT,USERNAME,USERMOBILE,USEREMAIL,CHECKSUM,user_id){

     //window.JSInterface.doEchoTest(PRN);
	 document.getElementsByName('PRN')[0].value = PRN;
	 document.getElementsByName('REQTIMESTAMP')[0].value = REQTIMESTAMP;
	 document.getElementsByName('PURPOSE')[0].value = PURPOSE;
	 document.getElementsByName('AMOUNT')[0].value = AMOUNT;
	 document.getElementsByName('USERNAME')[0].value = USERNAME;
	 document.getElementsByName('USERMOBILE')[0].value = USERMOBILE;
	 //document.getElementsByName('USEREMAIL')[0].value = USEREMAIL;
	 document.getElementsByName('CHECKSUM')[0].value = CHECKSUM;
	 
	 document.getElementsByName('SUCCESSURL')[0].value = "http://www.jeelwaterpark.com/grievance/grievances/successPage?PRN="+PRN+"&AMOUNT="+AMOUNT+"&user_id="+user_id;
submitForm();
}

function submitForm(){
	document.getElementById("myForm").submit();
	
}
</script>


