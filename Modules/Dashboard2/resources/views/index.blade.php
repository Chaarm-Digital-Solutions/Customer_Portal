@extends('layouts.app')

@section('content')
    <div class="grid-stack">
        <div class="grid-stack-item" 
            data-gs-x="0" 
            data-gs-y="0" 
            data-gs-width="4" 
            data-gs-height="2">
            <div class="grid-stack-item-content">
                <!-- Widget Content -->
            </div>
        </div>
    </div>
@endsection

@push('scripts')
    <script type="module">
    import GridStack from 'gridstack';
    import 'gridstack/dist/gridstack.min.css';

    document.addEventListener('DOMContentLoaded', () => {
        GridStack.init();
    });
    </script>
@endpush