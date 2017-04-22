@section('scripts')

	<script src="https://cloud.tinymce.com/stable/tinymce.min.js"></script>

	<script>
		tinymce.init({
			selector: 'textarea',
			plugins: 'link code'
		});
	</script> 

@stop