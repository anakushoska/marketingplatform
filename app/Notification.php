<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Notification extends Model
{
    protected $fillable = ["subject", "number_of_emails", "body", "status","photo"];

    public function updateSubject()
    {
        $vowels = ["a", "e", "i", "o", "u", "A", "E", "I", "O", "U", "а", "е", "и", "о", "у", "А", "Е","И","О", "У"];
        $updatedSubject="";
        $count=0;

        for($i=0; $i < strlen($this->subject);$i++){

            $updatedSubject[$i]  = $this->subject[$i];

            if(in_array($this->subject[$i],$vowels)) {
                $count++;

                if($count % 2 == 0 && $count != 0){
                    $updatedSubject[$i]  = strtoupper($this->subject[$i]);
                }
            }
        }
        return $updatedSubject;
    }

    public function getWordWithMostWovels()
    {
        $vowels = ["a", "e", "i", "o", "u", "A", "E", "I", "O", "U", "а", "е", "и", "о", "у", "А", "Е","И","О", "У"];
        $words=explode(" ",$this->body);
        $mostVowels = ["word" => "", "vowelCount" => 0, "vowels" => []];

        foreach($words as $word){

                preg_match_all('/[aeiou]/i', $word, $matches);
                $vowels=count(array_unique($matches[0]));

                if($vowels > $mostVowels["vowelCount"]){
                    $mostVowels["word"]=$word;
                    $mostVowels["vowelCount"]=$vowels;
                    $mostVowels["vowels"]=array_unique($matches[0]);
                }
        }

        return $mostVowels;




        }
    }



