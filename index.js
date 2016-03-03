$(document).ready(function(){
<<<<<<< HEAD
=======
	
>>>>>>> 6ddb9d011a118c6f355a4e53feb334371da46cc5

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
							window.location.href ='http://collegetrek.info/generateExcel/Download.php';
							}
					});
			}
		});
	
	
	
	})
