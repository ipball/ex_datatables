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
      width: 800px;
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
          <th>First name</th>
          <th>Last name</th>
          <th>Position</th>
          <th>Office</th>
          <th>Start date</th>
          <th>Salary</th>
        </tr>
      </tfoot>
    </table>
  </div>

  <script type="text/javascript">
  $(document).ready(function() {
    $('#example').DataTable( {
      "processing": true,
      "serverSide": true,
      "ajax": "server_processing.php"
    } );
  } );
  </script>
</body>
</html>
