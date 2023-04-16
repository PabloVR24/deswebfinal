<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use BotMan\BotMan\BotMan;
use BotMan\BotMan\Messages\Conversations\Conversation;
use Botman\BotMan\Messages\Incoming\Answer;

class BotManController extends Conversation
{
    protected $firstname;

    protected $email;
    public function handle()
    {
        $botman = app('botman');
        $botman->hears('{message}', function ($botman, $message) {
            if ($message == "Hola" || $message == "hola" || $message == "HOLA") {
                $this->askFirstname();
            } else {
                $botman->reply("Para iniciar una conversacion escribe 'Hola'");
            }
        });
        $botman->listen();
    }

    public function askFirstname()
    {
        $this->ask('Hello! What is your firstname?', function (Answer $answer) {
            // Save result
            $this->firstname = $answer->getText();

            $this->say('Nice to meet you ' . $this->firstname);
            $this->askEmail();
        });
    }

    public function askEmail()
    {
        $this->ask('One more thing - what is your email?', function (Answer $answer) {
            // Save result
            $this->email = $answer->getText();

            $this->say('Great - that is all we need, ' . $this->firstname);
        });
    }
    public function run()
    {
        // This will be called immediately
        $this->askFirstname();
    }
}
