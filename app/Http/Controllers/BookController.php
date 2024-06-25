<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;
use App\Models\Book;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;


class BookController extends Controller
{
    public readonly Book $book;

    public function __construct(){
       $this->book = new Book;
    }
    

    public function index()
    {
        
        $books = DB::table("books")->where('id_user' , Auth::id())->simplePaginate(5);

        return view("meus_livros", ["books"=> $books] , ['user' => Auth::user()]);;
    }
 

    public function create()
    {
        return view('book_create');
    }


    public function store(Request $request)
    {
        $validator = Validator::make($request->except('_token'),[
            'titulo'=>['required'] ,
            'sub_titulo'=>['required'] ,
            'autor'=>['required'] ,
            'editora'=>['required'] ,
            'edição'=>['required'] ,
            'date_publish'=>['required'] 
            
        ]);

        if($validator->fails()){
            return view('book_create')->with('errors',$validator->errors());
        }
        else{

            $created = $this->book->create([
                'titulo'=> $request->input('titulo'),
                'sub_titulo'=> $request->input('sub_titulo'),
                'autor'=> $request->input('autor'),
                'edição'=> $request->input('edição'),
                'editora' => $request->input('editora'),
                'imagem' => $request->input('imagem'),
                'date_publish' => $request->input('date_publish'),
                'id_user'=> $request->input('id_user')
                ]
             );

            
             if($created){
                $books = DB::table("books")->where('id_user' , Auth::id())->simplePaginate(5);
                return view("meus_livros", ["books"=> $books] , ['user' => Auth::user()])->with('message',  'Livro cadastrado');
               
            }

        }
    }


    public function show(Book $book)
    {
       return view('book_details',['book'=> $book]);
    }


    public function edit(Book $book)
    {
        return view("book_atualize",["book"=> $book]);
    }


    public function update(Request $request, string $id)
    {
        $update = $this->book->where('id' , $id)->update($request->except(['_token','_method']));

        if ($update) {

            return redirect()->route('books.index')->with('message','Atualizado com sucesso');
        }

        return redirect()->back()->with('message','Erro na atualzação');

        
    }


    public function destroy(string $id)
    {
        $this->book->where('id', $id)->delete();

        return redirect()->route('books.index')->with('message','Livro deletado');
    }
}
