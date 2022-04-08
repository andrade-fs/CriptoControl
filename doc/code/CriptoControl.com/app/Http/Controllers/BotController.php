<?php
namespace App\Http\Controllers;

use BotMan\BotMan\BotMan;
use BotMan\BotMan\BotManFactory;
use BotMan\BotMan\Drivers\DriverManager;
use BotMan\Drivers\Telegram\TelegramDriver;
use BotMan\BotMan\Messages\Attachments\File;
use BotMan\BotMan\Messages\Attachments\Audio;
use BotMan\BotMan\Messages\Attachments\Image;
use BotMan\BotMan\Messages\Attachments\Location;
use BotMan\BotMan\Messages\Outgoing\OutgoingMessage;

class BotController extends Controller
{
    public static  function gestionar(){
        $config = [
            // Your driver-specific configuration
            "telegram" => [
            "token" => env('TELEGRAM_TOKEN')
            ]
            ];
            DriverManager::loadDriver(TelegramDriver::class);
            $botman = BotManFactory::create($config);
            $value = session('posts');
            if($value->foto!=null){
                // $fotografiaReceta =  new Image('https://andradecocina.freeddns.org/imagenes/$value->foto');
                $attachment = new Image('https://criptocontrol.com/imagenes/' .$value->foto, [
                    'custom_payload' => true,
                    ]);
                    
                    // Build message object
                    $message = OutgoingMessage::create("<strong>****".strip_tags(substr($value->titulo,0,250))."...****</strong>".PHP_EOL.strip_tags(substr($value->contenido,0,100))."...".PHP_EOL.'Noticia completa en ->https://criptocontrol.com/post/'.$value->id.PHP_EOL.'Más Noticias en nuestra web ->https://criptocontrol.com/')
                    ->withAttachment($attachment);
                    $botman->say($message, '@criptocontrol', TelegramDriver::class,['parse_mode' => 'HTML']);
            
            
             
            }
    }
}