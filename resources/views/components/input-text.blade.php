<div class="mb-3">
    <label for="exampleInputUsername1" class="form-label">{{ $attributes['label'] }}</label>
    <input type="{{$attributes['type'] ? $attributes['type'] : 'text'}}" value="{{ $attributes['value'] }}" class="form-control" id="exampleInputUsername1"
        autocomplete="off" placeholder="{{ $attributes['placeholder'] }}" name="{{ $attributes['name'] }}" step="0.01">

    @error($attributes['name'])
        <span class="text-danger">{{ $message }}</span> <br>
    @enderror
</div>
