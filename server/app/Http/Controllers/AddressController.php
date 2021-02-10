<?php

namespace App\Http\Controllers;

use Illuminate\Http\JsonResponse;
use App\Http\Requests;


class AddressController extends Controller
{
    public function parseAddressesAction(): JsonResponse
    {

        //PSEUDO CODE

        //create a hash where the key is the first letter of the first name and the value is the array of names that start with a
        //run through the keys of the hash and run n^2 for every element within the subset of that letter, pushing duplicates to an array

        //this helper function uses leveenshtein distance between two strings to determine if something is to be considered a duplicate or not
        //the threshold is an arbitrary number but can easily be changed
        //Time complexity is O(n^2) but compared entries only within similar keys of the hashmap constructed
        function find_non_dupes($array) {
            $threshold = 10;
            $non_dupes = array();
            for ($i=0; $i < count($array); $i++) { 
                $entry_A = $array[$i];
                $is_dupe = false;

                for ($j=$i+1; $j < count($array); $j++) { 
                    $entry_B = $array[$j];
                    if(levenshtein(implode($entry_A), implode($entry_B)) < $threshold) {
                        $is_dupe = true;
                    }
            }
            if(!$is_dupe) {
                    array_push($non_dupes, $entry_A);
                }
            }

         return $non_dupes;
        }

        $entries = array();
        $non_duplicate_entries = array();
        $duplicates = array();


        $first = true;
        if (($handle = fopen("normal.csv", "r")) !== FALSE) { //doesn't properly read csv yet
        while (($data = fgetcsv($handle, 1000, ",")) !== FALSE) { //parses csv file row by row
            array_shift($data);
            
            if($first) {
            $first = false; //skip the first line of the csv
            continue;
            }
            //creates hash table where keys are first letter of first name and values are all entries that meet that requirement
            if (!$entries[$data[0][0]]) {  //causes a warning for undefined array key..?
            $entries[$data[0][0]] = array();
            } 
            array_push($entries[$data[0][0]], $data); 

        }
        fclose($handle);
        } else {
        echo "Error. File not Opened";
        }

        for ($i=0; $i < count(array_keys($entries)); $i++) { 
        
        $current_key = array_keys($entries)[$i];
        $current_array = $entries[$current_key];
        
        $result = find_non_dupes($current_array);
        
        array_push($non_duplicate_entries, $result);
        
        }

        
        return new JsonResponse($non_duplicate_entries, 200);


        
    }
}
