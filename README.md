файлы конфигруции сайта хранятся в  

/etc/vdestor/config/.env
# === ОСНОВНЫЕ НАСТРОЙКИ ===
APP_NAME="VDE Store"
APP_ENV=production
APP_DEBUG=false
APP_URL=https://vdestor.ru
APP_TIMEZONE=Europe/Moscow

# === ПУТИ ===
CONFIG_PATH=/etc/vdestor/config
LOG_PATH=/etc/vdestor/logs
CACHE_PATH=/etc/vdestor/cache
SESSION_PATH=/etc/vdestor/sessions

# === БЕЗОПАСНОСТЬ ===
SECURITY_KEY=vde_super_secret_key_2025_change_me
CSRF_TOKEN_NAME=_vde_token
SESSION_NAME=VDE_SESSION

# === ПРОИЗВОДИТЕЛЬНОСТЬ ===
CACHE_DRIVER=file
CACHE_TTL=3600
MAX_REQUEST_SIZE=10485760

# === ЛОГИРОВАНИЕ ===
LOG_LEVEL=info
LOG_MAX_FILES=30
LOG_MAX_SIZE=10485760

/etc/vdestor/config/app.ini
[session]
save_handler=db
gc_maxlifetime=1800
cookie_secure=true
cookie_httponly=true
cookie_samesite=Lax
name=VDE_SESSION
table=sessions
regenerate_interval=1800

[security]
max_login_attempts=5
lockout_duration=900
password_min_length=8
password_require_special=true
csrf_token_lifetime=3600
rate_limit_requests=60
rate_limit_window=60

[cache]
driver=file
default_ttl=3600
prefix=vde_
compress=true

[redis]
host=127.0.0.1
port=6379
password=m**DY
database=0
timeout=5
read_timeout=5

[email]
driver=smtp
host=smtp.yandex.ru
port=587
username=vde76ru@yandex.ru
password=your_app_password
encryption=tls
from_address=vde76ru@yandex.ru
from_name="VDE Store"

[logging]
channels[]=file
channels[]=database
max_file_size=10485760
max_files=30
compress_rotated=true

/etc/vdestor/config/config.php
<?php
return [
    'db' => [
        'host' => 'localhost',
        'username' => '**8',
        'password' => ';***',
        'dbname' => 'm***g'
    ]
];
?>

/etc/vdestor/config/database.ini
[mysql]
host=localhost
user=ad***
password=a***l
database=m***g


/etc/vdestor/config/generate_hash.php
<?php

// Задаём пароль вручную:
$plainPassword = 'C***6';  // <-- замените на свой

// Генерируем Bcrypt-хэш (cost по умолчанию = 10)
$hash = password_hash($plainPassword, PASSWORD_BCRYPT);

// Выводим его в консоль
echo "Ваш Bcrypt-хэш:\n" . $hash . "\n";
