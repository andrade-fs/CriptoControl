# Manuais

## Manual técnico do proxecto

### Instalación
- Requerimentos Hardware: 
      
  - Un ordenador ou dispositivo móbil, con conexión a internet, preferiblemente unha conexión mínima de 3g en uso de datos móbiles, para unha mellor experiencia do usuario.
  - Un servidor web, non necesitamos moitos recursos pero si queremos, unha estabilidade mellor, un servidor de 2 cores, e 2gb de RAM, valería de sobra para unha cantidade grande de usuarios rexistrados.
  
- Requirimentos Software:
  - Por un lado temos o servicio da API de CoinMarketCap, a cal nos facilita os datos con respecto as moedas, como o precio, a súa capitalización de mercado, etc..
  - Tamén uso os servicios de Google, Facebook e Twitter para o rexistro e incio de sesión dos usuarios.
  - Recaptcha de Google, para formulario de contacto.
  - Comunicámosnos con Telegram mediante un Bot, polo que no caso de copiar o código para un servidor novo sería necesario a instalación dos respectivos paquetes.
  - Sistema operativo do Servidor: Linux, no meu caso uso Debian 10 server.
  ```
  $ composer install
  $ npm run dev
  
  # Modificamos nuestro .env
  
  # php artisan migrate:fresh --seeder
  # php artisan server
  
  #Happy hacking!
  ```

- Control de usuarios:
  - Estes podense rexistrar manualmente, cubrindo un formulario. Os datos sensibles, neste caso a contraseña, é encriptada de tal forma que no caso de que me accedan a base de datos, non saberian as contraseñas dos usuarios.
  - Tamén se poden rexistrar con Google, Facebook e Twitter, nestes casos non almaceno contraseña, almaceno un ID, a foto do seu avatar da conta, etc.. Estes datos comprometeste a dalos, nada máis aceptar o login cos servicios externos.

- Carga inicial de datos na base de datos. Migración de datos xa existentes noutros formatos.
  - No caso de querer empezar de cero, como usei Laravel co comando "php artisan migrate" ou "php artisan migrate:refresh --seed" no caso de ter xa montada  base de datos, levantarianos unha base de datos, xa cas relacións e con algúns datos de proba.
  - No caso de querer manter os datos actuais habería que exportar ditos datos dende a interfaz do phmyadmin nun fichero "*.sql" .

- Usuarios do sistem:
  -  Os usuarios rexistrados poderán interactuar con todo o contido da páxina, menos si cos permisos de administrador, o cal a maiores de crear un portfolio das monedas en posesión, crear/editar/eliminar (as súas propias publicacións), comentar e votar nas publicacións, poderá a maiores eliminar usuarios, publicacións e comentarios.
  -  Os usuarios anónimos ou non rexistrados soamente poderán ver as publicacións e os comentarios.

## Melloras futuras
- Mellorar o select para seleccionar as moedas, e cambialo por un buscador.
- Poñer un buscador no nav, para buscar noticias.
- Permitir cambiar o valor da divisa, é decir, elexir frente Euros ou Dolares, en lugar de amosar sóamente os datos en dolar.
- Permitir usuarios con subscripción os cales terán os datos das modas actualizados cada min. en lugar de cada 2h.
- Para o anterior poñer unha pasarela de pago mediante paypale bitpay.
- Unha vista para mellorar a interfaz das noticias coas categorias.
- Mellorar ou optimizar a páxina para que carge más rápido situándoa nun servidor con máis recursos, e evitando a carga de javascript que non se execute, no momemnto, "loazy load".
  

## Política de privacidade
- Seguindo os requisitos e adaptandome as leis vixentes a dia 11/06/2021, e según marca:
  - [Ley Orgánica 3/2018, de 5 de diciembre, de Protección de Datos Personales y garantía de los derechos digitales. ](https://www.boe.es/buscar/act.php?id=BOE-A-2018-16673)
  - [General Data Protection Regulation (GDPR)](https://eur-lex.europa.eu/eli/reg/2016/679/oj)
- Enlacei a miña páxina varios documentos legais, de carácter público, situados no footer.
  - [Aviso Legal](https://criptocontrol.com/aviso_legal)
  - [Cookies](https://criptocontrol.com/coockies)
  - [Política de privacidad](https://criptocontrol.com/politica_privacidad)


