{{ XeFrontend::js('assets/core/xe-ui-component/js/xe-page.js')->appendTo('body')->load() }}
@if ($messages->count())
<table class="table is-fullwidth is-hoverable messages">
    <thead>
        <tr>
            <th scope="col">발신</th>
            <th scope="col" class="messages__content">내용</th>
            <th scope="col" class="messages__date">날짜</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($messages as $message)
        <tr>
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
No messages
@endif
