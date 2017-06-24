<!DOCTYPE HTML>
<html>
<head>
    <meta charset="utf-8">
    <title>jQuery File Upload Example</title>

    <!-- Bootstrap CSS Toolkit styles -->
    <link rel="stylesheet" href="/vendors/js_upload/bootstrap.min.css">
    <link rel="stylesheet" href="/vendors/js_upload/styles.css">
    <style>
        #lista2 {
            counter-reset: li;
            list-style: none;
            *list-style: decimal;
            font: 15px 'trebuchet MS', 'lucida sans';
            padding: 0;
            margin-bottom: 4em;
            text-shadow: 0 1px 0 rgba(255,255,255,.5);
        }

        #lista2 ol {
            margin: 0 0 0 2em;
        }

        #lista2 li{
            position: relative;
            display: block;
            padding: .4em .4em .4em 2em;
            *padding: .4em;
            margin: .5em 0;
            background: #ddd;
            color: #444;
            text-decoration: none;
            border-radius: .3em;
            transition: all .3s ease-out;
        }

        #lista2 li:hover{
            background: #eee;
        }

        #lista2 li:hover:before{
            transform: rotate(360deg);
        }

        #lista2 li:before{
            content: counter(li);
            counter-increment: li;
            position: absolute;
            left: -1.3em;
            top: 50%;
            margin-top: -1.3em;
            background: #87ceeb;
            height: 2em;
            width: 2em;
            line-height: 2em;
            border: .3em solid #fff;
            text-align: center;
            font-weight: bold;
            border-radius: 2em;
            transition: all .3s ease-out;
        }
    </style>
</head>

<body>
<div class="container">
    <!-- Button to select & upload files -->
    <span class="btn btn-success fileinput-button">
    <span>Seleccione un archivo:</span>
        <!-- The file input field used as target for the file upload widget -->
    <input id="fileupload" type="file" name="files[]" multiple>
  </span>


    <!-- The global progress bar -->
    <p>Progreso de carga</p>
    <div id="progress" class="progress progress-success progress-striped">
        <div class="bar"></div>
    </div>



    <!-- The list of files uploaded -->
    <p>Archivos cargados:</p>
    <ul id="files"></ul>



    <!-- Load jQuery and the necessary widget JS files to enable file upload -->
    <script src="//ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
    <script src="/vendors/js_upload/jquery.ui.widget.js"></script>
    <script src="/vendors/js_upload/jquery.iframe-transport.js"></script>
    <script src="/vendors/js_upload/jquery.fileupload.js"></script>




    <!-- JavaScript used to call the fileupload widget to upload files -->
    <script>
        // When the server is ready...
        $(function () {
            'use strict';

            // Define the url to send the image data to
            var url = 'files.php';

            // Call the fileupload widget and set some parameters
            $('#fileupload').fileupload({
                url: url,
                dataType: 'json',
                done: function (e, data) {
                    // Add each uploaded file name to the #files list
                    $.each(data.result.files, function (index, file) {
                        $('<div data-src="/files/thumbnail/'+file.name+'"/>').text(file.name).appendTo('#files');
                        $('<div data-src=""/>').text(file.thumbnail_url).appendTo(document.body);

                    });
                },
                progressall: function (e, data) {
                    // Update the progress bar while files are being uploaded
                    var progress = parseInt(data.loaded / data.total * 100, 10);
                    $('#progress .bar').css(
                        'width',
                        progress + '%'
                    );
                }
            });
        });

        function copia_url(elemento){
            var $temp = $("<input>")
            $("body").append($temp);
            $temp.val(elemento).select();
            document.execCommand("copy");
            $temp.remove();
            return false;
        }
    </script>

    <ol id="lista2">
    <?php
    $carpeta_ficheros = 'files/';
    $carpeta_ficheros_thumb = 'files/thumbnail/';
    $directorio = opendir($carpeta_ficheros_thumb); // Obre la carpeta
    while ($fichero = readdir($directorio)) { // Llegeix cada un dels fitxers
        if (!is_dir($fichero)){ // Omite las carpetas
            echo '<li style="cursor: pointer"><div class="fichero" data-src="/'.$carpeta_ficheros.$fichero.'" onclick="copia_url(\'/'.$carpeta_ficheros.$fichero.'\')" >
            <img src="/'.$carpeta_ficheros_thumb.$fichero.'" alt="" width="" height=""><br>
            '.$fichero.
                '</div></li>
            ';
        }
    }
    ?>
    </ol>
    <script type="text/javascript" language="javascript">
        $(document).on("click","div.fichero",function(){
            item_url = $(this).data("src");
            var args = top.tinymce.activeEditor.windowManager.getParams();
            win = (args.window);
            input = (args.input);
            win.document.getElementById(input).value = item_url;
            top.tinymce.activeEditor.windowManager.close();
        });
    </script>

</div>
</body>
</html>