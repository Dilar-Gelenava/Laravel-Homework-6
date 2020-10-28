<div class="container" style="margin-top: 50px;">
    <form action="{{ route('storeproduct') }}" method="POST">
        @csrf
        <input type="text" class="form-control" name="title" placeholder="title">
        <textarea name="description" class="form-control" placeholder="description"></textarea>
        <input type="text" class="form-control" name="image" placeholder="image">
        <button class="btn btn-primary">add post</button>
    </form>
</div>