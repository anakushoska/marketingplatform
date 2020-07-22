<a href="#" class="text-danger mx-3" data-toggle="tooltip" data-title="Delete" onclick="confirmDelete({{$id}})" @if(isset($style))style="{{$style}}"@endif>
    <i class="fa fa-trash"></i> @if(isset($label)){{$label}}@endif
</a>

<form action="{{$route}}" method="POST" id="delete-form-{{ $id }}" class="d-none">
    @method('DELETE')
    @csrf
    <input type="hidden" value="{{ $id }}" name="id">
</form>
