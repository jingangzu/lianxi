<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class FileController extends Controller
{
    public function fileView()
    {
        return view('file/file_view');
    }
    public function fileUpload(Request $request)
    {
        $file = $request->file('add_file');
        $extName = $file->getClientOriginalExtension();
        $newName = uniqid('') . '.' . $extName;
        $result = $file->move(storage_path('app/'),$newName);

        return $result;
    }

    public function fileDown()
    {
        return view('file/file_down')->with('fileUrl',storage_path('app/5b431738a0449.jpg'));
//        return response()->download(storage_path('app/5b432b65ab6e4.zip'));
        return response()->download(storage_path('app/5b431738a0449.jpg'));
//        $fopen = fopen(storage_path('app/5b432b65ab6e4.zip'),'r');
        $file = fopen ( storage_path('app/5b432b65ab6e4.zip'), "rb" );

        //告诉浏览器这是一个文件流格式的文件
        Header ( "Content-type: application/octet-stream" );
        //请求范围的度量单位
        Header ( "Accept-Ranges: bytes" );
        //Content-Length是指定包含于请求或响应中数据的字节长度
        Header ( "Accept-Length: " . filesize ( storage_path('app/5b432b65ab6e4.zip') ));
        //用来告诉浏览器，文件是可以当做附件被下载，下载后的文件名称为$file_name该变量的值。
        Header ( "Content-Disposition: attachment; filename=abc.zip"  );

        //读取文件内容并直接输出到浏览器
        echo fread ( $file, filesize ( storage_path('app/5b432b65ab6e4.zip')) );
        fclose ( $file );
//        return fread($fopen,filesize(storage_path('app/5b432b65ab6e4.zip')));
        dd();
    }
    public function fileUrl()
    {
        return storage_path('app/5b432b65ab6e4.zip');
    }

}
