<?php

namespace Controllers;

use Models\Contactos;

class ContactosController extends Controller {
    public function index(){

        echo 'estoy funcionando'."<br/>";

        response()->json(Contactos::all());
    }
}

/* 
        public function prueba()
    {
        $audio = "<button class='reproductor'>Radio Check</button>
        <audio src=''></audio>
        <script>
            let boton = document.querySelector('.reproductor')
            let audioEtiqueta = document.querySelector('audio')
        
            boton.addEventListener('click', () => {
              audioEtiqueta.setAttribute('src', '/Devloteca/audio/check.mp3')
              audioEtiqueta.play()
              console.log(`Reproduciendo: `)
            })
        </script>
        ";

        echo $audio;
    }
 */