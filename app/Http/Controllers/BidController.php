<?php

namespace App\Http\Controllers;

use DB, Mail, Cart, SimpleXLS;
use Illuminate\Http\Request;
use App\Http\Services\{ OrderService };
use Illuminate\Support\Facades\Validator;
use App\Mail\SendEmail;
use Illuminate\Support\Facades\Storage;

class BidController extends Controller
{
      public function send (Request $request){
    	$messages = array(
            'name.required' => 'Введите Ваше имя',
            'phone.required' => 'Введите телефон',
            'file.mimes' => 'Формат должен быть png, jpg, png, gif',
            'file.max' => 'Максимальный размер 10000 кб',
            'file.required' => 'Загрузите фотографию',
        );


        $validator = Validator::make($request->all(), [
        'name' => 'required',
        'phone' => 'required',
        'file' => 'mimes:jpeg,jpg,png,gif|required|max:10000'// max 10000kb
        ],$messages);

        if ($validator->fails()) {
            return redirect()->back()
                    ->withErrors($validator)
                    ->withInput();
        }
        if ($request->has('file')) {
			$path = $request->file('file')->store('files');
			$path = 'app/'.$path;
		}
        $data = array(
        	'name' => $request->name,
        	'phone' => $request->phone,
        	'file' => $path,
        );

   		Mail::to('info@riomebel.kz')->send(new SendEmail($data));


   		// if(Storage::exists(storage_path($path))){
     //        Storage::delete($path);

     //    }else{
     //        dd('File does not exists.');
     //    }

   		Storage::delete(storage_path($path));

		return redirect('/')->with('message', 'Спасибо за заказ. Мы с Вами скоро свяжемся');
    }

}
