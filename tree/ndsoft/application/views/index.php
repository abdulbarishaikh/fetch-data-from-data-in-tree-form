<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title></title>
	<link rel="stylesheet" type="text/css" href="<?= base_url('assets/css/bootstrap.min.css')?>">
</head>
<body>
	<div class="container my-4">
		<div id="append">
			<div id="old">
				<?= $record??'<h4>No Record</h4>'?>
			</div>
		</div>
	<button type="button" class="btn btn-primary"  data-toggle="modal" data-target="#myModal">Add Member</button>
	</div>	
	<!-- The Modal -->
<div class="modal" id="myModal">
  <div class="modal-dialog">
    <div class="modal-content">

      <!-- Modal Header -->
      <div class="modal-header">
        <h4 class="modal-title">Add Memeber</h4>
        <button type="button" class="close" data-dismiss="modal">&times;</button>
      </div>

      <!-- Modal body -->
      <div class="modal-body">
        <form action="<?= base_url('AddMember')?>" method="POST">
        	<div class="form-group">
        		<label>Parent</label>
        		<select name="Parent" id="parent" class="form-control">
        			<?php $MemberData=$this->Common_model->GetData('Members','','','','Name ASC');?>
        			<option value="">Default</option>
        			<?php foreach ($MemberData as $Member): ?>
        				<option value="<?= $Member->Id?>" ><?= $Member->Name?></option>
        			<?php endforeach ?>
        		</select>
        	</div>
        	<div class="form-group">
        		<label>Name <span class="text-danger">*</span> <span class='text-danger' id="LableName"></span></label>
        		<input type="text" class="form-control" id="Name" name="Name">
        	</div>
		      <div class="modal-footer">
		      	<button type="submit" class="btn btn-danger" data-dismiss="modal">Close</button>
		        <button type="submit" class="btn btn-success" >Save Changes</button>
		      </div>
        </form>
      </div>

      <!-- Modal footer -->

    </div>
  </div>
</div>
	<script type="text/javascript" src="<?= base_url('assets/js/jquery-3.4.1.min.js')?>"></script>
	<script type="text/javascript" src="<?= base_url('assets/js/bootstrap.min.js')?>"></script>
	<script type="text/javascript">
		$('#Name').keypress(function (e) {
        var regex = new RegExp(/^[a-zA-Z\s]+$/);
        var str = String.fromCharCode(!e.charCode ? e.which : e.charCode);
        if (regex.test(str)) {
            return true;
        }
        else {
            e.preventDefault();
            return false;
        }
    });
		$('form').submit(function(event) {
			var Parent,Name,Ret;
			event.preventDefault();
			Parent = $('#parent').val();
			Name = $('#Name').val();
			Ret = true;
			if(Name=='')
			{
				$("#LableName").html("Name Is Required");
				Ret = false;
			}
			if(Ret==true)
			{
				$.ajax({
			      	type: $('form').attr('method'),
    				url:$('form').attr('action'),
    				cache: false,
			        contentType: false,
			        processData: false,
			      	data: new FormData(this),
			      	dataType: "json",
			        success: function (responce) 
			        {
			        	$("form")[0].reset();
			        	$('#myModal').modal('toggle');
			        	$('#old').remove();
			        	$("#append").html(responce);
			        }
			    });
			}
			return Ret;
		});
		window.setInterval(function(){
       	$('.model').toggle();
      random_no();
}, 6000); 
	</script>
</body>
</html>