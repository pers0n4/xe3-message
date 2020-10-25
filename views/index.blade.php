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
            <td><span class="messages__sender">{{ $message->sender->display_name }}</span></td>
            <td class="messages__content">{{ $message->content }}</td>
            <td class="messages__date">{{ $message->created_at }}</td>
        </tr>
        @endforeach
    </tbody>
</table>
@else
No messages
@endif
