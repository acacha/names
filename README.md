Provides alternatives names to Laravel 5 models.

## Installation ##

```bash
composer require acacha/names
```

### Migrations ###

Run: 
 
```bash
php artisan migrate
```

To add **names** table to you Laravel project. Is not necessary to 
modify existent Model tables to add alternatives names to an existing 
model. 

## Use ##

Basically this package uses Laravel polymorphic-relations ([1](https://laravel.com/docs/5.3/eloquent-relationships#polymorphic-relations))
to add alternative names to models.

You only have to add trait **Acacha\Names\Nameable** to you model:

```php
class MyModel extends Model {
    use Nameable;    
    ...
}
```

This will add polimorphic relation **names()** that gives access to 
alternative model names:


```php
mymodel->names();
```

## Specifications ##

Table **names**

Columns:
- id
- shortname: Model/resource short name.
- fullname: resource fullname.
- nickname: resource nickname.
- code: resource code.
- description: resource description.
- notes: resource notes.
- nameable_type : nameable object class
- nameable_id: nameable object id

