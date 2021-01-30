{{ XeFrontend::js('assets/core/xe-ui-component/js/xe-page.js')->appendTo('body')->load() }}

@if (Session::has('success'))
<div id="message-alert" style="position: relative;">
    <div class="notification is-success" style="position: absolute; bottom: 4px; width: 100%;">
        {{ Session::get('success') }}
    </div>
</div>
@endif

@if ($messages->count())
<table class="table is-fullwidth is-hoverable messages">
    <thead>
        <tr>
            <th scope="col">{{ xe_trans('message::sender') }}</th>
            <th scope="col" class="messages__content">{{ xe_trans('message::content') }}</th>
            <th scope="col" class="messages__date">{{ xe_trans('message::date') }}</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($messages as $message)
        <tr @if ($message->is_read) class="has-background-light" @endif>
            <td>
                <a href="#" data-toggle="xe-page-toggle-menu" data-url="{{ route('toggleMenuPage') }}"
                    data-data='{!! json_encode(['id'=> $message->sender->id, 'type'=>'user'])
                    !!}'><span class="messages__sender">{{ $message->sender->display_name }}</span></a>
            </td>
            <td class="messages__content">
                <a href="{{ route('message::show', $message->id) }}" class="is-block"><p class="">{{ $message->content }}</p></a>
            </td>
            <td class="messages__date">{{ $message->created_at }}</td>
        </tr>
        @endforeach
    </tbody>
</table>
@else
{{ xe_trans('message::empty') }}
@endif

<script>
    document.addEventListener('DOMContentLoaded', function() {
        setTimeout(function() {
            document.querySelector('#message-alert').remove()
        }, 2000)
    })
</script>
