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
  @foreach($group_users as $group)
    <tr>
      <td>{{ $group->user->main_character->name }}</td>
      <td>{{ $group->group->name }}</td>
      <td>{{ $group->created_at }}</td>
      <td>{{ $group->updated_at }}</td>
      <td>
        @if($group->enable)
          <span class="fa fa-check text-success"></span>
        @else
          <span class="fa fa-times text-danger"></span>
        @endif
      </td>
      <td>
        <div class="btn-group">
          <form method="post" action="{{ route('teamspeak.user.remove', ['user_id' => $group->group_id, 'group_id' => $group->teamspeak_sgid]) }}">
            {{ csrf_field() }}
            {{ method_field('DELETE') }}
            <button type="submit" class="btn btn-danger btn-xs col-xs-12">{{ trans('web::seat.remove') }}</button>
          </form>
        </div>
      </td>
    </tr>
  @endforeach
  </tbody>
</table>