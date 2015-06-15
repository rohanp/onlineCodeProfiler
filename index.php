<!DOCTYPE html>
<html lang="en">
    <head>
        <link href="css-frameworks/bootstrap.min.css" rel="stylesheet">
        <link href="css-frameworks/flat-ui/flat-ui.min.css" rel="stylesheet">
        <link href="css-frameworks/pure.min.css" rel="stylesheet">
        <title> Lab 09 </title>
    </head>
   
   <style>
   	#form{
		clear: both;
		float:left;
	}
	#right{
		float:right;
	}
   </style>


    <body>
        <div class="container">
		<br>	
	
		<form id="form">
			
			<textarea class="code" name="top_code" rows="10" cols="40" >
#cython: profile=True

def main():
	print("hello, world!")

if __name__ == "__main__":
	main()
			</textarea> <br>
			
			<textarea class="code" name="bot_code" rows="10" cols="40" >
#!/usr/bin/env python

def main():
	print("hello, world!")

if __name__ == "__main__":
	main()

			</textarea> <br>

			<button type="submit"> Profile Code </button>
		</form>

       		<div id="top_right">
			<textarea id="top_output" rows="10" cols="50" readonly>
			</textarea>
       		</div>
       
      		<div id="bot_right">
			<textarea id="bot_output" rows="10" cols="50" readonly>
			</textarea>
       		</div>
       
       </div>


        <script src="js/jquery.min.js"> </script>
        <script src="js/flat-ui.min.js"> </script>
    	
	<script>
	
	$("#form").submit( function(e)
	{
		e.preventDefault();

		$.ajax(
		{
			url: "profile.php",
			type: "post",
			data: $(this).serialize(),
			dataType: "json",
			success: function(json) {
							console.log(json);
							$('#top_output').val( json[0] );
							$('#bot_output').val( json[1] );

						},
			error: function(xhr, stat, error){
							console.log(error);
						}
		});
	});

	$(document).delegate('.code', 'keydown', function(e) {
	  var keyCode = e.keyCode || e.which;

	    if (keyCode == 9) {
			e.preventDefault();
			var start = $(this).get(0).selectionStart;
			var end = $(this).get(0).selectionEnd;

			// set textarea value to: text before caret + tab + text after caret
			$(this).val($(this).val().substring(0, start)	+ "\t" + $(this).val().substring(end));

			// put caret at right position again
			$(this).get(0).selectionStart = $(this).get(0).selectionEnd = start + 1;
			}
		 });
	</script>
    </body>
</html>
