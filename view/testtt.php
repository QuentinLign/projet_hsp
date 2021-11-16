<?php

$date = date("Y-m-d");
$num_week_actual = date('W', strtotime($date));
$year_actual = date('Y', strtotime($date));
$month_actual = date('n', strtotime($date));

$week_actual = array();
for($i = 1; $i <= 365; $i++) {
            $week = date("W", mktime(0, 0, 0, $month_actual, $i, $year_actual));
            if($week == $num_week_actual) {

                for($d = 0; $d < 5; $d++) {
                    $week_actual[$d] = new \DateTime(date("Y-m-d", mktime(0, 0, 0, $month_actual, $i+$d, $year_actual)) . " 00:00:00");
                    $appointments_week[$d] = $em
                        ->getRepository('SophrologieBundle:Appointment')
                        ->findAllAppointmentsByDay($week_actual[$d]);
                }
                break;
    }
}
?>
