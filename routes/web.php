<?php

use Carbon\Carbon;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::group(['prefix' => LaravelLocalization::setLocale()], function()
{
    Route::get('/', function () {
        return view('upload');
    });

    Route::post('/upload', function() {

        request()->validate([
            'document' => 'required|mimetypes:application/pdf,max:10000'
        ]);

        if (request()->hasFile('document')) {
            if (request()->file('document')->isValid()) {
                $file = request()->file('document');
                $path = request()->document->store('uploads');
                
                $files = Storage::disk('uploads')->files();

                return response()->json([
                    'id' => count($files),
                    'originalName' => $file->getClientOriginalName(),
                    'fileName' => $file->getClientOriginalName(),
                    'url' => '/files/' . $file->getClientOriginalName()
                ]);
            }
            
            return response()->json([
                'error' => 'There was some other error'
            ]);
        }
        return response()->json([
            'error' => 'No file was uploaded'
        ]);
    });

    Route::get('/files', function () {
        $files = collect(Storage::disk('uploads')->files());
        
        $data = $files->map(function ($file, $key) {
            return [
                'name' => $file,
                'url' => '/files/' . $file,
                'date' => Carbon::createFromTimestamp(Storage::disk('uploads')->lastModified($file))->toDateTimeString()
            ];
        });

        $sorted = $data->sortBy('date')->values();

        return view('files', ['files' => $sorted]);
    });

    Route::get('/files/{file}', function($file) {
        if (Storage::disk('uploads')->exists($file)) {
            return Storage::disk('uploads')->download($file);
        }

        return response()->json([
            'error' => 'File missing'
        ]);
    });

    Route::delete('/files/{file}', function($file) {
        if (Storage::disk('uploads')->exists($file)) {
            Storage::disk('uploads')->delete($file);

            return response()->json([
                'success'
            ]);
        }
    });
});