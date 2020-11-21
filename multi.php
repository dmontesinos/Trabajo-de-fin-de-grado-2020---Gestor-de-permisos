<!doctype html>
<html>
<head>

         <link rel="stylesheet" href="https://netdna.bootstrapcdn.com/bootstrap/3.1.1/css/bootstrap.min.css">

        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.0/jquery.min.js"></script>

        <script src="node_modules\selectr\dist\selectr.js"></script>

        <script>
            $(document).ready(function () {
                $("select").selectr({
                    title: 'What are your expertise?',
                    placeholder: 'Search Expertise'
                });
            });
        </script>
</head>

<body>
    <h3>Demo para seleccionar los profesores</h3>
    <br>
    <br>

    <div class="row">
        <div class="col-sm-3">
          <form action="multi.php">
            <!-- Using data attributes -->
            <select name="foods" data-selectr-opts='{ "title": "Selecciona los profesores", "placeholder": "Search skills", "maxSelection": 5 }'  multiple>
                <option data-selectr-color="rgb(1000, 163, 150)" value="Bootstrap">Bootstrap Framework</option>
                <option data-selectr-color="rgb(255, 105, 158)" value="jQuery" selected>jQuery</option>
                <option data-selectr-color="rgb(155, 0, 133)" value="HTML">HTML</option>
                <option data-selectr-color="rgb(185, 48, 122)" value="CSS">CSS</option>
                <option data-selectr-color="rgb(123, 182, 101)" value="PHP" selected>PHP</option>
                <option data-selectr-color="rgb(229, 183, 55)" value="MySQL">MySQL</option>
                <option data-selectr-color="rgb(135, 214, 139)" value="ReactJS">ReactJS</option>
            </select>
            <input type="submit">
          </form>
        </div>

    </div>

</body>
</html>
