<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $jmeno = $_POST['jmeno'];
    $prijmeni = $_POST['prijmeni'];
    $datum_narozeni = $_POST['datum_narozeni'];
    $fotka = $_FILES['fotka'];
    $bydliste = $_POST['bydliste'];
    $op = $_POST['op'];
    $email = $_POST['email'];
    $telefon = $_POST['telefon'];
    $lekarska_prohlidka = $_POST['lekarska_prohlidka'];
    $vybaveni = isset($_POST['vybaveni']) ? implode(", ", $_POST['vybaveni']) : '';
    $doprava = $_POST['doprava'];

    // Validace CAPTCHA
    if ($_POST['captcha'] !== '8') {
        die('Chybná odpověď na CAPTCHA.');
    }

    // Připojení k databázi
    require_once '../models/Database.php';
    $db = new Database();
    $conn = $db->connect();

    // Ukládání dat do databáze
    $sql = "INSERT INTO registrace (jmeno, prijmeni, datum_narozeni, fotka, bydliste, obcansky_prukaz, email, telefon, lekarska_prohlidka, vybaveni, doprava) 
            VALUES (:jmeno, :prijmeni, :datum_narozeni, :fotka, :bydliste, :op, :email, :telefon, :lekarska_prohlidka, :vybaveni, :doprava)";
    $stmt = $conn->prepare($sql);

    // Uložení souboru fotky
    $uploadDir = '../uploads/';
    $uploadFile = $uploadDir . basename($fotka['name']);
    if (move_uploaded_file($fotka['tmp_name'], $uploadFile)) {
        $stmt->execute([
            ':jmeno' => $jmeno,
            ':prijmeni' => $prijmeni,
            ':datum_narozeni' => $datum_narozeni,
            ':fotka' => $uploadFile,
            ':bydliste' => $bydliste,
            ':op' => $op,
            ':email' => $email,
            ':telefon' => $telefon,
            ':lekarska_prohlidka' => $lekarska_prohlidka,
            ':vybaveni' => $vybaveni,
            ':doprava' => $doprava
        ]);
        echo 'Přihláška byla úspěšně odeslána!';
    } else {
        echo 'Chyba při nahrávání souboru.';
    }
}
?>
