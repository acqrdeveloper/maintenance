<?php

namespace maintenance\Http\Controllers;

use Illuminate\Support\Facades\File;
use Intervention\Image\Facades\Image;
use maintenance\Http\Interfaces\ProductInterface;
use maintenance\Http\Requests\ProductRequest;
use maintenance\Product;
use PDOException;

class ProductController extends Controller implements ProductInterface
{
    function index()
    {
        // TODO: Implement index() method.
        $Products = Product::all();
        return view('product.index')->with('Products', $Products);
    }

    function create()
    {
        // TODO: Implement create() method.
        return view('product.create');
    }

    function store(ProductRequest $request)
    {
        // TODO: Implement store() method.
        try {
            $obj = new Product();
            $obj->name = $request['name'];
            $obj->quantity = $request['quantity'];
            $obj->price = $request['price'];
            $obj->description = $request['description'];
            $requestImage = $request['image'];

            //todo >> Creamos una instancia de la libreria instalada
            $image = Image::make($request['image']);

            //todo >> ruta de imagen original y copia
            $pathOrigin = public_path() . '/load_images/origin/';
            $pathCopyOrigin = public_path() . '/load_images/copy/';

            //todo >> Guardar Copia
            $this->saveImage($image, $pathCopyOrigin, $requestImage);
            //todo >> Guardar original
            $imageRename = $this->saveImage($image, $pathOrigin, $requestImage);

            //todo >> campo de imagen seteada para insertar
            $obj->image = $imageRename;

            //todo >> insertando en la base de datos
            $obj->save($request->all());//guardamos el array obtenido en DB

            flash("created successfully", "success");//enviamos una alert verde
            return redirect()->route('rIndexProduct');//redireccionamos a la pagina indice

        } catch (PDOException $pdoex) {
            return redirect()->back()->withErrors(['errors' => $pdoex->getMessage()]);
        }
    }

    function saveImage($image, $path, $requestImage)
    {
        //todo >> Guardar Original
        $dateFormat = date("dmyhis");
        //todo >> Cambiar de tamaño
        $image->resize(240, 200);
        $image->save($path . $dateFormat . '_' . $requestImage->getClientOriginalName());
        $setImage = $dateFormat . '_' . $requestImage->getClientOriginalName();
        return $setImage;
    }

    function deleteImage($path, $lastRequest)
    {
        File::delete($path . $lastRequest);
    }

    function show($id)
    {
        // TODO: Implement show() method.
        try {
            $Product = Product::findOrFail($id);
            return view('product.show')->with('Product', $Product);
        } catch (PDOException $ex) {
            return redirect()->back()->withErrors('msg_errors', $ex->getMessage() . ' - ' . $ex->getLine());
        }
    }

    function edit($id)
    {
        // TODO: Implement edit() method.
        try {
            $Product = Product::findOrFail($id);
            return view('product.edit')->with('Product', $Product);
        } catch (PDOException $ex) {
            return redirect()->back()->withErrors('msg_errors', $ex->getMessage() . ' - ' . $ex->getLine());
        }
    }

    function update($id, ProductRequest $request)
    {
        // TODO: Implement update() method.
        try {
            $obj = Product::findOrFail($id);
            $lastImage = $obj->image;
            $requestImage = $request['image'];

            //todo >> Creamos una instancia de la libreria instalada
            $image = Image::make($request['image']);

            //todo >> ruta de imagen original y copia
            $pathOrigin = public_path() . '/load_images/origin/';
            $pathCopyOrigin = public_path() . '/load_images/copy/';

            //TODO : Validando si tiene imagen
            if ($request->hasFile('image')) {
                //TODO : Eliminamos los archivos imagen obtenido
                $this->deleteImage($pathOrigin, $lastImage);
                $this->deleteImage($pathCopyOrigin, $lastImage);

                //todo : Guardar Copia
                $this->saveImage($image, $pathCopyOrigin, $requestImage);

                //todo : Guardar original
                $imageRename = $this->saveImage($image, $pathOrigin, $requestImage);

                //todo >> campo de imagen seteada para insertar
                $obj->image = $imageRename;
            }

            //todo >> insertando en la base de datos
            $obj->save($request->all());

            flash("Updated successfully", "success");
            return redirect()->route('rIndexProduct');

        } catch (PDOException $ex) {
            return redirect()->back()->withErrors('msg_errors', $ex->getMessage() . ' - ' . $ex->getLine());
        }
    }

    function destroy($id)
    {
        // TODO: Implement destroy() method.
        try {
            $obj = Product::findOrFail($id);

            //TODO : Validando si tiene imagen
            $lastImage = $obj->image;

            //todo >> ruta de imagen original y copia
            $pathOrigin = public_path() . '/load_images/origin/';
            $pathCopyOrigin = public_path() . '/load_images/copy/';

            //TODO : Eliminamos los archivos imagen obtenido
            $this->deleteImage($pathOrigin, $lastImage);
            $this->deleteImage($pathCopyOrigin, $lastImage);

            Product::destroy($id);
            flash("Deleted successfully", "success");
            return redirect()->route('rIndexProduct');
        } catch (PDOException $ex) {
            return redirect()->back()->withErrors('msg_errors', $ex->getMessage() . ' - ' . $ex->getLine());
        }
    }
}