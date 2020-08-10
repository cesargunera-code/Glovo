document.querySelector('head').innerHTML+=
`<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<meta http-equiv="X-UA-Compatible" content="ie=edge">
<link rel="stylesheet" type="text/css" media="screen" href="css/bootstrap.min.css" />
<link rel="stylesheet" href="css/material-design-iconic-font.css">
<link rel="stylesheet" href="css/main.css">`;
document.querySelector('footer').innerHTML+=
`<div class="row px-5">
<div class="col-2">
    <img src="resource/icons/glovo-logo-3.svg" alt="" srcset=""><br>
    <p class="mt-3">
        <a class="text-white" href="#">Sobre nosotros</a>
    </p>

</div>
<div class="col-2">
    <h6 class="h6 mb-4" style="color: #9B9998;">
        TRABAJA CON NOSOTROS
    </h6>
    <p>
        <a class="text-white" href="https://jobs.glovoapp.com/">Empleo</a><br>
    </p>
    <p>
        <a class="text-white" href="https://cloud.partner.glovoapp.com/Partners">Establecimientos Asociados</a><br>    
    </p>
    <p>
        <a class="text-white" href="https://glovoapp.com/es/glovers">Repartidores</a><br>
    </p>
    <p>
        <a class="text-white" href="https://business.glovoapp.com/">Glovo Business</a>
    </p>
    
</div>
<div class="col-2">
    <h6 class="h6 mb-4" style="color: #9B9998;">
        AYUDO
    </h6>
    <p>
        <a class="text-white" href="https://glovoapp.com/es/faq">Preguntas frecuentes</a><br>
    </p>
    <p>
        <a class="text-white" href="#">Contacto</a><br>
    </p>
</div>
<div class="col-2">
    <h6 class="h6 mb-4" style="color: #9B9998;">
        TERMINOS LEGALES
    </h6>
    <p>
        <a class="text-white" href="https://glovoapp.com/es/legal/terms">Terminos y Condiciones</a><br>
    </p>
    <p>
        <a class="text-white" href="https://glovoapp.com/es/legal/privacy">Politica de Privacidad</a><br>
    </p>
    <p>
        <a class="text-white" href="https://glovoapp.com/es/legal/cookies">Politica de Cookies</a><br>
    </p>    
</div>
<div class="col-2">
    <h6 class="h6 mb-4" style="color: #9B9998;">
        SIGUENOS
    </h6>
    <p>
        <a class="text-white" href="https://www.facebook.com/glovoappES">Facebook</a><br>
    </p>
    <p>
        <a class="text-white" href="https://twitter.com/Glovo_ES">Twitter</a><br>
    </p>
    <p>
        <a class="text-white" href="https://www.instagram.com/glovo_es/">Instagram</a><br>
    </p>
    
    
</div>
<div class="col-2">
    <img class="img-fluid m-2" src="resource/icons/download-apple-store.svg" alt="" srcset="">
    <img class="img-fluid m-2" src="resource/icons/download-playstore.svg" alt="" srcset="">
</div>
</div>`;

function trasladarScroll(x,y){
    window.scroll({
        top: y,
        left: x,
        behavior: 'smooth'
    });
}
var categorias = [];
function crearEmpresasJSONS(){
    let nombresCategoria= ["Farmacias","Tiendas","Super","Express","Comidas"]
    for(let i=0;i<nombresCategoria.length;i++){
        let categoria = {
            "codigoCategoria": (i+1),
            "nombreCategoria":nombresCategoria[i],
            "empresas":[]
        };
        for(let j=0;j<9 ;j++){
            let empresa = {
                "codigoEmpresa": (j+1),
                "nombreEmpresa": "empresa"+(j+1),
                "direccion": "direccion"+(j+1),
                "telefono": "telefono"+(j+1),
                "contacto": "contacto"+(j+1),
                "correo": `empresa${j+1}@empresa.com`,
                "imagen": "resource/img/img-categorias/comida.webp",
                "productos": []
            };
            for(let z=0;z<8;z++){
                let producto = {
                    "codigoProducto": (z+1),
                    "nombreProducto": "producto"+(z+1),
                    "descripcion": "descripcion"+(z+1),
                    "imagen": `resource/img/img-productos/img-${z+1}.jpg`,
                    "precio": 99+i+z+j
                }
                empresa.productos.push(producto);
            }
            categoria.empresas.push(empresa)
        }
        categorias.push(categoria);
    }
}
crearEmpresasJSONS();
