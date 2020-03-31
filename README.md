Система приёма и обработки заявок в техническую поддержку на Laravel

Аккаунт менеджера:
mail: manager@manager.com
pass: adminmanager

Процесс развёртывания: 
1) composer install
2) cp .env.example .env
3) php artisan key:generate
4) настройка БД в .env
5) php artisan migrate
6) php artisan db:seed
7) php artusan serve

![Image alt](https://github.com/NordDev/TableApplication/blob/master/req_user.png)
![Image alt](https://github.com/NordDev/TableApplication/blob/master/post_req_user.png)
![Image alt](https://github.com/NordDev/TableApplication/blob/master/admin_page.png)