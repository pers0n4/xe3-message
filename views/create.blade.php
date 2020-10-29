<div class="columns">
    <form action="{{ route('message::store') }}" method="post" class="column is-4 is-offset-4">
        {{ csrf_field() }}

        <div class="field is-horizontal">
            <div class="field-label is-normal">
                <label class="label">Receiver</label>
            </div>
            <div class="field-body">
                <div class="field">
                    <p class="control is-expanded">
                        <input type="text" class="input" value="{{ $receiver->display_name }}" disabled>
                    </p>
                </div>
            </div>
            <input type="hidden" name="receiver" value="{{ $receiver->id }}">
        </div>

        <div class="field">
            <div class="control">
                <textarea name="content" rows="10" class="textarea"></textarea>
            </div>
        </div>

        <div class="field is-grouped is-grouped-right">
            <div class="control">
                <a href="{{ route('message::index') }}" class="button is-link is-light">Cancel</a>
            </div>
            <div class="control">
                <button type="submit" class="button is-link">Submit</button>
            </div>
        </div>
    </form>
</div>
