<?php
    require_once("../../funciones/conexion.php");

    $idEscuela = $_GET['id'];

    $stmt = $conn->prepare("SELECT * FROM escuelas  WHERE id='$idEscuela'");
    $stmt->execute();

    
    $result = $stmt->setFetchMode(PDO::FETCH_ASSOC);
    $escuela = $stmt->fetchAll()[0];
    

    

?>

<?php include_once("../../includes/head.php") ?>


<body>

	<?php include_once("../../includes/navbar.php") ?>


	<!-- Page content -->
	<div class="page-content">

		<?php include_once("../../includes/sidebar.php") ?>


		<!-- Main content -->
		<div class="content-wrapper">

			<!-- Page header -->
			<div class="page-header page-header-light">
				<div class="breadcrumb-line breadcrumb-line-light header-elements-md-inline">
					<div class="d-flex">
						<div class="breadcrumb">
							<a href="index.html" class="breadcrumb-item"><i class="icon-home2 mr-2"></i> ADMIN</a>
							<span class="breadcrumb-item active">CREAR ESCUELA</span>
						</div>
						<a href="#" class="header-elements-toggle text-default d-md-none"><i class="icon-more"></i></a>
					</div>
				</div>
			</div>
			<!-- /page header -->


			<!-- Content area -->
			<div class="content">

				<!-- Main charts -->
				<div class="row">
					<div class="col-xl-12">

						<!-- Traffic sources -->
						<div class="card">
							<div class="card-header header-elements-inline">
								<h6 class="card-title">CREAR ESCUELA</h6>

							</div>

							<div class="card-body py-0">
								<form id="modificarEscuelaForm" >
									<div class="form-group row">
										<label class="col-lg-3 col-form-label">NOMBRE ESCUELA:</label>
										<div class="col-lg-9">
											<input name="nombreEscuela" type="text" class="form-control" value="<?php echo($escuela["escuela"]) ?>" placeholder="NOMBRE ESCUELA">
										</div>

										
									</div>
									<div class="text-right mb-3">
                                        <input type="hidden" name="id" value="<?php echo($_GET["id"]) ?>">
										<button type="submit" class="btn btn-warning">MODIFICAR <i class="icon-paperplane ml-2"></i></button>
									</div>
								</form>
							</div>

						</div>
						<!-- /traffic sources -->

					</div>
				</div>
				<!-- /main charts -->
			</div>
			<!-- /content area -->

            <?php include_once("../../includes/footer.php") ?>
			
		</div>
		<!-- /main content -->
	</div>
	<!-- /page content -->
	<script src="../../js/admin/modificarEscuela.js" ></script>
</body>
</html>
