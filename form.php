<!DOCTYPE html>
<html lang="cs">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="views/styles.css">
    <title>Přihláška na zimní soustředění</title>
</head>
<body>
    <header>
        <h1>Přihláška na zimní soustředění</h1>
    </header>
    <main>
        <form method="POST" action="?controller=form&action=submit" enctype="multipart/form-data">
            <label for="full_name">Jméno a příjmení:</label>
            <input type="text" id="full_name" name="full_name" required>

            <label for="email">E-mail:</label>
            <input type="email" id="email" name="email" required>

            <label for="phone">Telefon:</label>
            <input type="text" id="phone" name="phone" required>

            <label for="age">Věk:</label>
            <input type="number" id="age" name="age" required>

            <label for="comments">Komentáře nebo poznámky:</label>
            <textarea id="comments" name="comments"></textarea>

            <label for="room_preference">Volba pokoje:</label>
            <select id="room_preference" name="room_preference">
                <option value="single">Jednolůžkový</option>
                <option value="double">Dvoulůžkový</option>
            </select>

            <label>Vaše zájmy:</label>
            <input type="checkbox" name="interests[]" value="sport"> Sport
            <input type="checkbox" name="interests[]" value="art"> Umění
            <input type="checkbox" name="interests[]" value="music"> Hudba

            <label for="file_upload">Nahrát dokument:</label>
            <input type="file" id="file_upload" name="file_upload">

            <label for="captcha">Opište kód z obrázku:</label>
            <img src="views/captcha.php" alt="Captcha">
            <input type="text" id="captcha" name="captcha" required>

            <button type="submit">Odeslat přihlášku</button>
        </form>
    </main>
    <script src="views/script.js"></script>
</body>
</html>