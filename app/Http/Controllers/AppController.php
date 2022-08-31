<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Service;
use App\Models\Category;

class AppController extends Controller
{
     
    /**
     * Get a data app configuration.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function configuration(Request $request)
    {
         return response()->json([
            'icon' => 'https://res.cloudinary.com/deueufyac/image/upload/v1657912035/e-commerce/icon-invitro_xnxxjq.png',
            'name' => 'Invitro Colombia',
            'social' => [
               
            ]
        ],201);
    }
    
    public function seeder(Request $request)
    {
		 $category = Category::find(1);
         if(!$category) {
            $category = new Category();
         }
         $category->name = 'Catálogo de Semen';
         $category->detail = '';
         $category->save();
		 
		 $category = Category::find(2);
         if(!$category) {
            $category = new Category();
         }
         $category->name = 'Catálogo de Donadoras';
		 $category->detail = '';
         $category->save();
		 
		 /////////////////////////////////////////////////
         $product = Product::find(1);
         if(!$product) {
            $product = new Product();
         }
         $product->name = 'Toro1';
         $product->price = '1092';
         $product->image_url = 'https://nutrimaxcr.com/wp-content/uploads/2018/10/3-1000x663.jpg';
         $product->slide_images_url = '["https://nutrimaxcr.com/wp-content/uploads/2018/10/3-1000x663.jpg",{"thumb":"https://res.cloudinary.com/deueufyac/image/upload/v1660526819/e-commerce/productos/foto_g1wxej.png","zoom":"https://res.cloudinary.com/deueufyac/image/upload/v1661914259/e-commerce/productos/zoom_t2dz7m.png"},"https://nutrimaxcr.com/wp-content/uploads/2018/10/3-1000x663.jpg"]';
         $product->category_id = '1';
         $product->attributes = 'Filtro raza 1|filtro 1|otro filtro';
         $product->detail = '{"attr1": "HOUSAM0000 9123","attr2": "DOB 12/08/2010","labels":[{"name":"Raza","value":"Gyrolando"},{"name":"Código genético", "value":"xxxxxx"},{"name":"Dispoinibilidad","value":"Disponible"}]}';
         $product->save();
         
         //////////////////////////////////////////////////////////////////
         $product = Product::find(2);
         if(!$product) {
            $product = new Product();
         }
         $product->name = 'Toro2';
         $product->price = '3192';
         $product->image_url = 'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcR_lk9vuTS7DBnoqLJIr8n3lR30WgTwUKa6_YEeA0hnyEo4l9zmtTZbBptqfl42My-Xaeg&usqp=CAU';
         $product->slide_images_url = '["https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcR_lk9vuTS7DBnoqLJIr8n3lR30WgTwUKa6_YEeA0hnyEo4l9zmtTZbBptqfl42My-Xaeg&usqp=CAU",{"thumb":"https://res.cloudinary.com/deueufyac/image/upload/v1660526819/e-commerce/productos/foto_g1wxej.png","zoom":"https://res.cloudinary.com/deueufyac/image/upload/v1661914259/e-commerce/productos/zoom_t2dz7m.png"},"https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcR_lk9vuTS7DBnoqLJIr8n3lR30WgTwUKa6_YEeA0hnyEo4l9zmtTZbBptqfl42My-Xaeg&usqp=CAU","https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcR_lk9vuTS7DBnoqLJIr8n3lR30WgTwUKa6_YEeA0hnyEo4l9zmtTZbBptqfl42My-Xaeg&usqp=CAU"]';
         $product->category_id = '2';
         $product->attributes = 'Filtro raza 2|filtro 1|otro filtro';
         $product->detail = '{"attr1": "AESDO0000 3313","attr2": "DM 13/12/2022","labels":[{"name":"Raza","value":"Gyrolando"},{"name":"Código genético", "value":"xxxxxx"},{"name":"Dispoinibilidad","value":"Disponible"}]}';
         $product->save();
         //////////////////////////////////////////////////////////////////		 
         $product = Product::find(3);
         if(!$product) {
            $product = new Product();
         }
         $product->name = 'Toro3';
         $product->price = '1092';
         $product->image_url = 'https://nutrimaxcr.com/wp-content/uploads/2015/06/SIMMENTAL-BLAZE.jpg';
         $product->slide_images_url = '["https://nutrimaxcr.com/wp-content/uploads/2015/06/SIMMENTAL-BLAZE.jpg",{"thumb":"https://res.cloudinary.com/deueufyac/image/upload/v1660526819/e-commerce/productos/foto_g1wxej.png","zoom":"https://res.cloudinary.com/deueufyac/image/upload/v1661914259/e-commerce/productos/zoom_t2dz7m.png"},"https://nutrimaxcr.com/wp-content/uploads/2015/06/SIMMENTAL-BLAZE.jpg","https://nutrimaxcr.com/wp-content/uploads/2015/06/SIMMENTAL-BLAZE.jpg"]';
         $product->category_id = '1';
         $product->attributes = 'Filtro raza 3|filtro 2|otro filtro';
         $product->detail = '{"attr1": "HOUSAM0000 9123","attr2": "DOB 12/08/2010","labels":[{"name":"Raza","value":"Gyrolando"},{"name":"Código genético", "value":"xxxxxx"},{"name":"Dispoinibilidad","value":"Disponible"}]}';
         $product->save();
		 
         //////////////////////////////////////////////////////////////////		 
         $product = Product::find(4);
         if(!$product) {
            $product = new Product();
         }
         $product->name = 'Toro4';
         $product->price = '89299';
         $product->image_url = 'https://agrocolanta.com/wp-content/uploads/2021/07/genetica-inseminacion-1024x683.jpg';
         $product->slide_images_url = '["https://agrocolanta.com/wp-content/uploads/2021/07/genetica-inseminacion-1024x683.jpg",{"thumb":"https://res.cloudinary.com/deueufyac/image/upload/v1660526819/e-commerce/productos/foto_g1wxej.png","zoom":"https://res.cloudinary.com/deueufyac/image/upload/v1661914259/e-commerce/productos/zoom_t2dz7m.png"},"https://agrocolanta.com/wp-content/uploads/2021/07/genetica-inseminacion-1024x683.jpg","https://agrocolanta.com/wp-content/uploads/2021/07/genetica-inseminacion-1024x683.jpg"]';
         $product->category_id = '2';
         $product->attributes = 'Filtro raza 4|filtro 2|otro filtro';
         $product->detail = '{"attr1": "HOUSAM0000 9123","attr2": "DOB 12/08/2010","labels":[{"name":"Raza","value":"Gyrolando"},{"name":"Código genético", "value":"xxxxxx"},{"name":"Dispoinibilidad","value":"Disponible"}]}';
         $product->save();
         //////////////////////////////////////////////////////////////////		 
		 
         //////////////////////////////////////////////////////////////////		 
         $product = Product::find(5);
         if(!$product) {
            $product = new Product();
         }
         $product->name = 'Toro5';
         $product->price = '23299';
         $product->image_url = 'https://www.agrosavia.co/media/6220/venta-receptoras-2020_2_agrosavia.jpg';
         $product->slide_images_url = '["https://www.agrosavia.co/media/6220/venta-receptoras-2020_2_agrosavia.jpg",{"thumb":"https://res.cloudinary.com/deueufyac/image/upload/v1660526819/e-commerce/productos/foto_g1wxej.png","zoom":"https://res.cloudinary.com/deueufyac/image/upload/v1661914259/e-commerce/productos/zoom_t2dz7m.png"},"https://agrocolanta.com/wp-content/uploads/2021/07/genetica-inseminacion-1024x683.jpg","https://www.agrosavia.co/media/6220/venta-receptoras-2020_2_agrosavia.jpg"]';
         $product->category_id = '1';
         $product->attributes = 'Filtro raza 5|filtro 3|otro filtro';
         $product->detail = '{"attr1": "HOUSAM0000 9123","attr2": "DOB 12/08/2010","labels":[{"name":"Raza","value":"Gyrolando"},{"name":"Código genético", "value":"xxxxxx"},{"name":"Dispoinibilidad","value":"Disponible"}]}';
         $product->save();
		 
         //////////////////////////////////////////////////////////////////		 
         $product = Product::find(6);
         if(!$product) {
            $product = new Product();
         }
         $product->name = 'Toro6';
         $product->price = '133332';
         $product->image_url = 'https://storage.contextoganadero.com/s3fs-public/ganaderia/field_image/2020-06/clones_bovinos.jpg';
         $product->slide_images_url = '["https://storage.contextoganadero.com/s3fs-public/ganaderia/field_image/2020-06/clones_bovinos.jpg",{"thumb":"https://res.cloudinary.com/deueufyac/image/upload/v1660526819/e-commerce/productos/foto_g1wxej.png","zoom":"https://res.cloudinary.com/deueufyac/image/upload/v1661914259/e-commerce/productos/zoom_t2dz7m.png"},"https://storage.contextoganadero.com/s3fs-public/ganaderia/field_image/2020-06/clones_bovinos.jpg","https://www.agrosavia.co/media/6220/venta-receptoras-2020_2_agrosavia.jpg"]';
         $product->category_id = '2';
         $product->attributes = 'Filtro raza 6|filtro 3|otro filtro';
         $product->detail = '{"attr1": "HOUSAM0000 9123","attr2": "DOB 12/08/2010","labels":[{"name":"Raza","value":"Gyrolando"},{"name":"Código genético", "value":"xxxxxx"},{"name":"Dispoinibilidad","value":"Disponible"}]}';
         $product->save();
		 
         //////////////////////////////////////////////////////////////////		 
         $product = Product::find(7);
         if(!$product) {
            $product = new Product();
         }
         $product->name = 'Toro7';
         $product->price = '3394';
         $product->image_url = 'https://storage.contextoganadero.com/s3fs-public/styles/noticias_one/public/ganaderia/field_image/2021-03/mejoramiento-genetico-bovino.jpg?itok=ijfZypLM';
         $product->slide_images_url = '["https://storage.contextoganadero.com/s3fs-public/styles/noticias_one/public/ganaderia/field_image/2021-03/mejoramiento-genetico-bovino.jpg?itok=ijfZypLM",{"thumb":"https://res.cloudinary.com/deueufyac/image/upload/v1660526819/e-commerce/productos/foto_g1wxej.png","zoom":"https://res.cloudinary.com/deueufyac/image/upload/v1661914259/e-commerce/productos/zoom_t2dz7m.png"},"https://storage.contextoganadero.com/s3fs-public/styles/noticias_one/public/ganaderia/field_image/2021-03/mejoramiento-genetico-bovino.jpg?itok=ijfZypLM"]';
         $product->category_id = '1';
         $product->attributes = 'Filtro raza 7|filtro 4|otro filtro';
         $product->detail = '{"attr1": "HOUSAM0000 9123","attr2": "DOB 12/08/2010","labels":[{"name":"Raza","value":"Gyrolando"},{"name":"Código genético", "value":"xxxxxx"},{"name":"Dispoinibilidad","value":"Disponible"}]}';
         $product->save();
         //////////////////////////////////////////////////////////////////
		 //////////////////////////////////////////////////////////////////		 
         //////////////////////////////////////////////////////////////////		 
         //////////////////////////////////////////////////////////////////		 
         //////////////////////////////////////////////////////////////////		 
         $service = Service::find(1);
         if(!$service) {
            $service = new Service();
         }
         $service->name = "Evaluación de donadoras y receptoras";		 
         $service->image_url = "https://invitrocolombia.com.co/wp-content/uploads/2021/03/DSC_0047-1024x683.jpg";
         $service->slide_images_url = '["https://agrocolanta.com/wp-content/uploads/2021/07/genetica-inseminacion-1024x683.jpg","https://res.cloudinary.com/deueufyac/image/upload/v1660526819/e-commerce/productos/foto_g1wxej.png","https://agrocolanta.com/wp-content/uploads/2021/07/genetica-inseminacion-1024x683.jpg","https://agrocolanta.com/wp-content/uploads/2021/07/genetica-inseminacion-1024x683.jpg"]';
         $service->price = 100;
		 $service->service_relationship = '';
		 $service->product_relationship = '';
         $service->save();
         //////////////////////////////////////////////////////////////////		 
         $service = Service::find(2);
         if(!$service) {
            $service = new Service();
         }
         $service->name = "Sincronización de receptoras";
         $service->image_url = "https://invitrocolombia.com.co/wp-content/uploads/2021/03/DSC_0227-1024x683.jpg";
         $service->slide_images_url = '["https://agrocolanta.com/wp-content/uploads/2021/07/genetica-inseminacion-1024x683.jpg","https://res.cloudinary.com/deueufyac/image/upload/v1660526819/e-commerce/productos/foto_g1wxej.png","https://agrocolanta.com/wp-content/uploads/2021/07/genetica-inseminacion-1024x683.jpg","https://agrocolanta.com/wp-content/uploads/2021/07/genetica-inseminacion-1024x683.jpg"]';
         $service->price = 20;
		 $service->service_relationship = '';
		 $service->product_relationship = '';
         $service->save();
         //////////////////////////////////////////////////////////////////		 
         $service = Service::find(3);
         if(!$service) {
            $service = new Service();
         }
         $service->name = "Aspiración folicular";
         $service->image_url = "https://invitrocolombia.com.co/wp-content/uploads/2021/03/aspira1-2-1024x683.jpg";
         $service->slide_images_url = '["https://agrocolanta.com/wp-content/uploads/2021/07/genetica-inseminacion-1024x683.jpg","https://res.cloudinary.com/deueufyac/image/upload/v1660526819/e-commerce/productos/foto_g1wxej.png","https://agrocolanta.com/wp-content/uploads/2021/07/genetica-inseminacion-1024x683.jpg","https://agrocolanta.com/wp-content/uploads/2021/07/genetica-inseminacion-1024x683.jpg"]';
         $service->price = 10;
		 $service->service_relationship = '';
		 $service->product_relationship = '';
         $service->save();
         //////////////////////////////////////////////////////////////////		 
         $service = Service::find(4);
         if(!$service) {
            $service = new Service();
         }
         $service->name = "Fertilización In vitro (FIV)";
         $service->image_url = "https://invitrocolombia.com.co/wp-content/uploads/2021/03/101-1-1024x683.jpg";
         $service->slide_images_url = '["https://agrocolanta.com/wp-content/uploads/2021/07/genetica-inseminacion-1024x683.jpg","https://res.cloudinary.com/deueufyac/image/upload/v1660526819/e-commerce/productos/foto_g1wxej.png","https://agrocolanta.com/wp-content/uploads/2021/07/genetica-inseminacion-1024x683.jpg","https://agrocolanta.com/wp-content/uploads/2021/07/genetica-inseminacion-1024x683.jpg"]';
         $service->price = 30;
		 $service->service_relationship = '';
		 $service->product_relationship = '';
         $service->save();
         //////////////////////////////////////////////////////////////////		 
         $service = Service::find(5);
         if(!$service) {
            $service = new Service();
         }
         $service->name = "Transferencia de embriones";
         $service->image_url = "https://invitrocolombia.com.co/wp-content/uploads/2021/03/fotoslab5-1024x615.jpg";
         $service->slide_images_url = '["https://agrocolanta.com/wp-content/uploads/2021/07/genetica-inseminacion-1024x683.jpg","https://res.cloudinary.com/deueufyac/image/upload/v1660526819/e-commerce/productos/foto_g1wxej.png","https://agrocolanta.com/wp-content/uploads/2021/07/genetica-inseminacion-1024x683.jpg","https://agrocolanta.com/wp-content/uploads/2021/07/genetica-inseminacion-1024x683.jpg"]';
         $service->price = 50;
		 $service->service_relationship = '';
		 $service->product_relationship = '';
         $service->save();
         //////////////////////////////////////////////////////////////////		 
         $service = Service::find(6);
         if(!$service) {
            $service = new Service();
         }
         $service->name = "Diagnóstico de gestación y entrega de preñeces";
         $service->image_url = "https://invitrocolombia.com.co/wp-content/uploads/2021/03/FullSizeRender16-768x554.jpg";
         $service->slide_images_url = '["https://agrocolanta.com/wp-content/uploads/2021/07/genetica-inseminacion-1024x683.jpg","https://res.cloudinary.com/deueufyac/image/upload/v1660526819/e-commerce/productos/foto_g1wxej.png","https://agrocolanta.com/wp-content/uploads/2021/07/genetica-inseminacion-1024x683.jpg","https://agrocolanta.com/wp-content/uploads/2021/07/genetica-inseminacion-1024x683.jpg"]';
         $service->price = 34;
		 $service->service_relationship = '';
		 $service->product_relationship = '';
         $service->save();
		 
		 
         return response()->json(['message' => 'sucess'],201);
    }
}
