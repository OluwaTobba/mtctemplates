<?php
    require '../api/config.php';
    $stmt = $pdo->query("SELECT * FROM template");
    $templates = $stmt->fetchAll();
    include 'header.php';
?>
<main>
    <h1>TEMPLATES</h1>
    <ul>
        <?php foreach ($templates as $template): ?>
        <li>
            <img src="<?= htmlspecialchars($template['thumbnail']) ?>" alt="<?= htmlspecialchars($template['name']) ?>" width="100">
            <a href="template-detail.php?id=<?= $template['id'] ?>">
                <?= htmlspecialchars($template['name']) ?> - $<?= $template['price'] ?>
            </a>
            <a href="<?= htmlspecialchars($template['preview_link']) ?>" target="_blank">Preview</a>
        </li>
        <?php endforeach; ?>
    </ul>
</main>
<?php include 'footer.php'; ?>