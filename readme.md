# Test Indosystem by Eric Yonathan

**Installation**
------------

1. Run the following command
```bash
git clone https://github.com/klinci/test-indosystem.git
```

2. After cloned, run: composer install
3. Adjust your database connection on the .env file
4. After step 2, run: php artisan migrate
5. After step 3, run: php artisan db:seed

Open url:
http://{your-host}/{your-project}/public

for example: http://localhost/test-indosystem/public

To see the project page:

1. Open: 'http://localhost/test-indosystem/public/guest/guest-book' for guestbook entry.

2. Open: 'http://localhost/test-indosystem/public/guest/gallery' for see all guestbook entries.

3. Do login with admin (username/pass): (admin@admin.com / secret) to see the difference with guest. For guest no need to login.