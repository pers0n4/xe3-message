<div class="columns">
    <div class="column is-4 is-offset-4">
        <div class="field is-horizontal">
            <div class="field-label is-normal">
                <label class="label">Sender</label>
            </div>
            <div class="field-body">
                <div class="field">
                    <p class="control is-expanded">
                        <input type="text" class="input" value="{{ $message->sender->display_name }}" disabled>
                    </p>
                </div>
            </div>
        </div>

        <div class="field">
            <div class="control">
                <textarea name="content" rows="10" class="textarea" readonly>{{ $message->content }}</textarea>
            </div>
        </div>

        <div class="field is-grouped is-grouped-right">
            <div class="control">
                <a href="{{ url()->previous() }}" class="button is-link is-light">Back</a>
            </div>
            <div class="control">
                <a href="{{ route('message::create', ['receiver_id' => $message->sender->id]) }}"
                    class="button is-link">Reply</a>
            </div>
        </div>
    </div>
</div>
