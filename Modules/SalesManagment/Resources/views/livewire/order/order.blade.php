<div>
    <div class="row">
        <div class="col-md-4">
            <div class="mb-10">
                <label for="" class="form-label">Default input style</label>
                {!! Form::text('date', null, ['id' => 'kt_datepicker_1', 'class' => 'form-control', 'placeholder' => 'Escoja una fecha',  'wire:model' => 'date']) !!}
                {{-- <input class="form-control" placeholder="Pick a date" id="kt_datepicker_1" /> --}}
            </div>
            {{ $date }}
        </div>
        <div class="col-md-8">
            <div class="row">
                @foreach ($categories as $key => $category)
                <div class="col-md-3">                    
                    {!! Form::radio('category_filter', $category->id, null, ['class' => 'btn-check', 'id' => 'category_'. ($key + 1)]) !!}
                    <label class="btn btn-active-light-primary btn-outline btn-outline-dashed btn-outline-primary" for="category_{{$key + 1}}"> 
                        
                        <img class="card-img-top" src="{{ @$category->image }}" alt="{{ $category->name }}">
                        <h5 class="card-title">{{ $category->name }}</h5>
                        <p>{{ count($category->products) }} productos</p>
                            
                    </label>                            
                </div>
                @endforeach
            </div>
        </div>
    </div>
</div>
