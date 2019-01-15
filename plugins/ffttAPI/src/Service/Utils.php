<?php
/**
 * Created by Antoine Lamirault.
 */

namespace FFTTApi\Service;


class Utils
{
    public static function returnNomPrenom(string $s) {
        $nom = [];
        $prenom = [];
        $words = explode(" ", $s);

        foreach ($words as $word){
            $lastChar = substr($word, -1);
            mb_strtolower($lastChar, "UTF-8") == $lastChar ? $prenom[] = $word : $nom[] = $word;
        }

        return [
            implode(" ", $nom),
            implode(" ", $prenom),
        ];
    }

    public static function formatPoints(string $classement) : string {
        $explode = explode("-", $classement);
        if(count($explode) == 2){
            $classement=$explode[1];
        }
        return $classement;
    }

}