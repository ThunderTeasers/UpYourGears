<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>@yield('meta_title')</title>
    <link rel="stylesheet" href="/public/css/admin.css">
    <link rel='shortcut icon' type='image/x-icon' href='/favicon.ico' />
</head>
<body>
    @if(!\Illuminate\Support\Facades\App::isLocal())
        {{ URL::forceSchema('https') }}
    @endif

    <aside>
        @include('dashboard.includes.left')
    </aside>
    <main>
        <div id="right__wrapper">
            @yield('content')
        </div>
    </main>

    <script src="/public/js/jquery-3.1.1.min.js"></script>
    <script src="/public/js/tinymce/tinymce.min.js"></script>
    <script>
        var editor_config = {
            path_absolute: "{{ URL::to('/') }}",
            selector: "textarea",
            plugins: [
                "advlist autolink lists link image charmap preview hr anchor pagebreak",
                "searchreplace wordcount visualblocks visualchars code fullscreen",
                "insertdatetime media nonbreaking save table contextmenu directionality",
                "emoticons template paste textcolor colorpicker textpattern"
            ],
            toolbar: "insertfile undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist | outdent indent | link image media",
            relative_urls: false,
            file_browser_callback: function(field_name, url, type, win){
                var x = window.innerWidth || document.documentElement.clientWidth || document.getElementsByTagName("body")[0].clientWidth;
                var y = window.innerHeight || document.documentElement.clientHeight || document.getElementsByTagName("body")[0].clientHeight;

                var cmsURL = editor_config.path_absolute + 'laravel-filemanager?field_name' + field_name;
                if(type == "image"){
                    cmsURL = cmsURL + "&type=Images";
                }else{
                    cmsURL = cmsURL + "&type=Files";
                }

                tinyMCE.activeEditor.windowManager.open({
                    file: cmsURL,
                    title: "Filemanager",
                    width: x * 0.8,
                    height: y * 0.8,
                    resizable: "yes",
                    close_previous: "no"
                });
            }
        };

        tinyMCE.init(editor_config);
    </script>
    <script src="/public/js/all.js"></script>
</body>
</html>