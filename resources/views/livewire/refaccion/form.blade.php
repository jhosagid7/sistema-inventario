@include('common.modalHead')


<div class="row">

    <div class="col-sm-12">
        <label for="name">Refaccion</label>
        <div class="input-group">
            <div class="input-group-prepend">
                <span class="input-group-text">
                    <span class="fas fa-edit">

                    </span>
                </span>
            </div>
            <input type="text" wire:model.lazy="name" class="form-control" placeholder="ej: Nombre de la Refaccion"
                maxlength="255">
        </div>
        @error('name')
            <span class="text-danger er">{{ $message }}</span>
        @enderror
    </div>
    <div class="col-sm-12 mt-3">
        <label for="stock">Stock</label>
        <div class="input-group">
            <div class="input-group-prepend">
                <span class="input-group-text">
                    <span class="fas fa-edit">

                    </span>
                </span>
            </div>
            <input type="text" wire:model.lazy="stock" class="form-control" placeholder="stock ej: 10"
                maxlength="255">
        </div>
        @error('stock')
            <span class="text-danger er">{{ $message }}</span>
        @enderror
    </div>
    <div class="col-sm-12 mt-3">
        <label for="alerts">Minimo Stock</label>
        <div class="input-group">
            <div class="input-group-prepend">
                <span class="input-group-text">
                    <span class="fas fa-edit">

                    </span>
                </span>
            </div>
            <input type="text" wire:model.lazy="alerts" class="form-control" placeholder="Minimo stock ej: 5"
                maxlength="255">
        </div>
        @error('alerts')
            <span class="text-danger er">{{ $message }}</span>
        @enderror
    </div>





</div>



@include('common.modalFooter')
