# Codificación e Probas

#### CSS/Frontend

- Na miña páxina teño dúas vistas:
    - **Vista Xenérica:** Visualización de publicacións, etc.., a cal esta feita con bootsrap, con código propio. Tiven uns pequenos erros de responsive pero ocultando e engadindo elementos amañei ben.

    - **Vista panel de control:** Creación de publicacións, engadir monedas, etc..., a cal está feita cunha plantilla, a cal ten permitido ser usada para proxectos persoais, académicos, sempre e cando non se lle venda a páxina a terceiros.
        - [SBADMIN2](https://startbootstrap.com/theme/sb-admin-2)

#### PHP/Backend
- Proxecto completamente feito con Laravel (PHP).

    - **1º Erro:** Uso Modales para editar, eliminar e engadir elementos, obxectos, a base de datos. Polo cal non podo facer como de costume, crear unha vista e referenciala no web.php, e usar un controlador, para esto, usei o controlador claramente, pero mediante jquery, de tal forma que mediante petición get, recollía os datos e xogando cos obxectos de DOM, insería  os datos nos modales, finalizando así cun botón, unha chamada acción a cal xa me fai unha carga da páxina subindo, editando ou eliminando o elemento en si.

    - **2º Erro:** Uso gráficas para representar a evolución, e en que cantidades se compón o teu portfolio. Para isto mediante Javascript, chamo a un controlador o cal me devolve os datos filtrados do usuario. E monto o gráfico.

#### Conexión API

- Para conexión coa API de CoinMarketCap, establecín unha ruta, que accede a un controlador, a cal descodifica a resposta transformándoa nun JSON. Con esta información vólcoa nun archivo .json, no cal me vou respaldar para facer as peticións. O motivo?

    - **3º Erro:** Teño un limite de 333 créditos diarios e cada chamada a API consúmeme 25 créditos, polo cal necesito este .json para non pasarme dos créditos, e ter sempre un control. Para isto accedo a API cada 2h desde unha tarefa programada con schedule en laravel.

    - **4º Erro:** Tardaba moito en querer recorrer as case 6000 liñas de json, para acceder as variables de nome das monedas, polo que almacénoas noutro json aparte cando fago a chamada a API.

    - **5º Erro:** Polo mesmo erro de antes almaceno en base de datos un campo "statusacount", o cal me sirve para coñecer o saldo da conta do usuario, solo teño unha entrada por día, no caso de que o usuario agrega unha moneda as 12:00 e o schedule se active as 13:00 e as 15:00  fará un update ata que se pase de día.

#### Sistema de Usuarios
- Para iniciar sesión na web, podelo facer de 4 métodos, mediante: google, facebook, twitter, ou manualmente.
    - Para o inicios de sesión con redes sociais:
        - **6º Erro:** Almaceno datos en diferentes táboas na base de datos, polo cal teño que comprobar si o usuario que se rexistra ou inicia sesión xa ten unha conta asociada, para isto miro se ten o mesmo nickname ou email, de ser así interpreto como un mesmo usuario.

#### Sistema de votos máis comentarios
- Votos:
    - **7º Erro:** Pensei ao grande e imaxinei si tiña 100 usuarios, tería 100 rexistros de voto por cada publicación, así que optei por crear un "serialice" e ir almacenando os id dos usuarios que votan en cada publicación. Así solo tería un arraay serializado de 100 entradas en lugar de 100 entradas na base de datos polo cal me pareceu más óptimo no momento de carga.

    - **8º Erro:** Ao principio por non filtrar os datos, tiña ids no array duplicados, por un fallo no controlador.

- Comentarios:
    - **9º Erro:** Para ver os comentarios das túas publicacións no apartado de "criptocontrol/post", mostrabamos todos polo que tiña que facer referencia a que só quería mostrar os das publicacións do propio usuario, mediante 2 foreach anidados.

#### Formulario de contacto

- Valido que os usuarios que contacten comigo, sexan persoas e non bots,  mediante un recaptcha de google, para iso implementei un requisito cando envías o formulario, que si non está autenticado non envíe nada.
    - **10ª Erro:** Estaba usando a versión 3 coa lóxia da versión 2.

## Codificación

## Probas
- **1º Erro:** Non me funcionaba a petición get ao controlador e debugeando con diedumps e consolelogs, nos respectivos linguaxes, dei coa solución de que tiña que ter a ruta de todas formas definida para poder acceder e nona acceder directamente ao controlador.

- **2º Erro:** Para o uso das gráficas intentei pasar os datos mediante php con "echo $variable" pero non me funcionaba, entendín que me cargaba primeiro o php e despois o javascript así que solucioneino coma antes cunha petición get ao controlador.

- **3º Erro:** Isto dinme de conta xa cando mirei a api pero pensaba que aínda sen créditos me accedería de todas formas ao ultimo rexistro, e para evitar problemas volco todo nun json  e accedo aos datos mediante el.

- **4º Erro:** Para facer os select ou sempre que aparecer un nome dunha moneda na paxina,  tiña que recorrer as 6000 liñas para topar con ela así que reducina a case un terzo almacenando solo o nome das monedas sen a súa información.

- **5º Erro:** Para evitar recorrerme e facer as contas de como vai o usuario un dia anterior (onte), e actualmente e para o uso das gráficas intentei desde facer bucles ata consultas pero o más fácil foi cando fago a petición a API dependendo do de si existe un rexistro dese día ou no edita ou sube unha entrada. Así teño un control do usuario desde que se rexistra, e un fácil acceso ó mesmo.

- **6º Erro:** Teño unha base de datos Users, e outro social_logins as cales relacionase mediante o id do usuario pero tiña un erro, que si o usuario se rexistra manualmente non aparecerá na táboa social_logins e si se rexistra co mesmo email desde google por exemplo a táboa tería 2 emails iguales e daba erro, para íso comprobo si existe en users e despois en social login e de non ser así ou si ser, edita os campos do usuario para actualizar a foto de perfil, e nome no caso de que cambiara e inicia sesión. En resumo detecto o mesmo usuario si o email é igual.

- **7º Erro:** Acordeime de como garda Wordpress os datos do formulario de contacto na base de datos, e sempre ten unha táboa por formulario e unha única celda con un serialice cos datos do usuario ou usuarios, e pensei que si wordpress o fai así, será por optimización así que levei esa lóxica ao meu código para os votos.

- **8º Erro:** Estaba filtrando polo id das publicacións nun bucle polo cal, sumábame todos os ids, agrupándomos nun array tendo ids duplicados.

- **9º Erro:** Para os comentarios pensei en facer como nos votos, pero érame máis complicado para estar editando, e vendo de quen é en que publicación estaba así que preferín a facilidade antes que estabilidade, por tema de tempo.

- **10º Erro:** Seguindo un foro moi coñecido (StackOverflow), dinme de conta que o recaptcha non me almacenaba o token pois non estaba accedendo a nada, as miñas claves eran da versión 2 e eu estaba implementando a versión 2.
