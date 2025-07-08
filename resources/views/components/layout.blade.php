<!DOCTYPE html>
<html lang="en">

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
</head>

<body class="bg-gradient-to-r from-gray-600 to-gray-400">
    <x-nav />
    {{ $slot }}
    <footer class="m-2">
        <div class="p-5 rounded-md backdrop-blur-sm bg-white/20 text-white space-y-4">
            <h3 class="text-xl text-center border w-[120px] p-1 rounded-md mx-auto">TechNest</h3>
            <p class="text-center text-sm">"Your Daily Byte of IT Wisdom."</p>
            <div class="flex gap-5 justify-center align-items-baseline">
                <a href=""><i class="fa-brands fa-facebook text-xl"></i></a>
                <a href=""><i class="fa-brands fa-x-twitter text-xl"></i></a>
                <a href=""><i class="fa-brands fa-instagram text-xl"></i></a>
                <a href=""><i class="fa-brands fa-tiktok text-xl"></i></a>
                <a href=""><i class="fa-brands fa-linkedin"></i></a>
            </div>
            <p class="text-center text-sm">© 2025 TechNest , Inc. All rights reserved.</p>
        </div>
    </footer>
</body>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
    $(document).ready(function() {
        // passwordhidden jquery
        $('#togglePassword').on('click', function() {
            const input = $('#password');
            const type = input.attr('type') === 'password' ? 'text' : 'password';
            input.attr('type', type);
            $(this).text(type === 'password' ? 'Show' : 'Hide');
        });
        $('#toggleConfirmPassword').on('click', function() {
            const input = $('#confirmPassword');
            const type = input.attr('type') === 'password' ? 'text' : 'password';
            input.attr('type', type);
            $(this).text(type === 'password' ? 'Show' : 'Hide');
        });

        // dropdown jquery

        $('#dropdownBtn').on('click', function(e) {
            e.stopPropagation(); // prevent closing when clicking the button
            $('#dropdownMenu').toggleClass('hidden');
        });

        // Close dropdown if clicking outside
        $(document).on('click', function(e) {
            if (!$(e.target).closest('#dropdownMenu').length) {
                $('#dropdownMenu').addClass('hidden');
            }
        });

        // close alert
        $('#closeAlert').on('click', function() {
            $('#myAlert').fadeOut();
        });
    });
</script>

</html>
