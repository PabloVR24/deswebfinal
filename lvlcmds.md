#Para crear un nuevo proyecto en LARAVEL:
```composer create-project laravel/laravel example-app```
# Para crear un nuevo modelo:
```php artisan make:model NOMBRETABLA -m```
# Para crear un controlador:
```php artisan make:controller NOMBRECONTROLADOR --resource```
# Para ver si hay errores:
```php artisan migrate:status```
Muestra mensaje: Migration table has not found.
# Para realizar la migracion:
```php artisan migrate```
# Para deshacer una migracion:
```php artisan migrate:rollback```

# Para crear un controlador:
````php artisan make:controler NOMBRE```