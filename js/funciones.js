function mostrarContenidoPricipal () {
    $(document).ready(function(){
        $('#testing').click(function(){
            $('#container-fluid').load('index.php?accion=principal', function () {
                console.log('Carga satisfactoria!');
            });
        });
    });
}