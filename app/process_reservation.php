<?php

ob_start();
session_start();

require 'DB.php';
require 'Util.php';
require 'dao/BookingReservationDAO.php';
require 'models/Booking.php';
require 'models/Reservation.php';
require 'models/Pricing.php';
require 'models/StatusEnum.php';
require 'handlers/BookingReservationHandler.php';

if (isset($_SESSION["authenticated"]) && $_SESSION["authenticated"][1] == "false") {
    if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["readySubmit"])) {
        $startDate = $endDate = null;
        $errors_ = null;

        if (empty($_POST["start"])) {
            $errors_ .= Util::displayAlertV1("Please select a start date.", "info");
        }
        if (empty($_POST["end"])) {
            $errors_ .= Util::displayAlertV1("Please select an end date.", "info");
        }
        if (!DateTime::createFromFormat('Y-m-d', $_POST["start"])) {
            $errors_ .= Util::displayAlertV1("Invalid start date.", "info");
        }
        if (!DateTime::createFromFormat('Y-m-d', $_POST["end"])) {
            $errors_ .= Util::displayAlertV1("Invalid end date.", "info");
        }
        if (empty($_POST["productname"])) {
            $errors_ .= Util::displayAlertV1("Please select a gown type.", "info");
        }
        if (empty($_POST["quantity"])) {
            $errors_ .= Util::displayAlertV1("Please enter a number of quantity.", "info");
        }

        try {
            $startDate = new DateTime($_POST["start"]);
            $endDate = new DateTime($_POST["end"]);
            if ($endDate <= $startDate) {
                $errors_ .= Util::displayAlertV1("End date cannot be less or equal to start date.", "info");
            }
        } catch (Exception $e) {
            $errors_ .= Util::displayAlertV1("Invalid date type!", "info");
        }

        if (!empty($errors_)) {
            echo $errors_;
        } else {
            $r = new Reservation();
            $r->setCid(Util::sanitize_xss($_POST["cid"]));
            $r->setStatus(\models\StatusEnum::PENDING_STR);
            $r->setNotes(null);
            $r->setStart(Util::sanitize_xss($_POST["start"]));
            $r->setEnd(Util::sanitize_xss($_POST["end"]));
            $r->setproductname(Util::sanitize_xss($_POST["productname"]));
            $r->setRequirement(Util::sanitize_xss($_POST["requirement"]));
            $r->setQuantity(Util::sanitize_xss($_POST["quantity"]));
            $r->setRequests(Util::sanitize_xss($_POST["requests"]));
            $unique = uniqid();
            $r->setHash($unique);

            $p = new Pricing();
            $p->setBookedDate(Util::sanitize_xss($_POST['bookedDate']));
            $p->setNights(Util::sanitize_xss($_POST['numNights']));
            $p->setTotalPrice(Util::sanitize_xss($_POST['totalPrice']));

            $brh = new BookingReservationHandler($r, $p);
            $temp = $brh->create();
            $out = array(
                "success" => "true",
                "response" => Util::displayAlertV2($brh->getExecutionFeedback(), $temp)
            );
            echo json_encode($out, JSON_PRETTY_PRINT);
        }
    }
} else {
    echo "failed";
}
/*
 * validation:
 * if end date is less than start date -> invalid
 * if start date, end date, room type, adults are empty -> invalid
 */
