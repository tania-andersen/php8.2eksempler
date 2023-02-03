<?php

// Eksempler til Version2's artikel om nyhederne i PHP 8.2: https://www.version2.dk/node/6820368

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

class User
{
   public $name;
}
$user = new User();
$user->last_name = 'Doe'; // Resulterer i en Deprecated-advarsel.

$user = new stdClass();
$user->last_name = 'Doe'; // Stadig tilladt.


readonly class BlogData
{
   public string $title;
   public string $author;
   public function __construct(string $title, string $author)
   {
       $this->title = $title;
       $this->author = $author;
   }
}

$blogdata = new BlogData("En herlig nyhed", "Tania A.");


try {
  $blogdata->title = "En nogenlunde nyhed";
} catch(Error  $e) {
  echo 'Fejl: '.$e->getMessage();
}

trait Foo
{
   public const CONSTANT = 1;
}
class Bar
{
   use Foo;
}

try {
  var_dump(Bar::CONSTANT); // 1.
  var_dump(Foo::CONSTANT); // Fejl.
} catch(Error  $e) {
  echo 'Fejl: '.$e->getMessage();
}

function alwaysFalse(): false
{
   return false;
}
?>
