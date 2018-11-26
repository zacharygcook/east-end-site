## East End Ink's PHP, Slim-Framework-3 Based Website

### When restarting from fresh git clone

#### 1. Download Composer

**Run the following command to download composer:**

```
php -r "copy('https://getcomposer.org/installer', 'composer-setup.php');"
php -r "if (hash_file('sha384', 'composer-setup.php') === '93b54496392c062774670ac18b134c3b3a95e5a5e5c8f1a9f115f203b75bf9a129d5daa8ba6a13e2cc8a1da0806388a8') { echo 'Installer verified'; } else { echo 'Installer corrupt'; unlink('composer-setup.php'); } echo PHP_EOL;"
php composer-setup.php
php -r "unlink('composer-setup.php');"
```

#### 2. Install PHP Packages using Composer

**Run the following command to install PHP packages using composer:**

```
php composer.phar install
```

#### 3. Then everything should work - run locally as normal :)

### TO RUN LOCALLY:

Go to root folder containing index.php file and run 'php -S localhost:8000'