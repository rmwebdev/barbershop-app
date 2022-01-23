<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Traits\MediaUploadingTrait;
use App\Http\Requests\MassDestroyBarbershopRequest;
use App\Http\Requests\StoreBarbershopRequest;
use App\Http\Requests\UpdateBarbershopRequest;
use App\Models\Barbershop;
use App\Models\Service;
use Gate;
use Illuminate\Http\Request;
use Spatie\MediaLibrary\MediaCollections\Models\Media;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Str;

class BarbershopController extends Controller
{
    use MediaUploadingTrait;

    public function index()
    { 

        $barbershops = Barbershop::with(['services', 'media'])->get();

        return view('admin.barbershops.index', compact('barbershops'));
    }

    public function create()
    { 

        $services = Service::pluck('name', 'id');

        return view('admin.barbershops.create', compact('services'));
    }

    public function store(StoreBarbershopRequest $request)
    {
        $slug = Str::slug($request->name, '-'); 

        $request->request->add(['slug' => $slug]);
        $barbershop = Barbershop::create($request->all());
        $barbershop->services()->sync($request->input('services', []));
        
        if ($request->input('photo', false)) {
            $barbershop->addMedia(storage_path('tmp/uploads/' . basename($request->input('photo'))))->toMediaCollection('photo');
        }
        if ($request->input('cover_img', false)) {
            $barbershop->addMedia(storage_path('tmp/uploads/' . basename($request->input('cover_img'))))->toMediaCollection('cover_img');
        }

        if ($media = $request->input('ck-media', false)) {
            Media::whereIn('id', $media)->update(['model_id' => $barbershop->id]);
        }

        return redirect()->route('admin.barbershops.index');
    }

    public function edit(Barbershop $barbershop)
    { 

        $services = Service::pluck('name', 'id');

        $barbershop->load('services');

        return view('admin.barbershops.edit', compact('barbershop', 'services'));
    }

    public function update(UpdateBarbershopRequest $request, Barbershop $barbershop)
    { 
        $slug = Str::slug($request->name, '-'); 

        $request->request->add(['slug' => $slug]);
        $barbershop->update($request->all());
        $barbershop->services()->sync($request->input('services', []));
        if ($request->input('photo', false)) {
            if (!$barbershop->photo || $request->input('photo') !== $barbershop->photo->file_name) {
                if ($barbershop->photo) {
                    $barbershop->photo->delete();
                }
                $barbershop->addMedia(storage_path('tmp/uploads/' . basename($request->input('photo'))))->toMediaCollection('photo');
            }
        } elseif ($barbershop->photo) {
            $barbershop->photo->delete();
        }
        if ($request->input('cover_img', false)) {
            if (!$barbershop->cover_img || $request->input('cover_img') !== $barbershop->cover_img->file_name) {
                if ($barbershop->cover_img) {
                    $barbershop->cover_img->delete();
                }
                $barbershop->addMedia(storage_path('tmp/uploads/' . basename($request->input('cover_img'))))->toMediaCollection('cover_img');
            }
        } elseif ($barbershop->cover_img) {
            $barbershop->cover_img->delete();
        }

        return redirect()->route('admin.barbershops.index');
    }

    public function show(Barbershop $barbershop)
    { 

        $barbershop->load('services');

        return view('admin.barbershops.show', compact('barbershop'));
    }

    public function destroy(Barbershop $barbershop)
    { 

        $barbershop->delete();

        return back();
    } 

    public function storeCKEditorImages(Request $request)
    {

        $model         = new Barbershop();
        $model->id     = $request->input('crud_id', 0);
        $model->exists = true;
        $media         = $model->addMediaFromRequest('upload')->toMediaCollection('ck-media');

        return response()->json(['id' => $media->id, 'url' => $media->getUrl()], Response::HTTP_CREATED);
    }
}