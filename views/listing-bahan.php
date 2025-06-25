<h1>listing bahan bahan</h1>

<?php if (empty($bahanBahan)): ?>
    <p>Tidak ada bahan yang ditemukan.</p>
<?php else: ?>
    <ol>
    <?php foreach ($bahanBahan as $bahan): ?>
        <li>
            <a href="/bahan/<?= $bahan['id'] ?>">
                <?= htmlspecialchars($bahan['nama']) ?>
            </a>
        </li>
        <?php endforeach; ?>
    </ol>
<?php endif; ?>