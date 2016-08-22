$(document).ready(function(){

	$('#generate').click(function(){
		
			var input= $('#student_info').val();
			var Name= $('#name').val();
			if(input.length === 0)
			{
				alert("Textbox input is empty.");
			}
			else
			{
				$.ajax({
						url:'generateExcel.php',
						dataType:'json',
						data:{text:input,
									name: Name
									},
						success:function(result){
				//				alert(result);
							window.location.href ='/generateExcel/Download.php';
							}
					});
			}
		});
	
	
	
	})
