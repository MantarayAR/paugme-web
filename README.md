Paugme Web
==========

The Paugme Website, built on Laravel.

# Environment

You can set your environment settings in `.env`.

- APP_KEY should be a 32 character random string
- MAILGUN_DOMAIN and MAILGUN_SECRET should be set to the free
  the domain and secret of your own MailGun account when testing.
  Don't worry, it's free for sandboxing.

# Local Development

You will need PostgreSQL and Redis installed.

Run migrations:

```
php artisan migrate
```

Follow steps for supervisor installation in Production Deployment
or simply run:

```
php artisan queue:listen
```

in order to execute queued jobs.

You will need to create a `config/services.php` file. The Mailgun
service is used for contact forms.


# Production Deployment

Install supervisor

```
sudo apt-get install supervisor
```

Create `/etc/supervisor/conf.d/laravel-worker.conf` with the following content:

```
[program:laravel-worker]
process_name=%(program_name)s_%(process_num)02d
command=php /home/forge/app.com/artisan queue:work sqs --sleep=3 --tries=3 --daemon
autostart=true
autorestart=true
user=forge
numprocs=8
redirect_stderr=true
stdout_logfile=/home/forge/app.com/worker.log
```

Then run:

```
sudo supervisorctl reread

sudo supervisorctl update

sudo supervisorctl start laravel-worker:*
```

# Assets

Dynamic assets, like Sass and Email templates should be
included in this repo, however, static assets, such
as images, and JavaScript dependencies should go in
[Paugme Static](https://github.com/mantarayar/paugme-static).

Those images will be automatically uploaded to a CDN. Use
the CDN url when referencing these assets.

Eventually, CDN assets will be added to a database and
will be referenced from there, but until then, link
directly to the assets.