<?php include_once("../../includes/head.php") ?>
<?php require_once("../../funciones/conexion.php") ?>

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
								<h6 class="card-title">LISTA ESCUELAS</h6>

							</div>
							<div class="card-body py-0">
                                <?php 
                                    $sql = "SELECT * FROM escuelas";

                                    $stmt = $conn->prepare($sql);
                                    $stmt->execute();

                                    $result = $stmt->setFetchMode(PDO::FETCH_ASSOC);
                                ?>
                                <table class="table datatable-basic">
                                    <thead>
                                        <tr>
                                            <th>ID</th>
                                            <th>ESCUELA</th>
                                            <th>MODIFICAR</th>
                                            <th>ELIMINAR</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php foreach($stmt->fetchAll() as $k=>$v) { ?>
                                            <tr id="escuela<?php echo( $v["id"]) ?>">
                                                <td><?php echo( $v["id"]) ?></td>
                                                <td><?php echo( $v["escuela"]) ?></td>
                                                <td><a href="modificarEscuela.php?id=<?php echo( $v["id"]) ?>"><button  class="btn btn-warning ">MODIFICAR</button></a></td>
                                                <td><button id="<?php echo( $v["id"]) ?>" class="btn btn-danger eliminarEscuela">ELIMINAR</button></td>
                                            </tr>
                                        <?php }?>
                                    </tbody>
                                </table>
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
	<script src="../../js/admin/eliminarEscuela.js" ></script>
</body>
</html>