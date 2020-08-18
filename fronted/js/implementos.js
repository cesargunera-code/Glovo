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


