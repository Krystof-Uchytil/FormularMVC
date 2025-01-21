<!DOCTYPE html>
<html lang="cs">
<head>
    <meta charset="UTF-8">
    <title>Seznam registrací</title>
</head>
<body>
    <h1>Seznam registrací</h1>
    <table border="1">
        <thead>
            <tr>
                <th>ID</th>
                <th>Jméno</th>
                <th>Email</th>
                <th>Telefon</th>
                <th>Věk</th>
                <th>Poznámky</th>
                <th>Pokoj</th>
                <th>Zájmy</th>
                <th>Soubor</th>
                <th>Akce</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($data as $row): ?>
                <tr>
                    <td><?= htmlspecialchars($row['id']) ?></td>
                    <td><?= htmlspecialchars($row['full_name']) ?></td>
                    <td><?= htmlspecialchars($row['email']) ?></td>
                    <td><?= htmlspecialchars($row['phone']) ?></td>
                    <td><?= htmlspecialchars($row['age']) ?></td>
                    <td><?= htmlspecialchars($row['comments']) ?></td>
                    <td><?= htmlspecialchars($row['room_preference']) ?></td>
                    <td><?= htmlspecialchars($row['interests']) ?></td>
                    <td><a href="<?= htmlspecialchars($row['file_upload']) ?>">Stáhnout</a></td>
                    <td>
                        <a href="?controller=form&action=edit&id=<?= $row['id'] ?>">Upravit</a> |
                        <a href="?controller=form&action=delete&id=<?= $row['id'] ?>" onclick="return confirm('Opravdu chcete smazat?')">Smazat</a>
                    </td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</body>
</html>