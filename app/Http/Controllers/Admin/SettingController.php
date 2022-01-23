<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Traits\MediaUploadingTrait;
use App\Http\Requests\MassDestroySettingRequest;
use App\Http\Requests\StoreSettingRequest;
use App\Http\Requests\UpdateSettingRequest;
use App\Models\Setting;
use Log;
use Illuminate\Http\Request;
use Spatie\MediaLibrary\MediaCollections\Models\Media;
use Symfony\Component\HttpFoundation\Response;

class SettingController extends Controller
{
    use MediaUploadingTrait;

    public function index()
    {
        $setting = null;
        $data =  Setting::find(1);
        if($data){
            $setting = $data;
        }
        return view('admin.settings.show', compact('setting'));
    }

    public function store(StoreSettingRequest $request)
    {
        $setting = Setting::create($request->all());

        if ($request->input('about_image', false)) {
            $setting->addMedia(storage_path('tmp/uploads/' . basename($request->input('about_image'))))->toMediaCollection('about_image');
        }

        if ($request->input('cover_image', false)) {
            $setting->addMedia(storage_path('tmp/uploads/' . basename($request->input('cover_image'))))->toMediaCollection('cover_image');
        }

        if ($media = $request->input('ck-media', false)) {
            Media::whereIn('id', $media)->update(['model_id' => $setting->id]);
        }

        return redirect()->route('admin.settings.index');
    }

    public function edit(Setting $setting)
    {

        return view('admin.settings.edit', compact('setting'));
    }

    public function update(UpdateSettingRequest $request, Setting $setting)
    {
        $setting->update($request->all());

        if ($request->input('about_image', false)) {
            if (!$setting->about_image || $request->input('about_image') !== $setting->about_image->file_name) {
                if ($setting->about_image) {
                    $setting->about_image->delete();
                }
                $setting->addMedia(storage_path('tmp/uploads/' . basename($request->input('about_image'))))->toMediaCollection('about_image');
            }
        } elseif ($setting->about_image) {
            $setting->about_image->delete();
        }

        if ($request->input('cover_image', false)) {
            if (!$setting->cover_image || $request->input('cover_image') !== $setting->cover_image->file_name) {
                if ($setting->cover_image) {
                    $setting->cover_image->delete();
                }
                $setting->addMedia(storage_path('tmp/uploads/' . basename($request->input('cover_image'))))->toMediaCollection('cover_image');
            }
        } elseif ($setting->cover_image) {
            $setting->cover_image->delete();
        }

        return redirect()->route('admin.settings.index');
    }
    public function storeCKEditorImages(Request $request)
    {

        $model         = new Setting();
        $model->id     = $request->input('crud_id', 0);
        $model->exists = true;
        $media         = $model->addMediaFromRequest('upload')->toMediaCollection('ck-media');

        return response()->json(['id' => $media->id, 'url' => $media->getUrl()], Response::HTTP_CREATED);
    }
}