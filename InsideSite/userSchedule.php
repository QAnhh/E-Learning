<?php

//Nếu đã đăng nhập

require_once "progress/dbConnect.php";
if (!isset($student) || !$student->is_loggedin()) {
	header("Location:index.php?page=login");
	ob_end_flush();
}

$sql = "SELECT * FROM `students` WHERE `id` =  '" . $_SESSION['id'] . "'";
$users = $conn->query($sql)->fetch();

$sql1 = "SELECT * FROM `student_attendances` WHERE `student_code` = '" . $users['code'] . "'";
$stu_attens = $conn->query($sql1)->fetchAll();
date_default_timezone_set('Asia/Ho_Chi_Minh');
function checktime($a)
{
	$date1 = date("Y-m-d H:i:s", strtotime($a));
	$date2 = date("Y-m-d H:i:s");
	$diff = strtotime($date2) - strtotime($date1);

	if ($diff > 0 && $diff < 3 * 3600) {
		return true;
	} else {
		return false;
	}
}
?>
<section class="breadcrumb_part">
	<div class="container">
		<div class="row">
			<div class="col-lg-12">
				<div class="breadcrumb_iner">
					<h2>Thời Khóa Biểu</h2>
				</div>
			</div>
		</div>
	</div>
</section>

<section class="schedule mt-4">
	<div class="container">
		<link rel="stylesheet" href="css/main.min.css">
		<script src="js/main.min.js"></script>
		<script src="js/locales-all.min.js"></script>
		<script>
			document.addEventListener('DOMContentLoaded', function() {
				var calendarEl = document.getElementById('calendar');

				var calendar = new FullCalendar.Calendar(calendarEl, {
					initialView: 'dayGridMonth',
					initialDate: new Date(),
					timeZone: 'local',
					headerToolbar: {
						left: 'prev,next today',
						center: 'title',
						right: 'dayGridMonth,timeGridWeek,timeGridDay'
					},
					events: [
						<?php
						foreach ($stu_attens as $stu_atten) {
							$sql2 = "SELECT * FROM `classroom_units` WHERE `id` = '" . $stu_atten['classroom_unit_id'] . "'";
							$class_units = $conn->query($sql2)->fetchAll();
							foreach ($class_units as $class_unit) {
						?> {
									start: "<?= $class_unit['learn_time']; ?>",
									<?php
									$sql3 = "SELECT * FROM `class_rooms` WHERE `id` = '" . $class_unit['classroom_id'] . "'";
									$classroom = $conn->query($sql3)->fetch();
									?>
									title: "<?= $classroom['class_name']; ?>",
									backgroundColor: "<?= checktime($class_unit['learn_time']) ? 'red' : 'green'; ?>",
									url: "<?php if (checktime($class_unit['learn_time'])) echo 'http://103.9.159.73/'; ?>",
									classNames: "<?php if (checktime($class_unit['learn_time'])) echo 'join-bandage'; ?>",
								},
						<?php
							}
						} ?>

					],
				});

				calendar.render();

				setTimeout(() => {
					let html = `<div class="fc-event-join">JOIN</div>`
					$('.join-bandage').append(html)
				}, 1000)
			});
		</script>
		<div id='calendar'></div>
	</div>
</section>

<style>
	.fc-event-join {
		color: #fff;
		margin-right: 2px;
		font-weight: 700;
		background-color: red;
		padding: 5px;
		border-radius: 8px
	}
</style>
