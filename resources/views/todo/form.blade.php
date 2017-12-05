
<div class="panel-body">
	<form method="POST" @isset ($todo) action="/{{ $todo->id }}" @else action="/" @endisset>
	@isset ($todo) {{ method_field('PATCH') }} @endisset
	{{ csrf_field() }}
		<div class="form-group">
			<label for="body">Todo</label>
			@isset ($todo)
			<textarea required name="body" id="body" class="form-control">{{ $todo->body }}</textarea>
			@else
			<textarea required name="body" id="body" class="form-control"></textarea>	
			@endisset
		</div>
		<div class="form-group">
			<label for="priority">Priority</label>
			<select name="priority" class="form-control">
			@foreach ($priorities as $priority)
				<option @if ($priority->name === "Normal") selected="selected" @endif  style="background-color: {{ $priority->color }};" value="{{ $priority->id }}">{{ $priority->name }}</option>
			@endforeach
			</select>
		</div>
		<div class="form-group">
			<label for="section">Section</label>
			<select name="section" class="form-control">
			@foreach ($sections as $section)
				<option value="{{ $section->id }}">{{ $section->name }}</option>
			@endforeach
			</select>
		</div>
		<div class="form-group">
			<button type="submit" class="btn btn-primary">{{ $button }}</button>
		</div>
	</form>
</div>
