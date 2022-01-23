@extends('layouts.admin')
@section('content')
<div class="content">
    <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                   Pengaturan Website
                </div>
                <div class="panel-body">
                    <form method="POST" action="{{ route("admin.settings.store") }}" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group {{ $errors->has('web_name') ? 'has-error' : '' }}">
                            <label class="required" for="web_name">Nama Website</label>
                            <input class="form-control" type="text" name="web_name" id="web_name" value="{{ old('web_name', '') }}" required>
                            @if($errors->has('web_name'))
                                <span class="help-block" role="alert">{{ $errors->first('web_name') }}</span>
                            @endif
                        </div>
                        <div class="form-group {{ $errors->has('email') ? 'has-error' : '' }}">
                            <label for="email">Email</label>
                            <input class="form-control" type="email" name="email" id="email" value="{{ old('email') }}">
                            @if($errors->has('email'))
                                <span class="help-block" role="alert">{{ $errors->first('email') }}</span>
                            @endif
                        </div>
                        <div class="form-group {{ $errors->has('address') ? 'has-error' : '' }}">
                            <label for="address">Alamat</label>
                            <textarea class="form-control" name="address" id="address">{{ old('address') }}</textarea>
                            @if($errors->has('address'))
                                <span class="help-block" role="alert">{{ $errors->first('address') }}</span>
                            @endif
                        </div>
                        <div class="form-group {{ $errors->has('tag_line') ? 'has-error' : '' }}">
                            <label class="required" for="tag_line">Motto</label>
                            <input class="form-control" type="text" name="tag_line" id="tag_line" value="{{ old('tag_line', '') }}" required>
                            @if($errors->has('tag_line'))
                                <span class="help-block" role="alert">{{ $errors->first('tag_line') }}</span>
                            @endif
                        </div>
                        <div class="form-group {{ $errors->has('phone') ? 'has-error' : '' }}">
                            <label for="phone">Telepon</label>
                            <input class="form-control" type="text" name="phone" id="phone" value="{{ old('phone', '') }}">
                            @if($errors->has('phone'))
                                <span class="help-block" role="alert">{{ $errors->first('phone') }}</span>
                            @endif
                        </div>
                        <div class="form-group {{ $errors->has('open_hours') ? 'has-error' : '' }}">
                            <label class="required" for="open_hours">Jam Buka</label>
                            <input class="form-control" type="text" name="open_hours" id="open_hours" value="{{ old('open_hours', '') }}" required>
                            @if($errors->has('open_hours'))
                                <span class="help-block" role="alert">{{ $errors->first('open_hours') }}</span>
                            @endif
                        </div>
                        <div class="form-group {{ $errors->has('about_web') ? 'has-error' : '' }}">
                            <label for="about_web">Tentang Website</label>
                            <textarea class="form-control ckeditor" name="about_web" id="about_web">{!! old('about_web') !!}</textarea>
                            @if($errors->has('about_web'))
                                <span class="help-block" role="alert">{{ $errors->first('about_web') }}</span>
                            @endif
                        </div>
                        <div class="form-group {{ $errors->has('facebook') ? 'has-error' : '' }}">
                            <label for="facebook">Facebook</label>
                            <input class="form-control" type="text" name="facebook" id="facebook" value="{{ old('facebook', '') }}">
                            @if($errors->has('facebook'))
                                <span class="help-block" role="alert">{{ $errors->first('facebook') }}</span>
                            @endif
                        </div>
                        <div class="form-group {{ $errors->has('instagram') ? 'has-error' : '' }}">
                            <label for="instagram">Instagram</label>
                            <input class="form-control" type="text" name="instagram" id="instagram" value="{{ old('instagram', '') }}">
                            @if($errors->has('instagram'))
                                <span class="help-block" role="alert">{{ $errors->first('instagram') }}</span>
                            @endif
                        </div>
                        <div class="form-group {{ $errors->has('linkind') ? 'has-error' : '' }}">
                            <label for="linkind">Linkind</label>
                            <input class="form-control" type="text" name="linkind" id="linkind" value="{{ old('linkind', '') }}">
                            @if($errors->has('linkind'))
                                <span class="help-block" role="alert">{{ $errors->first('linkind') }}</span>
                            @endif
                        </div>
                        <div class="form-group {{ $errors->has('twitter') ? 'has-error' : '' }}">
                            <label for="twitter">Twitter</label>
                            <input class="form-control" type="text" name="twitter" id="twitter" value="{{ old('twitter', '') }}">
                            @if($errors->has('twitter'))
                                <span class="help-block" role="alert">{{ $errors->first('twitter') }}</span>
                            @endif
                        </div>
                        <div class="form-group {{ $errors->has('paragraf_tag_line') ? 'has-error' : '' }}">
                            <label for="paragraf_tag_line">Keterangan Motto</label>
                            <textarea class="form-control" name="paragraf_tag_line" id="paragraf_tag_line">{{ old('paragraf_tag_line') }}</textarea>
                            @if($errors->has('paragraf_tag_line'))
                                <span class="help-block" role="alert">{{ $errors->first('paragraf_tag_line') }}</span>
                            @endif
                        </div>
                        <div class="form-group {{ $errors->has('about_image') ? 'has-error' : '' }}">
                            <label for="about_image">Gambar Tentang Website</label>
                            <div class="needsclick dropzone" id="about_image-dropzone">
                            </div>
                            @if($errors->has('about_image'))
                                <span class="help-block" role="alert">{{ $errors->first('about_image') }}</span>
                            @endif
                        </div>
                        <div class="form-group {{ $errors->has('cover_image') ? 'has-error' : '' }}">
                            <label for="cover_image">Cover Gambar</label>
                            <div class="needsclick dropzone" id="cover_image-dropzone">
                            </div>
                            @if($errors->has('cover_image'))
                                <span class="help-block" role="alert">{{ $errors->first('cover_image') }}</span>
                            @endif
                        </div>
                        <div class="form-group">
                            <button class="btn btn-danger" type="submit">
                               Simpan Pengaturan
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('scripts')
<script>
    $(document).ready(function () {
  function SimpleUploadAdapter(editor) {
    editor.plugins.get('FileRepository').createUploadAdapter = function(loader) {
      return {
        upload: function() {
          return loader.file
            .then(function (file) {
              return new Promise(function(resolve, reject) {
                // Init request
                var xhr = new XMLHttpRequest();
                xhr.open('POST', '{{ route('admin.settings.storeCKEditorImages') }}', true);
                xhr.setRequestHeader('x-csrf-token', window._token);
                xhr.setRequestHeader('Accept', 'application/json');
                xhr.responseType = 'json';

                // Init listeners
                var genericErrorText = `Couldn't upload file: ${ file.name }.`;
                xhr.addEventListener('error', function() { reject(genericErrorText) });
                xhr.addEventListener('abort', function() { reject() });
                xhr.addEventListener('load', function() {
                  var response = xhr.response;

                  if (!response || xhr.status !== 201) {
                    return reject(response && response.message ? `${genericErrorText}\n${xhr.status} ${response.message}` : `${genericErrorText}\n ${xhr.status} ${xhr.statusText}`);
                  }

                  $('form').append('<input type="hidden" name="ck-media[]" value="' + response.id + '">');

                  resolve({ default: response.url });
                });

                if (xhr.upload) {
                  xhr.upload.addEventListener('progress', function(e) {
                    if (e.lengthComputable) {
                      loader.uploadTotal = e.total;
                      loader.uploaded = e.loaded;
                    }
                  });
                }

                // Send request
                var data = new FormData();
                data.append('upload', file);
                data.append('crud_id', '{{ $setting->id ?? 0 }}');
                xhr.send(data);
              });
            })
        }
      };
    }
  }

  var allEditors = document.querySelectorAll('.ckeditor');
  for (var i = 0; i < allEditors.length; ++i) {
    ClassicEditor.create(
      allEditors[i], {
        extraPlugins: [SimpleUploadAdapter]
      }
    );
  }
});
</script>

