<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Traits\MediaUploadingTrait;
use App\Http\Requests\MassDestroyStylistRequest;
use App\Http\Requests\StoreStylistRequest;
use App\Http\Requests\UpdateStylistRequest;
use App\Models\Barbershop;
use App\Models\Stylist;
use Gate;
use Illuminate\Http\Request;
use Spatie\MediaLibrary\MediaCollections\Models\Media;
use Symfony\Component\HttpFoundation\Response;

class StylistController extends Controller
{
    use MediaUploadingTrait;

    public function index()
    {
        abort_if(Gate::denies('stylist_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $stylists = Stylist::with(['barbershop', 'media'])->get();

        return view('admin.stylists.index', compact('stylists'));
    }

    public function create()
    {
        abort_if(Gate::denies('stylist_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $barbershops = Barbershop::pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        return view('admin.stylists.create', compact('barbershops'));
    }

    public function store(StoreStylistRequest $request)
    {
        $stylist = Stylist::create($request->all());

        if ($request->input('thumb', false)) {
            $stylist->addMedia(storage_path('tmp/uploads/' . basename($request->input('thumb'))))->toMediaCollection('thumb');
        }

        if ($media = $request->input('ck-media', false)) {
            Media::whereIn('id', $media)->update(['model_id' => $stylist->id]);
        }

        return redirect()->route('admin.stylists.index');
    }

    public function edit(Stylist $stylist)
    {
        abort_if(Gate::denies('stylist_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $barbershops = Barbershop::pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $stylist->load('barbershop');

        return view('admin.stylists.edit', compact('barbershops', 'stylist'));
    }

    public function update(UpdateStylistRequest $request, Stylist $stylist)
    {
        $stylist->update($request->all());

        if ($request->input('thumb', false)) {
            if (!$stylist->thumb || $request->input('thumb') !== $stylist->thumb->file_name) {
                if ($stylist->thumb) {
                    $stylist->thumb->delete();
                }
                $stylist->addMedia(storage_path('tmp/uploads/' . basename($request->input('thumb'))))->toMediaCollection('thumb');
            }
        } elseif ($stylist->thumb) {
            $stylist->thumb->delete();
        }

        return redirect()->route('admin.stylists.index');
    }

    public function show(Stylist $stylist)
    {
        abort_if(Gate::denies('stylist_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $stylist->load('barbershop');

        return view('admin.stylists.show', compact('stylist'));
    }

    public function destroy(Stylist $stylist)
    {
        abort_if(Gate::denies('stylist_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $stylist->delete();

        return back();
    }

    public function massDestroy(MassDestroyStylistRequest $request)
    {
        Stylist::whereIn('id', request('ids'))->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }

    public function storeCKEditorImages(Request $request)
    {
        abort_if(Gate::denies('stylist_create') && Gate::denies('stylist_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $model         = new Stylist();
        $model->id     = $request->input('crud_id', 0);
        $model->exists = true;
        $media         = $model->addMediaFromRequest('upload')->toMediaCollection('ck-media');

        return response()->json(['id' => $media->id, 'url' => $media->getUrl()], Response::HTTP_CREATED);
    }
}