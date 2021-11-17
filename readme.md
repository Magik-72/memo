# Memo # 

### Installation ###

* Add Memo to your composer.json file to require Memo :
`composer require magik-72/memo`


* Create memos table with migration
`php artisan migrate`

### Usage ###

* Add MemoableTrait to the Model :
```php
    use Magik72\Memo\Traits\MemoableTrait;
    
    class  extends Model
    {
        use MemoableTrait;
    }
```

### Methods ###