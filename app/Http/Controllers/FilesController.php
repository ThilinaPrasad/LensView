<?php

namespace Laravel\Http\Controllers;

use Illuminate\Http\Request;

class FilesController extends Controller
{

    //Method related to compress the image
    public static function compressImg($localPath,$fileName){
        $filepath = public_path($localPath.$fileName);
        try {
        
            \Tinify\setKey("_QoFixJ_0B400BqpeIGA5KvystXOwL68");
        
            $source = \Tinify\fromFile($filepath);
        
            $source->toFile($filepath);
        
        } catch(\Tinify\AccountException $e) {
        
            // Verify your API key and account limit.
        
            return redirect('/posts/create')->with('error', $e->getMessage());
        
        } catch(\Tinify\ClientException $e) {
        
            // Check your source image and request options.
        
            return redirect('/posts/create')->with('error', $e->getMessage());
        
        } catch(\Tinify\ServerException $e) {
            // Temporary issue with the Tinify API.
        
            return redirect('/posts/create')->with('error', $e->getMessage());
        
        } catch(\Tinify\ConnectionException $e) {
            // A network connection error occurred.
        
            return redirect('/posts/create')->with('error', $e->getMessage());
        
        } catch(Exception $e) {
        
            // Something else went wrong, unrelated to the Tinify API.
        
            return redirect('/posts/create')->with('error', $e->getMessage());
        
        }
        
    }

//File Uploading Function    
    public static function upload($request,$name,$folderName,$defaultName){
        //file handelling
        if($request->hasFile($name)){
            // Get File name with the extention
            

            $filenameWithExt = $request->file($name)->getClientOriginalName();
            //get file name
            $filename = pathinfo($filenameWithExt,PATHINFO_FILENAME);

            //get extension
            $extension = $request->file($name)->getClientOriginalExtension();
            $fileNametoStore = sha1($filename).'_'.time().'.'.$extension; 
            $path = $request->file($name)->storeAs('public/'.$folderName,$fileNametoStore);

            //TinyPNG Compress Image
            //FilesController::compressImg('storage/'.$folderName.'/',$fileNametoStore);

        }else{
            $fileNametoStore = $defaultName;
        }
        return $fileNametoStore;
    }

}
