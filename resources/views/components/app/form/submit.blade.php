<button
    type="submit"
    class="btn {{ $class ?? "btn-info" }}"
>
    @if(isset($text)){
        {{ $text }}
    @else
        <span class="fas fa-save fa-space-right"></span>
        save
    @endif

</button>
