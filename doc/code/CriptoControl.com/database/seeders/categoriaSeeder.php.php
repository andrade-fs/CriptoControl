<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class categoriaSeeder.php extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $cat =array("Bitcoin","Ethereum","AltCoin","Regultation","BlockChain", "Defi", "ICO");
        $descr = array("El bitcoin es una moneda virtual, independiente y descentralizada, puesto que no está controlada por ningún Estado, institución financiera, banco o empresa. Se trata de una moneda intangible, aunque puede ser utilizada como medio de pago igual que el dinero físico.<br>Como ya sabes, los bitcoins se generan a través del proceso digital de minería. Además Bitcoin es una moneda exclusivamente digital que no existe en el mundo físico, es descentralizada, y no existe ningún gobierno o ente detrás que regule su emisión.","El Ethereum (ETH/USD) es una plataforma de programación, un lenguaje de programación, un protocolo y una moneda (Ether) creada para financiar el proyecto. Su creador, Vitalik Buterin utiliza esta tecnología con el fin de descentralizar programas y aplicaciones informáticas, para ser accesibles a todo el mundo.<br> Ethereum funciona como una plataforma de código abierto basada en la tecnología blockchain. Este blockchain se aloja en muchos ordenadores del mundo, por lo que está descentralizado. Cada ordenador cuenta con una copia del blockchain y debe haber un acuerdo generalizado antes de aplicar cualquier cambio en la red.", "La palabra altcoin es un acrónimo que viene de las palabras“alternativa” y “coin”. Este termino se utiliza para referirse a las monedas digitales alternativas a Bitcoin, es decir, criptomonedas que no son el Bitcoin. ... Estas monedas cotizan en mercados financieros y su valor depende de la oferta y la demanda.", "A pesar de que en España la posesión de criptomonedas está sujeta al control del fisco, y hay que notificarlas en la Declaración de la Renta, la realidad es que la normativa nacional que las regula está a la cola en el ámbito europeo.", "El Blockchain (o cadena de bloques) es una base de datos compartida que funciona como un libro para el registro de operaciones de compra-venta o cualquier otra transacción. Es la base tecnológica del funcionamiento del bitcoin, por ejemplo. Consiste en un conjunto de apuntes que están en una base de datos compartida on-line en la que se registran mediante códigos las operaciones, cantidades, fechas y participantes. Al utilizar claves criptográficas y al estar distribuido por muchos ordenadores (personas) presenta ventajas en la seguridad frente a manipulaciones y fraudes. Una modificación en una de las copias no serviría de nada, sino que hay que hacer el cambio en todas las copias porque la base es abierta y pública.", "Defi o Finanzas Descentralizadas es un termino que viene a definir protocolos financieros de codigo abierto, no permisionados y con arquitecturas descentralizadas. ... En su definición mas purista podríamos decir que prácticamente ningun protocolo de los considerados DeFi cumplen de manera estricta todas estas condiciones", "Una ICO (cuyas iniciales significan “Oferta inicial de moneda”, en inglés: “Initial Coin Offering”) busca la financiación de una iniciativa mediante la emisión de una moneda sobre la tecnología Blockchain, las criptomonedas")
        for ($i=0; $i < sizeof($cat); $i++) { 
            DB::table('categorias')->insert([
                    'nombre'=> $cat[$i],
                    'descripcion'=>$descr[$i],
            ]);
        }
    }
}
