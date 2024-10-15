<!DOCTYPE html>
<html lang="de">
<head>
    <meta charset="UTF-8">
    <title>EventScreen</title>
    <link rel="stylesheet" href="{{ asset("assets/vendor/bootstrap-5.3.3-dist/css/bootstrap.min.css") }}" type="text/css">
    <script src="{{ asset("assets/vendor/bootstrap-5.3.3-dist/js/bootstrap.bundle.min.js") }}"></script>
    <link rel="stylesheet" href="{{ asset("/assets/css/app.css") }}" type="text/css">

    <!-- jQuery -->
    <script src="{{ asset("/assets/vendor/jquery/js/jquery-3.7.1.min.js") }}"></script>
    <!-- Marked.js and DOM-Purify -->
    <script src="{{ asset("/assets/vendor/marked/marked.js") }}"></script>
    <script src="{{ asset("/assets/vendor/dompurify/purify.min.js") }}"></script>
    <!-- fontawesome -->
    <link rel="stylesheet" href="{{ asset("/assets/vendor/fontawesome-free-6.5.2-web/css/all.min.css") }}" type="text/css">

    <script>
        let user_id = 1;
    </script>

    @vite("resources/js/bootstrap.js")
    @vite("resources/js/client_test.js")

</head>

<body>
@yield("content")
</body>
</html>
