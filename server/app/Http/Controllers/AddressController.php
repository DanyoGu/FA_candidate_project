<?php

namespace App\Http\Controllers;

use Illuminate\Http\JsonResponse;
use App\Http\Requests;


class AddressController extends Controller
{
    const THRESHOLD = 50; //Class constant that defines what constitutes a duplicate or not
   
    //this helper function uses leveenshtein distance between two strings to determine if something is to be considered a duplicate or not
    //the threshold is an arbitrary number but can easily be changed
    //Time complexity is O(n^2) but compared entries only within similar keys of the hashmap constructed
    
    //modified the helper function to return both an array of non duplicate entries as well as the duplicates
    public function parse_dupes($array) {
        $dupes = array();
        $non_dupes = array();
        $size_array=count($array);
        for ($i=0; $i < $size_array; $i++) { 
            $entry_A = $array[$i];
            $is_dupe = false;
    
            for ($j=$i+1; $j < $size_array; $j++) { 
                $entry_B = $array[$j];
                if(levenshtein(implode($entry_A), implode($entry_B)) < self::THRESHOLD) {
                    $is_dupe = true;
                    array_push($dupes, $entry_A, $entry_B);
                }
        }
        if(!$is_dupe) {
                array_push($non_dupes, $entry_A);
            }
        }
    
     return [$non_dupes, $dupes]; 
     //return value is a two-dimensional array where the first is an array with only non-duplicate entries, and the second is duplicates only
    }

    public function parseAddressesAction(): JsonResponse
    {

        //PSEUDO CODE

        //create a hash where the key is the first letter of the first name and the value is the array of names that start with a
        //run through the keys of the hash and run n^2 for every element within the subset of that letter, pushing duplicates to an array
        
        $entries = array();
        $non_duplicate_entries = array();
        $duplicate_entries = array();

        $first = true;
        $path = base_path('test-files/practice.csv');
        if (($handle = fopen($path, "r")) !== FALSE) { 
        while (($data = fgetcsv($handle, 1000, ",")) !== FALSE) { //parses csv file row by row
            array_shift($data);
            
            if($first) {
                $first = false; //skip the first line of the csv
                continue;
            }
            
            //creates hash table where keys are first letter of first name and values are all entries that meet that requirement
            if (!array_key_exists($data[0][0], $entries)) {  
                $entries[$data[0][0]] = array();
            } 
            array_push($entries[$data[0][0]], $data); 

        }

        $num_keys = count(array_keys($entries));
        for ($i=0; $i < $num_keys; $i++) {  
            
            $current_key = array_keys($entries)[$i];
            $current_array = $entries[$current_key];
            
            $result = $this->parse_dupes($current_array);
            $non_duplicates = $result[0];
            $duplicates = $result[1];

            $non_duplicate_entries = array_merge($non_duplicate_entries, $non_duplicates);
            $duplicate_entries = array_merge($duplicate_entries, $duplicates);


        }

        fclose($handle);
    } else {
        Log::info("File failed to open", ['file' => $path->file]);
    }
    
    return new JsonResponse(["duplicates" => $duplicate_entries, "non-duplicates" => $non_duplicate_entries], 200);
        
    }

}
