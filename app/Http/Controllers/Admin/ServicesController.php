<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Traits\MediaUploadingTrait;
use App\Http\Requests\MassDestroyServiceRequest;
use App\Http\Requests\StoreServiceRequest;
use App\Http\Requests\UpdateServiceRequest;
use App\Models\Service;
use Gate;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Spatie\MediaLibrary\MediaCollections\Models\Media;
use Symfony\Component\HttpFoundation\Response;

class ServicesController extends Controller
{
    use MediaUploadingTrait;

    public function index()
    {

        $services = Service::with(['media'])->get();

        return view('admin.services.index', compact('services'));
    }

    public function create()
    {

        return view('admin.services.create');
    }

    public function store(StoreServiceRequest $request)
    {
        $slug = Str::slug($request->name, '-'); 

        $request->request->add(['slug' => $slug]);
        $service = Service::create($request->all());

        if ($request->input('thumb', false)) {
            $service->addMedia(storage_path('tmp/uploads/' . basename($request->input('thumb'))))->toMediaCollection('thumb');
        }
        if ($request->input('price_img', false)) {
            $service->addMedia(storage_path('tmp/uploads/' . basename($request->input('price_img'))))->toMediaCollection('price_img');
        }

        if ($request->input('cover_img', false)) {
            $service->addMedia(storage_path('tmp/uploads/' . basename($request->input('cover_img'))))->toMediaCollection('cover_img');
        }

        if ($media = $request->input('ck-media', false)) {
            Media::whereIn('id', $media)->update(['model_id' => $service->id]);
        }

        return redirect()->route('admin.services.index');
    }

    public function edit(Service $service)
    {

        return view('admin.services.edit', compact('service'));
    }

    public function update(UpdateServiceRequest $request, Service $service)
    {
        $slug = Str::slug($request->name, '-'); 

        $request->request->add(['slug' => $slug]);
        
        $service->update($request->all());

        if ($request->input('thumb', false)) {
            if (!$service->thumb || $request->input('thumb') !== $service->thumb->file_name) {
                if ($service->thumb) {
                    $service->thumb->delete();
                }
                $service->addMedia(storage_path('tmp/uploads/' . basename($request->input('thumb'))))->toMediaCollection('thumb');
            }
        } elseif ($service->thumb) {
            $service->thumb->delete();
        }
        if ($request->input('price_img', false)) {
            if (!$service->price_img || $request->input('price_img') !== $service->price_img->file_name) {
                if ($service->price_img) {
                    $service->price_img->delete();
                }
                $service->addMedia(storage_path('tmp/uploads/' . basename($request->input('price_img'))))->toMediaCollection('price_img');
            }
        } elseif ($service->price_img) {
            $service->price_img->delete();
        }

        if ($request->input('cover_img', false)) {
            if (!$service->cover_img || $request->input('cover_img') !== $service->cover_img->file_name) {
                if ($service->cover_img) {
                    $service->cover_img->delete();
                }
                $service->addMedia(storage_path('tmp/uploads/' . basename($request->input('cover_img'))))->toMediaCollection('cover_img');
            }
        } elseif ($service->cover_img) {
            $service->cover_img->delete();
        }

        return redirect()->route('admin.services.index');
    }

    public function show(Service $service)
    {

        return view('admin.services.show', compact('service'));
    }

    public function destroy(Service $service)
    {

        $service->delete();

        return back();
    }

    public function storeCKEditorImages(Request $request)
    {

        $model         = new Service();
        $model->id     = $request->input('crud_id', 0);
        $model->exists = true;
        $media         = $model->addMediaFromRequest('upload')->toMediaCollection('ck-media');

        return response()->json(['id' => $media->id, 'url' => $media->getUrl()], Response::HTTP_CREATED);
    }
}