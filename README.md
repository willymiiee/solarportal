## How to run
1. Run `composer install` in your terminal.

    **Installation on Windows**

    - If you haven't used [Composer](https://getcomposer.org/) before, get the latest version of Composer
    from [getcomposer.org](https://getcomposer.org) (direct link to [.exe](https://getcomposer.org/Composer-Setup.exe) here) and install it. <br />

    **Installation on Ubuntu 16.04**

    - sudo apt-get update.
    - sudo apt-get install curl php5-cli zip unzip php7.0-curl php7.0-xml php7.0-fpm git php7.0 php7.0-mbstring php7.0-mcrypt php7.0-cli.
    - curl -sS https://getcomposer.org/installer | sudo php -- --install-dir=/usr/local/bin --filename=composer (This will download and install Composer as a system-wide command named composer, under /usr/local/bin).

    You can now use Composer from everywhere on your system (via cmd.exe, PHPStorm or any other tool).

2. copy **.env.example .env**.
3. Run `php artisan migrate` and `php artisan db:seed`
4. **Local Development Server**
    - You can use web server **apache** / **nginx**. If you have apache / nginx installed locally

**Notes:**
- Additional step for Mac / linux, Run: `sudo chmod -R 777 storage/`
- Admin credentials: email `admin@test.com` password `12345678`

## Any questions ?
Send a message to `willymiiee@gmail.com`