@if ($paginator->hasPages())
    <nav role="navigation" aria-label="{{ __('Pagination Navigation') }}">


            <div>
                <p class="pd text-sm text-gray-700 leading-5">
                    {!! __('全') !!}
                    <span class="font-medium">{{ $paginator->total() }}</span>
                    {!! __('件中') !!}
                    <span class="font-medium">{{ $paginator->firstItem() }}</span>
                    {!! __('〜') !!}
                    <span class="font-medium">{{ $paginator->lastItem() }}</span>
                    {!! __('件') !!}
                </p>
            </div>

    </nav>
@endif
<style>
    span.font-medium {
        color: black
    }
    p.pd {
        padding: 10px 0
    }
</style>
