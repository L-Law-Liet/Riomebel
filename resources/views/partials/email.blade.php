<p>Имя: {{ $data['name'] }}</p>
<p>Телефон: {{ $data['phone'] }}</p>
<p>Фотка: <br>
	<img src="{{ $message->embed(storage_path($data['file'])) }}">
</p>
