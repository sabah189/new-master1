<!DOCTYPE html>
<html lang="en">
<head>
  <title>FullCalendar with Event Modal Dialog Example - XpertPhp</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/3.10.0/fullcalendar.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.0/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/moment.js/2.8.2/moment.min.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/fullcalendar/2.1.1/fullcalendar.min.js"></script>
	<script>
	$(document).ready(function() {
		
		$('#calendar').fullCalendar({
			header: {
				left: 'prev,next today',
				center: 'title',
				right: 'month,agendaWeek,agendaDay'
			},
			defaultDate: new Date(),
			defaultView: 'month',
			editable: true,
			events:'data.php',
			selectable:true,
            selectHelper:true,
            select: function(start, end, allDay)
            {
                var start = moment(start).format('YYYY-MM-DD HH:mm:ss');
                var end = moment(end).format('YYYY-MM-DD HH:mm:ss');

                sessionStorage.setItem('start_date', start);
                sessionStorage.setItem('end_date', end);
                $("#btnModal").trigger("click");
            },
		});

		$("#btnBook").click(function(){
            var txtTitle = $("#txtTitle").val();
            if(txtTitle)
            {
                $.ajax({
                    url:"insert_data.php",
                    type:"POST",
                    data:{title:txtTitle,start:sessionStorage.getItem('start_date'),end:sessionStorage.getItem('end_date')},
                    success:function(data)
                    {
                        //alert(data);
                        if(data == "success")
                        {
                            sessionStorage.setItem('start_date', "");
                            sessionStorage.setItem('end_date', "");
                            window.location.reload();
                        }
                    }
                })
            }
        });
		
	});

	</script>
</head>
<body>

<div class="container">
  <div id='calendar'></div>
    <button style="display: none" type="button" id="btnModal" class="btn btn-info btn-lg" data-toggle="modal" data-target="#myModal">Open Modal</button>

    <!-- Modal -->
    <div class="modal fade" id="myModal" role="dialog">
        <div class="modal-dialog">

            <!-- Modal content-->
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4 class="modal-title">Add Book</h4>
                </div>
                <div class="modal-body">
                    <form>
                        <div class="form-group">
                            <label for="txtTitle">Title:</label>
                            <input type="text" name="txtTitle" class="form-control" id="txtTitle">
                        </div>
                        <button type="button" id="btnBook" class="btn btn-default">Book</button>
                    </form>
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