# Estudo preliminar - Anteproxecto

## Descrición do proxecto
- A idea do proxecto xorde a raíz dunha necesidade persoal, de poder administrar de forma rápida as miñas criptomoeda. Buscaba algo sinxelo, poder ver si estou gañando ou perdendo ou si unha determinada moeda subía ou baixaba, e todo isto queríao ter de forma organizada, que con un visual rápido poderá obter a información.

- A súa posta en marcha é necesaria **principalmente por 3 motivos**:
    1. Ningún "exchange" ten unha **administración das moedas** que compraches dándoche de forma rápida que moeda subiu moito e que moeda baixou, podendo así **organizalas e reinvestir ganancias.**

    2. Comentando con outros inversores e traders de criptomoedas comentáronme que **usarían a aplicación polos datos xa citados**, polo cal espérase a sua creación.

    3. As criptomoedas é un **mercado que está en auxe**, tendo moitos inversores con poucos coñecementos ou tempo para atender as súas inversións, desta maneira solo con rexistrarse poderán ver como van as súas moedas.

- O **principal obxectivo** é poder **administrar as criptomoedas en posesión**, ou poder ver cales son as máis cotizadas, as que subiron máis de valor, etc.. Tamén terá un **apartado de noticias/Post de usuarios**, coa finalidade de que estes creen e **poidan votar e comentar**, as diferentes ideas, noticias, facendo así comunidade entre todos os que inverten, **estes posts publicaranse nunha canle de telegram**, segundo os datos da api poderase mostrar tamén o top 10 criptomoedas segundo a súa capitalización en 24h.

- Todos estes datos, sacaranse mediante unha API. Dita API é a de coinmarketcap, a cal me permite saber entre moitos datos, o ultimo prezo de conversión.

- Resolverá principalmente que **o usuario inversor teña un control en canto a información**, para administración das súas moedas. Un exemplo sería si temos unha moeda vámoslle chamar moedaX, comprámola en 0.02€ e investimos 10 euros, e dicir, temos 500 moedas, si dentro de un mes a moeda vale 0.03, estáslle gañando 5 euros, pois mediante a indexación de toda está información o usuario poderá ter rapidamente, sen falta de mirar en páxinas externas ou comparar prezos. Outro punto clave será a visualización das moedas que máis baixaron e así como as que máis subiron como unha especie de top10. 

> [Documentación de API](https://coinmarketcap.com/api/documentation/v1/)

- As principais **funcionalidades** son:
    1. Control de usuarios, termos os usuarios autenticados, os non autenticados, e usuarios administradores.

    2. A páxina terá limitacións en función do usuario
        - Os usuarios **non autenticados**, poderán ver os post da xente, pero non poderán interactuar con eles, tampouco poderán crear ou engadir as súas moedas para así administralas. Unicamente poderán ver os temas de conversa.

        - Os usuarios **autenticados** Poderán facer e interactuar cos temas de conversas (posts), poderán engadir as súas moedas para administralas, editar, eliminar e ver, é ter acceso ao top 10.

        - Usuario **Admin**, Poderá eliminar usuarios a modo de baneo, por si comentaron cousas fora de lugar, etc. Poderán eliminar temas de conversa (Post).

    3. Os t**emas de conversa,** permitirán **votacións de un só usuario,e tantos comentarios como sexan oportunos**. Todos estes post, mostraranse nunha **listaxe** de 2 formas, **segundo os máis recentes, e segundo os que teñan máis comentarios**. O usuario poderá quitar e dar un voto por post, e comentar ou eliminar o comentario.

    4. Cada usuario terá unha táboa, onde aparecerá
        - **Nome de criptomoeda,** con un enlace onde referenciará a páxina de coinmarketcap 
        > Ex: Si temos bitcoin, pois o nome será un enlace que irá a https://coinmarketcap.com/currencies/bitcoin/
        - **Capital de inversión** en USD.
        - **prezo de compra** en USD
        - % segundo estea ganando ou perdendo.
        - **Beneficio ou perdida** na moeda de cambio neste caso a versión inicial só terá USD.
        - **Editar o borrar**.

### Destinatarios

Ésta aplicación ten como **público obxectivo** calquera **persoa inversora** que se interese polo mundo das criptomoedas, **indiferentemente da idade** ou do contexto social.

### Estudo de necesidades

Algunhas das **aplicacións que resolven en certa medida este problema** son:
    - [CoinMarketCap](https://coinmarketcap.com/).
    - [CoinBase](https://www.coinbase.com/es/price).
    - Calquera exchange como coinbase, binanance,..
Aínda que son bastantes, ningunha oferta unha solución como a xa citada, aínda que se podería estimar consultando entre aplicacións simultáneas.
### Xustificación do proxecto
Crear unha **comunidade a modo de foro,** temas de conversa relacionado coas criptomoeda, ou proxectos similares como NFT´s... e sobre todo a **administración do portfolio,** podendo ter un control en canto as moedas en posesión.
### Ideas para a súa comercialización
- **Promoción en redes sociais:**

    1. Instagram, unha das redes sociais máis grandes, crearase unha conta a modo de información, con enlace directo a páxina web, e subiranse post, con información nova, ou as propias noticias que se creen na páxina web.
- **Publicidade:**
    1. Google ads, poderemos publicitala en facebook,  enfocándonos nos nosos clientes potenciais, con axustes propios de google ads.

    2. O boca a boca será crucial, pois si de verdade é útil, a xente que a use comentarao adquirindo así novos usuarios.
- **Posicionamento SEO:**

    1. Usaremos ferramentas, [google search console](https://search.google.com/search-console/about).
    2. Evitaremos ter enlaces baleiros.
    3. O uso de código asci para "ñ" e "~".
    4. Poderemos usar tamén [google analytics](https://admin.google.com/a/cpanel/iessanclemente.net/ServiceNotAllowed?service=analytics&continue=https%3A%2F%2Fanalytics.google.com%2Fanalytics%2Fweb%2F%23).


### Modelo de negocio

- **Por publicidade**, tendo 2 ou 3 espazos onde anunciantes poderán poñer a súa publicidade.

## Requirimentos
Os principais factores a ter en conta en canto a:
- **Infraestrutura**
    1. API para obter os datos das moedas -> [API a usar](https://coinmarketcap.com/api/documentation/v1/)
    2. Dominio Web - criptocontrol.com -> (ionos // ovh)
    3. Servidor web -> Aws
    4. Base de datos -> phpmyadmin.
    5. almacenamento-> O servidor usara EBS, Elastic bloock store polo que será dinámicamente segundo se use.
    6. Memoria 1gb +/-.

- **Backend**
    1. Usarase o framework de laravel, usando así php como linguaxe principal.

- **Frontend**
    1. En canto á aparencia -> Bootstrap.
    2. Animacións, peticións API... -> JS,JQuery

## Planificación

- **Estudo preliminar**:
    - 01/04/2021 - 11/04/2021
- **Análise**
    - 11/04/2021 - 15/04/2021
- **Deseño**
    - 15/04/2021 - 22/04/2021
- **Codificación e probas**
    - 22/04/2021 - 14/06/2021


