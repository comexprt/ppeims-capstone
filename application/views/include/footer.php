	</main>
	<script src="<?=base_url();?>js/jquery-3.1.1.min.js"></script>
	<script src="<?=base_url();?>js/script.js"></script>
    <script src="<?=base_url();?>assets/js/bootstrap.min.js"></script>
    <script src="<?=base_url();?>assets/js/jquery-ui-1.9.2.custom.min.js"></script>
    <script src="<?=base_url();?>assets/js/jquery.ui.touch-punch.min.js"></script>
    <script class="include" type="text/javascript" src="<?=base_url();?>assets/js/jquery.dcjqaccordion.2.7.js"></script>
    <script src="<?=base_url();?>assets/js/jquery.scrollTo.min.js"></script>
    <script src="<?=base_url();?>assets/js/jquery.nicescroll.js" type="text/javascript"></script>
	<script src="<?=base_url();?>assets/js/datatables/metisMenu.min.js"></script>
	<script src="<?=base_url();?>assets/js/datatables/jquery.dataTables.min.js"></script>
    <script src="<?=base_url();?>assets/js/datatables/dataTables.bootstrap.min.js"></script>

    <!--common script for all pages-->
    <script src="<?=base_url();?>assets/js/common-scripts.js"></script>

    <!--script for this page-->
    <script>
		$(document).ready(function() {
			$('#dataTables-example').DataTable({
					responsive: true
			});
		});
    </script>

</body>
</html>