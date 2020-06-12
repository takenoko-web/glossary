@csrf
<word-read
:initial-input-word='@json($word->word ?? old("word"))'
:initial-input-read='@json($word->read ?? old("read"))'
>
</word-read>
<div class="form-group">
    <word-tags-input
    :initial-tags='@json($tagNames ?? [])'
    :autocomplete-items='@json($allTagNames ?? [])'
    >
    </word-tags-input>
</div>
<div class="form-group">
    <label for="content"></label>
    <textarea name="content" id="content" class="form-control" cols="30" rows="10" placeholder="解説">{{ $word->content ?? old('content') }}</textarea>
</div>