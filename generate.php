<?php

require __DIR__ . "/vendor/autoload.php";

use Endroid\QrCode\QrCode;
use Endroid\QrCode\Writer\PngWriter;
use Endroid\QrCode\Color\Color;
use Endroid\QrCode\Label\Label;
use Endroid\QrCode\Label\Alignment\LabelAlignmentLeft;
use Endroid\QrCode\Logo\Logo;
use Endroid\QrCode\ErrorCorrectionLevel\ErrorCorrectionLevelHigh;

$text = $_POST["text"] ?? "Default QR Content"; // Ensure there's a default value

$qr_code = QrCode::create($text)
    ->setSize(600)
    ->setMargin(40)
    ->setForegroundColor(new Color(19, 12, 22)) // Orange
    ->setBackgroundColor(new Color(255,255,255)); // Light blue


$label = Label::create("")->setTextColor(new Color(255, 0, 0)); // Red
$logoPath = __DIR__ . "storage/qr-codes/logo.png"; // Ensure this file exists
$logo = file_exists($logoPath) ? Logo::create($logoPath)->setResizeToWidth(150) : null;

$writer = new PngWriter;
$result = $writer->write($qr_code, logo: $logo, label: $label);

// Output the QR code image to the browser
header("Content-Type: " . $result->getMimeType());
echo $result->getString();

// Save the image to a file
$result->saveToFile(__DIR__ . "/qr-code.png");



