@props([
    'rating'
])
{{-- <select {{ $attributes->class(['ps-rating']) }}>
    <option value=""></option>
    @for($i = 1; $i <= 5; $i++)
    <option value="{{ $i }}" @if($i == $rating) selected @endif>{{ $i }}</option>
    @endfor
</select> --}}


            <div class="ratings">
                <?php for($i = 1; $i <= $rating; $i ++){ ?>
                    <i class="fa fa-star rating-color text-warning"></i>
                <?php } ?>

                <?php for($i = 1; $i <= (5-$rating); $i ++){ ?>
                        <i class="fa fa-star"></i>
                <?php } ?>
            </div>
