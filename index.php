<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <title>itOffide.com :: Datatables</title>
  <link rel="stylesheet" type="text/css" href="media/css/jquery.dataTables.min.css">
  <script src="media/js/jquery.js" type="text/javascript"></script>
  <script src="media/js/jquery.dataTables.js" type="text/javascript"></script>
  <style media="screen">
    .content{
      width: 900px;
      margin:0 auto;
      padding: 10px;
      border: 1px solid #999;
    }
  </style>
</head>
<body>
  <div class="content">
    <table id="example" class="display" cellspacing="0" width="100%">
      <thead>
        <tr>
          <th>First name</th>
          <th>Last name</th>
          <th>Position</th>
          <th>Office</th>
          <th>Start date</th>
          <th>Salary</th>
        </tr>
      </thead>
      <tfoot>
        <tr>
          <th colspan="4" align="right">Total : </th>
          <th colspan="2"></th>
        </tr>
      </tfoot>
    </table>
  </div>

  <script type="text/javascript">
  $(document).ready(function() {
    $('#example').DataTable( {
      "processing": true,
      "serverSide": true,
      "ajax": "server_processing.php",
      "footerCallback": function ( row, data, start, end, display ) {
            var api = this.api(), data;

            // Remove the formatting to get integer data for summation
            var intVal = function ( i ) {
                return typeof i === 'string' ?
                    i.replace(/[\$,]/g, '')*1 :
                    typeof i === 'number' ?
                        i : 0;
            };

            // Total over all pages
            total = api
                .column( 5 )
                .data()
                .reduce( function (a, b) {
                    return intVal(a) + intVal(b);
                }, 0 );

            // Total over this page
            pageTotal = api
                .column( 5, { page: 'current'} )
                .data()
                .reduce( function (a, b) {
                    return intVal(a) + intVal(b);
                }, 0 );

            // Update footer
            $( api.column( 5 ).footer() ).html(
                '$'+pageTotal +' total'
            );
        }
    } );
  } );
  </script>
</body>
</html>
