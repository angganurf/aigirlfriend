<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $data = file_get_contents("php://input");
    $decoded = json_decode($data, true);

    if ($decoded) {
        file_put_contents('settings.json', json_encode($decoded, JSON_PRETTY_PRINT));
        echo json_encode(["message" => "Settings saved successfully."]);
    } else {
        echo json_encode(["message" => "Failed to save settings."]);
    }
} else {
    echo json_encode(["message" => "Invalid request."]);
}
?>
