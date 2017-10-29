</div>

<!-- Vendor -->
<script src="vendor/jquery/jquery.min.js"></script>
<script src="vendor/jquery.appear/jquery.appear.min.js"></script>
<script src="vendor/jquery.easing/jquery.easing.min.js"></script>
<script src="vendor/jquery-cookie/jquery-cookie.min.js"></script>
<script src="vendor/bootstrap/js/bootstrap.min.js"></script>
<script src="vendor/common/common.min.js"></script>
<script src="vendor/jquery.validation/jquery.validation.min.js"></script>
<script src="vendor/jquery.easy-pie-chart/jquery.easy-pie-chart.min.js"></script>
<script src="vendor/jquery.gmap/jquery.gmap.min.js"></script>
<script src="vendor/jquery.lazyload/jquery.lazyload.min.js"></script>
<script src="vendor/isotope/jquery.isotope.min.js"></script>
<script src="vendor/owl.carousel/owl.carousel.min.js"></script>
<script src="vendor/magnific-popup/jquery.magnific-popup.min.js"></script>
<script src="vendor/vide/vide.min.js"></script>

<!--[if !IE]> -->
<script src="js/jquery-2.1.4.min.js"></script>
<!-- <![endif]-->

<!-- Pie Chart -->
<script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>

<!-- Autolog -->
<script type="text/javascript" src="js/autologout.js"></script>

<!-- Theme Base, Components and Settings -->
<script src="js/theme.js"></script>
<!-- Current Page Vendor and Views -->
<script src="js/views/view.contact.js"></script>

<!-- Theme Custom -->
<script src="js/custom.js"></script>

<!-- Theme Initialization Files -->
<script src="js/theme.init.js"></script>

<!-- Google Analytics: Change UA-XXXXX-X to be your site's ID. Go to http://www.google.com/analytics/ for more information.
		<script>
			(function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
			(i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
			m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
			})(window,document,'script','//www.google-analytics.com/analytics.js','ga');
		
			ga('create', 'UA-12345678-1', 'auto');
			ga('send', 'pageview');
		</script>
		 -->

<!-- inline scripts related to this page -->
<!-- Script Load ID Pelanggan -->
<script type="text/javascript">
function idpelanggan() {
    var id = document.getElementById("pelanggan").value;
    window.location.href = "?pelanggan=" + id;
}
</script>
<!-- ./Script Load ID Pelanggan -->
<!-- Pie Chart Activity -->
<script type="text/javascript">
     google.charts.load('current', {'packages':['corechart']});
      google.charts.setOnLoadCallback(drawChart);

      function drawChart() {

        var data = google.visualization.arrayToDataTable([
          ['Activity', 'Day'],
        <?php
            //Cek role user
            if($_SESSION['role'] == "admin"){
                $chart_act = mysqli_query($conn,"SELECT DISTINCT nm_activity, sum(if(id_produk='$id_menus', waktu_activity, 0)) as waktu_activity FROM act_admin WHERE id_produk='$id_menus' GROUP by nm_activity DESC");
                //Looping untuk menemukan activity yang sesuai menu dan admin
                while($rchart = mysqli_fetch_array($chart_act)){
        ?>
                   ['<?php echo $rchart['nm_activity']; ?>',     <?php echo $rchart['waktu_activity']; ?>],
        <?php  
               }
            }else{
                if($_SESSION['role'] == "tim"){
                    //Ambil data nm_activity dan total hari tiap activity
                    $activs = mysqli_query($conn,"SELECT DISTINCT nm_activity, sum(if(id_produk='$id_menus' AND id_pelanggan='$id_pelanggan', waktu_activity, 0)) as waktu_activity FROM act_test WHERE id_produk='$id_menus' AND id_pelanggan='$id_pelanggan' GROUP by nm_activity DESC");
                    while($ractivs = mysqli_fetch_array($activs)){
        ?>
                        ['<?php echo $ractivs['nm_activity']; ?>',     <?php echo $ractivs['waktu_activity']; ?>],
        <?php  
                    }
                }else{
                    if($_SESSION['role'] == "customers"){
                        $chart_cus = mysqli_query($conn,"SELECT DISTINCT nm_activity, sum(if(id_produk='$id_menus', waktu_activity, 0)) as waktu_activity FROM act_admin WHERE id_produk='$id_menus' GROUP by nm_activity DESC");
                        //Looping untuk menemukan activity yang sesuai menu
                        while($rcus = mysqli_fetch_array($chart_cus)){
        ?>
                            ['<?php echo $rcus['nm_activity']; ?>',     <?php echo $rcus['waktu_activity']; ?>],
        <?php
                        }
                    }
                }
            }
        ?>
        ]);

        var options = {
          title: 'Diagram Activities'
        };

        var chart = new google.visualization.PieChart(document.getElementById('piechart'));

        chart.draw(data, options);
      }
</script>
<!-- .Pie Chart Activity -->

</body>
</html>