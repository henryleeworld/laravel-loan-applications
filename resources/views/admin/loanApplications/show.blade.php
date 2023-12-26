@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.show') }} {{ trans('cruds.loanApplication.title') }}
    </div>

    <div class="card-body">
        <div class="mb-3">
            <div class="mb-3">
                <a class="btn btn-default" href="{{ route('admin.loan-applications.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
            <table class="table table-bordered table-striped">
                <tbody>
                    <tr>
                        <th>
                            {{ trans('cruds.loanApplication.fields.id') }}
                        </th>
                        <td>
                            {{ $loanApplication->id }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.loanApplication.fields.loan_amount') }}
                        </th>
                        <td>
                            {{ $loanApplication->loan_amount }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.loanApplication.fields.description') }}
                        </th>
                        <td>
                            {{ $loanApplication->description }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.loanApplication.fields.status') }}
                        </th>
                        <td>
                            {{ $user->is_user && $loanApplication->status_id < 8 ? $defaultStatus->name : $loanApplication->status->name }}
                        </td>
                    </tr>
                    @if($user->is_admin)
                        <tr>
                            <th>
                                {{ trans('cruds.loanApplication.fields.analyst') }}
                            </th>
                            <td>
                                {{ $loanApplication->analyst->name ?? '' }}
                            </td>
                        </tr>
                        <tr>
                            <th>
                                {{ trans('cruds.loanApplication.fields.cfo') }}
                            </th>
                            <td>
                                {{ $loanApplication->cfo->name ?? '' }}
                            </td>
                        </tr>
                    @endif
                </tbody>
            </table>

            @if($user->is_admin && count($logs))
                <h3>Logs</h3>
                <table class="table table-bordered table-striped">
                    <thead>
                        <tr>
                            <th>User</th>
                            <th>Changes</th>
                            <th>Time</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($logs as $log)
                            <tr>
                                <td>
                                    {{ $log['user'] }}
                                </td>
                                <td>
                                    <ul>
                                        @foreach($log['changes'] as $change)
                                            <li>
                                                {!! $change !!}
                                            </li>
                                        @endforeach
                                        @if($log['comment'])
                                            <li>
                                                <b>Comment</b>: {{ $log['comment'] }}
                                            </li>
                                        @endif
                                    </ul>
                                </td>
                                <td>
                                    {{ $log['time'] }}
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            @endif

            <div class="mb-3">
                @if($user->is_admin && in_array($loanApplication->status_id, [1, 3, 4]))
                    <a class="btn btn-success" href="{{ route('admin.loan-applications.showSend', $loanApplication->id) }}">
                        {{ trans('cruds.loanApplication.fields.send_to') }}
                        @if($loanApplication->status_id == 1)
                            {{ trans('cruds.loanApplication.fields.analyst') }}
                        @else
                            {{ trans('cruds.loanApplication.fields.cfo') }}
                        @endif
                    </a>
                @elseif(($user->is_analyst && $loanApplication->status_id == 2) || ($user->is_cfo && $loanApplication->status_id == 5))
                    <a class="btn btn-success" href="{{ route('admin.loan-applications.showAnalyze', $loanApplication->id) }}">
                        {{ trans('cruds.loanApplication.fields.submit_analysis') }}
                    </a>
                @endif

                @if(Gate::allows('loan_application_edit') && in_array($loanApplication->status_id, [6,7]))
                    <a class="btn btn-info" href="{{ route('admin.loan-applications.edit', $loanApplication->id) }}">
                        {{ trans('global.edit') }}
                    </a>
                @endif

                @can('loan_application_delete')
                    <form action="{{ route('admin.loan-applications.destroy', $loanApplication->id) }}" method="POST" onsubmit="return confirm('{{ trans('global.areYouSure') }}');" style="display: inline-block;">
                        <input type="hidden" name="_method" value="DELETE">
                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                        <input type="submit" class="btn btn-danger" value="{{ trans('global.delete') }}">
                    </form>
                @endcan
            </div>
            <div class="mb-0">
                <a class="btn btn-default" href="{{ route('admin.loan-applications.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
        </div>
    </div>
</div>



@endsection
