<div>
    <form class="form" wire:submit.prevent="save" enctype="multipart/form-data">
    	<div class="form-group">
    		<label>Photo</label>
    		<input type="file" accept="image/*" wire:model.lazy="photo"><br>
    		<span wire:loading wire:target="save">Uploading...</span><br>
    		@error('photo')
    			<span class="error">{{$message}}</span>
    		@enderror
    		@if ($photo)
		        Photo Preview:
		        <img width="100%" src="{{ $photo->temporaryUrl() }}">
		    @endif
    	</div>
    	<div class="form-group">
    		<label>Name</label>
    		<input type="text" class="form-control" wire:model.lazy="name" placeholder="Name here...">
    		@error('name')
    			<span class="error">{{$message}}</span>
    		@enderror
    	</div>
    	<button class="btn btn-success" type="submit">Submit</button>
    </form>
    <div class="row">
	    @foreach($data as $people)
	    	<div class="col-6 p-2">
	            <img width="100%" src="{{ asset('storage/photos/' . $people->photo) }}">	        
	    	</div>
    	@endforeach	
    </div>
</div>
