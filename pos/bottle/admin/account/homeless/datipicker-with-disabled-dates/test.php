

<!doctype html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>jQuery UI Datepicker - Default functionality</title>
  <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
  <link rel="stylesheet" href="/resources/demos/style.css">
  <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
  <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
  <script>
  $( function() {
    $( "#datepicker" ).datepicker();
  } );
  </script>





<script>
    $(document).ready(function() {
        $("#kalender").datepicker({
            firstDay: 1,
            dayNamesMin: ['Sö', 'Må', 'Ti', 'On', 'To', 'Fr', 'Lö'],
            monthNames: ['Januari', 'Februari', 'Mars', 'April', 'Maj', 'Juni', 'Juli', 'Augusti', 'September', 'Oktober', 'November', 'December'],
            dateFormat: "yy-mm-dd",
            onSelect: function(dateText, inst) {
                var myDate = new Date(dateText);
                var newFormat = $.datepicker.formatDate('yy-mm-dd', myDate);
                $.ajax({
                    url: 'events.php',
                    type: 'POST',
                    dataType: 'json',
                    data: {selectedData: newFormat},
                    success: function(result) {
                        if (result.date === newFormat) {
                            $('#event').html(result['date'] + "<br />\n" + result['event']);
                        }
                        else {
                            $('#event').html(result['none']);
                        }
                    }
                });
            }, beforeShowDay: function(date) {

                var yy = date.getFullYear(), mm = date.getMonth() + 1, dd = date.getDate();
                if (dd < 10) {
                    var dt = yy + "-" + mm + "-0" + dd;
                } else {
                    var dt = yy + "-" + mm + "-" + dd;
                }
<?php include_once ('eventdates.php') ?>
                return [true, ''];

            }
        });

    });
</script>





  
</head>
<body>
 
<p>Date: <input type="text" id="datepicker"></p>


 
 
</body>
</html>
