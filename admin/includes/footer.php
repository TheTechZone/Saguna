    </div>
    <!-- /#wrapper -->

    <!-- jQuery -->
    <script src="js/jquery.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="js/bootstrap.min.js"></script>

	<!-- Charts -->
	<script src="js/loader.js" type="text/javascript"></script>
	<script type="text/javascript">
      google.charts.load('current', {'packages':['bar']});
      google.charts.setOnLoadCallback(drawChart);
      function drawChart() {
        var data = google.visualization.arrayToDataTable([
          ['Data', 'Count'],
          <?php
          $elements_text = ['Active Posts','Draft Posts','Categories', 'Users','Normal Users', 'Uploads'];
          $elements_count = [$post_count,$draft_count,$category_count, $user_count, $non_admins_count,12];
          for ($i=0; $i < 6; $i++ ){
          	echo "['{$elements_text[$i]}' , '{$elements_count[$i]}']" . ",";
          }
          ?>
          // ['Posts', 9000]
        ]);

        var options = {
          chart: {
            title: '',
            subtitle: '',
          }
        };

        var chart = new google.charts.Bar(document.getElementById('columnchart_material'));

        chart.draw(data, options);
      }
    </script>
    <script src="js/tinymce.min.js"></script>
<!--     <script src="js/tinymce.min.js"></script> -->
    <script src="js/popup.js"></script>
    <script type="text/javascript" src="js/scripts.js"></script>
    </body>
</html>
