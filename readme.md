# Laravel 5.8

## artisan 指令

```bash
php artisan serve
#執行開發伺服器

php artisan make:controller PostController
#建立Controller
php artisan make:controller PostController --resource
#建立Resource Controller

php artisan route:list
#查看路由列表

php artisan make:migration create_posts_table
#建立Migration

php artisan migrate
#執行Migration
php artisan migrate:rollback
#回復Migration
php artisan migrate:reset
#重置Migration

php artisan make:seeder PostsTableSeeder
#建立seeder
php artisan db:seed
#執行seeds
php artisan make:factory PostFactory
#建立Factory
```