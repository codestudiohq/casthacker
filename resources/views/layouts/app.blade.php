<!doctype html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>&lt;casthacker/&gt;</title>

        <link href="{{ mix('/css/app.css') }}" rel="stylesheet">
    </head>
    <body>
        <div id="app" class="flex-col full-height">
            <div class="container">
                <div class="py-6">
                    <div class="flex-spaced flex-y-center">
                        <div>
                            <a href="/" class="text-xl text-bold link-plain">&lt;casthacker/&gt;</a>
                        </div>
                        <div>
                            @auth
                                <form class="inline-block" action="/logout" method="post">
                                    {{ csrf_field() }}
                                    <button class="inline-block link-plain text-medium mr-6 text-dark-soft">Logout</button>
                                </form>
                                <a href="/" class="link-plain text-medium mr-6 text-dark-soft">Podcasts</a>
                                <a href="/episodes" class="link-plain text-medium text-dark-soft">Episodes</a>
                            @else
                                <a href="/login" class="link-plain text-medium mr-6 text-dark-soft">Login</a>
                            @endauth
                        </div>
                    </div>
                </div>
            </div>
            <div class="flex-fill">
                @yield('body')
            </div>
            <div class="container">
                <div class="border-t border-dark-softer text-center text-sm text-dark-softest mt-6 py-6">
                    &copy; {{ date('Y') }} NothingWorks Inc.
                </div>
            </div>
        </div>
        <script src="{{ mix('/js/app.js') }}"></script>
    </body>
</html>
