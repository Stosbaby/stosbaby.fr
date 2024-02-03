<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST["name"];
    $email = $_POST["email"];
    $subject = $_POST["subject"];
    $message = $_POST["message"];

    // Traitement des pièces jointes
    $attachments = [];
    if (!empty($_FILES["attachments"]["name"][0])) {
        $uploadDirectory = "uploads/";
        foreach ($_FILES["attachments"]["name"] as $key => $filename) {
            $tmpFilePath = $_FILES["attachments"]["tmp_name"][$key];
            $newFilePath = $uploadDirectory . $filename;
            move_uploaded_file($tmpFilePath, $newFilePath);
            $attachments[] = $newFilePath;
        }
    }

    // Envoi des données à votre système ou à votre adresse email
// Traitement des données
$data = [
    "name" => $name,
    "email" => $email,
    "subject" => $subject,
    "message" => $message,
    "attachments" => $attachments
];

// Envoi des données par e-mail
$to = "axelmendes466@gmail.com";  // Remplacez ceci par votre adresse e-mail
$subjectEmail = "Nouveau message depuis le formulaire de contact";

// Construire le corps du message
$messageEmail = "Nom: $name\n";
$messageEmail .= "Email: $email\n";
$messageEmail .= "Sujet: $subject\n";
$messageEmail .= "Message: $message\n";

// Envoyer l'e-mail avec pièces jointes
$headers = "From: $email" . "\r\n";
$headers .= "Reply-To: $email" . "\r\n";
$headers .= "MIME-Version: 1.0" . "\r\n";
$headers .= "Content-Type: text/plain; charset=UTF-8" . "\r\n";

// Utilisez la fonction mail pour envoyer l'e-mail
mail($to, $subjectEmail, $messageEmail, $headers);

// Redirection vers une page de confirmation
header("Location: confirmation_page.html");
exit();


    // Exemple d'enregistrement des données dans un fichier JSON
    $data = [
        "name" => $name,
        "email" => $email,
        "subject" => $subject,
        "message" => $message,
        "attachments" => $attachments
    ];

    $jsonData = json_encode($data, JSON_PRETTY_PRINT);
    file_put_contents("form_data.json", $jsonData);

    // Redirection vers une page de confirmation
    header("Location: confirmation_page.html");
    exit();
}
?>
