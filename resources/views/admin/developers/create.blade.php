@extends('parts.body')
@section('content')

<form action="{{ route('admin.developers.store') }}" method="POST" class="boot" enctype="multipart/form-data">
    @csrf
    <div class="mb-3 row justify-content-center">
        <label for="skills" class="col-sm-8 col-form-label">skills</label>
        <div class="col-sm-8">
            <textarea type="text" class="form-control @error('skills') is-invalid @enderror" id="skills" placeholder="Inserisci le tue skill" name="skills">
            </textarea>
        </div>
        <div class="col-sm-8">
            <label for="curriculum" class="col-sm-4 col-form-label">curriculum</label>
            <textarea name="curriculum" type="text" cols="50" rows="10" class="form-control @error('curriculum') is-invalid @enderror" id="curriculum" placeholder="Inserisci la tua esperienza">
            </textarea>
        </div>
        <div class="col-sm-8">
            <label for="image" class="col-sm-4 col-form-label">Image: </label>
            <input type="text" class="form-control @error('image') is-invalid @enderror" id="image" name="image">
        </div>
        <label for="phone_number" class="col-sm-8 col-form-label">phone number</label>
        <div class="col-sm-8">
            <input type="text" class="form-control @error('phone_number') is-invalid @enderror" id="phone_number" placeholder="Inserisci un titolo" name="phone_number">
        </div>
        <div class="col-sm-8">
            <label for="description" class="col-sm-4 col-form-label">description</label>
            <textarea name="description" type="text" cols="50" rows="10" class="form-control @error('description') is-invalid @enderror" id="description" placeholder="Inserisci la tua esperienza">
            </textarea>
        </div>
    </div>
    <button class="btn btn-warning"><strong>Save</strong></button>
</form>
<script src="//js.nicedit.com/nicEdit-latest.js" type="text/javascript">
</script>
<script type="text/javascript">
  bkLib.onDomLoaded(nicEditors.allTextAreas);
</script>

@endsection