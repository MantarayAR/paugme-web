
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