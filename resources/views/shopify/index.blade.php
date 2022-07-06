@extends('shopify-app::layouts.default')

@section('content')

@endsection

@section('scripts')
    @parent
    <script>
        actions.TitleBar.create(app, { title: 'Gallery Management' });
    </script>
@endsection
