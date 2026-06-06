<h3>Update Category</h3>
@csrf
@method('PUT')
<div class="form-group">
    <label for="name">Name</label>
    <input type="text" name="namecate" class="form-control" id="cname" aria-describedby="nameHelp"
        placeholder="Enter name of category" value="{{ $data->category_name }}">
    <small id="name" class="form-text text-muted">Please write down Category Name here.</small>
</div>
<button type="button" onClick="saveDataUpdate('{{ $data->id }}')" class="btn btn-primary">Submit</button>