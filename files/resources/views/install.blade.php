<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>

    @vite('resources/css/app.css')
    
</head>

<body class="bg-gray">
    <div class="bg-white overflow-hidden sm:rounded-lg m-20">
        @if ($success == true)
            installation has been finished
        @else
            installation error: {{ $error }}
        @endif
    </div>
</body>
</html>
