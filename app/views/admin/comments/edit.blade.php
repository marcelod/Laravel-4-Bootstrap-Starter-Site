@extends('admin.templates.modal')

{{-- Extra CSS styles --}}
@section('syles')
<style type="text/css"></style>
@stop

{{-- Content --}}
@section('content')

	<div class="page-header">
		<h3>{{ $meta['title'] }}</h3>
	</div>

	<!-- Tabs -->
	<ul class="nav nav-tabs">
		<li class="active"><a href="#tab-general" data-toggle="tab">General</a></li>
	</ul>
	<!-- ./ tabs -->

	{{-- Edit a comment form --}}
	<!-- Form -->
	{{ Former::horizontal_open()
		->id('edit')
		->rules($rules)
		->method('PUT')
		->action('admin/comments/' . $comment->id) }}

	{{ Former::token() }}

	{{-- For some weird reason "Former::populate($comment)" does not work here!! No clue why need to look into --}}

	{{-- Dirty Fix: --}}
	{{ Former::populateField('content', $comment->content) }}

		@include('admin.comments.form')

	{{ Former::close() }}
	<!-- ./ form -->

@stop

{{-- Extra JavaScripts --}}
@section('scripts')
<script type="text/javascript">
	$('.wysihtml5').wysihtml5();
    $(prettyPrint);
</script>
@stop