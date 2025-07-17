<!DOCTYPE html>
<html lang="en" class="bg-gradient-to-r from-blue-600 to-red-400">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    {{-- <link rel="stylesheet" href="/css/style.css"> --}}
    {{-- fontawesome cdn link --}}
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css"
        integrity="sha512-Evv84Mr4kqVGRNSgIGL/F/aIDqQb7xQ2vcrdIwxfjThSH8CSR7PBEakCr51Ck+w+/U6swU2Im1vVX0SVk9ABhg=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    {{-- tailwind link --}}
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    {{-- css link --}}
    <link rel="stylesheet" href="/css/index.css">
</head>

<body class="bg-gradient-to-r from-blue-600 to-red-400">

    <x-nav />
    {{ $slot }}
    <x-footer />

</body>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>


<!-- CKEditor 4 Full -->
<script src="https://cdn.ckeditor.com/4.22.1/full/ckeditor.js"></script>
<script>
    CKEDITOR.replace('editor');
</script>

<script src="/js/index.js"></script>

</html>
