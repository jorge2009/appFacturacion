function nuevo(){
    var usuario=document.getElementById('usuario').value;
  //  var clave=document.getElementById('clave').value; 
   // var empresa=document.getElementById('empresa').value;
   // var perfil=document.getElementById('perfil').value; 
   // var nombre=document.getElementById('nombre').value; 
console.log("Nuevo"+usuario);
alert(usuario);




}

function actualizar(codigo){
    var usuario=document.getElementById("usuario"+codigo).value;
    var clave=document.getElementById("clave"+codigo).value; 
    var empresa=document.getElementById("empresa"+codigo).value;
    var perfil=document.getElementById("perfil"+codigo).value;   
    console.log("Actualizar"+usuario);

    var parametros = {
        "codigo": codigo,
        "usuario": usuario,
        "clave": clave,
        "empresa": empresa,
        "perfil": perfil
        };  
   
        $.ajax({
            data: parametros,
            url: "mantenimiento/ausuario.php",
            type: 'post',
             beforeSend: function () {//elemento que queramos poner mientras ajax carga
               $("#resultado").html("Procesando, espere por favor...");
             },
             success: function (response) {//resultado de la función
              $("#resultado").html(response);
              
               }
            });
   



}

function eliminar(codigo){

    console.log("Eliminar"+codigo);
}