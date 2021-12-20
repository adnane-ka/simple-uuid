## Simple Uuid

a simple laravel package to generate uuid instead of auto incrementing ids as primary keys.

### what's even a uuid?
UUID stands for Universally Unique IDentifier. as you may encounter the acronym of it GUID (which stands for Globally Unique IDentifier).

It’s a 16 bytes Worldwide unique number! And absolulty, without using any kind of central authority or any external APIS. Actually, the way it is generated, following a standardized algorithm, ensures that every UUID is unique. and kinda impossible to generate the exact same UUID as another one somewhere else in the whole world.

and generally, it's something that looks like this:
```
e0fbbbb1-446c-4a75-be2e-746f555722b2
```
### but, why do you even need to use it and not just the auto incrementing ids?
well, it's not faire to just say that you always need to use the UUID thing istead of auto incrementing ids to index your objects in your database. but it's something cool to know the different uses of both of them and choose depending on your needs.

here are some reasons why you should use UUIDs:
* security: and definitely this is because uuids are impossible to guess, which is not like auto incrementing ids. 

* concerning database scaling: Imagine you’ve been writing blog articles on two self-hosted blogging platforms. And for some reason you want to merge those two blogs into one. If you had used usual auto-incrementing IDs, you would have to re-index every blog post of the databases and update every foreign key that might point to them. But if you had used UUID as primary key, No work to do!

* local-first applications! : Let’s say I have a collaborative application. And I want to be able to work with that application, event when I’m offline. And that means creating new content that should be added to the common database. What I expect is for the application to let me create my new content, and merge it to the central shared database when I’m back online. And I expect my coworkers to be able to do the same. In this scenario, entries in the database can’t be indexed with an auto incrementing number. Because my coworkers and myself, while offline, would be creating entries with the same ID. And once back online, we would face numerous data merging issues. UUID in this case, is a marvelous solution!

### installation 
using `composer`:

```
composer i adnane/simple-uuid
```
register the package's service provider in providers array in your `app.php`:

```php
'providers' => [
    ..
    Adnane\SimpleUuid\SimpleUuidServiceProvider::class,
```

as you may need to define an alias for the package's trait , in your `app.php` in the aliases array as bellow:

```php
'aliases' => [
    ..
    'SimpleUuid' => Adnane\SimpleUuid\Traits\SimpleUuid::class,
```
### use 
as this package destined for simple use you can simply just:

1. import the package's trait inside the model that you want to use uuid on:

```php
use Adnane\SimpleUuid\Traits\SimpleUuid;

# or if using an alias 

use SimpleUuid;
```

2. add it to the model class:

```php 
use Adnane\SimpleUuid\Traits\SimpleUuid;

class User extends Model
{
    use HasFactory ,SimpleUuid;
```

3. update your target migration file:

```php 
Schema::create('users', function (Blueprint $table) {
    $table->uuid('id')->primary();
    ..         
```

4. run laravel migrations

```php 
php artisan migrate 
```

5. store a dummy record & check out stored id:

```
e0fbbbb1-446c-4a75-be2e-746f555722b2
```

### contributing 
everyone is welcome :)

### credit 

[adnane-ka](https://github.com/adnane-ka/simple-uuid)
