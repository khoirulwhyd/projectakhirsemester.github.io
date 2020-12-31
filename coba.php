<?php 
@session_start();
print_r($_SESSION);
?>
<!DOCTYPE html>
<html>
<head>
	<title>asadas</title>
</head>
<body>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<button type="button" class="btn btn-gmail g" id="signinButton" name="12" val="1"onclick="edit_calon('22');">
signin</button>
<p id="edit_form"></p>
</form>
</body>

</html>
<script src="source/js/jquery-1.8.3.min.js"></script>
<script src="source/js/materialize.min.js"></script>
<script type="text/javascript">

      function edit_calon(id) {
          $('#edit_form').load('welcome.php?id=' + id);

      }
</script>

