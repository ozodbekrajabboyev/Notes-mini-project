<?php require base_path('views/partials/head.php') ?>
<?php require base_path('views/partials/nav.php') ?>


<main>
    <section class="bg-white">
        <div class="flex flex-col items-center justify-center px-6 py-8 mx-auto md:h-screen lg:py-0">

            <div class="w-full bg-white rounded-lg shadow md:mt-0 sm:max-w-md xl:p-0">
                <div class="p-6 space-y-4 md:space-y-6 sm:p-8">
                    <h1 class="text-xl font-bold leading-tight tracking-tight text-gray-900 md:text-2xl">
                        Register for a new account
                    </h1>
                    <form class="space-y-4 md:space-y-6" action="/register" method="POST">

                        <div>
                            <label for="email" class="block mb-2 text-sm font-medium text-gray-900">Your email</label>
                            <input type="email" name="email" id="email" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5" placeholder="name@company.com" required="">

                            <?php if (isset($errors['email'])) : ?>
                                <p class="font-bold text-red-500 text-xs mt-2"><?= $errors['email'] ?></p>
                            <?php endif; ?>
                        </div>

                        <div>
                            <label for="password" class="block mb-2 text-sm font-medium text-gray-900">Password</label>
                            <input type="password" name="password" id="password" placeholder="••••••••" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5" required="">

                            <?php if (isset($errors['password'])) : ?>
                                <p class="font-bold text-red-500 text-xs mt-2"><?= $errors['password'] ?></p>
                            <?php endif; ?>
                        </div>

                        <button type="submit" class="text-white bg-primary-700 hover:bg-primary-800 focus:ring-4 focus:outline-none focus:ring-primary-300 font-medium rounded-lg text-sm w-full px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Create an account</button>

                        <!-- <p class="text-sm font-light text-gray-500">
                            Already have an account? <a href="#" class="font-medium text-primary-600 hover:underline">Login here</a>
                        </p> -->
                    </form>
                </div>
            </div>
        </div>
    </section>

</main>

<?php require base_path('views/partials/footer.php') ?>