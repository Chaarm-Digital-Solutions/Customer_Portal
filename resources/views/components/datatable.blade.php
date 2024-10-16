@props(['dataTable', 'nowrap' => false])

<div class="card-body w-100">
    {{ $dataTable->table(['class' => 'table w-100 ' . ($nowrap ? 'nowrap' : '')], false) }}
</div>

@push('scripts')
    {{ $dataTable->scripts(attributes: ['type' => 'module']) }}
@endpush