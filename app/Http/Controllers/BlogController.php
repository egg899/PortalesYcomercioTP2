<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Blog;

class BlogController extends Controller
{
    public function index()
    {
        $blogs = Blog::orderBy('fecha', 'desc')->get();
        //dd($blogs);
        return view('blogs.index', ['blogs'=> $blogs]);
    }

    public function view($id)
    {
        $blog = Blog::findOrFail($id);
        return view('blogs.view', ['blog' => $blog]);
    }

    public function edit($id)
    {
        $blog = Blog::findOrFail($id);
        return view('blogs.edit', ['blog' => $blog]);

    }



    public function update(Request $request, $id)
    {
        $blog = Blog::findOrFail($id);

        $data = $request->validate([
            'titulo' => 'required|string|max:255',
            'contenido' => 'required|string',
            'imagen' => 'nullable|image|max:2048',
    ]);

        // Verificamos si se subió la imagen
        if($request->hasFile('imagen')) {
            //Eliminar la imagen anterior si existe
            if($blog->imagen && \Storage::disk('public')->exists($blog->imagen)) {
                \Storage::disk('public')->delete($blog->imagen);
            }

            //Guardar la imagen nueva
            $data['imagen'] = $request->file('imagen')->store('images', 'public');
        }






    $blog->update($data);

    return redirect()->route('blogs.view', $blog->id)->with('feedback.message', 'La entrada <b>'.e($blog['titulo']).'</b> actualizada');
    }



    public function destroy($id)
    {
        $blog = Blog::findOrFail($id);


          // Si existe una imagen asociada, eliminarla del almacenamiento
    if ($blog->imagen && \Storage::disk('public')->exists($blog->imagen)) {
        \Storage::disk('public')->delete($blog->imagen);
    }


        $blog->delete();

        return redirect('/blogs')->with(['feedback.message' => 'La entrada <b>'.e($blog['titulo']).'</b> eliminada', 'feedback.type'=>'danger']);
    }


    public function create()
    {
        return view('blogs.create');
    }


   public function store(Request $request)
{
    $request->validate([
        'titulo' => 'required|string|max:255',
        'resumen' => 'required|string|max:500',
        'contenido' => 'required|string',
        'autor' => 'required|string|max:100',
        'categoria' => 'required|string|max:100',
        'imagen' => 'nullable|image|max:2048',
    ]);
    $input = $request->only(['titulo', 'resumen', 'contenido', 'autor', 'categoria']);

    $rutaImagen = null;
    if ($request->hasFile('imagen')) {
        $rutaImagen = $request->file('imagen')->store('images', 'public');
    }

    // Blog::create([
    //     'titulo' => $request->titulo,
    //     'resumen' => $request->resumen,
    //     'contenido' => $request->contenido,
    //     'autor' => $request->autor,
    //     'categoria' => $request->categoria,
    //     'imagen' => $rutaImagen,
    // ]);

        // $blog = new Blog();
        // $blog->titulo = $request->titulo;
        // $blog->resumen = $request->resumen;
        // $blog->contenido = $request->contenido;
        // $blog->autor = $request->autor;
        // $blog->categoria = $request->categoria;
        // $blog->imagen = $rutaImagen;
        // $blog->save();

        $input = $request->all();
        $blog=Blog::create($input);


    return redirect()->route('blogs.index')->with('feedback.message', 'La entrada <b>'.e($blog['titulo']).'</b> ha sido creada correctamente.');
}





}



