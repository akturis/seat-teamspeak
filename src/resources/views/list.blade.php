@extends('web::layouts.grids.3-9')

@section('title', trans('teamspeak::seat.management'))
@section('page_header', trans('teamspeak::seat.management'))

@section('left')
    <div class="panel panel-default">
        <div class="panel-heading">
            <h3 class="panel-title">{{ trans('teamspeak::seat.quick_create') }}</h3>
        </div>
        <div class="panel-body">
            <form role="form" action="{{ route('teamspeak.add') }}" method="post">
                {{ csrf_field() }}

                <div class="box-body">

                    <div class="form-group">
                        <label for="teamspeak-type">{{ trans('teamspeak::seat.type') }}</label>
                        <select name="teamspeak-type" id="teamspeak-type" class="col-md-12">
                            <option value="user">{{ trans('teamspeak::seat.user_filter') }}</option>
                            <option value="role">{{ trans('teamspeak::seat.role_filter') }}</option>
                            <option value="corporation">{{ trans('teamspeak::seat.corporation_filter') }}</option>
                            <option value="alliance">{{ trans('teamspeak::seat.alliance_filter') }}</option>
                            <option value="public">{{ trans('teamspeak::seat.public_filter') }}</option>
                        </select>
                    </div>

                    <div class="form-group">
                        <label for="teamspeak-user-id">{{ trans('teamspeak::seat.username') }}</label>
                        <select name="teamspeak-user-id" id="teamspeak-user-id" class="col-md-12">
                            @foreach($users as $user)
                            <option value="{{ $user->id }}">{{ $user->name }}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="form-group">
                        <label for="teamspeak-role-id">{{ trans('teamspeak::seat.role') }}</label>
                        <select name="teamspeak-role-id" id="teamspeak-role-id" class="col-md-12" disabled="disabled">
                            @foreach($roles as $role)
                            <option value="{{ $role->id }}">{{ $role->title }}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="form-group">
                        <label for="teamspeak-corporation-id">{{ trans('teamspeak::seat.corporation') }}</label>
                        <select name="teamspeak-corporation-id" id="teamspeak-corporation-id" class="col-md-12" disabled="disabled">
                            @foreach($corporations as $corporation)
                            <option value="{{ $corporation->corporationID }}">{{ $corporation->corporationName }}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="form-group">
                        <label for="teamspeak-alliance-id">{{ trans('teamspeak::seat.alliance') }}</label>
                        <select name="teamspeak-alliance-id" id="teamspeak-alliance-id" class="col-md-12" disabled="disabled">
                            @foreach($alliances as $alliance)
                            <option value="{{ $alliance->allianceID }}">{{ $alliance->name }}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="form-group">
                        <label for="teamspeak-group-id">{{ trans('teamspeak::seat.group') }}</label>
                        <select name="teamspeak-group-id" id="teamspeak-group-id" class="col-md-12">
                            @foreach($groups as $group)
                            <option value="{{ $group->id }}">{{ $group->name }}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="form-group">
                        <label for="teamspeak-enabled">{{ trans('teamspeak::seat.enabled') }}</label>
                        <input type="checkbox" name="teamspeak-enabled" id="teamspeak-enabled" checked="checked" value="1" />
                    </div>

                </div>

                <div class="box-footer">
                    <button type="submit" class="btn btn-primary pull-right">{{ trans('teamspeak::seat.add') }}</button>
                </div>

            </form>
        </div>
    </div>
@stop

