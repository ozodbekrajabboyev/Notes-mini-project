<?php require("views/partials/head.php") ?>
<?php require("views/partials/nav.php") ?>
<?php require("views/partials/banner.php") ?>


<main>
  <div class="mx-auto max-w-7xl px-4 py-6 sm:px-6 lg:px-8">
    <ul>
      <?php foreach ($notes as $note) : ?>
        <li>
          <a href="/note?id=<?= $note['id'] ?>" class="text-blue-500 hover:underline"><?= htmlspecialchars($note['body']) ?> </a>
        </li>
      <?php endforeach; ?>
    </ul>


    <p class="mt-10">
      <a href="/notes/create" class="bg-transparent hover:bg-blue-500 text-blue-700 font-semibold hover:text-white py-2 px-4 border border-blue-500 hover:border-transparent rounded">Create Note</a>
    </p>
  </div>
</main>

<?php require("views/partials/footer.php") ?>