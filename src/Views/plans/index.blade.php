@extends('quarx::layouts.dashboard', ['pageTitle' => 'Subscription &raquo; Plans'])

@section('content')

    @include('hadron::modals')

    <div class="row">
        <a class="btn btn-primary pull-right" href="{!! route('quarx.plans.create') !!}">Add New</a>
        <div class="pull-right">
            {!! Form::open(['url' => 'quarx/plans/search']) !!}
             <input class="form-control header-input pull-right raw-margin-right-24" name="term" placeholder="Search">
            {!! Form::close() !!}
        </div>
        <h1 class="page-header">Subscription Plans</h1>
    </div>

    <div class="row">
        @if ($plans->isEmpty())
            <div class="well text-center">No plans found.</div>
        @else
            <table class="table table-striped">
                <thead>
                    <th>Name</th>
                    <th>Enabled</th>
                    <th class="text-right" width="150px">Action</th>
                </thead>
                <tbody>
                @foreach($plans as $plan)
                    <tr>
                        <td><a href="{!! route('quarx.plans.edit', [$plan->id]) !!}">{{ $plan->name }}</a></td>
                        <td>@if ($plan->enabled) <span class="fa fa-check"></span> @endif</td>
                        <td class="text-right">
                            <form method="post" action="{!! url('admin/plans/'.$plan->id) !!}">
                                {!! csrf_field() !!}
                                {!! method_field('DELETE') !!}
                                <button class="btn delete-plan-btn btn-danger btn-xs pull-right" type="submit"><i class="fa fa-trash"></i> Delete</button>
                            </form>
                            <a class="btn btn-default btn-xs pull-right raw-margin-right-16" href="{!! route('quarx.plans.edit', [$plan->id]) !!}"><i class="fa fa-pencil"></i> Edit</a>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>

            <div class="row">
                {!! $plans; !!}
            </div>
        @endif
    </div>

@stop