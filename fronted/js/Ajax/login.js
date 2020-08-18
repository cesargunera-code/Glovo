$('#logear-cliente').click(function(){
    let datosLogin = $('#formularioLogin').serialize();
    axios({
        method: 'POST',
        url: '../backend/api/clientes.php?accion=login',
        data: datosLogin,
        reponseType : 'JSON'
    }).then(function(respuesta){
        if(respuesta.data.valido){
            window.location.href = "index.php";
        }else{
            alert('Credenciales Incorrectas');
        }
    }).catch(function(error){
        console.error(error);
    })
});