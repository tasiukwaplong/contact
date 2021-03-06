<!DOCTYPE html>
<html lang="en">
<head>
  <title>.::Contact::.</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.0/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
</head>
<body>

<h1 class="text-center"><i class="glyphicon glyphicon-user"></i>&nbsp;Contact List</h1>
<hr/>
<div class="container">
	<div class="row">
		<div class="col-sm-6">
		<h2>
			<span class="glyphicon glyphicon-plus"></span>
		</h2>
			<button type="button" class="btn btn-info btn-lg" data-toggle="modal" data-target="#myModal" title="add Contact">Add Contact</button>
		</div>

		<div class="col-sm-6">
			<h2>
			<span class="glyphicon glyphicon-list-alt"></span>
		</h2>
		<a href= "list/" class="btn btn-info btn-lg" title="See Contact List">Contact List</a>			
		</div>
	</div>

  <!-- Modal -->
  <div class="modal fade" id="myModal" role="dialog">
    <div class="modal-dialog modal-lg">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title text-center">Add Contact</h4>
        </div>
        <div class="modal-body">
        	<center>
        		<form action="add/" method="GET">

        			<div class="input-group col-xs-8">
        				<span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>   
        				<input id="cname" type="text" class="form-control" name="cname" placeholder="Contact name">
        			</div>
        			<br>
        			<div class="input-group col-xs-8">
        				<span class="input-group-addon"><i class="glyphicon glyphicon-phone"></i></span>
        				<input id="Phone Number" type="number" class="form-control" name="cphone" placeholder="Contact phone">
        			</div>

        			<div class="input-group col-xs-8">
        				<br>
        				<input type="submit" class="btn btn-primary" value="Add" />
        			</div>

        		</form>
        	</center>

        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        </div>
      </div>
    </div>
  </div>
</div>

</body>
</html>
