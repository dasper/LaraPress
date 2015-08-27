# LaraPress
Blog CMS built using Laravel components. Compatible with WordPress Database.

## Installation
    composer require dasper/lara-press

## Configuration

    LaraPress\LaraPress::connect([
        'database' => 'wp_database',
        'username' => 'wp_username',
        'password' => 'wp_password',
        'host' => 'wp_host',
    ]);

### Examples
    $post = LaraPress\Database\Post::with('author')->find(1);
    return $post->toArray();

## TODO (a lot, this is not a comprehensive list)
* Better Understanding of Login 
* Built in default routing
* Conditionals
* Hooks
* Filters

## Future considerations
* Languages and Translations
* Email features
* Plugins
* Themes