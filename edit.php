<?php if (isset($record)): ?>
    <h1>Upravit záznam</h1>
    <form method="POST" action="?controller=form&action=edit">
        <input type="hidden" name="id" value="<?= $record['id'] ?>">
        <label for="full_name">Jméno a příjmení:</label>
        <input type="text" id="full_name" name="full_name" value="<?= $record['full_name'] ?>" required>

        <label for="email">E-mail:</label>
        <input type="email" id="email" name="email" value="<?= $record['email'] ?>" required>

        <label for="phone">Telefon:</label>
        <input type="text" id="phone" name="phone" value="<?= $record['phone'] ?>" required>

        <label for="age">Věk:</label>
        <input type="number" id="age" name="age" value="<?= $record['age'] ?>" required>

        <label for="comments">Komentáře:</label>
        <textarea id="comments" name="comments"><?= $record['comments'] ?></textarea>

        <label for="room_preference">Pokoj:</label>
        <select id="room_preference" name="room_preference">
            <option value="single" <?= $record['room_preference'] == 'single' ? 'selected' : '' ?>>Jednolůžkový</option>
            <option value="double" <?= $record['room_preference'] == 'double' ? 'selected' : '' ?>>Dvoulůžkový</option>
        </select>

        <label>Koníčky:</label>
        <input type="checkbox" name="interests[]" value="sport" <?= strpos($record['interests'], 'sport') !== false ? 'checked' : '' ?>> Sport
        <input type="checkbox" name="interests[]" value="art" <?= strpos($record['interests'], 'art') !== false ? 'checked' : '' ?>> Umění
        <input type="checkbox" name="interests[]" value="music" <?= strpos($record['interests'], 'music') !== false ? 'checked' : '' ?>> Hudba

        <button type="submit">Uložit změny</button>
    </form>
<?php else: ?>
    <p>Záznam nebyl nalezen.</p>
<?php endif; ?>