<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity
 */
class FormFieldReference
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    public int $id = 3;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\UserProfile")
     * @ORM\JoinColumn(nullable=false)
     */
    public $author;

    public $text = 'Lorem ipsum dolor sit amet';
    public $slug = null;
    public $textarea = <<<TEXT
Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.
TEXT;

    public string $textEditor = <<<HTML
Lorem ipsum <b>dolor sit amet</b>, consectetur adipisicing elit, sed do eiusmod
tempor incididunt <i>ut labore et dolore</i> magna aliqua. Ut enim ad minim veniam,
quis nostrud exercitation <a href="#">ullamco laboris nisi</a> ut aliquip ex ea commodo
consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse
cillum dolore eu fugiat nulla pariatur.
HTML;

    public string $codeEditor = <<<'PHP'
<?php

namespace Symfony\Component\HttpFoundation;

class Request
{
    // ...
    
    public function getScriptName()
    {
        return $this->server->get('SCRIPT_NAME', $this->server->get('ORIG_SCRIPT_NAME', ''));
    }
}
PHP;


    public $boolean = false;
    public $autocomplete = [0];
    public $checkbox = [0, 1];
    public $radiobutton = 2;

    public $integer = 7;
    public $decimal = 81.26;
    public $percent = 0.35;
    public $money = 199 * 100;

    public $date;
    public $time;
    public $datetime;
    public $timezone = 'Europe/Madrid';

    public string $country = 'CR';
    public string $currency = 'JPY';
    public string $language = 'ar';
    public string $locale = 'zh_Hans_MO';

    public array $array = ['Item 1', 'Item 2'];
    public $collectionSimple;
    public $collectionComplex;

    public string $image = 'placeholder-image.png';

    public string $color = '#6174d1';
    public string $email = 'user@example.com';
    public string $telephone = '+1 800 555 0199';
    public string $url = 'https://github.com/EasyCorp/EasyAdminBundle';

    /**
     * @throws \Exception
     */
    public function __construct()
    {
        $this->date = new \DateTimeImmutable(sprintf('now + %d days', random_int(3, 30)));
        $this->time = new \DateTimeImmutable(sprintf('now - %d hours', random_int(100, 500)));
        $this->datetime = new \DateTimeImmutable(sprintf('now + %d months', random_int(4, 12)));
    }
}
