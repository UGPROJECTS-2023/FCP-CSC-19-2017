<?php 
	if(isset($_SESSION['login_username'])){
		$user = $_SESSION['login_username'];

		$sql = $conn->query("SELECT * FROM `users` WHERE `username` = '$user'");
		$result = $sql->fetch_assoc();
		$user_id = $result['id'];
	}
	else{
		header("location: index.php?page=home");
	}
	// include 'db_connect.php';
	$doctor= $conn->query("SELECT * FROM doctors_list ");
	while($row = $doctor->fetch_assoc()){
		$doc_arr[$row['id']] = $row;
	}
	$patient= $conn->query("SELECT * FROM users where type = 3 ");
	while($row = $patient->fetch_assoc()){
		$p_arr[$row['id']] = $row;
	}
?>
<style type="text/css">
	.yard{margin-top: 70px}
	body{
    background: linear-gradient(rgba(0,0,0,0.8), #000), url(assets/img/1703386860_ngate.jpg);
    background-attachment: fixed;
    background-position: center;    

}
</style>
<div class="container-fluid yard">
	<h1 class="text-white">My Appointments</h1>
	<div class="col-md-12">
		<div class="card bg-dark">
			<div class="card-body">
				<table class="table table-striped table-bordered table-dark table-hover">
					<thead>
						<tr>
							<th>Schedule</th>
							<th>Doctor</th>
							<th>Pateint</th>
							<th>Status</th>
						</tr>
					</thead>
					<?php
						$sql = $conn->query("SELECT * FROM `appointment_list` WHERE `patient_id` = '$user_id' ORDER BY `id` DESC");
						if($sql->num_rows == 0){
							echo "
								<div class = 'alert alert-danger'><b>No appointment record found</b></div>
							";
						}
						while($row = $sql->fetch_assoc()){
							
					?>
					<tr>
						<td><?php echo date("l M d, Y h:i A",strtotime($row['schedule'])) ?></td>
						<td><?php echo "DR. ".$doc_arr[$row['doctor_id']]['name']; ?></td>
						<td><?php echo $p_arr[$row['patient_id']]['name'] ?></td>
						<td>
							<?php if($row['status'] == 0): ?>
								<span class="badge badge-warning">Pending Request</span>
							<?php endif ?>
							<?php if($row['status'] == 1): ?>
								<span class="badge badge-success">Confirmed</span>
							<?php endif ?>
							<?php if($row['status'] == 2): ?>
								<span class="badge badge-info">Rescheduled</span>
							<?php endif ?>
							<?php if($row['status'] == 3): ?>
								<span class="badge badge-info">Done</span>
							<?php endif ?>
						</td>
					</tr>
					<?php } ?>
				</table>
			</div>
		</div>
	</div>
	
	<!-- <div class="col-md-12">
		<div class="card">
			<div class="card-body">
				<button class="btn-primary btn btn-sm" type="button" id="new_appointment"><i class="fa fa-plus"></i> New Appointment</button>
				<br>
				<table class="table table-bordered">
					<thead>
						<tr>
						<th>Schedule</th>
						<th>Doctor</th>
						<th>Pateint</th>
						<th>Status</th>
					</tr>
					</thead>
					<?php 
					$where = '';
					if($_SESSION['login_type'] == 2)
						$where = "WHERE `patient_id` = ".$user_id;
						// $user = "WHERE `patient_id` =   " . $user_id;
					$qry = $conn->query("SELECT * FROM appointment_list ".$where." order by id desc ");
					while($row = $qry->fetch_assoc()):
					?>
					<tr>
						<td><?php echo date("l M d, Y h:i A",strtotime($row['schedule'])) ?></td>
						<td><?php echo "DR. ".$doc_arr[$row['doctor_id']]['name'].', '.$doc_arr[$row['doctor_id']]['name'] ?></td>
						<td><?php echo $p_arr[$row['patient_id']]['name'] ?></td>
						<td>
							<?php if($row['status'] == 0): ?>
								<span class="badge badge-warning">Pending Request</span>
							<?php endif ?>
							<?php if($row['status'] == 1): ?>
								<span class="badge badge-primary">Confirmed</span>
							<?php endif ?>
							<?php if($row['status'] == 2): ?>
								<span class="badge badge-info">Rescheduled</span>
							<?php endif ?>
							<?php if($row['status'] == 3): ?>
								<span class="badge badge-info">Done</span>
							<?php endif ?>
						</td>
					</tr>
				<?php endwhile; ?>
				</table>
			</div>
		</div>
	</div> -->
</div>