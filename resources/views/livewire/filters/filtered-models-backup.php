<div class="benu-container flex flex-wrap justify-between all-models__list">
    @for($j = 0; $j < $sections_number; $j++)
        @foreach($displayed_models[$j] as $model)
            @livewire('components.model-overview', ['model' => $model], key($loop->index))
        @endforeach

        @if($j < $sections_number - 1)
            @switch($j)
                @case(0)
                <div class="all-models__list__separator all-models__list__separator--1">
                @break
                
                @case(1)
                <div class="all-models__list__separator all-models__list__separator--2">
                @break

                @default
                <div class="all-models__list__separator all-models__list__separator--1">
            @endswitch
                <p class="all-models__list__separator__title">
                    @switch($j)
                        @case(0)
                        7000 à 10 000 litres d’eau
                        @break
                        
                        @case(1)
                        Pas la peine de les jeter
                        @break

                        @default
                        7000 à 10 000 litres d’eau
                    @endswitch
                </p>
                <p class="all-models__list__separator__subtitle">
                    @switch($j)
                        @case(0)
                        C’est le nombre de litres d’eau nécessaires pour fabriquer un jeans.
                        @break
                        
                        @case(1)
                        Pas la peine de les jeter BENU COUTURE reprend tes vêtements pour des créations uniques.
                        @break

                        @default
                        C’est le nombre de litres d’eau nécessaires pour fabriquer un jeans.
                    @endswitch
                </p>
            </div>
        @endif
    @endfor
</div>