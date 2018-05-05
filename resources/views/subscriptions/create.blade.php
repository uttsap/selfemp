@extends('layouts.app')

@section('title', trans('subscription.create'))

@section('content')

<ul class="breadcrumb hidden-print">
    <li>{{ link_to_route('subscriptions.index',trans('subscription.subscriptions')) }}</li>
    <li class="active">{{ trans('subscription.create') }}</li>
</ul>

<div class="row">
    <div class="col-md-4">
        {!! Form::open(['route' => 'subscriptions.store']) !!}
        <div class="panel panel-default">
            <div class="panel-heading"><h3 class="panel-title">{{ trans('subscription.create') }}</h3></div>
            <div class="panel-body">
                <div class="row">
                    <div class="col-sm-6">
                        {!! FormField::text('name', ['label' => trans('subscription.name')]) !!}
                    </div>
                    <div class="col-sm-6">
                        {!! FormField::price('price', ['label' => trans('subscription.price'), 'currency' => Option::get('money_sign', 'Rp')]) !!}
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-6">
                        {!! FormField::text('start_date', ['label' => trans('subscription.start_date')]) !!}
                    </div>
                    <div class="col-sm-6">
                        {!! FormField::text('due_date', ['label' => trans('subscription.due_date')]) !!}
                    </div>
                </div>
                {!! FormField::select('project_id', $projects, ['label' => trans('subscription.project'), 'value' => Request::get('project_id')]) !!}
                {!! FormField::select('vendor_id', $vendors, ['label' => trans('subscription.vendor'), 'value' => Request::get('vendor_id')]) !!}
                {!! FormField::radios('type_id', SubscriptionType::toArray(), ['label' => trans('subscription.type'), 'value' => Request::get('type_id')]) !!}
                {!! FormField::textarea('notes', ['label' => trans('subscription.notes')]) !!}
            </div>

            <div class="panel-footer">
                {!! Form::submit(trans('subscription.create'), ['class' => 'btn btn-primary']) !!}
                {!! link_to_route('subscriptions.index', trans('app.cancel'), [], ['class' => 'btn btn-default']) !!}
            </div>
        </div>
        {!! Form::close() !!}
    </div>
</div>
@endsection

@section('ext_css')
    {!! Html::style(url('assets/css/plugins/jquery.datetimepicker.css')) !!}
@endsection

@section('ext_js')
    {!! Html::script(url('assets/js/plugins/jquery.datetimepicker.js')) !!}
@endsection

@section('script')
<script>
(function() {
    $('#start_date,#due_date').datetimepicker({
        timepicker:false,
        format:'Y-m-d',
        closeOnDateSelect: true,
        scrollInput: false
    });
})();
</script>
@endsection
