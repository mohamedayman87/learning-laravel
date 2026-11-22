@props([
    'title' => 'title'
])

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $title }}</title>
    <style>
        .card {
            background: #e3e3e3;
            padding: 1rem;
            text-align: center;
        }
        .max-w-400{
            max-width: 650px;
            margin: auto;
        }
    </style>
</head>

<body>
    <nav>
        <a href="/">home page</a>
        <a href="/test">test page</a>
        <a href="/contact">contact us</a>
    </nav>
    
        {{ $slot }}
    
</body>

</html>