@section('right')
    <div class="panel panel-default">
        <div class="panel-heading">
            <h3 class="panel-title">{{ trans('teamspeak::seat.authorisations') }}</h3>
        </div>
        <div class="panel-body">

            <ul class="nav nav-pills" id="teamspeak-tabs">
                <li role="presentation" class="active">
                    <a href="#teamspeak-public">{{ trans('teamspeak::seat.public_filter') }}</a>
                </li>
                <li role="presentation">
                    <a href="#teamspeak-username">{{ trans('teamspeak::seat.user_filter') }}</a>
                </li>
                <li role="presentation">
                    <a href="#teamspeak-role">{{ trans('teamspeak::seat.role_filter') }}</a>
                </li>
                <li role="presentation">
                    <a href="#teamspeak-corporation">{{ trans('teamspeak::seat.corporation_filter') }}</a>
                </li>
                <li role="presentation">
                    <a href="#teamspeak-alliance">{{ trans('teamspeak::seat.alliance_filter') }}</a>
                </li>
            </ul>

            <div class="tab-content">
                <div role="tabpanel" class="tab-pane active" id="teamspeak-public">
                    <table class="table table-condensed table-hover table-responsive">
                        <thead>
                        <tr>
                            <th></th>
                            <th>{{ trans('teamspeak::seat.group') }}</th>
                            <th>{{ trans('teamspeak::seat.created') }}</th>
                            <th>{{ trans('teamspeak::seat.updated') }}</th>
                            <th>{{ trans('teamspeak::seat.status') }}</th>
                            <th></th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($groupPublic as $group)
                            <tr>
                                <td></td>
                                <td>{{ $group->group->name }}</td>
                                <td>{{ $group->created_at }}</td>
                                <td>{{ $group->updated_at }}</td>
                                <td>{{ $group->enable }}</td>
                                <td>
                                    <div class="btn-group">
                                        <a href="{{ route('teamspeak.public.remove', ['group_id' => $group->group_id]) }}" type="button" class="btn btn-danger btn-xs col-xs-12">
                                            {{ trans('web::seat.remove') }}
                                        </a>
                                    </div>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
                <div role="tabpanel" class="tab-pane" id="teamspeak-username">
                    <table class="table table-condensed table-hover table-responsive">
                        <thead>
                        <tr>
                            <th>{{ trans('teamspeak::seat.username') }}</th>
                            <th>{{ trans('teamspeak::seat.group') }}</th>
                            <th>{{ trans('teamspeak::seat.created') }}</th>
                            <th>{{ trans('teamspeak::seat.updated') }}</th>
                            <th>{{ trans('teamspeak::seat.status') }}</th>
                            <th></th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($groupUsers as $group)
                            <tr>
                                <td>{{ $group->user->name }}</td>
                                <td>{{ $group->group->name }}</td>
                                <td>{{ $group->created_at }}</td>
                                <td>{{ $group->updated_at }}</td>
                                <td>{{ $group->enable }}</td>
                                <td>
                                    <div class="btn-group">
                                        <a href="{{ route('teamspeak.user.remove', ['user_id' => $group->user_id, 'group_id' => $group->group_id]) }}" type="button" class="btn btn-danger btn-xs col-xs-12">
                                            {{ trans('web::seat.remove') }}
                                        </a>
                                    </div>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
                <div role="tabpanel" class="tab-pane" id="teamspeak-role">
                    <table class="table table-condensed table-hover table-responsive">
                        <thead>
                        <tr>
                            <th>{{ trans('teamspeak::seat.role') }}</th>
                            <th>{{ trans('teamspeak::seat.group') }}</th>
                            <th>{{ trans('teamspeak::seat.created') }}</th>
                            <th>{{ trans('teamspeak::seat.updated') }}</th>
                            <th>{{ trans('teamspeak::seat.status') }}</th>
                            <th></th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($groupRoles as $group)
                            <tr>
                                <td>{{ $group->role->title }}</td>
                                <td>{{ $group->group->name }}</td>
                                <td>{{ $group->created_at }}</td>
                                <td>{{ $group->updated_at }}</td>
                                <td>{{ $group->enable }}</td>
                                <td>
                                    <div class="btn-group">
                                        <a href="{{ route('teamspeak.role.remove', ['role_id' => $group->role_id, 'group_id' => $group->group_id]) }}" type="button" class="btn btn-danger btn-xs col-xs-12">
                                            {{ trans('web::seat.remove') }}
                                        </a>
                                    </div>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
                <div role="tabpanel" class="tab-pane" id="teamspeak-corporation">
                    <table class="table table-condensed table-hover table-responsive">
                        <thead>
                        <tr>
                            <th>{{ trans('teamspeak::seat.corporation') }}</th>
                            <th>{{ trans('teamspeak::seat.group') }}</th>
                            <th>{{ trans('teamspeak::seat.created') }}</th>
                            <th>{{ trans('teamspeak::seat.updated') }}</th>
                            <th>{{ trans('teamspeak::seat.status') }}</th>
                            <th></th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($groupCorporations as $group)
                            <tr>
                                <td>{{ $group->corporation->corporationName }}</td>
                                <td>{{ $group->group->name }}</td>
                                <td>{{ $group->created_at }}</td>
                                <td>{{ $group->updated_at }}</td>
                                <td>{{ $group->enable }}</td>
                                <td>
                                    <div class="btn-group">
                                        <a href="{{ route('teamspeak.corporation.remove', ['corporation_id' => $group->corporation_id, 'group_id' => $group->group_id]) }}" type="button" class="btn btn-danger btn-xs col-xs-12">
                                            {{ trans('web::seat.remove') }}
                                        </a>
                                    </div>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
                <div role="tabpanel" class="tab-pane" id="teamspeak-alliance">
                    <table class="table table-condensed table-hover table-responsive">
                        <thead>
                        <tr>
                            <th>{{ trans('teamspeak::seat.alliance') }}</th>
                            <th>{{ trans('teamspeak::seat.group') }}</th>
                            <th>{{ trans('teamspeak::seat.created') }}</th>
                            <th>{{ trans('teamspeak::seat.updated') }}</th>
                            <th>{{ trans('teamspeak::seat.status') }}</th>
                            <th></th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($groupAlliances as $group)
                            <tr>
                                <td>{{ $group->alliance->name }}</td>
                                <td>{{ $group->group->name }}</td>
                                <td>{{ $group->created_at }}</td>
                                <td>{{ $group->updated_at }}</td>
                                <td>{{ $group->enable }}</td>
                                <td>
                                    <div class="btn-group">
                                        <a href="{{ route('teamspeak.alliance.remove', ['alliance_id' => $group->alliance_id, 'group_id' => $group->group_id]) }}" type="button" class="btn btn-danger btn-xs col-xs-12">
                                            {{ trans('web::seat.remove') }}
                                        </a>
                                    </div>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@stop

@section('javascript')
    <script type="application/javascript">
        $('#teamspeak-type').change(function(){
            $.each(['teamspeak-user-id', 'teamspeak-role-id', 'teamspeak-corporation-id', 'teamspeak-alliance-id'], function(key, value){
                if (value == ('teamspeak-' + $('#teamspeak-type').val() + '-id')) {
                    $(('#' + value)).prop('disabled', false);
                } else {
                    $(('#' + value)).prop('disabled', true);
                }
            });
        }).select2();

        $('#teamspeak-user-id, #teamspeak-role-id, #teamspeak-corporation-id, #teamspeak-alliance-id, #teamspeak-group-id').select2();

        $('#teamspeak-tabs a').click(function(e){
            e.preventDefault();
            $(this).tab('show');
        });
    </script>
@stop