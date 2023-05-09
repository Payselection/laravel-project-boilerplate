<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />

    @vite('resources/css/app.css')

</head>

<body class="bg-gray">
    <div class="bg-white border overflow-hidden sm:rounded-lg m-20">
        <div class="px-4 py-5 sm:px-6">
            @include('settings.logo')
        </div>
        <div class="border-t border-gray-200">

            @include('settings.form')

        </div>
    </div>
    
</body>

</html>