@extends('layouts.admin')
@section('content')
<div class="content">

    <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    Buat Tukang Cukur
                </div>
                <div class="panel-body">
                    <form method="POST" action="{{ route("admin.stylists.store") }}" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group {{ $errors->has('name') ? 'has-error' : '' }}">
                            <label class="required" for="name">Nama</label>
                            <input class="form-control" type="text" name="name" id="name" value="{{ old('name', '') }}" required>
                            @if($errors->has('name'))
                                <span class="help-block" role="alert">{{ $errors->first('name') }}</span>
                            @endif
                        </div>
                        <div class="form-group {{ $errors->has('phone') ? 'has-error' : '' }}">
                            <label for="phone">Telepon</label>
                            <input class="form-control" type="text" name="phone" id="phone" value="{{ old('phone', '') }}">
                            @if($errors->has('phone'))
                                <span class="help-block" role="alert">{{ $errors->first('phone') }}</span>
                            @endif
                        </div>
                        <div class="form-group {{ $errors->has('skills') ? 'has-error' : '' }}">
                            <label>Keahlian</label>
                            <select class="form-control" name="skills" id="skills">
                                <option value disabled {{ old('skills', null) === null ? 'selected' : '' }}>{{ trans('global.pleaseSelect') }}</option>
                                @foreach(App\Models\Stylist::SKILLS_SELECT as $key => $label)
                                    <option value="{{ $key }}" {{ old('skills', '') === (string) $key ? 'selected' : '' }}>{{ $label }}</option>
                                @endforeach
                            </select>
                            @if($errors->has('skills'))
                                <span class="help-block" role="alert">{{ $errors->first('skills') }}</span>
                            @endif
                        </div>
                        <div class="form-group {{ $errors->has('barbershop') ? 'has-error' : '' }}">
                            <label for="barbershop_id">Barbershop</label>
                            <select class="form-control select2" name="barbershop_id" id="barbershop_id">
                                @foreach($barbershops as $id => $entry)
                                    <option value="{{ $id }}" {{ old('barbershop_id') == $id ? 'selected' : '' }}>{{ $entry }}</option>
                                @endforeach
                            </select>
                            @if($errors->has('barbershop'))
                                <span class="help-block" role="alert">{{ $errors->first('barbershop') }}</span>
                            @endif
                        </div>
                        <div class="form-group {{ $errors->has('thumb') ? 'has-error' : '' }}">
                            <label for="thumb">Foto</label>
                            <div class="needsclick dropzone" id="thumb-dropzone">
                            </div>
                            @if($errors->has('thumb'))
                                <span class="help-block" role="alert">{{ $errors->first('thumb') }}</span>
                            @endif
                        </div>
                        <div class="form-group">
                            <button class="btn btn-danger" type="submit">
                               Simpan
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
    Dropzone.options.thumbDropzone = {
    url: '{{ route('admin.stylists.storeMedia') }}',
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
      $('form').find('input[name="thumb"]').remove()
      $('form').append('<input type="hidden" name="thumb" value="' + response.name + '">')
    },
    removedfile: function (file) {
      file.previewElement.remove()
      if (file.status !== 'error') {
        $('form').find('input[name="thumb"]').remove()
        this.options.maxFiles = this.options.maxFiles + 1
      }
    },
    init: function () {
@if(isset($stylist) && $stylist->thumb)
      var file = {!! json_encode($stylist->thumb) !!}
          this.options.addedfile.call(this, file)
      this.options.thumbnail.call(this, file, file.preview)
      file.previewElement.classList.add('dz-complete')
      $('form').append('<input type="hidden" name="thumb" value="' + file.file_name + '">')
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