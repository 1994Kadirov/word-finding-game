<?php

class WordGame {
    private string $word;
    private array $wordToArray = [];
    public int $len;
    private array $userWord = [];
    public string $showWord;

    public function __construct($word){
        $this->word = $word;
        $this->wordToArray = str_split($word);
        $this->len = strlen($word);
        $this->showWord = $word[0];
    }

    public function checkWord($word){
        if($this->word == $word){
            return true;
        }else{
            $findLetter = [];
            for ($i=0; $i < $this->len; $i++) { 
                $pos = strpos($this->word, $word[$i]);
                if($pos){
                    if(!in_array($word[$i], $findLetter)){
                        $findLetter[] = $word[$i];
                    }
                }
            }
            return implode(',', $findLetter);
        }
    }

}
$n = 3;
$game = new WordGame('hello');
echo "Salem, Men bir soz oyladim, ol ". $game->len . " ha'ripten ibarat. Bas ha'ribi ". $game->showWord."\n";
while($n--){
    if($n == 2){
        echo "So'zdi toliq jazip korin: ";
        $word = trim(fgets(STDIN));
    }else{
        echo "Jane urinip korin: ";
        $word = trim(fgets(STDIN));
    }
    if(strlen($word) != $game->len){
        echo $game->len." harip boliwi kerek\n";
        $n++;
        continue;
    }
    $check = $game->checkWord($word);
    if($check === true){
        echo "Siz uttiniz\nSoz: ".$word;
        break;
    }else{
        if(!empty($check)){
            echo "Usi ha'ripler duris keldi: `".$check. "` Biraq so'z qa'te\n";
        }
    }
}