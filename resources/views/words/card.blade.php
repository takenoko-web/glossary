<div class="card mt-3">
  <div class="card-body d-flex flex-row">
    <div>
      <div class="font-weight-lighter">{{ $word->created_at->format('Y/m/d H:i') }}</div>
    </div>

    <!-- dropdown -->
    <div class="ml-auto card-text">
    <div class="dropdown">
        <a data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
        <i class="fas fa-ellipsis-v"></i>
        </a>
        <div class="dropdown-menu dropdown-menu-right">
        <a class="dropdown-item" href="{{ route('words.edit', ['word' => $word]) }}">
            <i class="fas fa-pen mr-1"></i>用語を更新する
        </a>
        <div class="dropdown-divider"></div>
        <a class="dropdown-item text-danger" data-toggle="modal" data-target="#modal-delete-{{ $word->id }}">
            <i class="fas fa-trash-alt mr-1"></i>用語を削除する
        </a>
        </div>
    </div>
    </div>
    <!-- dropdown -->

    <!-- modal -->
    <div id="modal-delete-{{ $word->id }}" class="modal fade" tabindex="-1" role="dialog">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="閉じる">
                <span aria-hidden="true">×</span>
                </button>
            </div>
            <form method="POST" action="{{ route('words.destroy', ['word' => $word]) }}">
                @csrf
                @method('DELETE')
                <div class="modal-body">
                {{ $word->word }}を削除します。よろしいですか？
                </div>
                <div class="modal-footer justify-content-between">
                <a class="btn btn-outline-grey" data-dismiss="modal">キャンセル</a>
                <button type="submit" class="btn btn-danger">削除する</button>
                </div>
            </form>
            </div>
        </div>
    </div>
    <!-- modal -->

  </div>
  <div class="card-body pt-0">
    <h3 class="h4 card-title">
      <a class="text-dark" href="{{ route('words.show', ['word' => $word]) }}">
        {{ $word->word }} <span class="font-weight-lighter h6">{{ $word->read }}</span>
      </a>
    </h3>
    <div class="card-text">
      {!! nl2br(e( $word->content )) !!}
    </div>
  </div>
  @foreach($word->tags as $tag)
    @if($loop->first)
      <div class="card-body pt-0 pd-4 pl-3">
        <div class="card-text line-height">
    @endif
         <a href="{{ route('tags.show', ['name' => $tag->name]) }}" class="border p-1 mr-1 mt-1 text-muted">
          {{$tag->name}}
        </a>
    @if($loop->last)
        </div>
      </div>
    @endif
  @endforeach
</div>