<script>
    Dropzone.options.aboutImageDropzone = {
    url: '{{ route('admin.settings.storeMedia') }}',
    maxFilesize: 2, // MB
    acceptedFiles: '.jpeg,.jpg,.png,.gif',
    maxFiles: 1,
    addRemoveLinks: true,
    headers: {
      'X-CSRF-TOKEN': "{{ csrf_token() }}"
    },
    params: {
      size: 2,
      width: 4096,
      height: 4096
    },
    success: function (file, response) {
      $('form').find('input[name="about_image"]').remove()
      $('form').append('<input type="hidden" name="about_image" value="' + response.name + '">')
    },
    removedfile: function (file) {
      file.previewElement.remove()
      if (file.status !== 'error') {
        $('form').find('input[name="about_image"]').remove()
        this.options.maxFiles = this.options.maxFiles + 1
      }
    },
    init: function () {
@if(isset($setting) && $setting->about_image)
      var file = {!! json_encode($setting->about_image) !!}
          this.options.addedfile.call(this, file)
      this.options.thumbnail.call(this, file, file.preview)
      file.previewElement.classList.add('dz-complete')
      $('form').append('<input type="hidden" name="about_image" value="' + file.file_name + '">')
      this.options.maxFiles = this.options.maxFiles - 1
@endif
    },
    error: function (file, response) {
        if ($.type(response) === 'string') {
            var message = response //dropzone sends it's own error messages in string
        } else {
            var message = response.errors.file
        }
        file.previewElement.classList.add('dz-error')
        _ref = file.previewElement.querySelectorAll('[data-dz-errormessage]')
        _results = []
        for (_i = 0, _len = _ref.length; _i < _len; _i++) {
            node = _ref[_i]
            _results.push(node.textContent = message)
        }

        return _results
    }
}
</script>
<script>
    Dropzone.options.coverImageDropzone = {
    url: '{{ route('admin.settings.storeMedia') }}',
    maxFilesize: 5, // MB
    acceptedFiles: '.jpeg,.jpg,.png,.gif',
    maxFiles: 1,
    addRemoveLinks: true,
    headers: {
      'X-CSRF-TOKEN': "{{ csrf_token() }}"
    },
    params: {
      size: 5,
      width: 4096,
      height: 4096
    },
    success: function (file, response) {
      $('form').find('input[name="cover_image"]').remove()
      $('form').append('<input type="hidden" name="cover_image" value="' + response.name + '">')
    },
    removedfile: function (file) {
      file.previewElement.remove()
      if (file.status !== 'error') {
        $('form').find('input[name="cover_image"]').remove()
        this.options.maxFiles = this.options.maxFiles + 1
      }
    },
    init: function () {
@if(isset($setting) && $setting->cover_image)
      var file = {!! json_encode($setting->cover_image) !!}
          this.options.addedfile.call(this, file)
      this.options.thumbnail.call(this, file, file.preview)
      file.previewElement.classList.add('dz-complete')
      $('form').append('<input type="hidden" name="cover_image" value="' + file.file_name + '">')
      this.options.maxFiles = this.options.maxFiles - 1
@endif
    },
    error: function (file, response) {
        if ($.type(response) === 'string') {
            var message = response //dropzone sends it's own error messages in string
        } else {
            var message = response.errors.file
        }
        file.previewElement.classList.add('dz-error')
        _ref = file.previewElement.querySelectorAll('[data-dz-errormessage]')
        _results = []
        for (_i = 0, _len = _ref.length; _i < _len; _i++) {
            node = _ref[_i]
            _results.push(node.textContent = message)
        }

        return _results
    }
}
</script>
@endsection