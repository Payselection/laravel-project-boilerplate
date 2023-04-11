# Usage

Add repository configuration to composer.json
```
"repositories": [
    {
        "type": "vcs",
        "url": "https://github.com/Payselection/laravel-project-boilerplate.git"
    }
]
```
Set the required package version
`composer require payselection/boilerplate:<version>`

Run command to publish boilerplate files to root directory
`php artisan vendor:publish --tag=payselection-files`
