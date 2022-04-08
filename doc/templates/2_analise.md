# Análise: Requirimentos do sistema

Este documento describe os requirimentos para Cripto Control especificando que funcionalidade ofrecerá e de que xeito.

## Descrición xeral

- Control de usuarios, mediante login,..
- Foro, onde se subiran publicacións e poderase comentar e votar.
- Añadir, eliminar e editar as criptomoedas, para listalas e ter un control das mesmas.
- Top 24h.

## Funcionalidades


| Acción | Entrada | Saída | realizada|
| -- | -- | -- | -- |
| Alta usuario | nome,apelidos,nick,email,contrasinal| id| Si |
| Eliminar usuario | id | - |Si |
| -- | -- | -- |-- |
| Alta post |titulo, contido,imaxen,idUser,| id|Si|
| Modificar post | id,titulo,contido,imaxen | - |Si|
| Eliminar post | idUSer,idPost | - |Si|
| -- | -- | -- |-- |
| Alta moedas |nome, prezo de compra, cantidade, idUser| id| Si|
| Modificar moedas | idUser,id, nome,prezo de compra, cantidade| - |Si|
| Eliminar post | idUser,id | - |Si|
| -- | -- | -- |-- |
| Alta Comentarios |idPost, contido, idUser| id|Si|
| Eliminar Comentarios | idPost,idUSer,idcomentario| - |Si|
 -- | -- | -- |-- |
| Formulario de Contacto |nombre,apellidos, contenido, email, recaptcha| Mail|Si|
 -- | -- | -- |-- |
| Top 24h |--|moneda nombre, cap merc, valor, subida |Si|
 -- | -- | -- |-- |
| Grafico Trading View |--|iframe Trading View |Si|
 -- | -- | -- |-- |
| Bot de telegram|Publicación| Mensaxe na canle de telegram |Si|
 -- | -- | -- |-- |
|Usuario Administrador|--| -- |Si|

## Requirimentos non funcionais

- Eficiencia:  
    - As peticións a API serán rápida debido a utilización de JS.
    - A base de datos é de MySQL, a cal é capaz de analizar máis de 1000 consultas por segundo, moitísimas mais das que teremos.
    - Ao ter unha máquina de Ec2 de AWS, contamos con 1gb de memoria ram, supoñendo así uns 50 usuarios simultáneos.

- Seguridade: 
    - Usarei roles para á xestión de permisos, polo que todo quedará rexistrado na base de datos.
    - A páxina contara cun certificado SSL valido, proporcionado por lets encrypt.
    - As contrasinais e demais información dun certo carácter sensible almacenarase cifrade mediante md5,..

- Usabilidade:
    - A páxina será moi intuitiva, terá unha temática a modo de panel de control, con poucas cousas nas cales despistarse, tendo así cunha simple ollada unha idea de como funciona.
    - Na medida do posible intentarei, controlar todos os posibles errores evitando enlaces perdidos, páxinas baleiras, ou errores do servidor.
    - Usarei Bootstrap, polo que a páxina web será visible en calquera dispositivo ( Responsive design).

## Tipos de usuarios

- Administrador:
    - A maiores poderán eliminar usuarios, a modo de "bloqueo" e liminar Post ou comentarios.

- Rexistrado:
    - Poderán crear Posts, comentar e votar os posts xa creados.
    - Eliminar os Post, si son propietarios deles.
    - rexistrar, eliminar e editar as moedas que indiquen.
    - Ver o top 10 moedas con maior capitalización de mercado.

- Anónimos/Invitados:
    - Unicamente poderán ver Posts e comentarios.


## Contorna operacional
-  Os requisito mínimos son, unha conexión a internet é un navegador web, indiferentemente si estamos nun dispositivo móbil ou no.

## Normativa

### Lei de protección de datos

- Como imos a ter un sistema de login, imos tratar con información dos usuarios necesitarei unha páxina de protección de datos, que cumpla a:
    - Ley Orgánica 3/2018, de 5 de diciembre, de Protección de Datos Personales y garantía de los derechos digitales (LOPDPGDD).

- Aviso legal:
    - Nesta paxina explicarei o uso e metodoloxía da páxina deixando ben claro, que ningún post ou información da páxina é unha recomendación de compra ou venta de criptomoedas.

- Polítca de Cookies:
    - Aparecerá unha mensaxe de cookies que usamos e solo estarán activadas as necesarias podendo o usuario escoller si as acepta ou no, como rixe a lei.

 - [Planificación](https://gitlab.iessanclemente.net/dawo/a19santiagoaf/-/blob/master/doc/templates/a2_planificacion.md)
 - [Orzamento](https://gitlab.iessanclemente.net/dawo/a19santiagoaf/-/blob/master/doc/templates/a3_orzamento.md)


