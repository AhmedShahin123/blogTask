### Technologies used
1. Laravel
2. Livewire
3. TailwindCSS


### Installation Process
1. Execute `git clone https://github.com/AhmedShahin123/blogTask.git` on your terminal to download this project.
2. Go to the project root directory and execute `composer install` to install all PHP dependencies of the project
3. Create a file named as .env and copy the content of .env.example to newly created .env file
4. Then execute `php artisan key:generate` on your terminal/cmd to generate environment key
5. Then create a Database for this project and edit the .env file to authorized this project on your database.
6. Execute `php artisan migrate:refresh --seed` terminal on your terminal.
7. Now you are ready to go, If you don't want to create any virtual host for this project then execute
  `php artisan serve`
8. Now visit the url shown on your terminal, something like `localhost:8000`. It's running!
