<!DOCTYPE html>
<html>

<head>
  <title>Dynamic Drag and Drop table rows in PHP Mysql- ItSolutionStuff.com</title>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.js"></script>
</head>

<body>
  <div class="container">
    <table class="table table-bordered">
      <tr>
        <th>Countryname</th>
        <th>Position</th>
      </tr>
      <tbody class="row_position">
        <?php
        class Dbconn
        {

          function connectdb()
          {

            $mysqli = mysqli_connect("localhost", "root", "12345", "country_city_statedetails");
          }

          function selectdata()
          {
            $mysqli = mysqli_connect("localhost", "root", "12345", "country_city_statedetails");

            $sql = "SELECT * FROM sorting_items ORDER BY position";
            $users = $mysqli->query($sql);
            while ($user = $users->fetch_assoc()) {


        ?>
              <tr id="<?php echo $user['id'] ?>">
                <td><?php echo $user['name'] ?></td>
                <td><?php echo $user['position'] ?></td>
              </tr>
        <?php            }
          }
        }
        $connect = new Dbconn();
        $connect->connectdb();
        $connect->selectdata();



        ?>
      </tbody>
    </table>
  </div> <!-- container / end -->
</body>


<script type="text/javascript">
  $(".row_position").sortable({
    delay: 150,
    stop: function() {
      var selectedData = new Array();
      $('.row_position>tr').each(function() {
        selectedData.push($(this).attr("id"));
      });
      updateOrder(selectedData);
    }
  });


  function updateOrder(data) {
    $.ajax({
      url: "ajaxPro.php",
      type: 'post',
      data: {
        position: data
      },
      success: function() {
        alert('your change successfully saved');
      }
    })
  }
</script>

</html>