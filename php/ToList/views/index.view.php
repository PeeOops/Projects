<?php require 'partials/header.php' ?>

<?php require 'partials/nav.php' ?>

<?php require 'partials/title.php' ?>


<main>
  <div class="mx-auto max-w-7xl py-6 sm:px-6 lg:px-8">
    <?php 
      foreach ($sortedDate as $date) : ?>
      <?php if($date["date"] === $currentDate) : ?>
        <h3 class="mt-5 tracking-normal font-bold text-l">Today</h3>  
      <?php else : ?>
        <h3 class="mt-5 tracking-normal font-bold text-l"><?= $date["date"] ?></h3>
      <?php endif; ?>

      <?php foreach ($tasks as $task) : ?>
        <?php if($task["date"] === $date["date"]) : ?>

        <div class="mt-3">
          <ul class="text-sm font-medium text-gray-900 bg-white border border-gray-200 rounded-lg">
            <li class="w-full border-b border-gray-200 rounded-t-lg">
              <div class="flex items-center ps-3">

                <input id="vue-checkbox" type="checkbox" value=""
                  class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded">

                <label for="vue-checkbox"
                  class="w-full py-3 ms-2 text-sm font-medium text-gray-900"><?= $task["title"] ?></label>

                <a href="" class="pr-4 text-blue-800">Edit</a>
                <a href="" class="pr-4 text-red-600">Delete</a>

              </div>
            </li>
          </ul>
        <?php endif; ?>
        <?php endforeach; ?>
      </div>
    <?php endforeach; ?>
  </div>
</main>


<?php require 'partials/footer.php' ?>

</html>