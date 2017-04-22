@section('JScript')
<script>
	$(document).ready(function(){
          $('.select2-multi').select2();
          $('.select2-multi').select2().val({!! json_encode($post->tags()->allRelatedIds()) !!}).trigger('change');

        }); 
</script>


@stop