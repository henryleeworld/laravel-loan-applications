@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.edit') }} {{ trans('cruds.comment.title_singular') }}
    </div>

    <div class="card-body">
        <form method="POST" action="{{ route("admin.comments.update", [$comment->id]) }}" enctype="multipart/form-data">
            @method('PUT')
            @csrf
            <div class="mb-3">
                <label class="required" for="loan_application_id">{{ trans('cruds.comment.fields.loan_application') }}</label>
                <select class="form-control select2 {{ $errors->has('loan_application') ? 'is-invalid' : '' }}" name="loan_application_id" id="loan_application_id" required>
                    @foreach($loan_applications as $id => $loan_application)
                        <option value="{{ $id }}" {{ ($comment->loan_application ? $comment->loan_application->id : old('loan_application_id')) == $id ? 'selected' : '' }}>{{ $loan_application }}</option>
                    @endforeach
                </select>
                @if($errors->has('loan_application'))
                    <div class="invalid-feedback">
                        {{ $errors->first('loan_application') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.comment.fields.loan_application_helper') }}</span>
            </div>
            <div class="mb-3">
                <label class="required" for="user_id">{{ trans('cruds.comment.fields.user') }}</label>
                <select class="form-control select2 {{ $errors->has('user') ? 'is-invalid' : '' }}" name="user_id" id="user_id" required>
                    @foreach($users as $id => $user)
                        <option value="{{ $id }}" {{ ($comment->user ? $comment->user->id : old('user_id')) == $id ? 'selected' : '' }}>{{ $user }}</option>
                    @endforeach
                </select>
                @if($errors->has('user'))
                    <div class="invalid-feedback">
                        {{ $errors->first('user') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.comment.fields.user_helper') }}</span>
            </div>
            <div class="mb-3">
                <label class="required" for="comment_text">{{ trans('cruds.comment.fields.comment_text') }}</label>
                <textarea class="form-control {{ $errors->has('comment_text') ? 'is-invalid' : '' }}" name="comment_text" id="comment_text" required>{{ old('comment_text', $comment->comment_text) }}</textarea>
                @if($errors->has('comment_text'))
                    <div class="invalid-feedback">
                        {{ $errors->first('comment_text') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.comment.fields.comment_text_helper') }}</span>
            </div>
            <div class="mb-0">
                <button class="btn btn-danger" type="submit">
                    {{ trans('global.save') }}
                </button>
            </div>
        </form>
    </div>
</div>



@endsection