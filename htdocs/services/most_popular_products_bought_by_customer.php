<?php
include_once "./connection.php";

$customer_card_id = $_POST["card_id"];

$sql = "
SELECT * FROM `most_frequent_products_by_id` where card_id = ? ORDER by cnt desc limit 10
";


$stmt = $conn->prepare($sql);
$stmt->bind_param("i", $customer_card_id);
$stmt->execute();
$res = $stmt->get_result();
$result = $res->fetch_all(MYSQLI_ASSOC);

echo json_encode($result, JSON_UNESCAPED_UNICODE);
