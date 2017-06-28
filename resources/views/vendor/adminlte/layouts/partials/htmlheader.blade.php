<head>
    <meta charset="UTF-8">
    <title> Latin Trails - @yield('htmlheader_title', 'Latin Trails') </title>
    <meta content='width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no' name='viewport'>
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <script src="{{ asset('/vendors/ckeditor/ckeditor.js') }}"></script>
    <link href="{{ asset('/css/all.css') }}" rel="stylesheet" type="text/css" />
    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>

    <![endif]-->

    <script src="{{ asset('vendors/tinymce/js/tinymce/tinymce.min.js') }}"></script>
    <script>
        tinymce.init({
            language : "es",
            selector: "textarea",
            height: 500,
            plugins: [
                "advlist autolink lists link image charmap print preview anchor",
                "searchreplace visualblocks code fullscreen",
                "insertdatetime media table contextmenu paste imagetools"
            ],
            toolbar: "insertfile undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image",
            // imagetools_cors_hosts: ['www.tinymce.com', 'codepen.io'],
            /*content_css: [
                '//fonts.googleapis.com/css?family=Lato:300,300i,400,400i',
                '//www.tinymce.com/css/codepen.min.css'
            ],*/
            file_browser_callback :
                function(field_name, url, type, win){
                    var filebrowser = "/filebrowser.php";
                    filebrowser += (filebrowser.indexOf("?") < 0) ? "?type=" + type : "&type=" + type;
                    tinymce.activeEditor.windowManager.open({
                        title : "Insertar fichero",
                        width : 520,
                        height : 400,
                        url : filebrowser
                    }, {
                        window : win,
                        input : field_name
                    });
                    return false;
                }
        });
    </script>

    <script>
        window.Laravel = {!! json_encode([
            'csrfToken' => csrf_token(),
        ]) !!};
    </script>

    <script>
        //See https://laracasts.com/discuss/channels/vue/use-trans-in-vuejs
        window.trans = @php
            // copy all translations from /resources/lang/CURRENT_LOCALE/* to global JS variable
            $lang_files = File::files(resource_path() . '/lang/' . App::getLocale());
            $trans = [];
            foreach ($lang_files as $f) {
                $filename = pathinfo($f)['filename'];
                $trans[$filename] = trans($filename);
            }
            $trans['adminlte_lang_message'] = trans('adminlte_lang::message');
            echo json_encode($trans);
        @endphp

    </script>

    <script>
        function validar(){
            if ($(document.getElementById('id_categoria')).val() == "SELECCIONE UNO") {
                alert("Seleccione una categoría");
                document.getElementById("id_categoria").focus();
                event.returnValue = false;
                return false;
            }else{ event.returnValue = true;}
        }
    </script>
</head>