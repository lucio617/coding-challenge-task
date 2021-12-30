<!DOCTYPE html>
<html>
<head>
	<title>Form</title>
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
</head>
<body>
<h1>Form Validations</h1>
<?php if(isset($validation)): ?>
	<?= $validation->listErrors();?> 
<?php endif;?>

<?= form_open();?>
<div class="form-group">
    
		 <?php 
		 $json_data = file_get_contents('D:\xampp\htdocs\ci_form\app\Views\data.txt');
		 $json=json_decode($json_data, true);
		 
		 echo '<select class="form-control form-control-sm" name="users" class="form-control">';
		 foreach($json as $elem) {
			echo '<option>'.$elem['name']. '</option>';
		  }
		 ?>
		 <label for="subject">Body</label>
         <textarea class="form-control" id="subject" name="body" placeholder="Body" style="height:200px"></textarea>
		 <input type="text" name='title' placeholder="Title" id="u_title" class="form-control">
     </div>	
		 <button type="submit" class= "btn btn-primary"value="Submit" onclick="New()">Submit</button>
<?=form_close();?> 
<script>
  try{
  function New(){
  fetch("https://jsonplaceholder.typicode.com/posts", {
     
     
     method: "POST",
      
    
     body: JSON.stringify({
         title: <?= $title;?>,
         body: <?= $body;?>,
         userId: <?= $id;?>
     }),
      
     
     headers: {
         "Content-type": "application/json; charset=UTF-8"
     }
 })
  
 
 .then(response => response.json())
  
 
 .then(json => console.log(json));
}
  }
  catch(err)
  {
    alert(err.message);
  }
</script>
</body>
</html>
