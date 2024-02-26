<?php require 'partials/header.php' ?>

<?php require 'partials/nav.php' ?>

<?php require 'partials/title.php' ?>


<main>
  <div class="mx-auto max-w-7xl py-6 sm:px-6 lg:px-8">
    <h3 class="mt-5 tracking-normal font-bold text-l"><?= $tests ?></h3>
    <div class="mt-3">
      <?php foreach ($tasks as $task) : ?>
      <ul
        class="text-sm font-medium text-gray-900 bg-white border border-gray-200 rounded-lg dark:bg-gray-700 dark:border-gray-600 dark:text-white">
        <li class="w-full border-b border-gray-200 rounded-t-lg dark:border-gray-600">
          <div class="flex items-center ps-3">
            <input id="vue-checkbox" type="checkbox" value=""
              class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-700 dark:focus:ring-offset-gray-700 focus:ring-2 dark:bg-gray-600 dark:border-gray-500">
            <label for="vue-checkbox" class="w-full py-3 ms-2 text-sm font-medium text-gray-900 dark:text-gray-300"><?= $task['title'] ?></label>
            <a href="" class="pr-4 text-blue-800">Edit</a>
          </div>
        </li>
      </ul>
      <?php endforeach; ?>
    </div>

    <h3 class="mt-5 tracking-normal font-bold text-l">26th February 2024</h3>
    <div class="mt-3">
      <ul
        class="text-sm font-medium text-gray-900 bg-white border border-gray-200 rounded-lg dark:bg-gray-700 dark:border-gray-600 dark:text-white">
        <li class="w-full border-b border-gray-200 rounded-t-lg dark:border-gray-600">
          <div class="flex items-center ps-3">
            <input id="vue-checkbox" type="checkbox" value=""
              class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-700 dark:focus:ring-offset-gray-700 focus:ring-2 dark:bg-gray-600 dark:border-gray-500">
            <label for="vue-checkbox" class="w-full py-3 ms-2 text-sm font-medium text-gray-900 dark:text-gray-300">Vue
              JS</label>
            <a href="" class="pr-4 text-blue-800">Edit</a>
          </div>
        </li>
        <li class="w-full border-b border-gray-200 rounded-t-lg dark:border-gray-600">
          <div class="flex items-center ps-3">
            <input id="vue-checkbox" type="checkbox" value=""
              class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-700 dark:focus:ring-offset-gray-700 focus:ring-2 dark:bg-gray-600 dark:border-gray-500">
            <label for="vue-checkbox" class="w-full py-3 ms-2 text-sm font-medium text-gray-900 dark:text-gray-300">Vue
              JS</label>
            <a href="" class="pr-4 text-blue-800">Edit</a>
          </div>
        </li>
    </div>

  </div>

  </div>
</main>

<?php require 'partials/footer.php' ?>

</html>