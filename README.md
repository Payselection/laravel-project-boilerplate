# Usage

Add package
* `payselection/boilerplate`

Add configuration to composer.json
```
"require": {
    "payselection/boilerplate": "^1.0",
},
"repositories": [
    {
        "type": "path",
        "url": "./packages/payselection/boilerplate"
    }
],
"minimum-stability": "dev",
```

Run command to publish boilerplate files to root directory
`php artisan vendor:publish --tag=payselection-files`
